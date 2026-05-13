@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 45 – BSP Sales & Report')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                BSP Sales & Report
                <small class="text-muted">Queue & Back Office – Chapter 45</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>BSP (Billing and Settlement Plan)</b> কী, ticket sale কীভাবে BSP-তে report হয়, এবং agency report check করলে system result কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ BSP report mismatch হলে ADM ও financial loss হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is BSP</h3>

            <p>
                BSP হলো IATA পরিচালিত settlement system, যার মাধ্যমে airline ও travel agency-এর ticket sales financial settlement হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Centralized billing system</li>
                <li>✔ Weekly / bi-weekly settlement</li>
                <li>✔ Airline-wise sales reporting</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. BSP Sales Components</h3>

            <ul class="visa-list">
                <li>✔ Ticket number</li>
                <li>✔ Fare & tax amount</li>
                <li>✔ Commission / incentive</li>
                <li>✔ Refund & ADM / ACM</li>
            </ul>

            <div class="info-box">
                📌 Every issued ticket must reflect in BSP sales report।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – BSP Sales Report View</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
HMBSP
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
BSP SALES SUMMARY
TOTAL SALES: USD 12,450
TOTAL TAX: USD 3,120
NET REMITTANCE: USD 9,330
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Galileo displays summarized BSP sales
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Sales Report</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WETR*
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
ELECTRONIC TICKET REPORT
TOTAL ISSUED: 38
TOTAL AMOUNT: USD 12,450
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre ticket sales extracted successfully
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – BSP Report Reference</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
TJQ
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
BSP TRANSACTION SUMMARY
SALES PERIOD: CURRENT
AMOUNT PAYABLE: USD 9,330
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus shows BSP settlement data
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. BSP Reconciliation Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reconciliation Result</div>
                <pre class="gds-code">
TICKET MISMATCH FOUND
TICKET: 176-9876543210
STATUS: UNDER REVIEW
    </pre>
            </div>

            <div class="highlight-box">
                ⚠️ BSP mismatch resolve না করলে ADM issue হতে পারে।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        BSP Sales & Report বোঝা মানে agency financial control নিজের হাতে রাখা।
                        <b>Trip Designer</b> শেখায় real BSP workflow, reconciliation process এবং audit-ready reporting।
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
                <li>✔ Daily ticket sales log রাখুন</li>
                <li>✔ BSP report vs GDS sales reconcile করুন</li>
                <li>✔ ADM / ACM regularly monitor করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/44') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/46') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection