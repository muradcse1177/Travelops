@extends('mainLayout.layout')
@section('title','Support Message Details')
@section('contact-us-support','active')

@section('content')
<div class="content-wrapper">

    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-headset"></i> Support Ticket Details</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/contact-us-support')}}">Support</a></li>
                        <li class="breadcrumb-item active">Ticket #{{$message->id}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- LEFT COLUMN: Ticket Details -->
                <div class="col-md-8">
                    <div class="card card-success shadow">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-envelope-open-text"></i>
                                Subject: <strong>{{ $message->subject }}</strong>
                            </h3>
                        </div>

                        <div class="card-body">

                            <div class="callout callout-info">
                                <h5><i class="fas fa-user"></i> Sender Information</h5>
                                <p><strong>Name:</strong> {{ $message->name }}</p>
                                <p><strong>Email:</strong> {{ $message->email }}</p>
                                <p><strong>Phone:</strong> {{ $message->phone }}</p>
                                <p><strong>Date:</strong> {{ $message->time }}</p>
                            </div>

                            <hr>

                            <h5><i class="fas fa-comment-dots"></i> Message:</h5>
                            <div class="bg-light p-3 rounded border">
                                <p style="white-space: pre-line; font-size: 16px;">
                                    {{ json_decode($message->query) }}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- RIGHT COLUMN -->
                <div class="col-md-4">

                    <!-- Ticket Status -->
                    <div class="card card-warning shadow">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Ticket Status</h3>
                        </div>

                        <div class="card-body">

                            @if(Session::has('successMessage'))
                                <div class="alert alert-success">{{ Session::get('successMessage') }}</div>
                            @endif

                            <form action="{{url('/contact-us-support/status-update')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $message->id }}">

                                <div class="form-group">
                                    <label>Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="ending" {{ $message->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="resolved" {{ $message->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                        <option value="replied" {{ $message->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-warning btn-block mt-3">
                                    <i class="fas fa-check-circle"></i> Update Status
                                </button>
                            </form>

                        </div>
                    </div>


                    <!-- REPLY EMAIL BOX -->
                    <div class="card card-success shadow">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-paper-plane"></i> Send Email Reply</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{url('/contact-us-support/reply')}}" method="POST">
                                @csrf

                                <input type="hidden" name="id" value="{{ $message->id }}">
                                <input type="hidden" name="email" value="{{ $message->email }}">

                                <div class="form-group">
                                    <label>Your Reply Message:</label>
                                    <textarea name="reply_message" class="form-control" rows="5" placeholder="Type your reply..." required></textarea>
                                </div>

                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-paper-plane"></i> Send Reply Email
                                </button>
                                <a href="{{url('/contact-us-support')}}" class="btn btn-dark btn-block">
                                    <i class="fas fa-arrow-left"></i> Back to Support List
                                </a>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>
@endsection
