<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Status Updated - {{ $user->company_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial; background:#f2f4f6; padding:30px;">
<div style="max-width:600px; margin:auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background:#eedb2d; padding:20px; text-align:center;">
        @if(!empty($company->logo))
            <img src="{{ url($company->logo) }}" style="height:60px;">
        @else
            <h2>{{ $company->company_name ?? 'Company' }}</h2>
        @endif
    </div>

    <div style="padding:25px;">
        <h2 style="color:#333;">🔔 Account Status Updated</h2>

        <p style="font-size:16px; color:#555;">
            Hello <strong>{{ $user->company_name }}</strong>,
            <br><br>
            Your account status has been updated to:
        </p>

        <!-- Dynamic Status Box -->
        <div style="
            padding:15px; 
            border-radius:6px; 
            margin:20px 0;
            background:
                @if($newStatus == 'Active')
                    #d4edda
                @else
                    #f8d7da
                @endif;
            color:
                @if($newStatus == 'Active')
                    #155724
                @else
                    #721c24
                @endif;
        ">
            <strong>Status:</strong> {{ $newStatus }}
        </div>

        <!-- Dynamic Message -->
        @if($newStatus == 'Active')
            <p style="font-size:14px; color:#155724; line-height:1.6;">
                Great news! Your account is now <strong>Active</strong>.  
                You can now log in using the link below:
            </p>

            <p style="margin:15px 0;">
                <a href="https://tripdesigner.net/all-login" 
                   style="background:#28a745; padding:10px 18px; color:#fff; text-decoration:none; border-radius:5px;">
                    👉 Login Now
                </a>
            </p>
        @else
            <p style="font-size:14px; color:#777; line-height:1.6;">
                If you believe this was a mistake, please contact support immediately.
            </p>
        @endif

    </div>

    <!-- Footer -->
    <div style="background:#f8f9fa; padding:15px; text-align:center; border-top:1px solid #ddd;">
        <p style="margin:0; font-size:13px; color:#555;">
            © {{ date('Y') }} {{ $company->company_name ?? 'Trip Designer' }}. All rights reserved.
        </p>
    </div>

</div>
</body>
</html>
