<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Support Reply from {{ $company->company_name ?? 'Trip Designer' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color:#f2f4f6; margin:0; padding:30px;">

<div style="max-width:600px; margin:auto; background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background-color:#eedb2d; padding:20px; text-align:center;">
        @if(!empty($company->logo))
            <img src="{{ url($company->logo) }}" alt="{{ $company->name ?? 'Trip Designer' }}" style="height:60px;">
        @else
            <h2 style="color:#fff; margin:0;">{{ $company->company_name ?? 'Trip Designer' }}</h2>
        @endif
    </div>

    <!-- Body -->
    <div style="padding:25px;">
        <h2 style="color:#333; margin-top:0;">
            📩 Support Team Reply
        </h2>

        <p style="font-size:16px; color:#555; line-height:1.6;">
            Hello <strong>{{ $customer_name ?? 'Customer' }}</strong>,  
            <br><br>
            We have reviewed your message and here is our response:
        </p>

        <div style="margin:25px 0; background-color:#f9f9f9; padding:20px; border-radius:6px; border-left:4px solid #0284c7;">
            <p style="font-size:15px; color:#333; line-height:1.6; white-space:pre-line;">
                {{ $reply_message }}
            </p>
        </div>

        <p style="font-size:14px; color:#777; margin-top:20px; line-height:1.6;">
            If you need further assistance, feel free to reply to this email anytime.
            <br><br>
            Best Regards,<br>
            <strong>{{ $company->company_name ?? 'Trip Designer' }} Support Team</strong>
        </p>
    </div>

    <!-- Footer -->
    <div style="background-color:#f8f9fa; padding:15px; text-align:center; border-top:1px solid #ddd;">
        <p style="margin:0; font-size:12px; color:#555;">
            {{ $company->address ?? 'Address not available' }}
        </p>
        <p style="margin:5px 0 0; font-size:12px; color:#777;">
            &copy; {{ date('Y') }} {{ $company->company_name ?? 'Trip Designer' }}. All rights reserved.
        </p>
    </div>

</div>
</body>
</html>
