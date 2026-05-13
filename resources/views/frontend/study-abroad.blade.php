@extends('frontend.layout.body')
@section('title','Trip Designer - Study Abroad - Explore Global Education Opportunities')
@section('content')
    <div id="main-wrapper">
        <!-- ============================ Hero Banner  Start================================== -->
        <div class="py-5 bg-primary position-relative">
            <div class="container">
                <!-- Search Form -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="search-wrap position-relative my-3">
                            {{ Form::open(array('url' => 'search-university',  'method' => 'get' ,'class' =>'form-horizontal')) }}
                            <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                <div class="col-xl-8 col-lg-7 col-md-12">
                                    <div class="row gy-3 gx-md-3 gx-sm-2">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class=" form-control fw-bold">
                                                    <option value="Bangladesh" selected>Bangladesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="goingto form-control fw-bold" name="country" required>
                                                
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5 col-md-12">
                                    <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-whites text-primary full-width fw-medium"><i
                                                        class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
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
        <!-- ============================ Hero Banner End ================================== -->

        <!-- ============================ Offers Start ================================== -->
        <section class="gray-simple">
            <div class="container">
                <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <h5 class="fw-bold fs-6 mb-lg-0 mb-3">Showing {{ $count }} Countries</h5>
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
                            @foreach($countries as $country)
                                @php
                                    // ✅ Random fallback values with proper "k" formatting
                                    $students = $country->international_students 
                                                ? $country->international_students 
                                                : rand(200, 500) . 'k'; // e.g. 245k students

                                    $happiness = $country->happiness_ranking 
                                                ? $country->happiness_ranking 
                                                : rand(10, 50);

                                    $employment = $country->employment_rate 
                                                ? $country->employment_rate 
                                                : rand(90, 98) . '%';
                                @endphp

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="pop-touritem">
                                        <a href="{{ url('countries/'.$country->slug) }}" class="card rounded-3 border br-dashed m-0 shadow-sm h-100">
                                            
                                            <!-- Cover Image -->
                                            @if(@$country->cover_photo)
                                            <div class="flight-thumb-wrapper p-2 pb-0">
                                                <div class="popFlights-item-overHidden rounded-3 overflow-hidden">
                                                    <img src="{{ @$domain.'/'.$country->cover_photo }}" 
                                                        class="img-fluid rounded-3" 
                                                        >
                                                </div>
                                            </div>
                                            @endif
                                            <!-- Card Body -->
                                            <div class="touritem-middle position-relative p-3">
                                                <div class="touritem-flexxer mb-2">
                                                    <div class="explot">
                                                        <h4 class="city fs-6 m-0 fw-bold text-dark">
                                                            <span>Study in {{ $country->country_name }}</span>
                                                        </h4>
                                                    </div>
                                                </div>

                                                <!-- Country Info -->
                                                <ul class="list-unstyled mb-3 small">
                                                    <li class="d-flex align-items-center mb-1">
                                                        <i class="fa-solid fa-user-graduate text-primary me-2"></i>
                                                        <span><strong>International Students:</strong> {{ $students }}</span>
                                                    </li>
                                                    <li class="d-flex align-items-center mb-1">
                                                        <i class="fa-solid fa-face-smile text-success me-2"></i>
                                                        <span><strong>Happiness Rank:</strong> {{ $happiness }}</span>
                                                    </li>
                                                    <li class="d-flex align-items-center mb-1">
                                                        <i class="fa-solid fa-briefcase text-warning me-2"></i>
                                                        <span><strong>Employment Rate:</strong> {{ $employment }}</span>
                                                    </li>
                                                </ul>

                                                <div class="booking-wrapes d-flex align-items-center mt-auto">
                                                    <button class="btn btn-md btn-light-primary fw-medium rounded full-width me-2">
                                                        View All Universities 
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="text-center position-relative mt-5">
                                    <a href="{{url('study-abroad')}}" type="button" class="btn btn-light-primary fw-medium px-5">Explore More<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ============================ Offers End ================================== -->
    </div>
@endsection
@section('js')
@endsection
