<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Mail\AdminOrderNotification;
use App\Mail\CustomerAccountCreatedMail;
use App\Mail\CustomerPaymentSuccessMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class universalPaymentController extends Controller
{
    /* ============================
       PAGE
    ============================ */
    public function universalPaymentPage()
    {
        return view('frontend.universal-payment-page');
    }

    /* ============================
       PROCESS PAYMENT
    ============================ */
    public function universalPaymentProcess(Request $request)
    {
        /* ---------- VALIDATION ---------- */
        $request->validate([
            'billing_name' => 'required|string|max:100',
            'email'        => 'required|email|max:50',
            'phone'        => ['required', 'regex:/^(01)[3-9]\d{8}$/'],
            'amount'       => 'required|numeric|min:1',
            'purpose'      => 'required|string|max:150',
            'gateway'      => 'required|in:bkash,sslcommerz',
            'notes'        => 'nullable|string|max:500',
        ]);

        /* ---------- USER ---------- */
        $email = $request->email;
        $defaultPassword = 'default123';

        $user = DB::table('users')->where('company_email', $email)->first();

        if (!$user) {
            $userId = DB::table('users')->insertGetId([
                'company_name'  => $request->billing_name,
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
            $this->sms_send(
                '88' . $request->phone,
                "Welcome! Your account has been created. Email: {$email} | Password: {$defaultPassword}"
            );

            // ✅ NEW generic account creation email
            Mail::to($email)->send(
                new CustomerAccountCreatedMail($user, $defaultPassword)
            );
        } else {
            $userId = $user->id;
        }

        /* ---------- AMOUNT ---------- */
        $baseAmount  = round((float) $request->amount, 2);
        $totalAmount = $baseAmount;

        /* ---------- TRANSACTION ---------- */
        $tran_id = uniqid('TUPAY_');

        /* ---------- INSERT ORDER ---------- */
        DB::table('payment_orders')->insert([
            'user_id'          => $userId,
            'name'             => $request->billing_name,
            'email'            => $email,
            'phone'            => '88' . $request->phone,
            'amount'           => $totalAmount,
            'status'           => 'Pending',
            'address'          => 'Dhaka',
            'local_id'         => random_int(100000, 999999),
            'transaction_id'   => $tran_id,
            'currency'         => 'BDT',
            'product_name'     => $request->purpose,
            'product_category' => 'Universal',
            'product_profile'  => json_encode([
                'slug' => 'universal-payment',
                'variation' => [
                    'key'     => $request->purpose,
                    'title'   => $request->purpose,
                    'price'   => $baseAmount,
                    'd_price' => $totalAmount,
                    'status'  => 1,
                ]
            ]),
            'customer_type'    => 'B2C',
            'ip_address'       => $request->ip(),
            'time'             => now(),
            'gateway'          => $request->gateway,
        ]);

        /* ---------- SSLCommerz ---------- */
        if ($request->gateway === 'sslcommerz') {

            $post_data = [
                'total_amount' => $totalAmount,
                'currency'     => 'BDT',
                'tran_id'      => $tran_id,
                'cus_name'     => $request->billing_name,
                'cus_email'    => $email,
                'cus_add1'     => 'Dhaka',
                'cus_phone'    => '88' . $request->phone,
                'product_category' => 'Universal',
                'success_url' => url("success?tran_id={$tran_id}"),
                'fail_url'    => url("fail?tran_id={$tran_id}"),
                'cancel_url'  => url("cancel?tran_id={$tran_id}"),
            ];

            return (new SslCommerzNotification())
                ->makePayment($post_data, 'hosted');
        }

        /* ---------- bKash (fee only at redirect) ---------- */
        $bkashPayableAmount = $baseAmount + round($baseAmount * 0.018, 2);

        session([
            'bkash_payment' => [
                'tran_id' => $tran_id,
                'amount'  => $bkashPayableAmount,
                'user_id' => $userId,
                'name'    => $request->billing_name,
                'email'   => $email,
                'phone'   => $request->phone,
            ]
        ]);

        return view('frontend.bkash.auto_redirect', [
            'bkashData' => session('bkash_payment')
        ]);
    }

    /* ============================
       SUCCESS
    ============================ */
    public function success(Request $request)
    {
        // 🔑 SSLCommerz POSTs tran_id
        $tran_id = $request->input('tran_id');

        if (!$tran_id) {
            return redirect()->to('universal-payment')
                ->with('errorMessage', 'Transaction ID missing.');
        }

        $order = DB::table('payment_orders')
            ->where('transaction_id', $tran_id)
            ->first();

        if (!$order) {
            return redirect()->to('universal-payment')
                ->with('errorMessage', 'Invalid transaction.');
        }

        if ($order->status === 'Pending' && $order->gateway === 'sslcommerz') {

            $sslc = new SslCommerzNotification();

            if (!$sslc->orderValidate(
                $request->all(),
                $tran_id,
                $order->amount,
                $order->currency
            )) {
                return redirect()->to('universal-payment')
                    ->with('errorMessage', 'Payment validation failed.');
            }

            DB::table('payment_orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Complete']);

            $order->status = 'Complete';
        }

        // 🔥 এখান থেকেই email যায়
        return $this->successRedirect($order);
    }


    private function successRedirect($order)
    {
        Session::put('fb_event_id', $order->transaction_id);
        Session::put('fb_event_value', $order->amount);

        $this->handlePostPayment($order);
        $this->sendFacebookPurchaseEvent($order);

        Session::put('order_id', $order->id);
        Session::put('successMessage', 'Transaction successfully completed!');

        return redirect()->to('payment-success-message?order_id=' . $order->id);
    }

    /* ============================
       COMMON POST PAYMENT
    ============================ */
    public function handlePostPayment($order)
    {
        $user = DB::table('users')->where('id', $order->user_id)->first();
        if (!$user) return;

        // Common payment success mail
        Mail::to($user->company_email)->send(
            new CustomerPaymentSuccessMail(
                $user,
                $order,
                'Check your email or SMS for login info.'
            )
        );

        // Admin notification
        Mail::to('tripdesigner.xyz@gmail.com')
            ->send(new AdminOrderNotification($user, $order));
    }

    /* ============================
       FAIL / CANCEL
    ============================ */
    public function fail(Request $request)
    {
        return $this->updateStatusAndReturn(
            $request,
            'Failed',
            'Payment failed. Please try again or contact support.'
        );
    }

    public function cancel(Request $request)
    {
        return $this->updateStatusAndReturn(
            $request,
            'Canceled',
            'Payment was canceled. You can try again or contact support.'
        );
    }

    private function updateStatusAndReturn(Request $request, $status, $message)
    {
        $tran_id = $request->input('tran_id');

        if (!$tran_id) {
            return view('frontend.404')->with('msg', 'Invalid transaction request.');
        }

        $order = DB::table('payment_orders')
            ->where('transaction_id', $tran_id)
            ->first();

        if (!$order) {
            return view('frontend.404')->with('msg', 'Transaction not found.');
        }

        /* ============================
        Update status only if Pending
        ============================ */
        if ($order->status === 'Pending') {

            DB::table('payment_orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => $status]);

            // update local object for view
            $order->status = $status;
        }

        /* ============================
        Admin notification ONLY
        (No customer mail here)
        ============================ */
        try {
            $user = DB::table('users')->where('id', $order->user_id)->first();

            if ($user) {
                Mail::to('tripdesigner.xyz@gmail.com')
                    ->send(new AdminOrderNotification($user, $order));
            }
        } catch (\Exception $e) {
            \Log::error('Admin mail failed (fail/cancel)', [
                'order_id' => $order->id,
                'error'    => $e->getMessage()
            ]);
        }

        /* ============================
        Shared status page
        ============================ */
        return view('frontend.payment-success', [
            'order' => $order,
            'successMessage' => $message
        ]);
    }


    /* ============================
       FACEBOOK EVENT (PURPOSE BASED)
    ============================ */
    private function sendFacebookPurchaseEvent($order)
    {
        try {
            $pixelId = config('services.facebook.pixel_id');
            $token   = config('services.facebook.access_token');
            if (!$pixelId || !$token) return;

            $user = DB::table('users')->where('id', $order->user_id)->first();
            if (!$user) return;

            Http::withToken($token)->post(
                "https://graph.facebook.com/v17.0/{$pixelId}/events",
                [
                    'data' => [[
                        'event_name' => 'Purchase',
                        'event_time' => time(),
                        'event_id'   => $order->transaction_id,
                        'action_source' => 'website',
                        'event_source_url' => url('universal-payment'),
                        'user_data' => [
                            'em' => hash('sha256', strtolower($user->company_email)),
                            'ph' => hash('sha256', preg_replace('/\D/', '', $user->company_pnone)),
                        ],
                        'custom_data' => [
                            'currency' => 'BDT',
                            'value' => $order->amount,
                            'content_name' => $order->product_name,
                            'content_type' => 'service',
                        ]
                    ]]
                ]
            );
        } catch (\Exception $e) {
            // log if needed
        }
    }

    /* ============================
       SMS
    ============================ */
    private function sms_send($number, $msg)
    {
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
}
