@extends('mainLayout.layout')
@section('title','Trip Designer || Hotel Booking')
@section('hotelMenu','menu-open')
@section('hotel','active')
@section('hotelBooking','active')
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
                        <h1>Hotel Booking Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Hotel Booking Management</li>
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
                                <h3 class="card-title">Add New Hotel Booking</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                {{ Form::open(array('url' => 'createNewHotelBooking',  'method' => 'post' ,'class' =>'form-horizontal')) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Hotel Name</label>
                                            <input type="text" class="form-control" id="h_name" name="h_name" placeholder="Enter Hotel Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Hotel Address</label>
                                            <input type="text" class="form-control" id="h_address" name="h_address" placeholder="Enter Hotel Address" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Hotel Phone</label>
                                            <input type="text" class="form-control" id="h_phone" name="h_phone" placeholder="Enter Hotel Phone" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Reservation Number</label>
                                            <input type="text" class="form-control" id="reservation" name="reservation" placeholder="Reservation Number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Check In date</label>
                                            <div class="input-group date" id="start_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#start_date" name="check_in" placeholder="Enter check in date" required/>
                                                <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Check Out Date</label>
                                            <div class="input-group date" id="end_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#end_date" name="check_out" placeholder="Enter check out Date" required/>
                                                <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Booked Date</label>
                                            <div class="input-group date" id="b_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#b_date" name="b_date" placeholder="Enter booked Date" required/>
                                                <div class="input-group-append" data-target="#b_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Guest Number</label>
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
                                    <div class="col-sm-12 newPassenger" style="display: none;">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Agent Price</label>
                                            <input type="number" class="form-control" id="a_price" name="a_price" min="0" placeholder="Enter Agent Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Price</label>
                                            <input type="number" class="form-control" id="c_price" name="c_price" min="0"  placeholder="Enter Client Price" required>
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
                                        <div class="form-group">
                                            <label>Hotel Details & Policy</label>
                                            <textarea id="summernote" class="summernote" name="h_details">Place Write Here...</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group" style="background: #e7e7e1;">
                                            <label style="margin-left: 5px;">Payment  Details</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Payment Type</label>
                                            <select class="form-control select2bs4" name="p_type" id="p_type" style="width: 100%;" required>
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
                                                <input type="number" class="form-control" id="due_amount" name="due_amount" min="0" value="0" placeholder="Enter Due Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Payments Details</label>
                                            <textarea class="form-control" id="p_details" name="p_details" rows="5" placeholder="Write Payments Detail..."></textarea>
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
                        <div class="card card-primary shadow-sm mb-3">
                <div class="card-header">
                    <h3 class="card-title text-white">
                        <i class="fas fa-filter mr-1"></i> Filter Booking
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    {{ Form::open(['url' => 'hotelBooking', 'method' => 'get']) }}

                    <div class="row">

                        <!-- From Date -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>From Date</label>
                                <input type="date" name="from_date" class="form-control"
                                       value="{{ request('from_date') }}">
                            </div>
                        </div>

                        <!-- To Date -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>To Date</label>
                                <input type="date" name="to_date" class="form-control"
                                       value="{{ request('to_date') }}">
                            </div>
                        </div>

                        <!-- Reservation No -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Reservation No</label>
                                <input type="text" name="reservation" class="form-control"
                                       placeholder="Reservation Number"
                                       value="{{ request('reservation') }}">
                            </div>
                        </div>

                        <!-- Vendor -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Vendor</label>
                                <select name="vendor" class="form-control select2bs4">
                                    <option value="">-- All Vendors --</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->name }}"
                                            {{ request('vendor') == $vendor->name ? 'selected' : '' }}>
                                            {{ $vendor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Hotel Name -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hotel Name</label>
                                <input type="text" name="hotel_name" class="form-control"
                                       placeholder="Hotel Name"
                                       value="{{ request('hotel_name') }}">
                            </div>
                        </div>

                        <!-- Payment Status -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Payment Status</label>
                                <select name="payment_status" class="form-control">
                                    <option value="">-- All --</option>
                                    <option value="Paid" {{ request('payment_status')=='Paid' ? 'selected':'' }}>Paid</option>
                                    <option value="Due" {{ request('payment_status')=='Due' ? 'selected':'' }}>Due</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Filter Submit -->
                    <div class="row justify-content-end mt-2">
                        <div class="col-md-3">
                            <button class="btn btn-success btn-block" type="submit">
                                <i class="fas fa-search mr-1"></i> Apply Filter
                            </button>
                        </div>
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-info shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-hotel mr-1"></i> Hotel Booking Management
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">

                                        <thead class="bg-light">
                                        <tr>
                                            <th>S.L</th>
                                            <th>Booking Date</th>
                                            <th>Reservation Info</th>
                                            <th>Hotel Info</th>
                                            <th>Guest Details</th>
                                            <th>Price</th>
                                            <th>Due</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @php
                                            $i = 1;
                                            $j = 1;
                                        @endphp

                                        @foreach($bookings as $package)
                                            <tr>
                                                <td class="align-middle">{{$i}}</td>

                                                <td class="align-middle">
                                                    <span class="badge badge-info px-2 py-1">
                                                        <i class="fas fa-calendar-alt mr-1"></i> {{$package->b_date}}
                                                    </span>
                                                </td>

                                                <td class="align-middle">
                                                    <div><strong>Res No:</strong> {{$package->reservation}}</div>
                                                    <div><strong>Vendor:</strong> {{$package->vendor}}</div>
                                                </td>

                                                <td class="align-middle">
                                                    <div><strong>Name:</strong> {{$package->h_name}}</div>
                                                    <div><strong>Phone:</strong> {{$package->h_phone}}</div>
                                                </td>

                                                {{-- Guest Info --}}
                                                @php
                                                    $p = json_decode($package->pax);
                                                @endphp

                                                <td class="align-middle">
                                                    @foreach($p as $pas)

                                                        @php
                                                            $name = DB::table('passengers')
                                                                ->where('id',$pas)
                                                                ->where('upload_by',Session::get('agent_id'))
                                                                ->first();
                                                            $phone = @$name->phone;
                                                        @endphp

                                                        <div>
                                                            <i class="fas fa-user mr-1 text-primary"></i>
                                                            {{$j.'. '.@$name->f_name.' '.@$name->l_name}}
                                                        </div>

                                                        @php $j++; @endphp

                                                    @endforeach

                                                    <div class="text-muted mt-1">
                                                        <strong>Phone:</strong> {{ @$phone }}
                                                    </div>
                                                </td>

                                                <td class="align-middle">
                                                    <div><strong>A.Price:</strong> {{$package->a_price}}</div>
                                                    <div><strong>C.Price:</strong> {{$package->c_price + $package->vat + $package->ait}}</div>
                                                </td>

                                                {{-- Due --}}
                                                <td class="align-middle">
                                                    @if((int)$package->due_amount > 0)
                                                        <span class="badge badge-danger px-3 py-1">{{$package->due_amount}}</span>
                                                    @else
                                                        <span class="badge badge-success px-3 py-1">{{$package->due_amount}}</span>
                                                    @endif
                                                </td>

                                                {{-- Action --}}
                                                <td class="align-middle">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm">Action</button>
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown"></button>

                                                        <div class="dropdown-menu">

                                                            <a class="dropdown-item" href="{{url('viewHotelBooking?id='.$package->id)}}">
                                                                <i class="fas fa-eye text-primary mr-2"></i> View
                                                            </a>

                                                            <a class="dropdown-item" href="{{url('editHotelBookingPage?id='.$package->id)}}">
                                                                <i class="fas fa-edit text-warning mr-2"></i> Edit
                                                            </a>

                                                            <a class="dropdown-item" href="{{url('editHotelBookingPayment?id='.$package->id)}}">
                                                                <i class="fas fa-credit-card text-info mr-2"></i> Edit Payment
                                                            </a>

                                                            <a class="dropdown-item delete"
                                                            data-id="{{$package->id}}"
                                                            data-toggle="modal"
                                                            data-target="#modal-danger">
                                                                <i class="fas fa-trash text-danger mr-2"></i> Delete
                                                            </a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            @php
                                                $i++;
                                                $j = 1;
                                            @endphp

                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body">
                            <p style="text-align: center; font-size: 25px;">Are You Sure!!</p>
                        </div>
                        {{ Form::open(array('url' => 'deleteHotelBooking',  'method' => 'post')) }}
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
        $('#start_date,#end_date,#b_date').datetimepicker({
            format: 'YYYY-MM-DD',
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
        $('#pax_number').on('change', function() {
            var pax_value = this.value;
            $('.feedback').remove();
            var html= '<div class="row feedback">';
            for(var i=0; i<pax_value; i++){
                var pax_name = 'pax_name'+i;
                html += '<div class="col-md-4"> <div class="form-group"> <label>Passenger</label> <select class="form-control select2bs4" name="pax[]" id="'+pax_name+'" style="width: 100%;" required> <option value="">Select Passenger Name</option>';
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
    </script>
@endsection
