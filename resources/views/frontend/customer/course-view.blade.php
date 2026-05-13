@extends('frontend.layout.body')
@section('title', 'Trip Designer - Order Confirmation')

@section('content')
    <section class="pt-5 gray-simple position-relative">
        <div class="container">
            <?php
            if($user->logo){
                $photo = $user->logo;
            }
            else{
                $photo = 'public/user.png';
            }
            ?>
            <div class="row align-items-start justify-content-between gx-xl-4">

                <div class="col-xl-4 col-lg-4 col-md-12 d-none d-lg-block">
                    <div class="card rounded-2 me-xl-5 mb-4">
                        <div class="card-top bg-primary position-relative">
                            <div class="py-5 px-3">
                                <div class="crd-thumbimg text-center">
                                    <div class="p-2 d-flex align-items-center justify-content-center brd">
                                        @if(!empty($photo))
                                            <img src="{{ url($photo) }}" class="img-fluid circle" width="120" alt="User Photo">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 120px; height: 120px;">
                                                <i class="fa fa-user fa-2x text-secondary"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="crd-capser text-center">
                                    <h5 class="mb-0 text-light fw-semibold">{{ @$user->company_name }}</h5>
                                    <span class="text-light opacity-75 fw-medium text-md">
                        <i class="fa-solid fa-location-dot me-2"></i>{{ @$user->address }}
                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-middle px-4 py-5">
                            <div class="crdapproval-groups">

                                <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                    <div class="crdapproval-item">
                                        <div class="square--50 circle bg-light-success text-success">
                                            <i class="fa-solid fa-envelope-circle-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="crdapproval-caps ps-2">
                                        <p class="fw-semibold text-dark lh-2 mb-0">Verified Email</p>
                                        <p class="text-md text-muted lh-1 mb-0">{{ @$user->created_at }}</p>
                                    </div>
                                </div>

                                <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                    <div class="crdapproval-item">
                                        <div class="square--50 circle bg-light-success text-success">
                                            <i class="fa-solid fa-phone-volume fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="crdapproval-caps ps-2">
                                        <p class="fw-semibold text-dark lh-2 mb-0">Verified Mobile Number</p>
                                        <p class="text-md text-muted lh-1 mb-0">{{ @$user->created_at }}</p>
                                    </div>
                                </div>

                                <div class="crdapproval-single d-flex align-items-center justify-content-start">
                                    <div class="crdapproval-item">
                                        <div class="square--50 circle bg-light-warning text-warning">
                                            <i class="fa-solid fa-file-invoice fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="crdapproval-caps ps-2">
                                        <p class="fw-semibold text-dark lh-2 mb-0">Complete Basic Info</p>
                                        <p class="text-md text-muted lh-1 mb-0">Verified</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-middle mt-5 mb-4 px-4">
                            <div class="crd-upgrades">
                                <button class="btn btn-light-primary fw-medium full-width rounded-2" type="button">
                                    <i class="fa-solid fa-sun me-2"></i>{{ @$user->status }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-8 col-lg-8 col-md-12">
                    <!-- Personal Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4><i class="fa-solid fa-passport me-2"></i>Visa Processing Masterclass Recorded Video</h4>
                        </div>
                        <div class="card-body">
                            <div class="container px-1">

                                {{-- 🧾 If no class videos --}}
                                @if($classVideos->isEmpty())
                                    <p class="text-center text-muted my-4">
                                        <i class="fa-solid fa-video-slash me-2"></i>
                                        No class videos available for this course.
                                    </p>
                                @else

                                    {{-- 🎬 Accordion for Class Videos --}}
                                    <div class="accordion" id="classAccordion">
                                        @foreach($classVideos as $video)
                                            <div class="accordion-item mb-3 border rounded shadow-sm">
                                                <h2 class="accordion-header" id="heading{{ $video->id }}">
                                                    <button class="accordion-button collapsed fw-bold" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $video->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ $video->id }}">
                                                        🎬 Class {{ $video->class_no }}: {{ $video->class_title }}
                                                    </button>
                                                </h2>

                                                <div id="collapse{{ $video->id }}"
                                                     class="accordion-collapse collapse"
                                                     aria-labelledby="heading{{ $video->id }}"
                                                     data-bs-parent="#classAccordion">
                                                    <div class="accordion-body bg-dark p-0">

                                                        {{-- 🎥 Bunny Player Full Width --}}
                                                        <div class="video-wrapper position-relative" style="width: 100%;">
{{--                                                            <iframe--}}
{{--                                                                src="{{ $video->bunny_video_link }}"--}}
{{--                                                                frameborder="0"--}}
{{--                                                                allow="autoplay; fullscreen; picture-in-picture"--}}
{{--                                                                allowfullscreen--}}
{{--                                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;">--}}
{{--                                                            </iframe>--}}
                                                            <div style="position:relative;padding-top:56.25%;">
                                                                <iframe
                                                                    src="https://iframe.mediadelivery.net/embed/{{ $video->bunny_library_id }}/{{ $video->bunny_video_id }}?autoplay=true&loop=false&muted=false&preload=true&responsive=true"
                                                                    loading="lazy"
                                                                    style="border:0;position:absolute;top:0;left:0;height:100%;width:100%;"
                                                                    allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;"
                                                                    allowfullscreen="true">
                                                                </iframe>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>

                                @endif

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!-- Modal -->

    </section>
    <!-- ============================ Booking Page End ================================== -->

@endsection
