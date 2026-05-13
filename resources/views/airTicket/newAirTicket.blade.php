@extends('mainLayout.layout')
@section('title','Trip Designer || New Air Ticket')
@section('airTicket','active')
@section('newAirTicket','active')
@section('ticketMenu','menu-open')
@section('css')
<style>
    .ui-autocomplete {
    z-index: 999999 !important;
    background: #fff;
    max-width: 100% !important;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 5px 0;
    max-height: 300px;
    overflow-y: auto;
}

.ui-menu-item-wrapper {
    padding: 8px 12px;
    cursor: pointer;
}

.ui-state-active {
    background: #007bff !important;
    color: #fff !important;
    border: none !important;
}
</style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Air Ticket Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Air Ticket Management</li>
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
                                <h3 class="card-title">Add New Air Ticket</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                {{ Form::open(array('url' => 'createNewAirTicket',  'method' => 'post' ,'class' =>'form-horizontal','files' => true)) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Reservation PNR</label>
                                            <input type="text" class="form-control" id="reservation_pnr" name="reservation_pnr" placeholder="Enter Reservation PNR" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Airlines PNR</label>
                                            <input type="text" class="form-control" id="airline_pnr" name="airline_pnr" placeholder="Airlines Reservation PNR" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Issue Date</label>
                                            <input 
                                                type="text" 
                                                class="form-control datepicker-issue" 
                                                name="issue_date" 
                                                placeholder="YYYY-MM-DD" 
                                                required
                                            >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <select class="form-control select2bs4" name="vendor" id="vendor" style="width: 100%;" required>
                                                <option value="">Select Vendor Name</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{$vendor->name}}">{{$vendor->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Issued By(ticket)</label>
                                            <select class="form-control select2bs4" name="issued_by" id="issued_by" style="width: 100%;" required>
                                                <option value="">Select ticket Name</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->name}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Type</label>
                                            <select class="form-control select2bs4" name="f_type" id="f_type" style="width: 100%;" required>
                                                <option value="">Select Flight Type</option>
                                                <option value="One Way">One Way</option>
                                                <option value="Round Trip">Round Trip</option>
                                                <option value="Multi City">Multi City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Class</label>
                                            <select class="form-control select2bs4" name="f_class" id="f_class" style="width: 100%;" required>
                                                <option value="">Select Class</option>
                                                <option value="Economy">Economy</option>
                                                <option value="Business">Business</option>
                                                <option value="Premium Economy">Premium Economy</option>
                                                <option value="First Class">First Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card bg-light mb-3 border-left border-info">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-info">
                                                    <i class="fas fa-plane-departure mr-2"></i> Flight Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="text" class="form-control from" name="a_from[]" id="from" placeholder="From Airport" style="width: 100%;" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="text" class="form-control from" name="a_to[]" id="to" placeholder="To Airport" style="width: 100%;" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Departure</label>
                                            <div class="input-group date" id="d_time1" data-target-input="nearest">
                                                <input type="text" class="form-control datetime flight-departure" 
                                                    name="d_time[]" placeholder="Select Departure" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Arrival</label>
                                            <div class="input-group date" id="a_time1" data-target-input="nearest">
                                                <input type="text" class="form-control datetime flight-arrival" 
                                                    name="a_time[]" placeholder="Select Arrival" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Number</label>
                                            <input type="text" class="form-control" id="f_number" name="f_number[]" placeholder="Enter Flight Number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Airlines</label>
                                            <select class="form-control select2bs4 airline-select" name="airlines[]" style="width: 100%;" required>
                                                <option value="">Select Airlines</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label></label>
                                        <div class="form-group" style="margin-top: 8px;">
                                            <button type="button" class="btn btn-info btn-block add_more" id="ad_more" value="1">Add More Flight</button>
                                        </div>
                                    </div>
                                    <div class="after-add-more">

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
                                            <label>Passenger Number</label>
                                            <select class="form-control select2bs4" name="pax_number" id="pax_number" style="width: 100%;" required>
                                                <option value="">Select Passenger Number</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                                <option value="5">Five</option>
                                                <option value="6">Six</option>
                                                <option value="7">Seven</option>
                                                <option value="8">Eight</option>
                                                <option value="9">Nine</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 newPassenger">

                                    </div>
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
                                            <input type="number" class="form-control" id="a_price" name="a_price" min="1" placeholder="Enter Agent Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Price</label>
                                            <input type="number" class="form-control" id="c_price" name="c_price" min="1"  placeholder="Enter Client Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" id="vat" name="vat" min="0" value="0" placeholder="Enter VAT">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIT</label>
                                            <input type="number" class="form-control" id="ait" name="ait" min="0" value="0" placeholder="Enter AIT">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-warning">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-warning">
                                                    <i class="fas fa-credit-card mr-2"></i> Payment Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Payment Type</label>
                                            <select class="form-control select2bs4" name="payment_type" id="payment_type" style="width: 100%;" required>
                                                <option value="">Select Payment Type</option>
                                                @foreach($payment_types as $payment_type)
                                                    <option value="{{$payment_type->type}}">{{$payment_type->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Due Amount</label>
                                                <input type="number" class="form-control" id="due" name="due" min="0" value="0" placeholder="Enter Due Amount">
                                            </div>
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
                                            <textarea class="form-control" id="p_details" name="p_details" rows="5" placeholder="Write Payments Detail..." required></textarea>
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
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Air Ticket Filter</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{ Form::open(array('url' => 'filterAirTicket',  'method' => 'get' ,'class' =>'form-horizontal')) }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>PNR</label>
                                            <input type="text" class="form-control" name="pnr" placeholder="Enter PNR" value="{{@$_GET['pnr']}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="f_name" placeholder="Enter First Name" value="{{ @$_GET['f_name'] }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="l_name" placeholder="Enter Last Name" value="{{ @$_GET['l_name'] }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Date</label>
                                            <input type="text" 
                                                class="form-control datepicker-flat" 
                                                name="flight_date" 
                                                placeholder="Enter Flight Date"
                                                value="{{ @$_GET['flight_date'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Vendor</label>
                                            @if(!empty($vendors))
                                                <select class="form-control" name="vendor" id="vendor" style="width: 100%;">
                                                    <option value="">Select Vendor</option>
                                                    @foreach($vendors as $v)
                                                        <option value="{{ $v->name }}" @if(@$_GET['vendor'] == $v->name) selected @endif>
                                                            {{ $v->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input type="text" class="form-control" name="vendor" placeholder="Enter Vendor" value="{{ @$_GET['vendor'] }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Number</label>
                                            <input type="text" class="form-control" name="f_number" placeholder="e.g., EK585" value="{{ @$_GET['f_number'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>From Issue Date</label>
                                            <input type="text" 
                                                class="form-control datepicker-flat" 
                                                name="from_issue_date" 
                                                placeholder="Enter From Date"
                                                value="{{ @$_GET['from_issue_date'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>To Issue Date</label>
                                            <input type="text" 
                                                class="form-control datepicker-flat" 
                                                name="to_issue_date"  
                                                placeholder="Enter To Date"
                                                value="{{ @$_GET['to_issue_date'] }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Current Status</label>
                                            <select class="form-control" name="c_status" id="c_status" style="width: 100%;" >
                                                <option value="">Select From</option>
                                                <option value="Issued" @if(@$_GET['c_status'] == 'Issued') Selected @endif>Issued</option>
                                                <option value="Reissued" @if(@$_GET['c_status'] == 'Reissued') Selected @endif>Reissued</option>
                                                <option value="Refunded" @if(@$_GET['c_status'] == 'Refunded') Selected @endif>Refunded</option>
                                                <option value="Cancelled" @if(@$_GET['c_status'] == 'Cancelled') Selected @endif>Cancelled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Payment Status</label>
                                            <select class="form-control" name="p_status" id="p_status" style="width: 100%;" >
                                                <option value="">Select Payment Status</option>
                                                <option value="1" @if(@$_GET['p_status'] == '1') Selected @endif>Paid</option>
                                                <option value="2" @if(@$_GET['p_status'] == '2') Selected @endif>Due</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" align="right">
                                        <label></label>
                                        <div class="form-group" style="margin-top: 8px;">
                                            <button type="submit" class="btn btn-warning btn-block float-right">Filter</button>
                                        </div>
                                    </div><hr>
                                </div><br>
                                {{ Form::close() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-purple shadow-lg">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-ticket-alt mr-2"></i>
                                    Air Ticket Management
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="passTablea" class="table table-hover table-bordered table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 1%;">#</th>
                                            <th>Booking Info</th>
                                            <th>Passenger Details</th>
                                            <th class="text-center">Status</th>
                                            <th>Financials</th>
                                            @if(Session::get('user_role') < 3)
                                                <th class="text-center">Profit</th>
                                            @endif
                                            <th>Payment Files</th>
                                            <th class="text-center" style="width: 8%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            // Initializing counters and sums outside the loop
                                            $i = $tickets->firstItem(); // For correct numbering with pagination
                                            $sum_due = 0;
                                            $sum_a_price = 0;
                                            $sum_c_price = 0;
                                        @endphp
                                        @forelse($tickets as $ticket)
                                            @php
                                                // Calculations for clarity
                                                $client_price = $ticket->c_price + $ticket->vat + $ticket->ait;
                                                $profit = $client_price - $ticket->a_price;

                                                // Accumulate totals
                                                $sum_due += $ticket->due_amount;
                                                $sum_a_price += $ticket->a_price;
                                                $sum_c_price += $client_price;
                                            @endphp
                                            <tr>
                                                <td class="text-center font-weight-bold">{{ $i++ }}</td>
                                                <td>
                                                    <div class="mb-2">
                                                        <i class="far fa-calendar-alt text-muted mr-1"></i>
                                                        <strong>Date:</strong> {{ \Carbon\Carbon::parse($ticket->issue_date)->format('d M, Y') }}
                                                    </div>
                                                    <div class="mb-1">
                                                        <i class="fas fa-plane-departure text-muted mr-1"></i>
                                                        <strong>Airline PNR:</strong> <span class="text-primary font-weight-bold text-monospace">{{ $ticket->airline_pnr }}</span>
                                                    </div>
                                                    <div class="mb-1">
                                                        <i class="fas fa-barcode text-muted mr-1"></i>
                                                        <strong>Reservation PNR:</strong> <span class="text-monospace">{{ $ticket->reservation_pnr }}</span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-store text-muted mr-1"></i>
                                                        <strong>Vendor:</strong> <span class="badge badge-light p-1">{{ $ticket->vendor }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{--
                                                        PERFORMANCE NOTE: This is an "N+1 Query Problem". You are running a DB query for each passenger inside a loop.
                                                        It's highly recommended to use Eloquent Relationships and Eager Loading in your controller.
                                                        Example in Controller: $tickets = Ticket::with('passengers')->paginate(10);
                                                        Then in the view, you can just loop through $ticket->passengers.
                                                    --}}
                                                    @php
                                                        $paxList = json_decode($ticket->pax_name);
                                                        $phone = ''; // Default phone
                                                        $passengers = DB::table('passengers')->whereIn('id', $paxList)->where('upload_by', Session::get('agent_id'))->get();
                                                        if ($passengers->isNotEmpty()) {
                                                            $phone = $passengers->first()->phone;
                                                        }
                                                    @endphp
                                                    <ul class="list-unstyled mb-2">
                                                        @foreach($passengers as $pax)
                                                            <li><i class="fas fa-user text-muted mr-2"></i>{{ $pax->f_name . ' ' . $pax->l_name }}</li>
                                                        @endforeach
                                                    </ul>
                                                    @if($phone)
                                                        <div><i class="fas fa-phone-alt text-muted mr-2"></i><strong>{{ $phone }}</strong></div>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span class="badge badge-lg
                                                        @if($ticket->status == 'Issued') badge-success @m_else
                                                        @elseif($ticket->status == 'Refunded') badge-info @m_else
                                                        @elseif($ticket->status == 'Cancelled') badge-danger @m_else
                                                        @elseif($ticket->status == 'Reissued') badge-warning @m_else
                                                        badge-secondary @endif">
                                                        <i class="fas
                                                            @if($ticket->status == 'Issued') fa-check-circle @m_else
                                                            @elseif($ticket->status == 'Refunded') fa-undo-alt @m_else
                                                            @elseif($ticket->status == 'Cancelled') fa-times-circle @m_else
                                                            @elseif($ticket->status == 'Reissued') fa-exchange-alt @m_else
                                                            fa-question-circle @endif
                                                            mr-1"></i>
                                                        {{ $ticket->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="p-2" style="min-width: 170px;">

                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-muted">Agent</span>
                                                            <span class="font-weight-bold text-primary">
                                                                {{ number_format($ticket->a_price) }}/-
                                                            </span>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-muted">Client</span>
                                                            <span class="font-weight-bold text-info">
                                                                {{ number_format($client_price) }}/-
                                                            </span>
                                                        </div>

                                                        <hr class="my-2">

                                                        @if((int) $ticket->due_amount > 0)
                                                            <div class="d-flex justify-content-between">
                                                                <span class="text-danger font-weight-bold">Due</span>
                                                                <span class="font-weight-bold text-danger">
                                                                    {{ number_format($ticket->due_amount) }}/-
                                                                </span>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-between">
                                                                <span class="text-success font-weight-bold">Paid</span>
                                                                <span class="font-weight-bold text-success">
                                                                    0/-
                                                                </span>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </td>
                                                @if(Session::get('user_role') < 3)
                                                    <td class="text-center align-middle">
                                                        <h5 class="mb-0 font-weight-bold {{ $profit >= 0 ? 'text-success' : 'text-danger' }}">
                                                            {{ number_format($profit) }}/-
                                                        </h5>
                                                    </td>
                                                @endif
                                                <td>
                                                    @php
                                                        $clientFiles = json_decode($ticket->payment_files, true) ?? [];
                                                        $vendorFiles = json_decode($ticket->vendor_payment_files, true) ?? [];
                                                    @endphp

                                                    @if (count($clientFiles) > 0)
                                                        <div class="mb-2">
                                                            <span class="badge badge-primary"><i class="fas fa-user mr-1"></i> Client Payment</span>
                                                            <ul class="pl-3 mb-0">
                                                                @foreach ($clientFiles as $index => $file)
                                                                    <li>
                                                                        <a href="{{ $file }}"
                                                                           target="_blank"
                                                                           class="text-primary"
                                                                           title="View Client File {{ $index + 1 }}">
                                                                            <i class="fas fa-file-alt"></i> Payment {{ $index + 1 }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if (count($vendorFiles) > 0)
                                                        <div>
                                                            <span class="badge badge-warning text-dark"><i class="fas fa-truck mr-1"></i> Vendor Payment</span>
                                                            <ul class="pl-3 mb-0">
                                                                @foreach ($vendorFiles as $index => $file)
                                                                    <li>
                                                                        <a href="{{ $file }}"
                                                                           target="_blank"
                                                                           class="text-warning"
                                                                           title="View Vendor File {{ $index + 1 }}">
                                                                            <i class="fas fa-file-invoice"></i> Payment {{ $index + 1 }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if (count($clientFiles) === 0 && count($vendorFiles) === 0)
                                                        <span class="badge badge-secondary">No Files</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fas fa-cog"></i> <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('viewTicket?id=' . $ticket->id) }}">
                                                                <i class="fas fa-eye text-info mr-2"></i>View Details
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('editTicketPage?id=' . $ticket->id) }}">
                                                                <i class="fas fa-edit text-warning mr-2"></i>Edit Ticket
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('editPaymentStatus?id=' . $ticket->id) }}">
                                                                <i class="fas fa-money-check-alt text-success mr-2"></i>Update Payment
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('makeAirTicketInvoice?id=' . $ticket->id) }}">
                                                                <i class="fas fa-money-bill text-primary mr-2"></i>Make Invoice
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-id="{{ $ticket->id }}" data-toggle="modal" data-target="#smsModal{{ $ticket->id }}">
                                                                <i class="fas fa-sms text-secondary mr-2"></i>Send SMS
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item delete" href="#" data-id="{{ $ticket->id }}" data-toggle="modal" data-target="#modal-danger">
                                                                <i class="fas fa-trash-alt text-danger mr-2"></i>Delete Ticket
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <div class="modal fade" id="smsModal{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="smsModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document"> <!-- Centered Modal -->
                                                        <div class="modal-content">
                                                            <form action="{{ url('sendSms-AirTicket') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $ticket->id }}">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="smsModalLabel">Send SMS Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to send SMS for this ticket?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Yes, Send SMS</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ Session::get('user_role') < 3 ? '8' : '6' }}" class="text-center py-4">
                                                    <i class="fas fa-exclamation-triangle fa-2x text-warning mb-2"></i>
                                                    <p>No tickets found.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>

                                        {{-- Only show footer if there are tickets and user is admin/superadmin --}}
                                        @if($tickets->isNotEmpty() && Session::get('user_role') < 3)
                                            <tfoot class="bg-light">
                                            <tr>
                                                <th colspan="4" class="text-right"><h5>Grand Totals:</h5></th>
                                                <th>
                                                    <div class="card card-light p-2 mb-0" style="min-width: 180px;">
                                                        
                                                        <div class="d-flex justify-content-between">
                                                            <small class="text-muted">Agent</small>
                                                            <span class="font-weight-bold text-primary">
                                                                {{ number_format($sum_a_price) }}/-
                                                            </span>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <small class="text-muted">Client</small>
                                                            <span class="font-weight-bold text-info">
                                                                {{ number_format($sum_c_price) }}/-
                                                            </span>
                                                        </div>

                                                        <hr class="my-2">

                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-danger font-weight-bold">
                                                                Total Due
                                                            </span>
                                                            <span class="font-weight-bold text-danger">
                                                                {{ number_format($sum_due) }}/-
                                                            </span>
                                                        </div>

                                                    </div>
                                                </th>
                                                <th class="text-center align-middle">
                                                    <h5 class="text-success font-weight-bold">{{ number_format($sum_c_price - $sum_a_price) }}/-</h5>
                                                </th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{-- Render pagination links --}}
                                    {{ $tickets->links() }}
                                </div>
                            </div>

                            <!-- SMS Confirmation Modal -->
                            <div class="modal fade" id="smsModal{{ @$ticket->id }}" tabindex="-1" aria-labelledby="smsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ url('sendSms') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ @$ticket->id }}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="smsModalLabel">Send SMS Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to send SMS for this ticket?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Yes, Send SMS</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                {{-- Ensure you have this modal defined somewhere on your page for the delete button --}}
                <div class="modal fade" id="modal-danger">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-body">
                                <p style="text-align: center; font-size: 25px;">Are You Sure!!</p>
                            </div>
                            {{ Form::open(array('url' => 'deleteAirTicket',  'method' => 'post')) }}
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
            </div>
            <!-- /.container-fluid -->
        </section>
        <script id="passenger-options" type="text/template">
            @foreach($passengerss as $passenger)
                <option value="{{ $passenger->id }}">{{ $passenger->f_name }} {{ $passenger->l_name }}</option>
            @endforeach
        </script>
    </div>
@endsection
@section('js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('.id').val(id);
        });
        flatpickr(".datepicker-issue", {
            dateFormat: "Y-m-d",
            maxDate: "today",
        });
        flatpickr(".datepicker-flat", {
            dateFormat: "Y-m-d"
        });
        function initDatePickers() {
            flatpickr(".flight-departure", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: false
            });

            flatpickr(".flight-arrival", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: false
            });
        }

        // Initial load
        initDatePickers();

        $(document).ready(function () {
            $('#pax_number').on('change', function () {
                var pax_value = this.value;
                $('.feedback').remove();
                var options = $('#passenger-options').html(); // ✅ Get pre-rendered <option> list
                //alert(options);
                var html = '<div class="row feedback">';

                for (var i = 0; i < pax_value; i++) {
                    var pax_name = 'pax_name' + i;

                    html += '<div class="col-md-4">' +
                        '<div class="form-group">' +
                        '<label>Passengers</label>' +
                        '<select class="form-control select2bs4" name="pax_name[]" id="' + pax_name + '" style="width: 100%;" required>' +
                        '<option value="">Select Passenger Name</option>' + options +
                        '</select>' +
                        '</div>' +
                        '</div>';

                    html += '<div class="col-sm-4">' +
                        '<div class="form-group">' +
                        '<label>Ticket Number</label>' +
                        '<input type="text" class="form-control" name="t_number[]" placeholder="Enter Ticket Number" required>' +
                        '</div>' +
                        '</div>';

                    html += '<div class="col-sm-4">' +
                        '<div class="form-group">' +
                        '<label>Luggage</label>' +
                        '<input type="text" class="form-control" name="luggage[]" placeholder="Enter Luggage" required>' +
                        '</div>' +
                        '</div>';
                }

                html += '</div>';

                $('.newPassenger').append(html);

                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                });
            });
        });

        $("body").on("click",".add_more",function(){
            var val = $('#ad_more').val();
            val = parseInt(val) + 1;
            $('#ad_more').val(val)
            var from = 'from' + val.toString();
            var to = 'to' + val.toString();
            var d_time  = 'd_time' + val.toString();
            var a_time = 'a_time'  + val.toString();
            var airline = 'airline'  + val.toString();
            var html = '';
            html += '<div class="row inputFormRow" style="margin-left: 5px;">';

            // From
            html += '<div class="col-sm-3">';
            html += '  <div class="form-group">';
            html += '      <label>From</label>';
            html += '      <input type="text" class="form-control from" name="a_from[]" placeholder="From Airport" required>';
            html += '  </div>';
            html += '</div>';

            // To
            html += '<div class="col-sm-3">';
            html += '  <div class="form-group">';
            html += '      <label>To</label>';
            html += '      <input type="text" class="form-control from" name="a_to[]" placeholder="To Airport" required>';
            html += '  </div>';
            html += '</div>';

            // Departure (Flatpickr)
            html += '<div class="col-sm-3">';
            html += '  <div class="form-group">';
            html += '      <label>Departure</label>';
            html += '      <input type="text" class="form-control datetime flight-departure" name="d_time[]" placeholder="Select Departure" required>';
            html += '  </div>';
            html += '</div>';

            // Arrival (Flatpickr)
            html += '<div class="col-sm-3">';
            html += '  <div class="form-group">';
            html += '      <label>Arrival</label>';
            html += '      <input type="text" class="form-control datetime flight-arrival" name="a_time[]" placeholder="Select Arrival" required>';
            html += '  </div>';
            html += '</div>';

            // Flight Number
            html += '<div class="col-sm-3">';
            html += '  <div class="form-group">';
            html += '      <label>Flight Number</label>';
            html += '      <input type="text" class="form-control" name="f_number[]" placeholder="Enter Flight Number" required>';
            html += '  </div>';
            html += '</div>';

            // Airlines (AJAX Select2)
            html += '<div class="col-sm-3">';
            html += '  <div class="form-group">';
            html += '      <label>Airlines</label>';
            html += '      <select class="form-control airline-select" name="airlines[]" required>';
            html += '          <option value="">Search Airlines</option>';
            html += '      </select>';
            html += '  </div>';
            html += '</div>';

            // Remove Button
            html += '<div class="col-sm-2">';
            html += '  <label></label>';
            html += '  <div class="form-group" style="margin-top: 8px;">';
            html += '      <button type="button" class="btn btn-warning btn-block removeFlight">Remove Flight</button>';
            html += '  </div>';
            html += '</div>';

            html += '</div>'; // END ROW

            $('.after-add-more').append(html);
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
            $(".from").autocomplete({
                source: function (request, response) {
                    if (request.term.length >= 3) {
                        $.ajax({
                            url: "{{ url('/search-airport') }}",
                            type: "GET",
                            data: { term: request.term },
                            success: function (data) {
                                response(data);
                            }
                        });
                    }
                },
                minLength: 3,
                select: function (event, ui) {
                    $(this).val(ui.item.value);
                },
                open: function(event, ui) {
                    // set width same as input
                    var inputWidth = $(this).outerWidth();
                    $(".ui-autocomplete").css("width", inputWidth + "px");
                }
            });
            initAirlineSelect('.airline-select');
            initDatePickers();
        });
        $(document).on('click', '.removeFlight', function () {
            $(this).closest('.inputFormRow').remove();
        });
        $(".from").autocomplete({
            source: function (request, response) {
                if (request.term.length >= 3) {
                    $.ajax({
                        url: "{{ url('/search-airport') }}",
                        type: "GET",
                        data: { term: request.term },
                        success: function (data) {
                            response(data);
                        }
                    });
                }
            },
            minLength: 3,
            select: function (event, ui) {
                $(this).val(ui.item.value);
            },
            open: function(event, ui) {
                // set width same as input
                var inputWidth = $(this).outerWidth();
                $(".ui-autocomplete").css("width", inputWidth + "px");
            }
        });
        function initAirlineSelect(selector) {
            $(selector).select2({
                theme: 'bootstrap4',
                placeholder: "Search Airlines",
                minimumInputLength: 2,
                ajax: {
                    url: "{{ url('/search-airlines') }}",
                    dataType: 'json',
                    delay: 200,
                    data: function(params) {
                        return { term: params.term };
                    },
                    processResults: function(data) {
                        return { results: data };
                    }
                }
            });
        }

        // First airlines dropdown load
        initAirlineSelect('.airline-select');

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
