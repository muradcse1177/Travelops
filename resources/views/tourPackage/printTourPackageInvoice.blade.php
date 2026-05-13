<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tour Package Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" media="all">

    <style>
    /* ---------- Global Body ---------- */
    body {
        font-family: 'Segoe UI', sans-serif;
        font-size: 14px;
        color: #333;
        background-color: #f0f2f5;
        line-height: 1.5;
    }

    /* ---------- Invoice Box ---------- */
    .invoice-box {
        background: #fff;
        padding: 35px 40px;
        border-radius: 10px;
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        margin: 30px auto;
        max-width: 950px;
    }

    /* ---------- Section Header Design (Premium Blue Ribbon) ---------- */
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
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .section-title i {
        margin-right: 8px;
        font-size: 18px;
        color: #190ebe;
    }

    /* ---------- Table Styles ---------- */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table th {
        background-color: #eef2f7;
        font-weight: 600;
        color: #333;
        vertical-align: middle;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .table td {
        vertical-align: middle;
        color: #444;
    }

    .totals td {
        font-weight: 600;
    }

    /* ----------- Logo ----------- */
    .logo {
        height: 55px;
        object-fit: contain;
    }

    /* ---------- Badge Styling ---------- */
    .badge-section {
        font-size: 0.9rem;
        padding: 6px 10px;
        border-radius: 6px;
        background: #190ebe;
        color: #fff;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    /* ----------- List Style ----------- */
    ul {
        padding-left: 20px;
        margin-bottom: 0;
    }

    ul li {
        margin-bottom: 5px;
    }

    /* ---------- PRINT MODE OPTIMIZED ---------- */
    @media print {
        @page {
            margin: 0.4in 0.3in 0.4in 0.3in !important; /* smaller margins */
        }

        body {
            background: #fff !important;
            margin: 10px !important;
            padding: 10px !important;
        }

        .invoice-box {
            box-shadow: none !important;
            margin: 0 !important;
            padding: 0 10px !important;
            width: 100% !important;
            max-width: 100% !important;
        }

        .section-title {
            background: #e9f2ff !important;
            color: #190ebe !important;
            border-left-color: #190ebe !important;
        }

        .table th {
            background-color: #eef2f7 !important;
        }

        .badge-section,
        .badge {
            background-color: #190ebe !important;
            color: #fff !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        a[href]:after {
            content: "";
        }

        i.fas {
            font-family: "Font Awesome 5 Free" !important;
            font-weight: 900 !important;
        }
    }
</style>

</head>
<body>

<div class="invoice-box">
    <table class="w-100 mb-4" style="table-layout: fixed;">
        <tr>
            <td style="width: 50%; vertical-align: top;">
                @if($company->logo)
                    <img src="{{ url($company->logo) }}" class="logo" alt="Logo">
                @else
                    <h4>{{ $company->company_name }}</h4>
                @endif
            </td>
            <td style="width: 50%; text-align: right; vertical-align: top;">
                <strong>{{ $company->company_name }}</strong><br>
                Phone: {{ $company->company_pnone }}<br>
                Email: {{ $company->company_email }}<br>
                Address: {{ $company->address }}
            </td>
        </tr>
    </table>

    <div class="text-center mb-3">
        <h4><strong>Tour Package Invoice</strong></h4>
        <span class="badge badge-secondary">Invoice Date: {{ date('d M Y') }}</span>
    </div>

    <!-- Package Info -->
    <div class="section-title">Package Details</div>
    <table class="table table-bordered">
        <tr><th>Package Name</th><td>{{ $package->title }}</td></tr>
        <tr><th>Package Code</th><td>{{ $package->p_code }}</td></tr>
        <tr><th>Duration</th><td>{{ $package->start_date }} to {{ $package->end_date }}</td></tr>
    </table>

    <!-- Guest Info -->
    <div class="section-title">Guest Details</div>
    @php $pax = json_decode($package->traveler); @endphp
    <table class="table table-bordered">
        <thead>
        <tr><th>#</th><th>Full Name</th></tr>
        </thead>
        <tbody>
        @for($i = 0; $i < $package->g_details; $i++)
            @php $passenger = DB::table('passengers')->where('id', $pax[$i])->first(); @endphp
            <tr><td>{{ $i + 1 }}</td><td>{{ $passenger->f_name . ' ' . $passenger->l_name }}</td></tr>
        @endfor
        </tbody>
    </table>

    <!-- Payment Info -->
    <div class="section-title">Payment Summary</div>
    <table class="table table-bordered">
        <tr>
            <td rowspan="6" style="width: 60%;">
                <strong>Payment Type:</strong> {{ $package->payment_type }}<br><br>
                <strong>Payment Info:</strong><br>{!! nl2br($package->pay_details) !!}
            </td>
            <td class="text-right">Price</td>
            <td class="text-right">{{ $package->p_c_details }}/-</td>
        </tr>
        <tr><td class="text-right">VAT</td><td class="text-right">{{ $package->p_vat }}/-</td></tr>
        <tr><td class="text-right">AIT</td><td class="text-right">{{ $package->p_ait }}/-</td></tr>
        <tr><td class="text-right">Grand Total</td><td class="text-right text-primary"><strong>{{ $package->p_c_details + $package->p_vat + $package->p_ait }}/-</strong></td></tr>
        <tr><td class="text-right">Due</td><td class="text-right">{{ $package->due }}/-</td></tr>
        <tr><td class="text-right">Paid</td><td class="text-right text-success"><strong>{{ $package->p_c_details + $package->p_vat + $package->p_ait - $package->due }}/-</strong></td></tr>
    </table>

   @php
    $sections = [
        'highlights'   => 'Hotel Name',
        'day_title'    => 'Day Wise Itinerary',
        'p_inclusions' => 'Package Inclusions',
        'p_exclusions' => 'Package Exclusions',
        'p_tnt'        => 'Package Terms and Conditions',
        'p_policy'     => 'Package Policy'
    ];

    $listKeys = ['p_inclusions','p_exclusions','p_tnt','p_policy'];
@endphp

@foreach ($sections as $key => $label)
    @if(!empty($package->$key))

        <div class="section-title">{{ $label }}</div>

        {{-- ================= DAY WISE ITINERARY ================= --}}
        @if($key === 'day_title')
            @php
                $d_titles    = json_decode($package->day_title, true);
                $d_itineris  = json_decode($package->dat_itinary, true);
            @endphp

            <table class="table table-bordered">
                @foreach($d_titles as $i => $title)
                    <tr>
                        <td style="width:30%;"><strong>Day {{ $i+1 }}: {{ $title }}</strong></td>
                        <td>
                            <ul style="list-style:none; padding-left:0; margin:0;">
                                @foreach(explode("\n", $d_itineris[$i] ?? '') as $line)
                                    @if(trim($line) !== '')
                                        <li>{{ trim(html_entity_decode($line)) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </table>

        {{-- ================= INCLUSIONS / EXCLUSIONS / T&C / POLICY ================= --}}
        @elseif(in_array($key, $listKeys))
            @php
                $html  = json_decode($package->$key, true);
                $text  = strip_tags($html, '<div>');
                $lines = array_values(array_filter(array_map('trim', explode('</div>', $text))));
            @endphp

            {{-- TERMS & CONDITIONS --}}
            @if($key === 'p_tnt')
                <ol style="padding-left:20px;">
                    @foreach($lines as $line)
                        @php $item = trim(html_entity_decode(strip_tags($line))); @endphp
                        @if($item !== '')
                            <li><strong>{{ $item }}</strong></li>
                        @endif
                    @endforeach
                </ol>

            {{-- INCLUSIONS / EXCLUSIONS / POLICY --}}
            @else
                <ul style="list-style:none; padding-left:0; margin:0;">
                    @foreach($lines as $line)
                        @php $item = trim(html_entity_decode(strip_tags($line))); @endphp
                        @if($item !== '')
                            <li class="mb-1">
                                @if($key === 'p_exclusions')
                                    <i class="fas fa-times-circle text-danger mr-1"></i>
                                @else
                                    <i class="fas fa-check-circle text-success mr-1"></i>
                                @endif
                                {{ $item }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif

        {{-- ================= SIMPLE CONTENT ================= --}}
        @else
            <p>{!! nl2br(html_entity_decode(json_decode($package->$key))) !!}</p>
        @endif

    @endif
@endforeach

</div>
<script>
    window.addEventListener("load", window.print());
</script>
</body>
</html>
