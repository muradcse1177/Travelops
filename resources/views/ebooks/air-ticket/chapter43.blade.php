@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 43 – Queue Management')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Queue Management
                <small class="text-muted">Queue & Back Office – Chapter 43</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>GDS Queue</b> কী, কেন queue ব্যবহার করা হয়, এবং Galileo, Sabre ও Amadeus-এ queue handle করলে system result কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Queue miss করলে schedule change, TKTL expiry বা revenue loss হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Queue</h3>

            <p>
                Queue হলো GDS-এর automated work tray, যেখানে pending PNR গুলো future action-এর জন্য রাখা হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Schedule change</li>
                <li>✔ Ticket time limit (TKTL)</li>
                <li>✔ Airline message / OSI</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Types of Queues</h3>

            <ul class="visa-list">
                <li>✔ Airline Queue</li>
                <li>✔ Agency Queue</li>
                <li>✔ Office ID specific Queue</li>
            </ul>

            <div class="info-box">
                📌 Every queue has a queue number & category।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Queue Place</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
QP/12
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PNR PLACED ON QUEUE 12
CATEGORY: GENERAL
STATUS: SUCCESS
    </pre>
            </div>

            <p class="text-secondary">
                ✔ PNR successfully placed on queue
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Galileo – Queue Remove</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
QR
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PNR REMOVED FROM QUEUE
STATUS: CLEARED
    </pre>
            </div>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Sabre – Queue Management</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
Q/12
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
QUEUE 12 ACTIVE
PNR DISPLAYED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre shows PNR waiting for action
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Amadeus – Queue Management</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
QS12
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
QUEUE 12 OPEN
PNR READY FOR PROCESSING
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus queue accessed successfully
            </p>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Common Queue Actions</h3>

            <ul class="visa-list">
                <li>✔ Update PNR</li>
                <li>✔ Issue / reissue ticket</li>
                <li>✔ Contact passenger</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Queue follow-up delay মানে missed service।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Queue management হলো back-office efficiency-এর backbone।
                        <b>Trip Designer</b> শেখায় real GDS queue workflow, airline-triggered queue handling এবং professional follow-up system।
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
                <li>✔ Queue daily monitor করুন</li>
                <li>✔ TKTL & schedule change queue priority দিন</li>
                <li>✔ Action complete হলে queue clear করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/42') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/44') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection