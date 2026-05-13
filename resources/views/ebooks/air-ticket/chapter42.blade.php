@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 42 – VIP / Deportee Handling')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                VIP / Deportee Handling
                <small class="text-muted">Special Passenger Handling – Chapter 42</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন
                <b>VIP passenger</b> এবং <b>Deportee passenger</b> কাকে বলে, কোন SSR code ব্যবহার করতে হয় এবং GDS system-এ এর বাস্তব response কেমন আসে।
            </p>

            <div class="highlight-box">
                ⚠️ Deportee handling ভুল হলে serious security & legal issue হতে পারে।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. VIP Passenger – Overview</h3>

            <p>
                VIP passenger হলেন এমন যাত্রী যাদের airline বা government special status থাকে এবং অতিরিক্ত attention প্রয়োজন হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Government official</li>
                <li>✔ Airline invited guest</li>
                <li>✔ High-profile passenger</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. VIP SSR Codes</h3>

            <ul class="visa-list">
                <li>✔ VIP – Very Important Person</li>
                <li>✔ CIP – Commercially Important Person</li>
                <li>✔ MAAS – Meet & Assist</li>
            </ul>

            <div class="info-box">
                📌 VIP SSR confirmation airline discretion-এর উপর নির্ভর করে।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Galileo – VIP SSR Add</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.P1/SSR VIP EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SSR VIP CONFIRMED
STATUS: HK1
PRIORITY SERVICE ENABLED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Priority check-in & boarding enabled
            </p>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Deportee Passenger – Overview</h3>

            <p>
                Deportee passenger হলেন সেই যাত্রী যাদের immigration authority দ্বারা এক দেশ থেকে অন্য দেশে ফেরত পাঠানো হয়।
            </p>

            <ul class="visa-list">
                <li>✔ Legal authority involved</li>
                <li>✔ Escort may be required</li>
                <li>✔ Special documentation mandatory</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Deportee SSR airline approval ছাড়া confirm হয় না।
            </div>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Deportee SSR Codes</h3>

            <ul class="visa-list">
                <li>✔ DEPA – Deportee (Accompanied)</li>
                <li>✔ DEPU – Deportee (Unaccompanied)</li>
                <li>✔ ESAN – Escorting Authority</li>
            </ul>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Amadeus – Deportee SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SR DEPU EK
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
DEPORTATION CASE REGISTERED
STATUS: PENDING SECURITY APPROVAL
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Immigration & airline security review required
            </p>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Deportee Escort Confirmation</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
ESCORT CONFIRMED
SSR DEPA APPROVED
STATUS: HK
    </pre>
            </div>

            <div class="info-box">
                📌 Escort details PNR-এ clearly mention করতে হয়।
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        VIP ও Deportee handling শুধুমাত্র ticketing না, বরং security, compliance এবং professionalism-এর বিষয়।
                        <b>Trip Designer</b> শেখায় real airline procedures, SSR handling এবং GDS system response।
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
                <li>✔ VIP service expectation clear করুন</li>
                <li>✔ Deportee documentation double-check করুন</li>
                <li>✔ Airline security approval ছাড়া ticket issue করবেন না</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/41') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/43') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection