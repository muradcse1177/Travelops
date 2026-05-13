@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 15 – Fare Display & Fare Basis')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Fare Display & Fare Basis
                <small class="text-muted">Galileo / Sabre / Amadeus – Practical Guide</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Fare Display</b> কী, বিভিন্ন GDS-এ fare কীভাবে দেখা হয়, এবং <b>Fare Basis</b> code পড়ে fare rule বুঝতে হয় কীভাবে।
            </p>

            <div class="highlight-box">
                ⚠️ Fare Basis ভুল বুঝলে reissue, refund বা penalty নিয়ে বড় সমস্যা হতে পারে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Fare Display কী?
            </h3>

            <p>
                <b>Fare Display</b> মানে— নির্দিষ্ট route ও date অনুযায়ী airline-এর published fare list দেখা।
            </p>

            <p class="text-secondary">
                Fare Display ব্যবহার হয়:
                <br>• Fare comparison
                <br>• Fare rule study
                <br>• Manual pricing knowledge
            </p>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo – Fare Display Command</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FD DAC DXB 15AUG
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result Screen</div>
                <pre class="gds-code">
01 EK Y  BDT45000  YOW
02 EK B  BDT38000  BOW
        </pre>
            </div>

            <p class="text-secondary">
                • EK = Airline
                <br>• Y / B = Booking class
                <br>• Amount = Base fare
                <br>• Last column = Fare type
            </p>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre – Fare Display Command</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FDACDXB15AUG
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result Screen</div>
                <pre class="gds-code">
1 EK Y   BDT45000
2 EK B   BDT38000
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ fare amount base fare দেখায়, tax আলাদা calculate হয়।
            </p>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus – Fare Display Command</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQD A15AUG DAC DXB
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result Screen</div>
                <pre class="gds-code">
1 EK Y   BDT45000
2 EK B   BDT38000
        </pre>
            </div>

            <p class="text-secondary">
                Amadeus fare display highly detailed এবং rule study friendly।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Fare Basis কী?
            </h3>

            <p>
                <b>Fare Basis</b> হলো airline-defined code যেটা fare-এর condition represent করে।
            </p>

            <p class="text-secondary">
                Example: <b>YOW</b>, <b>BOW</b>, <b>K2PEX</b>
            </p>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo – Fare Basis Example</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Fare Basis</div>
                <pre class="gds-code">
YOW
        </pre>
            </div>

            <p class="text-secondary">
                • Y = Booking class
                <br>• O = Season / rule indicator
                <br>• W = Fare type
            </p>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre – Fare Basis Example</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Fare Basis</div>
                <pre class="gds-code">
BOW
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ Fare Basis fare rule lookup-এর key।
            </p>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus – Fare Basis Example</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Fare Basis</div>
                <pre class="gds-code">
K2PEX
        </pre>
            </div>

            <p class="text-secondary">
                Amadeus Fare Basis সবচেয়ে detailed logic follow করে।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Fare Basis কেন গুরুত্বপূর্ণ?
            </h3>

            <ul class="visa-list">
                <li>✔ Refund eligibility</li>
                <li>✔ Change / reissue penalty</li>
                <li>✔ Baggage & season rule</li>
                <li>✔ Minimum / maximum stay</li>
            </ul>

            <div class="info-box">
                📌 Fare Basis না বুঝে ticket issue করা professional mistake।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Cheapest fare সবসময় best নয়</li>
                <li>✔ Fare rule check না করে promise করবেন না</li>
                <li>✔ Corporate / student fare আলাদা rule follow করে</li>
                <li>✔ Fare Basis copy করে রাখুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Fare Display ও Fare Basis না বুঝলে reissue ও refund-এ সবচেয়ে বেশি loss হয়।
                        <b>Trip Designer</b> শেখায় real GDS pricing logic step-by-step।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/14') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/16') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection