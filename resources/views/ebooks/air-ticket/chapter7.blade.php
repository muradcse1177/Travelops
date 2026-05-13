@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 7 - GDS Login, Terminal & Sign-in (Practical)')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">GDS Login, Terminal & Sign-in (Hands-on Practical)</h2>

    <p>
        এই অধ্যায়ে আপনি <b>হাতে-কলমে</b> শিখবেন  
        কীভাবে <b>Galileo, Sabre ও Amadeus</b> GDS-এ  
        Login করতে হয়,  
        Login করার পর <b>screen-এ কী result আসে</b>  
        এবং কীভাবে নিশ্চিত করবেন যে  
        আপনি সঠিকভাবে system-এ ঢুকেছেন।
    </p>

    <div class="highlight-box">
        ⚠️ ভুল Login হলে booking, queue ও ticketing কাজ মারাত্মকভাবে ক্ষতিগ্রস্ত হয়।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> GDS Login করার জন্য যা লাগে</h3>

    <ul class="visa-list">
        <li>✔ PCC / Office ID</li>
        <li>✔ Agent Sign-in ID</li>
        <li>✔ Password / Sign-in Code</li>
        <li>✔ Assigned Work Area</li>
    </ul>

    <div class="info-box">
        এগুলো ছাড়া কোনো GDS-এ Login সম্ভব নয়।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> Galileo GDS – Login (Command)</h3>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Galileo – Sign In Command</div>
        <pre class="gds-code">SI*1234/AA</pre>
    </div>

    <ul class="visa-list">
        <li><b>SI</b> = Sign In</li>
        <li><b>1234</b> = Agent ID</li>
        <li><b>AA</b> = Work Area</li>
    </ul>

    <!-- RESULT -->
    <h4 class="section-subtitle">Galileo Login Result Screen</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Galileo – Login Result</div>
        <pre class="gds-code">
WELCOME TO GALILEO
AGENT NAME : RAHIM
PCC        : DAC123
WORK AREA  : A
STATUS     : SIGNED IN
        </pre>
    </div>

    <ul class="visa-list">
        <li><b>AGENT NAME</b> = আপনি সঠিক ID-তে login করেছেন</li>
        <li><b>PCC</b> = Agency office ID</li>
        <li><b>WORK AREA</b> = Active working screen</li>
        <li><b>STATUS</b> = SIGNED IN মানে login সফল</li>
    </ul>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> Sabre GDS – Login (Command)</h3>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sabre – Sign In Command</div>
        <pre class="gds-code">SI1234/AA</pre>
    </div>

    <!-- RESULT -->
    <h4 class="section-subtitle">Sabre Login Result Screen</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sabre – Login Result</div>
        <pre class="gds-code">
SABRE SYSTEM READY
AGENT ID  : 1234
PCC       : DAC456
AREA      : A
LOGIN OK
        </pre>
    </div>

    <ul class="visa-list">
        <li><b>LOGIN OK</b> = Successfully logged in</li>
        <li><b>PCC</b> = Sabre office code</li>
        <li><b>AREA</b> = Current working area</li>
    </ul>

    <div class="highlight-box">
        Sabre-এ বারবার ভুল login করলে ID lock হয়ে যেতে পারে।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> Amadeus GDS – Login (Command)</h3>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Amadeus – Sign In (Jump In)</div>
        <pre class="gds-code">JI1234/AA</pre>
    </div>

    <!-- RESULT -->
    <h4 class="section-subtitle">Amadeus Login Result Screen</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Amadeus – Login Result</div>
        <pre class="gds-code">
AMADEUS READY
OFFICE ID : DAC789
AGENT     : 1234
WORK AREA : A
STATUS    : ACTIVE
        </pre>
    </div>

    <ul class="visa-list">
        <li><b>STATUS ACTIVE</b> = Login সফল</li>
        <li><b>OFFICE ID</b> = Amadeus agency code</li>
        <li><b>WORK AREA</b> = Current task screen</li>
    </ul>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> Work Area Change Result</h3>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Work Area Change</div>
        <pre class="gds-code">AB</pre>
    </div>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Work Area Result</div>
        <pre class="gds-code">
WORK AREA CHANGED
CURRENT AREA : B
        </pre>
    </div>

    <p class="text-secondary">
        👉 নতুন task শুরু করার আগে আলাদা work area ব্যবহার করুন।
    </p>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> Sign-out (Result সহ)</h3>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sign Out Command</div>
        <pre class="gds-code">SO</pre>
    </div>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sign Out Result</div>
        <pre class="gds-code">
SIGNED OUT SUCCESSFULLY
SESSION CLOSED
        </pre>
    </div>

    <div class="highlight-box">
        ⚠️ Sign-out না করলে security risk + system issue হতে পারে।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading"><span class="sec-num">7.</span> Beginner-দের Common Mistake</h3>

    <ul class="visa-list">
        <li>✔ Login result না দেখে কাজ শুরু করা</li>
        <li>✔ ভুল work area-তে booking করা</li>
        <li>✔ End of day sign-out না করা</li>
    </ul>

    <!-- SECTION 8 -->
    <h3 class="section-heading"><span class="sec-num">8.</span> Professional Agent Tips</h3>

    <ul class="visa-list">
        <li>✔ Login result verify না করা পর্যন্ত কাজ শুরু করবেন না</li>
        <li>✔ One task = one work area</li>
        <li>✔ Day end-এ অবশ্যই sign-out</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Galileo, Sabre ও Amadeus  
                Real Login + Result Practice শেখার জন্য  
                <b>Trip Designer</b> আপনার বিশ্বস্ত গাইড।
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
        <a href="{{ url('/ebooks/air-ticket/chapter/6') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/8') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection