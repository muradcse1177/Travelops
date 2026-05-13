@extends('mainLayout.layout')
@section('title','Trip Designer || Edit Service Invoice')
@section('newServicePackage','active')
@section('serviceMenu','menu-open')
@section('Services','active')

@section('content')
    <div class="content-wrapper">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Service Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('newServicePackage')}}">Service Invoice</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Edit Form -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Update Service Invoice</h3>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['url' => 'updateServiceInvoice', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) }}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $invoice->id }}">

                        <div class="card-body row">

                            <!-- Country -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control select2bs4" name="country_id" required>
                                        @foreach($countries as $c)
                                            <option value="{{$c->id}}" {{ $invoice->country_id == $c->id ? 'selected' : '' }}>
                                                {{$c->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Service -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Service</label>
                                    <select class="form-control select2bs4" name="service_id" required>
                                        @foreach($services as $s)
                                            <option value="{{$s->id}}" {{ $invoice->service_id == $s->id ? 'selected' : '' }}>
                                                {{$s->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Passenger -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Service Holder (Passenger)</label>
                                    <select class="form-control select2bs4" name="passenger_id" required>
                                        @foreach($passengers as $p)
                                            <option value="{{$p->id}}" {{ $invoice->passenger_id == $p->id ? 'selected' : '' }}>
                                                {{$p->f_name}} {{$p->l_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Vendor -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <select class="form-control select2bs4" name="vendor_id" required>
                                        @foreach($vendors as $vendor)
                                            <option value="{{$vendor->id}}" {{ $invoice->vendor_id == $vendor->id ? 'selected' : '' }}>
                                                {{$vendor->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Service Type -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Service Type</label>
                                    <select class="form-control select2bs4" name="service_type" id="service_type" required>
                                        <option value="One Time" {{ $invoice->service_type == 'One Time' ? 'selected' : '' }}>One Time</option>
                                        <option value="Installment" {{ $invoice->service_type == 'Installment' ? 'selected' : '' }}>Installment</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Installment Months -->
                            <div class="col-sm-3 installment-field" style="{{ $invoice->service_type=='Installment'?'':'display:none;' }}">
                                <div class="form-group">
                                    <label>Installment Months</label>
                                    <select class="form-control" id="installment_months" name="installment_months">
                                        <option value="">Select Months</option>
                                        @for($i=1; $i<=12; $i++)
                                            <option value="{{ $i }}" {{ $invoice->installment_months == $i ? 'selected' : '' }}>
                                                {{ $i }} Month{{ $i>1?'s':'' }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <!-- Dynamic Installment Input -->
                            <div class="col-12" id="installmentInputs">
                                @php
                                    $amounts = json_decode($invoice->installment_amounts,true);
                                    $dues = json_decode($invoice->installment_dues,true);
                                    $charges = json_decode($invoice->installment_charges,true);
                                @endphp

                                @if($invoice->service_type=='Installment' && !empty($amounts))
                                    <div class="card bg-light mb-3 border-left border-info">
                                        <div class="card-body py-2 px-3">
                                            <h5 class="mb-0 text-info">
                                                <i class="fas fa-calendar-alt mr-2"></i> Existing Installments
                                            </h5>
                                        </div>
                                    </div>

                                    @foreach($amounts as $k => $amt)
                                        <div class="col-md-12 border p-2 mb-2 rounded bg-white">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label>Month {{ $k+1 }} - Installment</label>
                                                        <input type="number" name="installment_amounts[]" value="{{ $amt }}" step="0.01" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label>Month {{ $k+1 }} - Due</label>
                                                        <input type="number" name="installment_dues[]" value="{{ $dues[$k] ?? 0 }}" step="0.01" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label>Month {{ $k+1 }} - Charge</label>
                                                        <input type="number" name="installment_charges[]" value="{{ $charges[$k] ?? 0 }}" step="0.01" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Total & Fare -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Total Solvency Amount</label>
                                    <input type="number" class="form-control" name="total_solvency_amount" step="0.01" value="{{ $invoice->total_solvency_amount }}" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Agent Fare</label>
                                    <input type="number" class="form-control" name="agent_fare" value="{{ $invoice->agent_fare }}">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Client Fare</label>
                                    <input type="number" class="form-control" name="client_fare" value="{{ $invoice->client_fare }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Agent Due</label>
                                    <input type="number" class="form-control" name="agent_due" placeholder="Enter agent due"  value="{{ $invoice->agent_due }}" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Client Due</label>
                                    <input type="number" class="form-control" name="client_due" placeholder="Enter client due" value="{{ $invoice->client_due }}" required>
                                </div>
                            </div>

                            <!-- Client Payment -->
                            <div class="col-12">
                                <div class="card bg-light mb-3 border-left border-primary">
                                    <div class="card-body py-2 px-3">
                                        <h5 class="mb-0 text-primary"><i class="fas fa-user mr-2"></i> Client Payment Details</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client Payment Method</label>
                                    <textarea class="form-control" name="client_payment_method" rows="4">{{ $invoice->client_payment_method }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>Existing Client Payment Files:</label><br>
                                @php $clientFiles = json_decode($invoice->client_payment_files,true); @endphp
                                @if(!empty($clientFiles))
                                    <div class="mb-2">
                                        @foreach($clientFiles as $index => $file)
                                            <a href="{{ asset('public/'.$file) }}" target="_blank" class="text-primary d-block">
                                                <i class="fas fa-file-alt"></i> File {{ $index + 1 }}
                                            </a>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted">No client files uploaded</span>
                                @endif

                                <div id="clientFileInputs" class="mt-2">
                                    <label>Add More Client Files</label>
                                    <div class="input-group mb-2">
                                        <input type="file" name="client_payment_files[]" accept=".jpg,.jpeg,.png,.pdf,.docx" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-success btn-add-client-file" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Vendor Payment -->
                            <div class="col-12">
                                <div class="card bg-light mb-3 border-left border-warning">
                                    <div class="card-body py-2 px-3">
                                        <h5 class="mb-0 text-warning"><i class="fas fa-truck mr-2"></i> Vendor Payment Details</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Vendor Payment Method</label>
                                    <textarea class="form-control" name="vendor_payment_method" rows="4">{{ $invoice->vendor_payment_method }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>Existing Vendor Payment Files:</label><br>
                                @php $vendorFiles = json_decode($invoice->vendor_payment_files,true); @endphp
                                @if(!empty($vendorFiles))
                                    <div class="mb-2">
                                        @foreach($vendorFiles as $index => $file)
                                            <a href="{{ asset('public/'.$file) }}" target="_blank" class="text-warning d-block">
                                                <i class="fas fa-file-invoice"></i> File {{ $index + 1 }}
                                            </a>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted">No vendor files uploaded</span>
                                @endif

                                <div id="vendorFileInputs" class="mt-2">
                                    <label>Add More Vendor Files</label>
                                    <div class="input-group mb-2">
                                        <input type="file" name="vendor_payment_files[]" accept=".jpg,.jpeg,.png,.pdf,.docx" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-success btn-add-vendor-file" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning float-right">Update</button>
                            <a href="{{ url('newServicePackage') }}" class="btn btn-secondary float-left">Back</a>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $('.select2bs4').select2({ theme: 'bootstrap4' });

        // Toggle installment fields dynamically
        $('#service_type').on('change', function(){
            if($(this).val() === 'Installment'){
                $('.installment-field').show();
            } else {
                $('.installment-field').hide();
                $('#installmentInputs').empty();
            }
        });

        // Add new file input dynamically
        $('#clientFileInputs').on('click', '.btn-add-client-file', function () {
            const newInput = `
            <div class="input-group mb-2">
                <input type="file" name="client_payment_files[]" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-danger btn-remove-file" type="button"><i class="fas fa-minus"></i></button>
                </div>
            </div>`;
                $('#clientFileInputs').append(newInput);
            });

            $('#vendorFileInputs').on('click', '.btn-add-vendor-file', function () {
                const newInput = `
            <div class="input-group mb-2">
                <input type="file" name="vendor_payment_files[]" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-danger btn-remove-file" type="button"><i class="fas fa-minus"></i></button>
                </div>
            </div>`;
            $('#vendorFileInputs').append(newInput);
        });

        $(document).on('click', '.btn-remove-file', function () {
            $(this).closest('.input-group').remove();
        });
    </script>
@endsection
