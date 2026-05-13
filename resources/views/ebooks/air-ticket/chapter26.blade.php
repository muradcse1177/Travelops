@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 26 – Void Ticket')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Void Ticket
                <small class="text-muted">Ticketing Operations – Step 1 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Void Ticket</b> কী, কখন ticket void করা যায়, এবং বিভিন্ন GDS-এ কীভাবে correctly void করতে হয়। 👉 Void হলো <b>same-day correction</b> process।
            </p>

            <div class="highlight-box">
                ⚠️ Void window miss করলে refund process লাগবে এবং penalty apply হতে পারে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Void Ticket কী?
            </h3>

            <p>
                <b>Void Ticket</b> মানে— ticket issue হওয়ার <b>same business day</b>-এর মধ্যে ticket cancel করা, যাতে BSP-তে sale report না যায়।
            </p>

            <p class="text-secondary">
                Void করলে:
                <br>• Ticket number invalid হয়
                <br>• BSP sales report-এ include হয় না
                <br>• Refund penalty লাগে না
            </p>

            <div class="info-box">
                📌 Void ≠ Refund. Void শুধু same-day allowed।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Void করার Common Reasons
            </h3>

            <ul class="visa-list">
                <li>✔ Passenger name spelling mistake</li>
                <li>✔ Wrong fare / pricing</li>
                <li>✔ Duplicate ticket issue</li>
                <li>✔ Payment failure</li>
            </ul>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Galileo – Void Ticket
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Display</div>
                <pre class="gds-code">
*HTE
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Void Command</div>
                <pre class="gds-code">
TV
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Void Result</div>
                <pre class="gds-code">
TICKET VOIDED
176-1234567890
        </pre>
            </div>

            <p class="text-secondary">
                • TV = Ticket Void
                <br>• Only same-day allowed
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Sabre – Void Ticket
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Display</div>
                <pre class="gds-code">
*T
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Void Command</div>
                <pre class="gds-code">
WV
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Void Result</div>
                <pre class="gds-code">
ETKT VOIDED
1761234567890
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ WV = Void ticket
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Amadeus – Void Ticket
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Display</div>
                <pre class="gds-code">
TWD
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Void Command</div>
                <pre class="gds-code">
TRDC
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Void Result</div>
                <pre class="gds-code">
OK ETKT VOIDED
176-1234567890
        </pre>
            </div>

            <p class="text-secondary">
                • TRDC = Transaction Record Delete & Cancel
                <br>• Same-day only
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Void vs Refund
            </h3>

            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>Point</th>
                        <th>Void</th>
                        <th>Refund</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Time Limit</td>
                        <td>Same Day</td>
                        <td>After Day End</td>
                    </tr>
                    <tr>
                        <td>Penalty</td>
                        <td>No</td>
                        <td>Yes (as per rule)</td>
                    </tr>
                    <tr>
                        <td>BSP Report</td>
                        <td>Not Included</td>
                        <td>Included</td>
                    </tr>
                </tbody>
            </table>

            <!-- ========================================================= -->
            <!-- SECTION 7 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">7.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Day end-এর আগে void complete করুন</li>
                <li>✔ Void confirmation check করুন</li>
                <li>✔ Passenger-কে void vs refund explain করুন</li>
                <li>✔ Void misuse করলে airline audit issue হতে পারে</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Void ticket সঠিকভাবে handle না করলে BSP mismatch ও audit issue হয়।
                        <b>Trip Designer</b> শেখায় airline-compliant void handling real GDS practice সহ।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/25') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/27') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection