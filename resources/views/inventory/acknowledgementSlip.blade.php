<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Acknowledgement Slip</title>
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
        .sign-table td {
            width: 50%;
            text-align: center;
            vertical-align: bottom;
            padding-top: 40px;
        }
        .footer {
            text-align: center;
            font-size: 11px;
            color: #777;
            margin-top: 40px;
        }
    </style>
</head>
<body>

{{-- Header --}}
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

<h2 class="text-center mb-2">Employee Product Acknowledgement Slip</h2>
<hr style="width: 80%; border: none; border-top: 1px solid #ccc;">

{{-- Product Info --}}
<div class="section-title">Product Information</div>
<div class="info-box">
    <table width="100%">
        <tr>
            <td><strong>Product Name:</strong> {{ $product->name }}</td>
            <td><strong>Category:</strong> {{ $product->category_name ?? 'N/A' }}</td>
            <td><strong>Quantity:</strong> {{ $product->quantity }}</td>
        </tr>
        <tr>
            <td><strong>Vendor Name:</strong> {{ $product->vendor_name ?? 'N/A' }}</td>
            <td><strong>Buy Price:</strong> {{ number_format($product->price,2) }} BDT</td>
            <td><strong>Warranty Expire:</strong> {{ $product->warranty_expire ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td colspan="3"><strong>Description:</strong> {!! nl2br(e($product->description ?? 'N/A')) !!}</td>
        </tr>
    </table>
</div>

{{-- Employee Info --}}
<div class="section-title">Assigned Employee</div>
<table>
    <tr><th>Employee Name</th><td>{{ $product->employee_name ?? 'Not Assigned' }}</td></tr>
    <tr><th>Designation</th><td>{{ $product->designation ?? 'N/A' }}</td></tr>
    <tr><th>Contact</th><td>{{ $product->phone ?? 'N/A' }}</td></tr>
    <tr><th>Assign Date</th><td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td></tr>
</table>

{{-- Terms & Conditions --}}
<div class="section-title">Terms and Conditions</div>
<div class="info-box">
    <ul>
        <li>Assigned product must be handled carefully and used responsibly.</li>
        <li>If the product is lost, damaged, or stolen, it must be reported and returned to the office immediately.</li>
        <li>The product may be used for personal tasks outside office hours, but any intentional damage or misuse of company property is strictly prohibited.</li>
        <li>The product cannot be used for any illegal, anti-national, or unethical activities. The company will not take responsibility for such acts.</li>
        <li>Upon resignation, termination, or department change, the employee must return the product in good condition.</li>
        <li>If the product or any of its accessories (charger, cable, cover, etc.) is lost or broken, the employee shall be liable to pay a fine or the full replacement cost as determined by the company.</li>
        <li>In case of physical or technical damage caused by negligence or unauthorized modification, repair, or software installation, the repair/replacement charges will be deducted from the employee’s salary or benefits.</li>
        <li>The product remains the property of the company at all times and must not be sold, lent, or transferred to others without written permission from management.</li>
        <li>Failure to follow these terms may result in disciplinary action, deduction of compensation, or legal action as per company policy.</li>
    </ul>
</div>

{{-- Signatures --}}
<div class="section-title">Acknowledgement</div>
<table class="sign-table">
    <tr>
        <td>
            ___________________________<br>
            <strong>Employee Signature</strong><br>
            ({{ $product->employee_name ?? '_________________' }})
        </td>
        <td>
            ___________________________<br>
            <strong>Authorized Signature</strong><br>
            ({{ $company->company_name ?? 'Trip Designer Ltd.' }})
        </td>
    </tr>
</table>

{{-- Footer --}}
<p class="footer">
    Generated on: {{ now()->setTimezone('Asia/Dhaka')->format('d M Y, h:i A') }} — {{ $company->company_name ?? 'Trip Designer Ltd.' }}
</p>

</body>
</html>
