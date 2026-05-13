@extends('frontend.layout.body')
@section('title', 'Apply Now - ' . $course->course_name)
@section('content')

<div id="main-wrapper">
    <!-- ============================ Course Header ============================ -->
    <section class="pt-3 gray-simple">
        <div class="container" style="margin-bottom: -60px;">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body py-4 text-center">
                    <h4 class="fw-bold text-dark mb-1">{{ $course->course_name }}</h4>
                    <p class="text-muted mb-0">
                        Offered by {{ $university->university_name }}, {{ $country->country_name }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- ============================ Apply Form ============================ -->
<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0 fw-bold text-white">Apply Now for {{ $course->course_name }}</h4>
            <small>{{ $university->university_name }} — {{ $country->country_name }}</small>
        </div>

        <div class="card-body p-4">
            @if(session('successMessage'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('successMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('errorMessage'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('errorMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif


            {{ Form::open(['url' => 'submit-application', 'method' => 'post']) }}
            @csrf

            <!-- Personal Info -->
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
                        <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label class="form-label fw-semibold">Address*</label>
                        <input type="text" name="address" class="form-control" placeholder="House, Road, City, Country" required>
                    </div>
                </div>
            </div>

            <!-- Academic Qualifications -->
            <div class="border rounded-4 bg-light p-4 mb-4 shadow-sm">
                <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">
                    Academic Qualifications
                </h5>

                @php $type = strtolower($course->course_type ?? 'undergraduate'); @endphp

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

            <!-- English Language Test -->
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
                    <div class="col-md-3"><label>Speaking</label><input type="text" name="speaking" class="form-control" placeholder="e.g. 6.5" required></div>
                    <div class="col-md-3"><label>Writing</label><input type="text" name="writing" class="form-control" placeholder="e.g. 7.0" required></div>
                    <div class="col-md-3"><label>Listening</label><input type="text" name="listening" class="form-control" placeholder="e.g. 6.5" required></div>
                    <div class="col-md-3"><label>Overall</label><input type="text" name="overall" class="form-control" placeholder="e.g. 6.8" required></div>
                </div>
            </div>

            <!-- Referred By -->
            <div class="border rounded-4 bg-light p-4 mb-4 shadow-sm">
                <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">Referral</h5>
                <div class="mb-3">
                    <label class="form-label">Referred By</label>
                    <input type="text" name="referred_by" class="form-control" placeholder="Enter name of referrer (if any)">
                </div>
            </div>

            <div class="text-center mt-4">
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <input type="hidden" name="university_id" value="{{ $university->id }}">
                <input type="hidden" name="country_id" value="{{ $country->id }}">
                <button type="submit" class="btn btn-primary px-5 fw-bold">Submit Application</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>

{{-- Dynamic show/hide --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const type = "{{ $type }}";
    document.querySelectorAll('.academic-block').forEach(el => el.style.display = 'none');
    if (type === 'undergraduate') {
        ['ssc', 'hsc'].forEach(id => document.getElementById(id + '-block').style.display = 'block');
    } else if (type === 'postgraduate') {
        ['ssc', 'hsc', 'honors'].forEach(id => document.getElementById(id + '-block').style.display = 'block');
    } else if (type === 'doctorate') {
        ['ssc', 'hsc', 'honors', 'masters'].forEach(id => document.getElementById(id + '-block').style.display = 'block');
    }
});
</script>

@endsection
