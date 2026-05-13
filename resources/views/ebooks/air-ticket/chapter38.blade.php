@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 38 – Ticket Error & Name Correction')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Ticket Error & Name Correction
                <small class="text-muted">Fare Construction & Audit – Chapter 38</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>Ticketing Error</b> কীভাবে হয়,
                <b>Name Correction</b> কখন allowed, এবং airline system-এ এর real result কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Name mismatch হলে passenger boarding denied হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Common Ticketing Errors</h3>

            <ul class="visa-list">
                <li>✔ Passenger name spelling mistake</li>
                <li>✔ Title error (MR / MS / MRS)</li>
                <li>✔ Wrong DOB / passenger type</li>
                <li>✔ Sector or date error</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Name Correction Policy (General)</h3>

            <ul class="visa-list">
                <li>✔ Minor spelling (1–3 character) allowed</li>
                <li>✔ Full name change NOT allowed</li>
                <li>✔ Airline approval mandatory</li>
            </ul>

            <div class="info-box">
                📌 Passport spelling must exactly match ticket name।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – Name Correction</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
NP/1KARIM>RAHIM
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
NAME CORRECTION REQUEST SENT
STATUS: PENDING AIRLINE APPROVAL
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Minor spelling correction requested ✔ Airline approval required
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Sabre – Name Correction</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
3DOCS/DB/RAHIM/KARIM
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
NAME UPDATE ACCEPTED
MINOR CORRECTION
STATUS: OK
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Sabre accepted minor correction ✔ PNR updated successfully
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Amadeus – Name Correction</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
NU/1RAHIM KARIM
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
NAME CHANGE PROCESSED
MINOR SPELLING ONLY
TICKET STILL VALID
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Amadeus updated name ✔ Ticket remains valid
            </p>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Major Name Change Scenario</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
NAME CHANGE NOT PERMITTED
REISSUE REQUIRED
ORIGINAL TICKET VOIDED
    </pre>
            </div>

            <div class="highlight-box">
                ⚠️ Major name change = cancel & reissue (new fare may apply)
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Ticket error ও name correction handling একজন agent-এর সবচেয়ে sensitive responsibility।
                        <b>Trip Designer</b> শেখায় airline-compliant name correction & error recovery process real system result সহ।
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
                <li>✔ Ticket issue করার আগে passport verify করুন</li>
                <li>✔ Minor vs major correction clearly understand করুন</li>
                <li>✔ Airline policy documentation save রাখুন</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/37') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/39') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection