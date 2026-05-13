@extends('mainLayout.layout')
@section('title','Trip Designer || Edit Airport')

@section('airports','active')
@section('settingsMenu','menu-open')
@section('settings','active')

@section('content')

<div class="content-wrapper">

    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Airport</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Airport</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit Form -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Airport Information</h3>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('updateAirport') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $airport->id }}">

                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Airport Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $airport->name }}" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Airport Code</label>
                                    <input type="text" class="form-control" name="code" value="{{ $airport->iata_codes }}" required>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning float-right">Update</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </section>

</div>

@endsection
