@extends('frontend.layout.body')

@section('title','Academy')

@section('content')

<div id="main-wrapper">

    <!-- ============================ HERO ============================ -->
    <div class="py-5 bg-primary position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background: rgba(0,0,0,0.35);"></div>

        <div class="container position-relative">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h2 class="fw-bold text-white">Trip Designer Academy</h2>
                    <p class="mb-0 text-white opacity-90">
                        Explore Our Popular Courses
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================ COURSE SECTION ============================ -->
    <section class="gray-simple">
        <div class="container">
            <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row align-items-center justify-content-between"><br>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <h5 class="fw-bold fs-6 mb-lg-0 mb-3">Showing {{ count($courses) }} Courses</h5>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div class="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">
                                <div class="flsx-first mt-sm-0 mt-2">
                                    <ul class="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm"
                                        id="filtersblocks" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active rounded-3" id="trending" data-bs-toggle="tab" type="button"
                                                    role="tab" aria-selected="true">Trending</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-3" id="mostpopular" data-bs-toggle="tab" type="button"
                                                    role="tab" aria-selected="false">Popular</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-3" id="lowprice" data-bs-toggle="tab" type="button" role="tab"
                                                    aria-selected="false">Low Cost</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row justify-content-center gy-4 gx-xl-3 gx-lg-4 gx-4">

                        @foreach($courses as $course)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="pop-touritem">
                                <a href="{{ url('course/'.$course->slug) }}"
                                   class="card rounded-3 border br-dashed m-0 shadow-sm h-100">

                                    <!-- Image -->
                                    <div class="flight-thumb-wrapper p-2 pb-0">
                                        <div class="popFlights-item-overHidden rounded-3 overflow-hidden">
                                            <img src="{{ asset(json_decode($course->c_c_photo)) }}"
                                                 class="img-fluid rounded-3">
                                        </div>
                                    </div>

                                    <!-- Body -->
                                    <div class="touritem-middle position-relative p-3">
                                        <h4 class="city fs-6 m-0 fw-bold text-dark">
                                            {{ $course->title }}
                                        </h4>

                                        <ul class="list-unstyled mb-3 small mt-2">
                                            <li class="d-flex align-items-center mb-1">
                                                <i class="fa-solid fa-star text-warning me-2"></i>
                                                Rating: {{ $course->star }}
                                            </li>
                                            <li class="d-flex align-items-center mb-1">
                                                <i class="fa-solid fa-graduation-cap text-primary me-2"></i>
                                                Class: {{ $course->class_no }}
                                            </li>
                                            <li class="d-flex align-items-center mb-1">
                                                <i class="fa-solid fa-money-bill text-success me-2"></i>
                                                Price: View details
                                            </li>
                                        </ul>

                                        <div class="booking-wrapes d-flex align-items-center mt-auto">
                                            <button class="btn btn-md btn-light-primary fw-medium rounded full-width">
                                                View Course
                                            </button>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
@endsection
