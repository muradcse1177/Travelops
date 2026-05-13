@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 37 – ADM & ACM Handling')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                ADM & ACM Handling
                <small class="text-muted">Fare Construction & Audit – Chapter 37</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>ADM (Agency Debit Memo)</b> এবং
                <b>ACM (Agency Credit Memo)</b> কী, কেন issue হয়, এবং কীভাবে professionally handle করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ ADM ignore করলে agency financial loss এবং BSP penalty হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is ADM</h3>

            <p>
                ADM হলো airline কর্তৃক agency-কে পাঠানো debit notice, যখন ticketing বা fare rule violation হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Fare under-collection</li>
                <li>✔ Invalid routing / mileage</li>
                <li>✔ Tour / corporate code misuse</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. What is ACM</h3>

            <p>
                ACM হলো airline কর্তৃক agency-কে দেওয়া credit memo, যখন excess amount collect করা হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Over-collection correction</li>
                <li>✔ Refund adjustment</li>
                <li>✔ Fare recalculation credit</li>
            </ul>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. ADM Issue – Typical Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Airline Audit Result</div>
                <pre class="gds-code">
ADM ISSUED
REASON: FARE UNDER-COLLECTION
AMOUNT: USD 120
TICKET: 176-1234567890
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Airline found fare mismatch ✔ Agency liable for difference
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. ADM Verification Process</h3>

            <ul class="visa-list">
                <li>✔ Check fare construction line</li>
                <li>✔ Verify mileage (TPM / MPM)</li>
                <li>✔ Review fare rule & endorsement</li>
            </ul>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Reference</div>
                <pre class="gds-code">
FARE RULE VIOLATION CONFIRMED
ADM VALID
    </pre>
            </div>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. ADM Dispute Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Dispute Submission</div>
                <pre class="gds-code">
ADM DISPUTE FILED
SUPPORTING DOCUMENTS ATTACHED
STATUS: UNDER REVIEW
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Agency can dispute within BSP time limit ✔ Airline decision final
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. ACM Issue Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
ACM ISSUED
REASON: OVER-COLLECTION
AMOUNT: USD 45
STATUS: CREDITED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Airline credited excess amount ✔ Adjusted in BSP report
            </p>

            <div class="info-box">
                📌 ADM dispute timeline miss করলে auto-debit হয়ে যায়।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        ADM & ACM handling বোঝা মানে একজন agent-এর financial risk control।
                        <b>Trip Designer</b> শেখায় real BSP audit scenario এবং professional dispute handling।
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
                <li>✔ Every ticket audit-ready রাখুন</li>
                <li>✔ Fare rule & endorsement double-check করুন</li>
                <li>✔ ADM dispute deadline track করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/36') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/38') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection