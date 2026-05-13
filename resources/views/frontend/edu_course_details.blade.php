@extends('frontend.layout.body')
@section('title', $course->course_name . ' - ' . $university->university_name)
@section('content')
<div id="main-wrapper">

   <!-- ============================ Hero Banner Start ============================ -->
    <div class="py-5 bg-primary position-relative">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="search-wrap position-relative my-3">
                        {{ Form::open(['url' => 'search-university-course', 'method' => 'get', 'class' => 'form-horizontal']) }}
                        <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                            <div class="col-xl-8 col-lg-7 col-md-12">
                                <div class="row gy-3 gx-md-3 gx-sm-2">

                                    <!-- Country -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                        <div class="form-group hdd-arrow mb-0">
                                            <select class="goingto form-control fw-bold" id="country_id" name="country" required>
                                                <option value="">Select Country</option>
                                                @foreach($allCountries as $c)
                                                    <option value="{{ $c->id }}" {{ $c->id == $country->id ? 'selected' : '' }}>
                                                        {{ $c->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- University -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group hdd-arrow mb-0">
                                            <select class="goingto form-control fw-bold" id="university_id" name="university">
                                                <option value="">Select University</option>
                                                @foreach($universities as $uni)
                                                    <option value="{{ $uni->id }}" {{ $uni->id == $university->id ? 'selected' : '' }}>
                                                        {{ $uni->university_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-xl-4 col-lg-5 col-md-12">
                                <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-whites text-primary full-width fw-medium">
                                                <i class="fa-solid fa-magnifying-glass me-2"></i>Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ============================ -->

    <section class="pt-3 gray-simple">
        <div class="container">
            <div class="card shadow-sm border-0 rounded-3" >
                <div class="card-body py-4 text-center">
                    <h4 class="fw-bold text-dark mb-1">
                         {{ $course->course_name }}
                    </h4>
                    <p class="text-muted mb-0">
                       Offered by {{ $university->university_name }}, {{ $country->country_name }}
                    </p>
                </div>
            </div>
            <br>
            <div class="row">

                <!-- Course Details -->
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="tab-content" id="pillstour-tabContent">
                        <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                aria-labelledby="pills-overview-tab" tabindex="0">
                            <div class="overview-wrap full-width">
                                {{-- ✅ Course Overview Card --}}
                                @if(!empty($course->course_overview))
                                    <div class="card border rounded-3 mb-4">
                                        <div class="card-header light-primary-bg">
                                            <h4 class="fs-5">Course Overview</h4>
                                        </div>
                                        <div class="card-body">
                                            {!! nl2br(e($course->course_overview)) !!}
                                        </div>
                                    </div>
                                @endif


                                {{-- ✅ Key Program Highlights Card --}}
                                @if(!empty($course->key_program_highlights))
                                    <div class="card border rounded-3 mb-4">
                                        <div class="card-header">
                                            <h4 class="fs-5">Key Program Highlights</h4>
                                        </div>
                                        <div class="card-body">
                                            @php
                                                // প্রতিটি নতুন লাইন আলাদা bullet বানানো হচ্ছে
                                                $highlights = preg_split("/\r\n|\n|\r/", trim($course->key_program_highlights));
                                            @endphp

                                            @if(!empty($highlights))
                                                <ul class="highlight-list" style="list-style: none; padding-left: 1.5rem; margin: 0;">
                                                    @foreach($highlights as $item)
                                                        @if(!empty(trim($item)))
                                                            <li style="position: relative; padding-left: 25px; margin-bottom: 6px;">
                                                                <span style="position: absolute; left: 0; color: green;">&#10003;</span> {{-- ✔ tick symbol --}}
                                                                {{ trim($item) }}
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <div class="card border rounded-3 mb-4">
                                    <div class="card-header bg-light">
                                        <h4 class="fs-5 mb-0">Requirements</h4>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            // JSON ডিকোড করা হচ্ছে
                                            $requirements = json_decode($course->requirements, true);
                                        @endphp

                                        @if(is_array($requirements) && !empty($requirements))
                                            <div class="row gy-3">
                                                @foreach($requirements as $category => $items)
                                                    <div class="col-md-6">
                                                        <div class="border rounded-3 p-3 h-100 shadow-sm">
                                                            <h6 class="fw-bold text-primary text-capitalize mb-3">
                                                                {{ str_replace('_', ' ', $category) }}
                                                            </h6>

                                                            @if(is_array($items))
                                                                <ul class="m-0 p-0" style="list-style: none;">
                                                                    @foreach($items as $req)
                                                                        <li style="position: relative; padding-left: 25px; margin-bottom: 8px;">
                                                                            <span style="position: absolute; left: 0; color: #0d6efd;">&#10003;</span>
                                                                            {{ $req }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <p class="mb-0">
                                                                    <span style="color: #0d6efd;">&#10003;</span> {{ $items }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted mb-0">No requirements available.</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="card border rounded-3 mb-4">
                        <div class="card-body">
                            @if($course->cover_photo)
                                <img src="{{ @$domain.'/'.$course->cover_photo }}" class="img-fluid rounded mb-3" alt="{{ $course->course_name }}">
                            @endif

                            <p><strong>Duration:</strong> {{ $course->duration ?? 'N/A' }}</p>

                            <p><strong>Tuition Fee:</strong>
                                {{ $course->tuition_fees ?? ($course->final_tuition_fee ?? 'N/A') }}
                            </p>

                            {{-- ✅ Campus Name (if available) --}}
                            @if(!empty($course->campus))
                                <p><strong>Campus:</strong> {{ $course->campus }}</p>
                            @endif

                            {{-- ✅ Mode of Study (if available) --}}
                            @if(!empty($course->mode_of_study))
                                <p><strong>Mode of Study:</strong> {{ ucfirst($course->mode_of_study) }}</p>
                            @endif

                            <p><strong>University:</strong> {{ $university->university_name }}</p>
                            <p><strong>Country:</strong> {{ $country->country_name }}</p>

                            <a href="{{ url('apply/' . $university->slug . '/' . $course->course_type . '/' . $course->course_slug) }}" 
                                class="btn btn-primary full-width fw-bold text-uppercase">
                                Apply Now
                            </a>

                        </div>
                    </div>


                    <!-- Related Courses -->
                    @if(count($relatedCourses))
                        <div class="card border rounded-3 mb-4">
                            <div class="card-header bg-light">
                                <h5 class="fw-bold m-0">More Courses</h5>
                            </div>

                            <div class="card-body">
                                <div class="row gy-3 gx-3">
                                    @foreach($relatedCourses as $rel)
                                        @php
                                            $courseUrl = url('institutions/' . ($university->slug ?? $university_slug) . '/' . $rel->course_type . '/' . $rel->course_slug);
                                        @endphp

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <a href="{{ $courseUrl }}" class="text-decoration-none">
                                                <div class="border rounded-3 p-3 hover-card transition-all">
                                                    <h6 class="fw-bold text-dark mb-0">
                                                        {{ \Illuminate\Support\Str::limit($rel->course_name, 60) }}
                                                    </h6>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('js')
<script>
$(document).ready(function(){
    $('#country_id').on('change', function(){
        var countryId = $(this).val();
        var $universitySelect = $('#university_id');
        $universitySelect.html('<option>Loading...</option>');

        if(!countryId) {
            $universitySelect.html('<option value="">Select University</option>');
            return;
        }

        $.ajax({
            url: "{{ url('frontend/get-universities-by-country') }}",
            type: "POST",
            data: { country_id: countryId, _token: "{{ csrf_token() }}" },
            success: function(res){
                $universitySelect.empty();
                if(res.length > 0){
                    $universitySelect.append('<option value="">Select University</option>');
                    res.forEach(function(u){
                        $universitySelect.append(`<option value="${u.id}">${u.university_name}</option>`);
                    });
                } else {
                    $universitySelect.append('<option value="">No universities found</option>');
                }
            },
            error: function(){
                $universitySelect.html('<option value="">Error loading universities</option>');
            }
        });
    });
});
</script>
@endsection
