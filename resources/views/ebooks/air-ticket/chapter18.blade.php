@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 18 – Tax & Currency Conversion')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Tax & Currency Conversion
                <small class="text-muted">Galileo / Sabre / Amadeus – Practical Guide</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন airline ticket-এর <b>Tax</b> কীভাবে কাজ করে, কোন tax কেন নেওয়া হয়, এবং বিভিন্ন <b>currency conversion</b> কীভাবে calculate হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Tax ভুল বুঝলে passenger overcharge, refund mismatch ও BSP issue হতে পারে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Airline Tax কী?
            </h3>

            <p>
                Airline ticket-এর <b>Base Fare</b> ছাড়াও বিভিন্ন airport, government ও airline charge যোগ হয়— এগুলোকেই <b>Tax</b> বলা হয়।
            </p>

            <p class="text-secondary">
                Common tax types:
                <br>• Airport tax
                <br>• Fuel surcharge (YQ / YR)
                <br>• Government tax
                <br>• Security fee
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Galileo – Tax Breakdown
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Pricing Command</div>
                <pre class="gds-code">
FQ
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tax Result</div>
                <pre class="gds-code">
FARE     BDT 45000
TAX      BDT 8500
 BD      2500
 YQ      4500
 WT      1500
TOTAL    BDT 53500
        </pre>
            </div>

            <p class="text-secondary">
                • <b>BD</b> = Departure tax
                <br>• <b>YQ</b> = Fuel surcharge
                <br>• <b>WT</b> = Security tax
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Sabre – Tax Breakdown
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Pricing Command</div>
                <pre class="gds-code">
WP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tax Result</div>
                <pre class="gds-code">
FARE  BDT45000
XT    BDT8500
 BD   2500
 YQ   4500
 WT   1500
TTL   BDT53500
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ <b>XT</b> মানে combined tax।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Amadeus – Tax Breakdown
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Pricing Command</div>
                <pre class="gds-code">
FXP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tax Result</div>
                <pre class="gds-code">
FARE  BDT45000
TX    8500
 BD   2500
 YQ   4500
 WT   1500
TOTAL BDT53500
        </pre>
            </div>

            <p class="text-secondary">
                Amadeus-এ tax breakdown সবচেয়ে detail এ দেখা যায়।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Currency Conversion কী?
            </h3>

            <p>
                International ticket-এ fare ও tax এক currency-তে calculate হলেও issue করার সময় local currency-তে convert হয়।
            </p>

            <p class="text-secondary">
                Conversion based on:
                <br>• IATA Rate of Exchange (IROE)
                <br>• BSP country rule
            </p>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo – Currency Conversion</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Conversion</div>
                <pre class="gds-code">
USD 500 = BDT 55000
        </pre>
            </div>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre – Currency Conversion</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Conversion</div>
                <pre class="gds-code">
¥USD500
        </pre>
            </div>

            <p class="text-secondary">
                Sabre automatic currency conversion apply করে।
            </p>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus – Currency Conversion</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Conversion</div>
                <pre class="gds-code">
FQC USD BDT
        </pre>
            </div>

            <p class="text-secondary">
                Agent manual rate check করতে পারে।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Base fare ও tax আলাদা করে explain করুন</li>
                <li>✔ Fuel surcharge refundable কিনা check করুন</li>
                <li>✔ Currency mismatch avoid করুন</li>
                <li>✔ Refund সময় tax rule verify করুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Tax ও Currency Conversion না বুঝলে সবচেয়ে বেশি accounting mismatch হয়।
                        <b>Trip Designer</b> শেখায় real BSP & GDS tax logic step-by-step।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/17') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/19') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection