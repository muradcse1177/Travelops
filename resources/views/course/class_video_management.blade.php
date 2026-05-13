@extends('mainLayout.layout')
@section('title','Trip Designer || Class Video Management ')
@section('class','active')
@section('academy','active')
@section('academyMenu','menu-open')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class Video Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Class Video Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Add New Video -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Add New Class Video</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="display:block;">
                                {{ Form::open(['url' => 'addClassVideo', 'method' => 'post', 'class' =>'form-horizontal']) }}
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Select Course</label>
                                                <select class="form-control select2bs4" name="course_id" id="course_id" required>
                                                    <option value="">-- Choose Course --</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Class No</label>
                                                <input type="number" class="form-control" name="class_no" placeholder="Ex: 1" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Class Title</label>
                                                <input type="text" class="form-control" name="class_title" placeholder="Enter Class Title" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Bunny Library ID</label>
                                                <input type="text" class="form-control" name="bunny_library_id" placeholder="Write Bunny Library ID" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Bunny Video ID</label>
                                                <input type="text" class="form-control" name="bunny_video_id" placeholder="Enter Bunny Video ID" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
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
                </div>

                <!-- Class Video List -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">All Class Videos</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                <!-- 🔍 Course Filter -->
                                <form method="GET" action="{{ url('/class-videos') }}" class="form-inline mb-3">
                                    <label for="course_id" class="mr-2">Filter by Course:</label>
                                    <select name="course_id" id="course_id" class="form-control mr-2" style="min-width:250px;">
                                        <option value="">-- All Courses --</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                                {{ $course->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                    @if(request('course_id'))
                                        <a href="{{ url('/class-videos') }}" class="btn btn-secondary btn-sm ml-2">Reset</a>
                                    @endif
                                </form>

                                <!-- 🧾 Table -->
                                <div class="table-responsive">
                                    <table id="videoTable" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course</th>
                                            <th>Class No</th>
                                            <th>Title</th>
                                            <th>Library ID</th>
                                            <th>Video ID</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($classVideos as $video)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $video->title }}</td>
                                                <td>{{ $video->class_no }}</td>
                                                <td>{{ $video->class_title }}</td>
                                                <td>{{ $video->bunny_library_id }}</td>
                                                <td>{{ $video->bunny_video_id }}</td>
                                                <td>
                                                    @if($video->status == 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-secondary">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ url('/editClassVideo?id='.$video->id) }}">Edit</a>
                                                            <a class="dropdown-item text-danger delete" href="#" data-id="{{ $video->id }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <br>
                                {{ $classVideos->links() }}

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
        $(function () {
            $('.select2bs4').select2({ theme: 'bootstrap4' });

            $(document).on('click', '.delete', function(e){
                e.preventDefault();
                if(confirm("Are you sure you want to delete this class video?")) {
                    let id = $(this).data('id');
                    window.location.href = "{{ url('deleteClassVideo?id=') }}" + id;
                }
            });
        });
    </script>
@endsection
