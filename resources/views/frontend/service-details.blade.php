@extends('frontend.layout.body')
@section('title','Trip Designer - Service  - The Best Ticket, Visa, Manpower Service Provider in Bangladesh.')
@section('css')
    <style>
        /* Hide sidebar by default (desktop/tablet) */
        .booking-sidebar {
            display: none;
        }

        /* Show only on small screens (mobile devices) */
        @media (max-width: 767.98px) {
            .booking-sidebar {
                display: block !important;
            }
        }
        #responseModal .modal-content {
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
        }
        #responseModal h4 {
            font-size: 1.3rem;
        }
    </style>
@endsection
@section('content')
    <div id="main-wrapper">
            <!-- ============================ HERO ============================ -->
        <div class="py-5 bg-primary position-relative">
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background: rgba(0,0,0,0.35);"></div>

            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h3 class="fw-bold text-white">Trip Designer Service:  <span style="color: #f1bb09">{{@$ser->title}}</span></h3>
                        <p class="mb-0 text-white opacity-90">
                            Grab your Service safely & quickly
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>

        <section class="pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 booking-sidebar">
                        <div class="sides-block">
                            <div class="card border rounded-3 mb-4">
                                <div class="single-card px-3 py-3">
                                    <p class="font10 lh-1 mb-0"><b>For Booking Please Contact Us: </b></p><hr>
                                    <p class="font10 lh-1 mb-0"><b>Phone: </b> {{$c_info->phone1}}</p><hr>
                                    <p class="font10 lh-1 mb-0"><b>Email: </b>{{$c_info->email}}</p>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-4">
                                <div class="single-card px-3 py-3">
                                    <button class="btn btn-sm btn-primary full-width fw-medium text-uppercase mb-2"
                                            type="button"  data-bs-toggle="modal" data-bs-target="#service-modal">Send Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-12">
                                <div class="tab-content" id="pillstour-tabContent">
                                    <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                         aria-labelledby="pills-overview-tab" tabindex="0">
                                        <div class="overview-wrap full-width">
                                            <div class="card mb-4 border rounded-3">
                                                <div class="card-header">
                                                    <h4 class="fs-5">Service Details</h4>
                                                </div>
                                                <div class="card-body">
                                                    {!! nl2br(json_decode($ser->s_details)) !!}
                                                </div>
                                            </div>
                                            @if(json_decode($ser->p_method) !=null)
                                                <div class="card border rounded-3 mb-4">
                                                    <div class="card-header">
                                                        <h4 class="fs-5">Payment Method</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! nl2br(json_decode($ser->p_method)) !!}
                                                    </div>
                                                </div>
                                            @endif
                                            @if(json_decode($ser->exclusion) !=null)
                                                <div class="card border rounded-3 mb-4">
                                                    <div class="card-header">
                                                        <h4 class="fs-5">Exclusion</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! nl2br(json_decode($ser->exclusion)) !!}
                                                    </div>
                                                </div>
                                            @endif
                                            @if(json_decode($ser->tnt) !=null)
                                                <div class="card border rounded-3 mb-4">
                                                    <div class="card-header">
                                                        <h4 class="fs-5">Terms and Conditions</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! nl2br(json_decode($ser->tnt)) !!}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar -->
                            <div class="col-xl-3 col-lg-3 col-md-12">
                                <div class="sides-block">
                                    <div class="card border rounded-3 mb-4">
                                        <div class="single-card px-3 py-3">
                                            <p class="font10 lh-1 mb-0"><b>For Booking Please Contact Us: </b></p><hr>
                                            <p class="font10 lh-1 mb-0"><b>Phone: </b> {{$c_info->phone1}}</p><hr>
                                            <p class="font10 lh-1 mb-0"><b>Email: </b>{{$c_info->email}}</p>
                                        </div>
                                    </div>
                                    <div class="card border rounded-3 mb-4">
                                        <div class="single-card px-3 py-3">
                                            <button class="btn btn-sm btn-primary full-width fw-medium text-uppercase mb-2"
                                                    type="button"  data-bs-toggle="modal" data-bs-target="#service-modal">Send Request</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="sides-block">
                                    @php
                                        $consultants = $ser->consultant_info ?? [];
                                        $defaultPhoto = 'public/images/default-user.png';
                                    @endphp

                                    @if(!empty($consultants))
                                        <div class="card border rounded-3 mb-4 shadow-sm" style="overflow: hidden;">
                                            <div class="single-card px-3 py-3">
                                                <h5 class="text-center text-primary mb-3" style="font-weight: 700;">
                                                    <i class="fas fa-user-tie me-2"></i>Our Consultants
                                                </h5>
                                                <hr style="margin-top: 5px; margin-bottom: 15px;">

                                                @foreach($consultants as $c)
                                                    @php
                                                        $name = $c['name'] ?? 'Unknown';
                                                        $designation = $c['designation'] ?? '';
                                                        $institute = $c['institute'] ?? '';
                                                        $photo = !empty($c['photo']) ? $c['photo'] : $defaultPhoto;
                                                    @endphp

                                                    <div class="d-flex align-items-center mb-3 p-2 border rounded"
                                                         style="background-color: #f8f9fa;">
                                                        <img src="{{ url($photo) }}" alt="Consultant Photo"
                                                             class="rounded-circle me-3"
                                                             style="width: 55px; height: 55px; object-fit: cover; border: 2px solid #007bff;">
                                                        <div>
                                                            <h6 class="mb-1" style="font-weight: 600; color: #333;">{{ $name }}</h6>
                                                            <small class="text-muted d-block">{{ $designation }}</small>
                                                            <small style="color: #6c757d;">{{ $institute }}</small>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @php
                                $reviews = $ser->review_info ?? [];
                                $defaultPhoto = 'public/images/default-user.png';
                            @endphp

                            @if(!empty($reviews))
                                <center><br>
                                    <div class="col-sm-4">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success" type="button"><b>Review</b></button>
                                        </div>
                                    </div>
                                </center>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <br>
                                    <div class="card-body">
                                        <div class="row g-4">

                                            @foreach($reviews as $r)
                                                @php
                                                    $name   = $r['name'] ?? 'Anonymous';
                                                    $review = $r['review'] ?? '';
                                                    $photo  = $r['photo'] ?? '';
                                                    $rating = rand(4,5);

                                                    $colors = ['#0d6efd','#198754','#6f42c1','#fd7e14','#dc3545'];
                                                    $bgColor = $colors[array_rand($colors)];

                                                    // ✅ Real photo check
                                                    $hasPhoto = !empty($photo) && file_exists(public_path($photo));
                                                @endphp

                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card h-100 shadow-sm p-3 border border-primary">

                                                        <div class="d-flex align-items-center mb-2">

                                                            {{-- Avatar --}}
                                                            @if($hasPhoto)
                                                                <img src="{{ asset('/pub;ic/'.$photo) }}"
                                                                    class="rounded-circle me-3"
                                                                    style="width:60px;height:60px;object-fit:cover;"
                                                                    alt="{{ $name }}">
                                                            @else
                                                                <div class="rounded-circle me-3 d-flex align-items-center justify-content-center text-white fw-bold"
                                                                    style="width:60px;height:60px;background-color:{{ $bgColor }};font-size:24px;">
                                                                    {{ strtoupper(mb_substr($name,0,1)) }}
                                                                </div>
                                                            @endif

                                                            {{-- Name & Rating --}}
                                                            <div>
                                                                <h6 class="mb-1">{{ $name }}</h6>
                                                                <div class="text-warning">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        @if($i <= $rating)
                                                                            <i class="fas fa-star"></i>
                                                                        @else
                                                                            <i class="far fa-star text-muted"></i>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <p class="card-text">{{ $review }}</p>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="text-center text-muted">No reviews available yet.</p>
                            @endif
                            <center><br>
                                <div class="col-sm-4">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success" type="button"><b>Related Services</b></button>
                                    </div>
                                </div>
                            </center>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                            <br>
                        
                                <div class="row justify-content-center gy-3 gx-xl-3 gx-lg-4 gx-4">
                                    @foreach($services as $visa)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="pop-touritem">
                                                <a href="{{url('services/'.$visa->slug)}}" class="card rounded-3 border br-dashed m-0">
                                                    <div class="flight-thumb-wrapper p-2 pb-0">
                                                        <div class="popFlights-item-overHidden rounded-3">
                                                            <img src="{{@$domain.'/'.$visa->c_photo}}" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="touritem-middle position-relative p-3">
                                                        <div class="touritem-flexxer">
                                                            <div class="explot">
                                                                <h4 class="city fs-6 m-0 fw-bold">
                                                                    <span>{{$visa->name}}</span>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="booking-wrapes d-flex align-items-center mt-3">
                                                            <button class="btn btn-md btn-light-primary fw-medium rounded full-width me-2">View Details</button>
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
                </div>
            </div>
        </section>
    </div>
    @php
        $user = Session::get('user_info');
    @endphp

    <div class="modal fade" id="service-modal" tabindex="-1" aria-labelledby="service-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollModalLabel">
                        Request for {{ $ser->name ?? 'Service' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="serviceBook" method="POST" action="{{ url('bookService') }}">
                        @csrf

                        <!-- Hidden fields for service info -->
                        <input type="hidden" name="service_id" value="{{ $ser->id ?? '' }}">
                        <input type="hidden" name="service_name" value="{{ $ser->name ?? '' }}">
                        <input type="hidden" name="service_slug" value="{{ $ser->slug ?? '' }}">

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label">আপনার নাম লিখুন</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Mamun Islam"
                                   value="{{ old('name', $user['company_name'] ?? '') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">কোড</label>
                                    <input type="text" name="country_code" class="form-control" value="+88" readonly>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="mb-3">
                                    <label class="form-label">আপনার ফোন নাম্বার লিখুন</label>
                                    <input type="text" name="phone" class="form-control"
                                           pattern="^(?:\+8801|8801|01)[3-9]\d{8}$"
                                           maxlength="11"
                                           inputmode="numeric"
                                           value="{{ old('phone', $user['company_pnone'] ?? '') }}"
                                           placeholder="e.g. 017XXXXXXXX"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> আপনার ই-মেইল লিখুন</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $user['company_email'] ?? '') }}"
                                   placeholder="e.g. example@gmail.com"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">আপনি ব্যাংক সলভেন্সি কত টাকা দেখাতে চান সেটা লিখুন </label>
                            <input type="number" id="amount" name="amount"
                                   class="form-control fw-bold" placeholder="e.g. 2000000 in lacs.." required>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="serviceBook" id="submitBtn">Send Request</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="responseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4">
                <div class="modal-body">
                    <h4 id="responseModalTitle" class="mb-3 fw-bold"></h4>
                    <p id="responseModalBody"></p>
                    <button class="btn btn-primary mt-3" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('#serviceBook').on('submit', function (e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let submitBtn = $('#serviceBook button[type="submit"]');

                // ✅ Disable button & show spinner
                submitBtn.prop('disabled', true);
                let originalText = submitBtn.html();
                submitBtn.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Processing...');

                // ✅ Optional: Add overlay loading effect
                $('body').append(`
                    <div id="loadingOverlay" style="
                        position: fixed;
                        top:0; left:0; right:0; bottom:0;
                        background: rgba(255,255,255,0.7);
                        z-index: 9999;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                    ">
                        <div class="text-center">
                            <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;"></div>
                            <p class="mt-2 text-dark fw-bold">Submitting your request...</p>
                        </div>
                    </div>
                `);

                $.ajax({
                    url: "{{ route('book.service') }}",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        $('#serviceBook')[0].reset();
                        $('#service-modal').modal('hide');

                        // ✅ Fire Facebook Pixel Lead event
                        if (typeof fbq !== 'undefined') {
                            fbq('track', 'Lead', {
                                content_name: "{{ $ser->name ?? '' }}",
                                content_category: "Service Lead",
                                value: $('input[name="amount"]').val() || 0,
                                currency: "BDT"
                            });
                            console.log("✅ Facebook Pixel Lead event triggered!");
                        }

                        showResponseModal(response.title, response.message, response.status);
                    },
                    error: function (xhr) {
                        let res = xhr.responseJSON;
                        if (res && res.message) {
                            showResponseModal(res.title || 'Error!', res.message, 'error');
                        } else {
                            showResponseModal('Error!', 'Something went wrong! Please try again.', 'error');
                        }
                    },
                    complete: function () {
                        // ✅ Re-enable button and remove overlay
                        submitBtn.prop('disabled', false).html(originalText);
                        $('#loadingOverlay').fadeOut(300, function() { $(this).remove(); });
                    }
                });
            });

            // ✅ Function to show modal
            function showResponseModal(title, message, type) {
                let icon = (type === 'success') ? '✅' : '❌';
                $('#responseModalTitle').text(icon + ' ' + title);
                $('#responseModalBody').text(message);

                if (type === 'success') {
                    $('#responseModalTitle').removeClass('text-danger').addClass('text-success');
                } else {
                    $('#responseModalTitle').removeClass('text-success').addClass('text-danger');
                }

                $('#responseModal').modal('show');
            }
        });
    </script>


@endsection
