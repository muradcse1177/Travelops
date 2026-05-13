@extends('mainLayout.layout')
@section('title','Trip Designer || Website Support ')
@section('contact-us-support','active')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Website Support Messages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Website Support</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Support Messages</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.L</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Received At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($messages as $key => $msg)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $msg->name }}</td>
                                <td>{{ $msg->email }}</td>
                                <td>{{ $msg->subject }}</td>
                                <td>{{ $msg->time }}</td>
                                <td>
                                    @if($msg->status == 'resolved')
                                        <span class="badge badge-success">Resolved</span> 
                                    @elseif($msg->status == 'replied')
                                        <span class="badge badge-primary">Replied</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/contact-us-support/view/'.$msg->id)}}" 
                                       class="btn btn-info btn-sm">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="mt-3">
                        {{ $messages->links() }}
                    </div>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection
