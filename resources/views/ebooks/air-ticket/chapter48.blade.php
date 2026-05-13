@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 48 – Airline Direct Connect')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Airline Direct Connect
                <small class="text-muted">Automation & Modern System – Chapter 48</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Airline Direct Connect</b> কী, কীভাবে airline সরাসরি agent/OTA-এর সাথে connect হয়, এবং GDS bypass করলে system behavior কেমন হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Direct Connect booking-এ servicing control অনেক সময় airline-এর হাতে থাকে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Airline Direct Connect</h3>

            <p>
                Airline Direct Connect হলো এমন system যেখানে airline নিজস্ব API বা portal-এর মাধ্যমে agent বা OTA-কে সরাসরি inventory ও fare access দেয়।
            </p>

            <ul class="visa-list">
                <li>✔ No traditional GDS dependency</li>
                <li>✔ Airline-controlled fare & rules</li>
                <li>✔ Direct payment settlement</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Why Airlines Use Direct Connect</h3>

            <ul class="visa-list">
                <li>✔ Reduce GDS cost</li>
                <li>✔ Control distribution</li>
                <li>✔ Sell ancillary & bundles</li>
            </ul>

            <div class="info-box">
                📌 Many LCC airlines operate only via Direct Connect।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Direct Connect vs GDS</h3>

            <ul class="visa-list">
                <li>✔ GDS = standardized workflow</li>
                <li>✔ Direct Connect = airline-specific workflow</li>
                <li>✔ Servicing rules differ</li>
            </ul>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. System Message Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
DIRECT CONNECT OFFER DISPLAYED
AIRLINE RULES APPLY
GDS SERVICING LIMITED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Airline inventory displayed via direct API
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Booking & Servicing Impact</h3>

            <ul class="visa-list">
                <li>✔ Changes handled on airline portal</li>
                <li>✔ Refund airline-controlled</li>
                <li>✔ GDS queue may not apply</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Passenger-কে servicing limitation clear করে বলা জরুরি।
            </div>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Real Agent Scenario</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Scenario Result</div>
                <pre class="gds-code">
DIRECT CONNECT TICKET ISSUED
ANCILLARY INCLUDED
POST-SALE SERVICE: AIRLINE ONLY
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Lower cost fare ✔ Limited agent control
            </p>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Airline Direct Connect বোঝা মানে modern distribution ecosystem বোঝা।
                        <b>Trip Designer</b> শেখায় Direct Connect booking risk, servicing limitation এবং client expectation management।
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
                <li>✔ Airline-specific rules read করুন</li>
                <li>✔ Direct Connect vs GDS option compare করুন</li>
                <li>✔ Corporate client-এর জন্য servicing risk assess করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/47') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/49') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection