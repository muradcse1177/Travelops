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
                            <h4><i class="fa-solid fa-file-invoice-dollar me-2"></i>Payment History</h4>
                        </div>
                        <div class="card-body">
                            <div class="container px-3">
                                @if ($message = Session::get('successMessage'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Congratulations!</strong> {{$message}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if ($message = Session::get('errorMessage'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Sorry!!</strong> {{$message}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @forelse ($orders as $order)
                                    @php
                                        $profile = json_decode($order->product_profile);
                                        $slug = $profile->slug ?? '#';

                                        $status = strtolower($order->status);
                                        $statusClass = match($status) {
                                            'complete', 'completed', 'success', 'paid' => 'bg-success text-white',
                                            'pending', 'hold' => 'bg-info text-white',
                                            'cancel', 'failed', 'cancelled' => 'bg-danger text-white',
                                            'unpaid' => 'bg-warning text-dark',
                                            default => 'bg-secondary text-white'
                                        };

                                        $isCourse = $order->product_category === 'Course';
                                        $isEbook  = $order->product_category === 'Ebook';
                                    @endphp

                                    <div class="row border rounded shadow-sm p-3 mb-3 align-items-center">

                                        <!-- Left -->
                                        <div class="col-md-3 mb-2 mb-md-0">
                                            <div><strong>Transaction ID:</strong> {{ $order->transaction_id }}</div>
                                            <div><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->time)->format('d M Y') }}</div>
                                        </div>

                                        <!-- Middle -->
                                        <div class="col-md-2 mb-2 mb-md-0 text-start text-md-end">
                                            <div>
                                                <div>
                                                    <strong>Name:</strong>

                                                    @if($isCourse)
                                                        <a href="{{ url('course/' . $slug) }}" target="_blank">
                                                            {{ $order->product_name }}
                                                        </a>
                                                    @elseif($isEbook)
                                                        <a href="{{ url('ebook/' . $slug) }}" target="_blank">
                                                            {{ $order->product_name }}
                                                        </a>
                                                    @else
                                                        {{ str_contains($order->product_name, '_') 
                                                            ? ucwords(str_replace('_', ' ', $order->product_name)) 
                                                            : $order->product_name 
                                                        }}
                                                    @endif
                                                
                                                </div>

                                                @if($isCourse && isset($profile->variation->title))
                                                    <div>
                                                        <strong>Type:</strong>
                                                        <span class="text-danger fw-bold">
                                                            {{ $profile->variation->title }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Right -->
                                        <div class="col-md-7">
                                            <div class="d-flex flex-wrap justify-content-start justify-content-md-end align-items-center gap-2">

                                                <span class="badge {{ $statusClass }} text-uppercase px-3 py-1">
                                                    {{ $order->status }}
                                                </span>

                                                <strong class="text-dark">৳{{ number_format($order->amount, 2) }}</strong>

                                                {{-- Invoice --}}
                                                <a href="{{ url('invoice/' . $order->transaction_id) }}" target="_blank"
                                                class="btn btn-sm btn-primary">
                                                    <i class="fa fa-file-invoice me-1"></i> Invoice
                                                </a>

                                                {{-- View (ONLY for Course) --}}
                                                @if($isCourse)
                                                    <a href="{{ url('booking/view/' . $order->transaction_id) }}" target="_blank"
                                                    class="btn btn-sm btn-warning">
                                                        <i class="fa fa-eye me-1"></i> View
                                                    </a>
                                                @endif
                                                {{-- 📘 Ebook Read Button (FIXED ✅) --}}
                                                @if($isEbook && $status === 'complete')
                                                    <a href="{{ url('ebooks/' . $slug) }}" target="_blank"
                                                    class="btn btn-sm btn-success">
                                                        <i class="fa fa-book-open me-1"></i> Read Ebook
                                                    </a>
                                                @endif
                                                {{-- Course extra buttons --}}
                                                @if($isCourse && $status === 'complete')
                                                    <a href="javascript:void(0)"
                                                    class="btn btn-sm btn-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#groupInfoModal">
                                                        <i class="fa fa-link me-1"></i> Group Link
                                                    </a>

                                                    @php
                                                        $isRecorded = isset($profile->variation->key)
                                                                    && $profile->variation->key === 'recorded';
                                                    @endphp

                                                    @if($isRecorded)
                                                        <a href="{{ url('course/view/' . $order->transaction_id) }}" target="_blank"
                                                        class="btn btn-sm btn-danger">
                                                            <i class="fa fa-play-circle me-1"></i> Watch Class
                                                        </a>
                                                    @endif
                                                @endif
                                                {{-- 💳 PAY NOW (AUTO DETECT) --}}
                                                @if($status !== 'complete')
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-danger pay-now-btn"
                                                        data-type="{{ $isCourse ? 'course' : 'ebook' }}"
                                                        data-id="{{ $order->local_id }}"
                                                        data-price="{{ $order->amount }}"
                                                        @if($isCourse)
                                                            data-variation="{{ $profile->variation->key ?? '' }}"
                                                        @endif
                                                    >
                                                        Pay Now
                                                    </button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <div class="text-center text-muted">
                                        No bookings found.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @php
    $user = Session::get('user_info');
    @endphp

    @php
    $user = Session::get('user_info');
    @endphp

    <div class="modal fade" id="enrollModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Complete Your Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form id="paymentForm" method="POST">
                        @csrf

                        <!-- REQUIRED hidden -->
                        <input type="hidden" name="variation_key" id="modal_variation_key">
                        <input type="hidden" name="payment_gateway" id="payment_gateway" value="bkash">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text"
                                class="form-control"
                                name="name"
                                value="{{ $user['company_name'] ?? '' }}"
                                required>
                        </div>

                        <!-- Phone -->
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
                        <div class="mb-3 mt-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                class="form-control"
                                name="email"
                                value="{{ $user['company_email'] ?? '' }}"
                                required>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="text"
                                id="modal_show_price"
                                class="form-control fw-bold"
                                readonly>
                        </div>

                        <!-- Gateway -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Select Payment Gateway</label>

                            <div class="row text-center">
                                <div class="col-6">
                                    <div id="bkash-wrapper"
                                        class="gateway-option border rounded p-2"
                                        data-gateway="bkash"
                                        style="cursor:pointer;">
                                        <img src="{{ url('public/bkash.png') }}" style="max-height:50px;">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div id="sslcommerz-wrapper"
                                        class="gateway-option border rounded p-2"
                                        data-gateway="sslcommerz"
                                        style="cursor:pointer;">
                                        <img src="{{ url('public/sslcommerz.png') }}" style="max-height:50px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit"
                            class="btn btn-primary"
                            form="paymentForm">
                        Make Payment
                    </button>
                </div>

            </div>
        </div>
    </div>



        <!-- Modal -->
        <div class="modal fade" id="groupInfoModal" tabindex="-1" aria-labelledby="groupInfoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content shadow-lg border-0 rounded-3">

                    <!-- Header -->
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title fw-bold" id="groupInfoLabel{{ $order->transaction_id }}">
                            🎓 Course Group Information
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="p-3">
                            <p class="fw-semibold mb-3">
                                হ্যালো ডিয়ার,<br>
                                ট্রিপ ডিজাইনারের পক্ষ থেকে আপনাকে শুভেচ্ছা ও স্বাগতম!
                            </p>

                            <p>
                                ভিসা প্রসেসিং মাস্টার কোর্সে আপনার নাম নিশ্চিত করতে পেরে আমরা অত্যান্ত আনন্দিত।
                                আমাদের একাডেমিক গ্রুপের অংশ হিসেবে, আপনাকে <strong>ট্রিপ ডিজাইনার একাডেমিক এনাউনসমেন্ট গ্রুপ</strong>
                                এর লিংক দেওয়া হচ্ছে যেখানে আপনি সমস্ত গুরুত্বপূর্ণ আপডেট এবং বিজ্ঞপ্তি পেয়ে যাবেন।
                            </p>

                            <div class="alert alert-success">
                                <strong>📢 এনাউনসমেন্ট গ্রুপের লিংক:</strong><br>
                                <a href="https://chat.whatsapp.com/KsqzQQ1cODnDDTDhY1T9Ei" target="_blank" class="text-decoration-none fw-bold">
                                    👉 WhatsApp Announcement Group
                                </a>
                            </div>

                            <p class="fw-semibold">এছাড়াও, আমরা আপনাকে আলোচনা ও সহায়তার জন্য নিম্নলিখিত ৩টি গ্রুপে যোগদানের জন্য উৎসাহিত করছি:</p>

                            <ul class="list-group mb-3">
                                <li class="list-group-item">
                                    🟢 <strong>সাপোর্ট গ্রুপ:</strong><br>
                                    <a href="https://chat.whatsapp.com/LvB4BU7z8pFJttR6lv7KNT" target="_blank">WhatsApp Support Group</a>
                                </li>
{{--                                <li class="list-group-item">--}}
{{--                                    🟢 <strong>TDVPC - সেপ্টেম্বর 2025 ব্যাচ:</strong><br>--}}
{{--                                    <a href="https://chat.whatsapp.com/FsSlwXATZpv2qRxgSupPBk" target="_blank">Batch WhatsApp Group</a>--}}
{{--                                </li>--}}
                                <li class="list-group-item">
                                    🟢 <strong>Facebook Group:</strong><br>
                                    <a href="https://www.facebook.com/groups/1066589232220629" target="_blank">Trip Designer Academy Facebook Group</a>
                                </li>
                            </ul>

                            <div class="alert alert-danger small">
                                <strong>বিঃদ্রঃ</strong> আপনি যদি এই গ্রুপগুলিতে নিজেকে যুক্ত না করেন তবে কর্তৃপক্ষ দায়ী থাকবে না। ধন্যবাদ।
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Close</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Booking Page End ================================== -->
@endsection
@section('js')
<script>
document.addEventListener("DOMContentLoaded", function () {

    /* ========= Gateway Select ========= */
    let options = document.querySelectorAll('.gateway-option');

    function highlight(selectedId) {
        options.forEach(opt => {
            opt.style.border = '1px solid #dee2e6';
            opt.style.backgroundColor = 'transparent';
        });

        let selected = document.getElementById(selectedId + '-wrapper');
        if (selected) {
            selected.style.border = '2px solid #0d6efd';
            selected.style.backgroundColor = '#ffc107';
            document.getElementById('payment_gateway').value =
                selected.dataset.gateway;
        }
    }

    options.forEach(opt => {
        opt.addEventListener('click', function () {
            highlight(this.dataset.gateway);
        });
    });

    highlight('bkash'); // default


    /* ========= Pay Now Handler ========= */
    document.querySelectorAll('.pay-now-btn').forEach(btn => {
        btn.addEventListener('click', function () {

            let id        = this.dataset.id;
            let price     = this.dataset.price;
            let type      = this.dataset.type;      // course | ebook
            let variation = this.dataset.variation || '';

            let form = document.getElementById('paymentForm');
            let variationInput = document.getElementById('modal_variation_key');

            document.getElementById('modal_show_price').value =
                price + ' BDT';

            if (type === 'course') {

                if (!variation) {
                    alert('Course variation missing!');
                    return;
                }

                variationInput.value = variation;
                variationInput.required = true;
                form.action = "{{ url('/course/enroll') }}/" + id;

            } else {

                variationInput.value = '';
                variationInput.required = false;
                form.action = "{{ url('/ebook/buy') }}/" + id;
            }

            new bootstrap.Modal(
                document.getElementById('enrollModal')
            ).show();
        });
    });

});
</script>

@endsection
