@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 11 – Class of Service (RBD)')

@section('content')
<div class="chapter-box">

    <!-- ================= TITLE ================= -->
    <h2 class="chapter-title">
        Class of Service (RBD)
        <small class="text-muted">Advanced Level – All GDS</small>
    </h2>

    <p>
        এই অধ্যায়ে আপনি শিখবেন <b>RBD (Reservation Booking Designator)</b> কী,
        Availability screen-এ RBD কীভাবে পড়তে হয় এবং
        কেন ভুল RBD ব্যবহার করলে <b>ADM ও financial loss</b> হতে পারে।
    </p>

    <div class="highlight-box">
        ⚠️ RBD না বুঝে sell করা = professional mistake
    </div>

    <!-- ========================================================= -->
    <!-- SECTION 1 : RBD READING -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">1.</span> Availability Screen-এ RBD Reading
    </h3>

    <!-- ===== GALILEO ===== -->
    <h4 class="section-subtitle">Galileo – Availability Result</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result Screen</div>
        <pre class="gds-code">
 1 EK 585 Y9 B9 M4 K2 H0 DACDXB 0950 1245
        </pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>Y9</b> → Economy full fare, 9+ seat available<br>
        • <b>B9</b> → Discount economy, high availability<br>
        • <b>M4</b> → Discount economy, limited (4 seat)<br>
        • <b>K2</b> → Very limited availability (2 seat)<br>
        • <b>H0</b> → No seat available (cannot sell)
    </p>

    <!-- ===== SABRE ===== -->
    <h4 class="section-subtitle">Sabre – Availability Result</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result Screen</div>
        <pre class="gds-code">
 1 EK585 Y9 B9 M4 K2 DACDXB 0950 1245
        </pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        Sabre-এ RBD order প্রায় Galileo-এর মতো,
        তবে cabin indicator আলাদা করে দেখায় না।
        Agent-কে নিজে জানতে হয় কোন class কোন cabin।
    </p>

    <!-- ===== AMADEUS ===== -->
    <h4 class="section-subtitle">Amadeus – Availability Result</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result Screen</div>
        <pre class="gds-code">
 1 EK585 Y9 B9 M4 K2 DAC DXB 0950 1245
        </pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        Amadeus-এ city pair আলাদা column-এ দেখায়,
        কিন্তু RBD reading logic একই।
    </p>

    <!-- ========================================================= -->
    <!-- SECTION 2 : RBD vs FARE RULE -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">2.</span> RBD vs Fare Rule
    </h3>

    <p>
        একই flight হলেও আলাদা RBD মানে আলাদা fare condition।
        Cheapest class সবসময় best choice না।
    </p>

    <ul class="visa-list">
        <li>✔ Refund allowed / non-refundable</li>
        <li>✔ Reissue penalty difference</li>
        <li>✔ Baggage allowance variation</li>
        <li>✔ Mileage earning difference</li>
    </ul>

    <div class="info-box">
        Professional agent আগে fare rule পড়ে, তারপর sell করে।
    </div>

    <!-- ========================================================= -->
    <!-- SECTION 3 : UPGRADE EXAMPLE -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">3.</span> Upgrade Example (All GDS)
    </h3>

    <!-- ===== GALILEO ===== -->
    <h4 class="section-subtitle">Galileo – Upgrade Sell</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Command</div>
        <pre class="gds-code">N1B1</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>N</b> = New sell<br>
        • <b>1</b> = Availability line number<br>
        • <b>B</b> = Higher booking class<br>
        • <b>1</b> = Number of seats
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result</div>
        <pre class="gds-code">
SEGMENT CONFIRMED – B CLASS
        </pre>
    </div>

    <p class="text-secondary">
        Result মানে passenger upgraded successfully।
    </p>

    <!-- ===== SABRE ===== -->
    <h4 class="section-subtitle">Sabre – Upgrade Sell</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Command</div>
        <pre class="gds-code">01B1</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>01</b> = Line number<br>
        • <b>B</b> = Booking class<br>
        • <b>1</b> = Seat quantity
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result</div>
        <pre class="gds-code">
HK1 CONFIRMED
        </pre>
    </div>

    <p class="text-secondary">
        HK = Holding Confirmed (seat secured)
    </p>

    <!-- ===== AMADEUS ===== -->
    <h4 class="section-subtitle">Amadeus – Upgrade Sell</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Command</div>
        <pre class="gds-code">SS1B1</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>SS</b> = Sell segment<br>
        • <b>1</b> = Line number<br>
        • <b>B</b> = Booking class<br>
        • <b>1</b> = Seat count
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result</div>
        <pre class="gds-code">
SS CONFIRMED
        </pre>
    </div>

    <p class="text-secondary">
        Segment confirmed successfully।
    </p>

    <!-- ========================================================= -->
    <!-- SECTION 4 : COMMON MISTAKE -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">4.</span> Common Agent Mistake
    </h3>

    <ul class="visa-list">
        <li>❌ Availability দেখে fare rule না পড়া</li>
        <li>❌ Cheapest RBD blindly sell করা</li>
        <li>❌ Upgrade charge explain না করা</li>
        <li>❌ Same cabin মানেই same rule ধরে নেওয়া</li>
    </ul>

    <!-- ========================================================= -->
    <!-- SECTION 5 : PRO TIPS -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">5.</span> Professional Agent Tips
    </h3>

    <ul class="visa-list">
        <li>✔ RBD → Fare Rule → Sell (এই order follow করুন)</li>
        <li>✔ Corporate client-এর জন্য flexible class বেছে নিন</li>
        <li>✔ Long haul flight-এ baggage rule confirm করুন</li>
        <li>✔ RBD mismatch ADM risk বাড়ায়</li>
    </ul>

    <!-- ================= NAV ================= -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/air-ticket/chapter/10') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/12') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection