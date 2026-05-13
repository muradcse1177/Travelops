<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - Trip Designer</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
            color: #2c3e50;
        }

        .invoice {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .invoice::before {
            content: "";
            height: 6px;
            width: 100%;
            background: #1abc9c;
            position: absolute;
            top: 0;
            left: 0;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 60px;
        }

        .invoice-title {
            text-align: right;
        }

        .invoice-title h1 {
            margin: 0;
            font-size: 28px;
        }

        .section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            flex: 1;
            background: #ecf0f1;
            border-radius: 8px;
            padding: 15px;
            font-size: 14px;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 16px;
            color: #34495e;
            border-bottom: 1px solid #ccc;
            padding-bottom: 6px;
        }

        table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
            font-size: 14px;
        }

        table th,
        table td {
            padding: 12px 10px;
            border-bottom: 1px solid #ccc;
            word-break: break-word;
        }
        table.NB td, table.NB th {
            border-bottom: none !important;
        }
        table thead {
            background-color: #1abc9c;
            color: white;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        table tbody tr:hover {
            background-color: #f1fdfb;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
            margin-top: 40px;
            font-size: 14px;
        }

        .payment-details,
        .totals {
            flex: 1;
        }

        .totals {
            text-align: right;
        }

        .summary h3 {
            color: #1abc9c;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 6px;
            font-size: 16px;
        }

        .paid {
            color: green;
        }

        .due {
            color: red;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
            padding: 0 20px;
        }

        .sign {
            text-align: center;
            width: 45%;
        }

        .dashed-line {
            border-top: 1px dashed #000;
            margin-bottom: 8px;
            height: 1px;
        }

        .label {
            font-weight: 600;
            font-size: 16px;
            color: #000;
        }

        .footer-note {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #555;
            font-style: italic;
        }
    </style>
</head>
<body>
<div class="invoice">
    <div style="margin-top: 20px; margin-bottom: 30px;">
        <div style="display: inline-block; width: 49%; vertical-align: top;">
            <img src="{{ url($agent_info->logo) }}" alt="Company Logo" style="height: 60px;">
        </div>

        <div style="display: inline-block; width: 49%; text-align: right; vertical-align: top;">
            <h1 style="margin: 0; font-size: 24px; color: #2c3e50;">INVOICE</h1>
            <p style="margin: 4px 0; font-size: 14px;">Date: {{ $ticket->issue_date }}</p>
            <p style="margin: 0; font-size: 14px;">Invoice #: {{ $ticket->airline_pnr.'/'.$ticket->reservation_pnr }}</p>
        </div>
    </div>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse: separate; border-spacing: 0; margin-top: 40px;">
        <tr>
            <td width="49%" valign="top" style="background: #f0f3f5; padding: 20px; border-radius: 10px; font-size: 14px; border-bottom: none;">
                <div style="font-weight: bold; font-size: 16px; color: #34495e; padding-bottom: 6px; margin-bottom: 10px; border-bottom: 1px solid #ccc;">
                    From
                </div>
                <strong>{{ $agent_info->company_name }}</strong><br>
                Phone: {{ $company_info->phone_code . $company_info->company_pnone }}<br>
                Email: {{ $company_info->company_email }}<br>
                Address: {{ @$company_info->address }}
            </td>

            <td width="2%" style="border-bottom: none;"></td>

            <td width="49%" valign="top" style="background: #f0f3f5; padding: 20px; border-radius: 10px; font-size: 14px; border-bottom: none;">
                <div style="font-weight: bold; font-size: 16px; color: #34495e; padding-bottom: 6px; margin-bottom: 10px; border-bottom: 1px solid #ccc;">
                    To
                </div>
                @php
                    $passenger = DB::table('passengers')->where('id', $ticket->pax_name[0])->where('upload_by', Session::get('agent_id'))->first();
                @endphp
                <strong>{{ $passenger->f_name . ' ' . $passenger->l_name ?? '-' }}</strong><br>
                Phone: {{ $passenger->phone ?? '-' }}<br>
                Email: {{ $passenger->email ?? '-' }}<br>
                Address: {{ @$passenger->address ?? '-' }}
            </td>
        </tr>
    </table>

    <table>
        <thead>
        <tr>
            <th>Purpose</th>
            <th>Passengers</th>
            <th>Reference</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @php
            $from = $ticket->a_from[0] ?? '-';
            $to = end($ticket->a_to) ?? '-';
        @endphp
            <tr>
                <td style="width: 40%; max-width: 40%; word-wrap: break-word; white-space: normal;">
                    <b>Air Ticket</b><br> ({{ $from ?? '-' }} - {{ $to ?? '-' }})
                </td>
                <td>{{ $ticket->pax_number }}</td>
                <td>{{ $ticket->airline_pnr.'/'.$ticket->reservation_pnr }}</td>
                <td>{{ number_format($ticket->c_price + $ticket->ait + $ticket->vat, 2) }} {{'BDT'}}</td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 20px; table-layout: fixed;" class="NB">
        <tr>
            <!-- Payment Info -->
            <td style="vertical-align: top; width: 50%; text-align: right;">
                <h3 style="color: #1abc9c; font-size: 18px; font-weight: bold; margin-bottom: 10px; border-bottom: 1px solid #ccc; padding-bottom: 6px;">
                    Payment Info
                </h3>
                <p><strong>Payment Method:</strong> {{ $ticket->payment_type ?? '-' }}</p>
                <p><strong>Payment Details:</strong> {{ $ticket->p_details ?? '-' }}</p>
                <p><strong>Due:</strong> <span style="color: red; font-weight: bold;">{{ number_format($ticket->due_amount, 2) }} BDT</span></p>
            </td>

            <!-- Summary -->
            <td style="vertical-align: top; width: 50%; text-align: right;">
                <h3 style="color: #1abc9c; font-size: 18px; font-weight: bold; margin-bottom: 10px; border-bottom: 1px solid #ccc; padding-bottom: 6px; text-align: right;">
                    Summary
                </h3>
                <p><strong>Subtotal:</strong> {{ number_format($ticket->c_price + $ticket->ait + $ticket->vat, 2) }} BDT</p>
                <p><strong>Tax:</strong> 0.00 BDT</p>
                <p><strong style="color: green;">Paid:</strong> {{ number_format(($ticket->c_price + $ticket->ait + $ticket->vat) - $ticket->due_amount, 2) }} BDT</p>
                <p><strong style="color: red;">Due:</strong> {{ number_format($ticket->due_amount, 2) }} BDT</p>
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 60px;" class="NB">
        <tr>
            <td style="width: 50%; text-align: center;">
                <div style="border-top: 1px dashed #000; width: 80%; margin: 0 auto;"></div>
                <strong>Customer Signature</strong>
            </td>
            <td style="width: 50%; text-align: center;">
                <div style="border-top: 1px dashed #000; width: 80%; margin: 0 auto;"></div>
                <strong>Authorized Signature</strong>
            </td>
        </tr>
    </table>

    <p style="text-align: center; margin-top: 40px; font-size: 13px; color: #555;">
        <em>This is a system-generated invoice approved by <strong>{{ $agent_info->company_name }}</strong>. No additional signature is required.</em>
    </p>
</div>
</body>
</html>
