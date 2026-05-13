@extends('mainLayout.layout')
@section('title','Trip Designer || Visa Processing')
@section('newVisaProcess','active')
@section('visa','active')
@section('visaMenu','menu-open')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Visa Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Visa Management</li>
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
                                <h3 class="card-title">Add New Visa </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                {{ Form::open(['url' => 'createNewVisa', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Country Name</label>
                                            <select class="form-control select2bs4" name="c_name" id="c_name" style="width: 100%;" required>
                                                <option value="">Select Country Name</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date" id="dob" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#dob" name="date" placeholder="Enter Date" required/>
                                                <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
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
                                            <label>Issued By ( Employee ) </label>
                                            <select class="form-control select2bs4" name="issued_by" id="issued_by" style="width: 100%;" required>
                                                <option value="">Select Employee Name</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->name}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Status</label>
                                            <select class="form-control select2bs4" name="status" id="status" style="width: 100%;" required>
                                                <option value="">Select Status Type</option>
                                                <option value="Received">Received</option>
                                                <option value="On Process">On Process</option>
                                                <option value="Submitted">Submitted</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Docs Required">Docs Required</option>
                                                <option value="Delivered">Delivered</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Visa Service Details</label>
                                            <input type="text" class="form-control" id="s_details" name="s_details" placeholder="Enter Visa Service Details" required>
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
                                    <div class="col-sm-4 ">
                                        <div class="form-group">
                                            <label>Passenger Number</label>
                                            <select class="form-control select2bs4" name="pax_number" id="pax_number" style="width: 100%;" required>
                                                <option value="">Select From</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                                <option value="5">Five</option>
                                                <option value="6">Six</option>
                                                <option value="7">Seven</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 newPassenger"></div>
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

                        {{-- ⭐ NEW BEAUTIFUL FILTER CARD --}}
                        <div class="card card-primary shadow-sm mb-3">
                            <div class="card-header">
                                <h3 class="card-title text-white">
                                    <i class="fas fa-filter"></i> Filter Visa Records
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                {{ Form::open(['url' => 'filter-visa', 'method' => 'get', 'class' => 'form-horizontal']) }}

                                <div class="row">

                                    {{-- Country Name --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fas fa-flag mr-1"></i> Country Name</label>
                                            <select class="form-control select2bs4" name="c_name">
                                                <option value="">Select Country Name</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->name }}" {{ request('c_name') == $country->name ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- From Date --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fas fa-calendar-alt mr-1"></i> From Date</label>
                                            <input type="date" class="form-control" name="from_date" value="{{ request('from_date') }}">
                                        </div>
                                    </div>

                                    {{-- To Date --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fas fa-calendar-check mr-1"></i> To Date</label>
                                            <input type="date" class="form-control" name="to_date" value="{{ request('to_date') }}">
                                        </div>
                                    </div>

                                    {{-- Visa Status --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fas fa-passport mr-1"></i> Visa Status</label>
                                            <select class="form-control" name="visa_status">
                                                <option value="">-- All --</option>
                                                @foreach(['Received','On Process','Submitted','Approved','Cancelled','Docs Required','Delivered'] as $status)
                                                    <option value="{{ $status }}" {{ request('visa_status') == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Payment Status --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fas fa-credit-card mr-1"></i> Payment Status</label>
                                            <select class="form-control" name="payment_status">
                                                <option value="">-- All --</option>
                                                <option value="Paid" {{ request('payment_status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                                <option value="Due" {{ request('payment_status') == 'Due' ? 'selected' : '' }}>Due</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                {{-- Submit --}}
                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="fas fa-filter"></i> Apply Filter
                                        </button>
                                    </div>
                                </div>

                                {{ Form::close() }}

                            </div>
                        </div>
                        {{-- ⭐ END FILTER CARD --}}



                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Visa Management</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">

                                        <thead>
                                        <tr>
                                            <th>S.L</th>
                                            <th>Date</th>
                                            <th>Country</th>
                                            <th>Passengers</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Due</th>
                                            <th>Payment Files</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @php
                                            $i=1;
                                            $j=1;
                                            $sum_due = 0;
                                            $sum_a_price = 0;
                                            $sum_c_price = 0;
                                        @endphp

                                        @foreach($visas as $visa)

                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$visa->date}}</td>

                                                <td>
                                                    <div>Country: {{$visa->visa_country}}</div>
                                                    <div>Vendor: {{$visa->vendor}}</div>
                                                    <div>Purpose: {{$visa->v_details}}</div>
                                                </td>

                                                {{-- Passengers --}}
                                                @php $p = json_decode($visa->p_details); @endphp
                                                <td>
                                                    @foreach($p as $pas)
                                                        @php
                                                            $name = DB::table('passengers')
                                                                ->where('id',$pas)
                                                                ->where('upload_by',Session::get('agent_id'))
                                                                ->first();
                                                        @endphp
                                                        <div>{{$j.'. '.$name->f_name.' '.$name->l_name}}</div>
                                                        @php $j++; @endphp
                                                    @endforeach
                                                    <div>Phone: {{ @$name->phone }}</div>
                                                </td>

                                                {{-- Status --}}
                                                <td>
                                                    @php
                                                        $btn = [
                                                            'Received'=>'secondary',
                                                            'On Process'=>'info',
                                                            'Submitted'=>'warning',
                                                            'Approved'=>'dark',
                                                            'Cancelled'=>'danger',
                                                            'Docs Required'=>'danger',
                                                            'Delivered'=>'success'
                                                        ];
                                                    @endphp

                                                    <button class="btn btn-{{$btn[$visa->status] ?? 'secondary'}}">
                                                        {{$visa->status}}
                                                    </button>
                                                </td>

                                                {{-- Price --}}
                                                <td>
                                                    A.Price: {{$visa->v_a_price}} <br>
                                                    C.Price: {{$visa->v_c_price + $visa->v_vat + $visa->v_ait}}
                                                </td>

                                                {{-- Due --}}
                                                <td>
                                                    @if((int)$visa->v_due > 0)
                                                        <button class="btn btn-danger">{{$visa->v_due}}</button>
                                                    @else
                                                        {{$visa->v_due}}
                                                    @endif
                                                </td>

                                                {{-- Payment Files --}}
                                                <td>
                                                    @php
                                                        $clientFiles = json_decode($visa->payment_files, true) ?? [];
                                                        $vendorFiles = json_decode($visa->vendor_payment_files, true) ?? [];
                                                    @endphp

                                                    {{-- 🌟 Client Payment Files --}}
                                                    @if(count($clientFiles))
                                                        <div class="mb-2 p-2 border rounded bg-light shadow-sm">
                                                            <h6 class="text-primary mb-2">
                                                                <i class="fas fa-user mr-1"></i> Client Payment  
                                                            </h6>

                                                            <div class="row">
                                                                @foreach($clientFiles as $index => $file)
                                                                    <div class="col-md-12 mb-1">
                                                                        <a href="{{ $file }}" 
                                                                        target="_blank" 
                                                                        class="d-block p-2 border rounded file-hover text-primary"
                                                                        title="View Client Payment {{ $index + 1 }}">
                                                                            <i class="fas fa-file-alt mr-2"></i>
                                                                            Payment {{ $index + 1 }}
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif

                                                    {{-- 🌟 Vendor Payment Files --}}
                                                    @if(count($vendorFiles))
                                                        <div class="p-2 border rounded bg-light shadow-sm">
                                                            <h6 class="text-warning mb-2">
                                                                <i class="fas fa-truck mr-1"></i> Vendor Payment 
                                                            </h6>

                                                            <div class="row">
                                                                @foreach($vendorFiles as $index => $file)
                                                                    <div class="col-md-12 mb-1">
                                                                        <a href="{{ $file }}" 
                                                                        target="_blank" 
                                                                        class="d-block p-2 border rounded file-hover text-warning"
                                                                        title="View Vendor Payment {{ $index + 1 }}">
                                                                            <i class="fas fa-file-invoice mr-2"></i>
                                                                            Payment {{ $index + 1 }}
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(!count($clientFiles) && !count($vendorFiles))
                                                        <span class="badge badge-secondary">No Files</span>
                                                    @endif

                                                </td>

                                                {{-- Action --}}
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">Action</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('viewVisa?id='.$visa->id)}}">View</a>
                                                            <a class="dropdown-item" href="{{url('editVisaPage?id='.$visa->id)}}">Edit</a>
                                                            <a class="dropdown-item" href="{{url('editVisaPaymentStatus?id='.$visa->id)}}">Edit Payment Status</a>
                                                            <a class="dropdown-item delete" data-id="{{$visa->id}}" data-toggle="modal" data-target="#modal-danger">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                            @php
                                                $i++; $j=1;
                                                $sum_due += $visa->v_due;
                                                $sum_a_price += $visa->v_a_price;
                                                $sum_c_price += ($visa->v_c_price + $visa->v_vat + $visa->v_ait);
                                            @endphp

                                        @endforeach

                                        </tbody>

                                        {{-- Total Row --}}
                                        @if(Session::get('user_role') == 2 || Session::get('user_role') == 1)
                                            <tfoot>
                                            <tr>
                                                <th colspan="5" class="text-right">Total</th>
                                                <td>
                                                    <p>A.Price: {{ $sum_a_price }}/-</p>
                                                    <p>C.Price: {{ $sum_c_price }}/-</p>
                                                </td>
                                                <td>
                                                    <span class="text-danger font-weight-bold">{{ $sum_due }}/-</span><br>
                                                    <span class="text-success font-weight-bold">{{ $sum_c_price - $sum_a_price }}/-</span>
                                                </td>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        @endif

                                    </table>

                                    <br>
                                    {{ $visas->links() }}

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
            <div class="modal fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body">
                            <p style="text-align: center; font-size: 25px;">Are You Sure!!</p>
                        </div>
                        {{ Form::open(array('url' => 'deleteVisa',  'method' => 'post')) }}
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
@endsection
@section('js')
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
        $('#dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: new Date(),
            icons: { time: 'far fa-clock' }
        });
        $('#d_time1,#a_time1').datetimepicker({
            format: 'YYYY-DD-MM HH:mm:ss',
            icons: { time: 'far fa-clock' }
        });
        $('#pax_number').on('change', function() {
            var pax_value = this.value;
            $('.feedback').remove();
            var html= '<div class="row feedback">';
            for(var i=0; i<pax_value; i++){
                var pax_name = 'pax_name'+i;
                html += '<div class="col-md-6"> <div class="form-group"> <label>Passengers</label> <select class="form-control select2bs4" name="pax_name[]" id="'+pax_name+'" style="width: 100%;" required> <option value="">Select Passenger Name</option>';
                <?php
                foreach($passengers as $passenger)
                {
                    ?>
                    html += '<option value="<?php echo $passenger->id; ?>"><?php echo $passenger->f_name." ".$passenger->l_name; ?></option>';
                    <?php
                }
                ?>
                    html += '</select></div></div>';
                html += '<div class="col-sm-6"> <div class="form-group"> <label>Passport Number</label> <input type="number" class="form-control" id="pass_number" name="pass_number[]" min="1" placeholder="Enter Passport Number" required> </div> </div>'
            }
            html += '</div>';

            $('.newPassenger').append(html);
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
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
