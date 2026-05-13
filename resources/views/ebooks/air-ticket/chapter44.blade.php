@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 44 – Schedule Change Queue')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Schedule Change Queue
                <small class="text-muted">Queue & Back Office – Chapter 44</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Schedule Change</b> কী, কেন PNR queue-তে আসে, এবং schedule change handle করলে GDS system result কেমন হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Schedule change ignore করলে passenger miss-connection ও complaint হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Schedule Change</h3>

            <p>
                Schedule change হলো airline কর্তৃক flight timing, flight number বা routing পরিবর্তন।
            </p>

            <ul class="visa-list">
                <li>✔ Departure time change</li>
                <li>✔ Flight number change</li>
                <li>✔ Cancellation or rerouting</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Why PNR Goes to Schedule Change Queue</h3>

            <ul class="visa-list">
                <li>✔ Airline updated schedule</li>
                <li>✔ Connection time mismatch</li>
                <li>✔ Flight cancelled</li>
            </ul>

            <div class="info-box">
                📌 Schedule change PNR always requires agent action।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Schedule Change Queue Access</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
QS/SC
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SCHEDULE CHANGE QUEUE OPEN
PNR REQUIRES REVIEW
    </pre>
            </div>

            <p class="text-secondary">
                ✔ PNR opened for schedule review
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Identify Schedule Change</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">PNR Display Result</div>
                <pre class="gds-code">
** SCHEDULE CHANGE **
ORIGINAL: EK585 10JUL DACDXB 10:25
NEW:      EK585 10JUL DACDXB 12:10
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Departure time changed by airline
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Sabre – Schedule Change Queue</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
Q/SC
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SCHEDULE CHANGE DETECTED
PNR ON ACTION QUEUE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre highlights affected PNR
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Amadeus – Schedule Change Handling</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
QN/SC
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PNR HAS SKED CHG
ACTION REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus flags schedule change clearly
            </p>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Agent Action After Schedule Change</h3>

            <ul class="visa-list">
                <li>✔ Inform passenger</li>
                <li>✔ Accept new schedule or rebook</li>
                <li>✔ Reissue ticket if required</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Passenger acceptance ছাড়া schedule change confirm করবেন না।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Schedule change handling হলো professional after-sales service-এর গুরুত্বপূর্ণ অংশ।
                        <b>Trip Designer</b> শেখায় airline-driven schedule change, queue workflow এবং correct passenger communication।
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
                <li>✔ Schedule change queue priority দিন</li>
                <li>✔ Passenger approval documented রাখুন</li>
                <li>✔ Change accept করার পর queue clear করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/43') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/45') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection