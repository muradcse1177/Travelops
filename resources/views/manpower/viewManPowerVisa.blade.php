@extends('mainLayout.layout')
@section('title','Trip Designer || Work Permit Visa Processing')
@section('newManPowerPackage','active')
@section('manPowerPackage','active')
@section('manPowerMenu','menu-open')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Work Permit Visa Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Work Permit Visa Management</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"> Work Permit Visa Invoice</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;" >
                                <div class="card-body row table-responsive">
                                    <div id="printArea" style="padding:50px; background:#fff; font-family: 'Segoe UI', sans-serif;">

                                        {{-- TOP HEADER BAR --}}
                                        <div style="background:#e6ebf1; color:#0f0f0f; padding:20px 30px; border-radius:6px;">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="{{ url($company->logo) }}" height="60">
                                                </div>
                                                <div class="col-6 text-right">
                                                    <h3 style="margin:0;"><b>{{ $company->company_name }}</b></h3>
                                                    <small>
                                                        Email: {{ $company->company_email }} <br>
                                                        Phone: {{ $company->company_pnone }} <br>
                                                        Address: {{ $company->address }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- INVOICE TITLE --}}
                                        <div class="text-center mt-4 mb-4">
                                            <h2 style="letter-spacing:2px; font-weight:700;">WORK PERMIT VISA INVOICE</h2>
                                            <span style="background:#111827; color:#fff; padding:5px 15px; border-radius:20px; font-size:14px;">
                                                Invoice No: WP-{{ $visa->id }}
                                            </span>
                                        </div>

                                        {{-- BOOKING SUMMARY --}}
                                        <div class="card shadow-sm border-0 mb-4" style="background:#e6ebf1;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><b>Booking Date:</b> {{ $visa->date }}</p>
                                                        <p><b>Visa Country:</b> {{ $visa->visa_country }}</p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <p><b>Status:</b>
                                                            <span style="padding:5px 12px; background:#10b981; color:#fff; border-radius:15px;">
                                                                {{ $visa->status }}
                                                            </span>
                                                        </p>
                                                        <p><b>Service:</b> {{ $visa->v_details }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- PASSENGER TABLE --}}
                                        <h5 class="mb-3"><b>Passenger Information</b></h5>

                                        <table class="table mb-4" style="border-radius:8px; overflow:hidden;">
                                            <thead style="background:#f3f4f6;">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>Passport Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $p = json_decode($visa->p_details ?? '[]');
                                                $j = 1;
                                            @endphp

                                            @foreach($p as $pas)
                                                @php
                                                    $name = DB::table('passengers')
                                                        ->where('id',$pas)
                                                        ->where('upload_by',Session::get('agent_id'))
                                                        ->first();
                                                @endphp

                                                @if($name)
                                                <tr style="border-bottom:1px solid #e5e7eb;">
                                                    <td>{{ $j++ }}</td>
                                                    <td>{{ $name->f_name }} {{ $name->l_name }}</td>
                                                    <td>{{ $name->p_number }}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>

                                        {{-- WORK PERMIT DETAILS --}}
                                        <h5 class="mb-3"><b>Work Permit Details</b></h5>

                                        <div style="background:#f9fafb; padding:20px; border-radius:8px; border:1px solid #e5e7eb;" class="mb-4">
                                            {!! (json_decode($visa->w_details ?? '""')) !!}
                                        </div>

                                        {{-- PAYMENT SECTION --}}
                                        <div class="row">

                                            {{-- PAYMENT INFO --}}
                                            <div class="col-md-6">
                                                <div style="border:1px solid #e5e7eb; border-radius:8px;">
                                                    <div style="background:#f3f4f6; padding:10px 15px; border-bottom:1px solid #e5e7eb;">
                                                        <b>Payment Information</b>
                                                    </div>
                                                    <div style="padding:15px;">
                                                        <p><b>Payment Type:</b> {{ $visa->v_p_type }}</p>
                                                        <div>
                                                            <b>Payment Details:</b><br>
                                                            {!! nl2br($visa->v_p_details) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- TOTAL BOX --}}
                                            <div class="col-md-6">
                                                <div style="border:2px solid #111827; border-radius:8px;">
                                                    <table class="table mb-0">
                                                        <tr>
                                                            <td>Visa Price</td>
                                                            <td class="text-right">{{ $visa->v_c_price }}/-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>VAT</td>
                                                            <td class="text-right">{{ $visa->v_vat }}/-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AIT</td>
                                                            <td class="text-right">{{ $visa->v_ait }}/-</td>
                                                        </tr>
                                                        <tr style="background:#f3f4f6;">
                                                            <td><b>Grand Total</b></td>
                                                            <td class="text-right">
                                                                <b>{{ $visa->v_c_price + $visa->v_vat + $visa->v_ait }}/-</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Due Amount</td>
                                                            <td class="text-right text-danger">
                                                                {{ $visa->v_due }}/-
                                                            </td>
                                                        </tr>
                                                        <tr style="background:#ecfdf5;">
                                                            <td><b>Total Paid</b></td>
                                                            <td class="text-right text-success">
                                                                <b>{{ ($visa->v_c_price + $visa->v_vat + $visa->v_ait) - $visa->v_due }}/-</b>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- FOOTER --}}
                                        <div class="text-center mt-5" style="border-top:1px solid #e5e7eb; padding-top:15px;">
                                            <small style="color:#6b7280;">
                                                Thank you for choosing {{ $company->company_name }}. <br>
                                                This is a system generated invoice.
                                            </small>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{url('printWorkPermitInvoice?id='.$visa->id)}}" target="_blank" class="btn btn-warning float-right printMe">Print Invoice</a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
@endsection
