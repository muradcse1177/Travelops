<?php

namespace App\Http\Controllers;

use App\Mail\ServiceLeadMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Support\Facades\Validator;
use App\Mail\StudyAbroadMail;

class homeController extends Controller
{
    protected $domain;
    public function __construct()
    {
        $this->domain = $this->domainCheck();
        if (!$this->domain['valid']) {
            abort(response()->view('frontend.404', [
                'msg' => $this->domain['msg']
            ]));
        }
    }
    protected function domainCheck()
    {
        try {
            // ✅ Detect environment: local / production
            if (app()->environment('local')) {
                // Local testing (e.g. localhost)
                $c_domain = 'tripdesigner.xyz';
            } else {
                // Production or staging — auto detect from request
                $c_domain = request()->getHost();
            }

            // Normalize the domain
            $c_domain = str_replace('www.', '', strtolower($c_domain));

            // Domain lookup
            $rows = DB::table('domain')->where('name', $c_domain)->first();

            if (!$rows || empty($rows->agent_id)) {
                return [
                    'valid' => false,
                    'msg' => 'Your Domain is Not Enlisted in Our Database!!'
                ];
            }

            return [
                'valid' => true,
                'domain' => $rows->name,
                'agent_id' => $rows->agent_id
            ];

        } catch (\Illuminate\Database\QueryException $ex) {
            return [
                'valid' => false,
                'msg' => $ex->getMessage()
            ];
        }
    }


    public function home(Request $request)
    {
        try {
            $domain = $this->domainCheck();

            // যদি domain না মেলে
            if (empty($domain['agent_id'])) {
                return view('frontend.404', [
                    'msg' => 'Your Domain is Not Enlisted in Our Database!!'
                ]);
            }

            $agentId = $domain['agent_id'];

            // 🔹 পূর্বের সব data
            $rows1 = DB::table('airport_details')->get();
            $rows2 = DB::table('b2c_tour_package_country')->where('agent_id', $agentId)->get();
            $rows3 = DB::table('b2c_tour_package')->where('agent_id', $agentId)->inRandomOrder()->take(12)->get();

            $rows4 = DB::table('b2c_visa')->where('agent_id', $agentId)->inRandomOrder()->take(12)->get();
            $rows5 = DB::table('b2c_visa_country')->where('agent_id', $agentId)->get();

            $rows9 = DB::table('b2c_manpower_country')->where('agent_id', $agentId)->get();
            $rows7 = DB::table('b2c_manpower')->where('agent_id', $agentId)->inRandomOrder()->take(12)->get();

            $rows8 = DB::table('b2c_hajj_umrah')->where('agent_id', $agentId)->inRandomOrder()->take(12)->get();
            $rows10 = DB::table('b2c_service')->where('agent_id', $agentId)->get();
            $rows6 = DB::table('b2c_blog')->where('agent_id', $agentId)->inRandomOrder()->take(6)->get();

            $eduCountries = DB::table('edu_countries')->where('agent_id', $agentId)->orderBy('id', 'asc')->get();

            return view('home', [
                'airports'   => $rows1,
                't_country'  => $rows2,
                't_package'  => $rows3,
                'visas'      => $rows4,
                'permits'    => $rows7,
                'u_packages' => $rows8,
                'v_country'  => $rows5,
                'm_country'  => $rows9,
                'blogs'      => $rows6,
                'services'   => $rows10,
                'eduCountries' => $eduCountries, 
            ]);

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function aboutUs(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows6 = DB::table('b2c_blog')->where('agent_id',$domain['agent_id'])->get();
                return view('frontend.about-us', ['blogs' => $rows6]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchTourPackage(Request $request)
    {
        try {
            $domain = $this->domainCheck();

            if ($domain['agent_id']) {

                // Filtered count
                $count = DB::table('b2c_tour_package')
                    ->where('agent_id', $domain['agent_id'])
                    ->where('c_name', $request->country)
                    ->count();

                // Pagination + Full Image URL
                $rows1 = DB::table('b2c_tour_package')
                    ->where('agent_id', $domain['agent_id'])
                    ->where('c_name', $request->country)
                    ->orderBy('p_p_adult', 'asc')
                    ->select('*', DB::raw("CONCAT('" . url('/') . "/', p_c_photo) AS full_image"))
                    ->paginate(20); // ← VERY IMPORTANT

                $rows2 = DB::table('b2c_tour_package_country')
                    ->where('agent_id', $domain['agent_id'])
                    ->get();

                return view('frontend.tour-package', [
                    't_package' => $rows1,
                    't_country' => $rows2,
                    'count' => $count,
                ]);
            } else {
                return view('frontend.404', [
                    'msg' => 'Your Domain is Not Enlisted in Our Database!!'
                ]);
            }
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function tourPackage(Request $request){
        try{
            $domain = $this->domainCheck();

            if($domain['agent_id']){

                // প্রথমে ২০টি ডাটা লোড হবে
                $rows1 = DB::table('b2c_tour_package')
                    ->where('agent_id', $domain['agent_id'])
                    ->select('*', DB::raw("CONCAT('" . url('/') . "/', p_c_photo) AS full_image"))
                    ->paginate(20);



                $rows2 = DB::table('b2c_tour_package_country')
                    ->where('agent_id',$domain['agent_id'])
                    ->get();

                return view('frontend.tour-pack', [
                    't_package' => $rows1,
                    't_country' => $rows2,
                    'count' => $rows1->total(),
                ]);
            } else {
                return view('frontend.404',[
                    'msg' => 'Your Domain is Not Enlisted in Our Database!!'
                ]);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function searchVisa(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows1 = DB::table('b2c_visa')->where('agent_id', $domain['agent_id'])->where('country', $request->country)->first();
                $rows2 = DB::table('b2c_visa_country')->where('agent_id', $domain['agent_id'])->get();
                $rows3 = DB::table('b2c_visa')->where('agent_id', $domain['agent_id'])->inRandomOrder()->limit(5)->get();
                return view('frontend.visa-details', ['visa' => $rows1, 'v_country' => $rows2, 'visas' => $rows3]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchManpower(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                 $count = DB::table('b2c_manpower')->where('agent_id', $domain['agent_id'])->get()->count();
                 $rows1 = DB::table('b2c_manpower')->where('agent_id', $domain['agent_id'])->where('country', $request->country)->get();
                 $rows2 = DB::table('b2c_manpower_country')->where('agent_id', $domain['agent_id'])->get();
                 return view('frontend.work-permit-country', ['v_country' => $rows2, 'visas' => $rows1,'count' => $count,]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function visa(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $count = DB::table('b2c_visa')->where('agent_id', $domain['agent_id'])->get()->count();
                $rows2 = DB::table('b2c_visa_country')->where('agent_id', $domain['agent_id'])->get();
                $rows3 = DB::table('b2c_visa')->where('agent_id', $domain['agent_id'])->get();
                return view('frontend.visa', ['v_country' => $rows2, 'visas' => $rows3, 'count' => $count,]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function manpower(Request $request){
        try{
            $domain =$this->domainCheck();
            if($domain['agent_id'])  {
                $count = DB::table('b2c_manpower')->where('agent_id', $domain['agent_id'])->get()->count();
                $rows2 = DB::table('b2c_manpower_country')->where('agent_id', $domain['agent_id'])->get();
                $rows3 = DB::table('b2c_manpower')->where('agent_id', $domain['agent_id'])->get();
                return view('frontend.work-permit', ['v_country' => $rows2, 'visas' => $rows3, 'count' => $count,]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function service(Request $request){
        try{
            $domain =$this->domainCheck();
            if($domain['agent_id'])  {
                $count = DB::table('b2c_service')->where('agent_id', $domain['agent_id'])->get()->count();
                $rows3 = DB::table('b2c_service')->where('agent_id', $domain['agent_id'])->get();
                $service = DB::table('b2c_service')->where('agent_id', $domain['agent_id'])->where('name', $request->name)->first();
                $service->consultant_info = json_decode($service->consultant_info ?? '[]', true);
                $service->review_info = json_decode($service->review_info ?? '[]', true);

                return view('frontend.service-details', ['services' => $rows3,'ser' => $service, 'count' => $count,]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function hajjUmrah(Request $request){
        try{
            $domain =$this->domainCheck();
            if($domain['agent_id'])  {
                $count = DB::table('b2c_hajj_umrah')->where('agent_id', $domain['agent_id'])->get()->count();
                $rows3 = DB::table('b2c_hajj_umrah')->where('agent_id', $domain['agent_id'])->orderBy('p_p_adult','asc')->get();
                return view('frontend.hajj-umrah', ['t_package' => $rows3, 'count' => $count,]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function services(Request $request){
        try{
            $domain =$this->domainCheck();
            if($domain['agent_id'])  {
                $count = DB::table('b2c_service')->where('agent_id', $domain['agent_id'])->get()->count();
                $rows3 = DB::table('b2c_service')->where('agent_id', $domain['agent_id'])->get();
                $rows4 = DB::table('b2c_service')->where('agent_id', $domain['agent_id'])->where('name', $request->name)->first();
                return view('frontend.services', ['services' => $rows3,'ser' => $rows4, 'count' => $count,]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchTourPackageBySlug(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows1 = DB::table('b2c_tour_package')->where('agent_id', $domain['agent_id'])->where('slug', $request->slug)->first();
                $rows2 = DB::table('b2c_tour_package')->where('agent_id', $domain['agent_id'])->where('c_name', $rows1->c_name)->take(10)->get();
                return view('frontend.tour-package-details', ['package' => $rows1, 't_package' => $rows2]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchVisaBySlug(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows1 = DB::table('b2c_visa')->where('agent_id', $domain['agent_id'])->where('slug', $request->slug)->first();
                $rows2 = DB::table('b2c_visa_country')->where('agent_id', $domain['agent_id'])->get();
                $rows3 = DB::table('b2c_visa')->where('agent_id', $domain['agent_id'])->inRandomOrder()->limit(5)->get();
                return view('frontend.visa-details', ['visa' => $rows1, 'v_country' => $rows2, 'visas' => $rows3]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchHajjUmrahBySlug(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows1 = DB::table('b2c_hajj_umrah')->where('agent_id', $domain['agent_id'])->where('slug', $request->slug)->first();
                $rows3 = DB::table('b2c_hajj_umrah')->where('agent_id', $domain['agent_id'])->inRandomOrder()->limit(5)->get();
                return view('frontend.hajj-umrah-details', ['package' => $rows1, 't_package' => $rows3]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchHajjUmrahPackage(Request $request){
        try{
             $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows1 = DB::table('b2c_hajj_umrah')->where('agent_id', $domain['agent_id'])->where('type', $request->type)->orderBy('p_p_adult','asc')->get();
                $count = DB::table('b2c_hajj_umrah')->where('agent_id', $domain['agent_id'])->get()->count();
                return view('frontend.hajj-umrah', ['package' => $rows1, 't_package' => $rows1,'count' => $count]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchManpowerBySlug(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows1 = DB::table('b2c_manpower')->where('agent_id', $domain['agent_id'])->where('slug', $request->slug)->first();
                $rows2 = DB::table('b2c_manpower_country')->where('agent_id', $domain['agent_id'])->get();
                $rows3 = DB::table('b2c_manpower')->where('agent_id', $domain['agent_id'])->inRandomOrder()->limit(5)->get();
                return view('frontend.manpower-details', ['visa' => $rows1, 'v_country' => $rows2, 'visas' => $rows3]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchServiceBySlug(Request $request)
    {
        try {
            $domain = $this->domainCheck();

            // ডোমেইন চেক
            if (!$domain['agent_id']) {
                return view('frontend.404', [
                    'msg' => 'Your Domain is Not Enlisted in Our Database!!'
                ]);
            }

            // নির্দিষ্ট slug অনুযায়ী সার্ভিস খোঁজা
            $service = DB::table('b2c_service')
                ->where('agent_id', $domain['agent_id'])
                ->where('slug', $request->slug)
                ->first();

            if (!$service) {
                return view('frontend.404', [
                    'msg' => 'Sorry, this service could not be found!'
                ]);
            }

            // সব সার্ভিস (related services হিসেবে)
            $services = DB::table('b2c_service')
                ->where('agent_id', $domain['agent_id'])
                ->where('id', '!=', $service->id)
                ->take(10)
                ->get();

            $count = DB::table('b2c_service')
                ->where('agent_id', $domain['agent_id'])
                ->count();

            // এখন review + consultant info decode করা যাবে frontend এ
            $service->consultant_info = json_decode($service->consultant_info ?? '[]', true);
            $service->review_info = json_decode($service->review_info ?? '[]', true);

            return view('frontend.service-details', [
                'ser' => $service,
                'services' => $services,
                'count' => $count,
            ]);

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchBlogBySlug(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows1 = DB::table('b2c_blog')->where('agent_id', $domain['agent_id'])->where('slug', $request->slug)->first();
                $rows3 = DB::table('b2c_blog')->where('agent_id', $domain['agent_id'])->inRandomOrder()->limit(5)->get();
                return view('frontend.blog', ['blog' => $rows1, 'blogs' => $rows3,]);
            }
            else{
                    return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
                }
            }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchCourseBySlug(Request $request){
        try{
            $rows1 = DB::table('new_course_details')->where('slug', $request->slug)->where('status', 1)->first();
            $rows3 = DB::table('new_course_details')->inRandomOrder()->where('status', 1)->limit(5)->get();
            return view('frontend.course-details', ['course' => $rows1, 'courses' => $rows3,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function orderRequest(Request $request){
        try{
            //dd($request);
            $domain =$this->domainCheck();
            $num = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
             if($domain['agent_id'])  {
                 //dd($request);
                $result = DB::table('order_request')->insert([
                    'agent_id' => $domain['agent_id'],
                    'r_ref' => $num,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'person' => 'Adult:'.$request->adult .', Child:'. $request->child.', Infant:'. $request->infant,
                    'view' => $request->view,
                    'date' => date('Y-m-d'),
                    'r_type' => $request->r_type,
                    'status' => 'Requested',
                    'order_type' => 'B2C',
                    'adult' => $request->adult,
                    'child' => $request->child,
                    'infant' => $request->infant,
                    'remarks' => json_encode($request->remarks),
                ]);
                $to = 'tripdesigner.xyz@gmail.com';
                $email_cus = [$request->email];
                $email_admin = [$to];
                $data = [
                    'tracking' => $num,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'person' => 'Adult:'.$request->adult .', Child:'. $request->child.', Infant:'. $request->infant,
                    'r_type' => $request->r_type,
                    'status' => 'Requested',
                    'remarks' => json_encode($request->remarks),
                ];
                if ($result) {
                    Mail::send('email.customer-order-request', $data, function ($message) use ($email_cus) {
                        $message->subject("Trip Designer: Order Request Confirmation");
                        $message->from('sales@tripdesigner.net', 'Sales-Trip Designer');
                        $message->to($email_cus);
                    });
                    Mail::send('email.admin-order-request', $data, function ($message) use ($email_admin,$data) {
                        $message->subject("Order Request Confirmation Type - ".$data['r_type']);
                        $message->from('sales@tripdesigner.net', 'Sales-Trip Designer');
                        $message->to($email_admin);
                    });
                    return view('frontend.success-order-request', ['data' => $data,'successMessage' => 'Your Request Sent Successfully!! Please check your email']);

                } else {
                    return back()->with('errorMessage', 'Please try again!!');
                }
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function tourClientDetails(Request $request){
        try{
            $domain =$this->domainCheck();
            if($domain['agent_id'])  {
                if (Session::get('user_id')) {
                    $adult = $request->adult;
                    $child = $request->child;
                    $url = $request->view;
                    $checkin = $request->checkin;
                    $checkout = $request->checkout;
                    $lastSegment = collect(explode('/', $url))->last();
                    $rows1 = DB::table('b2c_tour_package')->where('agent_id', $domain['agent_id'])->where('slug', $lastSegment)->first();
                    return view('frontend.tour-booking-details',['checkin' => $checkin,'checkout' => $checkout,'adult' => $adult,'child' => $child,'tour_details' => $rows1]);
                }
                else{
                    return redirect()->to('all-login')->with('errorMessage', 'Please login first!! Then book your tour packages.');
                }
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function contactUS(Request $request)
    {
        // ============ CAPTCHA VERIFICATION (NO LIBRARY, NO .ENV) ============
        $recaptcha = $request->input('g-recaptcha-response');

        if (!$recaptcha) {
            return back()->with('errorMessage', 'Please verify that you are not a robot.');
        }

        // Your Secret Key
        $secretKey = "6Ld05CIsAAAAABYXOa89RYb70YyQR4nxILZZ08cy";

        $verifyURL = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptcha}";
        $response = file_get_contents($verifyURL);
        $responseData = json_decode($response);

        if (!$responseData->success) {
            return back()->with('errorMessage', 'Captcha verification failed! Please try again.');
        }
        // =====================================================================

        try {
            $domain = $this->domainCheck();

            if ($domain['agent_id']) {

                $result = DB::table('contact_us')->insert([
                    'agent_id' => $domain['agent_id'],
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'phone'    => $request->phone,
                    'subject'  => $request->subject,
                    'query'    => json_encode($request->ask),
                ]);

                $from = 'tripdesigner.xyz@gmail.com';
                $email = [$from, $request->email];

                $data = [
                    'name'    => $request->name,
                    'email'   => $request->email,
                    'phone'   => $request->phone,
                    'subject' => $request->subject,
                    'query'   => json_encode($request->ask),
                ];

                // Check subscriber exists
                $rows = DB::table('subcriber')->where('agent_id', $domain['agent_id'])->count();

                if ($rows < 1) {
                    DB::table('subcriber')->insert([
                        'email' => $request->email,
                    ]);
                }

                if ($result) {

                    Mail::send('email.contact-us', $data, function ($message) use ($email) {
                        $message->subject("Trip Designer: Message Confirmation Email");
                        $message->from('sales@tripdesigner.net', 'Sales-Trip Designer');
                        $message->to($email);
                    });

                    return redirect()->to('contact-us')->with(
                        'successMessage',
                        'Your Query Sent Successfully!! Please check your email.'
                    );
                } else {
                    return back()->with('errorMessage', 'Please try again!!');
                }
            } else {
                return view('frontend.404', [
                    'msg' => 'Your Domain is Not Enlisted in Our Database!!'
                ]);
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        } catch (\Exception $ex) {
            return back()->with('errorMessage', 'Something went wrong: ' . $ex->getMessage());
        }
    }

    public function subscribe(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {

                $from = 'tripdesigner.xyz@gmail.com';
                $email = [$from, $request->email,];
                $data = [
                    'email' => $request->email,
                ];
                $rows = DB::table('subcriber')->where('email', $request->email)->get()->count();
                if ($rows < 1) {
                    $result = DB::table('subcriber')->insert([
                        'agent_id' => $domain['agent_id'],
                        'email' => $request->email,
                    ]);
                    if ($result) {
                        Mail::send('email.subscriber', $data, function ($message) use ($email) {
                            $message->subject("Trip Designer: Subscriber Notification");
                            $message->from('sales@tripdesigner.net', 'Sales-Trip Designer');
                            $message->to($email);
                        });
                        return redirect()->to('contact-us')->with('successMessagee', 'Thanks to subscribing us! We shall send discount and other notification to you !!');
                    } else {
                        return redirect()->to('contact-us')->with('errorMessagee', 'Please try again!!');
                    }
                } else {
                    return redirect()->to('contact-us')->with('errorMessagee', 'Your Email Already Exits!! No need to subscribe Again!');
                }
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function privacyPolicy(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows6 = DB::table('b2c_blog')->where('agent_id', $domain['agent_id'])->get();
                return view('frontend.privacy-policy', ['blogs' => $rows6]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function refundPolicy(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows6 = DB::table('b2c_blog')->where('agent_id', $domain['agent_id'])->get();
                return view('frontend.refund-policy', ['blogs' => $rows6]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function termsCondition(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows6 = DB::table('b2c_blog')->where('agent_id', $domain['agent_id'])->get();
                return view('frontend.terms-conditions', ['blogs' => $rows6]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function CookiePolicy(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows6 = DB::table('b2c_blog')->where('agent_id', $domain['agent_id'])->get();
                return view('frontend.cookie-policy', ['blogs' => $rows6]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function blogs(Request $request){
        try{
            $domain =$this->domainCheck();
             if($domain['agent_id'])  {
                $rows6 = DB::table('b2c_blog')->where('agent_id', $domain['agent_id'])->orderBy('id', 'desc')->paginate(12);
                return view('frontend.blogs', ['blogs' => $rows6]);
            }
            else{
                return view('frontend.404',['msg' => 'Your Domain is Not Enlisted in Our Database!!']);
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function studyAbroad(Request $request)
    {
        try {
            $domain = $this->domainCheck();

            // ✅ Check agent_id from domain
            if ($domain['agent_id']) {

                // ✅ Fetch only that agent's countries
                $countries = DB::table('edu_countries')
                    ->select(
                        'id',
                        'country_name',
                        'slug',
                        'cover_photo',
                        'page_photo',
                        'international_students',
                        'happiness_ranking',
                        'employment_rate'
                    )
                    ->where('agent_id', $domain['agent_id'])
                    ->whereNotNull('country_name')
                    ->orderBy('id', 'asc')
                    ->get();

                $count = $countries->count();

                return view('frontend.study-abroad', [
                    'countries' => $countries,
                    'count' => $count,
                    'domain' => $domain['domain'], // 👈 use only domain string if you store that way
                ]);
            } else {
                // ✅ If domain not found or not enlisted
                return view('frontend.404', [
                    'msg' => 'Your Domain is Not Enlisted in Our Database!!'
                ]);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function universityList($slug)
    {
        $domain = $this->domainCheck();

        $country = DB::table('edu_countries')->where('slug', $slug)->first();
        if(!$country){
            return view('frontend.404', ['msg' => 'Country not found!']);
        }

        $universities = DB::table('edu_universities')
            ->where('edu_country_id', $country->id)
            ->orderBy('university_name','asc')
            ->paginate(40);

        $allCountries = DB::table('edu_countries')->select('id','country_name') ->orderBy('id','asc')->get();

        return view('frontend.universityList', [
            'country' => $country,
            'universities' => $universities,
            'allCountries' => $allCountries,
            'count' => $universities->total(),
            'domain' => $domain
        ]);
    }
    public function searchUniversity(Request $request)
    {
        $domain = $this->domainCheck();

        $countryId = $request->input('country');
        $country = DB::table('edu_countries')->where('id', $countryId)->first();
        if(!$country){
            return view('frontend.404', ['msg' => 'Country not found!']);
        }
        $universities = DB::table('edu_universities')
            ->where('edu_country_id', $country->id)
            ->orderBy('university_name', 'asc')
            ->paginate(40);

        $allCountries = DB::table('edu_countries')
            ->select('id','country_name')
            ->orderBy('id','asc')
            ->get();

        return view('frontend.universityList', [
            'country' => $country,
            'universities' => $universities,
            'allCountries' => $allCountries,
            'count' => $universities->total(),
            'domain' => $domain
        ]);
    }

    public function getUniversitiesByCountry(Request $request)
    {
        try {
            $countryId = $request->input('country_id');

            if (!$countryId) {
                return response()->json([], 200);
            }

            $universities = DB::table('edu_universities')
                ->select('id', 'university_name')
                ->where('edu_country_id', $countryId)
                ->orderBy('university_name', 'asc')
                ->get();

            return response()->json($universities, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function courseList($slug)
    {
        try {
            $domain = $this->domainCheck();


            // ✅ Get University by slug (explicit select for safety)
            $university = DB::table('edu_universities')
                ->select('id', 'university_name', 'slug', 'edu_country_id', 'logo')
                ->where('slug', $slug)
                ->first();

            if (!$university) {
                return view('frontend.404', ['msg' => 'University not found!']);
            }


            // ✅ Get Country info
            $country = DB::table('edu_countries')
                ->select('id', 'country_name', 'slug')
                ->where('id', $university->edu_country_id)
                ->first();

            // ✅ Get all courses for that university
            $courses = DB::table('edu_course')
                ->select('id', 'course_name', 'cover_photo', 'duration', 'tuition_fees', 'final_tuition_fee','course_slug','course_type')
                ->where('edu_university_id', $university->id)
                ->orderBy('course_name', 'asc')
                ->paginate(40);
                
            // ✅ Dropdown Data
            $allCountries = DB::table('edu_countries')
                ->select('id', 'country_name')
                ->orderBy('country_name', 'asc')
                ->get();

            $allUniversities = DB::table('edu_universities')
                ->select('id', 'university_name')
                ->where('edu_country_id', $university->edu_country_id)
                ->orderBy('university_name', 'asc')
                ->get();
            return view('frontend.courseList', [
                'university' => $university,
                'country' => $country,
                'courses' => $courses,
                'allCountries' => $allCountries,
                'universities' => $allUniversities,
                'domain' => $domain
            ]);

        } catch (\Exception $e) {
            return back()->with('errorMessage', $e->getMessage());
        }
    }
    public function searchUniversityCourse(Request $request)
    {
        try {
            $domain = $this->domainCheck();

            $countryId = $request->input('country');
            $universityId = $request->input('university');

            // ✅ Country check
            $country = DB::table('edu_countries')
                ->select('id', 'country_name', 'slug')
                ->where('id', $countryId)
                ->first();

            if (!$country) {
                return view('frontend.404', ['msg' => 'Country not found!']);
            }

            // ✅ University check
            $university = DB::table('edu_universities')
                ->select('id', 'university_name', 'slug', 'edu_country_id', 'logo')
                ->where('id', $universityId)
                ->where('edu_country_id', $countryId)
                ->first();

            if (!$university) {
                return view('frontend.404', ['msg' => 'University not found!']);
            }

            // ✅ Get all courses for that university
            $courses = DB::table('edu_course')
                ->select('id', 'course_name', 'cover_photo', 'duration', 'tuition_fees', 'final_tuition_fee', 'course_slug', 'course_type')
                ->where('edu_university_id', $university->id)
                ->orderBy('course_name', 'asc')
                ->paginate(40);

            // ✅ Dropdown Data
            $allCountries = DB::table('edu_countries')
                ->select('id', 'country_name')
                ->orderBy('country_name', 'asc')
                ->get();

            $allUniversities = DB::table('edu_universities')
                ->select('id', 'university_name')
                ->where('edu_country_id', $countryId)
                ->orderBy('university_name', 'asc')
                ->get();

            // ✅ Return to same view
            return view('frontend.courseList', [
                'university' => $university,
                'country' => $country,
                'courses' => $courses,
                'allCountries' => $allCountries,
                'universities' => $allUniversities,
                'domain' => $domain
            ]);

        } catch (\Exception $e) {
            return back()->with('errorMessage', $e->getMessage());
        }
    }

    public function courseDetails($university_slug, $course_type, $course_slug)
    {
        try {
            $domain = $this->domainCheck();

            $university = DB::table('edu_universities')
                ->select('id', 'university_name', 'slug', 'edu_country_id', 'logo') 
                ->where('slug', $university_slug)
                ->first();

            if (!$university) {
                return view('frontend.404', ['msg' => 'University not found!']);
            }

            $course = DB::table('edu_course')
                ->select(
                    'id',
                    'course_name',
                    'course_slug',
                    'course_type',
                    'duration',
                    'cover_photo',
                    'tuition_fees',
                    'final_tuition_fee',
                    'course_overview',
                    'key_program_highlights',
                    'requirements',
                    'campus',
                    'mode_of_study'
                )
                ->where('edu_university_id', $university->id)
                ->where('course_slug', $course_slug)
                ->first();

            if (!$course) {
                return view('frontend.404', ['msg' => 'Course not found!']);
            }

            // ✅ Country তথ্য আনা
            $country = DB::table('edu_countries')
                ->select('id', 'country_name', 'slug')
                ->where('id', $university->edu_country_id)
                ->first();

            // ✅ Related Courses (একই university থেকে)
            $relatedCourses = DB::table('edu_course')
                ->select('course_name', 'course_slug', 'course_type', 'cover_photo')
                ->where('edu_university_id', $university->id)
                ->where('id', '!=', $course->id)
                ->limit(5)
                ->get();
            $allCountries = DB::table('edu_countries')->select('id','country_name')->orderBy('id','asc')->get();
            $universities = DB::table('edu_universities')->select('id','university_name')->where('edu_country_id', $university->edu_country_id)->orderBy('university_name','asc')->get();

            return view('frontend.edu_course_details', [
                'domain' => $domain,
                'university' => $university,
                'country' => $country,
                'course' => $course,
                'relatedCourses' => $relatedCourses,
                'allCountries' => $allCountries,
                'universities' => $universities,
            ]);

        } catch (\Exception $e) {
            return back()->with('errorMessage', $e->getMessage());
        }
    }
    public function applyNow($slug, $courseType, $courseSlug)
    {
        $domain = $this->domainCheck();

        // ✅ Get course info by slug
        $course = DB::table('edu_course')
            ->where('course_slug', $courseSlug)
            ->first();

        if(!$course){
            return view('frontend.404', ['msg' => 'Course not found!']);
        }

        $university = DB::table('edu_universities')
            ->where('id', $course->edu_university_id)
            ->select('id', 'university_name', 'slug')
            ->first();

        $country = DB::table('edu_countries')
            ->where('id', $course->edu_country_id)
            ->select('id', 'country_name', 'slug')
            ->first();

        return view('frontend.applyForm', [
            'domain' => $domain,
            'course' => $course,
            'university' => $university,
            'country' => $country
        ]);
    }


    public function submitApplication(Request $request)
    {
        // 🔹 Step 1: Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'country_code' => 'nullable|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:120',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('errorMessage', 'Please correct the errors below and try again.');
        }

        try {
            // 🔹 Step 2: Generate Tracking ID
            do {
                $trackingId = 'TD' . rand(10000000, 99999999);
            } while (DB::table('edu_applications')->where('tracking_id', $trackingId)->exists());

            // 🔹 Step 3: Academic Info JSON
            $academic = [
                'ssc' => [
                    'result' => $request->ssc_result,
                    'outof' => $request->ssc_outof,
                    'year' => $request->ssc_year,
                    'institute' => $request->ssc_institute,
                    'group' => $request->ssc_group,
                ],
                'hsc' => [
                    'result' => $request->hsc_result,
                    'outof' => $request->hsc_outof,
                    'year' => $request->hsc_year,
                    'institute' => $request->hsc_institute,
                    'group' => $request->hsc_group,
                ],
                'honors' => [
                    'result' => $request->honors_result,
                    'outof' => $request->honors_outof,
                    'year' => $request->honors_year,
                    'institute' => $request->honors_institute,
                    'group' => $request->honors_group,
                ],
                'masters' => [
                    'result' => $request->masters_result,
                    'outof' => $request->masters_outof,
                    'year' => $request->masters_year,
                    'institute' => $request->masters_institute,
                    'group' => $request->masters_group,
                ],
            ];

            // 🔹 Step 4: English Test JSON
            $english_test = [
                'test_type' => $request->test_type,
                'speaking' => $request->speaking,
                'writing' => $request->writing,
                'listening' => $request->listening,
                'overall' => $request->overall,
            ];

            // 🔹 Step 5: Domain Check
            $domain = $this->domainCheck();

            // 🔹 Step 6: Handle User (create if not exists)
            $email = $request->email;
            $defaultPassword = 'default123';
            $user = DB::table('users')->where('company_email', $email)->first();
            $currentDomain = parse_url(request()->fullUrl(), PHP_URL_HOST);
            $domainData = DB::table('domain')->where('name', $currentDomain)->where('status', 1)->first();
            $agentId = $domainData->agent_id ?? null;

            if (!$user) {
                $userId = DB::table('users')->insertGetId([
                    'company_name'   => $request->name,
                    'company_email'  => $email,
                    'phone_code'     => $request->country_code ?? '+88',
                    'company_pnone'  => $request->phone,
                    'password'       => Hash::make($defaultPassword),
                    'status'         => 'Active',
                    'role'           => 3,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);

                $user = DB::table('users')->where('id', $userId)->first();

                // ✅ Get domain-based agent_id

                // ✅ Log & Send SMS
                $number = '88' . $request->phone;
                $msg = "Welcome to our Study Abroad Platform! Your account has been created successfully. Email: {$user->company_email} | Password: {$defaultPassword}";

                DB::table('sms_log')->insert([
                    'agent_id' => $agentId,
                    'number'   => $number,
                    'sms'      => $msg,
                    'status'   => 'Sent',
                    'time'     => now(),
                ]);

                $this->sms_send($number, $msg);

                // ✅ Send Welcome Email
                $company = DB::table('users')->where('id', $agentId)->first();

                // Course info join
                $course = DB::table('edu_course')->where('id', $request->course_id)->first();
                $university = DB::table('edu_universities')->where('id', $course->edu_university_id ?? 0)->first();
                $country = DB::table('edu_countries')->where('id', $course->edu_country_id ?? 0)->first();

                $application = (object)[
                    'tracking_id' => $trackingId,
                    'name' => $request->name,
                    'course_name' => $course->course_name ?? 'N/A',
                    'university_name' => $university->university_name ?? 'N/A',
                    'country_name' => $country->country_name ?? 'N/A',
                    'country_code' => $request->country_code ?? '+88',
                    'phone' => $request->phone,
                    'email' => $request->email,
                ];

                try { Mail::to($user->company_email)->send(new StudyAbroadMail($application, $user, $defaultPassword, $company)); } catch (\Exception $e) { \Log::error('StudyAbroadMail failed: '.$e->getMessage()); }
            }
            else {
                $userId = $user->id;

                // ✅ Send Confirmation Email (if already exists)
                $course = DB::table('edu_course')->where('id', $request->course_id)->first();
                $university = DB::table('edu_universities')->where('id', $course->edu_university_id ?? 0)->first();
                $country = DB::table('edu_countries')->where('id', $course->edu_country_id ?? 0)->first();

                $application = (object)[
                    'tracking_id' => $trackingId,
                    'name' => $request->name,
                    'course_name' => $course->course_name ?? 'N/A',
                    'university_name' => $university->university_name ?? 'N/A',
                    'country_name' => $country->country_name ?? 'N/A',
                    'country_code' => $request->country_code ?? '+88',
                    'phone' => $request->phone,
                    'email' => $request->email,
                ];

                $currentDomain = parse_url(request()->fullUrl(), PHP_URL_HOST);
                $company = DB::table('users')->where('id', $agentId)->first();

                $defaultPassword = 0;
                try { Mail::to($user->company_email)->send(new StudyAbroadMail($application, $user, $defaultPassword, $company)); } catch (\Exception $e) { \Log::error('StudyAbroadMail failed: '.$e->getMessage()); }
            }
            $company = DB::table('users')->where('id', $agentId)->first();
            $adminEmail = $company->company_email ?? 'tripdesigner.xyz@gmail.com';

            try {
                Mail::to($adminEmail)->send(new \App\Mail\AdminStudyAbroadMail($application, $user, $company));
            } catch (\Exception $e) { \Log::error('AdminStudyAbroadMail failed: '.$e->getMessage()); }
            // 🔹 Step 7: Insert Application
            DB::table('edu_applications')->insert([
                'tracking_id' => $trackingId,
                'course_id' => $request->course_id,
                'university_id' => $request->university_id,
                'country_id' => $request->country_id,
                'name' => $request->name,
                'country_code' => $request->country_code ?? '+88',
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'academic_info' => json_encode($academic),
                'english_test' => json_encode($english_test),
                'referred_by' => $request->referred_by,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('successMessage', "✅ Application submitted successfully! Your Tracking ID: {$trackingId}");

        } catch (\Exception $e) {
            return back()->with('errorMessage', '❌ Error: ' . $e->getMessage())->withInput();
        }
    }

    function sms_send($number,$msg) {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "1Nosb4Kj8zSU5iuoCqP4";
        $senderid = "8809617611061";
        $number = $number;
        $message = $msg;
        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function studyAbroadForm()
    {
        $countries = DB::table('edu_countries')
            ->select('id', 'country_name')
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.studyAbroadApplication', compact('countries'));
    }


    // ✅ AJAX: Universities by Country
    public function getUniversities($country_id)
    {
        $universities = DB::table('edu_universities')
            ->where('edu_country_id', $country_id)
            ->select('id', 'university_name')
            ->orderBy('university_name', 'asc')
            ->get();

        return response()->json($universities);
    }


    // ✅ AJAX: Courses by University
    public function getCourses($university_id)
    {
        $courses = DB::table('edu_course')
            ->where('edu_university_id', $university_id)
            ->select('id', 'course_name', 'course_type')
            ->orderBy('course_name', 'asc')
            ->get();

        return response()->json($courses);
    }
    public function submitAbroadApplication(Request $request)
    {
        // ✅ Validation
        $validator = Validator::make($request->all(), [
            'country_id' => 'required|numeric',
            'university_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'name' => 'required|string|max:150',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // ✅ Unique Tracking ID
            do {
                $trackingId = 'TD' . rand(10000000, 99999999);
            } while (DB::table('edu_applications')->where('tracking_id', $trackingId)->exists());

            // ✅ Academic Info JSON
            $academic = [
                'ssc' => [
                    'result' => $request->ssc_result,
                    'outof' => $request->ssc_outof,
                    'year' => $request->ssc_year,
                    'institute' => $request->ssc_institute,
                    'group' => $request->ssc_group,
                ],
                'hsc' => [
                    'result' => $request->hsc_result,
                    'outof' => $request->hsc_outof,
                    'year' => $request->hsc_year,
                    'institute' => $request->hsc_institute,
                    'group' => $request->hsc_group,
                ],
                'honors' => [
                    'result' => $request->honors_result,
                    'outof' => $request->honors_outof,
                    'year' => $request->honors_year,
                    'institute' => $request->honors_institute,
                    'group' => $request->honors_group,
                ],
                'masters' => [
                    'result' => $request->masters_result,
                    'outof' => $request->masters_outof,
                    'year' => $request->masters_year,
                    'institute' => $request->masters_institute,
                    'group' => $request->masters_group,
                ],
            ];

            // ✅ English Test JSON
            $english_test = [
                'test_type' => $request->test_type,
                'speaking' => $request->speaking,
                'writing' => $request->writing,
                'listening' => $request->listening,
                'overall' => $request->overall,
            ];

            // ✅ Domain Info
            $domain = $this->domainCheck();
            $currentDomain = parse_url(request()->fullUrl(), PHP_URL_HOST);
            $domainData = DB::table('domain')->where('name', $currentDomain)->where('status', 1)->first();
            $agentId = $domainData->agent_id ?? null;
            $company = DB::table('users')->where('id', $agentId)->first();

            // ✅ User Handling
            $email = $request->email;
            $defaultPassword = 'default123';
            $user = DB::table('users')->where('company_email', $email)->first();

            if (!$user) {
                // ➕ Create new user
                $userId = DB::table('users')->insertGetId([
                    'company_name'   => $request->name,
                    'company_email'  => $email,
                    'phone_code'     => '+88',
                    'company_pnone'  => $request->phone,
                    'password'       => Hash::make($defaultPassword),
                    'status'         => 'Active',
                    'role'           => 3,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);

                $user = DB::table('users')->where('id', $userId)->first();

                // ✅ Send SMS
                $number = '88' . $request->phone;
                $msg = "Welcome to our Study Abroad Platform! Your account has been created successfully. Email: {$user->company_email} | Password: {$defaultPassword}";

                DB::table('sms_log')->insert([
                    'agent_id' => $agentId,
                    'number'   => $number,
                    'sms'      => $msg,
                    'status'   => 'Sent',
                    'time'     => now(),
                ]);

                $this->sms_send($number, $msg);
            } else {
                $defaultPassword = 0;
            }

            // ✅ Course & Related Info
            $course = DB::table('edu_course')->where('id', $request->course_id)->first();
            $university = DB::table('edu_universities')->where('id', $course->edu_university_id ?? 0)->first();
            $country = DB::table('edu_countries')->where('id', $course->edu_country_id ?? 0)->first();

            $application = (object)[
                'tracking_id' => $trackingId,
                'name' => $request->name,
                'course_name' => $course->course_name ?? 'N/A',
                'university_name' => $university->university_name ?? 'N/A',
                'country_name' => $country->country_name ?? 'N/A',
                'country_code' => '+88',
                'phone' => $request->phone,
                'email' => $request->email,
            ];

            // ✅ Send Confirmation Mail to Student
            try { Mail::to($user->company_email)->send(new StudyAbroadMail($application, $user, $defaultPassword, $company)); } catch (\Exception $e) { \Log::error('StudyAbroadMail failed: '.$e->getMessage()); }

            // ✅ Send Notification Mail to Admin
            $adminEmail = $company->company_email ?? 'info@tripdesigner.net';
            try { Mail::to($adminEmail)->send(new \App\Mail\AdminStudyAbroadMail($application, $user, $company)); } catch (\Exception $e) { \Log::error('AdminStudyAbroadMail failed: '.$e->getMessage()); }

            // ✅ Insert Application
            DB::table('edu_applications')->insert([
                'tracking_id' => $trackingId,
                'course_id' => $request->course_id,
                'university_id' => $request->university_id,
                'country_id' => $request->country_id,
                'name' => $request->name,
                'country_code' => '+88',
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'academic_info' => json_encode($academic),
                'english_test' => json_encode($english_test),
                'referred_by' => $request->referred_by,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('successMessage', "✅ Application submitted successfully! Your Tracking ID: {$trackingId}");

        } catch (\Exception $e) {
            return back()->with('errorMessage', '❌ Error: ' . $e->getMessage())->withInput();
        }
    }


    public function getAirportDetails(Request $request){
        try{
            $code = $request->code;
            $rows = DB::table('airport_details')
                ->where('iata_codes', $code)
                ->orWhere('name', 'like', '%'.$code)
                ->orWhere('city', 'like', '%'.$code)
                ->orWhere('country', 'like', '%'.$code)
                ->get();
            $div = '<ul id="suggest-list">';
            $div1="";
            foreach ($rows as $row) {
                $coma= ',';
                $cod_city = "selectCountry('$row->iata_codes$coma$row->city')";
                $div1 =$div1.'<li onClick="'.$cod_city.'">'. $row->iata_codes.','.$row->name.','.$row->city.'</li>';
            }
             $div = $div.$div1.'</ul>';

            return $div;
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function getAirportDetails1(Request $request){
        try{
            $code = $request->code;
            $rows = DB::table('airport_details')
                ->where('iata_codes', $code)
                ->orWhere('name', 'like', '%'.$code)
                ->orWhere('city', 'like', '%'.$code)
                ->orWhere('country', 'like', '%'.$code)
                ->get();
            $div = '<ul id="suggest-list1">';
            $div1="";
            foreach ($rows as $row) {
                $coma= ',';
                $cod_city = "selectCountry1('$row->iata_codes$coma$row->city')";
                $div1 =$div1.'<li onClick="'.$cod_city.'">'. $row->iata_codes.','.$row->name.','.$row->city.'</li>';
            }
             $div = $div.$div1.'</ul>';

            return $div;
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function adult(Request $request){

    }
    public function getCurlResult($url, $data, $headers){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        dd($response);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $decoded_response = json_decode(($response));
//                dd($decoded_response);
            return $decoded_response;
        }
        curl_close($ch);
    }
    public function flightSearchResult(Request $request){
        try{
            if($request->departure) {
                //return view('frontend.flight-search-result');
                Session::forget('flight_arr');
                $dep_city = $request->departure;
                $arr_city = $request->arrival;
                $dep_date = trim($request->dep_date);
                $adt = trim($request->adult);
                $chd = trim($request->child);
                $inf = trim($request->infant);
                $f_class = trim($request->f_class);
                $f_type = trim($request->f_type);
                $exp_dep_city = explode(",", $dep_city);
                $tr_exp_dep_city = trim($exp_dep_city[0]);
                $exp_arr_city = explode(",", $arr_city);
                $tr_exp_arr_city = trim($exp_arr_city[0]);
                $flight_arr['dep_city'] = $dep_city;
                $flight_arr['arr_city'] = $arr_city;
                $flight_arr['dep_date'] = $dep_date;
                $flight_arr['adt'] = $adt;
                $flight_arr['chd'] = $chd;
                $flight_arr['inf'] = $inf;
                $flight_arr['f_class'] = $f_class;
                $flight_arr['f_type'] = $f_type;
                Session::put('flight_arr', $flight_arr);
                $inc = 1;
                for ($i = 0; $i < $adt; $i++) {
                    $arr_pax[] = [
                        "paxID" => 'PAX' . $inc,
                        "ptc" => "ADT"
                    ];
                    $inc++;
                }
                for ($i = 0; $i < $chd; $i++) {
                    $arr_pax[] = [
                        "paxID" => 'PAX' . $inc,
                        "ptc" => "CHD"
                    ];
                    $inc++;
                }
                for ($i = 0; $i < $inf; $i++) {
                    $arr_pax[] = [
                        "paxID" => 'PAX' . $inc,
                        "ptc" => "INF"
                    ];
                    $inc++;
                }
                $data = array(
                    "pointOfSale" => "BD",
                    "request" => array(
                        "originDest" => array(
                            array(
                                "originDepRequest" => array(
                                    "iatA_LocationCode" => $tr_exp_dep_city,
                                    "date" => $dep_date
                                ),
                                "destArrivalRequest" => array(
                                    "iatA_LocationCode" => $tr_exp_arr_city,
                                    "date" => $dep_date
                                )
                            )
                        ),
                        "pax" => $arr_pax,
                        "shoppingCriteria" => array(
                            "tripType" => $f_type,
                            "travelPreferences" => array(
                                "vendorPref" => array(
                                    ""
                                ),
                                "cabinCode" => $f_class
                            ),
                            "returnUPSellInfo" => true
                        )
                    )
                );
                $url = 'https://bdf.centralindia.cloudapp.azure.com/api/enterprise/AirShopping';
                $headers = array(
                    'Content-Type: application/json',
                    'Accept: text/plain',
                    'X-API-KEY: KlQkRkNWSm8yZlNxdVQ3cUNIIWNSemhZeXgjejIwSGp1LUNfWFh2VE1PajVuWXg1QllBd1BxZlA5b0tkKmpfeg=='
                );
                $decoded_response = $this->getCurlResult($url, $data, $headers);
                if($decoded_response->response == null){
                    return redirect('/')->with('errorMas', 'Session Timed Out. Please Try Again!');
                }
                return view('frontend.flight-search-result', ['flights' => $decoded_response]);
            }
            else{
                return view('frontend.404',['msg' => 'Bad Request!!']);
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function flightDetails(Request $request){
        try{
            if (Session::get('user_id')) {
                $traceId = $request->traceId;
                $offerId = $request->offerId;
                $data = array(
                    "traceId" => $traceId,
                    "offerId" => [$offerId]
                );
                $url = 'https://bdf.centralindia.cloudapp.azure.com/api/enterprise/OfferPrice';
                $headers = array(
                    'Content-Type: application/json',
                    'Accept: text/plain',
                    'X-API-KEY: UV4zX25vRlFYJDlRYzVrTko/JHdOMFpxRE50UHpMQ0NDYT9adEtkYXokTXJTNHZrNHJaZDdramFhdCMkUzRnMg=='
                );
                $decoded_response = $this->getCurlResult($url, $data, $headers);
                if($decoded_response->response == null){
                    $errorMessage = $decoded_response->error->errorMessage;
                    return redirect('/')->with('errorMas', $errorMessage);
                }
                $flight_arr = Session::get('flight_arr');
                $result = $this->domesticFlightDetector($flight_arr['dep_city'], $flight_arr['arr_city']);
                $countries = DB::table('countries')->get();
                return view('frontend.flight-details', ['flights' => $decoded_response, 'domestic' => $result, 'countries' => $countries]);
            }
            else{
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
                Session::put('reference_url',$actual_link);
                return redirect()->to('all-login');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function flightBooking(Request $request){
        try {
            //dd($request);
            if (Session::get('user_id')) {
                $traceId = $request->traceId;
                $offerId = $request->offerId;
                if ($request->domestic == 0) {
                    for ($i = 0; $i < $request->paxCount; $i++) {
                        $paxLists[] = [
                            "ptc" => $request->pax_type[$i],
                            "individual" => [
                                "givenName" => $request->f_name[$i],
                                "surname" => $request->l_name[$i],
                                "gender" => $request->gender[$i],
                                "birthdate" => $request->dob[$i],
                                "nationality" => $request->country[$i],
                                "identityDoc" => array(
                                    "identityDocType" => "Passport",
                                    "identityDocID" => $request->p_number[$i],
                                    "expiryDate" => $request->p_date[$i],
                                ),
//                            "associatePax"=>[
//                                "givenName"=> $request->f_name[0],
//                                "surname"=> $request->l_name[0]
//                            ],
                            ]
                        ];
                    }
                }
                if ($request->domestic == 1) {
                    for ($i = 0; $i < $request->paxCount; $i++) {
                        $paxLists[] = [
                            "ptc" => $request->pax_type[$i],
                            "individual" => [
                                "givenName" => $request->f_name[$i],
                                "surname" => $request->l_name[$i],
                                "gender" => $request->gender[$i],
                                "birthdate" => $request->dob[$i],
                                "nationality" => $request->country[$i],
                            ]
                        ];
                    }
                }
                $data = array(
                    "traceId" => $traceId,
                    "offerId" => [$offerId],
                    "request" => array(
                        "contactInfo" => array(
                            "phone" => array(
                                "phoneNumber" => $request->phone,
                                "countryDialingCode" => $request->phoneCode,
                            ),
                            "emailAddress" => $request->email,
                        ),
                        "paxList" => $paxLists
                    ),
                );
//            dd($data);
                $url = 'https://bdf.centralindia.cloudapp.azure.com/api/enterprise/OrderSell';
                $headers = array(
                    'Content-Type: application/json',
                    'Accept: text/plain',
                    'X-API-KEY: UV4zX25vRlFYJDlRYzVrTko/JHdOMFpxRE50UHpMQ0NDYT9adEtkYXokTXJTNHZrNHJaZDdramFhdCMkUzRnMg=='
                );
                $decoded_response = $this->getCurlResult($url, $data, $headers);
                if($decoded_response->response == null){
                    $errorMessage = $decoded_response->error->errorMessage;
                    return redirect('/')->with('errorMas', $errorMessage);
                }
                if ($decoded_response->success == true) {
                    $decoded_gross = $decoded_response->response->offersGroup[0]->offer->price->gross->total;
                    if ($request->grossAmount == $decoded_gross) {
                        $urlNext = 'https://bdf.centralindia.cloudapp.azure.com/api/enterprise/OrderCreate';
                        $decoded_responseNext = $this->getCurlResult($urlNext, $data, $headers);
                        dd($decoded_responseNext);
                    }
                    else{

                    }
                }
                if ($decoded_response->success == false) {
                    $errorMessage = $decoded_response->error->errorMessage;
                    return back()->with('errorMessage', $errorMessage);
                }
                return view('frontend.flight-details', ['flights' => $decoded_response,]);

            }
            else{
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
                Session::put('reference_url',$actual_link);
                return redirect()->to('all-login');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function domesticFlightDetector($dep_city , $arr_city){
        $dep_city_arr = ['DAC','CXB','CGP','JSR','RJH','SPD','ZYL','BZL'];
        $arr_city_arr = ['DAC','CXB','CGP','JSR','RJH','SPD','ZYL','BZL'];

        $exp_dep_city = explode(",", $dep_city);
        $tr_exp_dep_city = trim($exp_dep_city[0]);
        $exp_arr_city = explode(",", $arr_city);
        $tr_exp_arr_city = trim($exp_arr_city[0]);

        if (in_array($tr_exp_dep_city, $dep_city_arr)) {
            $found_dep = 1;
        }
        else{
            $found_dep = 0;
        }
        if (in_array($tr_exp_arr_city, $arr_city_arr)) {
            $found_arr = 1;
        }
        else{
            $found_arr = 0;
        }
        if( $found_dep == 1 && $found_arr == 1){
            $dom = 1;
        }
        else{
            $dom = 0;
        }
        return $dom;
    }

    public function bookService(Request $request)
    {
        // ✅ 1. Validate input
        $validated = $request->validate([
            'service_id'   => 'nullable|integer',
            'service_name' => 'nullable|string|max:255',
            'service_slug' => 'nullable|string|max:255',
            'purpose'      => 'nullable|string|max:255',
            'name'         => 'required|string|max:255',
            'country_code' => 'required|string|max:10',
            'phone'        => 'required|string|max:20',
            'email'        => 'nullable|email|max:255',
            'amount'       => 'nullable|numeric',
        ]);

        try {
            // ✅ 2. Insert data into `servicelead` table
            $leadId = DB::table('servicelead')->insertGetId([
                'service_id'   => $request->service_id,
                'service_name' => $request->service_name,
                'service_slug' => $request->service_slug,
                'purpose'      => $request->purpose ?? $request->service_name,
                'name'         => $request->name,
                'country_code' => $request->country_code,
                'phone'        => $request->phone,
                'email'        => $request->email,
                'amount'       => $request->amount,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // ✅ 3. Fetch lead info
            $lead = DB::table('servicelead')->where('id', $leadId)->first();

            // ✅ 4. Detect current domain → Find related company
            $currentDomain = parse_url(request()->fullUrl(), PHP_URL_HOST);
            $domainData = DB::table('domain')->where('name', $currentDomain)->where('status', 1)->first();
            $agentId = $domainData->agent_id ?? 4; // fallback to 4 if not found

            // ✅ 5. Get company info (users table preferred, fallback company_info)
            $company = DB::table('users')->where('id', $agentId)->first();

            // ✅ 6. Send email to customer (confirmation)
            if (!empty($lead->email)) {
                Mail::to($lead->email)->send(
                    new \App\Mail\ServiceLeadMail($lead, $company, $lead->service_name.' Request Confirmation')
                );
            }

            // ✅ 7. Send email to admin/company (notification)
            $adminEmail = $company->company_email ?? $company->email ?? null;
            if (!empty($adminEmail)) {
                Mail::to($adminEmail)->send(
                    new \App\Mail\AdminServiceLeadMail($lead, $company, '🆕 New '.$lead->service_name.' Lead from '.$lead->name)
                );
            }
            return response()->json([
                'status'  => 'success',
                'title'   => 'Success!',
                'message' => '✅ Your request has been submitted successfully! Confirmation email sent.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'title'   => 'Error!',
                'message' => '❌ Something went wrong: '.$e->getMessage(),
            ]);
        }
    }
    public function academy()
    {
        // ✅ Courses
        $courses = DB::table('new_course_details')
            ->where('status', 1)
            ->get();

        // ✅ Ebooks
        $ebooks = DB::table('ebooks')
            ->where('status', 1)
            ->get();

        return view('frontend.academy', compact('courses', 'ebooks'));
    }
    public function courses()
    {
        // ✅ Courses
        $courses = DB::table('new_course_details')
            ->where('status', 1)
            ->get();

        return view('frontend.courses', compact('courses'));
    }
    public function ebooks()
    {
        // ✅ Ebooks
        $ebooks = DB::table('ebooks')
            ->where('status', 1)
            ->get();

        return view('frontend.ebooks', compact('ebooks'));
    }

}

