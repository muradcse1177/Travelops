@extends('mainLayout.layout')
@section('title','Trip Designer || Education Course Management')
@section('websiteMenu','menu-open')
@section('webSettings','active')
@section('webEducationMenu','menu-open')
@section('WebEducation','active')
@section('webEduCourseManagement','active')

@section('content')
<div class="content-wrapper">
    <!-- ================= Page Header ================= -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Education Course Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Education Course Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= Main Content ================= -->
    <section class="content">
        <div class="container-fluid">

            <!-- ✅ Add Course -->
            <div class="card card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Add New Course</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ Form::open(['url'=>'webEduCourse/store','method'=>'post','enctype'=>'multipart/form-data']) }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <label>Country *</label>
                            <select name="edu_country_id" id="edu_country_id" class="form-control select2bs4" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>University *</label>
                            <select name="edu_university_id" id="edu_university_id" class="form-control select2bs4" required>
                                <option value="">Select University</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Course Name *</label>
                            <input type="text" name="course_name" class="form-control" placeholder="Enter Course Name" required>
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Course Type</label>
                            <input type="text" name="course_type" class="form-control" placeholder="e.g. Undergraduate, Masters">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Slug</label>
                            <input type="text" name="course_slug" class="form-control" placeholder="Custom slug (optional)">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Tuition Fees</label>
                            <input type="text" name="tuition_fees" class="form-control" placeholder="e.g. $10,000 per year">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Final Tuition Fee</label>
                            <input type="text" name="final_tuition_fee" class="form-control" placeholder="e.g. $8,500 after scholarship">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="e.g. 2 Years">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Campus</label>
                            <input type="text" name="campus" class="form-control" placeholder="e.g. London Campus">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Mode of Study</label>
                            <input type="text" name="mode_of_study" class="form-control" placeholder="e.g. Full-time / Online">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Cover Photo</label>
                            <input type="file" name="cover_photo" class="form-control">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Course Overview</label>
                        <textarea name="course_overview" class="form-control" rows="2" placeholder="Brief overview of the course"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Key Program Highlights</label>
                        <textarea name="key_program_highlights" class="form-control" rows="2" placeholder="Key features of this program"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">Save</button>
                    {{ Form::close() }}
                </div>
            </div>

            <!-- ✅ Course Filter + Table -->
            <div class="card card-info mt-4">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">All Courses</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <!-- 🔹 Filter Form -->
                <div class="card-body bg-light pt-3 pb-1">
                    <form method="GET" action="{{ url('webEduCourseManagement') }}">
                        <div class="form-row align-items-end">
                            <div class="form-group col-md-3">
                                <label><strong>Filter by Country</strong></label>
                                <select name="country_id" id="filter_country_id" class="form-control select2bs4">
                                    <option value="">-- Select Country --</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" 
                                            {{ (isset($filter_country) && $filter_country == $country->id) ? 'selected' : '' }}>
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label><strong>Filter by University</strong></label>
                                <select name="university_id" id="filter_university_id" class="form-control select2bs4">
                                    <option value="">-- Select University --</option>
                                    @if(isset($filter_country))
                                        @foreach(DB::table('edu_universities')->where('edu_country_id',$filter_country)->get() as $u)
                                            <option value="{{ $u->id }}" 
                                                {{ (isset($filter_university) && $filter_university == $u->id) ? 'selected' : '' }}>
                                                {{ $u->university_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label><strong>Search Course</strong></label>
                                <input type="text" name="course_name" class="form-control"
                                    value="{{ $filter_course ?? '' }}" placeholder="Enter course name">
                            </div>

                            <div class="form-group col-md-3 text-right">
                                <button type="submit" class="btn btn-warning mt-4">
                                    <i class="fas fa-filter"></i> Apply Filter
                                </button>
                                <a href="{{ url('webEduCourseManagement') }}" class="btn btn-secondary mt-4">
                                    <i class="fas fa-sync-alt"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- 🔹 Course Table -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Course Name</th>
                                <th>University</th>
                                <th>Country</th>
                                <th>Tuition Fee</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = ($courses->currentPage() - 1) * $courses->perPage() + 1; @endphp
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>@if($course->logo)<img src="{{ asset($course->logo) }}" style="width:50px;height:auto;border-radius:5px;">@endif</td>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->university_name }}</td>
                                    <td>{{ $course->country_name }}</td>
                                    <td>{{ $course->tuition_fees }}</td>
                                    <td>{{ $course->duration }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm">Action</button>
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{ url('webEduCourse/edit/'.$course->id) }}">
                                                    <i class="fas fa-edit text-info"></i> Edit
                                                </a>
                                                <a class="dropdown-item delete-btn" href="#" data-id="{{ $course->id }}" data-name="{{ $course->course_name }}" data-toggle="modal" data-target="#deleteModal">
                                                    <i class="fas fa-trash-alt text-danger"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- 🔹 Pagination -->
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $courses->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

            <!-- ✅ Delete Modal -->
            <div class="modal fade" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body text-center">
                            <p>Are you sure you want to delete this course?</p>
                            <h5 class="courseName text-white font-weight-bold"></h5>
                        </div>
                        {{ Form::open(['url'=>'webEduCourse/delete','method'=>'post']) }}
                        {{ csrf_field() }}
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" class="courseId">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-light">Yes, Delete</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@section('js')
<script>
$(function(){

    $('.select2bs4').select2({ theme: 'bootstrap4', width: '100%' });

    // Delete Modal
    $(document).on('click','.delete-btn',function(){
        $('.courseId').val($(this).data('id'));
        $('.courseName').text($(this).data('name'));
    });

    // === Load Universities (Add Course Form) ===
    function loadUniversities(country_id, selected_uni = null){
        let $uniSelect = $('#edu_university_id');
        $uniSelect.html('<option>Loading...</option>');

        $.ajax({
            url: "{{ url('get-universities-by-country') }}",
            method: "POST",
            data: { country_id: country_id, _token: "{{ csrf_token() }}" },
            dataType: "json",
            success: function(res){
                $uniSelect.empty();
                if(res.length > 0){
                    $uniSelect.append('<option value="">Select University</option>');
                    res.forEach(function(uni){
                        let sel = (selected_uni == uni.id) ? 'selected' : '';
                        $uniSelect.append(`<option value="${uni.id}" ${sel}>${uni.university_name}</option>`);
                    });
                }else{
                    $uniSelect.append('<option value="">No universities found</option>');
                }
            },
            error: function(xhr){
                console.error(xhr.responseText);
                $uniSelect.html('<option value="">Error loading</option>');
            }
        });
    }

    // === On Add Form Country Change ===
    $('#edu_country_id').on('change', function(){
        let cid = $(this).val();
        if(cid) loadUniversities(cid);
        else $('#edu_university_id').html('<option value="">Select University</option>');
    });

    // === Filter Section Dynamic Universities ===
    $('#filter_country_id').on('change', function(){
        let countryId = $(this).val();
        let $uniSelect = $('#filter_university_id');
        $uniSelect.html('<option>Loading...</option>');
        if(countryId){
            $.ajax({
                url: "{{ url('get-universities-by-country') }}",
                type: "POST",
                data: { country_id: countryId, _token: "{{ csrf_token() }}" },
                dataType: "json",
                success: function (res) {
                    $uniSelect.empty();
                    $uniSelect.append('<option value="">-- Select University --</option>');
                    if (res.length > 0) {
                        res.forEach(function (uni) {
                            $uniSelect.append(`<option value="${uni.id}">${uni.university_name}</option>`);
                        });
                    } else {
                        $uniSelect.append('<option value="">No universities found</option>');
                    }
                    $uniSelect.trigger('change.select2');
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    $uniSelect.html('<option value="">Error loading universities</option>');
                }
            });
        }else{
            $uniSelect.html('<option value="">-- Select University --</option>');
        }
    });
});
</script>

<style>
.pagination { margin: 0; float: right; }
.page-item.active .page-link { background-color: #17a2b8; border-color: #17a2b8; }
</style>
@endsection
