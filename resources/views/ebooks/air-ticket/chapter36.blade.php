@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 36 – Mileage (TPM / MPM / HIP)')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Mileage (TPM / MPM / HIP)
                <small class="text-muted">Fare Construction & Audit – Chapter 36</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>TPM</b>, <b>MPM</b> এবং <b>HIP</b> কী, কখন mileage check করতে হয়, এবং GDS system result কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Mileage violation হলে fare invalid হয়ে যায় এবং ADM risk থাকে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. TPM (Ticketed Point Mileage)</h3>

            <p>
                TPM হলো origin থেকে destination পর্যন্ত actual flown distance।
            </p>

            <ul class="visa-list">
                <li>✔ Each sector mileage</li>
                <li>✔ Used for fare construction</li>
                <li>✔ Routing validation base</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. MPM (Maximum Permitted Mileage)</h3>

            <p>
                MPM হলো airline কর্তৃক অনুমোদিত সর্বোচ্চ mileage limit।
            </p>

            <ul class="visa-list">
                <li>✔ Published by airline</li>
                <li>✔ TPM + surcharge allowed</li>
                <li>✔ Exceed করলে fare invalid</li>
            </ul>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. HIP (Higher Intermediate Point)</h3>

            <p>
                HIP check করা হয় যখন intermediate point-এর fare destination fare-এর চেয়ে বেশি হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Intermediate fare comparison</li>
                <li>✔ Higher fare applies</li>
                <li>✔ Protects airline revenue</li>
            </ul>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Galileo – Mileage Check</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
TM/DACDXB
TM/DXBLON
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
TPM DAC-DXB 2195
TPM DXB-LON 3402
TOTAL TPM: 5597
MPM ALLOWED: 6000
STATUS: VALID
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Total TPM within MPM ✔ Routing accepted
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Sabre – Mileage Check</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
WNM DACDXB
WNM DXBLON
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
TPM VERIFIED
TOTAL TPM: 5597
MPM: 6000
MILEAGE OK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre mileage validated successfully
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Amadeus – Mileage & HIP Check</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQM
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
TPM CHECK PASSED
HIP CHECK: NOT APPLICABLE
FARE VALID
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Mileage & HIP validated ✔ Ticketable fare
            </p>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Mileage Violation Example</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
TPM EXCEEDS MPM
SURCHARGE REQUIRED
FARE INVALID
    </pre>
            </div>

            <div class="info-box">
                📌 Mileage exceed হলে surcharge add বা routing change করতে হয়।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        TPM, MPM ও HIP বোঝা মানে একজন agent-এর fare audit risk কমানো।
                        <b>Trip Designer</b> শেখায় real mileage calculation এবং airline-compliant routing practice।
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

            <!-- ================= SECTION 8 ================= -->
            <h3 class="section-heading">8. Professional Agent Tips</h3>

            <ul class="visa-list">
                <li>✔ Long routing হলে mileage always check করুন</li>
                <li>✔ HIP violation avoid করুন</li>
                <li>✔ BSP audit-এর আগে mileage verify করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/35') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/37') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection