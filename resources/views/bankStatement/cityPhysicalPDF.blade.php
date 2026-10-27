
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sample Statement of Account</title>

<style>
@php
    // Uniform scale set by the controller (DPI raised to match) so the page
    // keeps 40px blank below the footer. Original margins: 8mm / 8mm / 20mm / 8mm.
    $pdfScale = $pdfScale ?? 1;
    $marginTop = round(8 * $pdfScale, 3);
    // Centred after scaling, then trimmed by $pdfSideTrim px on each side
    $marginSide = round(8 * $pdfScale + 105 * (1 - $pdfScale) - ($pdfSideTrim ?? 0) * 25.4 / 96, 3);
    // Body may run down to the footer's red line (rows keep their own gap above it)
    $marginBottom = round(297 - 293 * $pdfScale, 3);

    // Page 1: each extra address line (~85 chars, 13px) is taken back from the
    // 23 rows' padding so they still end 35px above the footer's red line
    $addressExtraLines = max(0, (int) ceil(mb_strlen(trim($info['accountAddress'] ?? '')) / 85) - 1);
    $firstRowPadding = round(max(4, 8.056 - 13 / 46 * $addressExtraLines), 3);
@endphp
@page {
    size: A4 portrait;
    margin: {{ $marginTop }}mm {{ $marginSide }}mm {{ $marginBottom }}mm {{ $marginSide }}mm;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 9px;
    color: #111;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}

.statement-page {
    width: 100%;
}

.sample-notice {
    text-align: center;
    font-size: 8px;
    font-weight: bold;
    color: #a21d2a;
    border: 1px solid #a21d2a;
    padding: 4px;
    margin-bottom: 9px;
}

/* First page header */
.header-table {
    table-layout: fixed;
}

.left-panel {
    width: 61%;
    vertical-align: top;
    padding-right: 12px;
}

.right-panel {
    width: 39%;
    vertical-align: top;
    padding-left: 40px; /* 30px extra gap before the QR */
}

.logo-area {
    height: 57px;
    vertical-align: top;
}

.bank-logo {
    display: block;
    max-width: 105px;
    max-height: 48px;
}

.customer-name {
    font-size: 10px;
    font-weight: bold;
    padding: 4px 0 7px;
    text-transform: uppercase;
}

.customer-address {
    font-size: 9px;
    line-height: 13px;
    color: #777;
    padding-bottom: 10px;
    overflow-wrap: anywhere;
    text-transform: uppercase;
}

.divider {
    border-top: 1px solid #ddd;
}

.details-table {
    margin-top: 6px;
    margin-bottom: 10px;
    table-layout: fixed;
}

.details-table td {
    padding: 2px 1px;
    font-size: 9px;
    line-height: 11px;
    vertical-align: top;
    overflow-wrap: anywhere;
}

.details-label {
    width: 17%;
    color: #888;
}

.details-colon {
    width: 2%;
    text-align: center;
}

.details-value {
    width: 31%;
    color: #000;
}

.details-table td.details-value {
    font-size: 9px;
}

/* Account Type / Branch column starts 10px closer than the original layout
   (~434px wide table): value 1 gives up 10px, label 2 trimmed to fit its text */
.details-table td:nth-child(3) {
    width: 28.7%;
}

.details-table td:nth-child(4) {
    width: 13.4%;
}

.details-table td:nth-child(6) {
    width: 36.9%;
}

.statement-title {
    font-size: 21px;
    line-height: 28px;
    font-weight: bold;
    margin: 10px 0 19px;
    text-align: left;
}

.verify-table {
    table-layout: auto;
}

.qr-cell {
    width: 84px;
    padding: 4px 8px 4px 0;
    vertical-align: top;
}

.qr-code-wrapper {
    position: relative;
    width: 84px;
    height: 84px;
}

.qr-code-image {
    display: block;
    width: 84px;
    height: 84px;
}

.qr-logo-wrapper {
    position: absolute;
    top: 30px;
    left: 30px;
    width: 24px;
    height: 24px;
    background: #fff;
    font-size: 0;
    line-height: 0;
}

/* Absolutely placed so no inline line box adds empty space under the logo */
.qr-logo {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 20px;
    height: 20px;
}

.verify-cell {
    vertical-align: top;
    padding: 4px 0;
    font-size: 8px;
    line-height: 12px;
    overflow-wrap: anywhere;
}

.verify-heading {
    font-size: 8px;
    font-weight: bold;
    line-height: 12px;
    white-space: nowrap;
}

.verify-heading-note {
    margin-left: 4px;
    font-size: 7px;
    font-weight: normal;
    color: #777;
}

.red-rule {
    height: 1px;
    background: #ed1c2e;
    margin: 5px 0 12px;
}

.verify-description {
    color: #666;
    font-size: 8px;
    line-height: 9px;
    white-space: nowrap;
}

.verify-url {
    margin-top: 1px;
    font-size: 8px;
    line-height: 9px;
    overflow-wrap: anywhere;
}


.sample-watermark {
    margin-top: 10px;
    color: #000;
    font-size: 10px;
    font-weight: bold;
}

/* Account summary */
.summary-section {
    margin-top: 24px;
    margin-bottom: 30px;
}

.section-heading {
    font-size: 9px;
    font-weight: bold;
    padding-bottom: 6px;
}

.red-border {
    height: 1px;
    background: #ed1c2e;
}

.summary-table {
    table-layout: fixed;
    margin: 5px 0;
}

.summary-table td {
    width: 25%;
    text-align: right;
    padding: 3px 7px;
    border-right: 1px solid #ddd;
}

.summary-table td:first-child {
    padding-left: 0;
}

.summary-table td:last-child {
    padding-right: 0;
    border-right: none;
}

.summary-label {
    font-size: 9px;
    color: #777;
    padding-bottom: 4px;
}

.summary-value {
    font-size: 10px;
    font-weight: bold;
}

/* Continuation page header */
.continuation-header {
    margin-bottom: 0;
    padding-bottom: 20px;
}

.continuation-top {
    margin-bottom: 20px;
}

.continuation-logo {
    width: 40%;
    vertical-align: top;
}

.continuation-title {
    width: 60%;
    text-align: right;
    vertical-align: top;
    font-size: 21px; /* same as the page 1 title */
    line-height: 28px;
    padding-top: 11px; /* same top offset as the page 1 title (10px margin + 1px cell padding) */
    font-weight: bold;
}

.continuation-details {
    table-layout: fixed;
}

.continuation-details td {
    font-size: 10px;
    vertical-align: top;
}

.continuation-name {
    width: 60%;
    text-align: left;
}

.continuation-name-value {
    font-size: 11px;
    font-weight: bold;
    text-transform: uppercase;
}

.continuation-account {
    width: 40%;
    text-align: right;
}

/* Transactions heading */
.transactions-heading {
    margin-top: 10px;
    padding-bottom: 17px;
    border-bottom: 1px solid #ed1c2e;
}

.transaction-heading-table {
    table-layout: fixed;
}

.transaction-heading-table td {
    vertical-align: middle;
    padding: 0 4px;
    font-size: 10px;
    line-height: 14px;
    color: #777;
    white-space: normal;
}

.heading-left {
    width: 60%;
    padding-left: 0 !important;
    text-align: left;
}

.heading-right {
    width: 40%;
    padding-right: 0 !important;
    text-align: right;
}

.heading-title {
    color: #ed1c2e;
    font-size: 12px;
    font-weight: bold;
}

.heading-sep {
    margin-left: 8px;
    padding-left: 8px;
    border-left: 1px solid #ccc;
}

/* Separator after TRANSACTIONS: 10px taller (vertical inline padding, text stays put) */
.heading-left .heading-sep {
    padding-top: 5px;
    padding-bottom: 5px;
}

.heading-sep-wide {
    margin-left: 5px; /* Date of Generation sits 20px further right */
    padding: 4px 0 4px 25px;
}

.transaction-heading-table strong {
    color: #111;
    font-weight: normal;
}

/* Transaction table */
.transactions-table {
    table-layout: fixed;
    width: 100%;
    font-size: 9px;
}

.transactions-table thead {
    display: table-header-group;
}

.transactions-table tr {
    page-break-inside: avoid;
}

.transactions-table th {
    text-align: left;
    font-size: 8.5px;
    font-weight: bold;
    line-height: 12px;
    padding: 9px 3px 7px;
    color: #111;
    border-bottom: 0.5px solid #ed1c2e;
}

.transactions-table td {
    padding: 6px 3px;
    color: #111;
    font-size: 8px;
    line-height: 12px;
    vertical-align: middle;
    border-bottom: 1px solid #e5e5e5;
    overflow-wrap: anywhere;
}

.transactions-table th:nth-child(1),
.transactions-table td:nth-child(1) {
    width: 9.64%; /* 10px narrower: 11% of the ~733px table minus 10px */
}

.transactions-table th:nth-child(2),
.transactions-table td:nth-child(2) {
    width: 51.81%; /* +10px from the date column, +40px from the amount columns */
}

.transactions-table th:nth-child(3),
.transactions-table td:nth-child(3) {
    width: 7.91%; /* -8px */
}

.transactions-table th:nth-child(4),
.transactions-table td:nth-child(4) {
    width: 10.91%; /* -8px */
}

.transactions-table th:nth-child(5),
.transactions-table td:nth-child(5) {
    width: 8.64%; /* -10px */
}

.transactions-table th:nth-child(6),
.transactions-table td:nth-child(6) {
    width: 11.09%; /* -14px */
}

.text-right {
    text-align: right !important;
}

/* Page 1: 23 rows end 35px above the footer's red line */
.transactions-table.first-page-rows td {
    padding-top: {{ $firstRowPadding }}px;
    padding-bottom: {{ $firstRowPadding }}px;
}

/* Page 2+: 30 rows end 15px above the footer's red line */
.transactions-table.continuation-rows td {
    padding-top: 8.072px;
    padding-bottom: 8.072px;
}

/* Page 2+: 5px extra space above the first row */
.transactions-table.continuation-rows tbody tr:first-child td {
    padding-top: 13.072px;
}

.transactions-table tr.opening-row td {
    padding-top: 12px;
    padding-bottom: 12px;
}

/* Repeating footer */
.statement-footer-wrap {
    position: fixed;
    bottom: -37.17px; /* 15mm + 40px (unscaled) - 16mm margin: footer sits on the page bottom edge */
    left: 0;
    right: 0;
    width: 100%;
    background: #fff;
    border-top: 1px solid #ed1c2e;
    padding-top: 3px;
}

.statement-footer {
    table-layout: fixed;
}

.statement-footer td {
    padding: 1px 5px 2px;
    vertical-align: top;
    font-size: 8px;
    line-height: 10px;
    color: #555;
    overflow-wrap: anywhere;
}

/* Column separator: drawn on an inner block so it is ~20px shorter than the row;
   text sits at its top */
.statement-footer .footer-sep {
    border-left: 1px solid #ddd;
    padding: 3px 0 14px;
}

.statement-footer td.footer-website,
.statement-footer td.footer-local,
.statement-footer td.footer-overseas {
    vertical-align: top;
    font-size: 9px;
}

.statement-footer .footer-value {
    font-size: 10px;
}

/* Notes column 30px wider (~733px footer): 10px from each of the other columns */
.footer-notes {
    width: 51.09%;
}

/* Smaller body text so the notes fit on 2 lines; the label keeps 8px */
.statement-footer td.footer-notes {
    font-size: 7.6px;
}

.statement-footer td.footer-notes .footer-label {
    font-size: 8px;
}

.footer-website {
    width: 15.68%; /* +15px from overseas: breathing room next to the separator */
    text-align: center;
}

.footer-local {
    width: 12.64%;
    text-align: center;
}

.footer-overseas {
    width: 20.59%;
    white-space: nowrap;
    text-align: center;
}

/* "Page X of Y" under the overseas number (X = DomPDF page counter, Y = $totalPages) */
.statement-footer .footer-page {
    margin-top: 5px;
    font-size: 11px;
    color: #777;
}

.footer-page-no:after {
    content: counter(page);
}

/* Overseas column: the page number takes the separator's bottom padding */
.statement-footer td.footer-overseas .footer-sep {
    padding-bottom: 0;
}

/* Overseas number flush with the right margin */
.statement-footer td.footer-overseas {
    text-align: right;
    padding-right: 0;
}

.footer-label,
.footer-value {
    font-weight: bold;
    color: #222;
}

.footer-icon {
    width: 10px;
    height: 10px;
    margin-right: 3px;
    vertical-align: middle;
}

/* End of report: full-width black rule with the label in the middle */
.end-statement {
    margin-top: 55px;
    page-break-inside: avoid;
}

.end-statement td.end-line {
    padding: 0;
    vertical-align: middle;
}

.end-rule {
    height: 0;
    margin-top: 1px;
    border-top: 1px solid #111;
}

.end-text {
    width: 1%;
    white-space: nowrap;
    padding: 0 4px;
    font-size: 9px;
    color: #111;
    text-align: center;
    vertical-align: middle;
}

.page-break {
    page-break-after: always;
}
</style>
</head>

<body>

@php
    $info = $info ?? [];

    $allTransactions = collect($transactions ?? [])->values();

    /*
     * Fixed rows per page (must not change):
     * Page 1: Opening Balance row + 23 transactions.
     * Following pages: 30 transaction rows each.
     */
    $firstPageRows = 23;

    $firstPage = $allTransactions->take($firstPageRows);
    $remaining = $allTransactions->slice($firstPageRows)->values();

    $pages = collect([$firstPage])->concat($remaining->chunk(30))->values();

    // The end-of-report line needs 2-3 rows of space, so if the last
    // page is that full, the line goes on a final page of its own (row counts stay fixed).
    $lastIndex = $pages->count() - 1;
    $lastCapacity = $lastIndex === 0 ? $firstPageRows - 2 : 30 - 3;

    if ($pages[$lastIndex]->count() > $lastCapacity) {
        $pages->push(collect());
    }
    $totalPages = max(1, $pages->count());

    $accountName = $info['accountName'] ?? '';
    $accountAddress = $info['accountAddress'] ?? '';
    $accountNumber = $info['accountNumber'] ?? '';
    $accountStatus = $info['accountStatus'] ?? 'ACTIVE';
    $productName = $info['productName'] ?? '';
    $bankBranch = $info['bankBranch'] ?? '';
    $currency = $info['currency'] ?? 'BDT';
    $period = $info['periodFrom'] ?? '';

    // "10-07-2026 - 18-10-2026" -> "From 10 Jul 2026 to 18 Oct 2026"
    $periodText = $period;
    $periodStartText = '';
    $periodEndText = '';
    $periodParts = array_map('trim', explode(' - ', $period));

    if (count($periodParts) === 2) {
        try {
            $periodStartText = \Carbon\Carbon::createFromFormat('!d-m-Y', $periodParts[0])->format('d M Y');
            $periodEndText = \Carbon\Carbon::createFromFormat('!d-m-Y', $periodParts[1])->format('d M Y');
            $periodText = 'From '
                . \Carbon\Carbon::createFromFormat('!d-m-Y', $periodParts[0])->format('d M Y')
                . ' to '
                . \Carbon\Carbon::createFromFormat('!d-m-Y', $periodParts[1])->format('d M Y');
        } catch (\Throwable $e) {
            $periodText = $period;
        }
    }

    $generationDate = !empty($info['printDate'])
        ? \Carbon\Carbon::parse($info['printDate'])->format('d M Y')
        : now()->format('d M Y');

    $openingBalance = (float) (
        $info['openingBalance']
        ?? $info['opening_balance']
        ?? 0
    );

    $totalDeposits = $allTransactions->sum(function ($row) {
        return (float) ($row['deposit'] ?? 0);
    });

    $totalWithdrawals = $allTransactions->sum(function ($row) {
        return (float) ($row['withdrawal'] ?? 0);
    });

    $closingBalance = $allTransactions->isNotEmpty()
        ? (float) ($allTransactions->last()['balance'] ?? $openingBalance)
        : $openingBalance;

    // Footer icons as inline SVG (DomPDF cannot render the unicode glyphs)
    $globeIcon = 'data:image/svg+xml;base64,' . base64_encode(
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ed1c2e" stroke-width="2" stroke-linecap="round">'
        . '<circle cx="12" cy="12" r="10"/>'
        . '<ellipse cx="12" cy="12" rx="4.5" ry="10"/>'
        . '<line x1="2" y1="12" x2="22" y2="12"/>'
        . '</svg>'
    );

    $headsetIcon = 'data:image/svg+xml;base64,' . base64_encode(
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ed1c2e" stroke-width="2" stroke-linecap="round">'
        . '<path d="M4 15 V12 A8 8 0 0 1 20 12 V15"/>'
        . '<rect x="3" y="13" width="4" height="6" rx="1.5"/>'
        . '<rect x="17" y="13" width="4" height="6" rx="1.5"/>'
        . '<path d="M19 19 V20 A2 2 0 0 1 17 22 H13"/>'
        . '</svg>'
    );

@endphp

{{-- Fixed footer outside the page loop: repeated on each PDF page --}}
<div class="statement-footer-wrap">
    <table class="statement-footer">
        <tr>
            <td class="footer-notes">
                <span class="footer-label">Notes:</span><br>
                This is a system generated statement and requires no signature. Please advise the bank of any discrepancy
within 14 days of receipt of this statement (if any), otherwise, this statement will be deemed correct.
            </td>

            <td class="footer-website">
                <div class="footer-sep"><span class="footer-value"><img src="{{ $globeIcon }}" class="footer-icon" alt="">citybankplc.com</span></div>
            </td>

            <td class="footer-local">
                <div class="footer-sep"><span class="footer-value"><img src="{{ $headsetIcon }}" class="footer-icon" alt="">16234</span>
                (Local)</div>
            </td>

            <td class="footer-overseas">
                <div class="footer-sep"><span class="footer-value">+880 2 8331040</span>
                (Overseas)
                <div class="footer-page">Page <span class="footer-page-no"></span> of <span class="footer-page-count">{{ $totalPages }}</span></div></div>
            </td>
        </tr>
    </table>
</div>

@foreach($pages as $pageIndex => $pageTransactions)

<div class="statement-page">

    @if($pageIndex === 0)

        <table class="header-table">
            <tr>
                <td class="left-panel">
                    <div class="logo-area">
                        <img
                            src="{{ url('public/cityb.png') }}"
                            class="bank-logo"
                            alt="Sample logo"
                        >
                    </div>

                    <div class="customer-name">
                        {{ $accountName }}
                    </div>

                    <div class="customer-address">
                        {{ $accountAddress }}
                    </div>

                    <div class="divider"></div>

                    <table class="details-table">
                        <tr>
                            <td class="details-label">Account No.</td>
                            <td class="details-colon">:</td>
                            <td class="details-value">
                                {{ $accountNumber ?: '—' }}
                            </td>

                            <td class="details-label">Account Type</td>
                            <td class="details-colon">:</td>
                            <td class="details-value">
                                {{ $productName ?: '—' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="details-label">Account Status</td>
                            <td class="details-colon">:</td>
                            <td class="details-value">
                                {{ $accountStatus }}
                            </td>

                            <td class="details-label">Branch</td>
                            <td class="details-colon">:</td>
                            <td class="details-value">
                                {{ $bankBranch ?: '—' }}
                            </td>
                        </tr>
                    </table>
                </td>

                <td class="right-panel">
                    <div class="statement-title">
                        Statement of Account
                    </div>

                    <table class="verify-table">
                        <tr>
                            <td class="qr-cell" width="92">
                                @php
                                    $stmtRefNo = $stmtRefNo ?? strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', base64_encode(md5($accountNumber . '|sample-ref', true))), 0, 13));
                                    $stmtVerifyUrl = 'https://webrouting.citybankplc.co/qr-statement/verify?' . http_build_query([
                                        'reference_no' => $stmtRefNo,
                                        'acc_no'       => $accountNumber,
                                    ]);
                                @endphp
                                <div class="qr-code-wrapper">
                                    <img
                                        src="{{ \App\Helpers\QrHelper::dottedPng($stmtVerifyUrl, 0.8, \chillerlan\QRCode\QRCode::VERSION_AUTO, false, \chillerlan\QRCode\QRCode::ECC_M, true, 1.05) }}"
                                        class="qr-code-image"
                                        alt="Sample QR code"
                                    >

                                    <div class="qr-logo-wrapper">
                                        <img
                                            src="{{ url('public/citybw-tight.png') }}"
                                            class="qr-logo"
                                            alt=" logo"
                                        >
                                    </div>
                                </div>
                            </td>

                            <td class="verify-cell">
                                <div class="verify-heading">
                                    VERIFY THIS STATEMENT
                                    <span class="verify-heading-note">Valid for 6 months</span>
                                </div>

                                <div class="red-rule"></div>

                                <div class="verify-description">
                                    Can't scan? Enter the reference number at the<br>
URL below
                                </div>

                                <div class="verify-url">
                                    http://t.cbl.fyi/i/{{ random_int(10, 99) }}/stmt
                                </div>

                                <div class="sample-watermark">
                                    {{ $stmtRefNo }}
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="summary-section">
            <div class="section-heading">ACCOUNT SUMMARY</div>
            <div class="red-border"></div>

            <table class="summary-table">
                <tr>
                    <td>
                        <div class="summary-label">Opening Balance{{ $periodStartText ? ' as of ' . $periodStartText : '' }}</div>
                        <div class="summary-value">
                            {{ number_format($openingBalance, 2) }}
                        </div>
                    </td>

                    <td>
                        <div class="summary-label">Total Deposits</div>
                        <div class="summary-value">
                            {{ number_format($totalDeposits, 2) }}
                        </div>
                    </td>

                    <td>
                        <div class="summary-label">Total Withdrawals</div>
                        <div class="summary-value">
                            {{ number_format($totalWithdrawals, 2) }}
                        </div>
                    </td>

                    <td>
                        <div class="summary-label">Available Balance{{ $periodEndText ? ' as of ' . $periodEndText : '' }}</div>
                        <div class="summary-value">
                            {{ number_format($closingBalance, 2) }}
                        </div>
                    </td>
                </tr>
            </table>

            <div class="red-border"></div>
        </div>

    @else

        <div class="continuation-header">
            <table class="continuation-top">
                <tr>
                    <td class="continuation-logo">
                        <img
                            src="{{ url('public/cityb.png') }}"
                            class="bank-logo"
                            alt="Sample logo"
                        >
                    </td>

                    <td class="continuation-title">
                        Statement of Account
                    </td>
                </tr>
            </table>

            <table class="continuation-details">
                <tr>
                    <td class="continuation-name">
                        Name : <strong class="continuation-name-value">{{ $accountName }}</strong>
                    </td>

                    <td class="continuation-account">
                        Account No. : <strong class="continuation-name-value">{{ $accountNumber }}</strong>
                    </td>
                </tr>
            </table>
        </div>

    @endif

    <div class="transactions-heading">
        <table class="transaction-heading-table">
            <tr>
                <td class="heading-left">
                    <span class="heading-title">TRANSACTIONS</span><span class="heading-sep">{{ $periodText ?: 'Not specified' }}</span>
                </td>

                <td class="heading-right">
                    Date of Generation: <strong>{{ $generationDate }}</strong><span class="heading-sep heading-sep-wide">Currency: <strong>{{ $currency }}</strong></span>
                </td>
            </tr>
        </table>
    </div>

    <table class="transactions-table{{ $pageIndex > 0 ? ' continuation-rows' : ' first-page-rows' }}">
        <thead>
            <tr>
                <th>DATE</th>
                <th>DESCRIPTION</th>
                <th class="text-right">CHQ. NO.</th>
                <th class="text-right">WITHDRAWAL</th>
                <th class="text-right">DEPOSIT</th>
                <th class="text-right">BALANCE</th>
            </tr>
        </thead>

        <tbody>
            @if($pageIndex === 0)
                <tr class="opening-row">
                    <td></td>
                    <td>Opening Balance</td>
                    <td class="text-right">-</td>
                    <td></td>
                    <td></td>
                    <td class="text-right">{{ number_format($openingBalance, 2) }}</td>
                </tr>
            @endif

            @forelse($pageTransactions as $transaction)
                @php
                    try {
                        $rowDate = \Carbon\Carbon::createFromFormat('!d-m-Y', $transaction['date'] ?? '')->format('d M Y');
                    } catch (\Throwable $e) {
                        $rowDate = $transaction['date'] ?? '';
                    }
                @endphp
                <tr>
                    <td>{{ $rowDate }}</td>

                    <td>{{ $transaction['description'] ?? '' }}</td>

                    <td class="text-right">-</td>

                    <td class="text-right">
                        {{ number_format((float)($transaction['withdrawal'] ?? 0), 2) }}
                    </td>

                    <td class="text-right">
                        {{ number_format((float)($transaction['deposit'] ?? 0), 2) }}
                    </td>

                    <td class="text-right">
                        {{ number_format((float)($transaction['balance'] ?? 0), 2) }}
                    </td>
                </tr>
            @empty
                @if($pageIndex === 0)
                <tr>
                    <td colspan="6" style="text-align:center;padding:12px;">
                        No sample transactions found.
                    </td>
                </tr>
                @endif
            @endforelse
        </tbody>
    </table>

    @if($loop->last)
        <table class="end-statement">
            <tr>
                <td class="end-line"><div class="end-rule"></div></td>
                <td class="end-text">End of Statement</td>
                <td class="end-line"><div class="end-rule"></div></td>
            </tr>
        </table>
    @endif

</div>

@if(!$loop->last)
    <div class="page-break"></div>
@endif

@endforeach

</body>
</html>
