<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & AdminLTE CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">
    <link rel="stylesheet" href="{{url('/public/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('/public/dist/css/adminlte.min.css')}}">

    <style>
        body {
            background: #fff;
            font-family: "Source Sans Pro", sans-serif;
        }

        .invoice-box {
            background: #ffffff;
            padding: 40px 45px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
        }

        .section-title {
            background: #f4f6f9;
            padding: 10px 15px;
            border-left: 4px solid #007bff;
            font-weight: 600;
            margin: 30px 0 10px;
            font-size: 17px;
        }

        table th {
            background: #f8f9fa !important;
            font-weight: 600;
        }

        .company-info p {
            margin: 0;
            line-height: 18px;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact !important;
            }
            .invoice-box {
                box-shadow: none !important;
                border: none !important;
                padding: 0;
            }
            .section-title {
                -webkit-print-color-adjust: exact;
            }
            
        }
    </style>

</head>
<body>

<div class="container-fluid mt-4">
    <div class="invoice-box mx-auto" id="printArea" style="max-width: 900px;">

        <!-- Title -->
        <div class="text-center mb-4">
            <h3 class="text-dark font-weight-bold">
                <i class="fas fa-hotel mr-2 text-primary"></i>
                Hotel Booking Confirmation
            </h3>
        </div>

        <!-- Company Info -->
        <table class="table table-borderless mb-4">
            <tr>
                <td>
                    <img src="{{url(@$company->logo)}}" height="60">
                </td>
                <td class="text-right company-info">
                    <h5 class="font-weight-bold">{{$company->company_name}}</h5>
                    <p>📞 {{$company->company_pnone}}</p>
                    <p>📧 {{$company->company_email}}</p>
                    <p>📍 {{$company->address}}</p>
                </td>
            </tr>
        </table>

        <!-- Booking Details -->
        <div class="section-title">Booking Details</div>

        <table class="table table-bordered">
            <tr>
                <th>Reservation No</th>
                <td>{{$package->reservation}}</td>
            </tr>
            <tr>
                <th>Hotel Name</th>
                <td>{{$package->h_name}}</td>
            </tr>
            <tr>
                <th>Hotel Phone</th>
                <td>{{$package->h_phone}}</td>
            </tr>
            <tr>
                <th>Hotel Address</th>
                <td>{{$package->h_address}}</td>
            </tr>
            <tr>
                <th>Check-in / Check-out</th>
                <td>
                    {{$package->check_in}} (2:00 PM) →
                    {{$package->check_out}} (11:00 AM)
                </td>
            </tr>
        </table>

        <!-- Guest Details -->
        <div class="section-title">Guest Details</div>

        @php $pax = json_decode($package->pax); @endphp

        <table class="table table-bordered">
            @for($i=0; $i<$package->pax_number; $i++)
                @php
                    $passenger = DB::table('passengers')->where('id',$pax[$i])->first();
                @endphp

                <tr>
                    <th>Guest {{$i+1}}</th>
                    <td>{{$passenger->f_name.' '.$passenger->l_name}}</td>
                </tr>
            @endfor
        </table>

        <!-- Payment Details -->
        <div class="section-title">Payment Details</div>

        <table class="table table-bordered">
            <tr>
                <td rowspan="6" style="width:50%">
                    <p><b>Payment Type:</b> {{$package->p_type}}</p>
                    <p><b>Payment Details:</b><br>
                        {!! nl2br(@$package->p_details) !!}
                    </p>
                </td>
                <th class="text-right">Room Price</th>
                <td class="text-right">{{$package->c_price}}/-</td>
            </tr>

            <tr>
                <th class="text-right">VAT</th>
                <td class="text-right">{{$package->vat}}/-</td>
            </tr>

            <tr>
                <th class="text-right">AIT</th>
                <td class="text-right">{{$package->ait}}/-</td>
            </tr>

            <tr>
                <th class="text-right text-primary">Grand Total</th>
                <td class="text-right font-weight-bold text-primary">
                    {{$package->c_price + $package->vat + $package->ait}}/-
                </td>
            </tr>

            <tr>
                <th class="text-right">Due Amount</th>
                <td class="text-right">{{$package->due_amount}}/-</td>
            </tr>

            <tr>
                <th class="text-right text-danger">Total Paid</th>
                <td class="text-right font-weight-bold text-danger">
                    {{($package->c_price + $package->vat + $package->ait) - $package->due_amount}}/-
                </td>
            </tr>
        </table>


        <!-- Hotel Details -->
        @if(@$package->h_details)
            <div class="section-title">Hotel Details / Instructions</div>

            <div class="p-3 border rounded bg-white shadow-sm">
                {!! nl2br(json_decode($package->h_details)) !!}
            </div>
        @endif

    </div>
</div>

<!-- Auto Print -->
<script>
    window.addEventListener("load", function(){
        window.print();
    });
</script>

</body>
</html>
