@extends('mainLayout.layout')
@section('title','Trip Designer || Service Leads Report')
@section('report','active')
@section('serviceLeadsReport','active')
@section('reportMenu','menu-open')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid d-flex justify-content-between">
                <h1>Service Leads Report</h1>
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Service Leads Report</li>
                </ol>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header bg-gradient-primary">
                        <h3 class="card-title"><i class="fas fa-chart-line"></i> Service Leads Report</h3>

                        <div class="card-tools">
                            <div class="btn-group">
                                <!-- 🔹 Filter Button -->
                                <button class="btn btn-warning btn-sm" type="button" data-toggle="collapse" data-target="#filterCollapse"
                                        aria-expanded="false" aria-controls="filterCollapse" id="filterToggle">
                                    <i class="fas fa-filter mr-1"></i> Filters
                                </button>

                                <!-- 🔹 Export PDF Button -->
                                <a href="{{ route('service.leads.report.pdf', request()->query()) }}"
                                   class="btn btn-danger btn-sm" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="collapse mt-2" id="filterCollapse">
                            <div class="card card-body border">
                                <form method="GET" action="{{ route('service.leads.report') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>Date From</label>
                                            <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Date To</label>
                                            <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="e.g. Mamun">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{ request('phone') }}" class="form-control" placeholder="017...">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ request('email') }}" class="form-control" placeholder="example@mail.com">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">All</option>
                                                @foreach(['Received','Replied','On Process','Completed','Closed','Canceled'] as $st)
                                                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>{{ $st }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-2 text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-search"></i> Apply
                                        </button>
                                        <a href="{{ route('service.leads.report') }}" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-undo"></i> Reset
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="info-box bg-primary">
                                    <span class="info-box-icon"><i class="fas fa-calendar-alt"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Monthly Total Leads</span>
                                        <span class="info-box-number">{{ $summary['month_leads'] ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="info-box bg-success">
                                    <span class="info-box-icon"><i class="fas fa-user-plus"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Today Total Leads</span>
                                        <span class="info-box-number">{{ $summary['today_leads'] ?? 0 }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="info-box bg-warning">
                                    <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Today Requested Amount</span>
                                        <span class="info-box-number">{{ number_format($summary['today_amount'] ?? 0, 2) }} BDT</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="info-box bg-danger">
                                    <span class="info-box-icon"><i class="fas fa-chart-line"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Monthly Requested Amount</span>
                                        <span class="info-box-number">{{ number_format($summary['month_amount'] ?? 0, 2) }} BDT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive p-2">
                                <table class="table table-hover table-striped table-bordered text-center">
                                    <thead class="bg-gradient-info text-white">
                                    <tr>
                                        <th style="width: 60px;">SL</th>
                                        <th>Lead Info</th>
                                        <th>Service</th>
                                        <th>Purpose</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($leads as $lead)
                                        <tr>
                                            <td>{{ $leads->firstItem() + $loop->index }}</td>

                                            {{-- ✅ Combined Column --}}
                                            <td class="text-left">
                                                <strong>{{ $lead->name }}</strong> <br>
                                                <small>
                                                    <i class="fas fa-phone text-muted"></i> {{ $lead->country_code }}{{ $lead->phone }} <br>
                                                    <i class="fas fa-envelope text-muted"></i> {{ $lead->email ?? 'N/A' }}
                                                </small>
                                            </td>

                                            <td>{{ $lead->service_name ?? 'N/A' }}</td>
                                            <td>{{ $lead->purpose ?? 'N/A' }}</td>

                                            <td>
                                                @php
                                                    $color = match($lead->status) {
                                                        'Received'  => 'secondary',
                                                        'Replied'   => 'info',
                                                        'On Process'=> 'warning',
                                                        'Completed' => 'success',
                                                        'Closed'    => 'dark',
                                                        'Canceled'  => 'danger',
                                                        default     => 'light',
                                                    };
                                                @endphp
                                                <span class="badge badge-{{ $color }}">{{ $lead->status }}</span><br>
                                                <button class="btn btn-xs btn-outline-primary mt-1 changeStatusBtn" data-id="{{ $lead->id }}">
                                                    <i class="fas fa-edit"></i> Change
                                                </button>
                                            </td>

                                            <td>{{ number_format($lead->amount,2) }} BDT</td>
                                            <td>{{ \Carbon\Carbon::parse($lead->created_at)->format('d M, Y h:i A') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix">
                            <div class="float-right">{{ $leads->links() }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- Status Update Modal -->
    <!-- Lead Status Update Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="statusModalLabel">Update Lead Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="statusForm">
                        @csrf
                        <input type="hidden" name="id" id="lead_id">

                        <div class="form-group">
                            <label>Select Status</label>
                            <select name="status" id="statusSelect" class="form-control" required>
                                <option value="Received">Received</option>
                                <option value="Replied">Replied</option>
                                <option value="On Process">On Process</option>
                                <option value="Completed">Completed</option>
                                <option value="Closed">Closed</option>
                                <option value="Canceled">Canceled</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" placeholder="Write your note..."></textarea>
                        </div>

                        <div id="previousComment" class="alert alert-light border" style="display:none;">
                            <strong>Previous Comment:</strong>
                            <p id="prevCommentText" class="mb-0"></p>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="statusForm" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            var $c = $('#filterCollapse');
            var $btn = $('#filterToggle');
            function updateTxt(){
                var open = $c.hasClass('show');
                $btn.find('i').toggleClass('fa-filter', !open).toggleClass('fa-times', open);
                $btn.contents().filter(function(){ return this.nodeType === 3; }).remove();
                $btn.append(open ? ' Hide Filters' : ' Filters');
            }
            $c.on('shown.bs.collapse hidden.bs.collapse', updateTxt);
        });
        $(document).ready(function () {

            // 🔹 When user clicks the "Change Status" button
            $(document).on('click', '.changeStatusBtn', function () {
                let id = $(this).data('id');

                // Reset form and hide previous comment
                $('#statusForm')[0].reset();
                $('#previousComment').hide();
                $('#lead_id').val(id);

                // Load existing lead info
                $.ajax({
                    url: "{{ url('/service-leads') }}/" + id + "/get",
                    type: "GET",
                    success: function (lead) {
                        $('#statusSelect').val(lead.status);
                        if (lead.comment) {
                            $('#previousComment').show();
                            $('#prevCommentText').text(lead.comment);
                        }
                        // Open modal
                        $('#statusModal').modal('show');
                    },
                    error: function () {
                        toastr.error('Failed to load lead data!');
                    }
                });
            });

            // 🔹 When form is submitted
            $('#statusForm').on('submit', function (e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let btn = $(this).find('button[type="submit"]');

                btn.prop('disabled', true)
                    .html('<i class="fas fa-spinner fa-spin"></i> Saving...');

                $.ajax({
                    url: "{{ route('service.lead.update.status') }}",
                    type: "POST",
                    data: formData,
                    success: function (res) {
                        if (res.status === 'success') {
                            $('#statusModal').modal('hide');
                            toastr.success('Lead status updated successfully!');
                            // Optional: reload table or update UI without full reload
                            setTimeout(() => location.reload(), 1000);
                        } else {
                            toastr.error('Something went wrong!');
                        }
                    },
                    error: function () {
                        toastr.error('Server error! Please try again.');
                    },
                    complete: function () {
                        btn.prop('disabled', false)
                            .html('Save Changes');
                    }
                });
            });

            // Optional: clear modal data when closed
            $('#statusModal').on('hidden.bs.modal', function () {
                $('#statusForm')[0].reset();
                $('#previousComment').hide();
            });

        });
    </script>

@endsection

