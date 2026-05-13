<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payment Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color:#f2f4f6; margin:0; padding:30px;">

<div style="max-width:600px; margin:auto; background-color:#ffffff; border-radius:8px;
overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- HEADER -->
    <div style="background-color:#04107C; padding:22px; text-align:center; color:#fff;">
        <h2 style="margin:0; font-size:22px;">🎉 Payment Successful!</h2>
        <p style="margin:0; font-size:14px; opacity:0.9;">
            Thank you for your payment
        </p>
    </div>

    <!-- BODY CONTENT -->
    <div style="padding:25px;">
        <p style="font-size:16px; color:#333;">
            Dear {{ $user->company_name }},
        </p>

        <p style="font-size:15px; color:#555; line-height:1.6;">
            We’re happy to inform you that your payment has been
            <strong>successfully completed</strong>.
        </p>

        <!-- LOGIN DETAILS (IF APPLICABLE) -->
        <div style="background-color:#f9f9f9; padding:18px; border-radius:6px; border-left:4px solid #04107C;">
            <h4 style="margin-top:0; color:#04107C;">🔐 Account Information</h4>
            <p style="font-size:15px; color:#333; line-height:1.7; margin:0;">
                <strong>Email:</strong> {{ $user->company_email }} <br>
                {{ $passwordNotice }}
            </p>
        </div>

        <!-- PAYMENT SUMMARY -->
        <div style="background-color:#f9f9f9; padding:18px; border-radius:6px; margin-top:20px;">
            <h4 style="margin-top:0; color:#04107C;">🧾 Payment Summary</h4>
            <p style="font-size:15px; color:#333; line-height:1.7; margin:0;">
                <strong>Purpose:</strong> {{ $order->product_name }} <br>
                <strong>Amount Paid:</strong> {{ number_format($order->amount, 2) }} BDT <br>
                <strong>Transaction ID:</strong> {{ $order->transaction_id }}
            </p>
        </div>

        <p style="font-size:15px; color:#555; margin-top:25px; line-height:1.6;">
            If you have any questions regarding this payment, simply reply to this email.
            Our support team will be happy to assist you.
        </p>

        <p style="font-size:15px; color:#333; margin-top:20px;">
            Best Regards, <br>
            <strong>{{ $company->name ?? 'Trip Designer Team' }}</strong>
        </p>
    </div>

    <!-- FOOTER -->
    <div style="background-color:#04107C; padding:15px; text-align:center;">
        <p style="margin:0; font-size:13px; color:#fff;">
            &copy; {{ date('Y') }} {{ $company->name ?? 'Trip Designer' }}. All rights reserved.
        </p>
    </div>

</div>
</body>
</html>
