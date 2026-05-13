@extends('mainLayout.layout')
@section('title','Trip Designer || Edit Course')
@section('websiteMenu','menu-open')
@section('webSettings','active')
@section('webEducationMenu','menu-open')
@section('WebEducation','active')
@section('webEduCourseManagement','active')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Course - {{ $course->course_name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('webEduCourseManagement')}}">Course Management</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Update Course Information</h3>
                </div>
                <div class="card-body">

                    {{-- ✅ Messages --}}
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

                    {{ Form::open(['url'=>'webEduCourse/update/'.$course->id,'method'=>'post','enctype'=>'multipart/form-data']) }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <label>Country *</label>
                            <select name="edu_country_id" id="edu_country_id" class="form-control select2bs4" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id == $course->edu_country_id ? 'selected' : '' }}>
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>University *</label>
                            <select name="edu_university_id" id="edu_university_id" class="form-control select2bs4" required>
                                <option value="">Loading...</option>
                                {{-- Loaded via AJAX --}}
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Course Name *</label>
                            <input type="text" name="course_name" class="form-control" value="{{ $course->course_name }}" placeholder="Enter Course Name">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Course Type</label>
                            <input type="text" name="course_type" class="form-control" value="{{ $course->course_type }}" placeholder="e.g. Undergraduate, Masters">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Slug</label>
                            <input type="text" name="course_slug" class="form-control" value="{{ $course->course_slug }}" placeholder="Custom slug (optional)">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Tuition Fees</label>
                            <input type="text" name="tuition_fees" class="form-control" value="{{ $course->tuition_fees }}" placeholder="e.g. $10,000 per year">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Final Tuition Fee</label>
                            <input type="text" name="final_tuition_fee" class="form-control" value="{{ $course->final_tuition_fee }}" placeholder="After scholarship">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control" value="{{ $course->duration }}" placeholder="e.g. 2 Years">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Campus</label>
                            <input type="text" name="campus" class="form-control" value="{{ $course->campus }}" placeholder="e.g. London Campus">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Mode of Study</label>
                            <input type="text" name="mode_of_study" class="form-control" value="{{ $course->mode_of_study }}" placeholder="Full-time / Online">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Current Logo</label><br>
                            @if($course->logo)
                                <img src="{{ asset($course->logo) }}" style="width:100px;height:auto;border-radius:5px;">
                            @else
                                <span class="text-muted">No logo uploaded</span>
                            @endif
                            <input type="file" name="logo" class="form-control mt-2">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Current Cover Photo</label><br>
                            @if($course->cover_photo)
                                <img src="{{ asset($course->cover_photo) }}" style="width:120px;height:auto;border-radius:5px;">
                            @else
                                <span class="text-muted">No cover uploaded</span>
                            @endif
                            <input type="file" name="cover_photo" class="form-control mt-2">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Course Overview</label>
                        <textarea name="course_overview" class="form-control" rows="2">{{ $course->course_overview }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Key Program Highlights</label>
                        <textarea name="key_program_highlights" class="form-control" rows="2">{{ $course->key_program_highlights }}</textarea>
                    </div>

                    @php
                        $requirements = $course->requirements;
                        // Check if JSON
                        if (!empty($requirements) && is_array(json_decode($requirements, true))) {
                            $reqArr = json_decode($requirements, true);
                            $formattedReq = '';

                            if (!empty($reqArr['academic_certificates'])) {
                                $formattedReq .= "Academic Certificates:\n";
                                foreach ($reqArr['academic_certificates'] as $item) {
                                    $formattedReq .= " - $item\n";
                                }
                                $formattedReq .= "\n";
                            }

                            if (!empty($reqArr['english_language_tests'])) {
                                $formattedReq .= "English Language Tests:\n";
                                foreach ($reqArr['english_language_tests'] as $item) {
                                    $formattedReq .= " - $item\n";
                                }
                                $formattedReq .= "\n";
                            }

                            if (!empty($reqArr['identity'])) {
                                $formattedReq .= "Identity: " . $reqArr['identity'] . "\n";
                            }

                            if (!empty($reqArr['medical'])) {
                                $formattedReq .= "Medical: " . $reqArr['medical'] . "\n";
                            }

                        } else {
                            $formattedReq = $requirements; // Normal text
                        }
                    @endphp

                    <div class="form-group">
                        <label>Requirements</label>
                        <textarea name="requirements" class="form-control" rows="6" readonly>{{ $formattedReq }}</textarea>
                    </div>


                    <button type="submit" class="btn btn-warning float-right">Update</button>
                    <a href="{{ url('webEduCourseManagement') }}" class="btn btn-secondary float-left">Back</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
$('.select2').select2()
$('.select2bs4').select2({
    theme: 'bootstrap4',
})
$(document).ready(function () {

    // === Function: Load Universities by Country ===
    function loadUniversities(countryId, selectedUniId = null) {
        let $uniSelect = $('#edu_university_id');
        $uniSelect.html('<option value="">Loading...</option>');

        if (!countryId) {
            $uniSelect.html('<option value="">Select University</option>');
            return;
        }

        $.ajax({
            url: "{{ url('get-universities-by-country') }}",
            type: "POST",
            data: {
                country_id: countryId,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (res) {
                $uniSelect.empty();
                if (res.length > 0) {
                    $uniSelect.append('<option value="">Select University</option>');
                    $.each(res, function (index, uni) {
                        let selected = (parseInt(selectedUniId) === parseInt(uni.id)) ? 'selected' : '';
                        $uniSelect.append(`<option value="${uni.id}" ${selected}>${uni.university_name}</option>`);
                    });
                } else {
                    $uniSelect.append('<option value="">No universities found</option>');
                }
            },
            error: function (xhr) {
                console.error("AJAX Error:", xhr.responseText);
                $uniSelect.html('<option value="">Error loading universities</option>');
            }
        });
    }

    // === 1️⃣ Attach Change Event with Delegation ===
    $(document).on('change', '#edu_country_id', function () {
        let countryId = $(this).val();
        console.log("Country changed:", countryId);
        loadUniversities(countryId);
    });

    // === 2️⃣ Auto-load on Page Ready (Edit Mode) ===
    let defaultCountry = "{{ $course->edu_country_id }}";
    let defaultUniversity = "{{ $course->edu_university_id }}";

    if (defaultCountry) {
        // small delay to make sure DOM fully loaded
        setTimeout(function () {
            console.log("Auto load for edit:", defaultCountry, defaultUniversity);
            loadUniversities(defaultCountry, defaultUniversity);
        }, 500);
    }

});
</script>
@endsection
