@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 10 - Flight Availability & Sell (All GDS)')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">Flight Availability & Sell (All GDS Result)</h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন— ✔ One Way Availability ✔ Return Availability ✔ Connecting Flight ✔ Availability Result কীভাবে পড়তে হয় ✔ Seat Sell করার পর GDS screen-এ কী আসে সবকিছু <b>Galileo, Sabre ও Amadeus</b>-এ আলাদা আলাদা।
            </p>

            <div class="highlight-box">
                ⚠️ Availability ভুল বুঝলে → wrong class → ticket loss
            </div>

            <!-- ================================================= -->
            <!-- SECTION 1 : ONE WAY AVAILABILITY -->
            <!-- ================================================= -->
            <h3 class="section-heading"><span class="sec-num">1.</span> One Way Availability</h3>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">A10AUGDACDXB</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
 1 EK 585 Y9 B9 M4 DACDXB 0950 1245
 2 QR 639 Y9 B9 M9 DACDOH 1030 1300
    </pre>
            </div>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">1ODACDXB10AUG</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
 1 EK585 Y9 B9 M4 DACDXB 0950 1245
 2 QR639 Y9 B9 M9 DACDOH 1030 1300
    </pre>
            </div>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">AN10AUGDACDXB</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
 1 EK585 Y9 B9 M4 DAC DXB 0950 1245
 2 QR639 Y9 B9 M9 DAC DOH 1030 1300
    </pre>
            </div>

            <ul class="visa-list">
                <li><b>1 / 2</b> = Line number (sell করার সময় লাগবে)</li>
                <li><b>Y9</b> = 9 বা তার বেশি seat available</li>
                <li><b>DACDXB</b> = Route</li>
            </ul>

            <!-- ================================================= -->
            <!-- SECTION 2 : RETURN AVAILABILITY -->
            <!-- ================================================= -->
            <h3 class="section-heading"><span class="sec-num">2.</span> Return Availability</h3>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">A10AUGDACDXB*20AUGDXBDAC</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
OUTBOUND
 1 EK585 Y9 B9 DACDXB 0950 1245
INBOUND
 1 EK586 Y9 B9 DXBDAC 1900 2345
    </pre>
            </div>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">1RDACDXB10AUG20AUG</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
O 1 EK585 Y9 B9
I 1 EK586 Y9 B9
    </pre>
            </div>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">AN10AUGDACDXB/20AUGDXBDAC</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
OUT EK585 Y9
IN  EK586 Y9
    </pre>
            </div>

            <div class="info-box">
                Return availability মানে outbound + inbound দুটোই confirm থাকতে হবে।
            </div>

            <!-- ================================================= -->
            <!-- SECTION 3 : CONNECTING FLIGHT -->
            <!-- ================================================= -->
            <h3 class="section-heading"><span class="sec-num">3.</span> Connecting Flight Availability</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Common Result Example</div>
                <pre class="gds-code">
 1 QR639 Y9 DACDOH 1030 1300
   QR642 Y9 DOHDXB 1415 1600
    </pre>
            </div>

            <ul class="visa-list">
                <li>✔ Same airline connection safer</li>
                <li>✔ Minimum connecting time check করতে হবে</li>
            </ul>

            <!-- ================================================= -->
            <!-- SECTION 4 : SELL SEAT -->
            <!-- ================================================= -->
            <h3 class="section-heading"><span class="sec-num">4.</span> Sell Seat (After Availability)</h3>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Sell Command</div>
                <pre class="gds-code">N1Y1</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
SEGMENT CONFIRMED
1 EK585 Y
    </pre>
            </div>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Sell Command</div>
                <pre class="gds-code">01Y1</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
HK1 CONFIRMED
    </pre>
            </div>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus</h4>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Sell Command</div>
                <pre class="gds-code">SS1Y1</pre>
            </div>
            <div class="gds-code-wrapper">
                <div class="gds-code-title">Result</div>
                <pre class="gds-code">
SS CONFIRMED
    </pre>
            </div>

            <div class="highlight-box">
                ✔ Sell confirm না হলে PNR incomplete
            </div>

            <!-- ================================================= -->
            <!-- NAV -->
            <!-- ================================================= -->
            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/9') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/11') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>
        <div id="footer"></div>
@endsection