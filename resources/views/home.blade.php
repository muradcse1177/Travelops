@extends('frontend.layout.body')
@section('title','Trip Designer - Home - The Biggest and Prominent Travel Agency in Bangladesh.')
@section('css')
@endsection
@section('content')
    <div class="image-cover hero-header bg-white" style="background:url({{url('/public/b2c/assets/images/a.jpg')}})no-repeat; height: 50%;">
        <div class="container">

            <!-- Search Form -->
            <div class="row justify-content-center align-items-center">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="search-wrap bg-white rounded-3 p-3">
                        <ul class="nav nav-pills primary-soft medium justify-content-left mb-3" id="tour-pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tours">Tour</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#flights">Flight</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#visa">Visa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#education">Education</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#work-permit"> Work Permit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#hajj-umrah"> Hajj Umrah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#services"> Service</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @include('frontend.partial-home.flight')
                            @include('frontend.partial-home.tour')
                            @include('frontend.partial-home.visa')
                            @include('frontend.partial-home.education')
                            @include('frontend.partial-home.work-permit')
                            @include('frontend.partial-home.hajj-umrah')
                            @include('frontend.partial-home.service')
                        </div>
                    </div>
                </div>
            </div>
            <!-- </row> -->

        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Popular Attraction Start ================================== -->
    <section>
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Best Visa Service  From Bangladesh </h2>
                    </div>
                </div>
            </div>

            @include('frontend.partial-home.visa-section')

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        <a type="button" href="{{url('visa')}}" class="btn btn-light-primary fw-medium px-5">Explore More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Popular Attraction Start ================================== -->

    <!-- ============================ Popular Venues Start ================================== -->
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Hot & Trending Tour Packages</h2>
                    </div>
                </div>
            </div>

            @include('frontend.partial-home.tour-section')

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        <a href="{{url('tour-package')}}" type="button" class="btn btn-light-primary fw-medium px-5">Explore More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Popular Venues Start ================================== -->

    <section>
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Best Work Permit Visa Service  From Bangladesh </h2>
                    </div>
                </div>
            </div>

            @include('frontend.partial-home.work-permit-section')

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        <a type="button" href="{{url('work-permit')}}" class="btn btn-light-primary fw-medium px-5">Explore More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Hot & Trending Hajj & Umrah Packages</h2>
                    </div>
                </div>
            </div>

            @include('frontend.partial-home.hajj-urmah-section')

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        <a href="{{url('tour-package')}}" type="button" class="btn btn-light-primary fw-medium px-5">Explore More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================ Article Section Start ======================================= -->
    <section class="pt-0">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Trending & Popular Articles</h2>
                    </div>
                </div>
            </div>

            @include('frontend.partial-home.blog-section')

        </div>
    </section>
@endsection
@section('js')
<script>
    $("#departure").on('keyup',function() {
        if($.trim($("#departure").val()).length >= 3){
            var val = $("#departure").val();
            $.ajax({
                type: "GET",
                url: "{{url('getAirportDetails')}}",
                data: {'code':val,"_token": "{{ csrf_token() }}",},
                cache: false,
                success: function(data)
                {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                }
            });
        }
    });
    function selectCountry(val) {
        $("#departure").val(val);
        $("#suggesstion-box").hide();
    }

    $("#arrival").on('keyup',function() {
        if($.trim($("#arrival").val()).length >= 3){
            var val = $("#arrival").val();
            $.ajax({
                type: "GET",
                url: "{{url('getAirportDetails1')}}",
                data: {'code':val,"_token": "{{ csrf_token() }}",},
                cache: false,
                success: function(data)
                {
                    $("#suggesstion-box1").show();
                    $("#suggesstion-box1").html(data);
                }
            });
        }
    });
    function selectCountry1(val) {
        $("#arrival").val(val);
        $("#suggesstion-box1").hide();
    }
    <?php
        if(@$errorMas){
            $error = $errorMas;
            echo 'swal('.@$error.')';
        }
    ?>

</script>
@endsection
