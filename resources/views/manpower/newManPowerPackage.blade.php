@extends('mainLayout.layout')
@section('title','Trip Designer || Work Permit Processing')
@section('newManPowerPackage','active')
@section('manPowerPackage','active')
@section('manPowerMenu','menu-open')
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
                        <h1>Work Permit Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Work Permit Management</li>
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
                                <h3 class="card-title">Add New Work Permit </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                {{ Form::open(array('url' => 'addNewWorkPermit',  'method' => 'post' ,'class' =>'form-horizontal','enctype'=>'multipart/form-data')) }}
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
                                                <option value="Sent Work Permit">Sent For Work Permit</option>
                                                <option value="Sent For Visa">Sent For Visa</option>
                                                <option value="Sent For Manpower">Sent For Manpower </option>
                                                <option value="Need Ticket">Need Ticket</option>
                                                <option value="Visa Approved">Visa Approved</option>
                                                <option value="Cancelled">Visa Cancelled</option>
                                                <option value="Docs Required">Docs Required</option>
                                                <option value="Delivered">Delivered</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Work Permit Visa Service Details</label>
                                            <input type="text" class="form-control" id="s_details" name="s_details" placeholder="Enter Visa Service Details" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" >
                                        <div class="form-group">
                                            <label>Package  Deatils</label>
                                            <textarea class="summernote" name="w_details">Place Write Here...</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header d-flex align-items-center"
                                                style="background-color: #e9ecef; border-left: 4px solid #6c757d;">
                                                
                                                <h5 class="mb-0 text-dark font-weight-bold">
                                                    <i class="fas fa-users mr-2 text-secondary"></i>
                                                   Passenger Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 newPassenger" style="margin-left: 0px;">
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
                                                <option value="8">Eight</option>
                                                <option value="9">Nine</option>
                                                <option value="10">Ten</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header d-flex align-items-center"
                                                style="background-color: #e9ecef; border-left: 4px solid #6c757d;">
                                                <h5 class="mb-0 text-dark font-weight-bold">
                                                    <i class="fas fa-money-bill-wave mr-2 text-secondary"></i>
                                                    Price Details
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
                                    <div class="col-sm-12">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header d-flex align-items-center"
                                                style="background-color: #e9ecef; border-left: 4px solid #6c757d;">
                                                <h5 class="mb-0 text-dark font-weight-bold">
                                                    <i class="fas fa-credit-card mr-2 text-secondary"></i>
                                                    Payment Details
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
                                                <label>Client Due Amount</label>
                                                <input type="number" class="form-control" id="due" name="due" min="0" value="0" placeholder="Enter Due Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Vendor Due Amount</label>
                                                <input type="number" class="form-control" id="vendor_due" name="vendor_due" min="0" value="0" placeholder="Enter Due Amount">
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
                                            <label>Payments Details</label>
                                            <textarea class="form-control" id="p_details" name="p_details" rows="5" placeholder="Write Payments Detail..."></textarea>
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
                                <h3 class="card-title">Work Permit Management</h3>
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
                                    <table class="table table-bordered table-hover">
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
                                        @foreach($visas as $visa)

                                            @php
                                                $visaPassengers  = json_decode($visa->p_details, true) ?? [];
                                                $clientFiles = json_decode($visa->client_files, true) ?? [];
                                                $vendorFiles = json_decode($visa->vendor_files, true) ?? [];

                                                $totalClientPrice = $visa->v_c_price + $visa->v_vat + $visa->v_ait;
                                                $profit = $totalClientPrice - $visa->v_a_price;
                                            @endphp

                                            <tr>

                                                {{-- Booking Info --}}
                                                <td>
                                                    <strong>Date:</strong> {{ $visa->date }} <br>
                                                    <strong>Country:</strong> {{ $visa->visa_country }} <br>
                                                    <strong>Vendor:</strong> {{ $visa->vendor }} <br>
                                                    <small class="text-muted">Issued By: {{ $visa->issued_by }}</small>
                                                </td>

                                                {{-- Passenger Details --}}
                                                <td>
                                                    @php $j = 1; @endphp
                                                    @if(is_array($visaPassengers))
                                                        @foreach($visaPassengers as $index => $pid)

                                                            @php
                                                                $passenger = DB::table('passengers')
                                                                    ->where('id', $pid)
                                                                    ->where('upload_by', Session::get('agent_id'))
                                                                    ->first();
                                                            @endphp

                                                            @if($passenger)
                                                                <div>
                                                                    {{ $index + 1 }}. 
                                                                    {{ $passenger->f_name }} {{ $passenger->l_name }}
                                                                    <br>
                                                                    <small class="text-muted">
                                                                        📞 {{ $passenger->phone ?? 'No Phone' }}
                                                                    </small>
                                                                </div>
                                                            @endif

                                                        @endforeach
                                                    @endif
                                                </td>

                                                {{-- Status --}}
                                                <td>
                                                    <span class="badge badge-info mb-1">{{ $visa->status }}</span>

                                                    @if((int)$visa->v_due > 0)
                                                        <div><span class="badge badge-danger">Client Due: {{ $visa->v_due }}</span></div>
                                                    @else
                                                        <div><span class="badge badge-success">Client Paid</span></div>
                                                    @endif

                                                    @if((int)$visa->vendor_due > 0)
                                                        <div><span class="badge badge-danger">Vendor Due: {{ $visa->vendor_due }}</span></div>
                                                    @else
                                                        <div><span class="badge badge-success">Vendor Paid</span></div>
                                                    @endif
                                                </td>

                                                {{-- Financials --}}
                                                <td>
                                                    <span class="badge badge-secondary">Agent: {{ $visa->v_a_price }}</span><br>
                                                    <span class="badge badge-warning text-dark">Client: {{ $totalClientPrice }}</span>
                                                </td>

                                                {{-- Profit --}}
                                                <td>
                                                    @if($profit > 0)
                                                        <span class="badge badge-success">{{ $profit }}</span>
                                                    @elseif($profit < 0)
                                                        <span class="badge badge-danger">{{ $profit }}</span>
                                                    @else
                                                        <span class="badge badge-secondary">0</span>
                                                    @endif
                                                </td>

                                                {{-- Payment Files --}}
                                                <td>

                                                    {{-- Client Files --}}
                                                    @if(count($clientFiles))
                                                        <div class="mb-2">
                                                            <span class="badge badge-primary">
                                                                <i class="fas fa-user"></i> Client Payment
                                                            </span>
                                                            <ul class="pl-3 small mb-0">
                                                                @foreach($clientFiles as $index => $file)
                                                                    <li>
                                                                        <a href="{{ asset('/'.$file) }}" target="_blank">
                                                                            <i class="fas fa-file-alt"></i> Payment {{ $index + 1 }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    {{-- Vendor Files --}}
                                                    @if(count($vendorFiles))
                                                        <div>
                                                            <span class="badge badge-warning text-dark">
                                                                <i class="fas fa-truck"></i> Vendor Payment
                                                            </span>
                                                            <ul class="pl-3 small mb-0">
                                                                @foreach($vendorFiles as $index => $file)
                                                                    <li>
                                                                        <a href="{{ asset('/'.$file) }}" target="_blank">
                                                                            <i class="fas fa-file-invoice"></i> Payment {{ $index + 1 }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if(count($clientFiles) === 0 && count($vendorFiles) === 0)
                                                        <span class="badge badge-secondary">No Files</span>
                                                    @endif

                                                </td>

                                                {{-- Actions --}}
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm">Actions</button>
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>

                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('viewManPowerVisa?id='.$visa->id) }}">
                                                                <i class="fas fa-eye text-primary"></i> View
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('editManPowerVisaPage?id='.$visa->id) }}">
                                                                <i class="fas fa-edit text-warning"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('editManPowerVisaPaymentStatus?id='.$visa->id) }}">
                                                                <i class="fas fa-money-check-alt text-success"></i> Edit Payment
                                                            </a>
                                                            <a class="dropdown-item text-danger delete"
                                                            data-id="{{ $visa->id }}"
                                                            data-toggle="modal"
                                                            data-target="#modal-danger">
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
                                    {{ $visas->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
                        {{ Form::open(array('url' => 'deleteManPowerVisa',  'method' => 'post')) }}
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
        $(function () {
            $('.summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
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
                html += '<div class="col-sm-6"> <div class="form-group"> <label>Passport Number</label> <input type="text" class="form-control" id="pass_number" name="pass_number[]" min="1" placeholder="Enter Passport Number" required> </div> </div>'
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
