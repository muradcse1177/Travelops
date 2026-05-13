<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Air Ticket Invoice</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #343a40;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .text-success { color: green; }
        .text-purple { color: #6f42c1; }
        .font-weight-bold { font-weight: bold; }
        .mb-1 { margin-bottom: 6px; }
        .mb-2 { margin-bottom: 12px; }
        .mb-3 { margin-bottom: 18px; }
        .section-title {
            font-size: 15px;
            font-weight: bold;
            border-left: 4px solid #ffc107;
            padding-left: 10px;
            margin: 30px 0 15px;
        }
        .info-box {
            background: #f8f9fa;
            border-radius: 6px;
            padding: 12px 20px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th {
            background-color: #f1f3f5;
        }
        table th, table td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        ul li {
            display: flex;
            justify-content: space-between;
            border: 1px solid #ccc;
            padding: 8px 10px;
            border-top: none;
        }
        ul li:first-child {
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>

@php
    $pax = json_decode($ticket->pax_name);
    $t_number = json_decode($ticket->t_number);
    $luggage = json_decode($ticket->luggage);
    $a_from = json_decode($ticket->a_from);
    $a_to = json_decode($ticket->a_to);
    $d_time = json_decode($ticket->d_time);
    $a_time = json_decode($ticket->a_time);
    $airlines = json_decode($ticket->airlines);
    $f_number = json_decode($ticket->f_number);
@endphp
<h2 class="text-center mb-3">Electronic Ticket / Invoice</h2>
<hr style="width: 80%; border: none; border-top: 1px solid #ccc;">
    <!-- Header -->
<table width="100%" class="mb-3">
    <tr>
        <td style="border: none;">
            @if($company->logo)
                <img src="{{ url($company->logo) }}" height="50" alt="Logo">
            @endif
        </td>
        <td class="text-right" style="font-size: 13px;" style="border: none;">
            <strong>{{ $company->company_name }}</strong><br>
            Phone: {{ $company->company_pnone }}<br>
            Email: {{ $company->company_email }}<br>
            Address: {{ $company->address }}
        </td>
    </tr>
</table>


<!-- Ticket Info -->
<div class="info-box mb-3">
    <table width="100%">
        <tr>
            <td><strong>Airline PNR:</strong> {{ $ticket->airline_pnr }}</td>
            <td><strong>Reservation PNR:</strong> {{ $ticket->reservation_pnr }}</td>
            <td><strong>Issue Date:</strong> {{ $ticket->issue_date }}</td>
            <td><strong>Status:</strong> <span class="text-success">Confirmed</span></td>
        </tr>
    </table>
</div>

<!-- Passenger Details -->
<div class="section-title">Passenger Details</div>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Ticket Number</th>
        <th>Baggage</th>
    </tr>
    </thead>
    <tbody>
    @for($i = 0; $i < $ticket->pax_number; $i++)
        @php $passenger = DB::table('passengers')->find($pax[$i]); @endphp
        <tr>
            <td>{{ $passenger->f_name }} {{ $passenger->l_name }}</td>
            <td>{{ $t_number[$i] }}</td>
            <td>{{ $luggage[$i] }}</td>
        </tr>
    @endfor
    </tbody>
</table>

<!-- Flight Details -->
<div class="section-title">Flight Details</div>
<table>
    <thead>
    <tr>
        <th>Airlines</th>
        <th>Flight Number</th>
        <th>From</th>
        <th>To</th>
        <th>Departure</th>
        <th>Arrival</th>
    </tr>
    </thead>
    <tbody>
    @for($i = 0; $i < count($f_number); $i++)
        <tr>
            <td>{{ $airlines[$i] }}</td>
            <td>{{ $f_number[$i] }}</td>
            <td>{{ $a_from[$i] }}</td>
            <td>{{ $a_to[$i] }}</td>
            <td>{{ $d_time[$i] }}</td>
            <td>{{ $a_time[$i] }}</td>
        </tr>
    @endfor
    </tbody>
</table>

<!-- Payment Details -->
<div class="section-title">Payment Details</div>
<table width="100%" class="mb-3">
    <tr>
        <td width="50%" >
            <p><strong>Payment Type:</strong> {{ $ticket->payment_type }}</p>
            <p><strong>Payment Details:</strong><br>{!! nl2br($ticket->p_details) !!}</p>
        </td>
        <td width="50%">
            <ul>
                <li><span>Ticket Price: </span><span>{{ $ticket->c_price }}/-</span></li>
                <li><span>VAT: </span><span>{{ $ticket->vat }}/-</span></li>
                <li><span>AIT: </span><span>{{ $ticket->ait }}/-</span></li>
                <li class="font-weight-bold text-purple"><span>Grand Total: </span><span>{{ $ticket->c_price + $ticket->vat + $ticket->ait }}/-</span></li>
                <li><span>Due Amount: </span><span>{{ $ticket->due_amount }}/-</span></li>
                <li><span>Paid Amount: </span><span>{{ $ticket->c_price + $ticket->vat + $ticket->ait - $ticket->due_amount}}/-</span></li>
            </ul>
        </td>
    </tr>
</table>

<!-- Terms -->
<div class="section-title">Terms and Conditions</div>
<p style="font-size: 12px; line-height: 1.6;">
    {!! nl2br($airTicketTnT->tnt) !!}
</p>

<!-- Footer -->
<p class="text-center" style="font-size: 11px; color: #999; margin-top: 30px;">
    Generated on: {{ now()->setTimezone('Asia/Dhaka')->format('d M Y, h:i A') }} — {{ $company->company_name }}
</p>

</body>
</html>
