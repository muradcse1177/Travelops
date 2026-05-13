@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 29 – Involuntary Change (IRROP)')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Involuntary Change (IRROP)
                <small class="text-muted">Ticketing Operations – Step 4 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Involuntary Change (IRROP)</b> কী, কোন কোন situation-এ IRROP apply হয়, airline কী সুবিধা দেয় passenger-কে এবং agent হিসেবে কীভাবে professionally handle করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ IRROP case ভুলভাবে handle করলে airline dispute ও passenger dissatisfaction তৈরি হয়।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> IRROP কী?
            </h3>

            <p>
                <b>IRROP (Irregular Operation)</b> মানে— airline-এর কারণে flight schedule
                <b>cancel / delay / change</b> হওয়া, যেখানে passenger-এর কোনো fault নেই।
            </p>

            <p class="text-secondary">
                Common IRROP cases:
                <br>• Flight cancellation
                <br>• Major schedule change
                <br>• Aircraft change
                <br>• Misconnection due to delay
            </p>

            <div class="info-box">
                📌 IRROP = airline responsibility।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> IRROP হলে Passenger Rights
            </h3>

            <ul class="visa-list">
                <li>✔ Free rebooking (same airline)</li>
                <li>✔ Free rerouting (partner airline)</li>
                <li>✔ Penalty-free reissue</li>
                <li>✔ Full refund option (if not travelled)</li>
            </ul>

            <div class="info-box">
                📌 IRROP-এ penalty apply হয় না।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Galileo – IRROP Handling
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Schedule Change Display</div>
                <pre class="gds-code">
*SC
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Example Result</div>
                <pre class="gds-code">
SCHG FLT EK585 CANCELLED
        </pre>
            </div>

            <p class="text-secondary">
                • SCHG = Schedule Change
                <br>• Airline initiated
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Rebook (Free)</div>
                <pre class="gds-code">
SB
        </pre>
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Sabre – IRROP Handling
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Schedule Change Display</div>
                <pre class="gds-code">
*SC
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Example Result</div>
                <pre class="gds-code">
INVOL CHANGE – FLIGHT CANCELLED
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Free Rebook</div>
                <pre class="gds-code">
WC‡ER
        </pre>
            </div>

            <p class="text-secondary">
                Sabre IRROP-এ waiver code auto apply হয়।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Amadeus – IRROP Handling
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Schedule Change Display</div>
                <pre class="gds-code">
RT
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Example Result</div>
                <pre class="gds-code">
INVOL REROUTING PERMITTED
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Penalty-Free Reissue</div>
                <pre class="gds-code">
TTP/EXCH/INVOL
        </pre>
            </div>

            <p class="text-secondary">
                INVOL keyword penalty override করে।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> IRROP vs Voluntary Change
            </h3>

            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>Point</th>
                        <th>IRROP</th>
                        <th>Voluntary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Reason</td>
                        <td>Airline fault</td>
                        <td>Passenger request</td>
                    </tr>
                    <tr>
                        <td>Penalty</td>
                        <td>No</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Fare Difference</td>
                        <td>Usually waived</td>
                        <td>Applicable</td>
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
                <li>✔ Passenger-কে calm করে explain করুন</li>
                <li>✔ Airline waiver policy check করুন</li>
                <li>✔ Invol keyword correctly use করুন</li>
                <li>✔ All communication document করুন</li>
            </ul>

            <div class="info-box">
                📌 IRROP case professional handling agency reputation বাড়ায়।
            </div>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        IRROP situation-এ agent হলো passenger-এর lifeline। Correct handling মানেই trust & retention।
                        <b>Trip Designer</b> শেখায় real-life IRROP handling airline waiver logic সহ।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/28') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/30') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection