<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Account Created Successfully</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="font-family: Arial, sans-serif; background-color:#f2f4f6; margin:0; padding:30px;">

<div style="max-width:600px; margin:auto; background-color:#ffffff; border-radius:8px;
overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.1);">

    <!-- HEADER -->
    <div style="background-color:#04107C; padding:22px; text-align:center; color:#fff;">
        <h2 style="margin:0; font-size:22px;">🎉 Account Created Successfully!</h2>
        <p style="margin:0; font-size:14px; opacity:0.9;">
            Welcome to {{ $company->name ?? 'Trip Designer' }}
        </p>
    </div>

    <!-- BODY CONTENT -->
    <div style="padding:25px;">
        <p style="font-size:16px; color:#333;">
            Dear {{ $user->company_name }},
        </p>

        <p style="font-size:15px; color:#555; line-height:1.6;">
            Your account has been successfully created.  
            You can now use your account to access our services and complete payments smoothly.
        </p>

        <!-- LOGIN DETAILS BOX -->
        <div style="background-color:#f9f9f9; padding:18px; border-radius:6px; border-left:4px solid #04107C;">
            <h4 style="margin-top:0; color:#04107C;">🔐 Login Credentials</h4>
            <p style="font-size:15px; color:#333; line-height:1.7; margin:0;">
                <strong>Email:</strong> {{ $user->company_email }} <br>
                <strong>Password:</strong> {{ $password }}
            </p>
        </div>

        <!-- INFO SUMMARY -->
        <div style="background-color:#f9f9f9; padding:18px; border-radius:6px; margin-top:20px;">
            <h4 style="margin-top:0; color:#04107C;">🧾 Information</h4>
            <p style="font-size:15px; color:#333; line-height:1.7; margin:0;">
                <strong>Service Purpose:</strong> {{ $purpose ?? 'Universal Service' }} <br>
                <strong>Account Email:</strong> {{ $user->company_email }}
            </p>
        </div>

        <p style="font-size:15px; color:#555; margin-top:25px; line-height:1.6;">
            If you face any issues accessing your account, feel free to reply to this email.
            Our support team will assist you.
        </p>

        <p style="font-size:15px; color:#333; margin-top:20px;">
            Best Regards, <br>
            <strong>{{ $company->name ?? 'Trip Designer Team' }}</strong>
        </p>
    </div>

    <!-- FOOTER -->
    <div style="background-color:#04107C; padding:15px; text-align:center; border-top:1px solid #ddd;">
        <p style="margin:0; font-size:13px; color:#fff;">
            &copy; {{ date('Y') }} {{ $company->name ?? 'Trip Designer' }}. All rights reserved.
        </p>
    </div>

</div>
</body>
</html>
