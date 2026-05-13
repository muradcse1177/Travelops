<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Statement of Account</title>
    <style>
        /* Page margin for DomPDF layout */
        @page {
            margin-top: 140px;
            margin-bottom: 70px;
            margin-left: 50px;
            margin-right: 50px;
        }

        /* Base font and line height */
        body {
            font-family: 'DejaVu Sans Mono', monospace;
            font-size: 11px;
            line-height: 1.4;
        }

        /* Fixed header (manual space needed via div) */
        header {
            position: fixed;
            top: -120px;
            left: 0;
            right: 0;
        }

        /* Fixed footer */
        footer {
            position: fixed;
            bottom: -40px;
            left: 0;
            right: 0;
            font-size: 10px;
            text-align: center;
        }

        /* Remove all default borders */
        table, th, td {
            border: none !important;
        }

        /* Clean layout table with bottom border on header row only */
        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            font-family: 'DejaVu Sans Mono', monospace;
        }

        .transaction-table thead tr {
            border-bottom: 0.5px solid #000;
        }

        .transaction-table th,
        .transaction-table td {
            padding: 4px 6px;
        }

        /* Used for basic tables with no borders */
        .no-border td {
            border: none;
        }

        /* Customer/account info layout */
        .account-info td {
            vertical-align: top;
            padding: 3px 0;
        }

        /* Section title */
        .activity-header {
            color: #d00;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 2px;
        }

        /* Text alignment helpers */
        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        /* Summary at bottom of transaction section */
        .summary-table td {
            padding-top: 6px;
        }

        /* City Bank font if embedded */
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
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <img src="{{ public_path('city.png') }}" alt="City Bank Logo" height="80">
            </td>
            <td style="width: 50%; text-align: right;" class="news-gothic">
                <span style="font-size: 17px;  font-weight: bold;">Statement of Account</span><br><br>
                <span style="font-weight: bold;">{{ strtoupper($info['bankBranch']) }}</span><br>
                @php
                    $address = strtoupper($info['branchAddress']);
                    $chunkSize = ceil(strlen($address) / 3);
                    $line1 = substr($address, 0, $chunkSize);
                    $line2 = substr($address, $chunkSize, $chunkSize);
                    $line3 = substr($address, $chunkSize * 2);
                @endphp
                {{ $line1 }}<br>
                {{ $line2 }}<br>
                {{ $line3 }}
            </td>
        </tr>
    </table>

    <hr style="margin: 10px 0; border: none; border-top: 0.5px solid #000;">

    <table style="width: 100%;">
        <tr>
            <td style="width: 60%;" class="news-gothic">
                <strong style="font-size: 15px;">{{ strtoupper($info['accountName']) }}</strong><br><br>
                @php
                    $address = strtoupper($info['accountAddress']);
                    $chunkSize = ceil(strlen($address) / 3);
                    $line1 = substr($address, 0, $chunkSize);
                    $line2 = substr($address, $chunkSize, $chunkSize);
                    $line3 = substr($address, $chunkSize * 2);
                @endphp

                {{ $line1 }}<br>
                {{ $line2 }}<br>
                {{ $line3 }}
            </td>
            <td style="width: 40%;" class="mono">
                <table style="width: 100%;">
                    <tr>
                        <td class="header-label">Print Date</td>
                        <td style="width: 5px;">:</td>
                        <td>{{ strtoupper(\Carbon\Carbon::parse($info['printDate'])->format('d-m-Y')) }}</td>
                    </tr>
                    <tr>
                        <td class="header-label">Period From</td>
                        <td>:</td>
                        <td>{{ strtoupper($info['periodFrom']) }}</td>
                    </tr>
                    <tr>
                        <td class="header-label">Account Number</td>
                        <td>:</td>
                        <td>{{ strtoupper($info['accountNumber']) }}</td>
                    </tr>
                    <tr>
                        <td class="header-label">Customer ID</td>
                        <td>:</td>
                        <td>{{ strtoupper($info['customerId']) }}</td>
                    </tr>
                    <tr>
                        <td class="header-label">Product Name</td>
                        <td>:</td>
                        <td>{{ strtoupper($info['productName']) }}</td>
                    </tr>
                    <tr>
                        <td class="header-label">Currency</td>
                        <td>:</td>
                        <td>{{ strtoupper($info['currency']) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <hr style="margin: 8px 0; border: none; border-top: 0.5px solid #000;">
    <p class="activity-header news-gothic" style="font-size: 13px">ACCOUNT ACTIVITY</p>
    <hr style="margin: 8px 0; border: none; border-top: 0.5px solid #000;">
</header>

<footer>
    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script(function($pageNum, $pageCount, $pdf) {
                $pdf->text(520, 820, "Page $pageNum of $pageCount", null, 10, array(150, 150, 150));
            });
        }
    </script>
    <table style="width: 100%; font-size: 10px; color: #999; font-style: italic;">
        <tr>
            <td style="text-align: left;">
                This is a computer generated statement and requires no signature
            </td>
        </tr>
    </table>
</footer>
@php
    $chunks = array_chunk($transactions, 32); // Adjust per page

    // Initialize once for full-statement calculations
    $totalDeposit = 0;
    $totalWithdrawal = 0;
    $opening = $info['openingBalance'] ?? 0;
    $runningBalance = $opening;

    // Calculate full-statement totals and closing balance
    foreach ($transactions as $tx) {
        $deposit = $tx['deposit'] ?? 0;
        $withdrawal = $tx['withdrawal'] ?? 0;

        if ($deposit > 0) {
            $totalDeposit += $deposit;
            $runningBalance += $deposit;
        } elseif ($withdrawal > 0 && $runningBalance >= $withdrawal) {
            $totalWithdrawal += $withdrawal;
            $runningBalance -= $withdrawal;
        }
    }

    $closing = $runningBalance;
@endphp

@foreach ($chunks as $index => $pageTransactions)
    {{-- Spacer for top of each page --}}
    @if ($index === 0)
        <div style="height: 180px;"></div>
    @else
        <div style="page-break-before: always;"></div>
        <div style="height: 180px;"></div>
    @endif

    <table class="transaction-table mono" style="margin-top: -10px;">
        <thead>
        <tr>
            <th style="text-align: left; width: 13%;">DATE</th>
            <th style="text-align: left; width: 42%;">DESCRIPTION</th>
            <th style="text-align: center; width: 10%;">CHQ.NO.</th>
            <th style="text-align: right; width: 12%;">WITHDRAWAL</th>
            <th style="text-align: right; width: 12%;">DEPOSIT</th>
            <th style="text-align: right; width: 11%;">BALANCE</th>
        </tr>
        </thead>
        <tbody>
        @php
            if (!isset($pageBalance)) {
                $pageBalance = $opening;
            }
        @endphp

        @foreach ($pageTransactions as $tx)
            @php
                $deposit = $tx['deposit'] ?? 0;
                $withdrawal = $tx['withdrawal'] ?? 0;

                if ($deposit > 0) {
                    $pageBalance += $deposit;
                } elseif ($withdrawal > 0 && $pageBalance >= $withdrawal) {
                    $pageBalance -= $withdrawal;
                } else {
                    continue; // skip invalid withdrawal
                }
            @endphp

            <tr>
                <td>{{ $tx['date'] }}</td>
                <td>{{ $tx['description'] }}</td>
                <td class="text-center"></td>
                <td class="text-right">
                    {{ $withdrawal ? number_format($withdrawal, 2) : '' }}
                </td>
                <td class="text-right">
                    {{ $deposit ? number_format($deposit, 2) : '' }}
                </td>
                <td class="text-right">
                    {{ number_format($pageBalance, 2) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach

<br>

{{-- Summary totals --}}
<hr style="width: 80%; margin: 8px auto; border: none; border-top: 0.5px solid #000;">

<table style="width: 100%; font-size: 13px; margin-top: 5px;" class="news-gothic">
    <tr>
        <td>Total Withdrawal: {{ number_format($totalWithdrawal, 2) }} BDT</td>
        <td style="text-align: right;">Opening Balance: {{ number_format($opening, 2) }} BDT</td>
    </tr>
    <tr>
        <td>Total Deposit: {{ number_format($totalDeposit, 2) }} BDT</td>
        <td style="text-align: right;">
            Available Balance as of {{ \Carbon\Carbon::parse($info['printDate'])->format('d-m-Y') }}:
            {{ number_format($closing, 2) }} BDT
        </td>
    </tr>
</table>


<p style="text-align: center; font-family: monospace; margin-top: 15px;" class="news-gothic">
   ----------------------------<strong>End of Statement</strong>---------------------------
</p>


</body>
</html>
