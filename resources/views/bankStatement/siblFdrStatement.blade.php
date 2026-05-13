@extends('mainLayout.layout')
@section('title','Trip Designer || SIBL FDR Statement')
@section('statement','active')
@section('bankDetailsMenu','menu-open')
@section('siblFdrStatement','active')

@section('content')
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SIBL FDR Statement Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">SIBL FDR Statement</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Statement of Account Information</h3>
                </div>

                <form action="{{ route('siblFdrStatement.generate') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="row">

                            <!-- Customer Info -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Holder Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="e.g. JANNATUL TANZIM" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Address</label>
                                    <input type="text" name="address" class="form-control"
                                        placeholder="e.g. 139/A, 4/A, Hazaribagh, Jigatala" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control"
                                        placeholder="e.g. Dhaka">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="e.g. 017xxxxxxxx">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Statement From</label>
                                    <input type="date" 
                                        name="period_from" 
                                        class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Statement To</label>
                                    <input type="date" 
                                        name="period_to" 
                                        class="form-control"
                                        required>
                                </div>
                            </div>

                            <hr class="w-100">

                            <!-- Account Info -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="text" name="ac_no" class="form-control"
                                        placeholder="e.g. 4009 53600006029" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account Type</label>
                                    <input type="text" name="ac_type" class="form-control"
                                        placeholder="e.g. Mudaraba Term Deposit Receipt 1 Month">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <input type="text" name="currency" class="form-control"
                                        placeholder="e.g. BDT">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account Status</label>
                                    <input type="text" name="ac_status" class="form-control"
                                        placeholder="e.g. Regular">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Generation Date & Time</label>
                                    <input type="datetime-local"
                                        name="generation_date"
                                        class="form-control"
                                        value="{{ now()->format('Y-m-d\TH:i') }}"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Maturity Date</label>
                                    <input type="date"
                                        name="maturity_date"
                                        class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account Open Date</label>
                                    <input type="date"
                                        name="open_date"
                                        class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Opening Balance</label>
                                    <input type="text" name="opening_balance" class="form-control"
                                        placeholder="e.g. 5,600,000.00" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <input type="text" name="branch_name" class="form-control"
                                        placeholder="e.g. Bangshal Branch, Dhaka">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fas fa-file-pdf"></i> Generate Statement PDF
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </section>

</div>
@endsection