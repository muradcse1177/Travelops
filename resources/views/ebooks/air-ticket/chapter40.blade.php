@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 40 – Medical Passenger (MEDA)')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Medical Passenger (MEDA)
                <small class="text-muted">Special Passenger Handling – Chapter 40</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Medical Passenger (MEDA)</b> কাকে বলে, কখন MEDA SSR প্রয়োজন হয়, এবং GDS system-এ এর real response কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Medical clearance ছাড়া MEDA passenger boarding denied হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. What is MEDA</h3>

            <p>
                MEDA হলো সেই passenger যার medical condition-এর কারণে airline-এর prior approval প্রয়োজন।
            </p>

            <ul class="visa-list">
                <li>✔ Recent surgery / illness</li>
                <li>✔ Oxygen / stretcher requirement</li>
                <li>✔ Medical escort needed</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Common Medical SSR Codes</h3>

            <ul class="visa-list">
                <li>✔ MEDA – Medical case</li>
                <li>✔ OXYG – In-flight oxygen</li>
                <li>✔ STCR – Stretcher case</li>
                <li>✔ MAAS – Meet & Assist</li>
            </ul>

            <div class="info-box">
                📌 Most airlines require MEDIF form approval।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – MEDA SSR Add</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.P1/SSR MEDA EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR MEDA RECEIVED
STATUS: PENDING MEDICAL CLEARANCE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Medical request sent ✔ Airline approval pending
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – MEDA SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
3MEDA
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
MEDA SSR ADDED
STATUS: HOLD
MEDICAL DOCUMENT REQUIRED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre indicates medical documents required
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – MEDA SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SR MEDA EK
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
MEDICAL CASE REGISTERED
AWAITING AIRLINE APPROVAL
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus medical case logged successfully
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Medical Clearance Result</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
MEDICAL CLEARANCE APPROVED
STATUS: HK
SPECIAL ASSISTANCE CONFIRMED
    </pre>
            </div>

            <div class="highlight-box">
                ⚠️ Clearance না পাওয়া পর্যন্ত ticket issue করবেন না।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        MEDA handling হলো passenger safety এবং airline compliance-এর critical part।
                        <b>Trip Designer</b> শেখায় medical SSR, MEDIF approval এবং real GDS system response।
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
                <li>✔ MEDIF form early submit করুন</li>
                <li>✔ Medical clearance status track করুন</li>
                <li>✔ Passenger expectation clearly explain করুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/39') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/41') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection