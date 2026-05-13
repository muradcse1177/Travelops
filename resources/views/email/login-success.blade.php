<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Success Notification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color:#f2f4f6; margin:0; padding:30px;">
<div style="max-width:600px; margin:auto; background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background-color:#eedb2d; padding:20px; text-align:center;">
        @if(!empty($company->logo))
            <img src="{{ url($company->logo) }}" alt="{{ $company->name ?? 'Company' }}" style="height:60px;">
        @else
            <h2 style="color:#fff; margin:0;">{{ $company->name ?? 'Company' }}</h2>
        @endif
    </div>

    <!-- Body -->
    <div style="padding:25px;">
        <h2 style="color:#333; margin-top:0;">🔐 Login Successful</h2>

        <p style="font-size:16px; color:#555; line-height:1.6; margin-bottom:20px;">
            Hello <strong>{{ $user->company_name ?? 'User' }}</strong>,  
            <br><br>
            Your account has been successfully logged in.
        </p>

        <div style="margin:25px 0; background-color:#f9f9f9; padding:15px; border-radius:6px;">
            <p style="font-size:15px; color:#333; margin:0; line-height:1.6;">
                <strong>Email:</strong> {{ $user->company_email }} <br>
                <strong>Login Time:</strong> {{ now()->format('d M Y, h:i A') }} <br>
                <strong>IP Address:</strong> {{ request()->ip() }}
            </p>
        </div>

        <p style="font-size:14px; color:#777; margin-top:30px; line-height:1.6;">
            If this was not you, please reset your password immediately or contact support.
        </p>
    </div>

    <!-- Footer -->
    <div style="background-color:#f8f9fa; padding:15px; text-align:center; border-top:1px solid #ddd;">
        <p style="margin:0; font-size:13px; color:#555;">
            &copy; {{ date('Y') }} {{ $company->company_name ?? 'Trip Designer' }}. All rights reserved.
        </p>
    </div>

</div>
</body>
</html>
