@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 20 – Passenger Name & Contact')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Passenger Name & Contact
                <small class="text-muted">PNR Creation – Step 1 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে সঠিকভাবে
                <b>Passenger Name</b> ও <b>Contact Information</b> PNR-এ add করতে হয়। 👉 এটি হলো <b>PNR Creation-এর প্রথম ও সবচেয়ে গুরুত্বপূর্ণ ধাপ</b>।
            </p>

            <div class="highlight-box">
                ⚠️ Passenger name বা contact ভুল হলে ticket reissue, name correction charge এমনকি boarding denied পর্যন্ত হতে পারে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Passenger Name Rule (Basic Concept)
            </h3>

            <p>
                Passenger name সবসময়
                <b>passport অনুযায়ী exact spelling</b>-এ দিতে হবে।
            </p>

            <ul class="visa-list">
                <li>✔ Surname / Last name আগে</li>
                <li>✔ Given name পরে</li>
                <li>✔ Title (MR / MRS / MS / MSTR)</li>
            </ul>

            <div class="info-box">
                📌 Ticket issue করার পর name change allowed নয় (minor correction ছাড়া)।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Galileo – Passenger Name Entry
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
N1RAHMAN/MOHAMMAD MR
        </pre>
            </div>

            <p class="text-secondary">
                • <b>N1</b> = 1 passenger
                <br>• <b>RAHMAN</b> = Surname
                <br>• <b>MOHAMMAD</b> = Given name
                <br>• <b>MR</b> = Title
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Sabre – Passenger Name Entry
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
-1RAHMAN/MOHAMMAD MR
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ hyphen (-) দিয়ে passenger name add করা হয়।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Amadeus – Passenger Name Entry
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
NM1RAHMAN/MOHAMMAD MR
        </pre>
            </div>

            <p class="text-secondary">
                <b>NM</b> = Name element
                <br>Format Galileo-এর মতোই
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Passenger Contact (Phone / Email)
            </h3>

            <p>
                Passenger contact information airline-এর জন্য
                <b>mandatory</b>। Schedule change বা cancellation হলে airline এখানেই notify করে।
            </p>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo – Contact Entry</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Phone</div>
                <pre class="gds-code">
P.CELL8801712345678
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Email</div>
                <pre class="gds-code">
P.EMAILTEST@GMAIL.COM
        </pre>
            </div>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre – Contact Entry</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Phone</div>
                <pre class="gds-code">
9MOB8801712345678
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Email</div>
                <pre class="gds-code">
9EMAILTEST@GMAIL.COM
        </pre>
            </div>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus – Contact Entry</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Phone</div>
                <pre class="gds-code">
AP8801712345678
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Email</div>
                <pre class="gds-code">
APE-MAIL/TEST@GMAIL.COM
        </pre>
            </div>

            <p class="text-secondary">
                Correct contact না থাকলে airline passenger-কে reach করতে পারে না।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Passport দেখে spelling confirm করুন</li>
                <li>✔ Passenger name একবার add করলে verify করুন</li>
                <li>✔ At least one phone + one email mandatory</li>
                <li>✔ Corporate booking-এ company contact আলাদা দিন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Passenger Name & Contact ভুল হলে পুরো PNR risk-এ পড়ে যায়।
                        <b>Trip Designer</b> শেখায় error-free PNR creation real GDS practice সহ।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/19') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/21') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection