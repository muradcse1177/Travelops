<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;

class authController extends Controller
{
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
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
    public  function loginPage(Request $request){
        if(Session::get('user_id')){
            return redirect()->to('dashboard');
        }
        else{
            return view('frontend.userAuth.all-login-page');
        }
    }
    public function allLogin(Request $request)
    {
        // ✅ Check if user session exists
        if (Session::has('user_id') && Session::has('user_role')) {
            switch (Session::get('user_role')) {
                case 1:
                case 2:
                    return redirect()->to('main-dashboard'); // Super Admin / Admin
                case 3:
                    return redirect()->to('/'); // Customer
                case 5:
                    return redirect()->to('attendance'); // Employee
                default:
                    return redirect()->to('/');
            }
        }
        // ❌ No session? Show login form
        $countries = DB::table('countries')->get();
        return view('frontend.userAuth.all-login-page', ['countries' => $countries]);
    }
    public  function forgotPassword(Request $request){
        return view('frontend.userAuth.forgot-password');
    }
    public  function emailCheck(Request $request){
        $rows1 = DB::table('users')->where('company_email',$request->email)->first();
        if($rows1){
            $six_digit_random_number = random_int(100000, 999999);
            $result = DB::table('users')
                ->where('id', $rows1->id)
                ->update([
                    'otp' => $six_digit_random_number,
                ]);
            $email = [$request->email,];
            $data = [
                'name' => $rows1->company_name,
                'email' => $rows1->company_email,
                'otp' => $six_digit_random_number,
            ];
            Mail::send('email.forgot-password-email', $data, function ($message) use ($email) {
                $message->subject("Trip Designer: Forgot Password");
                $message->from('sales@tripdesigner.net', 'Trip Designer Tech');
                $message->to($email);
            });
            return view('frontend.userAuth.forgot-password-email');
        }else{
            return redirect()->to('all-login')->with('errorMessage', 'User not found!! Create your account first.');
        }
    }
    public  function otpVerification(Request $request){
        $rows1 = DB::table('users')->where('otp',$request->code)->first();
        if($rows1){
            return view('frontend.userAuth.password-recover',['id'=> $rows1->id]);
        }else{
            return back()->with('errorMessage', 'OTP not matched!! Please try again.');
        }
    }
    public  function passwordRecover(Request $request){
        $password = Hash::make($request->password);
        $result = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'password' => $password,
                'otp' => null,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        if($result){
            return redirect()->to('all-login')->with('successMessage', 'Password changed successfully. Please log in with new password.');
        }else{
            return back()->with('errorMessage', 'Please try again!!');
        }
    }
    public  function customerSignup(Request $request){
        $countries = DB::table('countries')->get();
        return view('frontend.userAuth.customer-signup',['countries'=> $countries]);
    }
    public  function agentSignup(Request $request){
        $countries = DB::table('countries')->get();
        return view('frontend.userAuth.agent-signup',['countries'=> $countries]);
    }
    public  function customerLogin(Request $request){
        return view('frontend.userAuth.customer-login');
    }
    public  function mainDashboard(Request $request){
        $domain =$this->domainCheck();
        $rows1 = DB::table('b2c_tour_package_country')->where('agent_id',$domain['agent_id'])->get();
        $rows2 = DB::table('b2c_tour_package')->where('agent_id',$domain['agent_id'])->orderBy('p_p_adult','asc')->inRandomOrder()->get()->take(6);

        $rows3 = DB::table('b2c_visa')->where('agent_id',$domain['agent_id'])->orderBy('a_price','asc')->inRandomOrder()->get()->take(6);
        $rows4 = DB::table('b2c_visa_country')->where('agent_id',$domain['agent_id'])->get();

        $rows5 = DB::table('b2c_manpower_country')->where('agent_id',$domain['agent_id'])->get();
        $rows6 = DB::table('b2c_manpower')->where('agent_id',$domain['agent_id'])->inRandomOrder()->get()->take(6);

        $rows7 = DB::table('b2c_hajj_umrah')->where('agent_id',$domain['agent_id'])->orderBy('p_p_adult','asc')->inRandomOrder()->get()->take(6);

        $rows8 = DB::table('b2c_service')->where('agent_id',$domain['agent_id'])->inRandomOrder()->get()->take(6);
        return view('main-dashboard',
            [
                't_country' => $rows1,'t_package' => $rows2,
                'visas' => $rows3, 'v_country' => $rows4,
                'permits' => $rows6,'m_country' => $rows5,
                'u_package' => $rows7,'services' => $rows8,'type' => 'main'

            ]);
    }
    public function dashboard(Request $request)
    {
        if (!Session::get('user_id')) {
            return redirect()->to('all-login');
        }

        $agentId = Session::get('agent_id');
        $today   = date('Y-m-d');

        /* ================= DATE FILTER ================= */

        $startDate = $request->input('start_date') ?? date('Y-m-01');
        $endDate   = $request->input('end_date') ?? date('Y-m-t');

        /* ================= CUSTOMER COUNT ================= */

        $customerCount = DB::table('passengers')
            ->where('upload_by', $agentId)
            ->distinct()
            ->count(); 
        $agencyCount = DB::table('users')
            ->where('role', 2)
            ->distinct()
            ->count();
        $b2cCount = DB::table('users')
            ->where('role', 3)
            ->distinct()
            ->count();

        /* ================= INVOICE CONFIG ================= */

        $invoices = [
            'air_ticket' => [
                'table' => 'air_ticket_invoice',
                'date_field' => 'issue_date',
                'sale_field' => 'c_price',
                'cost_field' => 'a_price',
                'due_field'  => 'due_amount',
                'where' => [
                    'deleted' => 0
                ]
            ],
            'visa' => [
                'table' => 'visa_invoice',
                'date_field' => 'date',
                'sale_field' => 'v_c_price',
                'cost_field' => 'v_a_price',
                'due_field'  => 'v_due'
            ],
            'tour' => [
                'table' => 'package_details',
                'date_field' => 'date',
                'sale_field' => 'p_c_details',
                'cost_field' => 'p_a_price',
                'due_field'  => 'due'
            ],
            'hotel' => [
                'table' => 'hotel_invoice',
                'date_field' => 'b_date',
                'sale_field' => 'c_price',
                'cost_field' => 'a_price',
                'due_field'  => 'due_amount'
            ],
            'hajj' => [
                'table' => 'umrah_invoice',
                'date_field' => 'date',
                'sale_field' => 'p_c_details',
                'cost_field' => 'p_a_price',
                'due_field'  => 'due'
            ],
            'service' => [
                'table' => 'service_invoice',
                'date_field' => 'created_at',
                'sale_field' => 'client_fare',
                'cost_field' => 'agent_fare',
                'due_field'  => 'client_due', // agent_due separately
            ],
        ];

        /* ================= BASE DATA ================= */

        $data = [
            'users'      => $customerCount,
            'agency'     => $agencyCount,
            'b2c'        => $b2cCount,
            'start_date' => $startDate,
            'end_date'   => $endDate,
            'total_due'  => 0,
        ];

        $grossMonthlyProfit = 0;
        $grossDailyProfit   = 0;
        $totalMonthlySale   = 0;

        /* ================= MAIN LOOP ================= */

        foreach ($invoices as $key => $config) {
            $where = $config['where'] ?? [];
            // Monthly Sale
            $monthlySale = $this->getInvoiceSum(
                $config['table'], $config['sale_field'],
                $config['date_field'], $startDate, $endDate, $agentId, $where
            );

            // Monthly Cost
            $monthlyCost = $this->getInvoiceSum(
                $config['table'], $config['cost_field'],
                $config['date_field'], $startDate, $endDate, $agentId, $where
            );

            // Daily Sale
            $dailySale = $this->getInvoiceSum(
                $config['table'], $config['sale_field'],
                $config['date_field'], $today, $today, $agentId, $where
            );

            // Daily Cost
            $dailyCost = $this->getInvoiceSum(
                $config['table'], $config['cost_field'],
                $config['date_field'], $today, $today, $agentId, $where
            );

            // Assign to data
            $data["monthly_sale_{$key}"]   = $monthlySale;
            $data["monthly_a_sale_{$key}"] = $monthlyCost;
            $data["daily_sale_{$key}"]     = $dailySale;
            $data["daily_a_sale_{$key}"]   = $dailyCost;

            /* ================= PROFIT ================= */

            $grossMonthlyProfit += ($monthlySale - $monthlyCost);
            $grossDailyProfit   += ($dailySale - $dailyCost);
            $totalMonthlySale   += $monthlySale;

            /* ================= DUE ================= */

            if ($key === 'service') {

                $clientDue = $this->getInvoiceSum(
                    'service_invoice', 'client_due',
                    'created_at', $startDate, $endDate, $agentId, $where
                );

                $agentDue = $this->getInvoiceSum(
                    'service_invoice', 'agent_due',
                    'created_at', $startDate, $endDate, $agentId, $where
                );

                $data['due_service'] = $clientDue + $agentDue;
                $data['total_due']  += $data['due_service'];

            } else {

                $due = $this->getInvoiceSum(
                    $config['table'], $config['due_field'],
                    $config['date_field'], $startDate, $endDate, $agentId, $where
                );

                $data["due_{$key}"] = $due;
                $data['total_due'] += $due;
            }
        }

        /* ================= EXPENSE FROM ACCOUNTS ================= */

        $monthlyExpense = DB::table('accounts')
            ->where('agent_id', $agentId)
            ->where('source','Office Accounts')
            ->whereBetween('date', [$startDate, $endDate])
            ->sum('buying_price');

        $dailyExpense = DB::table('accounts')
            ->where('agent_id', $agentId)
            ->where('source','Office Accounts')
            ->whereDate('date', $today)
            ->sum('buying_price');

        /* ================= NET PROFIT ================= */

        $netMonthlyProfit = $grossMonthlyProfit - $monthlyExpense;
        $netDailyProfit   = $grossDailyProfit - $dailyExpense;

        /* ================= FINAL ASSIGN ================= */

        $data['total_monthly_sale']   = $totalMonthlySale;
        $data['gross_monthly_profit'] = $grossMonthlyProfit;
        $data['gross_daily_profit']   = $grossDailyProfit;
        $data['monthly_expense']      = $monthlyExpense;
        $data['daily_expense']        = $dailyExpense;
        $data['net_monthly_profit']   = $netMonthlyProfit;
        $data['net_daily_profit']     = $netDailyProfit;

        return view('report.dashboard', $data);
    }

    /* =========================================================
    COMMON HELPER
    ========================================================= */

    private function getInvoiceSum($table, $field, $dateField, $from, $to, $agentId, $where = [])

    {
        return DB::table($table)
            ->where('agent_id', $agentId)
            ->when(!empty($where), function ($q) use ($where) {
                foreach ($where as $col => $val) {
                    $q->where($col, $val);
                }
            })
            ->when($from === $to, function ($q) use ($dateField, $from) {
                // DAILY (handles DATETIME properly)
                $q->whereDate($dateField, $from);
            })
            ->when($from !== $to, function ($q) use ($dateField, $from, $to) {
                // MONTHLY / RANGE
                $q->whereBetween($dateField, [$from, $to]);
            })
            ->sum($field);
    }



    public function createNewCustomer(Request $request){
        try{
            if($request) {
                $rows = DB::table('users')
                    ->where('company_pnone', $request->phone)
                    ->orwhere('company_email', $request->email)
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    return back()->with('errorMessage', 'User already exits!!');
                } else {
                    $username = $request->name;
                    $email = $request->email;
                    $phone = $request->phone;
                    $phoneCode = $request->phoneCode;
                    $password = Hash::make($request->password);
                    $result = DB::table('users')->insert([
                        'company_name' => $username,
                        'company_email' => $email,
                        'phone_code' => $phoneCode,
                        'company_pnone' => $phone,
                        'password' => $password,
                        'status' => 'Active',
                        'role' => 3,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    if ($result) {
                        return redirect()->to('all-login')->with('successMessage', 'Registered successfully. Please log in.');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function createNewUser(Request $request){
        try{
            if($request) {
                $rows = DB::table('users')
                    ->where('company_pnone', $request->phone)
                    ->orwhere('company_email', $request->email)
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    return back()->with('errorMessage', 'User already exits!!');
                } else {
                    $username = $request->name;
                    $email = $request->email;
                    $phoneCode = $request->phoneCode;
                    $phone = $request->phone;
                    $password = Hash::make($request->password);
                    $result = DB::table('users')->insert([
                        'company_name' => $username,
                        'company_email' => $email,
                        'phone_code' => $phoneCode,
                        'company_pnone' => $phone,
                        'password' => $password,
                        'role' => 2,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    if ($result) {
                        return redirect()->to('all-login')->with('successMessage', 'Registered successfully. Please log in.');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function verifyUsers(Request $request)
    {
        try {
            // If user is already logged in
            if (Session::get('user_id')) {
                $user = DB::table('users')->where('id', Session::get('user_id'))->first();

                if ($user && is_null($user->address)) {
                    return redirect()->to('companyInfo');
                }

                switch (Session::get('user_role')) {
                    case 1: return redirect()->to('main-dashboard'); // Super Admin
                    case 2: return redirect()->to('main-dashboard'); // Admin
                    case 3: return redirect()->to('/');              // Customer
                    case 5: return redirect()->to('attendance');     // Employee
                }

                return redirect()->to('home');
            }

            // Login attempt
            $email = $request->email;
            $password = $request->password;

            $user = DB::table('users')->where('company_email', $email)->first();

            if (!$user) {
                return back()->with('errorMessage', 'User does not exist!');
            }

            if ($user->status === 'In Active') {
                return back()->with('errorMessage', 'Your ID is inactive. Please contact admin.');
            }

            if (!Hash::check($password, $user->password)) {
                return back()->with('errorMessage', 'Incorrect password!');
            }

            // ✅ Login Success: Store session data
            Session::put('user_id', $user->id);
            Session::put('user_role', $user->role);
            Session::put('user_info', collect((array) $user)->except('password')); // Avoid storing password
            Cookie::queue('user', $user->id, time() + 31556926, '/'); // Optional

            DB::table('login_histories')->insert([
                'user_id'    => $user->id,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $request->header('User-Agent'),
                'login_at'   => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $this->sendLoginSuccessEmail($user);
            //dd(session()->all());
            switch ($user->role) {
                case 1: // Super Admin
                    Session::put('superAdmin', $user->id);
                    return redirect()->to('main-dashboard');

                case 2: // Admin
                    Session::put('admin', $user->id);
                    Session::put('agent_id', $user->id);
                    if (is_null($user->address)) {
                        return redirect()->to('companyInfo');
                    }
                    return redirect()->to('main-dashboard');

                case 3: // Customer
                    Session::put('customer', $user->id);

                    if (Session::has('reference_url')) {
                        $redirect = Session::pull('reference_url'); // Clear after use
                        return redirect()->to($redirect);
                    }
                    return redirect()->to('/');

                case 5: // Employee
                    $emp = DB::table('employees')->where('email', $email)->first();
                    if ($emp) {
                        Session::put('agent_id', $emp->agent_id);
                        Session::put('employee', $user->id);
                        return redirect()->to('attendance');
                    } else {
                        return back()->with('errorMessage', 'Employee record not found.');
                    }

                default:
                    return back()->with('errorMessage', 'Unauthorized role.');
            }
        } catch (\Exception $e) {
            \Log::error('Login Error: '.$e->getMessage());
            return back()->with('errorMessage', 'Login failed. Please try again.');
        }
    }
    public function sendLoginSuccessEmail($user)
    {
        $company = DB::table('users')->where('id', 4)->first();

        Mail::send('email.login-success', [
            'user'    => $user,
            'company' => $company,
        ], function($message) use ($user) {
            $message->to($user->company_email)
                    ->subject('Login Successful - ' . ($user->company_name ?? 'User'));
        });
    }
    public  function logout(){
        Session::flush();
        Cookie::queue(Cookie::forget('user'));
        return redirect('/');
    }
}
