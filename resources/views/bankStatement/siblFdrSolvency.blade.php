@extends('mainLayout.layout')
@section('title','Trip Designer || SIBL FDR Solvency')
@section('statement','active')
@section('bankDetailsMenu','menu-open')
@section('siblFdrSolvency','active')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SIBL FDR Solvency Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">SIBL FDR Solvency</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Solvency Certificate Information</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('siblFdr.generate') }}" method="POST">
                                @csrf

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Reference Number</label>
                                            <input type="text" name="reference_no" class="form-control"
                                                placeholder="SJIBPLC/BANGSHAL/GB/2026" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Print Date</label>
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Currency Name</label>
                                            <input type="text" name="currency_name" class="form-control"
                                                placeholder="BDT/GBP/AUD/USD/CAD/EUR" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Exchange Rate</label>
                                            <input type="text" name="rate" class="form-control" placeholder="169.42">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Holder Name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Account Holder Full Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="13/9-A, 4/A, Hazaribagh, Jigatala, Dhaka" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" name="ac_no" class="form-control"
                                                placeholder="4009 53600006029" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Account Balance</label>
                                            <input type="text" name="balance_bdt" class="form-control"
                                                placeholder="5,600,000.00" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Branch Name</label>
                                            <input type="text" name="branch" class="form-control"
                                                placeholder="Bangshal Branch" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right">
                                        Generate Solvency PDF
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
@endsection