<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Study Abroad Application Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color:#f2f4f6; margin:0; padding:30px;">
<div style="max-width:600px; margin:auto; background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background-color:#f5dd08; padding:20px; text-align:center;">
        @if(!empty($company->logo))
            <img src="{{ url($company->logo) }}" alt="{{ $company->name ?? 'Trip Designer' }}" style="height:60px;">
        @else
            <h2 style="color:#fff; margin:0;">{{ $company->name ?? 'Trip Designer' }}</h2>
        @endif
    </div>

    <!-- Body -->
    <div style="padding:25px;">
        <h2 style="color:#333; margin-top:0;">Thank you for your application, {{ $application->name }}!</h2>

        <p style="font-size:16px; color:#555; line-height:1.6; margin-bottom:20px;">
            We have successfully received your application for 
            <strong>{{ $application->course_name }}</strong> at 
            <strong>{{ $application->university_name }}</strong>, 
            <strong>{{ $application->country_name }}</strong>.
        </p>

        <div style="margin:25px 0; background-color:#f9f9f9; padding:15px; border-radius:6px;">
            <p style="font-size:15px; color:#333; margin:0; line-height:1.6;">
                <strong>Tracking ID:</strong> {{ $application->tracking_id }} <br>
                <strong>Email:</strong> {{ $application->email }} <br>
                <strong>Phone:</strong> {{ $application->country_code }}{{ $application->phone }}
            </p>
        </div>

        <!-- ✅ Login Info (Only show if $defaultPassword is not '[Existing User]') -->
        @if($defaultPassword !=0)
            <div style="margin:25px 0; background-color:#fff5d1; padding:15px; border-radius:6px;">
                <h3 style="margin-top:0; color:#b36b00;">🔐 Login Information</h3>
                <p style="font-size:15px; color:#333; line-height:1.7; margin:0;">
                    You can track your application status anytime by logging into your account.<br><br>
                    <strong>Email:</strong> {{ $user->company_email }}<br>
                    <strong>Password:</strong> {{ $defaultPassword }}<br><br>
                    <a href="{{ url('/') }}" 
                        style="background-color:#04107C; color:#fff; text-decoration:none; padding:10px 20px; border-radius:4px;">
                        🔗 Login to Portal
                    </a>
                </p>
            </div>
        @endif

        <p style="font-size:14px; color:#777; margin-top:30px; line-height:1.6;">
            📍 {{ $company->address ?? 'Address not available' }} <br>
            📞 {{ $company->company_pnone ?? '' }}<br>
            ✉️ {{ $company->company_email ?? '' }}
        </p>
    </div>

    <!-- Footer -->
    <div style="background-color:#f8f9fa; padding:15px; text-align:center; border-top:1px solid #ddd;">
        <p style="margin:0; font-size:13px; color:#555;">
            &copy; {{ date('Y') }} {{ $company->name ?? 'Trip Designer' }}. All rights reserved.
        </p>
    </div>

</div>
</body>
</html>
