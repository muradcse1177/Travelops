@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 8 - Cryptic Command Structure (With Result)')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Cryptic Command Structure (Hands-on + Result)</h2>

    <p>
        এই অধ্যায়ে আপনি শিখবেন <b>Cryptic Command</b> কী,  
        Command দেওয়ার পর <b>GDS screen-এ result কেমন আসে</b>  
        এবং সেই result কীভাবে পড়তে হয়।  
        এটি আপনাকে <b>real GDS terminal-ready</b> করে তুলবে।
    </p>

    <div class="highlight-box">
        ⚠️ Command না বুঝে দিলে GDS error বা wrong booking হবে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> Cryptic Command কী?</h3>

    <p>
        Cryptic Command হলো short text instruction  
        যা GDS system-কে নির্দিষ্ট কাজ করতে নির্দেশ দেয়।
    </p>

    <div class="info-box">
        Cryptic command = Fast + Accurate Ticketing
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> Availability Command – Structure</h3>

    <!-- COMMAND -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">Availability Command</div>
        <pre class="gds-code">A10AUGDACDXB</pre>
    </div>

    <!-- RESULT -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">Availability Result Screen</div>
        <pre class="gds-code">
 1 EK 585 Y9 B9 M4 DACDXB 0950 1245
 2 QR 639 Y9 B9 M9 DACDOH 1030 1300
        </pre>
    </div>

    <ul class="visa-list">
        <li><b>A</b> = Availability</li>
        <li><b>10AUG</b> = Journey Date</li>
        <li><b>DACDXB</b> = Route</li>
        <li><b>Y9</b> = Economy class (9+ seat)</li>
        <li><b>0950–1245</b> = Flight timing</li>
    </ul>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> Sell Command (Seat Book)</h3>

    <!-- COMMAND -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Command</div>
        <pre class="gds-code">N1Y1</pre>
    </div>

    <!-- RESULT -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Result Screen</div>
        <pre class="gds-code">
SEGMENT CONFIRMED
1 EK 585 Y 10AUG DACDXB
        </pre>
    </div>

    <ul class="visa-list">
        <li><b>N</b> = New Sell</li>
        <li><b>1</b> = Flight line number</li>
        <li><b>Y</b> = Booking class</li>
        <li><b>SEGMENT CONFIRMED</b> = Seat reserved</li>
    </ul>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> Ignore Command</h3>

    <!-- COMMAND -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">Ignore Command</div>
        <pre class="gds-code">I</pre>
    </div>

    <!-- RESULT -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">Ignore Result</div>
        <pre class="gds-code">
PNR IGNORED
NO DATA STORED
        </pre>
    </div>

    <p class="text-secondary">
        👉 Save না করে বের হয়ে যাওয়া
    </p>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> End & Save Command</h3>

    <!-- COMMAND -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">End Command</div>
        <pre class="gds-code">E</pre>
    </div>

    <!-- RESULT -->
    <div class="gds-code-wrapper">
        <div class="gds-code-title">End Result Screen</div>
        <pre class="gds-code">
PNR CREATED
RECORD LOCATOR : AB3XYZ
        </pre>
    </div>

    <ul class="visa-list">
        <li><b>E</b> = End & Save</li>
        <li><b>Record Locator</b> = Booking reference</li>
    </ul>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> Common Error Message</h3>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Error Screen Example</div>
        <pre class="gds-code">
INVALID FORMAT
CHECK ENTRY
        </pre>
    </div>

    <ul class="visa-list">
        <li>✔ Spelling mistake</li>
        <li>✔ Wrong sequence</li>
        <li>✔ Missing date / city code</li>
    </ul>

    <!-- SECTION 7 -->
    <h3 class="section-heading"><span class="sec-num">7.</span> Professional Agent Tips</h3>

    <ul class="visa-list">
        <li>✔ Result screen না পড়লে পরের command দেবেন না</li>
        <li>✔ Error message পড়ার অভ্যাস করুন</li>
        <li>✔ Speed আসবে practice থেকে</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Cryptic Command + Result Reading  
                Real GDS Practice শেখার জন্য  
                <b>Trip Designer</b> আপনার নির্ভরযোগ্য গাইড।
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

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/air-ticket/chapter/7') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/9') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection