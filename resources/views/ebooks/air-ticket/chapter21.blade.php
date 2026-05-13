@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 21 – Itinerary Build (Segment Sell)')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Itinerary Build (Segment Sell)
                <small class="text-muted">PNR Creation – Step 2 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে availability থেকে
                <b>flight segment sell</b> করে একটি valid <b>itinerary</b> তৈরি করতে হয়। 👉 এটি হলো <b>PNR Creation-এর দ্বিতীয় ধাপ</b>।
            </p>

            <div class="highlight-box">
                ⚠️ ভুল segment sell করলে pricing fail, schedule change risk এবং ticket issue problem হতে পারে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Itinerary Build কী?
            </h3>

            <p>
                <b>Itinerary Build</b> মানে— availability screen থেকে passenger-এর জন্য suitable flight
                <b>PNR-এ add করা</b>।
            </p>

            <p class="text-secondary">
                Itinerary build করার সময় check করতে হবে:
                <br>• Date & routing
                <br>• Flight number
                <br>• Booking class
                <br>• Connection time
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Galileo – Segment Sell
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Availability</div>
                <pre class="gds-code">
A15AUGDACDXB
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Sell Command</div>
                <pre class="gds-code">
N1Y1
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">PNR Result</div>
                <pre class="gds-code">
1 EK 585 Y 15AUG DACDXB HK1
        </pre>
            </div>

            <p class="text-secondary">
                • <b>N1</b> = 1 passenger
                <br>• <b>Y</b> = Booking class
                <br>• <b>1</b> = Line number
                <br>• <b>HK1</b> = Confirmed segment
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Sabre – Segment Sell
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Availability</div>
                <pre class="gds-code">
1ODACDXB15AUG
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Sell Command</div>
                <pre class="gds-code">
01Y1
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">PNR Result</div>
                <pre class="gds-code">
1 EK585 Y 15AUG DACDXB HK1
        </pre>
            </div>

            <p class="text-secondary">
                • <b>01</b> = Availability line
                <br>• <b>Y</b> = Booking class
                <br>• <b>HK</b> = Confirmed
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Amadeus – Segment Sell
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Availability</div>
                <pre class="gds-code">
AN15AUGDACDXB
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Sell Command</div>
                <pre class="gds-code">
SS1Y1
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">PNR Result</div>
                <pre class="gds-code">
1 EK585 Y 15AUG DAC DXB HK1
        </pre>
            </div>

            <p class="text-secondary">
                • <b>SS</b> = Sell Segment
                <br>• <b>1</b> = Passenger count
                <br>• <b>HK</b> = Confirmed status
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Connecting Itinerary Sell
            </h3>

            <p>
                Connecting itinerary build করার সময়
                <b>connection time</b> ও
                <b>same airline preference</b> খুব গুরুত্বপূর্ণ।
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Example Result</div>
                <pre class="gds-code">
1 QR 639 Y 15AUG DACDOH HK1
2 QR 642 Y 15AUG DOHDXB HK1
        </pre>
            </div>

            <p class="text-secondary">
                • Two segments = connecting flight
                <br>• Same airline = safer connection
            </p>

            <div class="info-box">
                📌 Minimum connecting time (MCT) না মানলে ticket issue risk থাকে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ HK status ছাড়া segment confirmed নয়</li>
                <li>✔ Class mismatch avoid করুন</li>
                <li>✔ Long layover আগে passenger-কে জানান</li>
                <li>✔ Sell করার পর itinerary re-check করুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Itinerary Build ভুল হলে পুরো PNR collapse করতে পারে।
                        <b>Trip Designer</b> শেখায় real GDS segment sell step-by-step practice সহ।
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

            <!-- NAVIGATION -->
            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/20') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/22') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection