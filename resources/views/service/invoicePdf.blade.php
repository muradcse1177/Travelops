<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Invoice #{{ $invoice->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 13px; color:#343a40; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-weight-bold { font-weight: bold; }
        .mb-2 { margin-bottom: 10px; }
        .section-title {
            font-weight:bold;
            border-left:4px solid #ffc107;
            padding-left:10px;
            margin:20px 0 10px;
        }
        table { width:100%; border-collapse:collapse; }
        th,td { border:1px solid #dee2e6; padding:8px; }
        th { background:#f1f3f5; }
        .info-box { background:#f8f9fa; padding:10px; border-radius:6px; margin-bottom:20px; }
    </style>
</head>
<body>

<h2 class="text-center mb-2">Service Invoice</h2>
<hr style="border-top:1px solid #ccc;">

<!-- Header -->
<table width="100%" style="border:none;">
    <tr>
        <td style="border: none;">
            @if($company->logo)
                <img src="{{ url($company->logo) }}" height="50" alt="Logo">
            @endif
        </td>
        <td class="text-right" style="border:none;">
            <strong>{{ $company->company_name }}</strong><br>
            Phone: {{ $company->company_pnone }}<br>
            Email: {{ $company->company_email }}<br>
            Address: {{ $company->address }}
        </td>
    </tr>
</table>

<!-- Basic Info -->
<div class="info-box">
    <table>
        <tr>
            <td><strong>Service:</strong> {{ $invoice->service_name }}</td>
            <td><strong>Country:</strong> {{ $invoice->country_name }}</td>
            <td><strong>Type:</strong> {{ $invoice->service_type }}</td>
        </tr>
    </table>
</div>

<!-- Client Info -->
<div class="section-title">Client Information</div>
<table>
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>{{ $invoice->client_name }}</td>
        <td>{{ $invoice->client_phone }}</td>
        <td>{{ $invoice->client_email }}</td>
    </tr>
</table>

<!-- Payment Summary -->
<div class="section-title">Payment Summary</div>
<table>
    <tr>
        <th>Total Solvency Amount</th>
        <th>Service Type</th>
    </tr>
    <tr>
        <td>{{ number_format($invoice->total_solvency_amount,2) }} BDT</td>
        <td>{{ $invoice->service_type }}</td>
    </tr>
</table>

<!-- Payment Plan -->
@if($invoice->service_type == 'Installment')
    @php
        $amounts = json_decode($invoice->installment_amounts, true);
        $dues = json_decode($invoice->installment_dues, true);
    @endphp

    @if(!empty($amounts))
        <div class="section-title">Installment Payment Plan</div>
        <table>
            <thead>
            <tr>
                <th>Month</th>
                <th>Installment Amount</th>
                <th>Due Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($amounts as $i => $amt)
                <tr>
                    <td>Month {{ $i + 1 }}</td>
                    <td>{{ number_format($amt,2) }} BDT</td>
                    <td>{{ number_format($dues[$i] ?? 0,2) }} BDT</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@else
    <div class="section-title">Payment Plan</div>
    @php
        // যদি one-time হয়, তাহলে due বের করি
        $due = 0;
        if(!empty($invoice->installment_dues)){
            $dues = json_decode($invoice->installment_dues, true);
            if(is_array($dues) && count($dues) > 0){
                $due = array_sum($dues);
            }
        }
    @endphp

    @if($due > 0)
        <p>
            One Time Payment — Total: <strong>{{ number_format($invoice->total_solvency_amount,2) }} BDT</strong>,
            <span style="color:red;">Due: {{ number_format($due,2) }} BDT</span>
        </p>
    @else
        <p>One Time Payment — Full amount paid. No due remaining.</p>
    @endif
@endif

<!-- Client Payment Details -->
<div class="section-title">Client Payment Method</div>
<p>{!! nl2br(e($invoice->client_payment_method ?? 'N/A')) !!}</p>

<!-- Footer -->
<p class="text-center" style="font-size:11px;color:#777;margin-top:25px;">
    Generated on {{ now()->setTimezone('Asia/Dhaka')->format('d M Y, h:i A') }} — {{ $company->company_name }}
</p>

</body>
</html>
