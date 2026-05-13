@extends('mainLayout.layout')
@section('title','Trip Designer || Leave Adjustment')
@section('hr','active')
@section('leave-adjustment','active')
@section('hrMenu','menu-open')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Leave Adjustment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Leave Adjustment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                @if(session('successMessage'))
                    <div class="alert alert-success">{{ session('successMessage') }}</div>
                @endif
                @if(session('errorMessage'))
                    <div class="alert alert-danger">{{ session('errorMessage') }}</div>
                @endif

                <div class="card card-success shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-balance-scale mr-1"></i> Add / Deduct Employee Leave</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('leave-adjustment') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Employee</label>
                                    <select name="employee_id" class="form-control select2bs4" required>
                                        <option value="">Select Employee</option>
                                        @foreach($employees as $emp)
                                            <option value="{{ $emp->id }}">{{ $emp->name }} ({{ $emp->email }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Leave Category</label>
                                    <select name="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <option value="Casual Leave">Casual Leave</option>
                                        <option value="Seek Leave">Seek Leave</option>
                                        <option value="Marriage Leave">Marriage Leave</option>
                                        <option value="Fatherhood Leave">Fatherhood Leave</option>
                                        <option value="Motherhood Leave">Motherhood Leave</option>
                                        <option value="Earned Leave">Earned Leave</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="add">Add</option>
                                        <option value="deduct">Deduct</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Days</label>
                                    <input type="number" name="days" min="1" class="form-control" required>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label>Cause / Reason</label>
                                    <textarea name="cause" class="form-control" rows="3" placeholder="Enter reason for leave adjustment..." required></textarea>
                                </div>

                                <div class="col-md-12 mt-3 text-right">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check mr-1"></i> Update Leave
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Employee leave summary -->
                <div class="card card-info mt-4">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list mr-1"></i> Current Leave Balances</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover table-sm text-center">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Casual</th>
                                <th>Sick</th>
                                <th>Marriage</th>
                                <th>Fatherhood</th>
                                <th>Motherhood</th>
                                <th>Earned</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $emp)
                                <tr>
                                    <td style="text-align: left;">{{ $emp->name }}</td>
                                    <td>{{ $emp->casual_leave }}</td>
                                    <td>{{ $emp->seek_leave }}</td>
                                    <td>{{ $emp->marriage_leave }}</td>
                                    <td>{{ $emp->fatherhood }}</td>
                                    <td>{{ $emp->motherhood }}</td>
                                    <td>{{ $emp->earned_leave }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $('.select2bs4').select2({ theme: 'bootstrap4' });
    </script>
@endsection
