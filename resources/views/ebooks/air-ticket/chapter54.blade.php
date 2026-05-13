@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 54 – Profit & Markup Strategy')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Profit & Markup Strategy
                <small class="text-muted">Travel Agency Business – Chapter 54</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন একটি <b>Travel Agency</b> কীভাবে ticket sale থেকে profit generate করে,
                <b>markup</b> calculate করা হয় এবং smart pricing করলে business sustainable হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Wrong markup strategy মানে low sale বা customer loss।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is Markup</h3>

            <p>
                Markup হলো airline net fare-এর উপর agency কর্তৃক যোগ করা service charge, যার মাধ্যমেই agency profit করে।
            </p>

            <ul class="visa-list">
                <li>✔ Flat markup</li>
                <li>✔ Percentage markup</li>
                <li>✔ Client-based markup</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Markup Calculation Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Calculation</div>
                <pre class="gds-code">
NET FARE: BDT 50,000
MARKUP:   BDT 2,000
SELLING:  BDT 52,000
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Transparent pricing ✔ Easy customer explanation
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Profit Components</h3>

            <ul class="visa-list">
                <li>✔ Markup / service charge</li>
                <li>✔ Airline incentive</li>
                <li>✔ Corporate deal margin</li>
            </ul>

            <div class="info-box">
                📌 Airline commission এখন mostly zero, markup is key।
            </div>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Smart Pricing Result</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Business Result</div>
                <pre class="gds-code">
TICKET SOLD SUCCESSFULLY
CUSTOMER SATISFIED
NET PROFIT: BDT 2,000
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Competitive price ✔ Sustainable profit
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Common Pricing Mistakes</h3>

            <ul class="visa-list">
                <li>✔ Too high markup</li>
                <li>✔ Hidden charge</li>
                <li>✔ Price mismatch with invoice</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Hidden charge customer trust destroy করে।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Profit strategy বোঝা মানে travel business long-term চালানো।
                        <b>Trip Designer</b> শেখায় ethical markup, client segmentation এবং competitive pricing formula।
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

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Agent Learning Outcome</h3>

            <ul class="visa-list">
                <li>✔ Markup calculation clarity</li>
                <li>✔ Pricing confidence</li>
                <li>✔ Profit-focused mindset</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/53') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/55') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection