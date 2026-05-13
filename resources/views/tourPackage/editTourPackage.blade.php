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
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Edit Tour Package</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                {{ Form::open(array('url' => 'updateTourPackage',  'method' => 'post' ,'class' =>'form-horizontal','files' => true)) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select2bs4" name="country" id="country" style="width: 100%;" required>
                                                <option value="">Select Country Name</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->name}}" @if($country->name == $package->p_countries) Selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Package Name</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{@$package->title}}" placeholder="Enter Package Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Package Code</label>
                                            <input type="text" class="form-control" id="p_code"  name="p_code" value="{{@$package->p_code}}" placeholder="Enter Package Code" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Package Night</label>
                                            <select class="form-control select2bs4 night" name="night" id="night" style="width: 100%;" required>
                                                <option value="">Select Package Night</option>
                                                <option value="1" <?php if($package->night == 1) echo 'selected'; ?> >1 Night</option>
                                                <option value="2" <?php if($package->night == 2) echo 'selected'; ?>>2 Night</option>
                                                <option value="3" <?php if($package->night == 3) echo 'selected'; ?>>3 Night</option>
                                                <option value="4" <?php if($package->night == 4) echo 'selected'; ?>>4 Night</option>
                                                <option value="5" <?php if($package->night == 5) echo 'selected'; ?>>5 Night</option>
                                                <option value="6" <?php if($package->night == 6) echo 'selected'; ?>>6 Night</option>
                                                <option value="7" <?php if($package->night == 7) echo 'selected'; ?>>7 Night</option>
                                                <option value="8" <?php if($package->night == 8) echo 'selected'; ?>>8 Night</option>
                                                <option value="9" <?php if($package->night == 9) echo 'selected'; ?>>9 Night</option>
                                                <option value="10" <?php if($package->night == 10) echo 'selected'; ?>>10 Night</option>
                                                <option value="11" <?php if($package->night == 11) echo 'selected'; ?>>11 Night</option>
                                                <option value="12" <?php if($package->night == 12) echo 'selected'; ?>>12 Night</option>
                                                <option value="13" <?php if($package->night == 13) echo 'selected'; ?>>13 Night</option>
                                                <option value="14" <?php if($package->night == 14) echo 'selected'; ?>>14 Night</option>
                                                <option value="15" <?php if($package->night == 15) echo 'selected'; ?>>15 Night</option>
                                                <option value="16" <?php if($package->night == 16) echo 'selected'; ?>>16 Night</option>
                                                <option value="17" <?php if($package->night == 17) echo 'selected'; ?>>17 Night</option>
                                                <option value="18" <?php if($package->night == 18) echo 'selected'; ?>>18 Night</option>
                                                <option value="19" <?php if($package->night == 19) echo 'selected'; ?>>19 Night</option>
                                                <option value="20" <?php if($package->night == 20) echo 'selected'; ?>>20 Night</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="input-group date" id="start_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#start_date" name="start_date" placeholder="Enter Start Date" value="{{@$package->start_date}}" required/>
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
                                                <input type="text" class="form-control datetimepicker-input" data-target="#end_date" name="end_date" placeholder="Enter End Date" value="{{@$package->end_date}}" required/>
                                                <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Vendors</label>
                                            <select class="form-control select2bs4" name="vendor" id="vendor" style="width: 100%;" required>
                                                <option value="">Select Vendor</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{$vendor->name}}" <?php if($package->vendor == $vendor->name) echo 'selected'; ?>>{{$vendor->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                            <input type="number" class="form-control" id="a_price" name="a_price" min="1" placeholder="Enter Agent Price" value="{{@$package->p_a_price}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Price</label>
                                            <input type="number" class="form-control" id="c_price" name="c_price" min="1"  placeholder="Enter Client Price" value="{{@$package->p_c_details}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" id="vat" name="vat" min="0"  placeholder="Enter VAT" value="{{@$package->p_vat}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIT</label>
                                            <input type="number" class="form-control" id="ait" name="ait" min="0"  placeholder="Enter AIT" value="{{@$package->p_ait}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-success">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-warning">
                                                    <i class="fas fa-suitcase-rolling mr-2"></i> Tour Package Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" >
                                        <div class="form-group">
                                            <label>Package  Highlights</label>
                                            <textarea class="summernote" name="highlights" placeholder="Place Write Here...">{{json_decode(@$package->highlights)}}</textarea>
                                        </div>
                                    </div>
                                    <?php
                                        $nights = $package->night;
                                        $day_titles = json_decode($package->day_title);
                                        $dat_itinarys = json_decode($package->dat_itinary);
                                    ?>
                                    @for($i = 0; $i <= $nights; $i++)
                                        <div class="col-12">
                                            <div class="card card-outline card-success mb-3">
                                                <div class="card-header">
                                                    <h5 class="card-title">Day {{ $i + 1 }} Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="d_title_{{ $i }}">Day Title</label>
                                                        <input type="text" class="form-control" id="d_title_{{ $i }}" name="d_title[]" value="{{ $day_titles[$i] ?? '' }}" placeholder="Enter Title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description_{{ $i }}">Day Description</label>
                                                        <textarea class="form-control" id="description_{{ $i }}" name="description[]" rows="3" placeholder="Enter Description" required>{{ $dat_itinarys[$i] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Package Inclusions</label>
                                            <textarea id="summernote" class="summernote" row="3" name="p_inclusions" placeholder="Place Write Here...">{{json_decode(@$package->p_inclusions)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Package Exclusions</label>
                                            <textarea id="summernote" class="summernote" row="3" name="p_exclusions" placeholder="Place Write Here...">{{json_decode(@$package->p_exclusions)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Terms and Conditions</label>
                                            <textarea id="summernote" class="summernote" row="3" name="p_tnt" placeholder="Place Write Here...">{{json_decode(@$package->p_tnt)}}</textarea>
                                        </div>
                                    </div>
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
                                            <label> Payment Type</label>
                                            <select class="form-control select2bs4" name="payment_type" id="payment_type" style="width: 100%;" required>
                                                <option value="">Select Payment Type</option>
                                                @foreach($payment_types as $payment_type)
                                                    <option value="{{$payment_type->type}}" @if($payment_type->type == $package->payment_type) Selected @endif>{{$payment_type->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Due Amount</label>
                                                <input type="number" class="form-control" id="due" name="due" min="0" placeholder="Enter Due Amount" value="{{@$package->due}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Vendor Due Amount</label>
                                                <input type="number" class="form-control" id="vendor_due" name="vendor_due" min="0" placeholder="Enter Vendor Due Amount" value="{{@$package->vendor_due}}">
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
                                            <textarea class="form-control" id="pay_details" name="pay_details" rows="5" placeholder="Write Payments Detail..." required>{{ old('pay_details', $package->pay_details ?? '') }}</textarea>
                                        </div>

                                        @php
                                            $clientFiles = json_decode($package->payment_files ?? '[]', true);
                                        @endphp

                                        @if (!empty($clientFiles))
                                            <div class="mb-3">
                                                <label class="font-weight-bold text-primary mb-2">
                                                    <i class="fas fa-folder-open mr-1"></i> Existing Client Files
                                                </label>

                                                <div class="bg-white border rounded p-2 shadow-sm">
                                                    @if(count($clientFiles) > 0)
                                                        <ul class="list-unstyled mb-0">
                                                            @foreach ($clientFiles as $index => $file)
                                                                <li class="mb-1 d-flex align-items-center">
                                                                    <i class="fas fa-file-alt text-primary mr-2"></i>
                                                                    <a href="{{  $file }}"
                                                                       target="_blank"
                                                                       class="text-dark text-decoration-none">
                                                                        Client Payment {{ $index + 1 }}
                                                                    </a>
                                                                    {{-- Optional delete --}}
                                                                    {{--
                                                                    <a href="#" class="ml-2 text-danger" title="Delete">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                    --}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-muted mb-0">No client files uploaded.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Client File Upload (Add More) -->
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

                                    <!-- Vendor Section Heading -->
                                    <div class="col-12">
                                        <div class="card bg-light mb-3 border-left border-warning">
                                            <div class="card-body py-2 px-3">
                                                <h5 class="mb-0 text-warning">
                                                    <i class="fas fa-truck-loading mr-2"></i> Vendor Payment Details
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Vendor Payment Details -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Vendor Payment Details</label>
                                            <textarea class="form-control" id="vendor_p_details" name="vendor_p_details" rows="5" placeholder="Write Vendor Payment Details..." required>{{ old('vendor_p_details', $package->vendor_p_details ?? '') }}</textarea>
                                        </div>

                                        @php
                                            $vendorFiles = json_decode($package->vendor_payment_files ?? '[]', true);
                                        @endphp

                                        @if (!empty($vendorFiles))
                                            <div class="mb-3">
                                                <label class="font-weight-bold text-warning mb-2">
                                                    <i class="fas fa-folder-open mr-1"></i> Existing Vendor Files
                                                </label>

                                                <div class="bg-white border rounded p-2 shadow-sm">
                                                    @if(count($vendorFiles) > 0)
                                                        <ul class="list-unstyled mb-0">
                                                            @foreach ($vendorFiles as $index => $file)
                                                                <li class="mb-1 d-flex align-items-center">
                                                                    <i class="fas fa-file-invoice text-warning mr-2"></i>
                                                                    <a href="{{ $file }}"
                                                                       target="_blank"
                                                                       class="text-dark text-decoration-none">
                                                                        Vendor Payment {{ $index + 1 }}
                                                                    </a>
                                                                    {{-- Optional delete --}}
                                                                    {{--
                                                                    <a href="#" class="ml-2 text-danger" title="Delete">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                    --}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-muted mb-0">No vendor files uploaded.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Vendor File Upload (Add More) -->
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
                                    <input type="hidden" name="id" value="{{@$package->id}}">
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
        </section>
    </div>
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
        $('#pax_number').on('change', function() {
            var pax_value = this.value;
            $('.feedback').remove();
            var html= '<div class="row feedback">';
            for(var i=0; i<pax_value; i++){
                var pax_name = 'pax_name'+i;
                html += '<div class="col-md-3"> <div class="form-group"> <label>Passenger</label> <select class="form-control select2bs4" name="pax_name[]" id="'+pax_name+'" style="width: 100%;" required> <option value="">Select Passenger Name</option>';
                <?php
                foreach($passengers as $passenger)
                {
                    ?>
                    html += '<option value="<?php echo $passenger->id; ?>"><?php echo $passenger->f_name." ".$passenger->l_name; ?></option>';
                    <?php
                }
                ?>
                    html += '</select></div></div>';
            }
            html += '</div>';

            $('.newPassenger').append(html);
            $('.newPassenger').show();
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
        });
        $(function () {
            $('.summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
        $('.night').on('change', function() {
            var night  = parseInt(this.value);
            var day = night + 1 ;
            var html = "";
            for (var i = 0; i<day; i++ ){
                html += '<div class="col-sm-12"> <div class="form-group"> <label>Day Title</label><input type="text" class="form-control"   name="d_title[]" placeholder="Enter Title" required> </div> </div>';
                html += '<div class="col-sm-12"> <div class="form-group"> <label>Day Description</label><textarea type="text" class="form-control"   name="description[]" placeholder="Enter Description" rows="3" required></textarea> </div> </div>';
            }
            $(".highlights").show();
            $(".highlights").empty().append(html);
        });
        $(document).ready(function () {
            // Client file add
            $('#clientFileInputs').on('click', '.btn-add-client-file', function () {
                $('#clientFileInputs').append(`
                <div class="input-group mb-2">
                    <input type="file" name="payment_files[]" accept=".jpg, .jpeg, .png" class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-danger btn-remove-file" type="button">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>`);
            });

            // Vendor file add
            $('#vendorFileInputs').on('click', '.btn-add-vendor-file', function () {
                $('#vendorFileInputs').append(`
                <div class="input-group mb-2">
                    <input type="file" name="vendor_payment_files[]" accept=".jpg, .jpeg, .png" class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-danger btn-remove-file" type="button">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>`);
            });

            // Remove any added file input
            $(document).on('click', '.btn-remove-file', function () {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endsection
