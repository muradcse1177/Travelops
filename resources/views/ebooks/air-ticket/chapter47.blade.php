@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 47 – GDS + NDC Concept')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                GDS + NDC Concept
                <small class="text-muted">Automation & Modern System – Chapter 47</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>NDC (New Distribution Capability)</b> কী, কীভাবে এটি traditional <b>GDS</b>-এর সাথে কাজ করে, এবং agent-এর জন্য এর practical impact কী।
            </p>

            <div class="highlight-box">
                ⚠️ NDC content airline-controlled, traditional GDS fare থেকে আলাদা হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is NDC</h3>

            <p>
                NDC হলো IATA-এর তৈরি করা একটি modern XML-based distribution standard, যার মাধ্যমে airline সরাসরি agent ও OTA-কে rich content প্রদান করে।
            </p>

            <ul class="visa-list">
                <li>✔ Airline-controlled content</li>
                <li>✔ Dynamic pricing</li>
                <li>✔ Rich fare & ancillary display</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Difference: GDS vs NDC</h3>

            <ul class="visa-list">
                <li>✔ GDS = filed fare & ATPCO based</li>
                <li>✔ NDC = dynamic airline offer</li>
                <li>✔ NDC includes seat, bag, meal bundle</li>
            </ul>

            <div class="info-box">
                📌 NDC fare সবসময় cheaper না, কিন্তু more flexible।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. GDS with NDC Content</h3>

            <p>
                Modern GDS (Amadeus, Sabre, Travelport) এখন NDC content integrate করছে, যাতে agent single platform থেকে booking করতে পারে।
            </p>

            <ul class="visa-list">
                <li>✔ Hybrid GDS + NDC workflow</li>
                <li>✔ Airline direct offer display</li>
                <li>✔ Reduced airline surcharge</li>
            </ul>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. System Message Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
NDC OFFER AVAILABLE
AIRLINE DIRECT CONTENT DISPLAYED
ANCILLARY INCLUDED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ System shows airline-controlled NDC offer
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. NDC Booking Impact</h3>

            <ul class="visa-list">
                <li>✔ Fare rules may differ from GDS</li>
                <li>✔ Refund / change process airline-specific</li>
                <li>✔ Post-ticket servicing may be limited</li>
            </ul>

            <div class="highlight-box">
                ⚠️ NDC ticket issue করার আগে servicing limitation explain করুন।
            </div>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Real Agent Scenario</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Scenario Result</div>
                <pre class="gds-code">
NDC FARE SELECTED
SEAT + BAG INCLUDED
POST-TICKET CHANGE: AIRLINE ONLY
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Passenger gets bundled service ✔ Agent servicing scope limited
            </p>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        NDC বোঝা মানে future-ready agent হওয়া।
                        <b>Trip Designer</b> শেখায় GDS + NDC hybrid booking, airline direct content handling এবং servicing limitation management।
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
                <li>✔ NDC vs GDS fare difference explain করুন</li>
                <li>✔ Post-ticket service limitation clarify করুন</li>
                <li>✔ Corporate client-এর জন্য NDC suitability evaluate করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/46') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/48') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection