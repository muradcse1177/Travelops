<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Solvency Certificate</title>
    <style>
        body {
            font-family: 'timesnewroman', serif;
            font-size: 14px;
            line-height: 1.6;
            margin-left: 40px;
            margin-right: 40px;
        }

        .logo {
            width: 130px;
        }

        .bank-info {
            font-size: 14px;
            border-left: 2px solid #000;
            padding-left: 15px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 20px;
            margin-bottom: 25px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 13px;
        }

        .table th, .table td {
            border: 1px solid #000;
            padding: 0;
            text-align: center;
            white-space: nowrap;
        }

        .footer {
            margin-top: 5px;
        }

        .italic-note {
            margin-top: 350px;
            font-size: 14px;
        }
    </style>
</head>
<body>

{{-- Header --}}
<table width="120%" style="margin-bottom: 20px; margin-left: -50px;">
    <tr>
        {{-- Logo --}}
        <td style="width: 160px; vertical-align: top;">
            <img src="{{ public_path('city1.png') }}" alt="City Bank Logo" style="width: 150px;">
        </td>

        {{-- Thin vertical divider --}}
        <td style="width: 15px; vertical-align: middle;">
            <div style="
                width: 0.5px;
                height: 30px;
                background-color: #333;
                margin-top: 40px;
                margin-left: -15px;
                margin-right: auto;
            "></div>
        </td>

        {{-- Bank Info --}}
        <td style="vertical-align: middle;">
            <div style="margin-top: 40px;  margin-left: -25px;">
                City Bank PLC.<br>
                Head Office: Bank Center, 28 Gulshan Avenue, Gulshan 1, Dhaka 1212, Bangladesh
            </div>
        </td>
    </tr>
</table>


{{-- Meta Information --}}
<p style="margin-top: 10px;">
    Sequence No.{{ $data['sequence_no'] }}
    @if($data['type'] == 'physical')
        <br><br>
    @else
        <br>
    @endif
   Date: {{ \Carbon\Carbon::now()->format('d F, Y') }}
</p>

{{-- Body Paragraph --}}
@if(($data['type'] == 'physical'))
    <h4 class="title" style="font-size: 18px;"><strong>To whom it may concern</strong></h4>
    <p style="line-height: 2; text-align: justify; font-size: 16px;">
        This is to certify that, {{ $data['account_name'] }} of Address:
        {{ $data['holder_address'] }} has been maintaining the following accounts with City Bank PLC,
        {{ $data['branch'] }} Branch (Routing No: {{ $data['routing'] }}) since
        {{ \Carbon\Carbon::parse($data['opening_date'])->format('d F, Y') }} and the conduct of the account
        has been noted satisfactory. Details of the accounts as of ({{ \Carbon\Carbon::parse(now())->subDay()->format('d F, Y') }})
        are appended below:
    </p>
@else
    <h4 class="title">TO WHOM IT MAY CONCERN</h4>
    <p style="margin-top: 50px; margin-bottom: 5px; line-height: 1.8; text-align: justify;">
        This is to certify that, <strong>{{ strtoupper($data['account_name']) }}</strong> of Address:
        <strong>{{ strtoupper($data['holder_address']) }}</strong> has been maintaining the following accounts with City Bank PLC,
        <strong>{{ strtoupper($data['branch']) }} BRANCH</strong> (Routing No: <strong>{{ strtoupper($data['routing']) }}</strong>) since
        <strong>{{ \Carbon\Carbon::parse($data['opening_date'])->format('d F, Y') }}</strong> and the conduct of the accounts
        has been noted satisfactory. Details of the accounts as of (<strong>{{ \Carbon\Carbon::parse(now())->subDay()->format('d F, Y') }}</strong>)
        are appended below:
    </p>
@endif


{{-- Table --}}
<table class="table">
    <thead>
    <tr>
        @if($data['type'] == 'physical')
            <th style="width: 20%;">Nature of Account</th>
        @else
            <th style="width: 15%;">Nature of<br>Account</th>
        @endif
        <th style="width: 15%;">Account No</th>
        @if($data['type'] == 'physical')
            <th style="width: 25%;">Account Opening Date</th>
        @else
            <th style="width: 15%;">Account Status</th>
            <th style="width: 20%;">Account<br>Opening<br>Date</th>
            <th style="width: 15%;">Conversion<br>Currency</th>
        @endif
        @if($data['type'] == 'physical')
            <th style="width: 25%;">Present Balance @if($data['type'] == 'physical') {{'(BDT)'}}@endif</th>
        @else
            <th style="width: 15%;">Present Balance @if($data['type'] == 'physical') {{'(BDT)'}}@endif</th>
        @endif

        @if ($data['type'] == 'physical' && ($data['currency'] == 'USD' || $data['currency'] == 'EUR'))
            <th style="width: 20%;  padding-top: 18px; padding-bottom: 5px;">Equivalent to {{ $data['currency'] }}
                <br>@ {{ $data['rate'] }}
            </th>
        @endif
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="padding-bottom: 5px;">{{ $data['account_type'] }}</td>
        <td style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px;">{{ $data['account_no'] }}</td>
        @if($data['type'] == 'physical')
            <td style="padding-bottom: 5px;">{{ strtoupper(\Carbon\Carbon::parse($data['opening_date'])->format('d-M-Y')) }}</td>
        @else
            <td style="padding-bottom: 5px;">{{ $data['status'] }}</td>
            <td style="padding-bottom: 5px;">{{ strtoupper(\Carbon\Carbon::parse($data['opening_date'])->format('d-M-Y')) }}</td>
            <td style="padding-bottom: 5px;">{{ strtoupper($data['currency']) }}</td>
        @endif
        @if($data['type'] == 'physical' && $data['currency'] == 'BDT')
            <td style="padding-bottom: 5px;">{{ $data['balance'] }}</td>
        @endif
        @if($data['type'] == 'physical' && ($data['currency'] == 'USD' || $data['currency'] == 'EUR'))
         <td style="padding-bottom: 5px; text-align: right; padding-right: 5px;">{{ $data['balance'] }}</td>
        @endif
        @if ($data['type'] == 'physical' && ($data['currency'] == 'USD' || $data['currency'] == 'EUR'))
             <td style="padding-bottom: 5px; text-align: right; padding-right: 5px;">{{ $data['converted_amount'] }}</td>
        @endif
    </tr>
    @if ($data['type'] == 'physical' && ($data['currency'] == 'USD' || $data['currency'] == 'EUR'))
        <tr>
            <td colspan="3" style="text-align: center;"><strong>Summation</strong></td>
            <td style="padding-bottom: 5px; text-align: right; padding-right: 5px;"><strong>{{ $data['balance'] }}</strong></td>
            <td style="padding-bottom: 5px; text-align: right; padding-right: 5px;"><strong>{{ $data['converted_amount'] }}</strong></td>
        </tr>
     @endif
    </tbody>
</table>

@if(($data['type'] == 'physical'))
<div class="footer">
    <p style="font-size: 16px; margin-top: 25px; text-align: justify">
        This certificate is issued at the request of our valued account holder based on the accounts statement and
        without assuming any risk or prejudice on the part of this bank or any of its officials.
    </p>
</div>
@else
    <div class="footer">
        <p tyle="text-align: justify;">
            This certificate is issued at the request of our valued account holder based on the accounts statement and
            without assuming any risk or prejudice on the part of this bank or any of its officials.
        </p>
    </div>
@endif



@if(($data['type'] == 'physical'))

    {{-- Show Authorized Signatures & Footer --}}
    <br><br><br>
    <table width="100%" style="margin-top:40px;">
        <tr>
            <td style="width: 60%; text-align: left;">
                <p><strong>Authorized Signature</strong></p>
                <p style="font-size: 12px; margin-top: -10px;">

                </p>
            </td>
            <td style="width: 30%; text-align: left;">
                <p><strong>Authorized Signature</strong></p>
                <p style="font-size: 12px; margin-top: -10px;">

                </p>
            </td>
        </tr>
    </table>
    @php
        $margin =  '150px';
        if(($data['currency'] == 'USD' || $data['currency'] == 'EUR'))
        $margin =  '60px';
    @endphp
    {{-- Footer Info --}}
    <div style="height:50px;"></div>
    <div style="margin-top:{{ $margin }}; font-size:14px; text-align:left; line-height: 1.3; margin-left: -30px;">

        Phone: +880 2 58813483, 58814375, 58813126<br>
        Fax: +880 2 58814231; G.P.O Box No. 3381, Dhaka<br>
        E-mail: info@citybankplc.com; Web: www.citybankplc.com; SWIFT: CIBLBDDH

    </div>
@else

    {{-- Old italic note --}}
    <p class="italic-note">
        *** This is a system generated certificate and requires no signature. In case any discrepancy is found,
        please inform any of our branches within 15 days of receipt of this certificate.
    </p>

@endif


</body>
</html>
