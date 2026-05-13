@extends('mainLayout.layout')

@section('title','Trip Designer || Email Logs')
@section('sender','active')
@section('senderMenu','menu-open')
@section('emailSenderLog','active')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Email Delivery Logs</h1>
        </div>
    </section>

    <section class="content">

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Email History</h3>
            </div>

            <div class="card-body">

                <!-- FILTER FORM -->
                <form method="GET" class="mb-3">
                    <div class="row">

                        <div class="col-md-3">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Search email / subject" value="{{ request('search') }}">
                        </div>

                        <div class="col-md-2">
                            <select name="status" class="form-control">
                                <option value="">All Status</option>
                                <option value="1" {{ request('status')=='1'?'selected':'' }}>Delivered</option>
                                <option value="0" {{ request('status')=='0'?'selected':'' }}>Pending</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="from" class="form-control" value="{{ request('from') }}">
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="to" class="form-control" value="{{ request('to') }}">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-warning btn-block">Filter</button>
                        </div>

                    </div>
                </form>

                <!-- EXPORT BUTTONS -->
                <div class="mb-3">
                    <a href="{{ route('emailLog.exportExcel') }}" class="btn btn-success btn-sm">Export Excel</a>
                    <a href="{{ route('emailLog.exportPDF') }}" class="btn btn-danger btn-sm">Export PDF</a>
                </div>

                <!-- LOG TABLE -->
                <table class="table table-bordered table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Attachments</th>
                            <th>Body</th>
                            <th>Created</th>
                            <th>Sent</th>
                            <th width="8%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->email }}</td>
                            <td>{{ $log->subject }}</td>

                            <td>
                                @if($log->status == 1)
                                    <span class="badge badge-success">Delivered</span>
                                @else
                                    <span class="badge badge-danger">Pending</span>
                                @endif
                            </td>

                            <!-- ATTACHMENTS -->
                            <td>
                                @php $files = json_decode($log->attachment, true); @endphp
                                @if(!empty($files))
                                    @foreach($files as $file)
                                        <a href="{{ url('public/'.$file) }}" target="_blank" class="badge badge-info">File</a>
                                    @endforeach
                                @else
                                    <span class="text-muted">None</span>
                                @endif
                            </td>

                            <!-- BODY + MODAL -->
                            <td>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#body{{ $log->id }}">
                                    View
                                </button>

                                <div class="modal fade" id="body{{ $log->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title">Email Body</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                {!! $log->message !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>{{ $log->created_at }}</td>
                            <td>{{ $log->updated_at }}</td>

                            <td>
                                @if($log->status == 0)
                                <a href="{{ url('emailRetry/'.$log->id) }}" class="btn btn-sm btn-info mb-1">Retry</a>
                                @endif

                                <a href="{{ url('emailLog/delete/'.$log->id) }}" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Delete this log?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $logs->links() }}

            </div>
        </div>

    </section>

</div>
@endsection
