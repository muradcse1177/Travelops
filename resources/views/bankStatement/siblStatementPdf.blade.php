<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SIBL Statement</title>

    <style>
        body {
            font-family: calibri, sans-serif;
            font-size: 9px;
            margin: 20px 0px 10px 20px;
            position: relative;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            top: 24%;
            left: 22%;
            opacity: .5;
            width: 350px;
        }
        .bankname-watermark {
            position: fixed;
            top: 56%;
            left: 17%;
            opacity: .5;
            width: 450px;
        }
        .website-watermark {
            position: fixed;
            top: 61%;
            left: 28%;
            opacity: .5;
            width: 250px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .bank-name {
            font-weight: bold;
            font-size: 14px;
        }

        .branch {
            font-weight: bold;
            font-size: 14px;
            margin-top: 3px;
        }

        .statement-title {
            margin-top: 5px;
            font-size: 12px;
        }

        .info-section {
            width: 100%;
            margin-top: 20px;
        }

        .left-info {
            width: 48%;
            float: left;
        }

        .right-info {
            width: 48%;
            float: right;
             margin-right: -30px;  
        }

        .info-table {
            width: 100%;
        }

        .info-table td {
            padding: 3px 0;
            vertical-align: top;
        }

        .label {
            white-space: nowrap; 
            font-weight: bold;
            width: 15%;   /* আগে 30% ছিল */
        }

        .colon {
            width: 3%;
            text-align: left;  /* center না রেখে left করলে আরো কাছে আসবে */
        }


        .rcolon {
            width: 10%;
            text-align: center;
        }

        .value {
            width: 75%;
        }

        .clear {
            clear: both;
        }

        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .transaction-table th {
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            text-align: left;
            padding: 5px 3px;
        }

        .transaction-table td {
            padding: 6px 3px;
        }

        .right {
            text-align: right;
        }
        .transaction-table th.right,
        .transaction-table td.right {
            text-align: right !important;
        }
        .footer-note {
            margin-top: 60px;
            text-align: center;
            font-size: 10px;
        }

        .bottom-footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            width: 100%;
            font-size: 9px;
            border-top: 1px solid #000;   /* 🔥 পুরো লাইন এখানেই */
            padding-top: 4px;
        }

        .bottom-left {
            position: absolute;
            left: 0;
            top: 0;
        }

        .bottom-right {
            position: absolute;
            right: 0;
            top: 0;
        }

        .bottom-center {
            width: 260px;
            margin: -25px auto 0 auto;   /* 🔥 negative margin দিয়ে line এর উপর তুললাম */
            text-align: center;
            border: 1px solid #000;
            padding: 4px 0;
            background: #fff;
        }

    </style>
</head>

<body>

    <!-- Watermark -->
    <img src="{{ public_path('/Icon-Png-SB.png') }}" class="watermark">
    <img src="{{ public_path('/English-title-png-sb.png') }}" class="bankname-watermark">
    <img src="{{ public_path('/subtitle-of-sb.png.gif') }}" class="website-watermark">
    <!-- Header -->
    <div class="header">
        <div class="bank-name">
            SHAHJALAL ISLAMI BANK PLC.
        </div>
        <div class="branch">
            BANSHAL BRANCH, DHAKA
        </div>
        <div class="statement-title">
            <strong>Statement of Account</strong>
        </div>
    </div>

    <!-- Info Section -->
    <div class="info-section">

        <!-- Left -->
        <div class="left-info">
            <table class="info-table">
                <tr>
                    <td class="label">Name</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $name }}</td>
                </tr>
                <tr>
                    <td class="label">Address</td>
                    <td class="colon">:</td>
                    <td class="value">{{ strtoupper($address) }}</td>
                </tr><br>
                <tr>
                    <td class="label">City</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $city }}</td>
                </tr>
                <tr>
                    <td class="label">Phone</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $phone }}</td>
                </tr>
                <tr>
                    <td class="label">Period</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $period }}</td>
                </tr>
            </table>
        </div>

        <!-- Right -->
        <div class="right-info">
            <table class="info-table">
                <tr>
                    <td class="label">A/C No</td>
                    <td class="rcolon">:</td>
                    <td class="value">{{ $ac_no }}</td>
                </tr>
                <tr>
                    <td class="label">A/C Type</td>
                    <td class="rcolon">:</td>
                    <td class="value">{{ $ac_type }}</td>
                </tr>
                <tr>
                    <td class="label">Currency</td>
                    <td class="rcolon">:</td>
                    <td class="value">{{ $currency }}</td>
                </tr>
                <tr>
                    <td class="label">AC Status</td>
                    <td class="rcolon">:</td>
                    <td class="value">{{ $ac_status }}</td>
                </tr>
                <tr>
                    <td class="label">Generation Date</td>
                    <td class="rcolon">:</td>
                    <td class="value">{{ $generation_date }}</td>
                </tr>
                <tr>
                    <td class="label">Maturity Date</td>
                    <td class="rcolon">:</td>
                    <td class="value">{{ $maturity_date }}</td>
                </tr>
                <tr>
                    <td class="label">A/C Open Date</td>
                    <td class="rcolon">:</td>
                    <td class="value">{{ $open_date }}</td>
                </tr>
            </table>
        </div>

        <div class="clear"></div>
    </div>

    <!-- Transaction Table -->
    <table class="transaction-table">
        <thead>
            <tr>
                <th>Transaction Date</th>
                <th>Cheque No</th>
                <th style="width: 30%;">Narration</th>
                <th class="right">Trans Type</th>
                <th class="right">Debit</th>
                <th class="right">Credit</th>
                <th class="right">Balance</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><strong>Opening Balance</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="right"></td>
                <td class="right"></td>
                <td class="right"><strong>{{ $opening_balance }}</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Footer -->
    <div class="bottom-footer">

    <div class="bottom-left">
        BankUltimus
    </div>

    <div class="bottom-center">
        C= Cash, Tr= Transfer, L= Clearing
    </div>

    <div class="bottom-right">
        Page 1 of 1
    </div>

</div>

</body>
</html>