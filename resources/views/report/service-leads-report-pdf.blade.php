<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Service Leads Report (PDF)</title>
    <style>
        body{ font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2{ margin: 0 0 6px 0; text-align:center; }
        .muted{ color:#555; text-align:center; }
        .summary{ margin:10px 0 14px; }
        .summary table{ width:100%; border-collapse: collapse; }
        .summary td{ padding:6px 8px; border:1px solid #ddd; text-align:center; }
        table.list{ width:100%; border-collapse: collapse; margin-top:10px;}
        table.list th, table.list td{ border:1px solid #ddd; padding:6px 8px; }
        table.list th{ background:#f2f2f2; text-align:left; }
        .center{ text-align:center; }
        .right{ text-align:right; }
        .small{ font-size: 11px; }
        .badge{ padding:2px 6px; border-radius:3px; display:inline-block; font-size:10px; color:#fff; }
        .Received{ background:#6c757d; }
        .Replied{ background:#17a2b8; }
        .OnProcess{ background:#ffc107; color:#000; }
        .Completed{ background:#28a745; }
        .Closed{ background:#343a40; }
        .Canceled{ background:#dc3545; }
    </style>
</head>
<body>

<h2>Service Leads Report</h2>
<div class="muted small">Generated at: {{ $generated_at }}</div>

@if(!empty($filters['date_from']) || !empty($filters['date_to']))
    <p class="muted small">
        Filter:
        @if(!empty($filters['date_from'])) From {{ $filters['date_from'] }} @endif
        @if(!empty($filters['date_to'])) to {{ $filters['date_to'] }} @endif
    </p>
@endif

{{-- Summary --}}
<div class="summary">
    <table>
        <tr>
            <td><strong>Monthly Total Leads</strong><br>{{ $summary['month_leads'] ?? 0 }}</td>
            <td><strong>Today Total Leads</strong><br>{{ $summary['today_leads'] ?? 0 }}</td>
            <td><strong>Today Requested Amount</strong><br>{{ number_format($summary['today_amount'] ?? 0,2) }} BDT</td>
            <td><strong>Monthly Requested Amount</strong><br>{{ number_format($summary['month_amount'] ?? 0,2) }} BDT</td>
        </tr>
    </table>
</div>

{{-- Table --}}
<table class="list">
    <thead>
    <tr>
        <th style="width: 30px;" class="center">SL</th>
        <th>Lead Info</th>
        <th>Service</th>
        <th>Purpose</th>
        <th>Status</th>
        <th class="right">Amount</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $i => $lead)
        <tr>
            <td class="center">{{ $i+1 }}</td>
            <td>
                <strong>{{ $lead->name }}</strong><br>
                <span class="small">{{ $lead->country_code }}{{ $lead->phone }} | {{ $lead->email }}</span>
            </td>
            <td>{{ $lead->service_name ?? 'N/A' }}</td>
            <td>{{ $lead->purpose ?? 'N/A' }}</td>
            <td class="center">
                <span class="badge {{ str_replace(' ', '', $lead->status) }}">{{ $lead->status }}</span>
            </td>
            <td class="right">{{ number_format($lead->amount, 2) }}</td>
            <td class="small">{{ \Carbon\Carbon::parse($lead->created_at)->format('d M, Y h:i A') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
