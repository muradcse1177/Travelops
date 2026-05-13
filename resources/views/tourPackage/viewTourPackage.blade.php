@extends('mainLayout.layout')
@section('title','Trip Designer || Tour Management')
@section('tourPackage','active')
@section('tourMenu','menu-open')
@section('content')
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Tour Package Management</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tour Package Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card card-warning">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Tour Package</h3>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <div id="printArea" class="p-4">

                                    {{-- Company Info --}}
                                    <div class="text-center mb-4">
                                        <h4><strong>Tour Package Invoice</strong></h4>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <img src="{{url($company->logo)}}" height="50" width="180">
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h5><strong>{{ $company->company_name }}</strong></h5>
                                            <p class="mb-1">Phone: {{ $company->company_pnone }}</p>
                                            <p class="mb-1">Email: {{ $company->company_email }}</p>
                                            <p class="mb-1">Address: {{ $company->address }}</p>
                                        </div>
                                    </div>

                                    <!-- Section Header -->
                                    <div class="p-2 px-3 mb-3 rounded shadow-sm" 
                                        style="background: #e9f2ff; border-left: 4px solid #007bff;">
                                        <h5 class="mb-0 text-primary">
                                            <i class="fas fa-angle-right mr-1 text-primary"></i> Package Details
                                        </h5>
                                    </div>


                                    <table class="table table-bordered">
                                        <tr><td><strong>Package Name</strong></td><td>{{ $package->title }}</td></tr>
                                        <tr><td><strong>Package Code</strong></td><td>{{ $package->p_code }}</td></tr>
                                        <tr><td><strong>Duration</strong></td><td>{{ $package->start_date }} to {{ $package->end_date }}</td></tr>
                                    </table>

                                    <!-- Section Header -->
                                    <div class="p-2 px-3 mb-3 rounded shadow-sm"
                                        style="background:#e9f2ff; border-left:4px solid #007bff;">
                                        <h5 class="mb-0 text-primary">
                                            <i class="fas fa-angle-right mr-1 text-primary"></i> Guest Details
                                        </h5>
                                    </div>

                                    @php $pax = json_decode($package->traveler); @endphp

                                    <table class="table table-bordered">
                                        @for($i=0; $i < $package->g_details; $i++)
                                            @php 
                                                $passenger = DB::table('passengers')->where('id', $pax[$i])->first(); 
                                            @endphp
                                            <tr>
                                                <th style="width:25%;">Guest {{ $i+1 }}</th>
                                                <td>{{ $passenger->f_name.' '.$passenger->l_name }}</td>
                                            </tr>
                                        @endfor
                                    </table>

                                    <!-- Section Header -->
                                    <div class="p-2 px-3 mb-3 rounded shadow-sm"
                                        style="background:#e9f2ff; border-left:4px solid #007bff;">
                                        <h5 class="mb-0 text-primary">
                                            <i class="fas fa-angle-right mr-1 text-primary"></i> Payment Summary
                                        </h5>
                                    </div>


                                    <table class="table table-bordered">
                                        <tr>
                                            <td rowspan="6">
                                                <p><strong>Payment Type:</strong> {{ $package->payment_type }}</p>
                                                <p><strong>Payment Details:</strong><br>{!! nl2br($package->pay_details) !!}</p>
                                            </td>
                                            <td class="text-right">Price</td>
                                            <td class="text-right">{{ $package->p_c_details }}/-</td>
                                        </tr>
                                        <tr><td class="text-right">VAT</td><td class="text-right">{{ $package->p_vat }}/-</td></tr>
                                        <tr><td class="text-right">AIT</td><td class="text-right">{{ $package->p_ait }}/-</td></tr>
                                        <tr><td class="text-right font-weight-bold text-primary">Grand Total</td>
                                            <td class="text-right font-weight-bold text-primary">{{ $package->p_c_details + $package->p_vat + $package->p_ait }}/-</td></tr>
                                        <tr><td class="text-right">Due</td><td class="text-right">{{ $package->due }}/-</td></tr>
                                        <tr><td class="text-right font-weight-bold text-danger">Paid</td>
                                            <td class="text-right font-weight-bold text-danger">{{ $package->p_c_details + $package->p_vat + $package->p_ait - $package->due }}/-</td></tr>
                                    </table>

                                    {{-- Dynamic Sections --}}
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

                                            <!-- Section Header -->
                                            <div class="mb-3 p-2 px-3 rounded shadow-sm"
                                                style="background:#e9f2ff; border-left:4px solid #007bff;">
                                                <h5 class="mb-0 text-primary">
                                                    <i class="fas fa-angle-right mr-1"></i> {{ $label }}
                                                </h5>
                                            </div>

                                            {{-- ================= DAY WISE ITINERARY ================= --}}
                                            @if($key === 'day_title')
                                                @php
                                                    $titles = json_decode($package->day_title, true);
                                                    $itin   = json_decode($package->dat_itinary, true);
                                                @endphp

                                                <table class="table table-bordered">
                                                    @foreach($titles as $i => $t)
                                                        <tr>
                                                            <th style="width:25%;">Day {{ $i+1 }}: {{ $t }}</th>
                                                            <td>
                                                                <ul style="list-style:none; padding-left:0; margin:0;">
                                                                    @foreach(explode("\n", $itin[$i] ?? '') as $line)
                                                                        @if(trim($line) !== '')
                                                                            <li class="mb-1">
                                                                                {{ $line }}
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>

                                            {{-- ================= INCLUSION / EXCLUSION / T&C / POLICY ================= --}}
                                            @elseif(in_array($key,$listKeys))
                                                @php
                                                    $raw   = json_decode($package->$key, true);
                                                    $clean = strip_tags($raw,'<div>');
                                                    $lines = array_values(array_filter(array_map('trim', explode('</div>', $clean))));
                                                @endphp

                                                {{-- TERMS & CONDITIONS --}}
                                                @if($key === 'p_tnt')
                                                    <ol class="pl-3">
                                                        @foreach($lines as $line)
                                                            @php $item = strip_tags($line); @endphp
                                                            @if($item !== '')
                                                                <li><strong>{{ trim(html_entity_decode($item)) }}</strong></li>
                                                            @endif
                                                        @endforeach
                                                    </ol>

                                                {{-- INCLUSIONS / EXCLUSIONS / POLICY --}}
                                                @else
                                                    <ul style="list-style:none; padding-left:0; margin:0;">
                                                        @foreach($lines as $line)
                                                            @php $item = strip_tags($line); @endphp
                                                            @if($item !== '')
                                                                <li class="mb-1">
                                                                    @if($key === 'p_exclusions')
                                                                        <i class="fas fa-times text-danger mr-2"></i>
                                                                    @else
                                                                        <i class="fas fa-check text-success mr-2"></i>
                                                                    @endif
                                                                    {{ trim(html_entity_decode($item)) }}
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            {{-- ================= SIMPLE CONTENT ================= --}}
                                            @else
                                                <p>{!! nl2br(json_decode($package->$key)) !!}</p>
                                            @endif
                                        @endif
                                    @endforeach


                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('printTourPackageInvoice?id='.$package->id) }}" target="_blank" class="btn btn-warning float-right">
                                    <i class="fas fa-print"></i> Print Invoice
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $('.select2').select2();
    $('.select2bs4').select2({ theme: 'bootstrap4' });
</script>
@endsection
