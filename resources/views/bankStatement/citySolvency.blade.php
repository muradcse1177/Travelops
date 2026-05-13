@extends('mainLayout.layout')
@section('title','Trip Designer || Statement Management')
@section('statement','active')
@section('bankDetailsMenu','menu-open')
@section('citySolvency','active')
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
                                {{ Form::open(array('url' => 'generateCityPDF',  'method' => 'post' ,'class' =>'form-horizontal' , 'enctype' => 'multipart/form-data')) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-3">
                                        <label>Branch</label>
                                        <input type="text" name="branch" class="form-control" placeholder="e.g. PROGATI SARANI" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Routing</label>
                                        <input type="text" name="routing" class="form-control" placeholder="e.g. 225263701" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Account Opening Date</label>
                                        <input type="date" name="opening_date" class="form-control" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control" placeholder="e.g. T DESIGNER" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Account Holder Address</label>
                                        <textarea name="holder_address" class="form-control" rows="2" placeholder="Full address of account holder" required></textarea>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Nature of Account</label>
                                        <input type="text" name="account_type" class="form-control" placeholder="e.g. Savings" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Account No</label>
                                        <input type="text" name="account_no" class="form-control" placeholder="e.g. 1254389657001" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Account Status</label>
                                        <input type="text" name="status" class="form-control" placeholder="e.g. Active" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Currency</label>
                                        <select name="currency" id="currency" class="form-control" required>
                                            <option value="">Select Currency</option>
                                            <option value="BDT">BDT</option>
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Balance</label>
                                        <input type="text" name="balance" class="form-control" placeholder="e.g. 76629.97" required>
                                    </div>
                                     <!-- USD / EUR extra fields -->
                                    <div class="col-sm-3 d-none" id="rate_div">
                                        <label>Today Rate (BDT → USD/EUR)</label>
                                        <input type="number" step="0.0001" id="rate" name="rate" class="form-control" placeholder="e.g. 110">
                                    </div>

                                    <div class="col-sm-3 d-none" id="converted_div">
                                        <label>Total Conversion Amount</label>
                                        <input type="text" step="0.0001" id="converted_amount" name="converted_amount" class="form-control" placeholder="e.g. 696.63">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Solvency Type</label>
                                        <select name="type" class="form-control" required>
                                            <option value="">Select Solvency Type</option>
                                            <option value="physical">Physical</option>
                                            <option value="online">Online</option>
                                        </select>
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
<script>
    const currency = document.getElementById('currency');
    const rateDiv = document.getElementById('rate_div');
    const convertedDiv = document.getElementById('converted_div');
    const rateInput = document.getElementById('rate');
    const bdtInput = document.getElementById('bdt_amount');
    const convertedInput = document.getElementById('converted_amount');

    currency.addEventListener('change', function () {
        if (this.value === 'USD' || this.value === 'EUR') {
            rateDiv.classList.remove('d-none');
            convertedDiv.classList.remove('d-none');
        } else {
            rateDiv.classList.add('d-none');
            convertedDiv.classList.add('d-none');
            convertedInput.value = '';
        }
    });

    function calculateConversion() {
        const bdt = parseFloat(bdtInput.value);
        const rate = parseFloat(rateInput.value);

        if (!isNaN(bdt) && !isNaN(rate) && rate > 0) {
            convertedInput.value = (bdt / rate).toFixed(4);
        }
    }

    bdtInput.addEventListener('input', calculateConversion);
    rateInput.addEventListener('input', calculateConversion);
</script>

@endsection
