@extends('mainLayout.layout')
@section('title','Trip Designer || Service Invoice Management')
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
                        <h1>Service Invoice Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Service Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Add New Invoice -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Service Invoice</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                {{ Form::open(['url' => 'newServiceInvoiceCreate', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) }}
                                {{ csrf_field() }}

                                <div class="card-body row">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- Country -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select2bs4" name="country_id" required>
                                                <option value="">Select Country</option>
                                                @foreach($countries as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Service -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Service</label>
                                            <select class="form-control select2bs4" name="service_id" required>
                                                <option value="">Select Service</option>
                                                @foreach($services as $s)
                                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Passenger -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Service Holder (Passenger)</label>
                                            <select class="form-control select2bs4" name="passenger_id" required>
                                                <option value="">Select Passenger</option>
                                                @foreach($passengers as $p)
                                                    <option value="{{$p->id}}">{{$p->f_name}} {{$p->l_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Service Type -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Service Type</label>
                                            <select class="form-control select2bs4" name="service_type" id="service_type" required>
                                                <option value="">Select Type</option>
                                                <option value="One Time">One Time</option>
                                                <option value="Installment">Installment</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Installment Fields -->
                                    <div class="col-sm-3 installment-field" style="display:none;">
                                        <div class="form-group">
                                            <label>Installment Months</label>
                                            <select class="form-control" id="installment_months" name="installment_months">
                                                <option value="">Select Months</option>
                                                @for($i=1; $i<=12; $i++)
                                                    <option value="{{ $i }}">{{ $i }} Month{{ $i>1 ? 's' : '' }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Dynamic Input Area -->
                                    <div class="col-12" id="installmentInputs"></div>

                                    <!-- Total Cost & Charges -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total Solvency Amount</label>
                                            <input type="number" class="form-control" name="total_solvency_amount" step="0.01" placeholder="Enter total cost" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <select class="form-control select2bs4" name="vendor_id" id="vendor_id" required>
                                                <option value="">Select Vendor</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Agent Fare</label>
                                            <input type="number" class="form-control" name="agent_fare" placeholder="Enter agent fare"  required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Fare</label>
                                            <input type="number" class="form-control" name="client_fare" placeholder="Enter client fare" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Agent Due</label>
                                            <input type="number" class="form-control" name="agent_due" placeholder="Enter agent due"  required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Due</label>
                                            <input type="number" class="form-control" name="client_due" placeholder="Enter client due" required>
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
                                            <textarea class="form-control" name="client_payment_method" rows="4" placeholder="Enter client payment details..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Upload Client Payment Files</label>
                                            <div id="clientFileInputs">
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
                                            <textarea class="form-control" name="vendor_payment_method" rows="4" placeholder="Enter vendor payment details..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Upload Vendor Payment Files</label>
                                            <div id="vendorFileInputs">
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
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning float-right">Save</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- List -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-purple shadow-lg">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-list mr-2"></i>All Service Invoices</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th style="width:4%">#</th>
                                            <th>Date</th>
                                            <th>Country</th>
                                            <th>Service</th>
                                            <th>Client</th>
                                            <th>Vendor</th>
                                            <th class="text-right">Total Amount</th>
                                            <th class="text-center">Payment Plan</th>
                                            <th class="text-center">Due Plan</th>
                                            <th class="text-center">Payment Files</th>
                                            <th class="text-center" style="width:30%">Financials</th>
                                            <th class="text-center" style="width:8%">Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @php $i = 1; @endphp
                                        @forelse($invoices as $inv)
                                            @php
                                                $agentFare = $inv->agent_fare ?? 0;
                                                $clientFare = $inv->client_fare ?? 0;
                                                $profit = $clientFare - $agentFare;
                                            @endphp

                                            <tr>
                                                <td class="text-center align-middle">{{ $i++ }}</td>
                                                <td class="align-middle text-nowrap"> {{ \Carbon\Carbon::parse($inv->created_at)->format('d-M-Y') }}</td>
                                                <td class="align-middle">{{ $inv->country_name ?? 'N/A' }}</td>
                                                <td class="align-middle">{{ $inv->service_name ?? 'N/A' }}</td>

                                                <!-- Client Info -->
                                                <td class="align-middle">
                                                    <strong>{{ $inv->client_name ?? 'N/A' }}</strong><br>
                                                    @if($inv->client_phone)
                                                        <i class="fas fa-phone-alt text-muted"></i>
                                                        <span class="text-primary">{{ $inv->client_phone }}</span><br>
                                                    @endif
                                                    @if($inv->client_email)
                                                        <i class="fas fa-envelope text-muted"></i>
                                                        <span class="text-secondary">{{ $inv->client_email }}</span>
                                                    @endif
                                                </td>

                                                <!-- Vendor -->
                                                <td class="align-middle">{{ $inv->vendor_name ?? 'N/A' }}</td>

                                                <!-- Total -->
                                                <td class="text-right align-middle">
                                                    {{ number_format($inv->total_solvency_amount ?? 0, 2) }}
                                                </td>

                                                <!-- Payment Plan -->
                                                <td class="align-middle text-center">
                                                    @php $installments = json_decode($inv->installment_amounts, true); @endphp
                                                    @if(!empty($installments))
                                                        <span class="badge badge-info">
                            {{ count($installments) }} Month{{ count($installments)>1?'s':'' }}
                        </span><br>
                                                        <small>
                                                            @foreach($installments as $k=>$amt)
                                                                M{{ $k+1 }}: {{ number_format($amt,2) }}<br>
                                                            @endforeach
                                                        </small>
                                                    @else
                                                        <span class="text-muted">One Time</span>
                                                    @endif
                                                </td>

                                                <!-- Due Plan -->
                                                <td class="align-middle text-center">
                                                    @php $dues = json_decode($inv->installment_dues, true); @endphp
                                                    @if(!empty($dues))
                                                        <span class="badge badge-warning">{{ count($dues) }} Month{{ count($dues)>1?'s':'' }}</span><br>
                                                        <small>
                                                            @foreach($dues as $k=>$due)
                                                                M{{ $k+1 }}: {{ number_format($due,2) }}<br>
                                                            @endforeach
                                                        </small>
                                                    @else
                                                        <span class="text-muted">No Due</span>
                                                    @endif
                                                </td>

                                                <!-- Payment Files -->
                                                <td class="align-middle">
                                                    @php
                                                        $clientFiles = json_decode($inv->client_payment_files, true);
                                                        $vendorFiles = json_decode($inv->vendor_payment_files, true);
                                                    @endphp

                                                    @if(!empty($clientFiles))
                                                        <div class="mb-2">
                                                            <span class="badge badge-primary"><i class="fas fa-user"></i> Client</span><br>
                                                            @foreach($clientFiles as $iF => $file)
                                                                <a href="{{ asset('public/'.$file) }}" target="_blank" class="text-primary d-block">
                                                                    <i class="fas fa-file-alt"></i> File {{ $iF+1 }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    @if(!empty($vendorFiles))
                                                        <div>
                                                            <span class="badge badge-warning text-dark"><i class="fas fa-truck"></i> Vendor</span><br>
                                                            @foreach($vendorFiles as $vF => $file)
                                                                <a href="{{ asset('public/'.$file) }}" target="_blank" class="text-warning d-block">
                                                                    <i class="fas fa-file-invoice"></i> File {{ $vF+1 }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    @if(empty($clientFiles) && empty($vendorFiles))
                                                        <span class="text-muted">No Files</span>
                                                    @endif
                                                </td>

                                                <!-- Financials (Agent + Client + Profit) -->
                                                <td class="align-middle text-nowrap" style="min-width: 250px;">

                                                    <div class="row text-right">

                                                        {{-- Agent Side --}}
                                                        <div class="col-6 border-right">
                                                            <div><strong>Agent</strong></div>
                                                            <div>Fare: {{ number_format($agentFare, 2) }}</div>
                                                            <div class="text-danger">
                                                                Due: {{ number_format($inv->agent_due ?? 0, 2) }}
                                                            </div>
                                                        </div>

                                                        {{-- Client Side --}}
                                                        <div class="col-6">
                                                            <div><strong>Client</strong></div>
                                                            <div>Fare: {{ number_format($clientFare, 2) }}</div>
                                                            <div class="text-warning">
                                                                Due: {{ number_format($inv->client_due ?? 0, 2) }}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    {{-- Profit (Full Width) --}}
                                                    <div class="text-center mt-2">
                                                        <strong>Profit:</strong>
                                                        <span class="badge badge-{{ $profit >= 0 ? 'success' : 'danger' }}">
                                                            {{ number_format($profit, 2) }}
                                                        </span>
                                                    </div>

                                                </td>


                                                <!-- Actions -->
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @if(!empty($inv->slug))
                                                                <a class="dropdown-item" href="{{ url('services/'.$inv->slug) }}" target="_blank">
                                                                    <i class="fas fa-eye text-info"></i> View
                                                                </a>
                                                            @else
                                                                <span class="dropdown-item text-muted">
                                                                <i class="fas fa-eye-slash"></i> No Slug Found
                                                            </span>
                                                            @endif

                                                            <a class="dropdown-item" href="{{ url('editServiceInvoice?id='.$inv->id) }}">
                                                                <i class="fas fa-edit text-warning"></i> Edit
                                                            </a>

                                                            <!-- ✅ New: Download PDF -->
                                                            <a class="dropdown-item" href="{{ url('downloadServiceInvoice?id='.$inv->id) }}" target="_blank">
                                                                <i class="fas fa-file-pdf text-danger"></i> Invoice
                                                            </a>

                                                            <a class="dropdown-item delete"
                                                               data-id="{{ $inv->id }}"
                                                               data-toggle="modal"
                                                               data-target="#modal-danger"
                                                               href="#">
                                                                <i class="fas fa-trash text-danger"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>


                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center text-muted py-4">
                                                    <i class="fas fa-info-circle"></i> No service invoices found.
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="modal-danger">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-body text-center">
                                <p style="font-size: 20px;">Are you sure you want to delete?</p>
                            </div>
                            {{ Form::open(['url' => 'newServiceInvoiceDelete', 'method' => 'post']) }}
                            {{ csrf_field() }}
                            <div class="modal-footer justify-content-between">
                                <input type="hidden" name="id" class="id">
                                <button type="submit" class="btn btn-outline-light">Delete</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $('.select2bs4').select2({ theme: 'bootstrap4' });

        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('.id').val(id);
        });

        // Toggle installment fields
        $('#service_type').on('change', function(){
            if($(this).val() === 'Installment'){
                $('.installment-field').show();
            } else {
                $('.installment-field').hide();
                $('#installmentInputs').empty();
            }
        });

        // Generate dynamic installment rows
        $('#installment_months').on('change', function(){
            var months = parseInt($(this).val());
            var container = $('#installmentInputs');
            container.empty();

            if(!isNaN(months) && months > 0){
                let html = `
                <div class="">
                    <div class="card bg-light mb-3 border-left border-info">
                        <div class="card-body py-2 px-3">
                            <h5 class="mb-0 text-info">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Installment Details (${months} Months)
                            </h5>
                        </div>
                    </div>
                </div>`;

                for(let i=1; i<=months; i++){
                    html += `
                    <div class="col-md-12 border p-2 mb-2 rounded bg-white">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label>Month ${i} - Installment</label>
                                    <input type="number" name="installment_amounts[]" class="form-control" step="0.01" placeholder="Enter amount" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label>Month ${i} - Due</label>
                                    <input type="number" name="installment_dues[]" class="form-control" step="0.01" placeholder="Enter due">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label>Month ${i} - Service Charge</label>
                                    <input type="number" name="installment_charges[]" class="form-control" step="0.01" placeholder="Enter charge">
                                </div>
                            </div>
                        </div>
                    </div>`;
                }
                container.append(html);
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            // Add more client file input
            $('#clientFileInputs').on('click', '.btn-add-client-file', function () {
                const newInput = `
        <div class="input-group mb-2">
            <input type="file" name="client_payment_files[]" accept=".jpg,.jpeg,.png,.pdf,.docx" class="form-control" required>
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
            <input type="file" name="vendor_payment_files[]" accept=".jpg,.jpeg,.png,.pdf,.docx" class="form-control" required>
            <div class="input-group-append">
                <button class="btn btn-danger btn-remove-file" type="button">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>`;
                $('#vendorFileInputs').append(newInput);
            });

            // Remove any file input
            $(document).on('click', '.btn-remove-file', function () {
                $(this).closest('.input-group').remove();
            });
        });
    </script>

@endsection
