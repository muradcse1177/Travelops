@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 32 – Infant / Child / Student Fare')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Infant / Child / Student Fare
                <small class="text-muted">Advanced Ticketing – Chapter 32</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে
                <b>Infant (INF)</b>, <b>Child (CHD)</b> এবং <b>Student (STU)</b> passenger-এর জন্য special fare apply করতে হয় এবং GDS system response কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Passenger type ভুল হলে ticket issue-এর পর ADM আসতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Passenger Type Rules</h3>

            <ul class="visa-list">
                <li>✔ Infant (INF): 0–23 months, no seat</li>
                <li>✔ Child (CHD): 2–11 years</li>
                <li>✔ Student (STU): Airline approved student only</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Galileo – Infant / Child / Student Fare</h3>

            <!-- COMMAND -->
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ/INF
    </pre>
            </div>

            <!-- RESULT -->
            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTE - INFANT
BASE FARE: BDT 0.00
TAX: BDT 3,500
STATUS: VALID
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Infant fare auto-linked with adult ✔ Only tax applicable
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ/CHD
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTE - CHILD
BASE FARE: BDT 32,000
DISCOUNT APPLIED
STATUS: VALID
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Child discount applied successfully
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Sabre – Infant / Child / Student Fare</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WPINF
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PRICE QUOTE - INFANT
BASE FARE: 0.00
TAX: USD 40.00
TOTAL: USD 40.00
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Infant ticket created with tax only
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WPCHD
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PRICE QUOTE - CHILD
BASE FARE: USD 280
DISCOUNT: APPLIED
STATUS: GUARANTEED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Child fare validated by airline
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Amadeus – Infant / Child / Student Fare</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FXP/INF
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTATION - INFANT
NO SEAT
TAX ONLY
TICKETABLE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Infant fare linked with adult automatically
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FXP/CH
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE QUOTATION - CHILD
DISCOUNTED FARE
STATUS: OK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Child fare priced correctly
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Student Fare (All GDS)</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ/STU
WPSTU
FXP/ST
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
STUDENT FARE APPLIED
SPECIAL DISCOUNT
DOCUMENT VERIFICATION REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Student discount applied ✔ Student ID mandatory
            </p>

            <div class="info-box">
                📌 Student fare ticket issue-এর সময় ID verify না করলে airline ADM দিতে পারে।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Infant, Child ও Student fare handling একটি high-risk area।
                        <b>Trip Designer</b> শেখায় real system result বুঝে safe ticketing practice।
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
            <h3 class="section-heading">6. Professional Agent Tips</h3>

            <ul class="visa-list">
                <li>✔ Date of birth always verify করুন</li>
                <li>✔ Infant must be linked with adult</li>
                <li>✔ Student ID copy retain করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/31') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/33') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>
        <div id="footer"></div>
@endsection