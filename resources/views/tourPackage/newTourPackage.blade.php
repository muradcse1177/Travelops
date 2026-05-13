@extends('mainLayout.layout')
@section('title','Trip Designer || Tour Package')
@section('tourPackage','active')
@section('newTourPackage','active')
@section('tourMenu','menu-open')
@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{url('/public/plugins/summernote/summernote-bs4.min.css')}}">
<!-- CodeMirror -->
<link rel="stylesheet" href="{{url('/public/plugins/codemirror/codemirror.css')}}">
<link rel="stylesheet" href="{{url('/public/plugins/codemirror/theme/monokai.css')}}">
<!-- SimpleMDE -->
<link rel="stylesheet" href="{{url('/public/plugins/simplemde/simplemde.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tour Package Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tour Package Management</li>
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
                        <div class="card card-warning collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Tour Package</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                {{ Form::open(['url' => 'createNewTourPackage', 'method' => 'post', 'class' => 'form-horizontal','files' => true]) }}
                                {{ csrf_field() }}

                                <div class="card-body row">
                                    {{-- Basic Info --}}
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select2bs4" name="country" required>
                                                <option value="">Select Country Name</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Package Name</label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter Package Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Package Code</label>
                                            <input type="text" class="form-control" name="p_code" placeholder="Enter Package Code" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Package Night</label>
                                            <select class="form-control select2bs4 night" name="night" required>
                                                <option value="">Select Package Night</option>
                                                @for($n = 1; $n <= 20; $n++)
                                                    <option value="{{ $n }}">{{ $n }} Night</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Dates --}}
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="input-group date" id="start_date" data-target-input="nearest">
                                                <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#start_date" placeholder="Enter Start Date" required>
                                                <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <div class="input-group date" id="end_date" data-target-input="nearest">
                                                <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#end_date" placeholder="Enter End Date" required>
                                                <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Vendor & Guests --}}
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Vendors</label>
                                            <select class="form-control select2bs4" name="vendor" required>
                                                <option value="">Select Vendor</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{ $vendor->name }}">{{ $vendor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-primary">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-primary">
                                                    <i class="fas fa-users mr-2"></i> Passenger Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Guest Number</label>
                                            <select class="form-control select2bs4" name="pax_number" id="pax_number" required>
                                                <option value="">Select</option>
                                                @for($g = 1; $g <= 10; $g++)
                                                    <option value="{{ $g }}">{{ ucfirst(numfmt_format($fmt = numfmt_create('en', NumberFormatter::SPELLOUT), $g)) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Dynamic Passenger Section --}}
                                    <div class="col-sm-12 newPassenger" style="display: none;"></div>

                                    {{-- Pricing --}}
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-success">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-success">
                                                    <i class="fas fa-dollar-sign mr-2"></i> Price Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Agent Price</label>
                                            <input type="number" class="form-control" name="a_price" min="1" placeholder="Enter Agent Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Price</label>
                                            <input type="number" class="form-control" name="c_price" min="1" placeholder="Enter Client Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" name="vat" min="0" value="0" placeholder="Enter VAT">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIT</label>
                                            <input type="number" class="form-control" name="ait" min="0" value="0" placeholder="Enter AIT">
                                        </div>
                                    </div>

                                    {{-- Highlights --}}
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-success">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-warning">
                                                    <i class="fas fa-suitcase-rolling mr-2"></i> Tour Package Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 highlights">
                                        <div class="form-group">
                                            <label>Package Highlights</label>
                                            <textarea class="summernote" name="highlights">Place Write Here...</textarea>
                                        </div>
                                    </div>

                                    {{-- Dynamic Day Plan Section --}}
                                    <div class="col-12" id="itinerary-rows" style="display: none;"></div>

                                    {{-- Rich Text Details --}}
                                    @foreach ([
                                        'p_inclusions' => 'Package Inclusions',
                                        'p_exclusions' => 'Package Exclusions',
                                        'p_tnt' => 'Terms and Conditions',
                                        'p_cancel' => 'Cancellation Policies'
                                    ] as $name => $label)
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>{{ $label }}</label>
                                                <textarea class="summernote" name="{{ $name }}">Place Write Here...</textarea>
                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- Payment Section --}}
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-warning">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-info">
                                                    <i class="fas fa-credit-card mr-2"></i> Payment Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Payment Type</label>
                                            <select class="form-control select2bs4" name="payment_type" required>
                                                <option value="">Select Payment Type</option>
                                                @foreach($payment_types as $type)
                                                    <option value="{{ $type->type }}">{{ $type->type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Client Due Amount</label>
                                            <input type="number" class="form-control" name="due" min="0" value="0" placeholder="Enter Client Due Amount">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Vendor Due Amount</label>
                                            <input type="number" class="form-control" name="vendor_due" min="0" value="0" placeholder="Enter Vendor Due Amount">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-primary">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-primary">
                                                    <i class="fas fa-hand-holding-usd mr-2"></i> Client Price & Payment Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Client Payments Details</label>
                                            <textarea class="form-control" id="pay_details" name="pay_details" rows="5" placeholder="Write Payments Detail..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Upload Client Payment Files</label>
                                            <div id="clientFileInputs">
                                                <div class="input-group mb-2">
                                                    <input type="file" name="payment_files[]" accept=".jpg, .jpeg, .png" class="form-control">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success btn-add-client-file" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-warning">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-warning">
                                                    <i class="fas fa-truck-loading mr-2"></i> Vendor Payment Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Vendor Payment Details</label>
                                            <textarea class="form-control" id="vendor_p_details" name="vendor_p_details" rows="5" placeholder="Write Vendor Payment Details..." required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Upload Vendor Payment Files</label>
                                            <div id="vendorFileInputs">
                                                <div class="input-group mb-2">
                                                    <input type="file" name="vendor_payment_files[]" accept=".jpg, .jpeg, .png" class="form-control">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success btn-add-vendor-file" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning float-right">Save</button>
                                </div>

                                {{ Form::close() }}

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{-- ===== Filter Form (place above the table) ===== --}}
                        <div class="card mb-3" style="border-color:#0f9aa7">
                            <div class="card-header" style="background:#0f9aa7;color:#fff;">
                                <h3 class="card-title mb-0">Package Filter</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="{{ url()->current() }}">
                                    <div class="form-row">
                                        {{-- Row 1 --}}
                                        <div class="form-group col-md-3">
                                            <label>Country</label>
                                            <select class="form-control select2bs4" name="country">
                                                <option value="">Select Country Name</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->name }}" {{ request('country') == $country->name ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Start Date</label>
                                            <div class="input-group date" id="f_start_date" data-target-input="nearest">
                                                <input type="text" name="start_date" class="form-control datetimepicker-input"
                                                       data-target="#f_start_date" placeholder="Enter From Date" value="{{ request('start_date') }}" autocomplete="off">
                                                <div class="input-group-append" data-target="#f_start_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>End Date</label>
                                            <div class="input-group date" id="f_end_date" data-target-input="nearest">
                                                <input type="text" name="end_date" class="form-control datetimepicker-input"
                                                       data-target="#f_end_date" placeholder="Enter To Date" value="{{ request('end_date') }}" autocomplete="off">
                                                <div class="input-group-append" data-target="#f_end_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Vendor</label>
                                            <select name="vendor" class="form-control select2bs4">
                                                <option value="">Select Vendor</option>
                                                @foreach($vendors as $v)
                                                    <option value="{{ $v->name }}" {{ request('vendor')==$v->name?'selected':'' }}>{{ $v->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- Row 2 --}}
                                        <div class="form-group col-md-3">
                                            <label>First Name</label>
                                            <input name="first_name" value="{{ request('first_name') }}" class="form-control" placeholder="Enter First Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Last Name</label>
                                            <input name="last_name" value="{{ request('last_name') }}" class="form-control" placeholder="Enter Last Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Package Code</label>
                                            <input name="p_code" value="{{ request('p_code') }}" class="form-control" placeholder="e.g., PKG-001">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Payment Status</label>
                                            <select name="payment_status" class="form-control">
                                                <option value="">Select Payment Status</option>
                                                <option value="paid" {{ request('payment_status')=='paid'?'selected':'' }}>Paid</option>
                                                <option value="due"  {{ request('payment_status')=='due'?'selected':'' }}>Due</option>
                                            </select>
                                        </div>
                                        {{-- Row 3 --}}
                                        <div class="form-group col-md-3 d-flex align-items-end">
                                            <button class="btn btn-warning btn-block"><i class="fas fa-search mr-1"></i> Filter</button>
                                        </div>
                                        <div class="form-group col-md-3 d-flex align-items-end">
                                            <a href="{{ url()->current() }}" class="btn btn-danger btn-block">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- ===== /Filter Form ===== --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Air package Management</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-hover">
                                        <thead class="bg-gradient-primary text-white">
                                        <tr>
                                            <th>Booking Info</th>
                                            <th>Passenger Details</th>
                                            <th>Status</th>
                                            <th>Financials</th>
                                            <th>Profit</th>
                                            <th>Payment Files</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                            $j=1;
                                        @endphp
                                        @foreach($packages as $package)
                                            @php
                                                $passengers = json_decode($package->traveler);
                                                $clientFiles = json_decode($package->payment_files, true) ?? [];
                                                $vendorFiles = json_decode($package->vendor_payment_files, true) ?? [];
                                                $totalCost = $package->p_c_details + $package->p_vat + $package->p_ait;
                                                $profit = $totalCost - $package->p_a_price;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <strong>Date:</strong> {{ $package->date }}<br>
                                                    <strong>Country:</strong> {{ $package->p_countries }}<br>
                                                    <strong>Package:</strong> {{ $package->title }}<br>
                                                    <small class="text-muted">Code: {{ $package->p_code }}</small>
                                                </td>
                                                <td>
                                                    @php $j = 1; @endphp
                                                    @foreach($passengers as $pid)
                                                        @php
                                                            $passenger = DB::table('passengers')->where('id', $pid)->where('upload_by', Session::get('agent_id'))->first();
                                                        @endphp
                                                        @if($passenger)
                                                            <div>{{ $j++ }}. {{ $passenger->f_name }} {{ $passenger->l_name }}</div>
                                                        @endif
                                                    @endforeach
                                                    <div class="text-muted small">Phone: {{ @$passenger->phone }}</div>
                                                </td>
                                                <td>
                                                    @if((int)$package->due > 0)
                                                        <span class="badge badge-danger">Cient Due: {{ $package->due }}</span>
                                                    @else
                                                        <span class="badge badge-success">Client Paid</span>
                                                    @endif
                                                    @if((int)$package->vendor_due > 0)
                                                        <span class="badge badge-danger">Vendor Due: {{ $package->vendor_due }}</span>
                                                    @else
                                                        <span class="badge badge-success">Vendor Paid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Agent: {{ $package->p_a_price }}</span><br>
                                                    <span class="badge badge-warning">Client: {{ $totalCost }}</span>
                                                </td>
                                                <td>
                                                    @if($profit > 0)
                                                        <span class="badge badge-success">{{ $profit }}</span>
                                                    @elseif($profit < 0)
                                                        <span class="badge badge-danger">{{ $profit }}</span>
                                                    @else
                                                        <span class="badge badge-secondary">0</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(count($clientFiles))
                                                        <div class="mb-1">
                                                            <span class="badge badge-primary"><i class="fas fa-user"></i> Client Payment </span>
                                                            <ul class="pl-3 small mb-0">
                                                                @foreach($clientFiles as $index => $file)
                                                                    <li><a href="{{ $file }}" target="_blank"><i class="fas fa-file-alt"></i> Payment {{ $index + 1 }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if(count($vendorFiles))
                                                        <div>
                                                            <span class="badge badge-warning text-dark"><i class="fas fa-truck"></i> Vendor Payment</span>
                                                            <ul class="pl-3 small mb-0">
                                                                @foreach($vendorFiles as $index => $file)
                                                                    <li><a href="{{ $file }}" target="_blank"><i class="fas fa-file-invoice"></i> Payment {{ $index + 1 }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if(count($clientFiles) === 0 && count($vendorFiles) === 0)
                                                        <span class="badge badge-secondary">No Files</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm">Actions</button>
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('viewTourPackage?id=' . $package->id) }}">
                                                                <i class="fas fa-eye text-primary"></i> View
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('editPackagePage?id=' . $package->id) }}">
                                                                <i class="fas fa-edit text-warning"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('editTourPackagePayment?id=' . $package->id) }}">
                                                                <i class="fas fa-money-check-alt text-success"></i> Edit Payment
                                                            </a>
                                                            <a class="dropdown-item text-danger delete" data-id="{{ $package->id }}" data-toggle="modal" data-target="#modal-danger">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    {{ $packages->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body">
                            <p style="text-align: center; font-size: 25px;">Are You Sure!!</p>
                        </div>
                        {{ Form::open(array('url' => 'deleteTourPackage',  'method' => 'post')) }}
                        {{ csrf_field() }}
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" class="id">
                            <button type="submit" class="btn btn-outline-light">Delete</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </section>
    </div>
    @php
        $rows4 = DB::table('passengers')
                  ->where('deleted',0)
                  ->where('upload_by',Session::get('agent_id'))
                  ->orderBy('id','desc')
                  ->get();
           $passengerOptions = '';
            foreach ($rows4 as $row) {
                $passengerOptions .= '<option value="' . $row->id . '">' . $row->f_name . ' ' . $row->l_name . '</option>';
            }
    @endphp
@endsection
@section('js')
    <!-- Summernote -->
    <script src="{{url('/public/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- CodeMirror -->
    <script src="{{url('/public/plugins/codemirror/codemirror.js')}}"></script>
    <script src="{{url('/public/plugins/codemirror/mode/css/css.js')}}"></script>
    <script src="{{url('/public/plugins/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{url('/public/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <script>
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })
        $('#start_date,#end_date').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $('#f_start_date,#f_end_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('.id').val(id);
        });
        $(function () {
            $('.summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
        $('#pax_number').on('change', function () {
            var pax_value = parseInt(this.value);
            $('.feedback').remove();
            var html = '<div class="row feedback">';
            var options = `{!! $passengerOptions !!}`; // Blade-rendered HTML

            for (var i = 0; i < pax_value; i++) {
                var pax_name = 'pax_name' + i;
                html += `
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Passenger</label>
                        <select class="form-control select2bs4" name="pax_name[]" id="${pax_name}" required style="width: 100%;">
                            <option value="">Select Passenger Name</option>
                            ${options}
                        </select>
                    </div>
                </div>`;
            }

            html += '</div>';
            $('.newPassenger').append(html).show();

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });

        $('.night').on('change', function () {
            var night = parseInt($(this).val());
            var day = night + 1;
            var html = '';

            for (var i = 0; i < day; i++) {
                html += `
                <div class="col-12">
                  <div class="card card-outline card-success mb-3">
                    <div class="card-header">
                      <h5 class="card-title">Day ${i + 1} Details</h5>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="d_title_${i}">Day Title</label>
                        <input type="text" class="form-control" name="d_title[]" id="d_title_${i}" placeholder="Enter Title" required>
                      </div>
                      <div class="form-group">
                        <label for="description_${i}">Day Description</label>
                        <textarea class="form-control" name="description[]" id="description_${i}" rows="3" placeholder="Enter Description" required></textarea>
                      </div>
                    </div>
                  </div>
                </div>`;
            }

            $('#itinerary-rows').show().html('<div class="row">' + html + '</div>');
        });


        $(document).ready(function () {
            // Add more client file input
            $('#clientFileInputs').on('click', '.btn-add-client-file', function () {
                const newInput = `
                <div class="input-group mb-2">
                    <input type="file" name="payment_files[]" accept=".jpg, .jpeg, .png" class="form-control" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger btn-remove-file" type="button">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>`;
                $('#clientFileInputs').append(newInput);
            });

            // Add more vendor file input
            $('#vendorFileInputs').on('click', '.btn-add-vendor-file', function () {
                const newInput = `
                <div class="input-group mb-2">
                    <input type="file" name="vendor_payment_files[]" accept=".jpg, .jpeg, .png" class="form-control" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger btn-remove-file" type="button">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>`;
                $('#vendorFileInputs').append(newInput);
            });

            // Remove file input (shared for both)
            $(document).on('click', '.btn-remove-file', function () {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endsection
