<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{$lead->service_name}} Request Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color:#f2f4f6; margin:0; padding:30px;">
<div style="max-width:600px; margin:auto; background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- Header -->
    <div style="background-color:#facc34; padding:20px; text-align:center;">
        @if(!empty($company->logo))
            <img src="{{ url($company->logo) }}" alt="{{ $company->name ?? 'Trip Designer' }}" style="height:60px;">
        @else
            <h2 style="color:#fff; margin:0;">{{ $company->name ?? 'Trip Designer' }}</h2>
        @endif
    </div>

    <!-- Body -->
    <div style="padding:25px;">
        <h2 style="color:#333; margin-top:0;">Thank you for your request, {{ $lead->name }}!</h2>

        <p style="font-size:16px; color:#555; line-height:1.6; margin-bottom:20px;">
            Your request for <strong>{{ $lead->service_name }}</strong> has been received successfully.<br>
            Our team will contact you soon regarding your request.
        </p>

        <div style="margin:25px 0; background-color:#f9f9f9; padding:15px; border-radius:6px;">
            <p style="font-size:15px; color:#333; margin:0; line-height:1.6;">
                <strong>Service:</strong> {{ $lead->service_name ?? 'N/A' }} <br>
                <strong>Purpose:</strong> {{ $lead->purpose ?? 'Not specified' }} <br>
                <strong>Phone:</strong> {{ $lead->country_code ?? '+88' }}{{ $lead->phone ?? '' }} <br>
                <strong>Email:</strong> {{ $lead->email ?? 'N/A' }} <br>
                <strong>Amount:</strong> {{ isset($lead->amount) ? number_format($lead->amount, 2) : 'N/A' }}
            </p>
        </div>

        <p style="font-size:14px; color:#777; margin-top:30px; line-height:1.6;">
            📍 {{ $company->address ?? 'Address not available' }} <br>
            📞 {{ $company->phone1 ?? '' }} {{ !empty($company->phone2) ? ' | '.$company->phone2 : '' }} <br>
            ✉️ {{ $company->email ?? '' }}
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
