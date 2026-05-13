@extends('mainLayout.layout')
@section('title','Trip Designer || Course Sales Report')
@section('report','active')
@section('courseSaleReport','active')
@section('reportMenu','menu-open')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Course Sales Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Course Sales Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $hasFilters = request()->filled('date_from') || request()->filled('date_to') ||
                                          request()->filled('transaction_id') || request()->filled('name') ||
                                          request()->filled('phone') || request()->filled('email') ||
                                          request()->filled('status');
                        @endphp

                        <div class="card">
                            <div class="card-header bg-gradient-primary">
                                <h3 class="card-title"><i class="fas fa-chart-line"></i> Course Sale Report</h3>
                                {{-- right side buttons --}}
                                <div class="card-tools">
                                    <div class="btn-group">
                                        {{-- Toggle Filters --}}
                                        <button class="btn btn-warning btn-sm" type="button"
                                                data-toggle="collapse" data-target="#filterCollapse"
                                                aria-expanded="{{ $hasFilters ? 'true' : 'false' }}"
                                                aria-controls="filterCollapse" id="filterToggle">
                                            <i class="fas fa-filter mr-1"></i> <span class="txt">Show Filters</span>
                                        </button>
                                        <a href="{{ route('course.sale.report.pdf', request()->query()) }}"
                                           class="btn btn-danger btn-sm">
                                            <i class="fas fa-file-pdf"></i> Export PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="collapse {{ $hasFilters ? 'show' : '' }}" id="filterCollapse">
                                    <div class="card card-body border">
                                        <form method="GET" action="{{ route('course.sale.report') }}">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Date From</label>
                                                    <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Date To</label>
                                                    <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Transaction ID</label>
                                                    <input type="text" name="transaction_id" value="{{ request('transaction_id') }}" class="form-control" placeholder="TRD_...">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Name</label>
                                                    <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Customer name">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Phone</label>
                                                    <input type="text" name="phone" value="{{ request('phone') }}" class="form-control" placeholder="8801...">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Email</label>
                                                    <input type="email" name="email" value="{{ request('email') }}" class="form-control" placeholder="name@email.com">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Variation</label>
                                                    <select name="variation" class="form-control">
                                                        <option value="">All</option>
                                                        <option value="ebook" {{ request('variation')=='ebook' ? 'selected' : '' }}>Ebook</option>
                                                        <option value="recorded" {{ request('variation')=='recorded' ? 'selected' : '' }}>Recorded</option>
                                                        <option value="live" {{ request('variation')=='live' ? 'selected' : '' }}>Live</option>
                                                        <option value="physical" {{ request('variation')=='physical' ? 'selected' : '' }}>Physical</option>
                                                        <option value="one_to_one_online" {{ request('variation')=='one_to_one_online' ? 'selected' : '' }}>One-to-One Online</option>
                                                        <option value="one_to_one_physical" {{ request('variation')=='one_to_one_physical' ? 'selected' : '' }}>One-to-One Physical</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="mb-1">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">All</option>
                                                        <option value="Complete" {{ request('status')=='Complete' ? 'selected' : '' }}>Complete</option>
                                                        <option value="Pending"  {{ request('status')=='Pending'  ? 'selected' : '' }}>Pending</option>
                                                        <option value="Canceled" {{ request('status')=='Canceled' ? 'selected' : '' }}>Canceled</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mt-2 text-right">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-filter"></i> Apply
                                                </button>
                                                <a href="{{ route('course.sale.report') }}" class="btn btn-outline-secondary">
                                                    <i class="fas fa-redo"></i> Reset
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="info-box bg-success">
                                            <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Total Orders</span>
                                                <span class="info-box-number">{{ $summary['total_orders'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box bg-primary">
                                            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Total Amount</span>
                                                <span class="info-box-number">{{ number_format($summary['total_amount'], 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box bg-info">
                                            <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Completed Orders</span>
                                                <span class="info-box-number">{{ $summary['completed_orders'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box bg-teal">
                                            <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Successful Payment</span>
                                                <span class="info-box-number">
                                                    {{ number_format($summary['complete_amount'] ?? 0, 2) }} BDT
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Pending Orders</span>
                                                <span class="info-box-number">{{ $summary['pending_orders'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info-box bg-danger">
                                            <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Pending Amount</span>
                                                <span class="info-box-number">
                                                    {{ number_format($summary['pending_amount'] ?? 0, 2) }} BDT
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-hover table-striped table-bordered text-center">
                                    <thead class="bg-gradient-info text-white">
                                    <tr>
                                        <th style="width: 60px">SL</th>
                                        <th>Transaction ID</th>
                                        <th>User</th>
                                        <th>Course Name</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Gateway</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $orders->firstItem() + $loop->index }}</td>
                                            <td>{{ $order->transaction_id }}</td>
                                            <td class="text-left">
                                                <strong>{{ $order->name }}</strong><br>
                                                <small>
                                                    <i class="fas fa-envelope text-muted"></i> {{ $order->email }} <br>
                                                    <i class="fas fa-phone text-muted"></i> {{ $order->phone }}
                                                </small>
                                            </td>
                                            <td>
                                                @php
                                                   $p_profile =  json_decode($order->product_profile);
                                                @endphp
                                                <span class="badge badge-info">{{ $order->product_name }}</span>
                                                <span class="badge badge-primary">{{ $p_profile->variation->title }}</span>
                                            </td>
                                            <td>
                                                <span class="badge
                                                    @if($order->status == 'Complete') badge-success
                                                    @elseif($order->status == 'Pending') badge-warning
                                                    @else badge-danger @endif">
                                                    {{ $order->status }}
                                                </span>
                                            </td>
                                            <td><strong>{{ number_format($order->amount,2) }} {{ $order->currency }}</strong></td>
                                            <td>{{ ucfirst($order->gateway) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->time)->format('d M, Y h:i A') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var $c = $('#filterCollapse');
                var $btn = $('#filterToggle');

                function updateTxt(){
                    var open = $c.hasClass('show');
                    $btn.find('span.txt').text(open ? 'Hide Filters' : 'Show Filters');
                    $btn.find('i.fas').toggleClass('fa-filter', !open).toggleClass('fa-times', open);
                }
                $c.on('shown.bs.collapse hidden.bs.collapse', updateTxt);
                updateTxt();
            });
        </script>
    @endpush
@endsection
