@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 22 – Ticket Time Limit (TTL)')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Ticket Time Limit (TTL)
                <small class="text-muted">PNR Creation – Step 3 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Ticket Time Limit (TTL)</b> কী, কেন TTL গুরুত্বপূর্ণ, এবং বিভিন্ন GDS-এ TTL কীভাবে set ও check করতে হয়। 👉 TTL হলো PNR-এর <b>lifeline</b>।
            </p>

            <div class="highlight-box">
                ⚠️ TTL miss করলে PNR auto-cancel হয়ে যেতে পারে এবং seat lost হবে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Ticket Time Limit (TTL) কী?
            </h3>

            <p>
                <b>Ticket Time Limit</b> মানে— airline কত সময় পর্যন্ত seat hold করে রাখবে ticket issue না হওয়া পর্যন্ত।
            </p>

            <p class="text-secondary">
                TTL নির্ভর করে:
                <br>• Fare rule
                <br>• Airline policy
                <br>• Booking class
                <br>• Departure date
            </p>

            <div class="info-box">
                📌 TTL airline control করে, agent নয়।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Galileo – TTL Check & Set
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">TTL Display</div>
                <pre class="gds-code">
*TD
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">TTL Result</div>
                <pre class="gds-code">
TICKET BY 18AUG 2359
        </pre>
            </div>

            <p class="text-secondary">
                • Passenger-কে 18 AUG রাত 11:59 এর মধ্যে ticket issue করতে হবে
                <br>• Otherwise PNR auto-cancel
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Set Agency Reminder</div>
                <pre class="gds-code">
TKTL/18AUG/2359
        </pre>
            </div>

            <p class="text-secondary">
                Agent reminder set করা হয় (airline TTL change হয় না)
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Sabre – TTL Check & Set
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">TTL Display</div>
                <pre class="gds-code">
*TA
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">TTL Result</div>
                <pre class="gds-code">
TKT BY 18AUG/2359
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ TTL auto-generated হয় airline fare rule অনুযায়ী।
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Agency Queue Reminder</div>
                <pre class="gds-code">
7TAW18AUG/2359
        </pre>
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Amadeus – TTL Check & Set
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">TTL Display</div>
                <pre class="gds-code">
RT
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">TTL Result</div>
                <pre class="gds-code">
FARE GUARANTEE UNTIL 18AUG 2359
        </pre>
            </div>

            <p class="text-secondary">
                Amadeus TTL কখনো “Fare Guarantee” হিসেবে দেখায়।
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Agent Reminder</div>
                <pre class="gds-code">
TKTL/18AUG/2359
        </pre>
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> TTL Miss হলে কী হয়?
            </h3>

            <ul class="visa-list">
                <li>✔ Seat auto-cancel হয়ে যায়</li>
                <li>✔ PNR may be purged</li>
                <li>✔ Fare change হতে পারে</li>
                <li>✔ Passenger dissatisfaction</li>
            </ul>

            <div class="info-box">
                📌 TTL miss করা মানে confirmed seat হারানো।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ TTL create করার সাথে সাথেই passenger-কে inform করুন</li>
                <li>✔ Agency reminder সবসময় set রাখুন</li>
                <li>✔ Last minute ticket issue avoid করুন</li>
                <li>✔ Fare rule-এ advance purchase check করুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        TTL miss মানেই lost sale। Professional agent সবসময় TTL control করে।
                        <b>Trip Designer</b> শেখায় real GDS TTL handling zero-risk approach।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/21') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/23') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection