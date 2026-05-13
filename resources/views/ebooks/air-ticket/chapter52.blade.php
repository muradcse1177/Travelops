@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 52 – Reissue & Refund Case Study')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Reissue & Refund Case Study
                <small class="text-muted">Practical Case Study – Chapter 52</small>
            </h2>

            <p>
                এই অধ্যায়ে একটি
                <b>Real Reissue & Refund</b> case study দেওয়া হয়েছে, যেখানে passenger change request থেকে final system result পর্যন্ত পুরো workflow দেখানো হয়েছে।
            </p>

            <div class="highlight-box">
                ⚠️ Reissue বা Refund ভুল হলে ADM, penalty ও revenue loss হয়।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Case Scenario</h3>

            <ul class="visa-list">
                <li>✔ Ticket Type: International</li>
                <li>✔ Airline: EK (Emirates)</li>
                <li>✔ Passenger: Adult (1)</li>
                <li>✔ Issue: Date change request</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Original Ticket Details</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Display</div>
                <pre class="gds-code">
TICKET NO: 176-9876543210
ROUTE: DAC-DXB-LHR
FARE: USD 650
STATUS: OPEN
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Ticket unused ✔ Reissue eligible
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Reissue – Availability Check</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
A25SEPDACDXB
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
EK 585 Y 25SEP DACDXB
SEATS AVAILABLE
    </pre>
            </div>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Reissue Pricing</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
NEW FARE: USD 700
CHANGE FEE: USD 100
FARE DIFFERENCE: USD 50
TOTAL COLLECT: USD 150
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Fare recalculated ✔ Penalty applied
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Reissue Ticket</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
TTP/EXCH
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
TICKET REISSUED
NEW TICKET NO: 176-1122334455
    </pre>
            </div>

            <div class="highlight-box">
                ✔ Reissue completed successfully
            </div>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Refund Case Scenario</h3>

            <ul class="visa-list">
                <li>✔ Passenger cancels journey</li>
                <li>✔ Ticket partially unused</li>
                <li>✔ Airline refund rule applies</li>
            </ul>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Refund Calculation</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Refund Result</div>
                <pre class="gds-code">
ORIGINAL TOTAL: USD 830
REFUND PENALTY: USD 200
REFUND AMOUNT: USD 630
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Refund penalty deducted ✔ Net refund calculated
            </p>

            <!-- ================= SECTION 8 ================= -->
            <h3 class="section-heading">8. Refund Process</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
TRF
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
REFUND PROCESSED
STATUS: PENDING AIRLINE APPROVAL
    </pre>
            </div>

            <div class="info-box">
                📌 Refund settlement BSP cycle অনুযায়ী complete হয়।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Reissue ও Refund handling হলো advanced ticketing skill।
                        <b>Trip Designer</b> শেখায় penalty calculation, exchange logic এবং BSP-compliant refund workflow।
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

            <!-- ================= SECTION 9 ================= -->
            <h3 class="section-heading">9. Agent Learning Outcome</h3>

            <ul class="visa-list">
                <li>✔ Reissue vs Refund difference</li>
                <li>✔ Penalty & fare difference logic</li>
                <li>✔ Airline & BSP compliance</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/51') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/53') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection