<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class courseController extends Controller
{
    public function courseManagement(Request $request){
        try{
            $rows1 = DB::table('new_course_details')
                ->orderBy('id','asc')
                ->get();
            return view('course.courseManagement',['courses' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function addNewCourse(Request $request)
    {
        try {
            // ---------------- Validate ----------------
            $request->validate([
                'title' => 'required|string|max:200',
                'type' => 'required|string|max:30',
                'star' => 'required|numeric|min:0|max:5',
                'class'       => 'required|integer|min:1',
                'batch'       => 'required|string|max:100',
                'time'        => 'required|string|max:100',
                'seat_remain' => 'required|integer|min:0',
                'c_photo' => 'required|image',
                'p_photo' => 'required|image',
                'app_date' => 'required|date',
                'link' => 'required|string',
                'description' => 'required|string',
            ]);

            // ---------------- Upload Photos ----------------
            $cCoverPhoto = null;
            if ($request->hasFile('c_photo')) {
                $fileName = time() . '.' . $request->c_photo->extension();
                $request->c_photo->move(public_path('images/upload/course/'), $fileName);
                $cCoverPhoto = 'public/images/upload/course/' . $fileName;
            }

            $cPagePhoto = null;
            if ($request->hasFile('p_photo')) {
                $fileName = 'A' . time() . '.' . $request->p_photo->extension();
                $request->p_photo->move(public_path('images/upload/course/'), $fileName);
                $cPagePhoto = 'public/images/upload/course/' . $fileName;
            }

            // ---------------- Curriculum ----------------
            $curriculum = [];
            if ($request->has('module')) {
                foreach ($request->module as $index => $mod) {
                    $curriculum[] = [
                        'module' => $mod,
                        'details' => $request->details[$index] ?? '',
                    ];
                }
            }

            // ---------------- Instructors ----------------
            $instructors = [];
            if ($request->has('name')) {
                foreach ($request->name as $index => $name) {
                    $photoPath = null;
                    if (isset($request->photo[$index])) {
                        $fileName = time() . '_' . $index . '.' . $request->photo[$index]->extension();
                        $request->photo[$index]->move(public_path('images/upload/instructor/'), $fileName);
                        $photoPath = 'public/images/upload/instructor/' . $fileName;
                    }

                    $instructors[] = [
                        'name' => $name,
                        'designation' => $request->designation[$index] ?? '',
                        'institute' => $request->institute[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // ---------------- Get Items ----------------
            $getItems = $request->g_details ?? [];

            // ---------------- Reviews ----------------
            $reviews = [];
            if ($request->has('s_name')) {
                foreach ($request->s_name as $index => $s_name) {
                    $photoPath = null;
                    if (isset($request->s_photo[$index])) {
                        $fileName = time() . '_' . $index . '.' . $request->s_photo[$index]->extension();
                        $request->s_photo[$index]->move(public_path('images/upload/students/'), $fileName);
                        $photoPath = 'public/images/upload/students/' . $fileName;
                    }

                    $reviews[] = [
                        'name' => $s_name,
                        'review' => $request->institute[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // ---------------- Price Variations ----------------
            $priceVariations = [
                'recorded' => [
                    'price' => $request->recorded_price ?? null,
                    'd_price' => $request->recorded_d_price ?? null,
                    'status' => $request->recorded_status ?? 0,
                ],
                'live' => [
                    'price' => $request->live_price ?? null,
                    'd_price' => $request->live_d_price ?? null,
                    'status' => $request->live_status ?? 0,
                ],
                'physical' => [
                    'price' => $request->physical_price ?? null,
                    'd_price' => $request->physical_d_price ?? null,
                    'status' => $request->physical_status ?? 0,
                ],
                'one_to_one_online' => [
                    'price' => $request->one_to_one_online_price ?? null,
                    'd_price' => $request->one_to_one_online_d_price ?? null,
                    'status' => $request->one_to_one_online_status ?? 0,
                ],
                'one_to_one_physical' => [
                    'price' => $request->one_to_one_physical_price ?? null,
                    'd_price' => $request->one_to_one_physical_d_price ?? null,
                    'status' => $request->one_to_one_physical_status ?? 0,
                ],
            ];

            // ---------------- Insert into DB ----------------
            $slug = Str::slug($request->title);

            $result = DB::table('new_course_details')->insert([
                'title' => $request->title,
                'type' => $request->type,
                'star' => $request->star,
                'class_no' => $request->class,
                'batch_no' => $request->batch,
                'class_time' => $request->time,
                'seat_remain' => $request->seat_remain,
                'c_c_photo' => json_encode($cCoverPhoto),
                'c_p_photo' => json_encode($cPagePhoto),
                'y_link' => json_encode($request->link),
                'c_descripsion' => json_encode($request->description),
                'curriculum' => json_encode($curriculum),
                'instructor' => json_encode($instructors),
                'g_course' => json_encode($getItems),
                'review' => json_encode($reviews),
                'app_date' => $request->app_date,
                'slug' => $slug,
                'status' => 1,
                'price_variations' => json_encode($priceVariations),
            ]);
            if ($result) {
                return back()->with('successMessage', 'Course Added Successfully!');
            } else {
                return back()->with('errorMessage', 'Something went wrong, please try again.');
            }

        } catch (\Exception $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editCoursePage(Request $request)
    {
        $id = $request->id;
        $course = DB::table('new_course_details')->where('id', $id)->first();

        if ($course) {
            // Decode JSON fields
            $course->curriculum = json_decode($course->curriculum, true);
            $course->instructor = json_decode($course->instructor, true);
            $course->g_course = json_decode($course->g_course, true);
            $course->review = json_decode($course->review, true);
            $course->price_variations = $course->price_variations;
        }

        return view('course.editCoursePage', compact('course'));
    }
    public function updateCourse(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:200',
                'type' => 'required|string|max:30',
                'star' => 'required|numeric|min:0|max:5',
                'class' => 'required|integer',
                'batch' => 'required|string|max:20',
                'time' => 'required|string',
                'seat_remain' => 'required|integer',
                'link' => 'required|string',
                'description' => 'required|string',
                'app_date' => 'required|date',
            ]);

            $course = DB::table('new_course_details')->where('id', $request->id)->first();
            if (!$course) {
                return back()->with('errorMessage', 'Course not found');
            }

            // Cover photo
            if ($request->hasFile('c_photo')) {
                $fileName = time() . '.' . $request->c_photo->extension();
                $request->c_photo->move(public_path('images/upload/course/'), $fileName);
                $cCoverPhoto = 'public/images/upload/course/' . $fileName;
            } else {
                $cCoverPhoto = json_decode($course->c_c_photo);
            }

            // Page photo
            if ($request->hasFile('p_photo')) {
                $fileName = 'A' . time() . '.' . $request->p_photo->extension();
                $request->p_photo->move(public_path('images/upload/course/'), $fileName);
                $cPagePhoto = 'public/images/upload/course/' . $fileName;
            } else {
                $cPagePhoto = json_decode($course->c_p_photo);
            }

            // Curriculum
            $curriculum = [];
            if ($request->has('module')) {
                foreach ($request->module as $index => $mod) {
                    $curriculum[] = [
                        'module' => $mod,
                        'details' => $request->details[$index] ?? '',
                    ];
                }
            }

            // Instructors
            $instructors = [];
            if ($request->has('name')) {
                foreach ($request->name as $index => $name) {
                    if (isset($request->photo[$index])) {
                        $fileName = time() . '_' . $index . '.' . $request->photo[$index]->extension();
                        $request->photo[$index]->move(public_path('images/upload/instructor/'), $fileName);
                        $photoPath = 'public/images/upload/instructor/' . $fileName;
                    } else {
                        $photoPath = $request->existing_photo[$index] ?? null;
                    }

                    $instructors[] = [
                        'name' => $name,
                        'designation' => $request->designation[$index] ?? '',
                        'institute' => $request->institute[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // Get Items
            $getItems = $request->g_details ?? [];

            // Reviews
            $reviews = [];
            if ($request->has('s_name')) {
                foreach ($request->s_name as $index => $s_name) {
                    if (isset($request->s_photo[$index])) {
                        $fileName = time() . '_' . $index . '.' . $request->s_photo[$index]->extension();
                        $request->s_photo[$index]->move(public_path('images/upload/students/'), $fileName);
                        $photoPath = 'public/images/upload/students/' . $fileName;
                    } else {
                        $photoPath = $request->existing_s_photo[$index] ?? null;
                    }

                    $reviews[] = [
                        'name' => $s_name,
                        'review' => $request->review[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // Price Variations
            $variations = [];
            if ($request->has('variation_title')) {
                foreach ($request->variation_title as $key) {
                    $variations[$key] = [
                        'price'   => $request->input("{$key}_price"),
                        'd_price' => $request->input("{$key}_d_price"),
                        'status'  => $request->input("{$key}_status"),
                    ];
                }
            }

            // Slug
            $slug = Str::slug($request->title);

            // Update
            DB::table('new_course_details')->where('id', $request->id)->update([
                'title' => $request->title,
                'type' => $request->type,
                'star' => $request->star,
                'class_no' => $request->class,
                'batch_no' => $request->batch,
                'class_time' => $request->time,
                'seat_remain' => $request->seat_remain,
                'c_c_photo' => json_encode($cCoverPhoto),
                'c_p_photo' => json_encode($cPagePhoto),
                'y_link' => json_encode($request->link),
                'c_descripsion' => json_encode($request->description),
                'curriculum' => json_encode($curriculum),
                'instructor' => json_encode($instructors),
                'g_course' => json_encode($getItems),
                'review' => json_encode($reviews),
                'app_date' => $request->app_date, // শুধু একটা date
                'slug' => $slug,
                'price_variations' => json_encode($variations),
            ]);

            return redirect()->back()->with('successMessage', 'Course updated successfully!');
        } catch (\Exception $e) {
            return back()->with('errorMessage', $e->getMessage());
        }
    }

    public function toggleCourseStatus($id)
    {
        $course = DB::table('new_course_details')->where('id', $id)->first();

        if (!$course) {
            return redirect()->back()->with('errorMessage', 'Course not found.');
        }

        $newStatus = $course->status == 1 ? 0 : 1;

        DB::table('new_course_details')->where('id', $id)->update(['status' => $newStatus]);

        $message = $newStatus ? 'Course activated successfully.' : 'Course deactivated successfully.';
        return redirect()->back()->with('successMessage', $message);
    }
    public function deleteCourse($id)
    {
        $course = DB::table('new_course_details')->where('id', $id)->first();

        if (!$course) {
            return redirect()->back()->with('errorMessage', 'Course not found.');
        }

        // Optionally delete associated images if stored locally
        if ($course->c_c_photo) {
            @unlink(public_path(str_replace('public/', '', json_decode($course->c_c_photo))));
        }
        if ($course->c_p_photo) {
            @unlink(public_path(str_replace('public/', '', json_decode($course->c_p_photo))));
        }

        DB::table('new_course_details')->where('id', $id)->delete();

        return redirect()->back()->with('successMessage', 'Course deleted successfully.');
    }

    public function classVideoPage(Request $request)
    {
        $courses = DB::table('new_course_details')->select('id','title')->get();

        // filter condition
        $query = DB::table('class_videos')
            ->join('new_course_details', 'class_videos.course_id', '=', 'new_course_details.id')
            ->select('class_videos.*', 'new_course_details.title')
            ->orderBy('class_videos.id', 'desc');

        if ($request->filled('course_id')) {
            $query->where('class_videos.course_id', $request->course_id);
        }

        $classVideos = $query->paginate(10)->appends(['course_id' => $request->course_id]);

        return view('course.class_video_management', compact('courses','classVideos'));
    }

    public function addClassVideo(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer',
            'class_no' => 'required|integer',
            'class_title' => 'required|string',
            'bunny_video_id' => 'required|string',
            'bunny_library_id' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // check duplicate before insert
        $exists = DB::table('class_videos')
            ->where('course_id', $request->course_id)
            ->where('class_no', $request->class_no)
            ->exists();

        if ($exists) {
            return back()->with('errorMessage', 'This class number already exists for the selected course!');
        }

        DB::table('class_videos')->insert([
            'course_id' => $request->course_id,
            'class_no' => $request->class_no,
            'class_title' => $request->class_title,
            'bunny_video_id' => $request->bunny_video_id,
            'bunny_library_id' => $request->bunny_library_id,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('successMessage', 'Class video added successfully!');
    }
    public function editClassVideo(Request $r)
    {
        $id = $r->id;
        $video = DB::table('class_videos')->where('id', $id)->first();
        $courses = DB::table('new_course_details')->select('id','title')->get();

        if (!$video) {
            return redirect('/class-videos')->with('error', 'Video not found!');
        }

        return view('course.edit_class_video', compact('video', 'courses'));
    }

    // 💾 Update
    public function updateClassVideo(Request $r)
    {
        $r->validate([
            'course_id' => 'required|integer',
            'class_no' => 'required|integer',
            'class_title' => 'required|string',
            'bunny_video_id' => 'required|string',
            'bunny_library_id' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // check duplicate except self
        $exists = DB::table('class_videos')
            ->where('course_id', $r->course_id)
            ->where('class_no', $r->class_no)
            ->where('id', '!=', $r->id)
            ->exists();

        if ($exists) {
            return back()->with('errorMessage', '❌ This class number already exists for this course!');
        };

        DB::table('class_videos')->where('id', $r->id)->update([
            'course_id' => $r->course_id,
            'class_no' => $r->class_no,
            'class_title' => $r->class_title,
            'bunny_video_id' => $r->bunny_video_id,
            'bunny_library_id' => $r->bunny_library_id,
            'status' => $r->status,
            'updated_at' => now(),
        ]);

        return redirect('/class-videos')->with('successMessage', '✅ Class video updated successfully!');
    }

    // 🗑 Delete
    public function deleteClassVideo(Request $r)
    {
        $id = $r->id;
        DB::table('class_videos')->where('id', $id)->delete();
        return back()->with('successMessage', '🗑 Class video deleted successfully!');
    }
}
