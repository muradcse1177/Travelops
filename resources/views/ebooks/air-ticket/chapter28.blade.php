@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 28 – Partial & Full Refund')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Partial & Full Refund
                <small class="text-muted">Ticketing Operations – Step 3 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Refund</b> কী, কখন <b>Full Refund</b> ও কখন <b>Partial Refund</b> apply হয়, refund penalty কীভাবে calculate করতে হয় এবং বিভিন্ন GDS-এ refund process কীভাবে complete করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Wrong refund processing মানেই airline ADM ও revenue loss।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Refund কী?
            </h3>

            <p>
                <b>Refund</b> মানে— already issued ticket cancel করে airline fare rule অনুযায়ী passenger-কে টাকা ফেরত দেওয়া।
            </p>

            <p class="text-secondary">
                Refund depend করে:
                <br>• Fare rule
                <br>• Ticket usage status
                <br>• Voluntary / Involuntary
                <br>• Airline policy
            </p>

            <div class="info-box">
                📌 Refund always fare rule dependent।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Full Refund কখন হয়?
            </h3>

            <ul class="visa-list">
                <li>✔ Ticket unused</li>
                <li>✔ Airline involuntary cancellation</li>
                <li>✔ Schedule change airline fault</li>
                <li>✔ Medical / death case (document required)</li>
            </ul>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Partial Refund কখন হয়?
            </h3>

            <ul class="visa-list">
                <li>✔ Partially used ticket</li>
                <li>✔ Penalty applicable</li>
                <li>✔ No-show cases</li>
                <li>✔ Voluntary cancellation</li>
            </ul>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Galileo – Refund Process
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Display Ticket</div>
                <pre class="gds-code">
*HTE
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Refund Command</div>
                <pre class="gds-code">
TR
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Refund Result</div>
                <pre class="gds-code">
REFUND PROCESSED
PENALTY BDT 3000
NET REFUND BDT 22000
        </pre>
            </div>

            <p class="text-secondary">
                • TR = Ticket Refund
                <br>• Penalty auto deduct
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Sabre – Refund Process
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Display Ticket</div>
                <pre class="gds-code">
*T
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Refund Command</div>
                <pre class="gds-code">
WFR
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Refund Result</div>
                <pre class="gds-code">
REFUND AUTHORIZED
NET AMOUNT BDT22000
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ refund often airline authorization required।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Amadeus – Refund Process
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Display Ticket</div>
                <pre class="gds-code">
TWD
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Refund Command</div>
                <pre class="gds-code">
TRF
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Refund Result</div>
                <pre class="gds-code">
OK REFUND
PENALTY BDT3000
NET REFUND BDT22000
        </pre>
            </div>

            <p class="text-secondary">
                Amadeus refund process most transparent।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 7 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">7.</span> Refund Timeline & Payment
            </h3>

            <ul class="visa-list">
                <li>✔ BSP refund timeline: 7–21 working days</li>
                <li>✔ Card payment refund goes to original card</li>
                <li>✔ Cash refund agency responsibility</li>
            </ul>

            <div class="info-box">
                📌 Refund delay often airline approval dependent।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 8 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">8.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Refund request আগে penalty clearly explain করুন</li>
                <li>✔ Supporting documents collect করুন</li>
                <li>✔ Refund status follow-up করুন</li>
                <li>✔ Refund misuse করলে BSP audit issue হয়</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Refund handling হলো agent trust-এর বড় test। Wrong refund মানেই dispute ও loss।
                        <b>Trip Designer</b> শেখায় airline-compliant refund processing real GDS practice সহ।
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

            <!-- NAVIGATION -->
            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/27') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/29') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection