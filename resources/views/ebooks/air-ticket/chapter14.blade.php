@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 14 – Waitlist & Overbooking')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Waitlist & Overbooking
                <small class="text-muted">Flight Availability & Schedule – Chapter 14</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Waitlist (WL)</b> এবং <b>Overbooking</b> কী, কখন WL status আসে, এবং GDS system response কেমন দেখায়।
            </p>

            <div class="highlight-box">
                ⚠️ Waitlisted segment ticket issue করা যায় না যতক্ষণ না HK confirm হয়।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Waitlist (WL)</h3>

            <p>
                Waitlist মানে হলো নির্দিষ্ট booking class-এ seat confirm নেই, কিন্তু airline future availability অনুযায়ী confirm করতে পারে।
            </p>

            <ul class="visa-list">
                <li>✔ Booking status = WL</li>
                <li>✔ Seat not confirmed</li>
                <li>✔ Airline control required</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. What is Overbooking</h3>

            <p>
                Overbooking হলো airline-এর একটি revenue strategy, যেখানে airline actual seat-এর চেয়ে বেশি seat sell করে।
            </p>

            <ul class="visa-list">
                <li>✔ Airline controlled</li>
                <li>✔ No guarantee of travel</li>
                <li>✔ Passenger handling policy applies</li>
            </ul>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Waitlist Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
N1Y1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
1 EK 585 Y DACDXB 15SEP WL1
    </pre>
            </div>

            <p class="text-secondary">
                ✔ WL1 = 1 seat waitlisted ✔ Airline confirmation pending
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Waitlist Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
01Y1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
1 EK 585 Y DACDXB WL1
STATUS: WAITLIST
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre WL status clearly shows pending seat
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – Waitlist Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SS1Y1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SS1Y1
STATUS: WL
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus WL segment created successfully
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Waitlist to Confirmed (WL → HK)</h3>

            <p>
                Airline seat release করলে waitlist segment automatically অথবা manually <b>HK</b> তে convert হয়।
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
STATUS CHANGED
WL → HK
SEAT CONFIRMED
    </pre>
            </div>

            <div class="info-box">
                📌 HK না হলে ticket issue করবেন না।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Waitlist ও Overbooking handling একজন professional agent-এর judgement skill পরীক্ষা করে।
                        <b>Trip Designer</b> শেখায় real GDS response বুঝে correct passenger advisory।
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
                <li>✔ WL passenger-কে clear explanation দিন</li>
                <li>✔ Alternate flight option রাখুন</li>
                <li>✔ Queue monitor করুন for WL clearance</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/13') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/15') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection