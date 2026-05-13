@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 23 – SSR & OSI')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                SSR & OSI
                <small class="text-muted">PNR Creation – Chapter 23</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>SSR (Special Service Request)</b> এবং
                <b>OSI (Other Service Information)</b>-এর পার্থক্য, কখন কোনটা ব্যবহার করতে হয় এবং GDS system response কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Wrong SSR add করলে airline rejection বা ADM risk থাকে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is SSR</h3>

            <p>
                SSR হলো airline-কে পাঠানো বাধ্যতামূলক service request, যা airline confirm বা reject করতে পারে।
            </p>

            <ul class="visa-list">
                <li>✔ Seat / Meal request</li>
                <li>✔ Wheelchair / Medical</li>
                <li>✔ Passport / DOCS info</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. What is OSI</h3>

            <p>
                OSI হলো airline-এর জন্য informational message, যেটার confirmation দরকার হয় না।
            </p>

            <ul class="visa-list">
                <li>✔ Informational only</li>
                <li>✔ No confirmation required</li>
                <li>✔ Airline may ignore</li>
            </ul>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – SSR Add</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
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
                ✔ Meal request accepted ✔ HK status = confirmed
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Galileo – OSI Add</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.OSI EK PAX PREFERS AISLE SEAT
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
OSI MESSAGE SENT TO AIRLINE
NO CONFIRMATION REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Informational message only ✔ No HK/WL status
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Sabre – SSR & OSI</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">SSR Command</div>
                <pre class="gds-code">
3VGML
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR VGML ADDED
STATUS: HK
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">OSI Command</div>
                <pre class="gds-code">
5OSI YY PAX SPEAKS ENGLISH
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre clearly separates SSR and OSI
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Amadeus – SSR & OSI</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">SSR Command</div>
                <pre class="gds-code">
SR VGML EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR VGML CONFIRMED
STATUS: HK
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">OSI Command</div>
                <pre class="gds-code">
OS EK PAX HAS IMPORTANT MEETING
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus SSR airline-controlled ✔ OSI informational only
            </p>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Verification & Best Practice</h3>

            <ul class="visa-list">
                <li>✔ SSR status must be HK before ticketing</li>
                <li>✔ OSI never guarantees service</li>
                <li>✔ Medical SSR early add mandatory</li>
            </ul>

            <div class="info-box">
                📌 SSR confirm না হলে passenger expectation manage করা জরুরি।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        SSR ও OSI সঠিকভাবে ব্যবহার করতে পারা একজন professional ticketing agent-এর সবচেয়ে গুরুত্বপূর্ণ skill।
                        <b>Trip Designer</b> শেখায় real GDS response বুঝে airline-compliant PNR handling।
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

            <!-- ================= SECTION 8 ================= -->
            <h3 class="section-heading">8. Professional Agent Tips</h3>

            <ul class="visa-list">
                <li>✔ SSR vs OSI difference passenger-কে explain করুন</li>
                <li>✔ Critical SSR early add করুন</li>
                <li>✔ Ticket issue-এর আগে SSR status check করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/22') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/24') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection