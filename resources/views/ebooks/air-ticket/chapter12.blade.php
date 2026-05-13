@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 12 – Connecting vs Direct Flight')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Connecting vs Direct Flight
                <small class="text-muted">Flight Availability & Schedule – Chapter 12</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Direct Flight</b> এবং <b>Connecting Flight</b>-এর পার্থক্য, কোন পরিস্থিতিতে কোনটা better, এবং GDS-এ system result কেমন দেখায়।
            </p>

            <div class="highlight-box">
                ⚠️ Flight selection ভুল হলে passenger dissatisfaction ও reissue risk থাকে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Direct Flight Concept</h3>

            <p>
                Direct Flight বলতে বোঝায় যেটি origin থেকে destination একই flight number-এ operate করে।
            </p>

            <ul class="visa-list">
                <li>✔ Same flight number</li>
                <li>✔ No aircraft change</li>
                <li>✔ Less travel time</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Connecting Flight Concept</h3>

            <p>
                Connecting Flight-এ passenger মাঝপথে অন্য airport-এ aircraft change করে।
            </p>

            <ul class="visa-list">
                <li>✔ One or more stopovers</li>
                <li>✔ Different flight numbers</li>
                <li>✔ Longer travel time</li>
            </ul>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Availability Display</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
AUGDACLHR15SEP
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
1 EK585 Y DACDXB 1025 1325
  EK001 Y DXBLHR 1450 1930
2 BA162 Y DACLHR 0930 1500
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Option 1 = Connecting flight via DXB ✔ Option 2 = Direct flight DAC–LHR
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Availability Display</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
115SEP DACLHR
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
1 EK 585 Y DACDXB
  EK 001 Y DXBLHR
2 BA 162 Y DACLHR
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre clearly separates direct and connecting options
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – Availability Display</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
AN15SEPDACLHR
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
1 EK 585 Y DAC DXB
  EK 001 Y DXB LHR
2 BA 162 Y DAC LHR
    </pre>
            </div>

            <p class="text-secondary">
                ✔ System routing অনুযায়ী flight group করে দেখায়
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Comparison Result</h3>

            <ul class="visa-list">
                <li>✔ Direct flight = Less travel time</li>
                <li>✔ Connecting flight = Cheaper fare possible</li>
                <li>✔ Transit visa consideration required</li>
            </ul>

            <div class="info-box">
                📌 Passenger preference অনুযায়ী option explain করা professional duty।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Direct এবং Connecting flight difference clearভাবে বোঝাতে পারা একজন professional ticketing agent-এর অন্যতম skill।
                        <b>Trip Designer</b> শেখায় real GDS result বুঝে correct flight advisory।
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

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Professional Agent Tips</h3>

            <ul class="visa-list">
                <li>✔ Transit visa requirement explain করুন</li>
                <li>✔ Layover time check করুন</li>
                <li>✔ Through check-in availability confirm করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/11') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/13') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection