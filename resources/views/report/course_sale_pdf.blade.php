<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Course Sale Report (PDF)</title>
    <style>
        body{ font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2{ margin: 0 0 6px 0; }
        .muted{ color:#555; }
        .summary{ margin:10px 0 14px; }
        .summary table{ width:100%; border-collapse: collapse; }
        .summary td{ padding:6px 8px; border:1px solid #ddd; }
        table.list{ width:100%; border-collapse: collapse; }
        table.list th, table.list td{ border:1px solid #ddd; padding:6px 8px; }
        table.list th{ background:#f2f2f2; text-align:left; }
        .right{ text-align:right; }
        .center{ text-align:center; }
        .badge{ padding:2px 6px; border-radius:3px; display:inline-block; }
        .success{ background:#28a745; color:#fff; }
        .warning{ background:#ffc107; }
        .danger{ background:#dc3545; color:#fff; }
        .small{ font-size: 11px; }
        .text-center { text-align: center; }
        .filters-wrap { display: inline-block; max-width: 90%; word-break: break-word; }
    </style>
</head>
<body>
<div class="text-center">
    <h2>Course Sale Report</h2>
    <div class="muted small">Generated at: {{ $generated_at }}</div>

    {{-- Filters summary (optional) --}}
    @if(!empty($filters))
        <div class="small muted filters-wrap" style="margin:6px 0 10px;">
            <strong>Filters:</strong>
            @foreach($filters as $k=>$v)
                @if($v !== null && $v !== '')
                    {{ ucfirst(str_replace('_',' ',$k)) }} = "{{ $v }}"@if(!$loop->last),@endif
                @endif
            @endforeach
        </div>
    @endif
</div>

{{-- Summary --}}
<div class="summary">
    <table>
        <tr>
            <td><strong>Total Orders</strong><br>{{ $summary['total_orders'] ?? 0 }}</td>
            <td><strong>Total Amount</strong><br>{{ number_format($summary['total_amount'] ?? 0, 2) }} BDT</td>
            <td><strong>Complete Amount</strong><br>{{ number_format($summary['complete_amount'] ?? 0, 2) }} BDT</td>
            <td><strong>Pending Amount</strong><br>{{ number_format($summary['pending_amount'] ?? 0, 2) }} BDT</td>
        </tr>
    </table>
</div>

{{-- Table --}}
<table class="list">
    <thead>
    <tr>
        <th style="width:40px;" class="center">SL</th>
        <th>User</th>
        <th>Product</th>
        <th>Status</th>
        <th class="right">Amount</th>
        <th>Gateway</th>
        <th>Time</th>
        <th>Txn ID</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $i => $order)
        <tr>
            <td class="center">{{ $i+1 }}</td>
            <td>
                <strong>{{ $order->name }}</strong><br>
                <span class="small">{{ $order->email }} | {{ $order->phone }}</span>
            </td>
            <td>
                @php
                    $p_profile =  json_decode($order->product_profile);
                @endphp
                <span class="badge badge-info">{{ $order->product_name }}</span>
                <span class="badge warning">{{ $p_profile->variation->title }}</span>
            </td>
            <td>
                @php
                    $cls = $order->status === 'Complete' ? 'success' : ($order->status === 'Pending' ? 'warning' : 'danger');
                @endphp
                <span class="badge {{ $cls }}">{{ $order->status }}</span>
            </td>
            <td class="right">{{ number_format($order->amount, 2) }} {{ $order->currency }}</td>
            <td>{{ $order->gateway }}</td>
            <td>{{ \Carbon\Carbon::parse($order->time)->format('d M, Y h:i A') }}</td>
            <td class="small">{{ $order->transaction_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
