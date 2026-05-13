@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 35 – Fare Construction Line')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Fare Construction Line
                <small class="text-muted">Fare Construction & Audit – Chapter 35</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে
                <b>Fare Construction Line</b> পড়তে হয়, এর প্রতিটি অংশের অর্থ কী এবং GDS system-এ এর real result কেমন দেখায়।
            </p>

            <div class="highlight-box">
                ⚠️ Fare construction ভুল হলে airline ADM issue হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Fare Construction Line</h3>

            <p>
                Fare Construction Line হলো ticket-এর মূল কাঠামো, যেখানে routing, fare amount, currency, mileage এবং tax calculation summary দেখানো হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Printed on ticket & audit report</li>
                <li>✔ Used for fare verification</li>
                <li>✔ BSP / ARC audit critical element</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Galileo – Fare Construction Display</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
*F
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
DAC EK X/DXB EK LON 450.00
NUC450.00END ROE108.50
FARE BASIS: Y26
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Routing: DAC–DXB–LON ✔ NUC fare calculated correctly ✔ ROE applied
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Sabre – Fare Construction Display</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WPF*
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
DAC EK X/DXB EK LON NUC450.00
END ROE108.50
TOTAL FARE VERIFIED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Fare routing verified ✔ Sabre fare audit-ready
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Amadeus – Fare Construction Display</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQN
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
DAC EK X/DXB EK LON
NUC450.00 END ROE108.50
FARE CALCULATED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus fare construction displayed ✔ Ready for ticketing
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Understanding Key Elements</h3>

            <ul class="visa-list">
                <li>✔ NUC – Neutral Unit of Construction</li>
                <li>✔ ROE – Rate of Exchange</li>
                <li>✔ X/ – Transfer point</li>
                <li>✔ END – Fare calculation end</li>
            </ul>

            <div class="info-box">
                📌 Fare Construction Line সবসময় tax calculation-এর আগে verify করতে হবে।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Fare Construction Line বোঝা মানে একজন agent-এর audit risk কমানো।
                        <b>Trip Designer</b> শেখায় real BSP-level fare analysis technique।
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

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Professional Agent Tips</h3>

            <ul class="visa-list">
                <li>✔ NUC ও ROE mismatch হলে reprice করুন</li>
                <li>✔ Fare basis code check করুন</li>
                <li>✔ Audit-এর আগে fare construction verify করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/34') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/36') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection