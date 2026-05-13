@extends('mainLayout.layout')
@section('title','Trip Designer || Air Ticket Invoice')
@section('airTicket','active')
@section('ticketMenu','menu-open')

@section('css')
    <link rel="stylesheet" href="{{url('/public/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('/public/dist/css/adminlte.min.css')}}">

    <style>
        body {
            background: #f4f6f9;
        }

        .invoice-wrapper {
            background: #fff;
            padding: 40px 45px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin: 25px auto;
        }

        .invoice-header h4 {
            font-size: 1.65rem;
            font-weight: 700;
            color: #333;
        }

        .company-block {
            padding: 15px 0;
            border-bottom: 2px solid #f1f1f1;
            margin-bottom: 20px;
        }

        .company-info h5 {
            font-weight: 700;
            color: #343a40;
        }

        .info-section {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            margin-left: 1.5px;
            margin-right: 2px;
            border-left: 6px solid #ffc107;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.92rem;
        }

        .info-value {
            font-size: 1.08rem;
            font-weight: 600;
            color: #212529;
        }

        .section-title {
            background: #eef2f7;
            padding: 10px 12px;
            border-radius: 6px;
            font-size: 1.2rem;
            font-weight: 700;
            color: #495057;
            margin: 25px 0 12px;
            border-left: 4px solid #007bff;
        }

        table th {
            background: #eef2f7 !important;
            font-weight: 600 !important;
            color: #333;
        }

        .flight-card {
            background: #ffffff;
            padding: 15px 5px;
            border-radius: 10px;
            border: 1px solid #e6e6e6;
            margin-bottom: 10px;
        }

        .payment-summary .list-group-item {
            font-size: 1.05rem;
            padding: 12px 18px;
        }

        .list-total {
            background: #e8e1ff;
            font-weight: 700;
            color: #4a30b3;
        }

        .text-justify {
            text-align: justify;
        }

        .invoice-buttons a,
        .invoice-buttons button {
            min-width: 170px;
            font-size: 1.05rem;
        }
    </style>
@endsection


@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="mb-3">Air Ticket Invoice</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="invoice-wrapper">

                <!-- Header -->
                <div class="text-center invoice-header mb-4">
                    <h4><strong>Electronic Ticket / Invoice</strong></h4>
                </div>

                <!-- Company Info -->
                <div class="company-block row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ url($company->logo) }}" height="55" alt="Logo">
                    </div>
                    <div class="col-md-6 text-md-right company-info">
                        <h5>{{ $company->company_name }}</h5>
                        <p class="mb-0">Phone: {{ $company->company_pnone }}</p>
                        <p class="mb-0">Email: {{ $company->company_email }}</p>
                        <p class="mb-0">Address: {{ $company->address }}</p>
                    </div>
                </div>

                <!-- Ticket Info -->
                <div class="info-section row">
                    <div class="col-md-3">
                        <span class="info-label">Airline PNR:</span><br>
                        <span class="info-value">{{ $ticket->airline_pnr }}</span>
                    </div>
                    <div class="col-md-3">
                        <span class="info-label">Reservation PNR:</span><br>
                        <span class="info-value">{{ $ticket->reservation_pnr }}</span>
                    </div>
                    <div class="col-md-3">
                        <span class="info-label">Issue Date:</span><br>
                        <span class="info-value">{{ $ticket->issue_date }}</span>
                    </div>
                    <div class="col-md-3">
                        <span class="info-label">Status:</span><br>
                        <span class="info-value text-success">Confirmed</span>
                    </div>
                </div>

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

                <!-- Passenger Details -->
                <div class="section-title">Passenger Details</div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Ticket Number</th>
                                <th>Baggage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < $ticket->pax_number; $i++)
                                @php
                                    $pass = DB::table('passengers')->where('id',$pax[$i])->first();
                                @endphp
                                <tr>
                                    <td>{{ $pass->f_name.' '.$pass->l_name }}</td>
                                    <td>{{ $t_number[$i] }}</td>
                                    <td>{{ $luggage[$i] }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <!-- Flight Details -->
                <div class="section-title">Flight Details</div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Airlines</th>
                                <th>Flight No</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < count($f_number); $i++)
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
                </div>

                <!-- Payment Details -->
                <div class="section-title">Payment Details</div>

                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 15px;">
                        <div class="payment-box shadow-sm p-3 rounded" 
                            style="background:#f8f9fc; border-left:5px solid #17a2b8;">

                            <h5 class="mb-3" style="font-weight:600; color:#17a2b8;">
                                <i class="fas fa-credit-card mr-2"></i> Payment Information
                            </h5>

                            <div class="mb-3">
                                <span class="text-muted" style="font-weight:600;">Payment Type:</span>
                                <div class="mt-1" style="font-size:1.05rem; font-weight:600; color:#343a40;">
                                    {{ $ticket->payment_type }}
                                </div>
                            </div>

                            <div>
                                <span class="text-muted" style="font-weight:600;">Payment Details:</span>
                                <div class="bg-white p-3 mt-2 rounded" 
                                    style="border:1px solid #e3e6f0; font-size:0.95rem; line-height:1.5; text-align:justify;">
                                    {!! nl2br($ticket->p_details) !!}
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <ul class="list-group payment-summary">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Ticket Price</span> 
                                <span>{{ $ticket->c_price }}/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>VAT</span> 
                                <span>{{ $ticket->vat }}/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>AIT</span> 
                                <span>{{ $ticket->ait }}/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between list-total">
                                <span>Total</span> 
                                <span>{{ $ticket->c_price + $ticket->vat + $ticket->ait }}/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Due Amount</span> 
                                <span>{{ $ticket->due_amount }}/-</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Terms -->
                <div class="section-title">Terms & Conditions</div>

                <div class="text-justify mb-4">
                    {!! nl2br($airTicketTnT->tnt) !!}
                </div>

                <!-- Buttons -->
                <div class="text-right invoice-buttons mt-3">
                    {{ Form::open(['url'=>'generateAirInvoicePDF','method'=>'post']) }}
                        @csrf
                        <input type="hidden" name="id" value="{{ $ticket->id }}">

                        <a href="{{ url('printAirTicket?id='.$ticket->id) }}" 
                           target="_blank" 
                           class="btn btn-success mr-2">
                            <i class="fas fa-print"></i> Print Invoice
                        </a>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    {{ Form::close() }}
                </div>

            </div>

        </div>
    </section>

</div>
@endsection

@section('js')
@endsection
