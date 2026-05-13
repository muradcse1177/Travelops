@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 25 – E-Ticket Issue')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                E-Ticket Issue
                <small class="text-muted">PNR Creation – Final Step (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে একটি
                <b>complete PNR</b> থেকে
                <b>E-Ticket issue</b> করতে হয়। 👉 এটি হলো <b>PNR Creation-এর শেষ ও সবচেয়ে sensitive ধাপ</b>।
            </p>

            <div class="highlight-box">
                ⚠️ Ticket issue করার পর বেশিরভাগ ক্ষেত্রে change / cancel penalty apply হয়। তাই issue করার আগে সব কিছু double check করা mandatory।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Ticket Issue করার আগে Checklist
            </h3>

            <ul class="visa-list">
                <li>✔ Passenger name passport অনুযায়ী correct</li>
                <li>✔ Segment status HK confirmed</li>
                <li>✔ TTL valid আছে</li>
                <li>✔ Pricing stored & verified</li>
                <li>✔ SSR (DOCS, meal, seat) added</li>
            </ul>

            <div class="info-box">
                📌 Checklist skip করলে ADM বা airline dispute হতে পারে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Galileo – E-Ticket Issue
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Store Pricing</div>
                <pre class="gds-code">
FQ
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Issue Command</div>
                <pre class="gds-code">
TKP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Result</div>
                <pre class="gds-code">
TKT 176-1234567890 ISSUED
        </pre>
            </div>

            <p class="text-secondary">
                • TKP = Ticket & Print
                <br>• 176 = Airline code
                <br>• Ticket number generated
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Sabre – E-Ticket Issue
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Store Pricing</div>
                <pre class="gds-code">
WP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Issue Command</div>
                <pre class="gds-code">
W‡ET
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Result</div>
                <pre class="gds-code">
TICKET NUMBER 1761234567890
        </pre>
            </div>

            <p class="text-secondary">
                • W‡ET = Sabre E-Ticket Issue
                <br>• Electronic ticket issued successfully
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Amadeus – E-Ticket Issue
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Store Pricing</div>
                <pre class="gds-code">
FXP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Issue Command</div>
                <pre class="gds-code">
TTP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Ticket Result</div>
                <pre class="gds-code">
OK ETICKET 176-1234567890
        </pre>
            </div>

            <p class="text-secondary">
                • TTP = Ticket To Print
                <br>• ETKT status = confirmed
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Ticket Issue-এর পর কী Check করবেন
            </h3>

            <ul class="visa-list">
                <li>✔ Ticket number generated হয়েছে</li>
                <li>✔ Segment status HK → TK</li>
                <li>✔ E-Ticket receipt sent to passenger</li>
                <li>✔ BSP / sales report updated</li>
            </ul>

            <div class="info-box">
                📌 Ticket issue মানেই process শেষ নয় — verification mandatory।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Last moment ticket issue avoid করুন</li>
                <li>✔ Payment confirm না হলে ticket issue করবেন না</li>
                <li>✔ Ticket issue করার আগে passenger reconfirm নিন</li>
                <li>✔ Refund & change rule আগেই explain করুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        E-Ticket Issue হলো agent career-এর সবচেয়ে sensitive responsibility।
                        <b>Trip Designer</b> শেখায় zero-error ticketing real GDS practice সহ।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/24') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/26') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection