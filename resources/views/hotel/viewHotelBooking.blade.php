@extends('mainLayout.layout')
@section('title','Trip Designer || Hotel Booking')
@section('hotelBooking','active')
@section('hotelMenu','menu-open')
@section('hotel','active')

@section('content')

<div class="content-wrapper">

    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-hotel mr-1"></i> Hotel Booking Management
            </h4>

            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Hotel Booking Management</li>
            </ol>
        </div>
    </section>


    <!-- Main -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <!-- 🟦 MAIN CARD -->
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">
                                <i class="fas fa-file-invoice mr-1"></i> Hotel Booking Confirmation
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>


                        <div class="card-body bg-light">

                            <div class="p-4 bg-white shadow-sm rounded" id="printArea">

                                @section('css')
                                    <link rel="stylesheet" href="{{url('/public/plugins/fontawesome-free/css/all.min.css')}}">
                                    <link rel="stylesheet" href="{{url('/public/dist/css/adminlte.min.css')}}">
                                @endsection


                                <!-- Title -->
                                <div class="text-center mb-4">
                                    <h4 class="font-weight-bold text-dark">
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        Hotel Booking Confirmation Details
                                    </h4>
                                </div>

                                <!-- 🟧 Company Info -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <img src="{{url(@$company->logo)}}" height="60">
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h5 class="font-weight-bold">{{$company->company_name}}</h5>
                                        <p class="mb-0">📞 {{$company->company_pnone}}</p>
                                        <p class="mb-0">📧 {{$company->company_email}}</p>
                                        <p class="mb-0">📍 {{$company->address}}</p>
                                    </div>
                                </div>

                                <!-- Section Title -->
                                <div class="section-title">Booking Details</div>

                                <table class="table table-bordered shadow-sm">
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
                                        <th>Check in - Check out</th>
                                        <td>
                                            {{$package->check_in.' (2:00 PM)'}} → {{$package->check_out.' (11:00 AM)'}}
                                        </td>
                                    </tr>
                                </table>

                                <!-- Section Title -->
                                <div class="section-title">Guest Details</div>

                                <table class="table table-bordered shadow-sm">
                                    @php $pax = json_decode($package->pax); @endphp
                                    @for($i=0; $i<$package->pax_number; $i++)
                                        @php
                                            $passenger = DB::table('passengers')->where('id',$pax[$i])->first();
                                        @endphp

                                        <tr>
                                            <th>Guest {{$i +1}}</th>
                                            <td>{{$passenger->f_name.' '.$passenger->l_name}}</td>
                                        </tr>
                                    @endfor
                                </table>

                                <!-- Section Title -->
                                <div class="section-title">Payment Details</div>

                                <table class="table table-bordered shadow-sm">

                                    <tr>
                                        <td rowspan="6">
                                            <p><b>Payment Type:</b> {{$package->p_type}}</p>
                                            <p><b>Payment Details:</b><br> {!! nl2br(@$package->p_details) !!}</p>
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
                                        <th class="text-right text-purple">Grand Total</th>
                                        <td class="text-right text-purple font-weight-bold">
                                            {{$package->c_price + $package->vat + $package->ait}}/-
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-right">Due Amount</th>
                                        <td class="text-right">{{$package->due_amount}}/-</td>
                                    </tr>

                                    <tr>
                                        <th class="text-right text-danger">Total Paid</th>
                                        <td class="text-right text-danger font-weight-bold">
                                            {{($package->c_price + $package->vat + $package->ait) - $package->due_amount}}/-
                                        </td>
                                    </tr>

                                </table>

                                <!-- Hotel Rules -->
                                @if(@$package->h_details)
                                    <div class="section-title">Hotel Details</div>

                                    <div class="bg-white shadow-sm p-3 rounded border">
                                        {!! nl2br(json_decode($package->h_details)) !!}
                                    </div>
                                @endif

                            </div> <!-- printArea -->

                        </div>

                        <div class="card-footer text-right">
                            <a href="{{url('printHotelBookingB2b?id='.$package->id)}}" class="btn btn-primary">
                                <i class="fas fa-print mr-1"></i> Print Invoice
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>

<script>
    $('.select2bs4').select2({ theme: 'bootstrap4' });

    // Section Title Style
    $(".section-title").css({
        "background": "#f4f6f9",
        "padding": "10px 15px",
        "margin": "25px 0 10px 0",
        "border-left": "4px solid #007bff",
        "font-weight": "bold",
        "font-size": "16px"
    });
</script>
@endsection
