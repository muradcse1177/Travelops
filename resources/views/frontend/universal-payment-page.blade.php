@extends('frontend.layout.body')

@section('title','Universal Payment')

@section('content')
<div id="main-wrapper">

    <!-- ============================ HERO ============================ -->
    <div class="py-5 bg-primary position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background: rgba(0,0,0,0.35);"></div>

        <div class="container position-relative">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h2 class="fw-bold text-white">Trip Designer Secure Payment System</h2>
                    <p class="mb-0 text-white opacity-90">
                        Complete your payment safely & quickly
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= PAYMENT FORM ================= -->
    <section class="pt-5 pb-5 gray-simple">
        <div class="container">
            <!-- ================= HEADER CARD (CAR THEME) ================= -->
                <div class="row mb-4">
                    <div class="col-xl-12">
                        <div class="card border-0 shadow-sm overflow-hidden">
                            <div class="row g-0 align-items-center">

                                <div class="col-md-8 p-4">

                                    <h3 class="fw-bold mb-1">Secure Payment</h3>
                                    <p class="mb-0 text-muted">
                                        Complete your booking safely with our trusted payment gateway
                                    </p>

                                    {{-- 🔴 ERROR MESSAGE (INSIDE CARD) --}}
                                    @if(session('errorMessage'))
                                        <div class="alert alert-danger mt-3 mb-0 py-2 px-3 small">
                                            <i class="fa-solid fa-triangle-exclamation me-1"></i>
                                            {{ session('errorMessage') }}
                                        </div>
                                    @endif

                                    {{-- 🔴 VALIDATION ERRORS --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-3 mb-0 py-2 px-3 small">
                                            <ul class="mb-0 ps-3">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                </div>

                                <div class="col-md-4 text-end p-4 d-none d-md-block">
                                    <i class="fa-solid fa-car-side fs-1 text-primary opacity-75"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        <!-- 🔒 FORM START -->
            <form action="{{  route('universal.payment.process') }}" method="POST">
            @csrf
            
                <div class="row align-items-start g-4">

                    <!-- ================= LEFT : BASIC DETAIL ================= -->
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-header bg-white border-bottom">
                                <h5 class="fw-bold mb-0">Payment Detail</h5>
                            </div>

                            <div class="card-body p-4">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Billing Name</label>
                                        <input type="text" class="form-control"
                                            name="billing_name"
                                            placeholder="Enter your full name" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" class="form-control"
                                            name="email"
                                            placeholder="Enter your email address" required>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Phone</label>
                                        <input type="text" class="form-control"
                                            value="88" readonly>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label fw-semibold">Phone</label>
                                        <input type="text" class="form-control"
                                            name="phone"
                                            placeholder="01XXXXXXXXX"
                                            maxlength="11"
                                            pattern="[0-9]{11}"
                                            inputmode="numeric"
                                            required>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label fw-semibold">Amount</label>
                                        <input type="number" class="form-control"
                                            name="amount"
                                            id="amount"
                                            placeholder="Enter payment amount" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Payment Purpose</label>
                                        <select class="form-select"name="purpose" required>
                                            <option value="">Select purpose</option>
                                            <option value="air_ticket">Air Ticket</option>
                                            <option value="visa_process">Visa Process</option>
                                            <option value="hotel_booking">Hotel Booking</option>
                                            <option value="tour_package">Tour Package</option>
                                            <option value="hajj_umrah">Hajj & Umrah</option>
                                            <option value="study_abroad">Study Abroad</option>
                                            <option value="bank_solvency">Bank Solvency Support</option>
                                            <option value="civil_aviation_licence">Civil Aviation Licence</option>
                                            <option value="asset_valuation">Asset Valuation</option>
                                            <option value="document_legalization">Document Legalization</option>
                                            <option value="course">Course</option>
                                            <option value="ebook">Ebook</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control"
                                                name="notes"
                                                rows="3"
                                                placeholder="Write additional information if needed"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================= RIGHT : PAYMENT SUMMARY ================= -->
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-header bg-white border-bottom d-flex justify-content-between">
                                <h5 class="fw-bold mb-0">Payment Summary</h5>
                                <a href="#" class="text-primary fw-semibold">Manage Cards</a>
                            </div>

                            <div class="card-body p-4">

                            <!-- ================= PAYMENT METHODS ================= -->
                                <div class="mb-3">

                                    <!-- bKash -->
                                    <div class="border rounded-3 p-3 mb-2">
                                        <div class="form-check d-flex align-items-center m-0">
                                            <input class="form-check-input me-3"
                                                type="radio"
                                                name="gateway"
                                                id="bkash"
                                                value="bkash"
                                                checked
                                                required>

                                            <label class="form-check-label d-flex align-items-center w-100"
                                                for="bkash">
                                                <img src="{{url('public/bkash.png')}}"
                                                    style="height:28px" class="me-2">
                                                <span class="fw-semibold">bKash</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- SSLCommerz -->
                                    <div class="border rounded-3 p-3">
                                        <div class="form-check d-flex align-items-center m-0">
                                            <input class="form-check-input me-3"
                                                type="radio"
                                                name="gateway"
                                                id="sslcommerz"
                                                value="sslcommerz"
                                                required>

                                            <label class="form-check-label d-flex align-items-center w-100"
                                                for="sslcommerz">
                                                <img src="{{url('public/sslcommerz.png')}}"
                                                    style="height:26px" class="me-2">
                                                <span class="fw-semibold">SSLCommerz</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <!-- ================= SUMMARY ================= -->
                                <ul class="list-group list-group-borderless mb-3">

                                    <li class="list-group-item d-flex justify-content-between align-items-center px-2 py-2">
                                        <span class="text-muted">Payment</span>
                                        <span class="fw-semibold">BDT <span id="paymentAmount">0.00</span></span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center px-2 py-2">
                                        <span class="text-muted">Gateway Fee</span>
                                        <span class="fw-semibold">BDT <span id="gatewayFee">0.00</span></span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center px-2 py-2 border-top">
                                        <span class="fw-bold">Total</span>
                                        <span class="fw-bold text-success">
                                            BDT <span id="totalAmount">0.00</span>
                                        </span>
                                    </li>

                                </ul>

                                <!-- SECURITY -->
                                <div class="bg-light-success rounded-3 p-3 mb-3 d-flex align-items-center">
                                    <i class="fa-solid fa-shield-heart fs-3 text-success me-2"></i>
                                    <div>
                                        <div class="fw-semibold">100% Security Guarantee</div>
                                        <small class="text-muted">We protect your money</small>
                                    </div>
                                </div>

                                <!-- PAY BUTTON -->
                                <button class="btn btn-primary w-100 fw-semibold btn-lg" type="submit">
                                    Pay Now
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
        <!-- 🔒 FORM END -->
        <!-- ================= HEADER CARD (CAR THEME) ================= -->
            <div class="row mt-4">
                <div class="col-xl-12">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <div class="row g-0 align-items-center">

                            <div class="col-md-12 p-4 text-center">
                                <h4 class="fw-bold">🏦 Bank Payment Information</h4>
                                <p class="text-muted mb-0">
                                    You can also complete your payment via bank transfer
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ================= BANK DETAILS ================= -->
            <div class="row mt-4">
                <!-- Dutch Bangla Bank -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                Dutch Bangla Bank PLC
                            </h6>
                            <p class="mb-1"><strong>Branch:</strong> Pragati Sarani</p>
                            <p class="mb-1"><strong>A/C Name:</strong> Trip Designer</p>
                            <p class="mb-1"><strong>A/C No:</strong> 1931100030570</p>
                            <p class="mb-0"><strong>Routing:</strong> 090263707</p>
                        </div>
                    </div>
                </div>

                <!-- Eastern Bank Limited -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                Eastern Bank PLC
                            </h6>
                            <p class="mb-1"><strong>Branch:</strong> Pragati Sarani</p>
                            <p class="mb-1"><strong>A/C Name:</strong> Trip Designer</p>
                            <p class="mb-1"><strong>A/C No:</strong> 1221070001334</p>
                            <p class="mb-0"><strong>Routing:</strong> 095263702</p>
                        </div>
                    </div>
                </div>

                <!-- City Bank -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                The City Bank PLC
                            </h6>
                            <p class="mb-1"><strong>Branch:</strong> Pragati Sarani</p>
                            <p class="mb-1"><strong>A/C Name:</strong> T Designer</p>
                            <p class="mb-1"><strong>A/C No:</strong> 1254389657001</p>
                            <p class="mb-0"><strong>Routing:</strong> 225263701</p>
                        </div>
                    </div>
                </div>

                <!-- BRAC Bank -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                BRAC Bank PLC
                            </h6>
                            <p class="mb-1"><strong>Branch:</strong> Badda</p>
                            <p class="mb-1"><strong>A/C Name:</strong> T DESIGNER</p>
                            <p class="mb-1"><strong>A/C No:</strong> 2069953580001</p>
                            <p class="mb-0"><strong>Routing:</strong> 060260356</p>
                        </div>
                    </div>
                </div>
                <!-- Bkash (Send Money) -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                Bkash (Send Money)
                            </h6>
                            <p class="mb-1"><strong>Number:</strong> 01929877307</p>
                        </div>
                    </div>
                </div>
                <!-- Nagad (Send Money) -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                Nagad (Send Money)
                            </h6>
                            <p class="mb-1"><strong>Number:</strong> 01707011562</p>
                        </div>
                    </div>
                </div>
                <!-- Rocket (Send Money) -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                Rocket (Send Money)
                            </h6>
                            <p class="mb-1"><strong>Number:</strong> 019298773079</p>
                        </div>
                    </div>
                </div>
                <!-- Bkash (Payment with cashout charge) -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary mb-2">
                                Bkash (Payment with cashout charge)
                            </h6>
                            <p class="mb-1"><strong>Number:</strong> 01707011562</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ================= END BANK DETAILS ================= -->
        </div>
    </section>
</div>

<!-- ================= JS (NO DESIGN IMPACT) ================= -->
<script>
document.getElementById('amount').addEventListener('input', function () {
    let amount = parseFloat(this.value) || 0;
    document.getElementById('paymentAmount').innerText = amount.toFixed(2);
    document.getElementById('totalAmount').innerText = amount.toFixed(2);
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const amountInput   = document.getElementById('amount');
    const paymentAmount = document.getElementById('paymentAmount');
    const gatewayFeeEl  = document.getElementById('gatewayFee');
    const totalAmount   = document.getElementById('totalAmount');
    const gateways      = document.querySelectorAll('input[name="gateway"]');

    function calculateTotal() {
        let amount = parseFloat(amountInput.value) || 0;
        let gatewayFee = 0;

        const selectedGateway = document.querySelector('input[name="gateway"]:checked');

        // bKash = 1.8% fee
        if (selectedGateway && selectedGateway.value === 'bkash') {
            gatewayFee = amount * 0.018;
        }

        let total = amount + gatewayFee;

        paymentAmount.innerText = amount.toFixed(2);
        gatewayFeeEl.innerText  = gatewayFee.toFixed(2);
        totalAmount.innerText   = total.toFixed(2);
    }

    // Amount input listener
    amountInput.addEventListener('input', calculateTotal);

    // Gateway change listener
    gateways.forEach(gateway => {
        gateway.addEventListener('change', calculateTotal);
    });

    // Initial calculation (bKash default)
    calculateTotal();
});
</script>

@endsection
