<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New Payment Received</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color:#f2f4f6; margin:0; padding:30px;">

<div style="max-width:650px; margin:auto; background-color:#ffffff; border-radius:8px;
overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- HEADER -->
    <div style="background-color:#04107C; padding:22px; text-align:center; color:#fff;">
        <h2 style="margin:0; font-size:22px;">💰 New Payment Received</h2>
        <p style="margin:0; font-size:14px; opacity:0.9;">
            Payment Notification
        </p>
    </div>

    <!-- BODY -->
    <div style="padding:25px;">

        <p style="font-size:15px; color:#333;">
            Hello Admin,
        </p>

        <p style="font-size:15px; color:#555; line-height:1.6;">
            A new payment has been successfully completed.  
            Below are the transaction details:
        </p>

        <!-- ORDER DETAILS -->
        <div style="background-color:#f9f9f9; padding:18px; border-radius:6px; margin-top:15px;">
            <h4 style="margin-top:0; color:#04107C;">🧾 Order Information</h4>

            <p style="font-size:14px; color:#333; line-height:1.7; margin:0;">
                <strong>Purpose:</strong>
                {{ str_contains($order->product_name, '_')
                    ? ucwords(str_replace('_', ' ', $order->product_name))
                    : $order->product_name
                }} <br>

                <strong>Amount:</strong> {{ number_format($order->amount, 2) }} BDT <br>
                <strong>Gateway:</strong> {{ strtoupper($order->gateway) }} <br>
                <strong>Status:</strong> {{ $order->status }} <br>
                <strong>Transaction ID:</strong> {{ $order->transaction_id }} <br>
                <strong>Order ID:</strong> {{ $order->id }} <br>
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($order->time)->format('d M Y, h:i A') }}
            </p>
        </div>

        <!-- CUSTOMER DETAILS -->
        <div style="background-color:#f9f9f9; padding:18px; border-radius:6px; margin-top:20px;">
            <h4 style="margin-top:0; color:#04107C;">👤 Customer Information</h4>

            <p style="font-size:14px; color:#333; line-height:1.7; margin:0;">
                <strong>Name:</strong> {{ $user->company_name }} <br>
                <strong>Email:</strong> {{ $user->company_email }} <br>
                <strong>Phone:</strong> {{ $order->phone }}
            </p>
        </div>

        <p style="font-size:14px; color:#555; margin-top:25px;">
            You can view this order in the admin panel for further processing.
        </p>

        <p style="font-size:14px; color:#333; margin-top:20px;">
            Regards, <br>
            <strong>Trip Designer</strong>
        </p>
    </div>

    <!-- FOOTER -->
    <div style="background-color:#04107C; padding:14px; text-align:center;">
        <p style="margin:0; font-size:12px; color:#fff;">
            &copy; {{ date('Y') }} Trip Designer. Admin Notification Email.
        </p>
    </div>

</div>
</body>
</html>
