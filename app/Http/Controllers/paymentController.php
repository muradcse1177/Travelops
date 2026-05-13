<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Mail\AdminOrderNotification;
use App\Mail\CustomerCourseSignup;
use App\Mail\CustomerEnrollmentMail;
use App\Mail\CustomerEbookPurchaseMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class paymentController extends Controller
{
    public function enroll(Request $request, $id)
    {
        // Step 1: Validate Input
        $request->validate([
            'name'             => 'required|string|max:100',
            'phone'            => ['required', 'regex:/^(?:\+8801|8801|01)[3-9]\d{8}$/'],
            'email'            => 'required|email|max:50',
            'payment_gateway'  => 'required|in:bkash,sslcommerz',
            'variation_key'    => 'required|string',
        ]);

        $email = $request->email;
        $defaultPassword = 'default123';

        // Step 2: Find or Create User
        $user = DB::table('users')->where('company_email', $email)->first();

        if (!$user) {
            $userId = DB::table('users')->insertGetId([
                'company_name'   => $request->name,
                'company_email'  => $email,
                'phone_code'     => '88',
                'company_pnone'  => $request->phone,
                'password'       => Hash::make($defaultPassword),
                'status'         => 'Active',
                'role'           => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);

            $user = DB::table('users')->where('id', $userId)->first();

            // Get domain-based agent_id
            $currentDomain = parse_url(request()->fullUrl(), PHP_URL_HOST);
            $domain = DB::table('domain')->where('name', $currentDomain)->where('status', 1)->first();
            $agentId = $domain->agent_id ?? null;

            // Send SMS
            $number = '88' . $request->phone;
            $msg = "Welcome to our course platform. Your account has been created. Please log in. Email: {$user->company_email} | Password: {$defaultPassword}";

            DB::table('sms_log')->insert([
                'agent_id' => $agentId,
                'number'   => $number,
                'sms'      => $msg,
                'status'   => 'Sent',
                'time'     => now(),
            ]);

            $this->sms_send($number, $msg);

            // Send Welcome Email
            Mail::to($user->company_email)->send(new CustomerCourseSignup($user, $defaultPassword));
        } else {
            $userId = $user->id;
        }

        // Step 3: Get Course Info (from new_course_details table)
        $course = DB::table('new_course_details')->where('id', $id)->first();
        if (!$course) abort(404, 'Course not found.');

        // Step 4: Validate Variation (server-side)
        $variation_key   = $request->variation_key;
        $all_variations  = json_decode($course->price_variations, true);

        if (!isset($all_variations[$variation_key])) {
            abort(400, 'Invalid variation selected.');
        }

        $variation = $all_variations[$variation_key];

        // Titles for variations
        $titles = [
            'recorded'            => 'Recorded Class',
            'live'                => 'Live Class',
            'physical'            => 'Physical Class',
            'one_to_one_online'   => 'One-to-One Online Class',
            'one_to_one_physical' => 'One-to-One Physical Class',
        ];

        $variation_title = $titles[$variation_key] ?? ucfirst($variation_key);

        // Step 5: Prepare Transaction Info
        $amount  = !empty($variation['d_price']) ? $variation['d_price'] : $variation['price'];
        // $amount = 20;
        $tran_id = uniqid('TRD_');

        // Step 6: Insert Order into payment_orders
        DB::table('payment_orders')->insert([
            'user_id'           => $userId,
            'name'              => $request->name,
            'email'             => $email,
            'phone'             => '88' . $request->phone,
            'amount'            => $amount,
            'status'            => 'Pending',
            'address'           => 'Dhaka',
            'local_id'          => $id,
            'transaction_id'    => $tran_id,
            'currency'          => 'BDT',
            'product_name'      => $course->title,
            'product_category'  => 'Course',
            'product_profile'   => json_encode([
                'slug'      => $course->slug,
                'variation' => [
                    'key'     => $variation_key,
                    'title'   => $variation_title,
                    'price'   => $variation['price'],
                    'd_price' => $variation['d_price'],
                    'status'  => $variation['status'],
                ]
            ]),
            'customer_type'     => 'B2C',
            'ip_address'        => $request->ip(),
            'time'              => now(),
            'gateway'           => $request->payment_gateway,
        ]);

        // Step 7: Route to Selected Gateway
        if ($request->payment_gateway === 'sslcommerz') {
            $post_data = [
                'total_amount'     => $amount,
                'currency'         => 'BDT',
                'tran_id'          => $tran_id,
                'cus_name'         => $request->name,
                'cus_email'        => $email,
                'cus_add1'         => 'Dhaka',
                'cus_phone'        => '88' . $request->phone,
                'product_category' => $course->type,
                'success_url'      => url("success?order_id={$tran_id}"),
                'fail_url'         => url("fail?tran_id={$tran_id}"),
                'cancel_url'       => url("cancel?tran_id={$tran_id}"),
                'value_a'          => $id,
                'value_b'          => $userId,
            ];

            \Log::info('Redirecting to SSLCommerz:', $post_data);

            $sslc = new SslCommerzNotification();
            return $sslc->makePayment($post_data, 'hosted');
        }

        if ($request->payment_gateway === 'bkash') {
            // Store data for bKash use
            session([
                'bkash_payment' => [
                    'tran_id'     => $tran_id,
                    'enroll_id'   => $id,
                    'amount'      => $amount,
                    'user_id'     => $userId,
                    'name'        => $request->name,
                    'email'       => $email,
                    'phone'       => $request->phone,
                ]
            ]);
            return view('frontend.bkash.auto_redirect', [
                'bkashData' => session('bkash_payment')
            ]);
            // return redirect()->route('bkash.create');
        }

        return back()->with('errorMessage', 'Invalid payment method selected.');
    }
    public function ebookBuy(Request $request, $id)
    {
        /* ===============================
        STEP 1: VALIDATION
        =============================== */
        $request->validate([
            'name'            => 'required|string|max:100',
            'phone'           => ['required', 'regex:/^(?:\+8801|8801|01)[3-9]\d{8}$/'],
            'email'           => 'required|email|max:50',
            'payment_gateway' => 'required|in:bkash,sslcommerz',
        ]);

        $email = $request->email;
        $defaultPassword = 'default123';

        /* ===============================
        STEP 2: FIND OR CREATE USER
        =============================== */
        $user = DB::table('users')->where('company_email', $email)->first();

        if (!$user) {
            $userId = DB::table('users')->insertGetId([
                'company_name'  => $request->name,
                'company_email' => $email,
                'phone_code'    => '88',
                'company_pnone' => $request->phone,
                'password'      => Hash::make($defaultPassword),
                'status'        => 'Active',
                'role'          => 3,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            $user = DB::table('users')->where('id', $userId)->first();

            // SMS
            $number = '88' . $request->phone;
            $msg = "Welcome! Your ebook account is ready. Email: {$email} | Password: {$defaultPassword}";
            $this->sms_send($number, $msg);

            // Email
            Mail::to($email)->send(new CustomerCourseSignup($user, $defaultPassword));
        } else {
            $userId = $user->id;
        }

        /* ===============================
        STEP 3: GET EBOOK
        =============================== */
        $ebook = DB::table('ebooks')->where('id', $id)->where('status', 1)->first();
        if (!$ebook) abort(404, 'Ebook not found');

        /* ===============================
        STEP 4: AMOUNT & TRANSACTION
        =============================== */
        $amount = $ebook->discount_price ?? $ebook->price;
        $tran_id = uniqid('EBOOK_');

        /* ===============================
        STEP 5: INSERT ORDER
        =============================== */
        DB::table('payment_orders')->insert([
            'user_id'          => $userId,
            'name'             => $request->name,
            'email'            => $email,
            'phone'            => '88' . $request->phone,
            'amount'           => $amount,
            'status'           => 'Pending',
            'address'          => 'Dhaka',
            'local_id'         => $id,
            'transaction_id'   => $tran_id,
            'currency'         => 'BDT',
            'product_name'     => $ebook->title,
            'product_category' => 'Ebook',
            'product_profile' => json_encode([
                'slug' => $ebook->slug,

                'variation' => [
                    'key'     => 'ebook',
                    'title'   => $ebook->title,
                    'price'   => $ebook->price,
                    'd_price' => $ebook->discount_price,
                    'status'  => 1,
                ]
            ]),
            'customer_type'    => 'B2C',
            'ip_address'       => $request->ip(),
            'time'             => now(),
            'gateway'          => $request->payment_gateway,
        ]);

        /* ===============================
        STEP 6: GATEWAY REDIRECT
        =============================== */
        if ($request->payment_gateway === 'sslcommerz') {

            $post_data = [
                'total_amount' => $amount,
                'currency'     => 'BDT',
                'tran_id'      => $tran_id,
                'cus_name'     => $request->name,
                'cus_email'    => $email,
                'cus_add1'     => 'Dhaka',
                'cus_phone'    => '88' . $request->phone,
                'product_category' => 'Ebook',
                'success_url'  => url("success?order_id={$tran_id}"),
                'fail_url'     => url("fail?tran_id={$tran_id}"),
                'cancel_url'   => url("cancel?tran_id={$tran_id}"),
                'value_a'      => $id,
                'value_b'      => $userId,
            ];

            $sslc = new SslCommerzNotification();
            return $sslc->makePayment($post_data, 'hosted');
        }

        if ($request->payment_gateway === 'bkash') {
            session([
                'bkash_payment' => [
                    'tran_id'   => $tran_id,
                    'ebook_id'  => $id,
                    'amount'    => $amount,
                    'user_id'   => $userId,
                    'name'      => $request->name,
                    'email'     => $email,
                    'phone'     => $request->phone,
                ]
            ]);

            return view('frontend.bkash.auto_redirect', [
                'bkashData' => session('bkash_payment')
            ]);
        }

        return back()->with('errorMessage', 'Invalid payment gateway.');
    }

    public function success(Request $request)
    {
        $tran_id  = $request->input('tran_id');
        $amount   = $request->input('amount');
        $currency = $request->input('currency');

        $order = DB::table('payment_orders')->where('transaction_id', $tran_id)->first();

        if (!$order) {
            return redirect()->to('/')->with('errorMessage', 'Invalid transaction.');
        }

        $sslc = new SslCommerzNotification();

        if ($order->status === 'Pending') {
            $isValid = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if (!$isValid) {
                return redirect()->to('all-login')->with('errorMessage', 'Payment validation failed.');
            }

            DB::table('payment_orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Complete']);

            return $this->successRedirect($order);
        }

        if (in_array($order->status, ['Processing', 'Complete'])) {
            return $this->successRedirect($order);
        }

        return redirect()->to('all-login')->with('errorMessage', 'Invalid transaction status.');
    }

    private function successRedirect($order)
    {
        if ($order->customer_type === 'B2C') {

            Session::put('fb_event_id', $order->transaction_id);
            Session::put('fb_event_value', $order->amount);

            if ($order->product_category === 'Course') {
                $this->coursePaymentRedirect($order);
            }
            elseif ($order->product_category === 'Ebook') {
                $this->ebookPaymentRedirect($order);
            }
            else {
                // ✅ UNIVERSAL
                app(\App\Http\Controllers\universalPaymentController::class)
                    ->handlePostPayment($order);
            }
            // Store order in session temporarily if needed
            Session::put('order_id', $order->id);
            Session::put('successMessage', 'Transaction successfully completed!');
            $this->sendFacebookPurchaseEvent($order);

            return redirect()->to('payment-success-message?order_id=' . $order->id);
        }

        return redirect()->to('/');
    }

    public  function coursePaymentRedirect($order)
    {
        $user = DB::table('users')->where('id', $order->user_id)->first();

        if (!$user) return;

        $passwordNotice = 'Check your email or SMS for login info.';

        try {
            Mail::to($user->company_email)->send(new CustomerEnrollmentMail($user, $passwordNotice, $order));
        } catch (\Exception $e) {
            \Log::error('Customer mail failed: '.$e->getMessage());
        }

        try {
            Mail::to('tripdesigner.xyz@gmail.com')->send(new AdminOrderNotification($user, $order));
        } catch (\Exception $e) {
            \Log::error('Admin mail failed: '.$e->getMessage());
        }
    }

    public  function ebookPaymentRedirect($order)
    {
        $user = DB::table('users')->where('id', $order->user_id)->first();

        if (!$user) return;

        $passwordNotice = 'Check your email or SMS for login info.';

        try {
            Mail::to($user->company_email)->send(new CustomerEbookPurchaseMail($user, $passwordNotice, $order));
        } catch (\Exception $e) {
            \Log::error('Customer mail failed: '.$e->getMessage());
        }

        try {
            Mail::to('tripdesigner.xyz@gmail.com')->send(new AdminOrderNotification($user, $order));
        } catch (\Exception $e) {
            \Log::error('Admin mail failed: '.$e->getMessage());
        }
    }

    public function paymentSuccessPage(Request $request)
    {
        $orderId = $request->query('order_id');
        $successMessage = 'Transaction successfully completed!';

        $order = DB::table('payment_orders')->where('id', $orderId)->first();
        if (!$order || $order->status !== 'Complete') {
            return view('frontend.404')->with('msg', 'No valid order found.');
        }

        // Restore auth session if needed
        if (!Session::has('user_id') && $order->user_id) {
            $user = DB::table('users')->where('id', $order->user_id)->first();

            if ($user) {
                Session::put('user_id', $user->id);
                Session::put('user_role', $user->role);
                Session::put('user_info', collect((array)$user)->except('password'));

                if ($user->role == 1) {
                    Session::put('superAdmin', $user->id);
                } elseif ($user->role == 2) {
                    Session::put('admin', $user->id);
                    Session::put('agent_id', $user->id);
                } elseif ($user->role == 3) {
                    Session::put('customer', $user->id);
                } elseif ($user->role == 5) {
                    $emp = DB::table('employees')->where('email', $user->company_email)->first();
                    if ($emp) {
                        Session::put('agent_id', $emp->agent_id);
                        Session::put('employee', $user->id);
                    }
                }
            }
        }
        Session::forget('fb_event_id');
        Session::forget('fb_event_value');

        return view('frontend.payment-success', compact('order', 'successMessage'));
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        // Step 1: Retrieve the order
        $order = DB::table('payment_orders')
            ->where('transaction_id', $tran_id)
            ->first();

        if (!$order) {
            return view('frontend.404')->with('msg', 'Transaction not found');
        }

        // Step 2: Restore user session manually if missing
        if (!Session::has('user_id') && $order->user_id) {
            $user = DB::table('users')->where('id', $order->user_id)->first();

            if ($user) {
                Session::put('user_id', $user->id);
                Session::put('user_role', $user->role);
                Session::put('user_info', collect((array)$user)->except('password'));

                if ($user->role == 1) {
                    Session::put('superAdmin', $user->id);
                } elseif ($user->role == 2) {
                    Session::put('admin', $user->id);
                    Session::put('agent_id', $user->id);
                } elseif ($user->role == 3) {
                    Session::put('customer', $user->id);
                } elseif ($user->role == 5) {
                    $emp = DB::table('employees')->where('email', $user->company_email)->first();
                    if ($emp) {
                        Session::put('agent_id', $emp->agent_id);
                        Session::put('employee', $user->id);
                    }
                }
            }
        }

        // Step 3: Fetch user again for mail (or reuse above if you prefer)
        $user = DB::table('users')->where('id', $order->user_id)->first();
        $passwordNotice = 'Check your previous email or phone SMS. Ignore if you have account here.';

        // Step 4: Send email to customer & admin
        if ($order->product_category === 'Course') {
            try {
                Mail::to($user->company_email)->send(new CustomerEnrollmentMail($user, $passwordNotice, $order));
                Mail::to('tripdesigner.xyz@gmail.com')->send(new AdminOrderNotification($user, $order));
            } catch (\Exception $e) {
                \Log::error('Mail error (fail route): ' . $e->getMessage());
            }
        }
        if ($order->product_category === 'Ebook') {
           try {
                Mail::to($user->company_email)->send(new CustomerEbookPurchaseMail($user, $passwordNotice, $order));
                Mail::to('tripdesigner.xyz@gmail.com')->send(new AdminOrderNotification($user, $order));
            } catch (\Exception $e) {
                \Log::error('Mail error (fail route): ' . $e->getMessage());
            }
        }
        

        // Step 5: Update order status if still pending
        if ($order->status === 'Pending') {
            DB::table('payment_orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            $order->status = 'Failed'; // for use in view
        }

        // Step 6: Return shared view with order info
        return view('frontend.payment-success', [
            'order' => $order,
            'successMessage' => 'Payment failed. Please try again or contact support.'
        ]);
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        // Step 1: Validate transaction ID
        if (!$tran_id) {
            return response("Invalid transaction ID", 400);
        }

        // Step 2: Retrieve the order
        $order = DB::table('payment_orders')
            ->where('transaction_id', $tran_id)
            ->first();

        if (!$order) {
            return view('frontend.404')->with('msg', 'Transaction not found.');
        }

        // Step 3: Restore user session if necessary
        if (!Session::has('user_id') && $order->user_id) {
            $user = DB::table('users')->where('id', $order->user_id)->first();

            if ($user) {
                Session::put('user_id', $user->id);
                Session::put('user_role', $user->role);
                Session::put('user_info', collect((array)$user)->except('password'));

                if ($user->role == 1) {
                    Session::put('superAdmin', $user->id);
                } elseif ($user->role == 2) {
                    Session::put('admin', $user->id);
                    Session::put('agent_id', $user->id);
                } elseif ($user->role == 3) {
                    Session::put('customer', $user->id);
                } elseif ($user->role == 5) {
                    $emp = DB::table('employees')->where('email', $user->company_email)->first();
                    if ($emp) {
                        Session::put('agent_id', $emp->agent_id);
                        Session::put('employee', $user->id);
                    }
                }
            }
        }

        // Step 4: Fetch user again for email use
        $user = DB::table('users')->where('id', $order->user_id)->first();
        $passwordNotice = 'Check your previous email or phone SMS. Ignore if you have account here.';

        // Step 5: Send email to customer and admin
        if ($order->product_category === 'Course') {
            try {
                Mail::to($user->company_email)->send(new CustomerEnrollmentMail($user, $passwordNotice, $order));
                Mail::to('tripdesigner.xyz@gmail.com')->send(new AdminOrderNotification($user, $order));
            } catch (\Exception $e) {
                \Log::error('Mail error (fail route): ' . $e->getMessage());
            }
        }
        if ($order->product_category === 'Ebook') {
           try {
                Mail::to($user->company_email)->send(new CustomerEbookPurchaseMail($user, $passwordNotice, $order));
                Mail::to('tripdesigner.xyz@gmail.com')->send(new AdminOrderNotification($user, $order));
            } catch (\Exception $e) {
                \Log::error('Mail error (fail route): ' . $e->getMessage());
            }
        }

        // Step 6: Update order status
        if ($order->status === 'Pending') {
            DB::table('payment_orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            $order->status = 'Canceled'; // For view display
        }

        // Step 7: Return order cancellation view
        return view('frontend.payment-success', [
            'order' => $order,
            'successMessage' => 'Payment was canceled. You can try again or contact support.'
        ]);
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
    /**
     * Send Facebook Purchase Event (Server-side)
     */
    private function sendFacebookPurchaseEvent($order)
    {
        try {
            $pixelId = config('services.facebook.pixel_id');
            $accessToken = config('services.facebook.access_token');

            if (!$pixelId || !$accessToken) {
                \Log::warning('Facebook Pixel ID বা Access Token অনুপস্থিত।');
                return;
            }

            $user = DB::table('users')->where('id', $order->user_id)->first();
            if (!$user) {
                \Log::warning('Facebook event পাঠাতে user পাওয়া যায়নি।');
                return;
            }

            $payload = [
                'data' => [[
                    'event_name' => 'Purchase',
                    'event_time' => time(),
                    'event_id' => $order->transaction_id,
                    'action_source' => 'website',
                    'event_source_url' => url(
                        $order->product_category === 'Course'
                            ? 'course/' . $order->local_id
                            : 'ebook/' . $order->local_id
                    ),
                    'user_data' => [
                        'em' => hash('sha256', strtolower(trim($user->company_email))),
                        'ph' => hash('sha256', preg_replace('/\D/', '', $user->company_pnone)),
                        'client_ip_address' => request()->ip(),
                        'client_user_agent' => request()->header('User-Agent'),
                    ],
                    'custom_data' => [
                        'currency' => 'BDT',
                        'value' => floatval($order->amount),
                        'content_name' => $order->product_name ?? 'Course Purchase',
                        'content_type' => 'course',
                    ],
                ]]
            ];

            $response = Http::withToken($accessToken)
                ->post("https://graph.facebook.com/v17.0/{$pixelId}/events", $payload);

            \Log::info('✅ Facebook Purchase Event Sent', ['response' => $response->json()]);
        } catch (\Exception $e) {
            \Log::error('❌ Facebook Event Error: ' . $e->getMessage());
        }
    }
}
