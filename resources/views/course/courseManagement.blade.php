@extends('mainLayout.layout')
@section('title','Trip Designer || Course Management ')
@section('course','active')
@section('academy','active')
@section('academyMenu','menu-open')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Course Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Course Management</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Add New Course</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                {{ Form::open(array('url' => 'add-new-coursee',  'method' => 'post' ,'class' =>'form-horizontal','enctype'=>"multipart/form-data")) }}
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Course Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Write Course Title" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Course Type</label>
                                                <select class="form-control select2bs4 group" name="type" id="type" style="width: 100%;" required>
                                                    <option value="" selected>Select Type</option>
                                                    <option value="Live Course">Live Course</option>
                                                    <option value="Recorded Course">Recorded Course</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Course Star</label>
                                                <input type="number" class="form-control" id="star" name="star" min="3" step="0.01" value="4.8" max="5" placeholder="Course Star" required>
                                            </div>
                                        </div>
{{--                                        <div class="col-sm-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Course Price</label>--}}
{{--                                                <input type="number" class="form-control" id="price" name="price" placeholder="Course Price" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Discounted Price</label>--}}
{{--                                                <input type="number" class="form-control" id="d_price" name="d_price" placeholder="Discounted Course Price" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}



                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Class Number</label>
                                                <input type="number" class="form-control" min="1" id="class" name="class" placeholder="Class Number" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Batch Number</label>
                                                <input type="text" class="form-control" id="batch" name="batch" placeholder="Batch Number" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Class Time</label>
                                                <input type="text" class="form-control" id="time" name="time" placeholder="Class Time" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Seats Remaining</label>
                                                <input type="number" min="0" class="form-control" id="seat_remain" name="seat_remain" placeholder="Seats Remaining" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Course Cover Photo (Ratio: 1650 px * 800 px)</label>
                                                <input type="file" class="form-control" id="c_photo" accept="image/*"  name="c_photo" placeholder="Course Cover Photo" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Course Page Photo (Ratio: 1920 px * 1440 px) </label>
                                                <input type="file" class="form-control" id="p_photo" accept="image/*"  name="p_photo" placeholder="Course Page Photo" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Next Approximate Course Date</label>
                                                <input type="date" class="form-control" id="app_date" name="app_date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Course Overview Youtube Link</label>
                                                <input type="text" class="form-control" id="link"  name="link" placeholder="Course Overview Youtube Link" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Course Description</label>
                                                <textarea class="form-control" id="description"  name="description" placeholder="Course Description" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Course Variation and Price</h3>
                                        </div>
                                        <div class="card-body">

                                            <!-- Recorded Class -->
                                            <div class="row g-2 border rounded p-2 mb-2">
                                                <div class="col-sm-3">
                                                    <label class="form-label">Variation</label>
                                                    <input type="text" class="form-control" value="" readonly>
                                                    <input type="hidden" name="variation_title[]" value="recorded">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="recorded_price" placeholder="Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Discounted Price</label>
                                                    <input type="number" class="form-control" name="recorded_d_price" placeholder="Discounted Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="recorded_status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Live Class -->
                                            <div class="row g-2 border rounded p-2 mb-2">
                                                <div class="col-sm-3">
                                                    <label class="form-label">Variation</label>
                                                    <input type="text" class="form-control" value="Live Class" readonly>
                                                    <input type="hidden" name="variation_title[]" value="live">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="live_price" placeholder="Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Discounted Price</label>
                                                    <input type="number" class="form-control" name="live_d_price" placeholder="Discounted Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="live_status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Physical Class -->
                                            <div class="row g-2 border rounded p-2 mb-2">
                                                <div class="col-sm-3">
                                                    <label class="form-label">Variation</label>
                                                    <input type="text" class="form-control" value="Physical Class" readonly>
                                                    <input type="hidden" name="variation_title[]" value="physical">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="physical_price" placeholder="Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Discounted Price</label>
                                                    <input type="number" class="form-control" name="physical_d_price" placeholder="Discounted Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="physical_status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- One-to-One Online Class -->
                                            <div class="row g-2 border rounded p-2 mb-2">
                                                <div class="col-sm-3">
                                                    <label class="form-label">Variation</label>
                                                    <input type="text" class="form-control" value="One-to-One Online Class" readonly>
                                                    <input type="hidden" name="variation_title[]" value="one_to_one_online">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="one_to_one_online_price" placeholder="Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Discounted Price</label>
                                                    <input type="number" class="form-control" name="one_to_one_online_d_price" placeholder="Discounted Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="one_to_one_online_status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- One-to-One Physical Class -->
                                            <div class="row g-2 border rounded p-2 mb-2">
                                                <div class="col-sm-3">
                                                    <label class="form-label">Variation</label>
                                                    <input type="text" class="form-control" value="One-to-One Physical Class" readonly>
                                                    <input type="hidden" name="variation_title[]" value="one_to_one_physical">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="one_to_one_physical_price" placeholder="Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Discounted Price</label>
                                                    <input type="number" class="form-control" name="one_to_one_physical_d_price" placeholder="Discounted Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="one_to_one_physical_status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row add-more">
                                        <div class="col-sm-12">
                                            <div class="card card-info collapsed-card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Course Curriculum</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Module Name</label>
                                                <input type="text" class="form-control" id="module" name="module[]" placeholder="Enter Module Name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label>Module Details</label>
                                                <input type="text" class="form-control" id="details" name="details[]" placeholder="Enter Module Details" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2" id="add" style=" margin-top: 30px;">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success float-right ">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card card-info collapsed-card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Course Instructor</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row add-more-ins">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Instructor Name</label>
                                                <input type="text" class="form-control" id="name" name="name[]" placeholder="Enter Instructor Name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Instructor Designation</label>
                                                <input type="text" class="form-control" id="designation" name="designation[]" placeholder="Enter Instructor Designation" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Instructor Institute</label>
                                                <input type="text" class="form-control" id="institute" name="institute[]" placeholder="Enter Instructor Institute" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Instructor Photo</label>
                                                <input type="file" class="form-control" id="photo" accept="image/*" name="photo[]" placeholder="Enter Instructor Photo" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2" id="add_ins" style=" margin-top: 30px;">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success float-right ">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card card-info collapsed-card">
                                                <div class="card-header">
                                                    <h3 class="card-title">In the course you get</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row add-more-get">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label>Get Details</label>
                                                <input type="text" class="form-control" id="g_details" name="g_details[]" placeholder="Enter Get Details" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2" id="add_get" style=" margin-top: 30px;">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success float-right ">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card card-info collapsed-card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Course Review</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row add-more-stu">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Students Name</label>
                                                <input type="text" class="form-control" id="s_name" name="s_name[]" placeholder="Enter Students Name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Review</label>
                                                <input type="text" class="form-control" id="institute" name="institute[]" placeholder="Enter Instructor Institute" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Students Photo</label>
                                                <input type="file" class="form-control" id="s_photo" accept="image/*" name="s_photo[]" placeholder="Enter Students Photo">
                                            </div>
                                        </div>
                                        <div class="col-sm-2" id="add_stu" style=" margin-top: 30px;">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success float-right ">Add More</button>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title mb-0">Course Management</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <table id="example111" class="table table-hover table-striped table-bordered align-middle text-center">
                                    <thead class="bg-info text-white">
                                    <tr>
                                        <th style="width: 50px;">S.L</th>
                                        <th style="width: 140px;">Cover</th>
                                        <th>Course Info</th>
                                        <th>Price Variations</th>
                                        <th style="width: 120px;">View</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($courses as $course)
                                        <tr>
                                            <!-- Serial -->
                                            <td>{{ $i }}</td>

                                            <!-- Cover Image -->
                                            <td>
                                                <img src="{{ url(json_decode($course->c_c_photo)) }}"
                                                     alt="Cover"
                                                     class="img-thumbnail"
                                                     style="width:120px; height:100px; object-fit:cover;">
                                            </td>

                                            <!-- Course Title & Type -->
                                            <td class="text-left">
                                                <strong>{{ $course->title }}</strong><br>
                                                <small class="text-muted">Type: {{ $course->type }}</small><br>
                                                <small>Star: ⭐ {{ $course->star }}</small>
                                            </td>

                                            <!-- Price Variations -->
                                            <td class="text-left">
                                                @php
                                                    $variations = json_decode($course->price_variations, true);

                                                    $titles = [
                                                        'recorded' => 'Recorded Class',
                                                        'live' => 'Live Class',
                                                        'physical' => 'Physical Class',
                                                        'one_to_one_online' => 'One-to-One Online Class',
                                                        'one_to_one_physical' => 'One-to-One Physical Class',
                                                    ];
                                                @endphp

                                                @if(!empty($variations))
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach($variations as $key => $variation)
                                                            <li>
                                                                <strong>{{ $titles[$key] ?? ucfirst($key) }}</strong><br>
                                                                Price: {{ $variation['price'] ?? '-' }} <br>
                                                                Discounted Price: <span class="text-danger">{{ $variation['d_price'] ?? '-' }}</span> <br>
                                                                Status:
                                                                @if(isset($variation['status']) && $variation['status'] == 1)
                                                                    <span class="badge bg-success">Active</span>
                                                                @else
                                                                    <span class="badge bg-secondary">Inactive</span>
                                                                @endif
                                                            </li>
                                                            <hr class="my-1">
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-muted">No Variations</span>
                                                @endif

                                            </td>

                                            <!-- View Button -->
                                            <td>
                                                <a href="{{ url('course/'.$course->slug) }}"
                                                   target="_blank"
                                                   class="btn btn-sm btn-warning">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                            </td>

                                            <!-- Actions -->
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm">Action</button>
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('editCoursePage?id=' . $course->id) }}">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <a href="{{ route('course.toggle', $course->id) }}"
                                                           class="dropdown-item">
                                                            <i class="fas fa-toggle-{{ $course->status ? 'off text-danger' : 'on text-success' }}"></i>
                                                            {{ $course->status ? 'Deactivate' : 'Activate' }}
                                                        </a>
                                                        <a class="dropdown-item delete text-danger"
                                                           data-id="{{ $course->id }}"
                                                           data-toggle="modal"
                                                           data-target="#modal-danger"
                                                           href="{{ url('deleteCourse?id=' . $course->id) }}">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->
        </section>
        @if(isset($course))
            <div class="modal fade" id="modal-danger" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{ route('course.delete', $course->id) }}">
                        @csrf
                        <input type="hidden" name="id" class="id">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this course?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-light">Yes, Delete</button>
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $('#dobDiv').datetimepicker({
                format: 'Y-M-D',
                maxDate: new Date()
            });
        })
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('.id').val(id);
        });
        $("body").on("click","#add",function(){
            var html =  '<div class="row removee">';
            html +='<div class="col-sm-3"> <div class="form-group"> <label>Module Name</label> <input type="text" class="form-control" id="module" name="module[]" placeholder="Enter Module Name" required> </div> </div>';
            html +='<div class="col-sm-7"> <div class="form-group"> <label>Module Details</label> <input type="text" class="form-control" id="details" name="details[]" placeholder="Enter Module Details" required></div> </div>';
            html +='<div class="col-sm-2 remove" id="remove" style=" margin-top: 30px;"><div class="form-group"><button type="button" class="btn btn-danger float-right ">Remove</button></div></div>';
            html +='</div>';
            $(".add-more").last().after(html);
        });
        $("body").on("click",".remove",function(){
            $(this).parents(".removee").remove();
        });

        $("body").on("click","#add_ins",function(){
            var html = '<div class="row removee_ins">';
            html += '<div class="col-sm-2"> <div class="form-group"> <label>Instructor Name</label> <input type="text" class="form-control" name="name[]" placeholder="Enter Instructor Name" required> </div> </div>';
            html += '<div class="col-sm-3"> <div class="form-group"> <label>Instructor Designation</label> <input type="text" class="form-control" name="designation[]" placeholder="Enter Instructor Designation" required> </div> </div>';
            html += '<div class="col-sm-3"> <div class="form-group"> <label>Instructor Institute</label> <input type="text" class="form-control" name="institute[]" placeholder="Enter Instructor Institute" required> </div> </div>';
            html += '<div class="col-sm-2"> <div class="form-group"> <label>Instructor Photo</label> <input type="file" class="form-control" accept="image/*" name="photo[]" required> </div> </div>';
            html += '<div class="col-sm-2 remove_ins" style="margin-top: 30px;"> <div class="form-group"> <button type="button" class="btn btn-danger float-right remove-btn">Remove</button> </div> </div>';
            html += '</div>';
            $(".add-more-ins").last().after(html);
        });
        $("body").on("click",".remove_ins",function(){
            $(this).parents(".removee_ins").remove();
        });

        $("body").on("click","#add_get",function(){
            var html = '<div class="row removee_get">';
            html += '<div class="col-sm-10">';
            html += '<div class="form-group">';
            html += '<label>Get Details</label>';
            html += '<input type="text" class="form-control" name="g_details[]" placeholder="Enter Get Details" required>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-sm-2 remove_get" style="margin-top: 30px;">';
            html += '<div class="form-group">';
            html += '<button type="button" class="btn btn-danger float-right remove-get-btn">Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $(".add-more-get").last().after(html);
        });
        $("body").on("click",".remove_get",function(){
            $(this).parents(".removee_get").remove();
        });

        $("body").on("click","#add_stu",function(){
            var html = '<div class="row removee_stu">';
            html += '<div class="col-sm-2">';
            html += '<div class="form-group">';
            html += '<label>Students Name</label>';
            html += '<input type="text" class="form-control" name="s_name[]" placeholder="Enter Students Name" required>';
            html += '</div>';
            html += '</div>';

            html += '<div class="col-sm-6">';
            html += '<div class="form-group">';
            html += '<label>Review</label>';
            html += '<input type="text" class="form-control" name="institute[]" placeholder="Enter Instructor Institute" required>';
            html += '</div>';
            html += '</div>';

            html += '<div class="col-sm-2">';
            html += '<div class="form-group">';
            html += '<label>Students Photo</label>';
            html += '<input type="file" class="form-control" name="s_photo[]" accept="image/*">';
            html += '</div>';
            html += '</div>';

            html += '<div class="col-sm-2 remove_stu" style="margin-top: 30px;">';
            html += '<div class="form-group">';
            html += '<button type="button" class="btn btn-danger float-right remove-stu-btn">Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $(".add-more-stu").last().after(html);
        });
        $("body").on("click",".remove_stu",function(){
            $(this).parents(".removee_stu").remove();
        });

    </script>
@endsection
