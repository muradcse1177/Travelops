@extends('mainLayout.layout')
@section('title','Trip Designer || Work Permit Visa Processing')
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
                                <h3 class="card-title">Edit Work Permit Invoice</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                {{ Form::open(array('url' => 'editManPowerVisa',  'method' => 'post' ,'class' =>'form-horizontal','enctype'=>"multipart/form-data")) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Country Name</label>
                                            <select class="form-control select2bs4" name="c_name" id="c_name" style="width: 100%;" required>
                                                <option value="">Select Country Name</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->name}}" <?php if($country->name == $visa->visa_country) echo 'selected'; ?>>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date" id="dob" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#dob" value="{{@$visa->date}}" name="date" placeholder="Enter Date" required/>
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
                                                    <option value="{{$vendor->name}}" <?php if($vendor->name == $visa->vendor) echo 'selected'; ?>>{{$vendor->name}}</option>
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
                                                    <option value="{{$employee->name}}" <?php if($employee->name == $visa->issued_by) echo 'selected'; ?>>{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Status</label>
                                            <select class="form-control select2bs4" name="status" id="status" style="width: 100%;" required>
                                                <option value="">Select Status Type</option>
                                                <option value="Received" <?php if($visa->status == 'Received') echo 'selected'; ?>>Received</option>
                                                <option value="Sent For Work Permit" <?php if($visa->status == 'Sent For Work Permit') echo 'selected'; ?>>Sent For Work Permit</option>
                                                <option value="Sent For Visa" <?php if($visa->status == 'Sent For Visa') echo 'selected'; ?>>Sent For Visa</option>
                                                <option value="Sent For Manpower" <?php if($visa->status == 'Sent For Manpower') echo 'selected'; ?>>Sent For Manpower</option>
                                                <option value="Need Ticket" <?php if($visa->status == 'Need Ticket') echo 'selected'; ?>>Need Ticket</option>
                                                <option value="Visa Approved" <?php if($visa->status == 'Visa Approved') echo 'selected'; ?>>Visa Approved</option>
                                                <option value="Visa Cancelled" <?php if($visa->status == 'Visa Cancelled') echo 'selected'; ?>>Visa Cancelled</option>
                                                <option value="Docs Required" <?php if($visa->status == 'Docs Required') echo 'selected'; ?>>Docs Required</option>
                                                <option value="Delivered" <?php if($visa->status == 'Delivered') echo 'selected'; ?>>Delivered</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Visa Service Details</label>
                                            <input type="text" class="form-control" id="s_details" value="{{@$visa->v_details}}" name="s_details" placeholder="Enter Visa Service Details" required>
                                        </div>
                                    </div>
                                    @php
                                        $details = json_decode($visa->w_details, true);
                                    @endphp

                                    <div class="col-sm-12" >
                                        <div class="form-group">
                                            <label>Package  Deatils</label>
                                            <textarea class="summernote" name="w_details" placeholder="Place Write Here...">{!! $details !!}</textarea>
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
                                                <option value="1" <?php if($visa->pax_number == '1') echo 'selected'; ?>>One</option>
                                                <option value="2" <?php if($visa->pax_number == '2') echo 'selected'; ?>>Two</option>
                                                <option value="3" <?php if($visa->pax_number == '3') echo 'selected'; ?>>Three</option>
                                                <option value="4" <?php if($visa->pax_number == '4') echo 'selected'; ?>>Four</option>
                                                <option value="5" <?php if($visa->pax_number == '5') echo 'selected'; ?>>Five</option>
                                                <option value="6" <?php if($visa->pax_number == '6') echo 'selected'; ?>>Six</option>
                                                <option value="7" <?php if($visa->pax_number == '7') echo 'selected'; ?>>Seven</option>
                                                <option value="8" <?php if($visa->pax_number == '8') echo 'selected'; ?>>Eight</option>
                                                <option value="9" <?php if($visa->pax_number == '9') echo 'selected'; ?>>Nine</option>
                                                <option value="10" <?php if($visa->pax_number == '10') echo 'selected'; ?>>Ten</option>
                                                <option value="11" <?php if($visa->pax_number == '11') echo 'selected'; ?>>Eleven</option>
                                                <option value="12" <?php if($visa->pax_number == '12') echo 'selected'; ?>>Twelve</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    $p_detail = json_decode($visa->p_details);
                                    $pass_number = json_decode($visa->pass_number);
                                    ?>
                                    @for ($i=0; $i<$visa->pax_number; $i++)
                                            <?php
                                            $row = DB::table('passengers')->where('id',$p_detail[$i])->first();
                                            ?>
                                        <div class="col-sm-6 feedback">
                                            <div class="form-group">
                                                <label>Passengers</label>
                                                <select class="form-control select2bs4" name="pax_name[]" style="width: 100%;" required> <option value="">Select Passenger Name</option>
                                                    @foreach($passengers as $passenger)
                                                        <option value="<?php echo $passenger->id; ?>" <?php if($p_detail[$i] == $passenger->id) echo 'selected';?>><?php echo $passenger->f_name." ".$passenger->l_name; ?></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 feedback">
                                            <div class="form-group">
                                                <label>Passport Number</label>
                                                <input type="text" class="form-control" id="pass_number" value="{{$pass_number[$i]}}" name="pass_number[]"  placeholder="Enter Passport Number" required>
                                            </div>
                                        </div>
                                    @endfor
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
                                            <input type="number" class="form-control" id="a_price" value="{{$visa->v_a_price}}" name="a_price" min="1" placeholder="Enter Agent Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Price</label>
                                            <input type="number" class="form-control" id="c_price" value="{{$visa->v_c_price}}" name="c_price" min="1"  placeholder="Enter Client Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" id="vat" name="vat" value="{{$visa->v_vat}}" min="0"  placeholder="Enter VAT">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIT</label>
                                            <input type="number" class="form-control" id="ait" value="{{$visa->v_ait}}" name="ait" min="0"  placeholder="Enter AIT">
                                        </div>
                                    </div>
                                    {{-- ================= Payment Details ================= --}}
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

                                    {{-- Payment Type --}}
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Payment Type</label>
                                            <select class="form-control select2bs4" name="payment_type" required>
                                                <option value="">Select Payment Type</option>
                                                @foreach($payment_types as $payment_type)
                                                    <option value="{{ $payment_type->type }}"
                                                        {{ $visa->v_p_type == $payment_type->type ? 'selected' : '' }}>
                                                        {{ $payment_type->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Client Due --}}
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Client Due Amount</label>
                                            <input type="number"
                                                class="form-control"
                                                name="due"
                                                min="0"
                                                value="{{ $visa->v_due ?? 0 }}"
                                                placeholder="Enter Due Amount">
                                        </div>
                                    </div>

                                    {{-- Vendor Due --}}
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Vendor Due Amount</label>
                                            <input type="number"
                                                class="form-control"
                                                name="vendor_due"
                                                min="0"
                                                value="{{ $visa->vendor_due ?? 0 }}"
                                                placeholder="Enter Vendor Due Amount">
                                        </div>
                                    </div>
                                    {{-- ================= Client Payment Section ================= --}}
                                    <div class="col-sm-6">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header bg-light border-left border-primary">
                                                <h6 class="mb-0 text-primary font-weight-bold">
                                                    <i class="fas fa-hand-holding-usd mr-2"></i>
                                                    Client Payments Details
                                                </h6>
                                            </div>

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Payment Description</label>
                                                    <textarea class="form-control"
                                                            name="p_details"
                                                            rows="6"
                                                            placeholder="Write Payments Detail...">{!! $visa->v_p_details !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- ================= Client File Section ================= --}}
                                    @php
                                        $clientFiles = json_decode($visa->client_files ?? '[]', true) ?? [];
                                    @endphp

                                    <div class="col-sm-6">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header bg-light border-left border-info">
                                                <h6 class="mb-0 text-info font-weight-bold">
                                                    <i class="fas fa-folder-open mr-2"></i>
                                                    Client Payment Files
                                                </h6>
                                            </div>

                                            <div class="card-body">

                                                {{-- Existing Files --}}
                                                <label class="text-muted small">Existing Files</label>

                                                @if(count($clientFiles))
                                                    <div class="mb-3">
                                                        @foreach($clientFiles as $index => $file)
                                                            <div class="border rounded p-2 mb-2 d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <i class="fas fa-file-alt text-primary mr-2"></i>
                                                                    Client Payment {{ $index + 1 }}
                                                                </div>
                                                                <a href="{{ asset($file) }}"
                                                                target="_blank"
                                                                class="btn btn-sm btn-outline-primary">
                                                                    View
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p class="text-muted">No Files Uploaded</p>
                                                @endif

                                                {{-- Upload New --}}
                                                <label class="mt-2">Upload New File</label>
                                                <div class="input-group">
                                                    <input type="file"
                                                        name="payment_files[]"
                                                        accept=".jpg,.jpeg,.png"
                                                        class="form-control">

                                                    <div class="input-group-append">
                                                        <button class="btn btn-success btn-add-client-file" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- ================= Vendor Payment Section ================= --}}
                                    <div class="col-sm-6">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header bg-light border-left border-warning">
                                                <h6 class="mb-0 text-warning font-weight-bold">
                                                    <i class="fas fa-truck mr-2"></i>
                                                    Vendor Payment Details
                                                </h6>
                                            </div>

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Vendor Payment Description</label>
                                                    <textarea class="form-control"
                                                            name="vendor_p_details"
                                                            rows="6"
                                                            placeholder="Write Vendor Payment Details...">{!! $visa->vendor_p_details !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- ================= Vendor File Section ================= --}}
                                    @php
                                        $vendorFiles = json_decode($visa->vendor_files ?? '[]', true) ?? [];
                                    @endphp

                                    <div class="col-sm-6">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header bg-light border-left border-danger">
                                                <h6 class="mb-0 text-danger font-weight-bold">
                                                    <i class="fas fa-folder-open mr-2"></i>
                                                    Vendor Payment Files
                                                </h6>
                                            </div>

                                            <div class="card-body">

                                                {{-- Existing Files --}}
                                                <label class="text-muted small">Existing Files</label>

                                                @if(count($vendorFiles))
                                                    <div class="mb-3">
                                                        @foreach($vendorFiles as $index => $file)
                                                            <div class="border rounded p-2 mb-2 d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <i class="fas fa-file-invoice text-warning mr-2"></i>
                                                                    Vendor Payment {{ $index + 1 }}
                                                                </div>
                                                                <a href="{{ asset($file) }}"
                                                                target="_blank"
                                                                class="btn btn-sm btn-outline-warning">
                                                                    View
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p class="text-muted">No Files Uploaded</p>
                                                @endif

                                                {{-- Upload New --}}
                                                <label class="mt-2">Upload New File</label>
                                                <div class="input-group">
                                                    <input type="file"
                                                        name="vendor_payment_files[]"
                                                        accept=".jpg,.jpeg,.png"
                                                        class="form-control">

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
                                    <input type="hidden" name="id" value="{{$_GET['id']}}">
                                    <button type="submit" class="btn btn-warning float-right">Save</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('js')
    <script>
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })
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
                html += '<div class="col-sm-6"> <div class="form-group"> <label>Passport Number</label> <input type="number" class="form-control" id="pass_number" name="pass_number[]" min="1" placeholder="Enter Passport Number" required> </div> </div>'
            }
            html += '</div>';

            $('.newPassenger').append(html);
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
        });
    </script>
    <script>
        $(document).ready(function(){

            /* =========================
            CLIENT FILE ADD
            ========================== */
            $(document).on('click', '.btn-add-client-file', function(){

                let html = `
                <div class="input-group mt-2">
                    <input type="file"
                        name="payment_files[]"
                        accept=".jpg,.jpeg,.png"
                        class="form-control">

                    <div class="input-group-append">
                        <button type="button"
                                class="btn btn-danger btn-remove-file">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                `;

                $(this).closest('.card-body').find('.input-group:last').after(html);
            });



            /* =========================
            VENDOR FILE ADD
            ========================== */
            $(document).on('click', '.btn-add-vendor-file', function(){

                let html = `
                <div class="input-group mt-2">
                    <input type="file"
                        name="vendor_payment_files[]"
                        accept=".jpg,.jpeg,.png"
                        class="form-control">

                    <div class="input-group-append">
                        <button type="button"
                                class="btn btn-danger btn-remove-file">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                `;

                $(this).closest('.card-body').find('.input-group:last').after(html);
            });



            /* =========================
            REMOVE FILE INPUT
            ========================== */
            $(document).on('click', '.btn-remove-file', function(){
                $(this).closest('.input-group').remove();
            });

        });
        </script>
@endsection
