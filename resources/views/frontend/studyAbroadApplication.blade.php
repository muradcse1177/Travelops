@extends('frontend.layout.body')
@section('title', 'Study Abroad Application')

@section('content')
<div id="main-wrapper">
    <!-- ============================ Course Header ============================ -->
    <section class="pt-3 gray-simple">
        <div class="container" style="margin-bottom: -60px;">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body py-4 text-center">
                    <h4 class="fw-bold text-dark mb-1">Start Your Global Education Journey</h4>
                    <p class="text-muted mb-0">
                        Explore top universities, world-class courses, and unlock opportunities for your future.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0 fw-bold text-white">Study Abroad Application Form</h4>
            <small>Apply for your dream university abroad</small>
        </div>

        <div class="card-body p-4">
            {{-- ✅ Success Message --}}
            @if(session('successMessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ❌ Validation Errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(['url' => route('study.abroad.submit'), 'method' => 'post']) }}
            @csrf

            <!-- 🔹 Step 1: Country - University - Course -->
            <div class="border rounded-4 bg-light p-4 mb-4 shadow-sm">
                <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">
                    Select Study Preferences
                </h5>
                 <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Country*</label>
                        <select name="country_id" id="country_id" class="form-control select2" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $c)
                                <option value="{{ $c->id }}">{{ $c->country_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">University*</label>
                        <select name="university_id" id="university_id" class="form-control select2" required>
                            <option value="">Select University</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Course*</label>
                        <select name="course_id" id="course_id" class="form-control select2" required>
                            <option value="">Select Course</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 🔹 Step 2: Personal Info -->
            <div class="border rounded-4 bg-light p-4 mb-4 shadow-sm">
                <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">
                    Personal Information
                </h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Full Name*</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone*</label>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" name="country_code" class="form-control" value="+88" readonly>
                            </div>
                            <div class="col-8">
                                <input type="text" name="phone" class="form-control"
                                       placeholder="e.g. 017XXXXXXXX"
                                       pattern="^(?:\+8801|8801|01)[3-9]\d{8}$"
                                       maxlength="11" inputmode="numeric" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label class="form-label fw-semibold">Email*</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label class="form-label fw-semibold">Address*</label>
                        <input type="text" name="address" class="form-control" placeholder="House, Road, City, Country" required>
                    </div>
                </div>
            </div>

            <!-- 🔹 Step 3: Academic Qualifications -->
            <div class="border rounded-4 bg-light p-4 mb-4 shadow-sm">
                <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">
                    Academic Qualifications
                </h5>

                @foreach ([
                    'ssc' => 'SSC / Equivalent',
                    'hsc' => 'HSC / Equivalent',
                    'honors' => 'Honors / Undergraduate',
                    'masters' => 'Masters / Postgraduate'
                ] as $key => $label)
                    <div class="border rounded-4 bg-white shadow-sm p-4 mb-4 academic-block" id="{{ $key }}-block">
                        <h6 class="fw-bold text-dark mb-3">{{ $label }}</h6>
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label mb-1 fw-semibold">Result (CGPA)</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="text" name="{{ $key }}_result" class="form-control" placeholder="e.g. 4.00">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="{{ $key }}_outof" class="form-control" placeholder="Out of 5 / 4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label mb-1 fw-semibold">Passing Year</label>
                                <input type="number" name="{{ $key }}_year" class="form-control" placeholder="e.g. 2020">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label mb-1 fw-semibold">Institute Name</label>
                                <input type="text" name="{{ $key }}_institute" class="form-control" placeholder="Enter institute name">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label mb-1 fw-semibold">Group / Major</label>
                                <input type="text" name="{{ $key }}_group" class="form-control" placeholder="e.g. Science / CSE">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- 🔹 Step 4: English Test -->
            <div class="border rounded-4 bg-light p-4 mb-4 shadow-sm">
                <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">
                    English Language Test
                </h5>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Test Type</label>
                        <select name="test_type" class="form-control" required>
                            <option value="">Select Test</option>
                            <option>TOEFL</option>
                            <option>IELTS</option>
                            <option>PTE</option>
                            <option>DUOLINGO</option>
                        </select>
                    </div>
                </div><br>
                <div class="row g-3">
                    <div class="col-md-3"><label>Speaking</label><input type="text" name="speaking" class="form-control" placeholder="e.g. 6.5"></div>
                    <div class="col-md-3"><label>Writing</label><input type="text" name="writing" class="form-control" placeholder="e.g. 7.0"></div>
                    <div class="col-md-3"><label>Listening</label><input type="text" name="listening" class="form-control" placeholder="e.g. 6.5"></div>
                    <div class="col-md-3"><label>Overall</label><input type="text" name="overall" class="form-control" placeholder="e.g. 6.8"></div>
                </div>
            </div>

            <!-- 🔹 Step 5: Referral -->
            <div class="border rounded-4 bg-light p-4 mb-4 shadow-sm">
                <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">Referral</h5>
                <div class="mb-3">
                    <label class="form-label">Referred By</label>
                    <input type="text" name="referred_by" class="form-control" placeholder="Enter name of referrer (if any)">
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 fw-bold">Submit Application</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

{{-- ✅ jQuery AJAX Dropdown --}}
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    $('.select2').select2({
        width: '100%',
    });

    // 🔹 Country → University
    $('#country_id').on('change', function () {
    var country_id = $(this).val();
    var $university = $('#university_id');
    var $course = $('#course_id');

    console.log("🌍 Country selected:", country_id);

    $university.html('<option value="">Loading...</option>');
    $course.html('<option value="">Select Course</option>');

    if (country_id) {
        $.ajax({
            url: "{{ url('get-universities') }}/" + country_id, // ✅ dynamic base URL
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log("🎓 Universities loaded:", data);
                $university.empty().append('<option value="">Select University</option>');
                $.each(data, function (i, val) {
                    $university.append('<option value="' + val.id + '">' + val.university_name + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error("❌ AJAX Error (Universities):", error);
                $university.html('<option value="">Error loading data</option>');
            }
        });
    } else {
        $university.html('<option value="">Select University</option>');
    }
});

$('#university_id').on('change', function () {
    var university_id = $(this).val();
    var $course = $('#course_id');

    console.log("🏛️ University selected:", university_id);

    $course.html('<option value="">Loading...</option>');

    if (university_id) {
        $.ajax({
            // ✅ Use Laravel’s url() helper for correct base URL
            url: "{{ url('get-courses') }}/" + university_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                console.log("📚 Courses loaded:", data);

                $course.empty().append('<option value="">Select Course</option>');

                if (data.length === 0) {
                    $course.append('<option value="">No courses available</option>');
                } else {
                    $.each(data, function (i, val) {
                        $course.append(
                            '<option value="' +
                                val.id +
                                '">' +
                                val.course_name +
                                " (" +
                                val.course_type +
                                ")</option>"
                        );
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("❌ AJAX Error (Courses):", error);
                console.log(xhr.responseText);
                $course.html('<option value="">Error loading data</option>');
            },
        });
    } else {
        $course.html('<option value="">Select Course</option>');
    }
});


});
</script>
@endsection
