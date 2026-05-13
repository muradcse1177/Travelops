@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 24 – Seat, Meal & Special Request')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Seat, Meal & Special Request
                <small class="text-muted">PNR Creation – Chapter 24</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে passenger-এর জন্য
                <b>Seat selection</b>, <b>Meal request</b> এবং
                <b>Special Service Request (SSR)</b> সঠিকভাবে add করতে হয় এবং GDS system result কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Seat বা Meal ভুলভাবে add করলে passenger dissatisfaction ও airline complaint হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Seat Request – Basic Concept</h3>

            <ul class="visa-list">
                <li>✔ Free & Paid seat airline dependent</li>
                <li>✔ Exit row eligibility check mandatory</li>
                <li>✔ Seat confirmation status verify করতে হবে</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Galileo – Seat Request</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.P1/SSR ST EK HK1 12A
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR ST SEAT 12A
STATUS: HK1
CONFIRMED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Seat 12A confirmed ✔ HK status = seat assigned
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Sabre – Seat Request</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
4G1/12A
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SEAT REQUEST ACCEPTED
SEAT NUMBER: 12A
STATUS: CONFIRMED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre seat map confirms seat assignment
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Amadeus – Seat Request</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
ST/12A
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SEAT 12A ASSIGNED
STATUS: HK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus seat confirmed successfully
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Meal Request (SSR)</h3>

            <p>
                Meal request সবসময়
                <b>Special Service Request (SSR)</b> হিসেবে add করা হয়।
            </p>

            <ul class="visa-list">
                <li>✔ VGML – Vegetarian</li>
                <li>✔ AVML – Asian Veg</li>
                <li>✔ CHML – Child Meal</li>
                <li>✔ DBML – Diabetic Meal</li>
            </ul>

            <!-- GALILEO -->
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Galileo – Meal Command</div>
                <pre class="gds-code">
SI.P1/SSR VGML EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR VGML CONFIRMED
STATUS: HK1
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Meal request accepted by airline
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Special Assistance Requests</h3>

            <ul class="visa-list">
                <li>✔ WCHR – Wheelchair (Ramp)</li>
                <li>✔ WCHS – Wheelchair (Steps)</li>
                <li>✔ WCHC – Wheelchair (Cabin)</li>
                <li>✔ BLND – Blind passenger</li>
            </ul>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Wheelchair SSR</div>
                <pre class="gds-code">
SR WCHR EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR WCHR CONFIRMED
STATUS: HK
    </pre>
            </div>

            <div class="info-box">
                📌 Medical / wheelchair SSR যত দ্রুত add করবেন, service guarantee তত বেশি।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Seat, Meal ও Special Request handling passenger satisfaction-এর সবচেয়ে বড় factor।
                        <b>Trip Designer</b> শেখায় airline-compliant SSR handling with real GDS system result।
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
                <li>✔ Paid seat আগে passenger-কে inform করুন</li>
                <li>✔ Meal request departure-এর 24–48h আগে add করুন</li>
                <li>✔ HK status ছাড়া service promise করবেন না</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/23') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/25') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection