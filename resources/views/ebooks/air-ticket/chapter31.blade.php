@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 31 – Group Booking')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Group Booking
                <small class="text-muted">Advanced Ticketing – Step 2 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Group Booking</b> কী, কতজন passenger হলে group booking ধরা হয়, airline group policy, এবং কীভাবে GDS ও airline group desk-এর মাধ্যমে group handle করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Group booking individual booking-এর মতো handle করলে fare loss ও airline cancellation risk থাকে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Group Booking কী?
            </h3>

            <p>
                সাধারণত <b>10 জন বা তার বেশি passenger</b> একই flight / same sector-এ travel করলে তাকে <b>Group Booking</b> বলা হয়।
            </p>

            <p class="text-secondary">
                Group booking common cases:
                <br>• Umrah / Hajj group
                <br>• Student / tour group
                <br>• Corporate movement
                <br>• Sports / cultural team
            </p>

            <div class="info-box">
                📌 Airline group booking আলাদা rules ও deadline follow করে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Group Booking vs Individual Booking
            </h3>

            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>Point</th>
                        <th>Group Booking</th>
                        <th>Individual Booking</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Passenger Count</td>
                        <td>10+</td>
                        <td>1–9</td>
                    </tr>
                    <tr>
                        <td>Fare</td>
                        <td>Negotiated</td>
                        <td>Published</td>
                    </tr>
                    <tr>
                        <td>Name Deadline</td>
                        <td>Later</td>
                        <td>Immediate</td>
                    </tr>
                    <tr>
                        <td>Penalty</td>
                        <td>Strict</td>
                        <td>As per fare rule</td>
                    </tr>
                </tbody>
            </table>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Galileo – Group Request
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Group Availability</div>
                <pre class="gds-code">
A15DEC DACDXB/GRP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Example Response</div>
                <pre class="gds-code">
GROUP REQUEST SENT – PENDING AIRLINE APPROVAL
        </pre>
            </div>

            <p class="text-secondary">
                Galileo-এ group request পাঠানো হয়, final confirmation airline group desk দেয়।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Sabre – Group Booking
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Group Availability</div>
                <pre class="gds-code">
1ODACDXB15DEC‡G
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Group Status</div>
                <pre class="gds-code">
GROUP SPACE ON REQUEST
        </pre>
            </div>

            <p class="text-secondary">
                Sabre group booking সবসময় “on request” basis।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Amadeus – Group Booking
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Group Request</div>
                <pre class="gds-code">
AN15DECDACDXB/GRP
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Example Result</div>
                <pre class="gds-code">
GROUP REQUEST SENT – WAITING CONFIRMATION
        </pre>
            </div>

            <p class="text-secondary">
                Amadeus group booking airline-controlled।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Group Booking Deadlines
            </h3>

            <ul class="visa-list">
                <li>✔ Deposit deadline (initial payment)</li>
                <li>✔ Name submission deadline</li>
                <li>✔ Final ticketing deadline</li>
                <li>✔ Cancellation deadline</li>
            </ul>

            <div class="info-box">
                📌 Deadline miss করলে airline group cancel করতে পারে।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 7 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">7.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Group terms & conditions লিখিতভাবে নিন</li>
                <li>✔ Payment & deadline clearly communicate করুন</li>
                <li>✔ Name list verified করে submit করুন</li>
                <li>✔ Last moment change avoid করুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Group booking মানেই বড় responsibility ও বড় revenue। Small mistake মানেই বড় loss।
                        <b>Trip Designer</b> শেখায় airline-approved group handling real GDS workflow সহ।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/30') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/32') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection