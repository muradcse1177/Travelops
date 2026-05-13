@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 58 – Common Agent Mistakes')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Common Agent Mistakes
                <small class="text-muted">Bonus Tools & Pro Tips – Chapter 58</small>
            </h2>

            <p>
                এই অধ্যায়ে দেখানো হয়েছে
                <b>Galileo, Sabre ও Amadeus</b>-এ agent-রা সাধারণত কোন কোন ভুল করে, ভুল করলে system কী result দেয় এবং professionalভাবে কী করা উচিত।
            </p>

            <div class="highlight-box">
                ⚠️ Interview-এ প্রশ্ন আসে: “এই mistake কোন GDS-এ হয়?”
            </div>

            <!-- ================= GALILEO ================= -->
            <h3 class="section-heading">1. GALILEO – Common Mistakes</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Mistake: Fare Rule Ignore</div>
                <pre class="gds-code">
SYSTEM RESULT:
ADM ISSUED
REASON: FARE RULE VIOLATION
</pre>
            </div>

            <p class="text-secondary">
                ❌ FQ করার পর fare rule না পড়া
            </p>

            <div class="info-box">
                ✔ Galileo-তে ticket issue করার আগে <b>FQN*</b> দিয়ে fare rule check করুন
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Mistake: TKTL Miss</div>
                <pre class="gds-code">
PNR CANCELLED
REASON: TICKETING TIME LIMIT EXPIRED
</pre>
            </div>

            <p class="text-secondary">
                ❌ TKTL queue follow-up হয়নি
            </p>

            <!-- ================= SABRE ================= -->
            <h3 class="section-heading">2. SABRE – Common Mistakes</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Mistake: Passenger Name Error</div>
                <pre class="gds-code">
NAME MISMATCH
REISSUE REQUIRED
PENALTY APPLIED
</pre>
            </div>

            <p class="text-secondary">
                ❌ Passport vs Sabre PNR spelling mismatch
            </p>

            <div class="info-box">
                ✔ Sabre-এ name enter করার সময় passport copy সামনে রাখুন
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Mistake: Wrong Refund Promise</div>
                <pre class="gds-code">
REFUND PENALTY APPLIED
CUSTOMER COMPLAINT FILED
</pre>
            </div>

            <p class="text-secondary">
                ❌ Fare rule (WPFR) explain করা হয়নি
            </p>

            <!-- ================= AMADEUS ================= -->
            <h3 class="section-heading">3. AMADEUS – Common Mistakes</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Mistake: Schedule Change Ignore</div>
                <pre class="gds-code">
SKED CHG NOT ACTIONED
MISSED CONNECTION
</pre>
            </div>

            <p class="text-secondary">
                ❌ Queue (QS/SC) check করা হয়নি
            </p>

            <div class="info-box">
                ✔ Amadeus-এ schedule change queue daily check mandatory
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Mistake: Wrong Pricing Command</div>
                <pre class="gds-code">
FARE NOT GUARANTEED
REPRICE REQUIRED
</pre>
            </div>

            <p class="text-secondary">
                ❌ FXP ছাড়া ticket issue attempt
            </p>

            <!-- ================= SAFETY ================= -->
            <h3 class="section-heading">4. Universal Safety Checklist</h3>

            <ul class="visa-list">
                <li>✔ Fare rule read (All GDS)</li>
                <li>✔ Passport spelling match</li>
                <li>✔ TKTL & queue follow-up</li>
                <li>✔ Refund / change policy clear</li>
            </ul>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Professional agent হওয়া মানে শুধু command জানা না,
                        <b>কোন GDS-এ কোন ভুল হয়</b> সেটাও জানা।
                        <b>Trip Designer</b> এই chapter দিয়েছে real-life agent loss prevent করার জন্য।
                    </p>
                </div>

                <div class="td-card-footer">
                    <div class="td-contact-box">
                        <span class="cta-icon">📞</span>
                        <div>
                            <div class="cta-label">WhatsApp</div>
                            <a href="https://wa.me/8801316444399" target="_blank">+8801316444399</a>
                        </div>
                    </div>

                    <div class="td-contact-box">
                        <span class="cta-icon">📘</span>
                        <div>
                            <div class="cta-label">Messenger</div>
                            <a href="https://m.me/tripdesigner.xyz" target="_blank">m.me/tripdesigner.xyz</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/57') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/59') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>
        <div id="footer"></div>
@endsection