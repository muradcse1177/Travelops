@extends('mainLayout.layout')
@section('title','Trip Designer || Edit Class Video')
@section('class','active')
@section('academy','active')
@section('academyMenu','menu-open')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Edit Class Video</h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header"><h3 class="card-title">Edit Class Info</h3></div>
                    <div class="card-body">

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ url('/updateClassVideo') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $video->id }}">

                            <div class="form-group">
                                <label>Select Course</label>
                                <select class="form-control" name="course_id" required>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ $video->course_id == $course->id ? 'selected' : '' }}>
                                            {{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Class No</label>
                                <input type="number" name="class_no" class="form-control" value="{{ $video->class_no }}" required>
                            </div>

                            <div class="form-group">
                                <label>Class Title</label>
                                <input type="text" name="class_title" class="form-control" value="{{ $video->class_title }}" required>
                            </div>

                            <div class="form-group">
                                <label>Bunny Library Id</label>
                                <input type="text" name="bunny_library_id" class="form-control" value="{{ $video->bunny_library_id }}" required>
                            </div>

                            <div class="form-group">
                                <label>Bunny Video ID</label>
                                <input type="text" name="bunny_video_id" class="form-control" value="{{ $video->bunny_video_id }}" required>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" {{ $video->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $video->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
