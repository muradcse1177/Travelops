<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BRAC Bank Solvency Certificate</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .branch-info {
            text-align: left;
            font-size: 11px;
            line-height: 1;
        }
        .issue-info {
            margin-top: 20px;
            font-size: 12px;
        }
        .title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14px;
        }
        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Header with Logo + Branch Info -->
<table>
    <tr>
        <td width="65%" style="vertical-align: top;">
            <img src="{{ public_path('brac.png') }}" alt="BRAC Bank" width="70%">
        </td>
        <td width="35%" class="branch-info">
            <strong>BRAC Bank PLC.</strong><br>
            <span style="font-weight:bold;">{{ $data['branch_name'] ?? 'Badda Branch' }}</span><br>
            {!! nl2br(e($data['branch_address'])) !!}<br>
            SWIFT   : BRBKBDDH <br>
            E-mail  : enquiry@bracbank.com <br>
            Website : www.bracbank.com <br>
            24 Hours Call Center : 16221
        </td>
    </tr>
</table>

<!-- Issue Info -->
<table style="margin-top:20px;">
    <tr>
        <td width="50%">
            Issue date: {{ \Carbon\Carbon::parse($data['issue_date'])->format('d-F-Y') }} <br>
            Ref: BBL {{ $data['reference_no'] }}
        </td>
        <td width="50%"></td>
    </tr>
</table>

<!-- Title -->
<div class="title">BALANCE CONFIRMATION CERTIFICATE</div>
<div class="subtitle">To Whom It May Concern</div>
<!-- Paragraph Above Table -->
<!-- Paragraph Above Table -->
<!-- Paragraph Above Table -->
<p style="font-size:12px; margin-top:20px; line-height:1.6;">
    This is to certify that the following customer has been maintaining the mentioned account with
    BRAC Bank PLC. since {{ \Carbon\Carbon::parse($data['account_open_date'])->format('d-M-Y') }}.
</p>

<!-- Account Info Table -->
<!-- Account Info Table -->
<table style="width:100%; border-collapse: collapse; font-size:12px; margin-top:10px;" border="1">
    <tr>
        <td width="28%" style="padding-left:6px;">Account Number</td>
        <td width="4%" style="text-align:center;">:</td>
        <td width="68%" style="padding-left:6px;">{{ $data['account_number'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:6px;">Account Title</td>
        <td style="text-align:center;">:</td>
        <td style="padding-left:6px;">{{ $data['account_title'] }}</td>
    </tr>
    <tr style="height:40px;">
        <td style="padding-left:6px; vertical-align: top;">Account Holder's Name</td>
        <td style="text-align:center; vertical-align: top;">:</td>
        <td style="padding-left:6px; vertical-align: top;">
            {{ strtoupper($data['account_holder']) }}
            <br>
            <br>
            <br>
            <br>
        </td>
    </tr>
    <tr>
        <td style="padding-left:6px;">Account Currency</td>
        <td style="text-align:center;">:</td>
        <td style="padding-left:6px;"> {{ strtoupper($data['account_currency']) }}</td>
    </tr>
    <tr>
        <td style="padding-left:6px;">Type of Account</td>
        <td style="text-align:center;">:</td>
        <td style="padding-left:6px;">{{ strtoupper($data['account_type']) }}</td>
    </tr>
    <tr>
        <td style="padding-left:6px;">Account Status</td>
        <td style="text-align:center;">:</td>
        <td style="padding-left:6px;">{{ strtoupper($data['account_status']) }}</td>
    </tr>
    <tr>
        <td style="padding-left:6px;">Account Open Date</td>
        <td style="text-align:center;">:</td>
        <td style="padding-left:6px;">{{ \Carbon\Carbon::parse($data['account_open_date'])->format('d-M-Y') }}</td>
    </tr>
    <tr>
        <td style="padding-left:6px;">Branch Name</td>
        <td style="text-align:center;">:</td>
        <td style="padding-left:6px;"> {{ strtoupper($data['branch_name']) }}</td>
    </tr>
    <tr>
        <td style="padding-left:6px;">
            Balance As on Date<br>
            {{ \Carbon\Carbon::parse($data['balance_date'])->format('d-M-Y') }}
        </td>
        <td style="text-align:center;">:</td>
        <td style="padding-left:6px;">
            BDT {{ number_format($data['balance_amount'],2) }}
            ({{ ucfirst($data['balance_in_words']) }})
        </td>
    </tr>
    <tr style="height:60px;"> <!-- Communication row বড় -->
        <td style="padding-left:6px; vertical-align: top;">Communication Address</td>
        <td style="text-align:center; vertical-align: top;">:</td>
        <td style="padding-left:6px; vertical-align: top;">{!! nl2br(e(strtoupper($data['communication_address']))) !!}
            <br>
            <br>
            <br>
        </td>
    </tr>
    <!-- শেষের row -->
    <tr style="height:200px;">
        <td colspan="3">

            <br>
            <br>
            <br>
        </td>
    </tr>
</table>


<!-- Disclaimer -->
<p style="font-size:11px; margin-top:15px; line-height:1.5;">
    This certificate has been issued upon request of the customer as on
    {{ \Carbon\Carbon::parse($data['issue_date'])->format('d-M-Y') }} and the risk/responsibility
    of the Bank and its officials are restricted to the contents of this certificate only.
</p>
<!-- Footer -->
<div style="position: absolute; bottom: 30px; left: 0; width: 100%;">
    <table style="width:100%;">
        <tr>
            <!-- First Signature -->
            <td style="width:30%; text-align:left; vertical-align:bottom;">
                <div style=" width:70%; margin:0 auto; font-size:11px;">
                    Authorized Signature
                </div>
            </td>

            <!-- Second Signature -->
            <td style="width:30%; text-align:left; vertical-align:bottom;">
                <div style=" width:70%; margin:0 auto; font-size:11px;">
                    Authorized Signature
                </div>
            </td>
        </tr>
    </table>
</div>

<div style="position: absolute; bottom: 0; right: 20px; text-align: center;">
    <img src="{{ public_path('global.png') }}" alt="Global Alliance for Banking on Values" width="100"><br>
    <span style="font-weight:bold; font-size:12px;">PROUD MEMBER</span>
</div>
</body>
</html>
