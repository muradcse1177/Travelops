@extends('frontend.layout.body')
@section('title','Trip Designer - About Us  - The Best Air ticket,Visa and Tour Package Service Provider in Bangladesh.')
@section('content')
    <div id="main-wrapper">
    
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================ Booking Title ================================== -->
        <section class="bg-cover position-relative" style="background:url(public/b2c/assets/img/bg.jpg)no-repeat;" data-overlay="5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-7 col-lg-9 col-md-12">

                        <div class="fpc-capstion text-center my-4">
                            <div class="fpc-captions">
                                <h1 class="xl-heading text-light">{{$c_info->name}} Latest Blogs</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="fpc-banner"></div>
        </section>
        <section class="gray-simple pt-5 pb-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                        <div class="secHeading-wrap text-center mb-5">
                            <h2>Trending & Popular Articles</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center g-4">
                    @foreach($blogs as $i => $blog)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            {{-- Updated to use standard Bootstrap Card with shadow --}}
                            <div class="card h-100 shadow-sm rounded-3">
                                <a href="{{ url('/blog/'.$blog->slug) }}" class="d-block">
                                    <img src="{{ @$domain.'/'.$blog->b_c_photo }}" class="card-img-top" alt="Blog image">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="badge text-success bg-light-success">{{ $blog->b_category }}</span>
                                    </div>
                                    <h4 class="card-title fw-bold fs-6 lh-base">
                                        <a href="{{ url('/blog/'.$blog->slug) }}" class="text-dark">{{ $blog->b_title }}</a>
                                    </h4>
                                    <div class="card-text mb-4" style="text-align: justify;">
                                        {!! nl2br(substr($blog->s_description, 0, 200)) . '...' !!}
                                    </div>
                                    <a class="mt-auto text-primary fw-medium" href="{{ url('/blog/'.$blog->slug) }}">
                                        Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if(($i + 1) % 3 === 0 && app()->environment('production') && config('services.adsense.client'))
                            <div class="col-12">
                                <div class="my-4 text-center">
                                    <ins class="adsbygoogle"
                                         style="display:block;width:100%;min-height:250px"
                                         data-ad-client="{{ config('services.adsense.client') }}"
                                         data-ad-slot="5509037389"
                                         data-ad-format="auto"
                                         data-full-width-responsive="true"></ins>
                                    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <br>
                <div class="table-responsive">
                    <div class="d-flex justify-content-center mt-5">
                        <div aria-label="Custom pagination" class="custom-pagination">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================================ Article Section Start ======================================= -->
    </div>
@endsection
@section('js')
    <script>
    </script>
@endsection
