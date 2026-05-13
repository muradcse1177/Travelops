@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 41 – Wheelchair & SSR Codes')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Wheelchair & SSR Codes
                <small class="text-muted">Special Passenger Handling – Chapter 41</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Wheelchair passenger handling</b>, বিভিন্ন ধরনের <b>WCHR / WCHS / WCHC</b> SSR code, এবং GDS system-এ এর real response কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Wrong wheelchair SSR দিলে airline service failure হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Wheelchair SSR Overview</h3>

            <p>
                Wheelchair SSR ব্যবহার করা হয় mobility-impaired passenger-এর জন্য, যাতে airport ও airline proper assistance দিতে পারে।
            </p>

            <ul class="visa-list">
                <li>✔ Mobility assistance request</li>
                <li>✔ Airport & cabin support</li>
                <li>✔ Safety compliance</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Types of Wheelchair SSR Codes</h3>

            <ul class="visa-list">
                <li>✔ <b>WCHR</b> – Ramp assistance only</li>
                <li>✔ <b>WCHS</b> – Steps assistance</li>
                <li>✔ <b>WCHC</b> – Cabin seat assistance</li>
            </ul>

            <div class="info-box">
                📌 WCHC সবচেয়ে critical wheelchair category।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Wheelchair SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.P1/SSR WCHR EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR WCHR CONFIRMED
STATUS: HK1
RAMP ASSISTANCE REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Ramp assistance confirmed ✔ Passenger can walk stairs
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Wheelchair SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
3WCHS
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR WCHS ACCEPTED
STATUS: HK
STAIR ASSISTANCE REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Passenger cannot climb stairs ✔ Cabin movement possible
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – Wheelchair SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SR WCHC EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
WHEELCHAIR CABIN SERVICE CONFIRMED
STATUS: HK
FULL ASSISTANCE REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Passenger cannot walk at all ✔ Full assistance required
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Common Mistakes & Impact</h3>

            <ul class="visa-list">
                <li>✔ Wrong SSR code selection</li>
                <li>✔ Late wheelchair request</li>
                <li>✔ Incomplete passenger info</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Wrong SSR = service delay & passenger complaint।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Wheelchair SSR handling সঠিকভাবে করতে পারা একজন professional agent-এর গুরুত্বপূর্ণ skill।
                        <b>Trip Designer</b> শেখায় real-life wheelchair cases, airline SSR policy এবং GDS system response।
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
                <li>✔ Passenger mobility clearly assess করুন</li>
                <li>✔ Correct WCHR/WCHS/WCHC select করুন</li>
                <li>✔ Wheelchair SSR early add করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/40') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/42') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection