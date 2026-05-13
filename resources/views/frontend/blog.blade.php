@extends('frontend.layout.body')
@section('title','Trip Designer - Blog  - The Best Air ticket,Visa and Tour Package Service Provider in Bangladesh.')
@section('content')
    <div id="main-wrapper">
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================ Articles Thumb Section ================================== -->
        <section class="p-0">
            <div class="thumb-wrap">
                <img src="{{url('public/b2c/assets/img/banner-7.jpg')}}" class="img-fluid full-width object-fit" alt="" style="height: 300px;">
            </div>
        </section>
        <!-- ============================ Articles Thumb Section ================================== -->
        <!-- ============================ Articles Deatil Section ================================== -->
        <section class="p-0 position-relative mt-n6">
            <div class="container">
                <div class="row g-4">
                    <!-- Article content -->
                    <div class="col-11 col-lg-10 mx-auto">
                        <div class="bg-white shadow rounded-4 p-4">
                            <!-- Badge -->
                            <div class="d-inline-flex mb-2"><span class="label text-success bg-light-success">{{$blog->b_category}}</span></div>
                            <!-- Title -->
                            <h1 class="fs-3">{{$blog->b_title}}</h1>
                            <p class="mb-3">{{$blog->s_description.'...'}}</p>

                            <!-- List -->
                            <ul class="nav nav-divider align-items-center p-0">
                                <li class="nav-item ps-0">
                                    <div class="nav-link">
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-lg">
                                                <img class="avatar-img circle" src="{{Url('public/user.png')}}" alt="avatar">
                                            </div>
                                            <!-- Info -->
                                            <div class="ms-2">
                                                <h6 class="mb-0"><a href="#">{{$blog->p_by}}</a></h6>
                                                <p class="mb-0"><span>{{$blog->time}}</span><span class="text-muted-2 mx-2"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ============================ Article Description ========================================== -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto" style="text-align: justify;">
                        @if(app()->environment('production') && config('services.adsense.client'))
                            <div class="my-4">
                                <ins class="adsbygoogle"
                                     style="display:block;width:100%;min-height:250px"
                                     data-ad-client="{{ config('services.adsense.client') }}"
                                     data-ad-slot="5509037389"
                                     data-ad-format="auto"
                                     data-full-width-responsive="true"></ins>
                                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="tab-content" id="pillstour-tabContent">
                            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                    aria-labelledby="pills-overview-tab" tabindex="0">
                                <div class="overview-wrap full-width">
                                    <div class="card mb-4 border shadow rounded-4 p-4 gray">
                                        <div class="card-header bg-primary text-white rounded-4 mb-3 text-center">
                                            <h4 class="fs-5 mb-0 text-white">Blog Details</h4>
                                        </div>
                                        <div class="card-body gray">
                                             {!! json_decode($blog->details) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="tab-content" id="pillstour-tabContent">
                            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                    aria-labelledby="pills-overview-tab" tabindex="0">
                                <div class="overview-wrap full-width">
                                    <div class="card mb-4 border shadow rounded-4 p-4 gray">
                                        <div class="card-header bg-primary text-white rounded-4 mb-3 text-center">
                                            <h4 class="fs-5 mb-0 text-white">Trending & Popular Articles</h4>
                                        </div>
                                        <div class="card-body gray">
                                            <div class=" row g-2 justify-content-center" style="margin:-25px;">

                                                @foreach($blogs as $blo)
                                                    <div class="col-12 px-1">

                                                        <!-- BLOG CARD -->
                                                        <div class="card w-100 shadow-sm border-0 rounded-4">
                                                            <div class="card-body">

                                                                <!-- IMAGE -->
                                                                <div class="mb-3">
                                                                    <a href="{{ url('/blog/'.$blo->slug) }}">
                                                                        <img src="{{ url('/'.$blo->b_c_photo) }}"
                                                                            class="img-fluid w-100 rounded-3"
                                                                            alt="Blog image">
                                                                    </a>
                                                                </div>

                                                                <!-- CATEGORY -->
                                                                <div class="mb-2">
                                                                    <span class="badge bg-light-success text-success px-3 py-1 rounded-pill">
                                                                        {{ $blo->b_category }}
                                                                    </span>
                                                                </div>

                                                                <!-- TITLE -->
                                                                <h4 class="fw-bold fs-6 lh-base mb-2">
                                                                    <a href="{{ url('/blog/'.$blo->slug) }}" class="text-dark text-decoration-none">
                                                                        {{ $blo->b_title }}
                                                                    </a>
                                                                </h4>

                                                                <!-- READ MORE -->
                                                                <a href="{{ url('/blog/'.$blo->slug) }}" class="text-primary fw-medium">
                                                                    Read More <i class="fa-solid fa-arrow-trend-up ms-1"></i>
                                                                </a>

                                                            </div>
                                                        </div>
                                                        <!-- END BLOG CARD -->

                                                    </div>
                                                @endforeach

                                                {{-- Adsense --}}
                                                @if(app()->environment('production') && config('services.adsense.client'))
                                                    <div class="col-12 px-1 my-3">
                                                        <ins class="adsbygoogle"
                                                            style="display:block;width:100%;min-height:250px"
                                                            data-ad-client="{{ config('services.adsense.client') }}"
                                                            data-ad-slot="5509037389"
                                                            data-ad-format="auto"
                                                            data-full-width-responsive="true"></ins>
                                                        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $('p img').css('width', '100%');
    </script>
@endsection
