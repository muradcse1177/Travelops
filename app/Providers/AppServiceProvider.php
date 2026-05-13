<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
//    public function boot()
//    {
//        View::composer('*', function($view)
//        {
////            $c_domain = $_SERVER['SERVER_NAME'];
//            //dd($c_domain);
//            $c_domain = 'tripdesigner.net';
//            $fixed_domain = 'https://tripdesigner.net'; //http://localhost/tam
//            $rows = DB::table('domain')->where('name',$c_domain)->first();
//            $c_info = DB::table('company_info')->where('agent_id',@$rows->agent_id)->first();
//            $view->with('domain', $fixed_domain);
//            $view->with('c_info', $c_info);
//            $company = DB::table('users')->where('id',Session::get('user_id'))->first();
//            //dd($company);
//            $agent = DB::table('users')->where('id',Session::get('agent_id'))->first();
//            if(@$company->status == 'In Active'){
//                return redirect()->to('all-login')->with('errorMessage', 'Your Id is Inactive!! Please contact to admin.');
//            }
//            if(@$company->role == 5){
//                $employee = DB::table('employees')->where('email',$company->company_email)->first();
//                $role = DB::table('assign_role')->where('agent_id',$employee->agent_id)->where('designation',$employee->designation)->first();
//                $attributes = DB::table('attribute')->get();
//                $view->with('role', $role);
//                $view->with('attributes', $attributes);
//            }
//            $view->with('company_info', $company);
//            $view->with('agent_info', $agent);
//
//        });
//        Paginator::useBootstrap();
//    }


    public function boot()
    {
        Paginator::useBootstrap();


        // STOP View composer when running from console (Cron, Queue)
        if (app()->runningInConsole()) {
            return;
        }

        View::composer('*', function($view) {

            if (app()->environment('local')) {
                $c_domain = 'tripdesigner.xyz';
                $fixed_domain = 'https://tripdesigner.xyz';
            } else {
               $c_domain = $_SERVER['SERVER_NAME'] ?? 'tripdesigner.xyz'; // Production server auto detect
                $fixed_domain = config('app.url'); // .env থেকে URL
            }
        
            // আপনার বাকি কোড
            $rows = DB::table('domain')->where('name', $c_domain)->first();
            $agent_id = $rows->agent_id ?? null;
        
            $c_info = DB::table('company_info')->where('agent_id', $agent_id)->first();
            $company = DB::table('users')->where('id', Session::get('user_id'))->first();
            $agent   = DB::table('users')->where('id', Session::get('agent_id'))->first();

            if($company && $company->role == 5) {
                $employee   = DB::table('employees')->where('email', $company->company_email)->first();
                $role       = DB::table('assign_role')
                    ->where('agent_id', $employee->agent_id ?? 0)
                    ->where('designation', $employee->designation ?? '')
                    ->first();
                $attributes = DB::table('attribute')->get();

                $view->with('role', $role);
                $view->with('attributes', $attributes);
            }

            $view->with([
                'domain'       => $fixed_domain,
                'c_info'       => $c_info,
                'company_info' => $company,
                'agent_info'   => $agent,
            ]);
        });

        Paginator::useBootstrap();
    }

}
