<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visa Invoice - WP-{{ $visa->id }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    font-size: 14px;
    background: #f0f2f5;
    color: #333;
}

.invoice-box {
    background: #fff;
    padding: 35px 40px;
    border-radius: 10px;
    box-shadow: 0 2px 20px rgba(0,0,0,0.1);
    margin: 30px auto;
    max-width: 950px;
}

.section-title {
    display: flex;
    align-items: center;
    background: #e9f2ff;
    padding: 10px 15px;
    border-left: 6px solid #190ebe;
    border-radius: 6px;
    font-weight: 600;
    font-size: 1.15rem;
    margin-top: 30px;
    margin-bottom: 18px;
    color: #190ebe;
}

.section-title i {
    margin-right: 8px;
}

.logo {
    height: 55px;
}

.table th {
    background-color: #eef2f7;
    font-weight: 600;
}

@media print {
    body {
        background: #fff !important;
    }
    .invoice-box {
        box-shadow: none !important;
        margin: 0 !important;
        padding: 0 10px !important;
        width: 100% !important;
        max-width: 100% !important;
    }
}
</style>
</head>

<body onload="window.print()">

<div class="invoice-box">

    <!-- Company Header -->
    <table class="w-100 mb-4">
        <tr>
            <td style="width:50%">
                @if($company->logo)
                    <img src="{{ url($company->logo) }}" class="logo">
                @else
                    <h4>{{ $company->company_name }}</h4>
                @endif
            </td>
            <td style="width:50%" class="text-right">
                <strong>{{ $company->company_name }}</strong><br>
                Phone: {{ $company->company_pnone }}<br>
                Email: {{ $company->company_email }}<br>
                Address: {{ $company->address }}
            </td>
        </tr>
    </table>

    <div class="text-center mb-3">
        <h4><strong>Work Permit Visa Invoice</strong></h4>
        <span class="badge badge-secondary">
            Invoice No: WP-{{ $visa->id }} | Date: {{ date('d M Y') }}
        </span>
    </div>

    <!-- Visa Details -->
    <div class="section-title">
        <i class="fas fa-file-alt"></i> Visa Application Details
    </div>

    <table class="table table-bordered">
        <tr><th>Booking Date</th><td>{{ $visa->date }}</td></tr>
        <tr><th>Visa Country</th><td>{{ $visa->visa_country }}</td></tr>
        <tr><th>Visa Service Details</th><td>{{ $visa->v_details }}</td></tr>
        <tr><th>Status</th><td>{{ $visa->status }}</td></tr>
    </table>

    <!-- Passenger Details -->
    <div class="section-title">
        <i class="fas fa-users"></i> Passenger Details
    </div>

    @php $p = json_decode($visa->p_details); $j = 1; @endphp

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Passport Number</th>
        </tr>
        </thead>
        <tbody>
        @foreach($p as $pas)
            @php
                $name = DB::table('passengers')
                    ->where('id',$pas)
                    ->where('upload_by', Session::get('agent_id'))
                    ->first();
            @endphp
            @if($name)
            <tr>
                <td>{{ $j++ }}</td>
                <td>{{ $name->f_name }} {{ $name->l_name }}</td>
                <td>{{ $name->p_number }}</td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    <!-- Work Permit Details -->
    @if($visa->w_details)
    <div class="section-title">
        <i class="fas fa-info-circle"></i> Work Permit Details
    </div>

    <div class="border p-3">
        {!! nl2br(json_decode($visa->w_details)) !!}
    </div>
    @endif

    <!-- Payment Summary -->
    <div class="section-title">
        <i class="fas fa-credit-card"></i> Payment Summary
    </div>

    <table class="table table-bordered">
        <tr>
            <td rowspan="6" style="width:60%">
                <strong>Payment Type:</strong> {{ $visa->v_p_type }}<br><br>
                <strong>Payment Details:</strong><br>
                {!! nl2br($visa->v_p_details) !!}
            </td>
            <td class="text-right">Visa Price</td>
            <td class="text-right">{{ $visa->v_c_price }}/-</td>
        </tr>
        <tr>
            <td class="text-right">VAT</td>
            <td class="text-right">{{ $visa->v_vat }}/-</td>
        </tr>
        <tr>
            <td class="text-right">AIT</td>
            <td class="text-right">{{ $visa->v_ait }}/-</td>
        </tr>
        <tr>
            <td class="text-right text-primary"><strong>Grand Total</strong></td>
            <td class="text-right text-primary">
                <strong>{{ $visa->v_c_price + $visa->v_vat + $visa->v_ait }}/-</strong>
            </td>
        </tr>
        <tr>
            <td class="text-right">Due</td>
            <td class="text-right text-danger">{{ $visa->v_due }}/-</td>
        </tr>
        <tr>
            <td class="text-right">Paid</td>
            <td class="text-right text-success">
                <strong>{{ $visa->v_c_price + $visa->v_vat + $visa->v_ait - $visa->v_due }}/-</strong>
            </td>
        </tr>
    </table>

</div>

<script>
window.addEventListener("load", function() {
    window.print();
});
</script>

</body>
</html>