@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 49 – Automation & Speed Booking')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Automation & Speed Booking
                <small class="text-muted">Automation & Modern System – Chapter 49</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Automation</b> কীভাবে air ticketing-এ কাজ করে,
                <b>Speed Booking</b> কেন জরুরি, এবং modern GDS/system automation ব্যবহার করলে system result কেমন হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Automation speed বাড়ায়, কিন্তু rule violation করলে ADM risk বাড়ে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Automation in Ticketing</h3>

            <p>
                Automation মানে manual কাজ কমিয়ে system-driven process ব্যবহার করে দ্রুত ও accurate booking করা।
            </p>

            <ul class="visa-list">
                <li>✔ Auto pricing</li>
                <li>✔ Script / shortcut command</li>
                <li>✔ Template-based PNR creation</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Why Speed Booking Matters</h3>

            <ul class="visa-list">
                <li>✔ Fare changes quickly</li>
                <li>✔ Seat inventory limited</li>
                <li>✔ Corporate SLA requirement</li>
            </ul>

            <div class="info-box">
                📌 Faster booking = higher conversion & customer satisfaction।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Automated Pricing</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
AUTO PRICING SUCCESSFUL
LOWEST FARE SELECTED
READY FOR TICKETING
    </pre>
            </div>

            <p class="text-secondary">
                ✔ System auto-selects best fare ✔ Manual calculation avoided
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Speed Booking Feature</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Message</div>
                <pre class="gds-code">
INTELLIGENT SELL APPLIED
PNR CREATED IN FAST MODE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre reduces steps using smart workflow
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – Automated Workflow</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
AUTOMATED PROCESS ENABLED
PNR COMPLETED WITH MINIMUM INPUT
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus automation speeds up booking
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Risk of Over-Automation</h3>

            <ul class="visa-list">
                <li>✔ Fare rule skipped</li>
                <li>✔ Wrong passenger type</li>
                <li>✔ SSR / OSI missing</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Automation ≠ No verification।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Automation ও Speed Booking modern ticketing agent-এর survival skill।
                        <b>Trip Designer</b> শেখায় fast booking techniques, automation risk control এবং airline-compliant workflow।
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
                <li>✔ Automation + manual check balance রাখুন</li>
                <li>✔ Fare rule & SSR verify করুন</li>
                <li>✔ Speed-এর চেয়ে accuracy prioritize করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/48') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/50') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection