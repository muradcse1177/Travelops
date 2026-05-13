@extends('mainLayout.layout')
@section('title','Trip Designer || Statement Management')
@section('statement','active')
@section('bankDetailsMenu','menu-open')
@section('bracSolvency','active')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bank Solvency Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Bank Solvency Management</li>
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
                                {{ Form::open(array('url' => 'bracSolvencyGenerate',  'method' => 'post' ,'class' =>'form-horizontal' , 'enctype' => 'multipart/form-data')) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <!-- Issue Date -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Issue Date</label>
                                            <input type="date" name="issue_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Reference No -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Reference No</label>
                                            <input type="text" name="reference_no" class="form-control" placeholder="Enter Reference No" required>
                                        </div>
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="number" name="account_number" class="form-control" placeholder="Enter Account Number" required>
                                        </div>
                                    </div>

                                    <!-- Account Title -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Account Title</label>
                                            <input type="text" name="account_title" class="form-control" placeholder="Enter Account Title" required>
                                        </div>
                                    </div>

                                    <!-- Account Holder Name -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Account Holder's Name</label>
                                            <input type="text" name="account_holder" class="form-control" placeholder="Enter Account Holder Name" required>
                                        </div>
                                    </div>

                                    <!-- Account Currency -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Account Currency</label>
                                            <input type="text" name="account_currency" class="form-control" value="BDT" required>
                                        </div>
                                    </div>

                                    <!-- Type of Account -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Type of Account</label>
                                            <input type="text" name="account_type" class="form-control" placeholder="e.g. CURRENT AC" required>
                                        </div>
                                    </div>

                                    <!-- Account Status -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Account Status</label>
                                            <input type="text" name="account_status" class="form-control" placeholder="e.g. ACTIVE" required>
                                        </div>
                                    </div>

                                    <!-- Account Open Date -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Account Open Date</label>
                                            <input type="date" name="account_open_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Branch Name -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Branch Name</label>
                                            <input type="text" name="branch_name" class="form-control" placeholder="Enter Branch Name" required>
                                        </div>
                                    </div>

                                    <!-- Balance As on Date -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Balance As on Date</label>
                                            <input type="date" name="balance_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <!-- Issued By -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Issued By</label>
                                            <input type="number" name="issued_by" class="form-control" placeholder="Enter Issuer ID e.g 1311" required>
                                        </div>
                                    </div>
                                    <!-- Balance Amount -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Balance Amount</label>
                                            <input type="number" name="balance_amount" class="form-control"
                                                   placeholder="Enter Balance Amount" required step="0.01">
                                        </div>
                                    </div>

                                    <!-- Balance Amount in Words -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Balance Amount (in words)</label>
                                            <textarea name="balance_in_words" class="form-control" rows="2" placeholder="Enter Balance Amount in Words"></textarea>
                                        </div>
                                    </div>

                                    <!-- Communication Address -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Communication Address</label>
                                            <textarea name="communication_address" class="form-control" rows="2" placeholder="Enter Communication Address"></textarea>
                                        </div>
                                    </div>

                                    <!-- Branch Address -->
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Branch Address</label>
                                            <textarea name="branch_address" class="form-control" rows="2" placeholder="Enter Branch Address"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning float-right">Generate Solvency</button>
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

@endsection
