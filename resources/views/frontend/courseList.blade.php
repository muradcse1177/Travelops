@extends('frontend.layout.body')
@section('title','Trip Designer - '.$university->university_name.' Courses - Study Abroad')
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

    <!-- ============================ Course List Start ============================ -->
    <section class="gray-simple" style="margin-top: -40px">
        <div class="container">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body py-4 text-center">
                    <h4 class="fw-bold text-dark mb-1">
                        All courses of {{ $university->university_name }} — {{ $country->country_name }}
                    </h4>
                    <p class="text-muted mb-0">
                        Explore every available program offered by {{ $university->university_name }} for international students.
                    </p>
                </div>
            </div>
            <br>
            <div class="row justify-content-center gy-4 gx-xl-3 gx-lg-4 gx-4">

                @foreach($courses as $course)
                    @php
                        // Random gradient fallback background
                        $colors = [
                            'linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%)',
                            'linear-gradient(135deg, #f6d365 0%, #fda085 100%)',
                            'linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%)',
                            'linear-gradient(135deg, #fddb92 0%, #d1fdff 100%)',
                            'linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%)'
                        ];
                        $bg = $colors[array_rand($colors)];

                        // Build dynamic course URL
                        $courseUrl = url('/').'/institutions/' 
                                    . $university->slug . '/' 
                                    . ($course->course_type ?? 'course') . '/' 
                                    . $course->course_slug;
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pop-touritem h-100">
                            <div class="card rounded-3 border br-dashed m-0 shadow-sm h-100">

                                {{-- ✅ Course cover photo or fallback --}}
                                {{-- @if($course->cover_photo)
                                    <a href="{{ $courseUrl }}">
                                        <div class="flight-thumb-wrapper p-2 pb-0">
                                            <div class="popFlights-item-overHidden rounded-3 overflow-hidden">
                                                <img src="{{ @$domain.'/'.$course->cover_photo }}" 
                                                    class="img-fluid rounded-3" 
                                                    alt="{{ $course->course_name }}">
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    {{-- 🚀 Fallback with gradient background --}}
                                    {{-- <a href="{{ $courseUrl }}"> --}}
                                        {{-- <div class="flight-thumb-wrapper p-2 pb-0">
                                            <div class="popFlights-item-overHidden rounded-3 overflow-hidden d-flex align-items-center justify-content-center"
                                                style="background: {{ $bg }}; height: 160px;">
                                                <h5 class="text-white fw-bold text-center px-2"
                                                    style="background: #04107C; padding: 5px 10px; border-radius: 5px;">
                                                    {{ \Illuminate\Support\Str::limit($course->course_name, 45) }}
                                                </h5>
                                            </div>
                                        </div>
                                    </a> --}}
                                {{-- @endif --}} 

                                {{-- ✅ Course Info --}}
                                <div class="touritem-middle position-relative p-3">
                                    <h5 class="fw-bold text-dark mb-2">{{ $course->course_name }}</h5>

                                    <ul class="list-unstyled mb-3 small">
                                        <li><strong>Duration:</strong> {{ $course->duration ?? 'N/A' }}</li>
                                        <li>
                                            <strong>Tuition:</strong>
                                            {{ $course->tuition_fees 
                                                ? $course->tuition_fees
                                                : ($course->final_tuition_fee ?? 'N/A') }}
                                        </li>
                                    </ul>

                                    <div class="booking-wrapes d-flex align-items-center mt-auto">
                                        <a href="{{ $courseUrl }}" 
                                            class="btn btn-md btn-light-primary fw-medium rounded full-width me-2">
                                            View Offer
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            {{-- ✅ Pagination --}}
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        {{ $courses->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Course List End ============================ -->

</div>
@endsection


@section('js')
<script>
$(document).ready(function(){

    // ✅ When country changes → load universities dynamically
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
            data: { 
                country_id: countryId, 
                _token: "{{ csrf_token() }}" 
            },
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
