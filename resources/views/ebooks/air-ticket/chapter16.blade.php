@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 16 – Auto Pricing vs Manual Pricing')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Auto Pricing vs Manual Pricing
                <small class="text-muted">Galileo / Sabre / Amadeus – Practical Pricing Guide</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Auto Pricing</b> এবং <b>Manual Pricing</b> কী, কোন পরিস্থিতিতে কোনটা ব্যবহার করা উচিত, এবং বিভিন্ন GDS-এ pricing কীভাবে কাজ করে।
            </p>

            <div class="highlight-box">
                ⚠️ ভুল pricing মানেই fare difference, ADM এবং agency loss।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Auto Pricing কী?
            </h3>

            <p>
                <b>Auto Pricing</b> মানে GDS নিজে থেকে itinerary অনুযায়ী lowest applicable fare calculate করা।
            </p>

            <p class="text-secondary">
                Auto Pricing ব্যবহার হয়:
                <br>• Normal published fare
                <br>• Simple itinerary
                <br>• Quick ticketing
            </p>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo – Auto Pricing</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Pricing Result</div>
                <pre class="gds-code">
FARE  BDT 45000
TAX   BDT 8500
TOTAL BDT 53500
        </pre>
            </div>

            <p class="text-secondary">
                Galileo automatically lowest valid fare select করে।
            </p>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre – Auto Pricing</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Pricing Result</div>
                <pre class="gds-code">
FARE BDT45000
TAX  BDT8500
TTL  BDT53500
        </pre>
            </div>

            <p class="text-secondary">
                Sabre WP command auto pricing-এর standard।
            </p>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus – Auto Pricing</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FXP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Pricing Result</div>
                <pre class="gds-code">
FARE BDT45000
TAX  BDT8500
TOTAL BDT53500
        </pre>
            </div>

            <p class="text-secondary">
                FXP = Fare Quote Pricing (Auto)
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Manual Pricing কী?
            </h3>

            <p>
                <b>Manual Pricing</b> মানে agent নিজে specific fare basis বা fare line ব্যবহার করে pricing করা।
            </p>

            <p class="text-secondary">
                Manual pricing দরকার হয়:
                <br>• Corporate / special fare
                <br>• Mixed class itinerary
                <br>• Auto pricing fail করলে
            </p>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo – Manual Pricing</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ/YOW
        </pre>
            </div>

            <p class="text-secondary">
                Specific Fare Basis দিয়ে pricing করা হয়েছে।
            </p>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre – Manual Pricing</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WPBOW
        </pre>
            </div>

            <p class="text-secondary">
                WP + Fare Basis = Manual Pricing
            </p>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus – Manual Pricing</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FXP/K2PEX
        </pre>
            </div>

            <p class="text-secondary">
                FXP with Fare Basis qualifier।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Auto vs Manual Pricing
            </h3>

            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>Point</th>
                        <th>Auto Pricing</th>
                        <th>Manual Pricing</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Speed</td>
                        <td>Fast</td>
                        <td>Slow</td>
                    </tr>
                    <tr>
                        <td>Flexibility</td>
                        <td>Limited</td>
                        <td>High</td>
                    </tr>
                    <tr>
                        <td>Agent Control</td>
                        <td>Low</td>
                        <td>Full Control</td>
                    </tr>
                    <tr>
                        <td>Error Risk</td>
                        <td>Low</td>
                        <td>High (if careless)</td>
                    </tr>
                </tbody>
            </table>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Auto pricing আগে চেষ্টা করুন</li>
                <li>✔ Manual pricing করার আগে fare rule check করুন</li>
                <li>✔ Fare basis mismatch avoid করুন</li>
                <li>✔ Pricing store করার আগে verify করুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Auto ও Manual Pricing না বুঝলে ticketing career সবচেয়ে বড় risk।
                        <b>Trip Designer</b> শেখায় real-life pricing logic zero confusion সহ।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/15') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/17') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection