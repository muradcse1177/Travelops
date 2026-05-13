@extends('mainLayout.layout')
@section('title','Trip Designer || Statement Management')
@section('statement','active')
@section('bankDetailsMenu','menu-open')
@section('cityStatement','active')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bank Statement Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Bank Statement Management</li>
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
                                <h3 class="card-title">User Info</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                {{ Form::open(array('url' => 'generateCityStatement',  'method' => 'post' ,'class' =>'form-horizontal' , 'enctype' => 'multipart/form-data')) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="form-group col-sm-3">
                                        <label for="bankBranch">Bank Branch</label>
                                        <input type="text" class="form-control" id="bankBranch" name="bankBranch" placeholder="Enter Bank Branch">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="branchAddress">Branch Address</label>
                                        <textarea class="form-control" id="branchAddress" name="branchAddress" rows="2" placeholder="Enter Branch Address"></textarea>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="accountName">Account Name</label>
                                        <input type="text" class="form-control" id="accountName" name="accountName" placeholder="Enter Account Name">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="accountAddress">Address</label>
                                        <textarea class="form-control" id="accountAddress" name="accountAddress" rows="2" placeholder="Enter Address"></textarea>
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="printDate">Print Date</label>
                                        <input type="date" class="form-control" id="printDate" name="printDate">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="periodFrom">Period From (Date Range)</label>
                                        <input type="text" class="form-control" id="periodFrom" name="periodFrom" placeholder="e.g. 01-01-2025 to 14-07-2025">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="accountNumber">Account Number</label>
                                        <input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="Enter Account Number">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="customerId">Customer ID</label>
                                        <input type="text" class="form-control" id="customerId" name="customerId" placeholder="Enter Customer ID">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="productName">Product Name</label>
                                        <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="currency">Currency</label>
                                        <input type="text" class="form-control" id="currency" name="currency" placeholder="e.g. BDT">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="currency">Total Transaction Number </label>
                                        <input type="number" class="form-control" id="transaction" name="transaction" placeholder="e.g. 30">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="currency">Opening Balance </label>
                                        <input type="number" class="form-control" step="0.01" id="openingBalance" name="openingBalance" placeholder="e.g. 130000">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Routing</label>
                                        <input type="text" name="routing" class="form-control" placeholder="e.g. 225263701" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" name="statement_type" value="online" class="btn btn-primary">
                                        Online Statement
                                    </button>
                                    <button type="submit" name="statement_type" value="physical" class="btn btn-success">
                                        Physical Statement
                                    </button>
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
        $(function () {
            $('#periodFrom').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                },
                opens: 'left'
            });
        });
    </script>
@endsection
