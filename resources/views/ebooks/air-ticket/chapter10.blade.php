@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 10 – Flight Availability & Sell')

@section('content')
<div class="chapter-box">

    <!-- ================= TITLE ================= -->
    <h2 class="chapter-title">
        Flight Availability & Sell
        <small class="text-muted">All GDS – Explained</small>
    </h2>

    <p>
        এই অধ্যায়ে আপনি শিখবেন কীভাবে  
        <b>Flight Availability check</b> করতে হয়,  
        <b>Result screen পড়তে হয়</b>  
        এবং সঠিক class-এ <b>Seat Sell</b> করতে হয়  
        — সবকিছু <b>Galileo, Sabre ও Amadeus</b>-এ আলাদা আলাদা।
    </p>

    <div class="highlight-box">
        ⚠️ Availability ভুল বুঝলে wrong class sell হয়ে যেতে পারে
    </div>

    <!-- ========================================================= -->
    <!-- SECTION 1 : ONE WAY AVAILABILITY -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">1.</span> One Way Availability
    </h3>

    <!-- ===== GALILEO ===== -->
    <h4 class="section-subtitle">Galileo – One Way Availability</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Command</div>
        <pre class="gds-code">A10AUGDACDXB</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>A</b> = Availability request<br>
        • <b>10AUG</b> = Journey date<br>
        • <b>DACDXB</b> = Route (Dhaka → Dubai)
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result Screen</div>
        <pre class="gds-code">
 1 EK 585 Y9 B9 M4 DACDXB 0950 1245
 2 QR 639 Y9 B9 M9 DACDOH 1030 1300
        </pre>
    </div>

    <p class="text-secondary">
        <b>Result Explanation:</b><br>
        • <b>1 / 2</b> = Flight line number (sell করার সময় লাগবে)<br>
        • <b>EK / QR</b> = Airline code (Emirates / Qatar)<br>
        • <b>Y9</b> = Economy class, 9 বা তার বেশি seat available<br>
        • <b>0950–1245</b> = Departure → Arrival time
    </p>

    <!-- ===== SABRE ===== -->
    <h4 class="section-subtitle">Sabre – One Way Availability</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Command</div>
        <pre class="gds-code">1ODACDXB10AUG</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>1O</b> = One way availability<br>
        • City code ও date order Sabre-এ আলাদা
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result Screen</div>
        <pre class="gds-code">
 1 EK585 Y9 B9 M4 DACDXB 0950 1245
        </pre>
    </div>

    <!-- ===== AMADEUS ===== -->
    <h4 class="section-subtitle">Amadeus – One Way Availability</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Command</div>
        <pre class="gds-code">AN10AUGDACDXB</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>AN</b> = Availability neutral<br>
        • Format Amadeus-specific
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result Screen</div>
        <pre class="gds-code">
 1 EK585 Y9 B9 M4 DAC DXB 0950 1245
        </pre>
    </div>

    <!-- ========================================================= -->
    <!-- SECTION 2 : RETURN AVAILABILITY -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">2.</span> Return Availability
    </h3>

    <!-- GALILEO -->
    <h4 class="section-subtitle">Galileo – Return Availability</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Command</div>
        <pre class="gds-code">A10AUGDACDXB*20AUGDXBDAC</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>*</b> = Return separator<br>
        • Outbound + Inbound একসাথে দেখায়
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Result Screen</div>
        <pre class="gds-code">
OUTBOUND
 1 EK585 Y9 DACDXB
INBOUND
 1 EK586 Y9 DXBDAC
        </pre>
    </div>

    <p class="text-secondary">
        Return booking-এর সময় দুটো segment-ই confirm থাকতে হবে।
    </p>

    <!-- ========================================================= -->
    <!-- SECTION 3 : CONNECTING FLIGHT -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">3.</span> Connecting Flight Availability
    </h3>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sample Result</div>
        <pre class="gds-code">
 1 QR639 Y9 DACDOH 1030 1300
   QR642 Y9 DOHDXB 1415 1600
        </pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • Two segments = connecting flight<br>
        • Same airline connection safer<br>
        • Connection time acceptable কিনা check করতে হবে
    </p>

    <!-- ========================================================= -->
    <!-- SECTION 4 : SELL SEAT -->
    <!-- ========================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">4.</span> Sell Seat (After Availability)
    </h3>

    <!-- GALILEO -->
    <h4 class="section-subtitle">Galileo – Sell Seat</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Command</div>
        <pre class="gds-code">N1Y1</pre>
    </div>

    <p class="text-secondary">
        <b>Explanation:</b><br>
        • <b>N</b> = New sell<br>
        • <b>1</b> = Availability line number<br>
        • <b>Y</b> = Booking class<br>
        • <b>1</b> = Seat quantity
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Result</div>
        <pre class="gds-code">
SEGMENT CONFIRMED
        </pre>
    </div>

    <p class="text-secondary">
        Segment confirmed মানে seat successfully reserved।
    </p>

    <!-- SABRE -->
    <h4 class="section-subtitle">Sabre – Sell Seat</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Command</div>
        <pre class="gds-code">01Y1</pre>
    </div>

    <p class="text-secondary">
        Sabre-এ HK status মানে confirmed seat।
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Result</div>
        <pre class="gds-code">
HK1 CONFIRMED
        </pre>
    </div>

    <!-- AMADEUS -->
    <h4 class="section-subtitle">Amadeus – Sell Seat</h4>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Command</div>
        <pre class="gds-code">SS1Y1</pre>
    </div>

    <p class="text-secondary">
        <b>SS</b> = Sell segment in Amadeus।
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">Sell Result</div>
        <pre class="gds-code">
SS CONFIRMED
        </pre>
    </div>

    <div class="highlight-box">
        ✔ Sell confirm না হলে PNR incomplete থাকে
    </div>

    <!-- ================= NAV ================= -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/air-ticket/chapter/9') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/11') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection