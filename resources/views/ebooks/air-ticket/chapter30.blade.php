@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 30 – Multi-City & Open Jaw')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Multi-City & Open Jaw
                <small class="text-muted">Advanced Ticketing – Chapter 30</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে
                <b>Multi-City</b> এবং <b>Open Jaw</b> itinerary বিভিন্ন GDS-এ build করতে হয় এবং system response কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Multi-City ও Open Jaw booking সবসময় airline fare rule ও routing validation-এর উপর নির্ভরশীল।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Multi-City Concept</h3>

            <ul class="visa-list">
                <li>✔ Two-এর বেশি flight segment</li>
                <li>✔ Different travel dates allowed</li>
                <li>✔ Single PNR, single ticket</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Open Jaw Concept</h3>

            <ul class="visa-list">
                <li>✔ Arrival city ≠ return departure city</li>
                <li>✔ Surface sector passenger নিজে arrange করে</li>
                <li>✔ Fare rule must allow Open Jaw</li>
            </ul>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Multi-City Sell</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
AUGDAC10SEP
AUGBKK15SEP
BKKDAC20SEP
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SEGMENTS CONFIRMED
DAC-BKK 10SEP HK
BKK-DAC 20SEP HK
STATUS: OK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ All segments HK status ✔ Multi-city itinerary successfully built
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Multi-City Sell</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
110SEP DACBKK
115SEP BKKHKG
120SEP HKGDAC
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SELL COMPLETED
ALL SEGMENTS CONFIRMED
STATUS: HK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre sequential segment sell successful ✔ PNR ready for pricing
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – Multi-City Sell</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
AN10SEPDACBKK
AN15SEPBKKHKG
AN20SEPHKGDAC
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
MULTI-SEGMENT ITINERARY DISPLAYED
ALL FLIGHTS AVAILABLE
STATUS: CONFIRMED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus itinerary correctly constructed
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Pricing & Validation Result</h3>

            <ul class="visa-list">
                <li>✔ Auto pricing successful</li>
                <li>✔ Mileage & routing validated</li>
                <li>✔ Ticketable itinerary generated</li>
            </ul>

            <div class="info-box">
                📌 Open Jaw pricing সাধারণ return fare-এর তুলনায় বেশি হতে পারে।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Multi-City ও Open Jaw itinerary handling advanced ticketing-এর একটি গুরুত্বপূর্ণ skill।
                        <b>Trip Designer</b> শেখায় real GDS result বুঝে correct routing ও pricing practice।
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
                <li>✔ Surface sector passenger-কে clearly explain করুন</li>
                <li>✔ Pricing failure হলে routing recheck করুন</li>
                <li>✔ Ticket issue-এর আগে HK status verify করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/29') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/31') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection