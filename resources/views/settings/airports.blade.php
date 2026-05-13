@extends('mainLayout.layout')
@section('title','Trip Designer || Airport Management')
@section('airports','active')
@section('settingsMenu','menu-open')
@section('settings','active')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Airport Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Airport Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Airport Info</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            {{ Form::open(['url' => 'insertAirports', 'method' => 'post', 'class' =>'form-horizontal']) }}
                            @csrf

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Airport Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Airport Name" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Airport Code</label>
                                        <input type="text" class="form-control" name="code" placeholder="Enter Airport Code" required>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning float-right">Save</button>
                            </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

                <!-- 🔥 Airport Listing Table Added Here -->
                <div class="col-md-12 mt-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Airport List</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Airport Code</th>
                                            <th>Airport Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($airports as $key => $airport)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $airport->iata_codes }}</td>
                                            <td>{{ $airport->name }}</td>

                                            <td>
                                                <a href="{{ url('editAirport/'.$airport->id) }}" class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Airports Found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix">
                            {{ $airports->links() }}
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form action="{{ url('deleteAirport') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <h4>Are you sure to delete?</h4>
                                    <input type="hidden" name="id" class="id">
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
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

@section('js')
<script>
    $(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        $('.id').val(id);
    });
</script>
@endsection
