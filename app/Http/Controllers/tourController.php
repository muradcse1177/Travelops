<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;

class tourController extends Controller
{
    public function domainCheck(){
        try{
            $c_domain = app()->environment('local') ? 'tripdesigner.xyz' : str_replace('www.', '', strtolower(request()->getHost()));
            $rows = DB::table('domain')->where('name',$c_domain)->first();
            $row['domain'] = @$rows->name;
            $row['agent_id'] = @$rows->agent_id;
            return @$row;
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
//    public function newTourPackage(Request $request){
//        try{
//            $rows1 = DB::table('country')->get();
//            $rows2 = DB::table('package_details')
//                ->where('deleted',0)
//                ->where('agent_id',Session::get('agent_id'))
//                ->orderBy('updated_at','desc')
//                ->paginate(10);
//            $rows4 = DB::table('passengers')
//                ->where('deleted',0)
//                ->where('upload_by',Session::get('agent_id'))
//                ->orderBy('id','desc')
//                ->get();
//            $rows3 = DB::table('payment_type')
//                ->get();
//            $rows5 = DB::table('vendors') ->where('agent_id',Session::get('agent_id'))->get();
//            return view('tourPackage.newTourPackage',['countries' => $rows1,'packages' => $rows2,'payment_types' => $rows3,'passengers' => $rows4,'vendors' => $rows5]);
//        }
//        catch(\Illuminate\Database\QueryException $ex){
//            return back()->with('errorMessage', $ex->getMessage());
//        }
//    }

    public function newTourPackage(Request $request)
    {
        try {
            // Dropdown data (আগের মতই)
            $rows1 = DB::table('country')->get();
            $rows3 = DB::table('payment_type')->get();
            $rows4 = DB::table('passengers')
                ->where('deleted', 0)
                ->where('upload_by', Session::get('agent_id'))
                ->orderBy('id', 'desc')
                ->get();
            $rows5 = DB::table('vendors')
                ->where('agent_id', Session::get('agent_id'))
                ->get();

            // ========== Filters ==========
            $country     = $request->input('country');        // Country name
            $startDate   = $request->input('start_date');     // YYYY-MM-DD
            $endDate     = $request->input('end_date');       // YYYY-MM-DD
            $pcode       = $request->input('p_code');         // Package code
            $vendor      = $request->input('vendor');         // Vendor name
            $payStatus   = $request->input('payment_status'); // 'paid' | 'due' | ''
            $firstName   = $request->input('first_name');     // Passenger f_name (LIKE)
            $lastName    = $request->input('last_name');      // Passenger l_name (LIKE)

            // বেইস কুয়েরি
            $q = DB::table('package_details')
                ->where('deleted', 0)
                ->where('agent_id', Session::get('agent_id'));

            // 1) Country (p_countries-এ multiple হলে FIND_IN_SET; নাহলে LIKE ব্যাকআপ)
            if (!empty($country)) {
                $q->where(function ($w) use ($country) {
                    $w->whereRaw('FIND_IN_SET(?, p_countries)', [$country])
                        ->orWhere('p_countries', 'LIKE', "%{$country}%");
                });
            }

            // 2) Start & End date
            // ✅ Booking Date filter (package_details.date)
            if (!empty($startDate) && !empty($endDate)) {
                // দুইটা date দেওয়া থাকলে range হিসেবে কাজ করবে
                $q->whereBetween('date', [$startDate, $endDate]);
            } elseif (!empty($startDate)) {
                // শুধু startDate থাকলে সেই specific তারিখেই বুকিং চেক হবে
                $q->whereDate('date', $startDate);
            } elseif (!empty($endDate)) {
                // শুধু endDate থাকলেও সেই specific তারিখেই বুকিং চেক হবে
                $q->whereDate('date', $endDate);
            }

            // 3) Package Code (exact match; প্রয়োজন হলে LIKE ব্যবহার করতে পারো)
            if (!empty($pcode)) {
                $q->where('p_code', $pcode);
                // $q->where('p_code','LIKE',"%{$pcode}%");
            }

            // 4) Vendor (তোমার ফর্মে ভ্যালু = vendors.name; package_details.vendor-এও name থাকলে exact/LIKE)
            if (!empty($vendor)) {
                $q->where('vendor', $vendor);
                // $q->where('vendor','LIKE',"%{$vendor}%");
            }

            // 5) Payment Status (ধরা হলো: due == 0 => Paid, >0 => Due)
            if ($payStatus === 'paid') {
                $q->where('due', 0);
            } elseif ($payStatus === 'due') {
                $q->where('due', '>', 0);
            }

            $firstName = $request->input('first_name');
            $lastName  = $request->input('last_name');

            if (!empty($firstName) || !empty($lastName)) {
                // 1) passengers থেকে matching ID গুলো আনো
                $passengerIds = DB::table('passengers as p')
                    ->where('p.deleted', 0)
                    ->where('p.upload_by', Session::get('agent_id'))
                    ->when($firstName, fn($w) => $w->where('p.f_name', 'LIKE', "%{$firstName}%"))
                    ->when($lastName,  fn($w) => $w->where('p.l_name', 'LIKE', "%{$lastName}%"))
                    ->pluck('p.id');

                if ($passengerIds->isEmpty()) {
                    // কোনো নাম মেলেনি → রেজাল্ট ফাঁকা
                    $q->whereRaw('0=1');
                } else {
                    // 2) package_details.traveler (JSON array) এ ওই ID-গুলোর যেকোনো একটা আছে কি না
                    // ---- অপশন A: Laravel whereJsonContains (MySQL 5.7+). যেকোনো একটায় ম্যাচ করতে OR লাগবে।
                    $q->where(function($w) use ($passengerIds) {
                        foreach ($passengerIds as $pid) {
                            // traveler যদি [1,2,3] বা ["1","2"] — দুই কেসই ধরতে ডাবল চেক:
                            $w->orWhereJsonContains('traveler', (int)$pid)   // numeric
                            ->orWhereJsonContains('traveler', (string)$pid); // string
                        }
                    });
                }
            }
            // Pagination + order
            $rows2 = $q->orderBy('id', 'desc')
                ->paginate(10)
                ->appends($request->query()); // পেজ চেঞ্জেও ফিল্টার ভ্যালুগুলো থাকবে

            return view('tourPackage.newTourPackage', [
                'countries'     => $rows1,
                'packages'      => $rows2,
                'payment_types' => $rows3,
                'passengers'    => $rows4,
                'vendors'       => $rows5,
            ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    private function resizeImageFile($file, $path)
    {
        $manager = new ImageManager(new GdDriver());
        $image = $manager->read($file);

        $maxBytes = 102400; // 100 KB
        $quality = 90;
        $width = $image->width();
        $height = $image->height();

        do {
            $encoded = $image->scale($width, $height)->toJpeg(quality: $quality);
            $size = strlen($encoded);
            $quality -= 5;
            $width *= 0.95;
            $height *= 0.95;
        } while ($size > $maxBytes && $quality > 10 && $width > 50 && $height > 50);

        // Generate unique file name
        $filename = uniqid() . '.jpg';

        // Set target directory inside /public
        $fullDirPath = public_path($path);

        // Create directory if it doesn't exist
        if (!file_exists($fullDirPath)) {
            mkdir($fullDirPath, 0775, true);
        }

        // Final path
        $fullPath = $fullDirPath . '/' . $filename;

        // Save the image directly into /public/...
        file_put_contents($fullPath, $encoded);

        // Return relative path to store in DB
        return 'public/' . $path . '/' . $filename;
    }
    public function createNewTourPackage(Request $request)
    {
        try {
            DB::beginTransaction();

            $paymentFiles = [];
            $vendorFiles = [];

            $clientFolder = public_path('images/upload/client_payment_files');
            if (!file_exists($clientFolder)) {
                mkdir($clientFolder, 0775, true);
            }

            $vendorFolder = public_path('images/upload/vendor_payment_files');
            if (!file_exists($vendorFolder)) {
                mkdir($vendorFolder, 0775, true);
            }
            // Process Client Files
            if ($request->hasFile('payment_files')) {
                foreach ($request->file('payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $paymentFiles[] = $this->resizeImageFile($file, 'images/upload/client_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files are allowed (Client).');
                        }
                    }
                }
            }

            // Process Vendor Files
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $vendorFiles[] = $this->resizeImageFile($file, 'images/upload/vendor_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files are allowed (Vendor).');
                        }
                    }
                }
            }
            // Insert into package_details table
            $packageId = DB::table('package_details')->insertGetId([
                'agent_id'       => Session::get('agent_id'),
                'p_countries'    => $request->country,
                'title'          => $request->title,
                'p_code'         => $request->p_code,
                'night'          => $request->night,
                'vendor'         => $request->vendor,
                'start_date'     => $request->start_date,
                'end_date'       => $request->end_date,
                'highlights'     => json_encode($request->highlights),
                'traveler'       => json_encode($request->pax_name),
                'day_title'      => json_encode($request->d_title),
                'dat_itinary'    => json_encode($request->description),
                'g_details'      => $request->pax_number,
                'p_a_price'      => $request->a_price,
                'p_c_details'    => $request->c_price,
                'p_vat'          => $request->vat,
                'p_ait'          => $request->ait,
                'p_inclusions'   => json_encode($request->p_inclusions),
                'p_exclusions'   => json_encode($request->p_exclusions),
                'p_tnt'          => json_encode($request->p_tnt),
                'payment_type'   => $request->payment_type,
                'due'            => $request->due,
                'vendor_due'            => $request->vendor_due,
                'pay_details'    => $request->pay_details,
                'payment_files'        => json_encode($paymentFiles),
                'vendor_p_details'     => $request->vendor_p_details,
                'vendor_payment_files' => json_encode($vendorFiles),
            ]);
            // Calculate total selling price
            $sellingPrice = $request->c_price + $request->vat + $request->ait;

            // Insert related financial record into accounts table
            $accountInserted = DB::table('accounts')->insert([
                'agent_id'         => Session::get('agent_id'),
                'invoice_id'       => $packageId,
                'date'             => now()->format('Y-m-d'),
                'transaction_type' => 'Debit',
                'source'           => 'Tour Package',
                'purpose'          => 'Tour Package --- ' . $request->title,
                'buying_price'     => $request->a_price,
                'selling_price'    => $sellingPrice,
            ]);

            if ($accountInserted) {
                DB::commit();
                return redirect()->to('newTourPackage')->with('successMessage', 'New invoice created successfully!!');
            } else {
                DB::rollBack();
                return back()->with('errorMessage', 'Failed to create account record. Please try again!!');
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editPackagePage(Request $request){
        try{
            $rows1 = DB::table('country')->get();
            $rows7 = DB::table('vendors') ->where('agent_id',Session::get('agent_id'))->get();
            $rows5 = DB::table('package_details')
                ->where('deleted',0)
                ->where('agent_id',Session::get('agent_id'))
                ->where('id',$request->id)
                ->first();
            $rows4 = DB::table('passengers')
                ->where('deleted',0)
                ->where('upload_by',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->get();
            $rows6 = DB::table('payment_type')
                ->get();
            return view('tourPackage.editTourPackage',['countries' => $rows1,'package' => $rows5,'passengers' => $rows4,'payment_types' => $rows6,'vendors' => $rows7]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function updateTourPackage(Request $request)
    {
        try {
            if (!$request->id) {
                return back()->with('errorMessage', 'Bad Request!!');
            }

            DB::beginTransaction();

            $agentId = Session::get('agent_id');
            $invoice = DB::table('package_details')
                ->where('agent_id', $agentId)
                ->where('id', $request->id)
                ->first();
            if (!$invoice) {
                return back()->with('errorMessage', 'Invoice not found.');
            }
            $existingClientFiles = json_decode($invoice->payment_files, true) ?? [];
            $existingVendorFiles = json_decode($invoice->vendor_payment_files, true) ?? [];

            $newClientFiles = [];
            $newVendorFiles = [];

            // Ensure directories exist
            $clientPath = public_path('images/upload/client_payment_files');
            if (!file_exists($clientPath)) {
                mkdir($clientPath, 0775, true);
            }

            $vendorPath = public_path('images/upload/vendor_payment_files');
            if (!file_exists($vendorPath)) {
                mkdir($vendorPath, 0775, true);
            }
            if ($request->hasFile('payment_files')) {
                foreach ($request->file('payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $newClientFiles[] = $this->resizeImageFile($file, 'images/upload/client_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files allowed (Client).');
                        }
                    }
                }
            }

            // Process new vendor files
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $newVendorFiles[] = $this->resizeImageFile($file, 'images/upload/vendor_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files allowed (Vendor).');
                        }
                    }
                }
            }

            // Merge old + new files
            $mergedClientFiles = array_merge($existingClientFiles, $newClientFiles);
            $mergedVendorFiles = array_merge($existingVendorFiles, $newVendorFiles);

            // Update package_details table
            $packageUpdated = DB::table('package_details')
                ->where('id', $request->id)
                ->where('agent_id', Session::get('agent_id'))
                ->update([
                    'p_countries'    => $request->country,
                    'title'          => $request->title,
                    'p_code'         => $request->p_code,
                    'night'          => $request->night,
                    'vendor'         => $request->vendor,
                    'start_date'     => $request->start_date,
                    'end_date'       => $request->end_date,
                    'highlights'     => json_encode($request->highlights),
                    'day_title'      => json_encode($request->d_title),
                    'dat_itinary'    => json_encode($request->description),
                    'p_a_price'      => $request->a_price,
                    'p_c_details'    => $request->c_price,
                    'p_vat'          => $request->vat,
                    'p_ait'          => $request->ait,
                    'p_inclusions'   => json_encode($request->p_inclusions),
                    'p_exclusions'   => json_encode($request->p_exclusions),
                    'p_tnt'          => json_encode($request->p_tnt),
                    'payment_type'   => $request->payment_type,
                    'due'            => $request->due,
                    'vendor_due'            => $request->vendor_due,
                    'pay_details'    => $request->pay_details,
                    'vendor_p_details'     => $request->vendor_p_details,
                    'payment_files'        => json_encode($mergedClientFiles),
                    'vendor_payment_files' => json_encode($mergedVendorFiles),
                    'updated_at'     => now(),
                ]);

            if (!$packageUpdated) {
                DB::rollBack();
                return back()->with('errorMessage', 'Failed to update package. Please try again!!');
            }

            // Calculate updated selling price
            $sellingPrice = $request->c_price + $request->vat + $request->ait;

            // Update accounts table
            $accountUpdated = DB::table('accounts')
                ->where('invoice_id', $request->id)
                ->where('agent_id', Session::get('agent_id'))
                ->where('source', 'Tour Package')
                ->update([
                    'buying_price'  => $request->a_price,
                    'selling_price' => $sellingPrice,
                    'updated_at'    => now(),
                ]);

            if (!$accountUpdated) {
                DB::rollBack();
                return back()->with('errorMessage', 'Failed to update account. Please try again!!');
            }

            DB::commit();
            return redirect()->to('newTourPackage')->with('successMessage', 'Data updated successfully!!');

        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return back()->with('errorMessage', 'Database Error: ' . $ex->getMessage());
        }
    }

    public function deleteTourPackage(Request $request)
    {
        try {
            if (!$request->id) {
                return back()->with('errorMessage', 'Bad Request!!');
            }

            DB::beginTransaction();

            // Soft delete corresponding account record
            DB::table('accounts')
                ->where('invoice_id', $request->id)
                ->where('agent_id', Session::get('agent_id'))
                ->where('source', 'Tour Package')
                ->delete();

            // Soft delete from package_details table
            $packageDeleted = DB::table('package_details')
                ->where('id', $request->id)
                ->where('agent_id', Session::get('agent_id'))
                ->delete();

            if (!$packageDeleted) {
                DB::rollBack();
                return back()->with('errorMessage', 'Failed to delete tour package. Please try again!!');
            }
            DB::commit();
            return redirect()->to('newTourPackage')->with('successMessage', 'Data deleted successfully!!');

        } catch (\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return back()->with('errorMessage', 'Database Error: ' . $ex->getMessage());
        }
    }
    public function viewTourPackage(Request $request){
        try{
            $rows1 = DB::table('package_details')
                ->where('deleted',0)
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            return view('tourPackage.viewTourPackage',['package' => $rows1,'company' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editTourPackagePayment (Request $request){
        try{
            $rows1 = DB::table('package_details')
                ->where('agent_id',Session::get('agent_id'))
                ->where('id',$request->id)
                ->first();
            $rows2 = DB::table('payment_type')
                ->get();
            return view('tourPackage.editTourPackagePayment',['visa' => $rows1,'payment_types' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function updateTourPackagePaymentStatus (Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('package_details')
                        ->where('id', $request->id)
                        ->update([
                            'payment_type' => $request->payment_type,
                            'due' => $request->due,
                            'pay_details' => $request->p_details,
                        ]);
                    if ($result) {
                        return redirect()->to('newTourPackage')->with('successMessage', 'Payment Updated successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public  function searchTourPackageB2b(Request $request){
        $domain =$this->domainCheck();
        $rows1 = DB::table('b2c_tour_package_country')->where('agent_id',$domain['agent_id'])->get();
        $rows2 = DB::table('b2c_tour_package')
            ->where('agent_id',$domain['agent_id'])
            ->where('c_name',$request->country)
            ->get();
        $rows3 = DB::table('b2c_visa')->where('agent_id',$domain['agent_id'])->get();
        $rows4 = DB::table('b2c_visa_country')->where('agent_id',$domain['agent_id'])->get();
        $rows5 = DB::table('b2c_manpower_country')->where('agent_id',$domain['agent_id'])->get();
        $rows6 = DB::table('b2c_manpower')->where('agent_id',$domain['agent_id'])->get();
        $rows7 = DB::table('b2c_hajj_umrah')->where('agent_id',$domain['agent_id'])->get();
        $rows8 = DB::table('b2c_service')->where('agent_id',$domain['agent_id'])->get();
        return view('main-dashboard',
            [
                't_country' => $rows1,'t_package' => $rows2,
                'visas' => $rows3, 'v_country' => $rows4,
                'permits' => $rows6,'m_country' => $rows5,
                'u_package' => $rows7,'services' => $rows8,
                'type' => $request->type,
            ]);
    }
    public  function bookTourPackagePageB2b(Request $request){
        if($request->adult >= 2 && $request->child >= 0){
            $rows4 = DB::table('passengers')
                ->where('deleted',0)
                ->where('upload_by',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->get();
            $rows1 = DB::table('b2c_tour_package')
                ->where('agent_id',Session::get('agent_id'))
                ->where('slug',$request->slug)
                ->first();
            if($rows1)
                return view('tourPackage.bookTourPackagePageB2b',['package' => $rows1,'passengers' => $rows4,'adult' => $request->adult,'child' =>  $request->child]);
            else
                return back()->with('errorMessage', 'Bad Request!!');
        }
        else{
            return back()->with('errorMessage', 'Adult must greater than 2 PAX!!');
        }
    }
    public  function bookTourPackageB2b(Request $request){
        try {
            if ($request) {
                $package = DB::table('b2c_tour_package')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
                $total = $package->p_p_adult * $request->adult + $package->p_p_child * $request->child;
                $agent = DB::table('users')->where('id', Session::get('agent_id'))->first();
                $num = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
                if($total > $agent->agency_amount){
                    return back()->with('errorMessage', 'Please recharge your account to book this tour package!!');
                }
                //dd($package);
                if($agent->agency_amount > $total){
                    $result = DB::table('users')
                        ->where('id', Session::get('agent_id'))
                        ->update([
                            'agency_amount' => $agent->agency_amount - $total,
                        ]);
                    if($result){
                        $invoice = DB::table('package_details')->insert([
                            'agent_id' => Session::get('agent_id'),
                            'p_countries' => $package->c_name,
                            'title' => $package->p_name,
                            'p_code' => $package->p_code,
                            'night' => $package->night,
                            'vendor' => 'Trip Designer',
                            'start_date' => $request->start_date,
                            'end_date' => $request->end_date,
                            'highlights' => $package->highlights,
                            'traveler' => json_encode($request->name),
                            'day_title' => $package->title,
                            'dat_itinary' => $package->itinary,
                            'g_details' => $request->adult + $request->child,
                            'p_a_price' => $total,
                            'p_c_details' => $total,
                            'p_vat' => 0,
                            'p_ait' => 0,
                            'p_inclusions' => $package->inclusion,
                            'p_exclusions' => $package->exclusion,
                            'p_tnt' => $package->tnt,
                            'payment_type' => 'Bank Transfer',
                            'due' => 0,
                            'pay_details' => 'Balanced from wallet - '.$total .'BDT',
                        ]);
                        if ($invoice) {
                            $result1 = DB::table('accounts')->insert([
                                'agent_id' => Session::get('agent_id'),
                                'invoice_id' => $num,
                                'date' => date('Y-m-d'),
                                'transaction_type' => 'Debit',
                                'head' => 'Tour Package',
                                'source' => 'Tour Package',
                                'purpose' => 'Tour Package' . '---' . $package->p_name,
                                'buying_price' => $total,
                                'selling_price' => $total,
                            ]);
                            if ($result1) {
                                $domain =$this->domainCheck();
                                if($domain['agent_id']) {
                                    //dd($request);
                                    $result = DB::table('order_request')->insert([
                                        'agent_id' => $domain['agent_id'],
                                        'r_ref' => $num,
                                        'name' => $agent->company_name,
                                        'email' => $agent->company_email,
                                        'phone' => $agent->company_pnone,
                                        'person' => 'Adult:'.$request->adult .'Child:'. $request->child,
                                        'view' => 'https://tripdesigner.net/tour-package-b2b/'.$package->slug,
                                        'date' => date('Y-m-d'),
                                        'r_type' => "Tour Package",
                                        'status' => 'Ordered',
                                        'order_type' => 'B2B',
                                        'adult' => $request->adult,
                                        'child' => $request->child,
                                        'remarks' =>json_encode('Adult:'.$request->adult .'Child:'. $request->child),
                                    ]);
                                    $to = 'tripdesigner.xyz@gmail.com';
                                    $email_cus = [$agent->company_email];
                                    $email_admin = [$to];
                                    $data = [
                                        'tracking' => $num,
                                        'name' => $agent->company_name,
                                        'email' => $agent->company_email,
                                        'phone' => $agent->company_pnone,
                                        'person' => 'Adult:'.$request->adult .'Child:'. $request->child,
                                        'r_type' => "Tour Package",
                                        'status' => 'Ordered',
                                        'remarks' =>json_encode('Adult:'.$request->adult .'Child:'. $request->child),
                                    ];
                                    if ($result) {
                                        Mail::send('email.customer-order-request', $data, function ($message) use ($email_cus) {
                                            $message->subject("Trip Designer: Order Request Confirmation");
                                            $message->from('sales@tripdesigner.net', 'Tour Package Order');
                                            $message->to($email_cus);
                                        });
                                        Mail::send('email.admin-order-request', $data, function ($message) use ($email_admin,$data) {
                                            $message->subject("Order Request Confirmation Type - ".$data['r_type']);
                                            $message->from('sales@tripdesigner.net', 'Tour Package Order');
                                            $message->to($email_admin);
                                        });
                                        return redirect()->to('newTourPackage')->with('successMessage', 'Tour Package Ordered successfully!!');

                                    } else {
                                        return back()->with('errorMessage', 'Please try again!!');
                                    }
                                }
                                else{
                                    return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
                                }

                            } else {
                                return back()->with('errorMessage', 'Please try again!!');
                            }
                        } else {
                            return back()->with('errorMessage', 'Please try again!!');
                        }
                    }
                }else{
                    return back()->with('errorMessage', 'Please recharge your account to book this tour package!!');
                }

            } else {
                return back()->with('errorMessage', 'Please fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function printTourPackageInvoice(Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('package_details')
                ->where('id',$request->id)
                ->first();
            return view('tourPackage.printTourPackageInvoice',['company' => $rows1,'package' => $rows2,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function downloadB2bTourPackage(Request $request){
        try{
            $num = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
            $package = DB::table('b2c_tour_package')->where('agent_id',Session::get('agent_id'))->where('slug',$request->slug)->first();
            $agent = DB::table('users')->where('id', Session::get('agent_id'))->first();
            $result = DB::table('order_request')->insert([
                'agent_id' => Session::get('agent_id'),
                'r_ref' => $num,
                'name' => $agent->company_name,
                'email' => $agent->company_email,
                'phone' => $agent->phone_code.$agent->company_pnone,
                'person' => $request->adult.' adults and '.$request->child.' child',
                'view' => 'https://tripdesigner.net/tour-package-b2b/'.$package->slug,
                'date' => date('Y-m-d'),
                'r_type' => 'Tour Package',
                'status' => 'Requested',
                'order_type' => 'B2B',
                'adult' => $request->adult,
                'child' => $request->child,
                'remarks' => json_encode('Need tour package for '.$request->adult.' adults and '.$request->child.' child'),
            ]);
            $to = 'tripdesigner.xyz@gmail.com';
            $email_cus = [$agent->company_email];
            $email_admin = [$to];
            $data = [
                'tracking' => $num,
                'name' => $agent->company_name,
                'email' => $agent->company_email,
                'phone' => $agent->phone_code.$agent->company_pnone,
                'person' =>$request->adult.' adults and '.$request->child.' child',
                'r_type' => 'Tour Package',
                'status' => 'Requested',
                'remarks' => json_encode('Need tour package for '.$request->adult.' adults and '.$request->child.' child'),
            ];
            if ($result) {
                Mail::send('email.customer-order-request', $data, function ($message) use ($email_cus) {
                    $message->subject("Trip Designer: Tour Package Order Request");
                    $message->from('sales@tripdesigner.net', 'Tour Package Order');
                    $message->to($email_cus);
                });
                Mail::send('email.admin-order-request', $data, function ($message) use ($email_admin,$data) {
                    $message->subject("Order Request Confirmation Type - ".$data['r_type']);
                    $message->from('sales@tripdesigner.net', 'Tour Package Order');
                    $message->to($email_admin);
                });
                return redirect()->to('orderReceiver')->with('successMessage', 'Tour Package ordered request sent successfully!!');

            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function printB2bTourPackage (Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('b2c_tour_package')
                ->where('slug',$request->slug)
                ->first();
            return view('tourPackage.printB2bTourPackage',['company' => $rows1,'package' => $rows2,'adult' => $request->adult,'child' => $request->child,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
}
