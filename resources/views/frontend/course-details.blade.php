@extends('frontend.layout.body')
@section('title','Trip Designer - Visa Processing Course  - The Best Air ticket,Visa and Tour Package Service Provider in Bangladesh.')
<meta property="og:title" content="{{ $course->title }}">
<meta property="og:description" content="{{ Str::limit(json_decode($course->c_descripsion), 150) }}">
<meta property="og:image" content="{{ url(json_decode($course->c_p_photo)) }}">
<meta name="description" content="{{ Str::limit(json_decode($course->c_descripsion), 150) }}">
@section('css')
    <style>
        .overflow-auto {
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none; /* Firefox */
        }
        .overflow-auto::-webkit-scrollbar {
            display: none; /* Chrome, Safari */
        }
    </style>
@endsection
@section('content')
    <div id="main-wrapper">
        <?php
            $c_photo_url = json_decode($course->c_p_photo);
        ?>
        <section class="bg-cover position-relative" style="background:url({{url($c_photo_url)}})no-repeat;" data-overlay="5">
            <div class="container">
                <?php
                $instructors = json_decode($course->instructor);
                ?>
                {{-- Instructor photos row --}}
                <center>
                    <div class="col-xl-7 col-lg-9 col-md-12" style="margin-top:-20px;">
                        <div class="d-flex flex-nowrap justify-content-center gap-3 mt-3 overflow-auto"
                            style="
                                padding:10px 0;
                                scrollbar-width:none;
                                -ms-overflow-style:none;
                            "
                            onscroll="this.style.scrollBehavior='smooth'">

                            @foreach($instructors as $instructor)

                                <div style="
                                    flex:0 0 auto;
                                    text-align:center;
                                    transition:0.3s;
                                "
                                onmouseover="this.style.transform='translateY(-5px)';"
                                onmouseout="this.style.transform='translateY(0)';">

                                    <img src="{{ url($instructor->photo) }}"
                                        alt="{{ $instructor->name ?? 'Instructor' }}"
                                        style="
                                            width:65px;
                                            height:65px;
                                            border-radius:50%;
                                            object-fit:cover;
                                            box-shadow:0 4px 10px rgba(0,0,0,0.15);
                                            border:3px solid #fff;
                                            transition:0.3s;
                                        "
                                        onmouseover="this.style.boxShadow='0 6px 14px rgba(0,0,0,0.25)';"
                                        onmouseout="this.style.boxShadow='0 4px 10px rgba(0,0,0,0.15)';"
                                    >

                                    <div style="font-size:10px; margin-top:6px; font-weight:600; color:white;">
                                        {{ $instructor->name ?? '' }}
                                    </div>

                                </div>

                            @endforeach

                        </div>
                    </div>
                </center>
                <br>

                <div class="row align-items-center justify-content-center">

                    <div class="col-xl-7 col-lg-9 col-md-12">
                       <center>
                           @php
                               $variations = json_decode($course->price_variations, true);

                               // filter করে শুধু active (status = 1) গুলো নিলাম
                               $firstVariation = collect($variations)->first(function ($item) {
                                   return isset($item['status']) && $item['status'] == 1;
                               });
                           @endphp

                           <button type="button" class="btn w-auto" style="background-color: #060e57; color: white;">
                               <b>
                                   @if(!empty($firstVariation) && $firstVariation['d_price'] < $firstVariation['price'])
                                       <span style="text-decoration: line-through; opacity: 0.7; margin-right: 8px;">
                                             {{ number_format($firstVariation['price'], 2) }}
                                        </span>
                                   @endif
                                   <span class="text-warning">
                                   {{ $c_info->currency .' '}}{{ number_format($firstVariation['d_price'] ?? $firstVariation['price'], 2) }}
                                </span>
                               </b>
                           </button>
                           <a href="javascript:void(0)"
                              class="btn btn-warning w-auto"
                              onclick="document.querySelector('.courseTable').scrollIntoView({behavior: 'smooth'});">
                               <b style="color: #06069a;">Enroll</b>
                           </a>
                       </center>

                    </div>

                    <div class="fpc-capstion text-center my-4">
                        <div class="fpc-captions d-flex flex-wrap justify-content-center gap-2">
                            <a class="btn btn-success btn-sm">{{ $course->type }}</a>
                            <a class="btn btn-danger btn-sm">Total Class: {{ $course->class_no }}</a>
                            <a class="btn btn-info btn-sm">Batch No: {{ $course->batch_no }}</a>
                            <a class="btn btn-dark btn-sm">Rating: {{ $course->star }} &#9733;</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="text-center mx-auto p-4 my-3"
                            style="
                                background:#ffffff;
                                border-radius:12px;
                                border-left:6px solid #060e57;
                                box-shadow:0px 4px 12px rgba(0,0,0,0.12);
                                max-width:600px;
                                transition:0.3s;
                            "
                            onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0px 6px 16px rgba(0,0,0,0.18)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0px 4px 12px rgba(0,0,0,0.12)'">

                            <h4 class="fw-bold mb-1" style="color:#060e57;">
                                100+ দেশের ভিসা শিখুন
                            </h4>

                            <p class="mb-0" style="font-size:17px; color:#333;">
                                অভিজ্ঞ Visa Expert দের কাছ থেকে সম্পূর্ণ প্রফেশনাল ট্রেনিং নিন এবং আপনার ক্যারিয়ার গড়ুন।
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        @php
            $user = Session::get('user_info');
        @endphp
        <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="enrollModalLabel">Enroll in Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="enrollForm" method="POST" action="">
                            @csrf

                            <!-- Hidden Fields -->
                            <input type="hidden" name="course_id" id="modal_course_id">
                            <input type="hidden" name="variation_data" id="modal_variation_data">
                            <input type="hidden" name="variation_key" id="modal_variation_key">
                            <!-- Full Name -->
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name', $user['company_name'] ?? '') }}" required>
                            </div>

                            <!-- Country Code & Phone -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Country Code</label>
                                        <input type="text" name="country_code" class="form-control" value="+88" readonly>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
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

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email', $user['company_email'] ?? '') }}"
                                       placeholder="e.g. example@gmail.com"
                                       required>
                            </div>

                            <!-- Course Price -->
                            <div class="mb-3">
                                <label class="form-label">Course Price</label>
                                <input type="text" id="modal_show_price"
                                       class="form-control fw-bold"
                                       value=""
                                       readonly disabled>
                            </div>

                            <!-- Payment Gateway Selection -->
                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">Select Payment Gateway <span class="text-danger">*</span></label>

                                <div class="row text-center">
                                    <!-- bKash -->
                                    <div class="col-6">
                                        <div id="bkash-wrapper"
                                             class="gateway-option border rounded p-2 h-100"
                                             data-gateway="bkash"
                                             style="cursor:pointer; transition:0.3s;">
                                            <img src="{{ url('public/bkash.png') }}" alt="bKash"
                                                 class="img-fluid" style="max-height: 50px;">
                                        </div>
                                    </div>

                                    <!-- SSLCommerz -->
                                    <div class="col-6">
                                        <div id="sslcommerz-wrapper"
                                             class="gateway-option border rounded p-2 h-100"
                                             data-gateway="sslcommerz"
                                             style="cursor:pointer; transition:0.3s;">
                                            <img src="{{ url('public/sslcommerz.png') }}" alt="SSLCommerz"
                                                 class="img-fluid" style="max-height: 50px;">
                                        </div>
                                    </div>
                                </div>

                                <!-- ✅ Hidden input, যেটা form এ যাবে -->
                                <input type="hidden" name="payment_gateway" id="payment_gateway" value="bkash">
                            </div>

                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" form="enrollForm">Make Payment</button>
                    </div>

                </div>
            </div>
        </div>


        <section class="pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row g-3">
                            <!-- Next Batch Start -->
                            <div class="col-12 col-md-4">
                                <div class="card border border-warning shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="fw-semibold mb-2 text-warning">
                                            <i class="fas fa-school me-1"></i>
                                            Next Batch Start
                                        </div>
                                        <?php
                                        $appDates = $course->app_date;
                                        ?>
                                        <span class="badge bg-warning text-dark">
                                            Date: Will Declared Soon.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Live Class -->
                            <div class="col-12 col-md-4">
                                <div class="card border border-info shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="fw-semibold mb-2 text-info">
                                            <i class="fas fa-clock me-1"></i>
                                            Live Class
                                        </div>
                                        <div>8:30 PM to 9:30 PM (Approx)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Remaining Seat -->
                            <div class="col-12 col-md-4 courseTable">
                                <div class="card border border-success shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="fw-semibold mb-2 text-success">
                                            <i class="fas fa-desktop me-1"></i>
                                            Remaining Seat
                                        </div>
                                        <div>{{ $course->seat_remain = rand(10, 20) }} Seats</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php

                        $titles = [
                            'recorded' => 'Recorded Class',
                            'live' => 'Live Class',
                            'physical' => 'Physical Class',
                            'one_to_one_online' => 'One-to-One Online Class',
                            'one_to_one_physical' => 'One-to-One Physical Class',
                        ];
                    @endphp

                    <div class="my-5">
                        <center>
                            <div class="col-sm-4">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" type="button"><b>Choose Your Course Variation</b></button>
                                </div>
                            </div>
                        </center><br>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">
                                <thead class="thead-dark">
                                <tr>
                                    <th style="width:30%;">Variation</th>
                                    <th style="width:15%;">Price</th>
                                    <th style="width:15%;">Discount</th>
                                    <th style="width:35%;">#</th> <!-- Last Column 30% -->
                                </tr>
                                </thead>
                                @php
                                    $banglaLabels = [
                                        'recorded'            => 'রেকর্ডেড ক্লাস',
                                        'live'                => 'লাইভ ক্লাস',
                                        'physical'            => 'অফলাইন ক্লাস',
                                        'one_to_one_online'   => 'একক অনলাইন ক্লাস',
                                        'one_to_one_physical' => 'একক অফলাইন ক্লাস',
                                    ];
                                @endphp

                                <tbody>
                                @foreach($titles as $key => $label)
                                    @if(isset($variations[$key]) && $variations[$key]['status'] == 1)
                                        <tr>
                                            <!-- Variation Title -->
                                            <td class="align-middle font-weight-bold" style="width:30%;">
                                                {{ $banglaLabels[$key] ?? $label }}
                                            </td>

                                            <!-- Original Price -->
                                            <td class="align-middle" style="width:20%;">
                                                @if(!empty($variations[$key]['d_price']))
                                                    <del class="text-muted">{{ $variations[$key]['price'] ?? '-' }} BDT</del>
                                                @else
                                                    {{ $variations[$key]['price'] ?? '-' }} BDT
                                                @endif
                                            </td>

                                            <!-- Discounted Price -->
                                            <td class="align-middle text-success font-weight-bold" style="width:20%;">
                                                {{ $variations[$key]['d_price'] ?? $variations[$key]['price'] ?? '-' }} BDT
                                            </td>

                                            <!-- Enroll Button -->
                                            <td class="align-middle" style="width:30%;">
                                                <a href="javascript:void(0)"
                                                   class="btn btn-sm btn-primary enroll-btn w-100"
                                                   data-course-id="{{ $course->id }}"
                                                   data-variation-key="{{ $key }}"
                                                   data-price="{{ $variations[$key]['d_price'] ?? $variations[$key]['price'] }}">
                                                    Enroll
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <center>
                        <div class="row g-3">
                            <!-- Countdown -->
                            <div class="col-12 col-sm-4">
                                <div class="countdown-box d-grid gap-2">
                                    <button class="btn btn-danger" type="button">
                                        <b style="color: #060e57;">
                                            Offer Ends:
                                            <span id="hours">--</span> Hours :
                                            <span id="minutes">--</span> Minutes :
                                            <span id="seconds">--</span> Seconds
                                        </b>
                                    </button>
                                </div>
                            </div>

                            <!-- Spacer / Optional Content -->
                            <div class="col-12 col-sm-4">
                                <!-- You can add extra content or keep this empty for spacing -->
                            </div>

                            <!-- Enroll Button -->
                            <div class="col-12 col-sm-4">
                                <div class="d-grid gap-2">
                                    <a href="javascript:void(0)"
                                       class="btn btn-warning w-auto"
                                       onclick="document.querySelector('.courseTable').scrollIntoView({behavior: 'smooth'});">
                                        <b style="color: #06069a;">Enroll</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-5">
                        <br>
                        <ul class="nav nav-pills primary nav-fill gap-2 p-2  bg-light-primary rounded-2" id="pillstour-tab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-2 active" id="pills-overview-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                                        aria-selected="true">Curriculum</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-2" id="pills-itinerary-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-itinerary" type="button" role="tab" aria-controls="pills-itinerary"
                                        aria-selected="false">Instructor</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-2" id="pills-bonus-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bonus" type="button" role="tab" aria-controls="pills-bonus"
                                        aria-selected="false">Extra Bonus</button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <div class="tab-content" id="pillstour-tabContent">
                                    <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                         aria-labelledby="pills-overview-tab" tabindex="0">
                                        <div class="overview-wrap full-width">
                                            <div class="card mb-4 border rounded-3">
                                                <div class="card-header">
                                                    <h4 class="fs-5">Course Description</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-3">
                                                            <div class="card shadow-sm border border-primary">
                                                                <div class="card-body">
                                                                    {{ Str::limit(json_decode($course->c_descripsion), 1000) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $videoId = '';
                                                            $url = json_decode($course->y_link);

                                                            if ($url) {
                                                                $query = parse_url($url, PHP_URL_QUERY);
                                                                parse_str($query, $params);
                                                                $videoId = $params['v'] ?? '';
                                                            }
                                                        @endphp
                                                        <div class="col-sm-6">
                                                            <div class="card shadow-sm border border-primary">
                                                                @if($videoId)
                                                                    <div class="ratio ratio-16x9">
                                                                        <iframe
                                                                            src="https://www.youtube.com/embed/{{ $videoId }}"
                                                                            title="YouTube video"
                                                                            allowfullscreen>
                                                                        </iframe>
                                                                    </div>
                                                                @else
                                                                    <p class="text-danger">Invalid YouTube URL</p>
                                                                @endif
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $course->title }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overview-wrap full-width">
                                            <div class="card mb-4 border rounded-3">
                                                <div class="card-header">
                                                    <h4 class="fs-5">Course Module</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                                        <?php
                                                            $curriculums = json_decode($course->curriculum);
                                                            $i  =0;
                                                            $bonuses = json_decode($course->g_course);
                                                            $reviews = json_decode($course->review);
                                                        ?>
                                                        @foreach($curriculums as $curriculum)
                                                            @if($i==0)
                                                            <div class="accordion-item border">
                                                                <h2 class="accordion-header rounded-2">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#flush-collapse{{$i}}" aria-expanded="false" aria-controls="flush-collapse{{$i}}">
                                                                        {{$curriculum->module}}
                                                                    </button>
                                                                </h2>
                                                                <div id="flush-collapse{{$i}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                                    <div class="accordion-body">
                                                                        {{$curriculum->details}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @else
                                                                <div class="accordion-item border rounded-2">
                                                                    <h2 class="accordion-header">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#flush-collapse{{$i}}" aria-expanded="false" aria-controls="flush-collapse{{$i}}">
                                                                            {{$curriculum->module}}
                                                                        </button>
                                                                    </h2>
                                                                    <div id="flush-collapse{{$i}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                                        <div class="accordion-body">
                                                                            {{$curriculum->details}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                                    <?php
                                                                        $i ++;
                                                                    ?>
                                                        @endforeach
                                                    </div>
                                                    <div class="my-5">
                                                        <center>
                                                            <div class="col-sm-4">
                                                                <div class="d-grid gap-2">
                                                                    <button class="btn btn-success" type="button"><b>Choose Your Course Variation</b></button>
                                                                </div>
                                                            </div>
                                                        </center><br>

                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">
                                                                <thead class="thead-dark">
                                                                <tr>
                                                                    <th style="width:30%;">Variation</th>
                                                                    <th style="width:15%;">Price</th>
                                                                    <th style="width:15%;">Discount</th>
                                                                    <th style="width:35%;">#</th> <!-- Last Column 30% -->
                                                                </tr>
                                                                </thead>
                                                                @php
                                                                    $banglaLabels = [
                                                                        'recorded'            => 'রেকর্ডেড ক্লাস',
                                                                        'live'                => 'লাইভ ক্লাস',
                                                                        'physical'            => 'অফলাইন ক্লাস',
                                                                        'one_to_one_online'   => 'একক অনলাইন ক্লাস',
                                                                        'one_to_one_physical' => 'একক অফলাইন ক্লাস',
                                                                    ];
                                                                @endphp

                                                                <tbody>
                                                                @foreach($titles as $key => $label)
                                                                    @if(isset($variations[$key]) && $variations[$key]['status'] == 1)
                                                                        <tr>
                                                                            <!-- Variation Title -->
                                                                            <td class="align-middle font-weight-bold" style="width:30%;">
                                                                                {{ $banglaLabels[$key] ?? $label }}
                                                                            </td>

                                                                            <!-- Original Price -->
                                                                            <td class="align-middle" style="width:20%;">
                                                                                @if(!empty($variations[$key]['d_price']))
                                                                                    <del class="text-muted">{{ $variations[$key]['price'] ?? '-' }} BDT</del>
                                                                                @else
                                                                                    {{ $variations[$key]['price'] ?? '-' }} BDT
                                                                                @endif
                                                                            </td>

                                                                            <!-- Discounted Price -->
                                                                            <td class="align-middle text-success font-weight-bold" style="width:20%;">
                                                                                {{ $variations[$key]['d_price'] ?? $variations[$key]['price'] ?? '-' }} BDT
                                                                            </td>

                                                                            <!-- Enroll Button -->
                                                                            <td class="align-middle" style="width:30%;">
                                                                                <a href="javascript:void(0)"
                                                                                   class="btn btn-sm btn-primary enroll-btn w-100"
                                                                                   data-course-id="{{ $course->id }}"
                                                                                   data-variation-key="{{ $key }}"
                                                                                   data-price="{{ $variations[$key]['d_price'] ?? $variations[$key]['price'] }}">
                                                                                    Enroll
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overview-wrap full-width">
                                            <div class="card mb-4 border rounded-3">
                                                <div class="card-header">
                                                    <h4 class="fs-5">Extra Bonus</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row g-4">
                                                        @foreach($bonuses as $bonus)
                                                            <div class="col-12 col-sm-6 col-lg-3">
                                                                <div class="card h-100 shadow-sm text-center border border-primary">
                                                                    <img src="{{ url('public/tick.png') }}" class="rounded-circle mx-auto mt-3" style="width: 100px; height: 100px; object-fit: cover;" alt="Reviewer 1">
                                                                    <div class="card-body">
                                                                        <p class="card-text">{{ $bonus }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-itinerary" role="tabpanel"
                                        aria-labelledby="pills-itinerary-tab" tabindex="0">
                                        <div class="overview-wrap full-width">
                                            <div class="card mb-4 border rounded-3">
                                                <div class="card-header">
                                                    <h4 class="fs-5">Course Instructor</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row g-4">
                                                        @foreach($instructors as $instructor)
                                                            <div class="col-12 col-sm-6 col-lg-4">
                                                                <div class="card h-100 shadow-sm text-center border border-primary">
                                                                    <img src="{{ url($instructor->photo) }}"
                                                                        class="rounded-circle mx-auto"
                                                                        style="width:110px; height:110px; object-fit:cover; border:4px solid #fff; 
                                                                        box-shadow:0 0 10px rgba(0,0,0,0.1);" alt="Instructor">

                                                                    <div class="card-body mt-3">

                                                                        <h5 class="fw-bold text-dark mb-1">
                                                                            {{ $instructor->name }}
                                                                        </h5>

                                                                        <p class="mb-1" style="font-size:15px; color:#444;">
                                                                            <strong>Designation:</strong> {{ $instructor->designation }}
                                                                        </p>

                                                                        <p class="text-muted" style="font-size:14px;">
                                                                            <strong>Institute:</strong> {{ $instructor->institute }}
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-bonus" role="tabpanel"
                                        aria-labelledby="pills-bonus-tab" tabindex="0">

                                        <div class="overview-wrap full-width">
                                            <div class="card mb-4 border rounded-3">

                                                <div class="card-header">
                                                    <h4 class="fs-5">Extra Bonus</h4>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row g-4">
                                                        @foreach($bonuses as $bonus)
                                                            <div class="col-12 col-sm-6 col-lg-3">
                                                                <div class="card h-100 shadow-sm text-center border border-primary">
                                                                    <img src="{{ url('public/tick.png') }}" class="rounded-circle mx-auto mt-3" style="width: 100px; height: 100px; object-fit: cover;" alt="Reviewer 1">
                                                                    <div class="card-body">
                                                                        <p class="card-text">{{ $bonus }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="sides-block">
                                    <div class="card border rounded-3 mb-4 border border-primary">
                                        <div class="single-card px-3 py-3">
                                            <center>
                                                <div class="col-sm-12">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-success" type="button"><b>Choose Your Course Variation</b></button>
                                                    </div>
                                                </div>
                                            </center><br>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th style="width:30%;">Variation</th>
                                                        <th style="width:15%;">Price</th>
                                                        <th style="width:15%;">Discount</th>
                                                        <th style="width:35%;">#</th> <!-- Last Column 30% -->
                                                    </tr>
                                                    </thead>
                                                    @php
                                                        $banglaLabels = [
                                                            'recorded'            => 'রেকর্ডেড ক্লাস',
                                                            'live'                => 'লাইভ ক্লাস',
                                                            'physical'            => 'অফলাইন ক্লাস',
                                                            'one_to_one_online'   => 'একক অনলাইন ক্লাস',
                                                            'one_to_one_physical' => 'একক অফলাইন ক্লাস',
                                                        ];
                                                    @endphp

                                                    <tbody>
                                                    @foreach($titles as $key => $label)
                                                        @if(isset($variations[$key]) && $variations[$key]['status'] == 1)
                                                            <tr>
                                                                <!-- Variation Title -->
                                                                <td class="align-middle font-weight-bold" style="width:30%;">
                                                                    {{ $banglaLabels[$key] ?? $label }}
                                                                </td>

                                                                <!-- Original Price -->
                                                                <td class="align-middle" style="width:20%;">
                                                                    @if(!empty($variations[$key]['d_price']))
                                                                        <del class="text-muted">{{ $variations[$key]['price'] ?? '-' }} BDT</del>
                                                                    @else
                                                                        {{ $variations[$key]['price'] ?? '-' }} BDT
                                                                    @endif
                                                                </td>

                                                                <!-- Discounted Price -->
                                                                <td class="align-middle text-success font-weight-bold" style="width:20%;">
                                                                    {{ $variations[$key]['d_price'] ?? $variations[$key]['price'] ?? '-' }} BDT
                                                                </td>

                                                                <!-- Enroll Button -->
                                                                <td class="align-middle" style="width:30%;">
                                                                    <a href="javascript:void(0)"
                                                                       class="btn btn-sm btn-primary enroll-btn w-100"
                                                                       data-course-id="{{ $course->id }}"
                                                                       data-variation-key="{{ $key }}"
                                                                       data-price="{{ $variations[$key]['d_price'] ?? $variations[$key]['price'] }}">
                                                                        Enroll
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center><br>
                        <div class="col-sm-4">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" type="button"><b>Students Review </b></button>
                            </div>
                        </div>
                    </center>
                    <div class="col-xl-12 col-lg-12 col-md-12"><br>
                        <div class="card-body">
                            <div class="row g-4">
                                @foreach($reviews as $review)
                                    @php
                                        $rating = rand(4,5);
                                    @endphp
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="card h-100 shadow-sm p-3 border border-primary">
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="{{ url($review->photo) }}" alt="Reviewer Photo" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                <div>
                                                    <h6 class="mb-1">{{ $review->name }}</h6>
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
                                            <p class="card-text">{{ $review->review }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12"><br>
                        <div class="card-body">
                            <div class="row g-4">
                                <center><br>
                                    <div class="col-sm-4">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success" type="button"><b>Choose Your Course Variation</b></button>
                                        </div>
                                    </div>
                                </center>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th style="width:30%;">Variation</th>
                                            <th style="width:15%;">Price</th>
                                            <th style="width:15%;">Discount</th>
                                            <th style="width:35%;">#</th> <!-- Last Column 30% -->
                                        </tr>
                                        </thead>
                                        @php
                                            $banglaLabels = [
                                                'recorded'            => 'রেকর্ডেড ক্লাস',
                                                'live'                => 'লাইভ ক্লাস',
                                                'physical'            => 'অফলাইন ক্লাস',
                                                'one_to_one_online'   => 'একক অনলাইন ক্লাস',
                                                'one_to_one_physical' => 'একক অফলাইন ক্লাস',
                                            ];
                                        @endphp

                                        <tbody>
                                        @foreach($titles as $key => $label)
                                            @if(isset($variations[$key]) && $variations[$key]['status'] == 1)
                                                <tr>
                                                    <!-- Variation Title -->
                                                    <td class="align-middle font-weight-bold" style="width:30%;">
                                                        {{ $banglaLabels[$key] ?? $label }}
                                                    </td>

                                                    <!-- Original Price -->
                                                    <td class="align-middle" style="width:20%;">
                                                        @if(!empty($variations[$key]['d_price']))
                                                            <del class="text-muted">{{ $variations[$key]['price'] ?? '-' }} BDT</del>
                                                        @else
                                                            {{ $variations[$key]['price'] ?? '-' }} BDT
                                                        @endif
                                                    </td>

                                                    <!-- Discounted Price -->
                                                    <td class="align-middle text-success font-weight-bold" style="width:20%;">
                                                        {{ $variations[$key]['d_price'] ?? $variations[$key]['price'] ?? '-' }} BDT
                                                    </td>

                                                    <!-- Enroll Button -->
                                                    <td class="align-middle" style="width:30%;">
                                                        <a href="javascript:void(0)"
                                                           class="btn btn-sm btn-primary enroll-btn w-100"
                                                           data-course-id="{{ $course->id }}"
                                                           data-variation-key="{{ $key }}"
                                                           data-price="{{ $variations[$key]['d_price'] ?? $variations[$key]['price'] }}">
                                                            Enroll
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
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
        const now = new Date();
        const countDownDate = new Date(
            now.getFullYear(),
            now.getMonth(),
            now.getDate(),
            23, 59, 59
        ).getTime();

        // Update every second
        const x = setInterval(function () {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            if (distance < 0) {
                clearInterval(x);
                $('.countdown-box').html("Offer has ended!");
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $("#days").text(days);
            $("#hours").text(hours);
            $("#minutes").text(minutes);
            $("#seconds").text(seconds);
        }, 1000);


        document.addEventListener("DOMContentLoaded", function () {
            let options = document.querySelectorAll('.gateway-option');

            function highlight(selectedId) {
                options.forEach(opt => {
                    opt.style.border = '1px solid #dee2e6';
                    opt.style.backgroundColor = 'transparent';
                });

                let selected = document.getElementById(selectedId + '-wrapper');
                selected.style.border = '2px solid #0d6efd';
                selected.style.backgroundColor = '#ffc107';

                // hidden input এ value সেট করো
                document.getElementById('payment_gateway').value = selected.dataset.gateway;
            }

            // click handler
            options.forEach(opt => {
                opt.addEventListener('click', function () {
                    highlight(this.dataset.gateway);
                });
            });

            // default bKash
            highlight('bkash');
        });

        $(document).ready(function() {
            $('.enroll-btn').on('click', function() {
                let courseId     = $(this).data('course-id');
                let variationKey = $(this).data('variation-key');
                let price        = $(this).data('price');

                // Hidden inputs
                $('#modal_course_id').val(courseId);
                $('#modal_variation_key').val(variationKey);

                // শুধু display এর জন্য দাম
                $('#modal_show_price').val(price + " {{ $c_info->currency }}");

                // Form action update
                let actionUrl = "{{ url('course/enroll') }}/" + courseId;
                $('#enrollForm').attr('action', actionUrl);

                $('#enrollModal').modal('show');
            });
        });
    </script>
@endsection
