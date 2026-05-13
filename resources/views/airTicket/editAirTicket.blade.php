@extends('mainLayout.layout')
@section('title','Trip Designer || Edit Air Ticket')
@section('airTicket','active')
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
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Update Air Ticket</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                {{ Form::open(array('url' => 'updateNewAirTicket',  'method' => 'post' ,'class' =>'form-horizontal', 'files' => true)) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Reservation PNR</label>
                                            <input type="text" class="form-control" id="reservation_pnr" name="reservation_pnr" placeholder="Enter Reservation PNR" @if(@$_GET['reissue'] == 1) {{'readonly'}} @endif @if(@$_GET['refund'] == 1) {{'readonly'}} @endif @if(@$_GET['cancel'] == 1) {{'readonly'}} @endif value="{{$tickets->reservation_pnr}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Airlines PNR</label>
                                            <input type="text" class="form-control" id="airline_pnr" name="airline_pnr" placeholder="Airlines Reservation PNR" value="{{$tickets->airline_pnr}}" required @if(@$_GET['reissue'] == 1) {{'readonly'}} @endif @if(@$_GET['refund'] == 1) {{'readonly'}} @endif @if(@$_GET['cancel'] == 1) {{'readonly'}} @endif >
                                        </div>
                                    </div>
                                    @if(@$_GET['refund']==1)
                                        @php
                                            $refund = 1;
                                            $cancel = 1;
                                        @endphp
                                    @endif
                                    @if(@$_GET['cancel']==1)
                                        @php
                                            $refund = 1;
                                            $cancel = 1;
                                        @endphp
                                    @endif
                                    @if(@$refund != 1 && @$cancel !=1)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Issue date</label>
                                            <div class="input-group date" id="dob" data-target-input="nearest">
                                                <input type="text" class="form-control datepicker-issue" 
                                                    name="issue_date" value="{{ $tickets->issue_date }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <select class="form-control select2bs4" name="vendor" id="vendor" style="width: 100%;" required>
                                                <option value="">Select Vendor Name</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{$vendor->name}}" @if($tickets->vendor == $vendor->name) Selected @endif>{{$vendor->name}}</option>
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
                                                    <option value="{{$employee->name}}"  @if($tickets->issued_by == $employee->name) Selected @endif>{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Type</label>
                                            <select class="form-control select2bs4" name="f_type" id="f_type" style="width: 100%;" required>
                                                <option value="">Select Flight Type</option>
                                                <option value="One Way" @if($tickets->f_type == 'One Way') Selected @endif>One Way</option>
                                                <option value="Round Trip" @if($tickets->f_type == 'Round Trip') Selected @endif>Round Trip</option>
                                                <option value="Multi City" @if($tickets->f_type == 'Multi City') Selected @endif>Multi City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Class</label>
                                            <select class="form-control select2bs4" name="f_class" id="f_class" style="width: 100%;" required>
                                                <option value="">Select Class</option>
                                                <option value="Economy" @if($tickets->f_class == 'Economy') Selected @endif>Economy</option>
                                                <option value="Business" @if($tickets->f_class == 'Business') Selected @endif>Business</option>
                                                <option value="Premium Economy" @if($tickets->f_class == 'Premium Economy') Selected @endif>Premium Economy</option>
                                                <option value="First Class" @if($tickets->f_class == 'First Class') Selected @endif>First Class</option>
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
                                    @php
                                        $f_numbers_count = count(json_decode($tickets->f_number));
                                        $f_numbers = json_decode($tickets->f_number);
                                        $a_time = json_decode($tickets->a_time);
                                        $d_time = json_decode($tickets->d_time);
                                        $airl = json_decode($tickets->airlines);
                                        $af = json_decode($tickets->a_from);
                                        $at = json_decode($tickets->a_to);
                                    @endphp
                                    @for($i =0; $i<$f_numbers_count; $i++)
                                        @if(@$_GET['reissue'] != 1)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="text" 
                                                    class="form-control airport-autocomplete"
                                                    name="a_from[]" 
                                                    value="{{ $af[$i] }}"
                                                    placeholder="From Airport"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="text" 
                                                    class="form-control airport-autocomplete"
                                                    name="a_to[]" 
                                                    value="{{ $at[$i] }}"
                                                    placeholder="To Airport"
                                                    required>
                                            </div>
                                        </div>
                                        @endif
                                        @if(@$_GET['reissue'] == 1)
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Flight</label>
                                                    <input type="text" class="form-control" value="Flight Number {{$i +1}}" readonly/>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Departure</label>
                                                <div class="input-group date" id="d_time1" data-target-input="nearest">
                                                    <input type="text" 
                                                        class="form-control flight-departure" 
                                                        name="d_time[]" 
                                                        value="{{ $d_time[$i] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Arrival</label>
                                                <div class="input-group date" id="a_time1" data-target-input="nearest">
                                                    <input type="text" 
                                                        class="form-control flight-arrival" 
                                                        name="a_time[]" 
                                                        value="{{ $a_time[$i] }}" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Flight Number</label>
                                                <input type="text" class="form-control" id="f_number" name="f_number[]" placeholder="Enter Flight Number" value="{{@$f_numbers[$i]}}" required>
                                            </div>
                                        </div>
                                        @if(@$_GET['reissue'] != 1)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Airlines</label>
                                                <select class="form-control airline-select" name="airlines[]" required>
                                                    <option value="{{ $airl[$i] }}">{{ $airl[$i] }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                    @endfor
                                    @endif
                                    <div class="after-add-more">

                                    </div>
                                    @if(@$_GET['reissue']==1)
                                        @php
                                            $refund = 1;
                                            $reissue = 1;
                                            $cancel = 1;
                                        @endphp
                                    @endif
                                    @if(@$refund != 1 && @$reissue != 1 && @$cancel != 1 )
{{--                                    <div class="col-sm-12">--}}
{{--                                        <div class="form-group" style="background: #e7e7e1;">--}}
{{--                                            <label style="margin-left: 5px;">Passenger Details</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    @endif
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
                                            <input type="number" class="form-control" id="a_price" name="a_price" min="1" placeholder="Enter Agent Price" value="{{$tickets->a_price}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Price</label>
                                            <input type="number" class="form-control" id="c_price" name="c_price" min="1"  placeholder="Enter Client Price" value="{{$tickets->c_price}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" id="vat" name="vat" min="0"  placeholder="Enter VAT" value="{{$tickets->vat}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIT</label>
                                            <input type="number" class="form-control" id="ait" name="ait" min="0"  placeholder="Enter AIT" value="{{$tickets->ait}}">
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
                                                    <option value="{{$payment_type->type}}"  @if($tickets->payment_type == $payment_type->type) Selected @endif>{{$payment_type->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Due Amount</label>
                                                <input type="number" class="form-control" id="due" name="due" min="0"  value="{{$tickets->due_amount}}" placeholder="Enter Due Amount">
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
                                            <textarea class="form-control" id="p_details" name="p_details" rows="5" placeholder="Write Payments Detail..." required>{{ old('p_details', $tickets->p_details ?? '') }}</textarea>
                                        </div>

                                        @php
                                            $clientFiles = json_decode($tickets->payment_files ?? '[]', true);
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
                                            <textarea class="form-control" id="vendor_p_details" name="vendor_p_details" rows="5" placeholder="Write Vendor Payment Details..." required>{{ old('vendor_p_details', $tickets->vendor_p_details ?? '') }}</textarea>
                                        </div>

                                        @php
                                            $vendorFiles = json_decode($tickets->vendor_payment_files ?? '[]', true);
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
                                    <input type="hidden" name="id" value="{{@$tickets->id}}">
                                    <input type="hidden" name="reissue" value="{{@$_GET['reissue']}}">
                                    <input type="hidden" name="refund" value="{{@$_GET['refund']}}">
                                    <input type="hidden" name="cancel" value="{{@$_GET['cancel']}}">
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
        flatpickr(".datepicker-issue", { dateFormat: "Y-m-d" });
        flatpickr(".flight-departure", { enableTime: true, dateFormat: "Y-m-d H:i" });
        flatpickr(".flight-arrival", { enableTime: true, dateFormat: "Y-m-d H:i" });

        function setupAirportAutocomplete(selector) {
            $(selector).autocomplete({
                source: function (req, res) {
                    $.get("{{ url('/search-airport') }}", { term: req.term }, res);
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
        }
        setupAirportAutocomplete('.airport-autocomplete');
        function initAirlineSelect(selector) {
            $(selector).select2({
                theme: "bootstrap4",
                ajax: {
                    url: "{{ url('/search-airlines') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: data => ({ results: data })
                }
            });
        }
        initAirlineSelect('.airline-select');
        $(document).on('click', '#removeFlight', function () {
            var val = $('#ad_more').val();
            val = parseInt(val) - 1;
            if(val<1)
                val = 1;
            $('#ad_more').val(val);
            $(this).closest('#inputFormRow').remove();
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
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
