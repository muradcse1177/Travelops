@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 46 – Fraud & Risk Prevention')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Fraud & Risk Prevention
                <small class="text-muted">Queue & Back Office – Chapter 46</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Air Ticketing Fraud</b> কীভাবে হয়, agency-এর common risk areas কোনগুলো, এবং কীভাবে professionalভাবে fraud prevent করা যায়।
            </p>

            <div class="highlight-box">
                ⚠️ Fraudulent ticket issue করলে agency blacklist ও BSP termination হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Ticketing Fraud</h3>

            <p>
                Ticketing fraud হলো intentional বা unintentional process violation, যার ফলে airline বা agency financial loss হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Fake payment / chargeback</li>
                <li>✔ Name manipulation</li>
                <li>✔ Fare rule violation</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Common Risk Areas</h3>

            <ul class="visa-list">
                <li>✔ Credit card payment</li>
                <li>✔ Last-minute ticket issue</li>
                <li>✔ Third-party booking request</li>
            </ul>

            <div class="info-box">
                📌 High-risk booking always requires extra verification।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Fraud Alert Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Alert</div>
                <pre class="gds-code">
WARNING: HIGH RISK TRANSACTION
PAYMENT VERIFICATION REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ System flags suspicious transaction
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Risk Control Indicator</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PAYMENT RISK DETECTED
TICKET ON HOLD
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Ticket issue blocked pending verification
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – Fraud Prevention Message</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Message</div>
                <pre class="gds-code">
SECURITY CHECK REQUIRED
PAYMENT AUTHENTICATION FAILED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Additional authentication required
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Risk Mitigation Actions</h3>

            <ul class="visa-list">
                <li>✔ Verify passenger ID</li>
                <li>✔ Confirm payment ownership</li>
                <li>✔ Avoid urgency-based pressure</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Never bypass verification for commission or pressure।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Fraud prevention মানে শুধু airline protect করা নয়, নিজের agency বাঁচানো।
                        <b>Trip Designer</b> শেখায় real fraud cases, BSP risk signals এবং professional prevention strategy।
                    </p>
                </div>

                <div class="td-card-footer">
                    <div class="td-contact-box">
                        <span class="cta-icon">📞</span>
                        <div>
                            <div class="cta-label">WhatsApp</div>
                            <a href="https://wa.me/8801316444399" target="_blank">
                    +8801316444399
                </a>
                        </div>
                    </div>

                    <div class="td-contact-box">
                        <span class="cta-icon">📘</span>
                        <div>
                            <div class="cta-label">Messenger</div>
                            <a href="https://m.me/tripdesigner.xyz" target="_blank">
                    m.me/tripdesigner.xyz
                </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Professional Agent Tips</h3>

            <ul class="visa-list">
                <li>✔ High-value ticket double-check করুন</li>
                <li>✔ Payment proof archive করুন</li>
                <li>✔ Suspicious case airline report করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/45') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/47') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection