<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $company->company_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="margin:0; padding:20px; background:#eef1f6; font-family:Arial, sans-serif;">

<!-- Main Container -->
<div style="max-width:620px; margin:auto; background:#ffffff; border-radius:12px; overflow:hidden; 
            box-shadow:0 4px 15px rgba(0,0,0,0.08);">

    <!-- Header -->
    <div style="background:#ffc107; padding:28px 20px; text-align:center;">
        @if(!empty($company->logo))
            <img src="{{ url($company->logo) }}" style="max-height:65px;">
        @else
            <h2 style="margin:0; color:#fff; font-size:22px; letter-spacing:0.5px;">
                {{ $company->company_name }}
            </h2>
        @endif
    </div>

    <!-- Message Body -->
    <div style="padding:30px 25px; line-height:1.8; font-size:15px; color:#333;">
        {!! $messageBody !!}
    </div>

    <!-- Footer -->
    <div style="background:#fafafa; padding:18px; text-align:center; border-top:1px solid #e5e5e5;">
        <p style="margin:0; font-size:13px; color:#777;">
            © {{ date('Y') }} {{ $company->company_name }} — All Rights Reserved.
        </p>
    </div>

</div>

</body>
</html>
