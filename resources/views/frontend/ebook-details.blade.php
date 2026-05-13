@extends('frontend.layout.body')

@section('title', $ebook->title)

<meta property="og:title" content="{{ $ebook->title }}">
<meta property="og:description" content="{{ Str::limit($ebook->description,150) }}">
<meta property="og:image" content="{{ url($ebook->cover_photo) }}">
<meta name="description" content="{{ Str::limit($ebook->description,150) }}">
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
    <section class="bg-cover position-relative"
            style="background:url({{ url('/public/' . $ebook->page_photo) }})no-repeat;"
            data-overlay="5">
        <div class="container">
            <?php
                // controller এ json_decode(..., true) দেওয়া আছে
                $authors = $ebook->authors ?? [];
            ?>
            {{-- Author photos row --}}
            <center>
                <div class="col-xl-7 col-lg-9 col-md-12" style="margin-top:-20px;">
                    <div class="d-flex flex-nowrap justify-content-center gap-3 mt-3 overflow-auto"
                        style="
                            padding:10px 0;
                            scrollbar-width:none;
                            -ms-overflow-style:none;
                        "
                        onscroll="this.style.scrollBehavior='smooth'">

                        @foreach($authors as $author)

                            <div style="
                                flex:0 0 auto;
                                text-align:center;
                                transition:0.3s;
                            "
                            onmouseover="this.style.transform='translateY(-5px)';"
                            onmouseout="this.style.transform='translateY(0)';">

                                <img src="{{ url('/public/'.$author['photo']) }}"
                                    alt="{{ $author['name'] ?? 'Author' }}"
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
                                    {{ $author['name'] ?? '' }}
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
                    <button type="button" class="btn w-auto" style="background-color: #060e57; color: white;">
                        <b>
                            @if(!empty($ebook->discount_price) && $ebook->discount_price < $ebook->price)
                                <span style="text-decoration: line-through; opacity: 0.7; margin-right: 8px;">
                                        {{ number_format($ebook->price, 2) }}
                                    </span>
                            @endif
                            <span class="text-warning">
                                {{ $c_info->currency }}{{ number_format($ebook->discount_price ?? $ebook->price, 2) }}
                            </span>
                        </b>
                    </button>
                    <a href="javascript:void(0)"
                        class="btn btn-warning w-auto"
                        onclick="document.querySelector('.ebookTable').scrollIntoView({behavior: 'smooth'});">
                        <b style="color: #06069a;">Buy Now</b>
                    </a>
                </center>

                </div>

                <div class="fpc-capstion text-center my-4">
                    <div class="fpc-captions d-flex flex-wrap justify-content-center gap-2">
                        <a class="btn btn-success btn-sm">E-Book</a>
                        <a class="btn btn-danger btn-sm">Pages: 300(Approx)</a>
                        <a class="btn btn-info btn-sm">Format: Portable</a>
                        <a class="btn btn-dark btn-sm">Rating: {{ $ebook->star }} &#9733;</a>
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

                        @php
                            $slug = $ebook->slug ?? '';
                        @endphp

                        <h4 class="fw-bold mb-1" style="color:#060e57;">
                            @if($slug === 'visa-course')
                                100+ দেশের ভিসা শিখুন
                            @elseif($slug === 'air-ticket')
                                আন্তর্জাতিক এয়ার টিকেট বুকিং শিখুন
                            @elseif($slug === 'hajj-umrah-package')
                                হজ ও ওমরাহ প্যাকেজ ম্যানেজমেন্ট শিখুন
                            @elseif($slug === 'tour-package')
                                আন্তর্জাতিক ট্যুর প্যাকেজ তৈরি ও বিক্রয় শিখুন
                            @elseif($slug === 'work-permit')
                                বিদেশে Work Permit প্রসেসিং শিখুন
                            @else
                                প্রফেশনাল ট্রাভেল & ভিসা ট্রেনিং শিখুন
                            @endif
                        </h4>

                        <p class="mb-0" style="font-size:17px; color:#333;">
                            @if($slug === 'visa-course')
                                অভিজ্ঞ Visa Expert দের লেখা এই Ebook দিয়ে ঘরে বসেই শিখুন।
                            @elseif($slug === 'air-ticket')
                                অভিজ্ঞ Air Ticketing Expert দের লেখা এই Ebook দিয়ে টিকেট বুকিং শিখুন।
                            @elseif($slug === 'hajj-umrah-package')
                                অভিজ্ঞ Hajj & Umrah Expert দের লেখা এই Ebook দিয়ে প্যাকেজ পরিচালনা শিখুন।
                            @elseif($slug === 'tour-package')
                                অভিজ্ঞ Tour Consultant দের লেখা এই Ebook দিয়ে সফল ট্যুর ব্যবসা গড়ুন।
                            @elseif($slug === 'work-permit')
                                অভিজ্ঞ Work Permit Expert দের লেখা এই Ebook দিয়ে বিদেশে কাজের প্রসেস শিখুন।
                            @else
                                অভিজ্ঞ ট্রাভেল ইন্ডাস্ট্রি এক্সপার্ট দের লেখা এই Ebook দিয়ে ক্যারিয়ার গড়ুন।
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
    $user = Session::get('user_info');
    @endphp

    <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollModalLabel">Purchase Ebook</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="enrollForm" method="POST" action="">
                        @csrf

                        <!-- Hidden Fields -->
                        <input type="hidden" name="ebook_id" id="modal_ebook_id">
                        <input type="hidden" name="ebook_slug" id="modal_ebook_slug">

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

                        <!-- Ebook Price -->
                        <div class="mb-3">
                            <label class="form-label">Ebook Price</label>
                            <input type="text" id="modal_show_price"
                                class="form-control fw-bold"
                                value=""
                                readonly disabled>
                        </div>

                        <!-- Payment Gateway Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-bold d-block">
                                Select Payment Gateway <span class="text-danger">*</span>
                            </label>

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

                            <!-- Hidden input -->
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

                        <!-- Publish Date -->
                        <div class="col-12 col-md-4">
                            <div class="card border border-warning shadow-sm h-100">
                                <div class="card-body">
                                    <div class="fw-semibold mb-2 text-warning">
                                        <i class="fas fa-school me-1"></i>
                                        Publish Date
                                    </div>
                                    @php
                                        $publishDate = \Carbon\Carbon::parse($ebook->created_at)->format('d M Y');
                                    @endphp
                                    <span class="badge bg-warning text-dark">
                                        Date: {{ $publishDate }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Format -->
                        <div class="col-12 col-md-4">
                            <div class="card border border-info shadow-sm h-100">
                                <div class="card-body">
                                    <div class="fw-semibold mb-2 text-info">
                                        <i class="fas fa-clock me-1"></i>
                                        Ebook Format
                                    </div>
                                    <div>Portable (Instant Access)</div>
                                </div>
                            </div>
                        </div>

                        <!-- Page Count -->
                        <div class="col-12 col-md-4 ebookTable">
                            <div class="card border border-success shadow-sm h-100">
                                <div class="card-body">
                                    <div class="fw-semibold mb-2 text-success">
                                        <i class="fas fa-desktop me-1"></i>
                                        Total Pages
                                    </div>
                                    <div>
                                        {{ $ebook->total_page ?? rand(300, 350) }} Pages
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="my-5">
                    <center>
                        <div class="col-sm-4">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" type="button">
                                    <b>Choose Your Ebook</b>
                                </button>
                            </div>
                        </div>
                    </center>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">
                            <thead class="thead-dark">
                            <tr>
                                <th style="width:30%;">Ebook</th>

                                {{-- Desktop only --}}
                                <th class="d-none d-md-table-cell" style="width:15%;">Price</th>
                                <th class="d-none d-md-table-cell" style="width:15%;">Discount</th>

                                {{-- Mobile only --}}
                                <th class="d-table-cell d-md-none" style="width:30%;">Price</th>

                                <th style="width:25%;">Buy</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($ebooks as $item)
                                <tr>

                                    {{-- Ebook Title --}}
                                    <td class="align-middle fw-bold">
                                        {{ $item->title }}
                                    </td>

                                    {{-- Desktop: Original Price --}}
                                    <td class="align-middle d-none d-md-table-cell">
                                        @if($item->discount_price)
                                            <del class="text-muted">
                                                {{ number_format($item->price,2) }} {{ $c_info->currency }}
                                            </del>
                                        @else
                                            {{ number_format($item->price,2) }} {{ $c_info->currency }}
                                        @endif
                                    </td>

                                    {{-- Desktop: Discount Price --}}
                                    <td class="align-middle text-success fw-bold d-none d-md-table-cell">
                                        {{ number_format($item->discount_price ?? $item->price,2) }}
                                        {{ $c_info->currency }}
                                    </td>

                                    {{-- Mobile: Combined Price --}}
                                    <td class="align-middle d-table-cell d-md-none">
                                        @if($item->discount_price)
                                            <div>
                                                <del class="text-muted d-block">
                                                    {{ number_format($item->price,2) }} {{ $c_info->currency }}
                                                </del>
                                                <span class="text-success fw-bold">
                                                    {{ number_format($item->discount_price,2) }} {{ $c_info->currency }}
                                                </span>
                                            </div>
                                        @else
                                            <span class="fw-bold">
                                                {{ number_format($item->price,2) }} {{ $c_info->currency }}
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Buy Button --}}
                                    <td class="align-middle">
                                        <a href="javascript:void(0)"
                                        class="btn btn-sm btn-primary enroll-btn w-100"
                                        data-ebook-id="{{ $item->id }}"
                                        data-ebook-slug="{{ $item->slug }}"
                                        data-price="{{ $item->discount_price ?? $item->price }}">
                                            Buy Now
                                        </a>
                                    </td>

                                </tr>
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
                            <!-- keep empty for spacing -->
                        </div>

                        <!-- Buy Button -->
                        <div class="col-12 col-sm-4">
                            <div class="d-grid gap-2">
                                <a href="javascript:void(0)"
                                class="btn btn-warning w-auto"
                                onclick="document.querySelector('.ebookTable').scrollIntoView({behavior: 'smooth'});">
                                    <b style="color: #06069a;">Buy Now</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </center>
                <div class="col-xl-12 col-lg-12 col-md-12 mb-5">
                    <br>
                    <ul class="nav nav-pills primary nav-fill gap-2 p-2 bg-light-primary rounded-2"
                        id="pillstour-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-2 active"
                                    id="pills-overview-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-overview"
                                    type="button"
                                    role="tab">
                                Ebook Details
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-2"
                                    id="pills-itinerary-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-itinerary"
                                    type="button"
                                    role="tab">
                                Author
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-2"
                                    id="pills-bonus-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-bonus"
                                    type="button"
                                    role="tab">
                                What You’ll Get
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row">
                        <!-- LEFT -->
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div class="tab-content" id="pillstour-tabContent">

                                <!-- DETAILS -->
                                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel">
                                    <div class="overview-wrap full-width">
                                        <div class="card mb-4 border rounded-3">
                                            <div class="card-header">
                                                <h4 class="fs-5">Ebook Description</h4>
                                            </div>
                                            <div class="card-body">
                                                 <div class="row">
                                                        <div class="col-sm-6 mb-3">
                                                            <div class="card shadow-sm border border-primary">
                                                                <div class="card-body">
                                                                    {{ Str::limit(json_decode($ebook->description), 1000) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                         @php
                                                            $videoId = '';
                                                            $url = ($ebook->youtube_link);

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
                                                                    <h5 class="card-title">{{ $ebook->title }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CURRICULUM -->
                                    @if(!empty($ebook->ebook_curriculum))
                                        <div class="overview-wrap full-width">
                                            <div class="card mb-4 border rounded-3">
                                                <div class="card-header">
                                                    <h4 class="fs-5">Ebook Contents</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="accordion accordion-flush">
                                                        @foreach($ebook->ebook_curriculum as $i => $item)
                                                            <div class="accordion-item border">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button collapsed"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#ebook-{{ $i }}">
                                                                        {{ $item['title'] }}
                                                                    </button>
                                                                </h2>
                                                                <div id="ebook-{{ $i }}" class="accordion-collapse collapse">
                                                                    <div class="accordion-body">
                                                                        {{ $item['details'] }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="my-5">
                                                        <center>
                                                            <div class="col-sm-4">
                                                                <div class="d-grid gap-2">
                                                                    <button class="btn btn-success w-100"
                                                                            type="button"
                                                                            style="white-space: nowrap;">
                                                                        <b>Ebook Pricing</b>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </center>
                                                        <br>

                                                        <div class="table-responsive ebookTable">
                                                            <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">

                                                                <thead class="thead-dark">
                                                                <tr>
                                                                    <th style="width:30%;">Ebook</th>

                                                                    {{-- Desktop only --}}
                                                                    <th class="d-none d-md-table-cell" style="width:15%;">Price</th>
                                                                    <th class="d-none d-md-table-cell" style="width:15%;">Discount</th>

                                                                    {{-- Mobile only --}}
                                                                    <th class="d-table-cell d-md-none" style="width:30%;">Price</th>

                                                                    <th style="width:25%;">Buy</th>
                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($ebooks as $item)
                                                                    <tr>
                                                                        {{-- Ebook Title --}}
                                                                        <td class="align-middle fw-bold">
                                                                            {{ $item->title }}
                                                                        </td>

                                                                        {{-- Desktop: Original Price --}}
                                                                        <td class="align-middle d-none d-md-table-cell">
                                                                            @if($item->discount_price)
                                                                                <del class="text-muted">
                                                                                    {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                                                </del>
                                                                            @else
                                                                                {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                                            @endif
                                                                        </td>

                                                                        {{-- Desktop: Discount Price --}}
                                                                        <td class="align-middle text-success fw-bold d-none d-md-table-cell">
                                                                            {{ number_format($item->discount_price ?? $item->price, 2) }}
                                                                            {{ $c_info->currency }}
                                                                        </td>

                                                                        {{-- Mobile: Combined Price --}}
                                                                        <td class="align-middle d-table-cell d-md-none">
                                                                            @if($item->discount_price)
                                                                                <del class="text-muted d-block">
                                                                                    {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                                                </del>
                                                                                <span class="text-success fw-bold">
                                                                                    {{ number_format($item->discount_price, 2) }} {{ $c_info->currency }}
                                                                                </span>
                                                                            @else
                                                                                <span class="fw-bold">
                                                                                    {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                                                </span>
                                                                            @endif
                                                                        </td>

                                                                        {{-- Buy Button --}}
                                                                        <td class="align-middle">
                                                                            <a href="javascript:void(0)"
                                                                            class="btn btn-sm btn-primary enroll-btn w-100"
                                                                            data-ebook-id="{{ $item->id }}"
                                                                            data-price="{{ $item->discount_price ?? $item->price }}">
                                                                                Buy Now
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>

                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="overview-wrap full-width">
                                        <div class="card mb-4 border rounded-3">
                                            <div class="card-header">
                                                <h4 class="fs-5">What You’ll Get</h4>
                                            </div>

                                            <div class="card-body">
                                                <div class="row g-4">

                                                    @foreach($ebook->ebook_get as $get)
                                                        <div class="col-12 col-sm-6 col-lg-3">
                                                            <div class="card h-100 shadow-sm text-center border border-primary">
                                                                <img src="{{ url('public/tick.png') }}"
                                                                    class="rounded-circle mx-auto mt-3"
                                                                    style="width: 100px; height: 100px; object-fit: cover;"
                                                                    alt="Ebook Benefit">

                                                                <div class="card-body">
                                                                    <p class="card-text">
                                                                        {{ $get }}
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

                                <!-- AUTHORS -->
                                <div class="tab-pane fade" id="pills-itinerary" role="tabpanel">
                                    <div class="overview-wrap full-width">
                                        <div class="card mb-4 border rounded-3">
                                            <div class="card-header">
                                                <h4 class="fs-5">Ebook Author</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    @foreach($ebook->authors as $author)
                                                        <div class="col-12 col-sm-6 col-lg-4">
                                                            <div class="card h-100 shadow-sm text-center border border-primary">
                                                                <img src="{{ url('/public/' . $author['photo']) }}"
                                                                    class="rounded-circle mx-auto mt-3"
                                                                    style="width:110px;height:110px;object-fit:cover;">
                                                                <div class="card-body mt-3">

                                                                        <h5 class="fw-bold">{{ $author['name'] }}</h5>

                                                                        <p class="mb-1" style="font-size:15px; color:#444;">
                                                                            <strong>Designation:</strong> Lead Cosultant
                                                                        </p>

                                                                        <p class="text-muted" style="font-size:14px;">
                                                                            <strong>Institute:</strong> Trip designer
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

                                <!-- WHAT YOU GET -->
                                <div class="tab-pane fade" id="pills-bonus" role="tabpanel">
                                    <div class="overview-wrap full-width">
                                        <div class="card mb-4 border rounded-3">
                                            <div class="card-header">
                                                <h4 class="fs-5">What You’ll Get</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    @foreach($ebook->ebook_get as $get)
                                                        <div class="col-12 col-sm-6 col-lg-3">
                                                            <div class="card h-100 shadow-sm text-center border border-primary">
                                                                <img src="{{ url('public/tick.png') }}"
                                                                    class="rounded-circle mx-auto mt-3"
                                                                    style="width:100px;height:100px;">
                                                                <div class="card-body">
                                                                    <p>{{ $get }}</p>
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


                        <!-- RIGHT SIDEBAR -->
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="sides-block">
                                <div class="card border rounded-3 mb-4 border border-primary">
                                    <div class="single-card px-3 py-3">
                                        <center>
                                            <div class="col-sm-12">
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-success w-100"
                                                            type="button"
                                                            style="white-space: nowrap;">
                                                        <b>Ebook Pricing</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </center>

                                        <br>
                                        <div class="table-responsive ebookTable">
                                            <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">

                                                <thead>
                                                <tr>
                                                    <th>Ebook</th>

                                                    {{-- Desktop only --}}
                                                    <th class="d-none d-md-table-cell">Price</th>
                                                    <th class="d-none d-md-table-cell">Discount</th>

                                                    {{-- Mobile only --}}
                                                    <th class="d-table-cell d-md-none">Price</th>

                                                    <th>Buy</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($ebooks as $item)
                                                    <tr>
                                                        {{-- Ebook title --}}
                                                        <td class="fw-bold">
                                                            {{ $item->title }}
                                                        </td>

                                                        {{-- Desktop: Price --}}
                                                        <td class="d-none d-md-table-cell">
                                                            @if($item->discount_price)
                                                                <del>{{ $item->price }}</del>
                                                            @else
                                                                {{ $item->price }}
                                                            @endif
                                                        </td>

                                                        {{-- Desktop: Discount --}}
                                                        <td class="text-success fw-bold d-none d-md-table-cell">
                                                            {{ $item->discount_price ?? $item->price }}
                                                        </td>

                                                        {{-- Mobile: Price + Discount combined --}}
                                                        <td class="d-table-cell d-md-none">
                                                            @if($item->discount_price)
                                                                <del class="d-block text-muted">
                                                                    {{ $item->price }}
                                                                </del>
                                                                <span class="fw-bold text-success">
                                                                    {{ $item->discount_price }}
                                                                </span>
                                                            @else
                                                                <span class="fw-bold">
                                                                    {{ $item->price }}
                                                                </span>
                                                            @endif
                                                        </td>

                                                        {{-- Buy button --}}
                                                        <td>
                                                            <a href="javascript:void(0)"
                                                            class="btn btn-sm btn-primary w-100 enroll-btn"
                                                            data-ebook-id="{{ $item->id }}"
                                                            data-price="{{ $item->discount_price ?? $item->price }}">
                                                                Buy
                                                            </a>
                                                        </td>
                                                    </tr>
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
                            <button class="btn btn-success w-100"
                                    type="button"
                                    style="white-space: nowrap;">
                                <b>Readers Review</b>
                            </button>
                        </div>
                    </div>
                </center>

                <div class="col-xl-12 col-lg-12 col-md-12"><br>
                    <div class="card-body">
                        <div class="row g-4">

                            @foreach($ebook->ebook_review as $review)
                                @php
                                    $rating = rand(4,5);
                                    $firstLetter = strtoupper(mb_substr($review['name'], 0, 1));
                                @endphp

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card h-100 shadow-sm p-3 border border-primary">
                                        <div class="d-flex align-items-center mb-2">

                                            {{-- PHOTO OR LETTER AVATAR --}}
                                            @if(!empty($review['photo']))
                                                <img src="{{ url($review['photo']) }}"
                                                    alt="Reviewer Photo"
                                                    class="rounded-circle me-3"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="rounded-circle me-3 d-flex align-items-center justify-content-center"
                                                    style="
                                                        width: 60px;
                                                        height: 60px;
                                                        background: #060e57;
                                                        color: #fff;
                                                        font-size: 24px;
                                                        font-weight: bold;
                                                    ">
                                                    {{ $firstLetter }}
                                                </div>
                                            @endif

                                            <div>
                                                <h6 class="mb-1">{{ $review['name'] }}</h6>
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

                                        <p class="card-text">
                                            {{ $review['review'] }}
                                        </p>
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
                                        <button class="btn btn-success w-100"
                                                type="button"
                                                style="white-space: nowrap;">
                                            <b>Ebook Pricing</b>
                                        </button>
                                    </div>
                                </div>
                            </center>

                            <div class="table-responsive ebookTable">
                                <table class="table table-bordered table-hover text-center shadow-sm rounded overflow-hidden">

                                    <thead class="thead-dark">
                                    <tr>
                                        <th style="width:30%;">Ebook</th>

                                        {{-- Desktop only --}}
                                        <th class="d-none d-md-table-cell" style="width:15%;">Price</th>
                                        <th class="d-none d-md-table-cell" style="width:15%;">Discount</th>

                                        {{-- Mobile only --}}
                                        <th class="d-table-cell d-md-none" style="width:30%;">Price</th>

                                        <th style="width:35%;">Buy</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($ebooks as $item)
                                        <tr>
                                            {{-- Ebook Title --}}
                                            <td class="align-middle fw-bold">
                                                {{ $item->title }}
                                            </td>

                                            {{-- Desktop: Original Price --}}
                                            <td class="align-middle d-none d-md-table-cell">
                                                @if(!empty($item->discount_price))
                                                    <del class="text-muted">
                                                        {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                    </del>
                                                @else
                                                    {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                @endif
                                            </td>

                                            {{-- Desktop: Discounted Price --}}
                                            <td class="align-middle text-success fw-bold d-none d-md-table-cell">
                                                {{ number_format($item->discount_price ?? $item->price, 2) }}
                                                {{ $c_info->currency }}
                                            </td>

                                            {{-- Mobile: Price + Discount merged --}}
                                            <td class="align-middle d-table-cell d-md-none">
                                                @if(!empty($item->discount_price))
                                                    <del class="d-block text-muted">
                                                        {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                    </del>
                                                    <span class="fw-bold text-success">
                                                        {{ number_format($item->discount_price, 2) }} {{ $c_info->currency }}
                                                    </span>
                                                @else
                                                    <span class="fw-bold">
                                                        {{ number_format($item->price, 2) }} {{ $c_info->currency }}
                                                    </span>
                                                @endif
                                            </td>

                                            {{-- Buy Button --}}
                                            <td class="align-middle">
                                                <a href="javascript:void(0)"
                                                class="btn btn-sm btn-primary enroll-btn w-100"
                                                data-ebook-id="{{ $item->id }}"
                                                data-price="{{ $item->discount_price ?? $item->price }}">
                                                    Buy Now
                                                </a>
                                            </td>
                                        </tr>
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
    /* =============================
       Image responsive
    ============================= */
    $('p img').css('width', '100%');


    /* =============================
       COUNTDOWN (Same as before)
    ============================= */
    const now = new Date();
    const countDownDate = new Date(
        now.getFullYear(),
        now.getMonth(),
        now.getDate(),
        23, 59, 59
    ).getTime();

    const x = setInterval(function () {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        if (distance < 0) {
            clearInterval(x);
            $('.countdown-box').html("Offer has ended!");
            return;
        }

        const hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $("#hours").text(hours);
        $("#minutes").text(minutes);
        $("#seconds").text(seconds);
    }, 1000);


    /* =============================
       PAYMENT GATEWAY SELECT
    ============================= */
    document.addEventListener("DOMContentLoaded", function () {
        let options = document.querySelectorAll('.gateway-option');

        function highlight(selectedId) {
            options.forEach(opt => {
                opt.style.border = '1px solid #dee2e6';
                opt.style.backgroundColor = 'transparent';
            });

            let selected = document.getElementById(selectedId + '-wrapper');
            if (!selected) return;

            selected.style.border = '2px solid #0d6efd';
            selected.style.backgroundColor = '#ffc107';

            document.getElementById('payment_gateway').value =
                selected.dataset.gateway;
        }

        options.forEach(opt => {
            opt.addEventListener('click', function () {
                highlight(this.dataset.gateway);
            });
        });

        highlight('bkash'); // default
    });


    /* =============================
       BUY NOW → MODAL OPEN (EBOOK)
    ============================= */
    $(document).ready(function () {

        // dynamic buttons safe binding
        $(document).on('click', '.enroll-btn', function () {

            let ebookId = $(this).data('ebook-id');
            let price   = $(this).data('price');

            // hidden inputs (modal)
            $('#modal_ebook_id').val(ebookId);
            $('#modal_show_price').val(
                price + " {{ $c_info->currency }}"
            );

            // form action
            let actionUrl = "{{ url('ebook/buy') }}/" + ebookId;
            $('#enrollForm').attr('action', actionUrl);

            // open modal
            $('#enrollModal').modal('show');
        });

    });
</script>

@endsection
