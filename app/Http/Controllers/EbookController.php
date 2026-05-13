<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EbookController extends Controller
{
    public function index($ebook)
    {
        if (!Session::has('user_id') || Session::get('user_role') != 3) {
            return $this->forceLogoutWithMessage();
        }

        $userId = Session::get('user_id');

        if (!$this->hasPurchasedEbook($userId, $ebook)) {
            return $this->forceLogoutWithMessage();
        }

        $view = "ebooks.$ebook.index";
        if (!view()->exists($view)) {
            abort(404);
        }

        return view($view);
    }


    /**
     * Ebook Chapter
     * URL: /ebooks/{ebook}/chapter/{chapter}
     */
    public function chapter($ebook, $chapter)
    {
        if (!Session::has('user_id') || Session::get('user_role') != 3) {
            return $this->forceLogoutWithMessage();
        }

        $userId = Session::get('user_id');

        if (!$this->hasPurchasedEbook($userId, $ebook)) {
            return $this->forceLogoutWithMessage();
        }

        $view = "ebooks.$ebook.chapter{$chapter}";
        if (!view()->exists($view)) {
            abort(404);
        }

        return view($view);
    }

    private function forceLogoutWithMessage()
    {
        // শুধু auth related session remove
        Session::forget([
            'user_id',
            'user_role',
            'user_info',
            'customer'
        ]);

        // login page এ দেখানোর message
        Session::flash(
            'errorMessage',
            'এই Ebook টি দেখতে হলে আগে অবশ্যই কিনতে হবে।'
        );

        return redirect('/all-login');
    }
    /**
     * 🔒 Check if user purchased this ebook
     */
    private function hasPurchasedEbook($userId, $ebookSlug): bool
    {
        return DB::table('payment_orders')
            ->where('user_id', $userId)
            ->where('product_category', 'Ebook')
            ->where('status', 'Complete')
            ->whereJsonContains('product_profile->slug', $ebookSlug)
            ->exists();
    }

    public function convert()
    {
        // ✅ target folder
        $path = resource_path('views/ebooks/tour-package/');

        if (!File::exists($path)) {
            return "❌ Folder not found: " . $path;
        }

        $files = File::allFiles($path);

        $log = [];

        foreach ($files as $file) {

            if ($file->getExtension() !== 'html') {
                continue;
            }

            $oldPath = $file->getPathname();
            $newPath = str_replace('.html', '.blade.php', $oldPath);

            $content = File::get($oldPath);

            // 🔧 FIX LINKS (Laravel route based)
            $content = preg_replace(
                '/index\.html/',
                '/ebooks/tour-package',
                $content
            );

            $content = preg_replace(
                '/chapter([0-9]+)\.html/',
                '/ebooks/tour-package/chapter/$1',
                $content
            );

            File::put($newPath, $content);
            File::delete($oldPath);

            $log[] = "✅ Converted: {$oldPath}";
        }

        return "<pre>" . implode("\n", $log) . "\n\nDONE ✔</pre>";
    }
    public function update()
    {
        $basePath = resource_path('views/ebooks/tour-package');
        $log = [];

        for ($i = 1; $i <= 75; $i++) {

            $file = $basePath . "/chapter{$i}.blade.php";

            if (!File::exists($file)) {
                $log[] = "❌ chapter{$i} not found";
                continue;
            }

            $original = File::get($file);

            /* =================================================
            1️⃣ ALWAYS fix nav-buttons links (NO SKIP)
            air-ticket → visa-course + url()
            ================================================= */
            $fixed = preg_replace(
                '/href="\/ebooks\/air-ticket\/chapter\/(\d+)"/',
                'href="{{ url(\'/ebooks/tour-package/chapter/$1\') }}"',
                $original
            );

            // যদি শুধু link fix হয়, file আপডেট করো
            if ($fixed !== $original) {
                File::put($file, $fixed);
                $original = $fixed;
                $log[] = "🔗 chapter{$i} nav-buttons fixed";
            }

            /* =================================================
            2️⃣ যদি আগেই Laravel layout এ থাকে → skip wrapping
            ================================================= */
            if (str_contains($original, "@extends('ebooks.tour-package.layout.app')")) {
                $log[] = "⏭️ chapter{$i} layout already exists";
                continue;
            }

            // 🔐 BACKUP (ONE TIME)
            //File::copy($file, $file . '.bak');

            /* ===============================
            3️⃣ TITLE extract
            =============================== */
            $title = "Chapter {$i}";
            if (preg_match('/<title>(.*?)<\/title>/is', $original, $m)) {
                $title = trim($m[1]);
            }

            /* ===============================
            4️⃣ div#content extract (SAFE)
            =============================== */
            $startTag = '<div id="content">';
            $startPos = strpos($original, $startTag);

            if ($startPos === false) {
                $log[] = "⚠️ chapter{$i}: div#content not found";
                continue;
            }

            $contentStart = $startPos + strlen($startTag);
            $endPos = strripos($original, '</div>');

            if ($endPos === false || $endPos <= $contentStart) {
                $log[] = "⚠️ chapter{$i}: closing div not found";
                continue;
            }

            $content = trim(substr($original, $contentStart, $endPos - $contentStart));

            /* ===============================
            5️⃣ FINAL LARAVEL WRAP
            =============================== */
            $finalBlade = <<<BLADE
    @extends('ebooks.tour-package.layout.app')

    @section('title','{$title}')

    @section('content')
    {$content}
    @endsection
    BLADE;

            File::put($file, $finalBlade);
            $log[] = "✅ chapter{$i} fully converted";
        }

        return response()->json([
            'status' => 'DONE',
            'result' => $log
        ]);
    }
    public function ebookManagementPage()
    {
        $ebooks = DB::table('ebooks')->orderBy('id','desc')->get();
        return view('course.ebook-management', compact('ebooks'));
    }

    /* ================= STORE ================= */

    public function ebookStoreProcess(Request $request)
    {
        /* ================= BASIC VALIDATION ================= */
        $request->validate([
            'title'        => 'required|string|max:255',
            'slug'  => 'nullable|string|max:255|unique:ebooks,slug',
            'course_link'  => 'required|string',
            'price'        => 'required|numeric',
            'star'         => 'nullable|string|max:10',

            'cover_photo'  => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'page_photo'   => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'author_photo.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'reviewer_photo.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        /* ================= UPLOAD PATH ================= */
        $uploadPath = public_path('images/upload/ebook');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        /* ================= COVER PHOTO ================= */
        $coverPath = null;
        if ($request->hasFile('cover_photo')) {
            $coverName = time().'_cover.'.$request->cover_photo->extension();
            $request->cover_photo->move($uploadPath, $coverName);
            $coverPath = 'images/upload/ebook/'.$coverName;
        }

        /* ================= PAGE PHOTO ================= */
        $pagePath = null;
        if ($request->hasFile('page_photo')) {
            $pageName = time().'_page.'.$request->page_photo->extension();
            $request->page_photo->move($uploadPath, $pageName);
            $pagePath = 'images/upload/ebook/'.$pageName;
        }

        /* ================= AUTHOR JSON ================= */
        $authors = [];
        if (!empty($request->author_name)) {
            foreach ($request->author_name as $i => $name) {
                if (!$name) continue;

                $photoPath = null;
                if (!empty($request->author_photo[$i])) {
                    $file = $request->author_photo[$i];
                    $fileName = time().'_author_'.$i.'.'.$file->extension();
                    $file->move($uploadPath, $fileName);
                    $photoPath = 'images/upload/ebook/'.$fileName;
                }

                $authors[] = [
                    'name'  => $name,
                    'photo' => $photoPath
                ];
            }
        }

        /* ================= YOU GET JSON ================= */
        $ebookGet = null;
        if (!empty($request->get_details)) {
            $filtered = array_values(array_filter($request->get_details));
            if (count($filtered)) {
                $ebookGet = json_encode($filtered);
            }
        }

        /* ================= REVIEW JSON ================= */
        $reviews = [];
        if (!empty($request->reviewer_name)) {
            foreach ($request->reviewer_name as $i => $name) {
                if (!$name || empty($request->review[$i])) continue;

                $photoPath = null;
                if (!empty($request->reviewer_photo[$i])) {
                    $file = $request->reviewer_photo[$i];
                    $fileName = time().'_review_'.$i.'.'.$file->extension();
                    $file->move($uploadPath, $fileName);
                    $photoPath = 'images/upload/ebook/'.$fileName;
                }

                $reviews[] = [
                    'name'   => $name,
                    'review' => $request->review[$i],
                    'photo'  => $photoPath
                ];
            }
        }
        $slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);
        /* ================= INSERT QUERY ================= */
        DB::table('ebooks')->insert([
            'title'          => $request->title,
            'slug'           => $slug,
            'course_link'    => $request->course_link,
            'star'           => $request->star ?? '4.8',
            'price'          => $request->price,
            'discount_price' => $request->discount_price ?? null,

            'cover_photo'    => $coverPath,
            'page_photo'     => $pagePath,
            'description'    => json_decode($request->description) ?? null,
            'youtube_link'   => $request->youtube_link ?? null,

            'authors'        => !empty($authors) ? json_encode($authors) : null,
            'ebook_get'      => $ebookGet,
            'ebook_review'   => !empty($reviews) ? json_encode($reviews) : null,

            'status'         => 1,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        /* ================= RESPONSE ================= */
        return redirect()->back()->with('successMessage', 'E-Book added successfully!');
    }
    /* ================= EDIT ================= */

    public function ebookEditPage(Request $request)
    {
        $ebook = DB::table('ebooks')->where('id',$request->id)->first();
        return view('course.ebook-edit', compact('ebook'));
    }

    /* ================= UPDATE ================= */

    public function ebookUpdateProcess(Request $request)
    {
        /* ================= VALIDATION ================= */
        $request->validate([
            'id'           => 'required|exists:ebooks,id',
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:ebooks,slug,' . $request->id,
            'course_link'  => 'required|string',
            'price'        => 'required|numeric',

            'cover_photo'      => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'page_photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'author_photo.*'   => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'reviewer_photo.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        /* ================= OLD DATA ================= */
        $ebook = DB::table('ebooks')->where('id', $request->id)->first();

        /* ================= UPLOAD PATH ================= */
        $uploadPath = public_path('images/upload/ebook');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        /* ================= COVER PHOTO ================= */
        $coverPath = $ebook->cover_photo;
        if ($request->hasFile('cover_photo')) {
            $coverName = time().'_cover.'.$request->cover_photo->extension();
            $request->cover_photo->move($uploadPath, $coverName);
            $coverPath = 'images/upload/ebook/'.$coverName;
        }

        /* ================= PAGE PHOTO ================= */
        $pagePath = $ebook->page_photo;
        if ($request->hasFile('page_photo')) {
            $pageName = time().'_page.'.$request->page_photo->extension();
            $request->page_photo->move($uploadPath, $pageName);
            $pagePath = 'images/upload/ebook/'.$pageName;
        }

        /* ================= AUTHOR JSON (OLD PHOTO SAFE) ================= */
        $authors = [];
        if (!empty($request->author_name)) {
            foreach ($request->author_name as $i => $name) {
                if (!$name) continue;

                // keep old photo
                $photoPath = $request->author_old_photo[$i] ?? null;

                // new photo upload
                if (!empty($request->author_photo[$i])) {
                    $file = $request->author_photo[$i];
                    $fileName = time().'_author_'.$i.'.'.$file->extension();
                    $file->move($uploadPath, $fileName);
                    $photoPath = 'images/upload/ebook/'.$fileName;
                }

                $authors[] = [
                    'name'  => $name,
                    'photo' => $photoPath
                ];
            }
        }

        /* ================= YOU GET ================= */
        $ebookGet = null;
        if (!empty($request->get_details)) {
            $filtered = array_values(array_filter($request->get_details));
            if (!empty($filtered)) {
                $ebookGet = json_encode($filtered);
            }
        }

        /* ================= CURRICULUM ================= */
        $curriculum = [];
        if (!empty($request->curriculum_title)) {
            foreach ($request->curriculum_title as $i => $title) {
                if (!$title || empty($request->curriculum_details[$i])) continue;

                $curriculum[] = [
                    'title'   => $title,
                    'details' => $request->curriculum_details[$i]
                ];
            }
        }

        /* ================= REVIEW JSON (OLD PHOTO SAFE) ================= */
        $reviews = [];
        if (!empty($request->reviewer_name)) {
            foreach ($request->reviewer_name as $i => $name) {
                if (!$name || empty($request->review[$i])) continue;

                // keep old photo
                $photoPath = $request->reviewer_old_photo[$i] ?? null;

                // new photo upload
                if (!empty($request->reviewer_photo[$i])) {
                    $file = $request->reviewer_photo[$i];
                    $fileName = time().'_review_'.$i.'.'.$file->extension();
                    $file->move($uploadPath, $fileName);
                    $photoPath = 'images/upload/ebook/'.$fileName;
                }

                $reviews[] = [
                    'name'   => $name,
                    'review' => $request->review[$i],
                    'photo'  => $photoPath
                ];
            }
        }

        /* ================= UPDATE QUERY ================= */
        DB::table('ebooks')->where('id', $request->id)->update([
            'title'            => $request->title,
            'slug'             => $request->slug,
            'course_link'      => $request->course_link,
            'star'             => $request->star ?? '4.8',
            'price'            => $request->price,
            'discount_price'   => $request->discount_price ?? null,

            'cover_photo'      => $coverPath,
            'page_photo'       => $pagePath,
            'description'      => json_encode($request->description) ?? null,
            'youtube_link'     => $request->youtube_link ?? null,

            'authors'          => !empty($authors) ? json_encode($authors) : null,
            'ebook_get'        => $ebookGet,
            'ebook_curriculum' => !empty($curriculum) ? json_encode($curriculum) : null,
            'ebook_review'     => !empty($reviews) ? json_encode($reviews) : null,

            'updated_at'       => now(),
        ]);

        return redirect()->back()->with('successMessage', 'E-Book updated successfully!');
    }

    /* ================= DELETE ================= */

    public function ebookDeleteProcess(Request $request)
    {
        DB::table('ebooks')->where('id',$request->id)->delete();
        return back()->with('success','E-Book Deleted');
    }

    /* ================= STATUS ================= */

    public function ebookStatusToggle($id)
    {
        DB::table('ebooks')
            ->where('id',$id)
            ->update([
                'status' => DB::raw('IF(status=1,0,1)')
            ]);

        return back();
    }

    public function show($slug)
    {
        // 🔹 Single ebook (details page)
        $ebook = DB::table('ebooks')
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$ebook) {
            abort(404);
        }

        // 🔹 Decode JSON fields (single ebook)
        $ebook->authors          = json_decode($ebook->authors, true);
        $ebook->ebook_get        = json_decode($ebook->ebook_get, true);
        $ebook->ebook_review     = json_decode($ebook->ebook_review, true);
        $ebook->ebook_curriculum = json_decode($ebook->ebook_curriculum, true);

        // 🔹 ALL ebooks (for list / sidebar / dropdown)
        $ebooks = DB::table('ebooks')
            ->where('status', 1)
            ->get();

        return view('frontend.ebook-details', compact('ebook', 'ebooks'));
    }

}
