@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 34 – EMD & Ancillary Services')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                EMD & Ancillary Services
                <small class="text-muted">Advanced Ticketing – Chapter 34</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে
                <b>EMD (Electronic Miscellaneous Document)</b> ব্যবহার করে Seat, Meal, Baggage, Lounge ইত্যাদি
                <b>Ancillary Services</b> issue করতে হয় এবং GDS system result কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ EMD issue ভুল হলে airline revenue loss এবং ADM হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is EMD</h3>

            <ul class="visa-list">
                <li>✔ Electronic Miscellaneous Document</li>
                <li>✔ Paid ancillary service collection</li>
                <li>✔ Linked with e-ticket or standalone</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Common Ancillary Services</h3>

            <ul class="visa-list">
                <li>✔ Paid Seat</li>
                <li>✔ Extra Baggage</li>
                <li>✔ Paid Meal</li>
                <li>✔ Lounge Access</li>
            </ul>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – EMD Issue</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
EMD
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
EMD CREATED SUCCESSFULLY
SERVICE: EXTRA BAGGAGE
AMOUNT: BDT 6,000
STATUS: ISSUED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ EMD successfully issued ✔ Service linked with ticket
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – EMD Issue</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WEMD
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
EMD ISSUED
RFIC: C
SERVICE: PAID SEAT
TOTAL: USD 35
STATUS: CONFIRMED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre EMD linked to passenger ✔ Service confirmed
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – EMD Issue</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
TMI/M1/EMD
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
EMD ASSOCIATED
SERVICE: MEAL VGML
AMOUNT: USD 20
STATUS: TICKETED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus EMD ticketed successfully ✔ Ancillary service activated
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Verification & Display</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Verification</div>
                <pre class="gds-code">
*TWD
*EMD
    </pre>
            </div>

            <div class="info-box">
                📌 EMD number display না হলে service active হবে না।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        EMD ও Ancillary Services handling advanced ticketing-এর সবচেয়ে sensitive অংশগুলোর একটি।
                        <b>Trip Designer</b> শেখায় real GDS result বুঝে safe EMD issuing practice।
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
                <li>✔ Paid service issue আগে passenger confirm নিন</li>
                <li>✔ Correct RFIC/RFISC check করুন</li>
                <li>✔ EMD issue-এর পর airline system verify করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/33') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/35') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection