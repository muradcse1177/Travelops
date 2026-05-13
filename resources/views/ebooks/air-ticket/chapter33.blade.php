@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 33 – Corporate & Tour Code Fare')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Corporate & Tour Code Fare
                <small class="text-muted">Advanced Ticketing – Chapter 33</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে
                <b>Corporate</b> ও <b>Tour Code</b> fare ব্যবহার করে negotiated pricing apply করতে হয় এবং GDS-এ তার real system result কেমন দেখায়।
            </p>

            <div class="highlight-box">
                ⚠️ Corporate / Tour Code ভুল হলে airline ADM issue করতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Corporate Fare – Galileo</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ/CORP
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTE - CORPORATE
TOTAL AMOUNT: BDT 48,500
FARE BASIS: YCORP
STATUS: VALID
    </pre>
            </div>

            <p class="text-secondary">
                ✔ System corporate agreement validate করেছে ✔ Discounted fare applied successfully
            </p>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Tour Code Fare – Galileo</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ/T-TOUR123
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTE WITH TOUR CODE
TOUR CODE: TOUR123
ENDORSEMENT REQUIRED
STATUS: OK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Tour code accepted ✔ Ticket endorsement mandatory
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Corporate Fare – Sabre</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WPCORP
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PRICE QUOTE - CORPORATE
BASE FARE: USD 420
TOTAL TAX: USD 85
TOTAL: USD 505
STATUS: GUARANTEED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Corporate profile applied ✔ Fare guaranteed for ticketing
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Tour Code Fare – Sabre</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WPTC-TOUR123
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PRICE QUOTE WITH TOUR CODE
TOUR CODE: TOUR123
ENDORSEMENT PRINT REQUIRED
STATUS: OK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Tour code accepted ✔ Endorsement must print on ticket
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Corporate Fare – Amadeus</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FXP/R,U*CORP
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTATION
CORPORATE AGREEMENT APPLIED
TOTAL: USD 498.20
TICKETING ALLOWED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Corporate agreement validated ✔ Ticketable fare generated
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Tour Code Fare – Amadeus</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FXP/R,U*TOUR
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTATION WITH TOUR CODE
TOUR CODE: TOUR123
ENDORSEMENT REQUIRED
STATUS: TICKETABLE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Tour code accepted ✔ Endorsement mandatory
            </p>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Corporate ও Tour Code fare handling ভুল হলে airline ADM এবং revenue loss হতে পারে।
                        <b>Trip Designer</b> শেখায় real GDS result বুঝে safe ticketing practice।
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
                <li>✔ System result না দেখলে ticket issue করবেন না</li>
                <li>✔ Endorsement text অবশ্যই verify করুন</li>
                <li>✔ BSP audit-এ corporate/tour fare সবচেয়ে sensitive</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/32') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/34') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>
        <div id="footer"></div>
@endsection