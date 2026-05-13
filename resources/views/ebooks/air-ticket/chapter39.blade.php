@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 39 – UMNR (Unaccompanied Minor)')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                UMNR (Unaccompanied Minor)
                <small class="text-muted">Special Passenger Handling – Chapter 39</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>UMNR (Unaccompanied Minor)</b> কী, কোন বয়সে UMNR লাগে, এবং GDS-এ UMNR add করলে system result কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ UMNR handling ভুল হলে airline boarding deny করতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is UMNR</h3>

            <p>
                UMNR হলো সেই child passenger যে কোনো adult companion ছাড়া একাই travel করে।
            </p>

            <ul class="visa-list">
                <li>✔ Age usually 5–11 years</li>
                <li>✔ Airline supervision required</li>
                <li>✔ Special handling & fee applicable</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. UMNR Airline Rules (General)</h3>

            <ul class="visa-list">
                <li>✔ Mandatory UMNR SSR</li>
                <li>✔ Guardian details required</li>
                <li>✔ UMNR fee collected separately</li>
            </ul>

            <div class="info-box">
                📌 Connecting flight-এ UMNR restriction থাকতে পারে।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – UMNR SSR Add</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.P1/SSR UMNR EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR UMNR ADDED
STATUS: HK1
SPECIAL HANDLING REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ UMNR request accepted ✔ Airline supervision confirmed
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – UMNR SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
3UMNR
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR UMNR CONFIRMED
STATUS: HK
UMNR FEE APPLICABLE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre UMNR SSR confirmed
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – UMNR SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SR UMNR EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
UMNR SERVICE CONFIRMED
STATUS: HK
DOCUMENTATION REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus UMNR service confirmed
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Required Documents & Details</h3>

            <ul class="visa-list">
                <li>✔ Parent/Guardian consent form</li>
                <li>✔ Pickup & drop-off person details</li>
                <li>✔ Emergency contact number</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Incomplete documents হলে UMNR boarding denied হতে পারে।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        UMNR handling হলো agent-এর সবচেয়ে sensitive দায়িত্বগুলোর একটি।
                        <b>Trip Designer</b> শেখায় airline-compliant UMNR booking, SSR handling এবং real GDS system result।
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
                <li>✔ Direct flight prefer করুন UMNR-এর জন্য</li>
                <li>✔ UMNR fee passenger-কে আগে explain করুন</li>
                <li>✔ Airport supervision process explain করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/38') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/40') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection