<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>City Bank Statement</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            color: #000;
        }

        .logo {
            text-align: left;
            margin-bottom: 5px;
        }
        .logo img {
            height: 80px;
        }
        .header-table {
            width: 100%;
            margin-bottom: 10px;
        }
        .header-table td {
            vertical-align: top;
            padding: 3px;
        }
        .header-left {
            width: 60%;
            font-size: 12px;
        }
        .header-right {
            width: 40%;
            font-size: 11px;
        }
        h4 {
            text-align: center;
            margin: 10px 0;
            font-size: 12px;
        }
        table.statement {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        table.statement th, table.statement td {
            border: 1px solid #000;
            padding: 3px;
            font-size: 11px;
        }
        table.statement th {
            background: #f1f1f1;
            text-align: center;
        }
        table.statement td {
            text-align: right;
        }
        table.statement td:nth-child(1),
        table.statement td:nth-child(2) {
            text-align: center;
        }
        table.statement td:nth-child(3) {
            text-align: left;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 10px;
        }
        table {
            font-family: "Times New Roman", Times, serif;
        }
        header, footer {
            font-family: "Times New Roman", Times, serif;
        }
        @page {
            margin-top: 200px;   /* header এর height অনুযায়ী space */
            margin-bottom: 70px;
            margin-left: 40px;
            margin-right: 40px;
        }
        header {
            position: fixed;
            top: -180px;   /* @page margin এর সাথে match করবে */
            left: 0;
            right: 0;
            height: 160px;
        }

        .news-gothic {
            font-family: 'NewsGothicStd', sans-serif;
        }

        /* Optional: override with News Gothic Mono if used */
        .mono {
            font-family: 'NewsGothicStd', monospace;
            font-size: 11px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo" style="display:inline-block; background:#f6f6f6; padding:1px;">
        <img src="{{ public_path('1cc.png') }}" alt="City Bank" width="180" style="display:block;">
    </div>

    <table class="header-table" style="font-size: 12px; width:100%;">
        <tr>
            <td class="header-left" style="line-height: 1.8; width:60%;">
                <strong style="display:inline-block; border-bottom:1px solid #000; margin-bottom:5px;">
                    {{ strtoupper($info['accountName']) }}
                </strong><br>

                <p style="line-height: normal; margin-bottom: 5px;">
                    {{ strtoupper($info['accountAddress']) }}
                </p>

                <p><strong>{{ strtoupper($info['bankBranch']) }}</strong></p>
                <p style="line-height: normal;">
                    <strong>{{ strtoupper($info['branchAddress']) }}</strong>
                </p>
                <strong>Routing No: </strong>{{ $info['routing'] }} <br>
                <strong>Swift Code: </strong>CIBLBDDH
            </td>

            <td class="header-right" style="line-height: 2.0; width:40%;">
                <br><br>
                <br>
                <strong>Account Number:</strong> {{ $info['accountNumber'] }} <br>
                <strong>Account Type:</strong> {{ strtoupper($info['productName']) }} <br>
                <strong>Customer ID:</strong> {{ $info['customerId'] }} <br>
                <strong>Currency:</strong> {{ strtoupper($info['currency']) }} <br>
                <strong>Status:</strong> ACTIVE
            </td>
        </tr>
    </table>

    <h4 style="font-size: 14px; text-align:center; margin-top:8px;">
        <strong>
            @php
                $dates = explode(' - ', $info['periodFrom']);
                $fromDate = \Carbon\Carbon::createFromFormat('d-m-Y', trim($dates[0]))->format('d-M-Y');
                $toDate = isset($dates[1]) ? \Carbon\Carbon::createFromFormat('d-m-Y', trim($dates[1]))->format('d-M-Y') : '';
            @endphp
            Account Statement from Date: {{ strtoupper($fromDate) }} Till Date: {{ strtoupper($toDate) }}
        </strong>
    </h4>
</header>


{{-- Statement Table --}}
@php
    $chunks = array_chunk($transactions, 34); // প্রতি পেজে ৩২টা ট্রানজেকশন
    $opening = $info['openingBalance'] ?? 0;
    $totalDeposit = 0;
    $totalWithdrawal = 0;
    $closing = $opening;
@endphp

@foreach ($chunks as $index => $pageTransactions)
    {{-- Spacer --}}
    @if ($index === 0)
        <div style="height: 175px;"></div>
    @else
        <div style="page-break-before: always;"></div>
        <div style="height: 175px;"></div>
    @endif

    <table class="statement" style="width:100%; border-collapse:collapse; font-size:12px; margin-top: -20px;" >
        <thead>
        <tr style="background:#f1f1f1;">
            <th style="width:10%; text-align:center;">Date</th>
            <th style="width:10%; text-align:center;">Cheque</th>
            <th style="width:40%; text-align:center;">Description</th>
            <th style="width:10%; text-align:center;">Withdraw</th>
            <th style="width:10%; text-align:center;">Deposit</th>
            <th style="width:20%; text-align:center;">Balance</th>
        </tr>
        </thead>
        <tbody>
        {{-- Opening Balance শুধু প্রথম পেজে --}}
        @if ($index === 0)
            <tr>
                <td style="text-align:center;"></td>
                <td></td>
                <td>Balance Forward</td>
                <td></td>
                <td></td>
                <td style="text-align:right;">{{ number_format($opening, 2) }}</td>
            </tr>
        @endif

        {{-- Transactions --}}
        @foreach ($pageTransactions as $txn)
            @php
                $deposit = $txn['deposit'] ?? 0;
                $withdrawal = $txn['withdrawal'] ?? 0;

                if ($deposit > 0) {
                    $closing += $deposit;
                    $totalDeposit += $deposit;
                } elseif ($withdrawal > 0 && $closing >= $withdrawal) {
                    $closing -= $withdrawal;
                    $totalWithdrawal += $withdrawal;
                }
            @endphp
            <tr>
                <td style="text-align:center; font-size:10px;">{{ $txn['date'] }}</td>
                <td style="text-align:center; font-size:10px;"></td>
                <td style="text-align:left; font-size:10px;">{{ $txn['description'] }}</td>
                <td style="text-align:right; font-size:10px;">{{ $withdrawal ? number_format($withdrawal, 2) : '' }}</td>
                <td style="text-align:right; font-size:10px;">{{ $deposit ? number_format($deposit, 2) : '' }}</td>
                <td style="text-align:right; font-size:10px;">{{ number_format($closing, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- শুধু শেষ পেজে Summary --}}
    @if ($loop->last)
        <br><br>

        <table style="width:100%; font-size:14px; margin-bottom:60px;line-height: 1.8">
            <tr>
                <td style="width:50%; text-align:left;">
                   Total Withdraws in BDT : {{ number_format($totalWithdrawal, 2) }} <br>
                    Total Deposits in BDT : {{ number_format($totalDeposit, 2) }}
                </td>
                <td style="width:50%; text-align:right;">
                    Opening Balance : {{ number_format($opening, 2) }} (Cr) <br>
                    <strong>Available Balance : {{ number_format($closing, 2) }} (Cr)</strong>
                </td>
            </tr>
        </table>

        {{-- END OF STATEMENT Banner --}}
        <div style="display:block; text-align:center; background:#d9d9d9;
            padding:20px 0; font-weight:bold; font-size:14px;
            margin:20px 0; font-style:italic; width:100%; box-sizing:border-box;">
            END OF STATEMENT
        </div>
    @endif

@endforeach
</body>
</html>
