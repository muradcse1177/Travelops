@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 13 – Schedule Change Handling')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Schedule Change Handling
                <small class="text-muted">All GDS – Explained</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন Airline <b>Schedule Change</b> কী, কেন হয়, এবং একজন professional agent হিসেবে কীভাবে
                <b>Galileo, Sabre ও Amadeus</b>-এ এটি সঠিকভাবে handle করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Schedule change ভুলভাবে handle করলে passenger complaint, ADM এবং agency liability হতে পারে।
            </div>

            <!-- ============================= -->
            <!-- SECTION 1 -->
            <!-- ============================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Schedule Change কী?
            </h3>

            <p>
                <b>Schedule Change</b> মানে Airline কোনো confirmed flight-এর
                <b>departure time, arrival time, flight number, aircraft বা routing</b> পরিবর্তন করলে।
            </p>

            <p class="text-secondary">
                Schedule change সাধারণত দুই ধরনের হয়:
                <br>• <b>Minor Schedule Change</b> – সামান্য সময় পরিবর্তন
                <br>• <b>Major Schedule Change</b> – flight cancel / connection break
            </p>

            <!-- ============================= -->
            <!-- SECTION 2 -->
            <!-- ============================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Airline কেন Schedule Change করে?
            </h3>

            <ul class="visa-list">
                <li>✔ Aircraft change</li>
                <li>✔ Operational issue</li>
                <li>✔ Seasonal timetable update</li>
                <li>✔ Airport slot restriction</li>
                <li>✔ Low load factor flight cancellation</li>
            </ul>

            <!-- ============================= -->
            <!-- SECTION 3 -->
            <!-- ============================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> GDS-এ Schedule Change Indicator
            </h3>

            <p>
                Schedule change হলে GDS segment status পরিবর্তিত হয়। Agent হিসেবে এগুলো চিনতে পারা খুব গুরুত্বপূর্ণ।
            </p>

            <!-- GALILEO -->
            <h4 class="section-subtitle">Galileo – Schedule Change</h4>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">PNR Segment</div>
                <pre class="gds-code">
1 TK 713 Y 15AUG DACIST 0230 0830 SC
        </pre>
            </div>

            <p class="text-secondary">
                <b>SC</b> = Schedule Change (Agent action required)
            </p>

            <!-- SABRE -->
            <h4 class="section-subtitle">Sabre – Schedule Change</h4>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">PNR Segment</div>
                <pre class="gds-code">
1 TK713 Y 15AUG DACIST 0230 0830 TK
        </pre>
            </div>

            <p class="text-secondary">
                <b>TK</b> = Time Change (confirmed but modified)
            </p>

            <!-- AMADEUS -->
            <h4 class="section-subtitle">Amadeus – Schedule Change</h4>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">PNR Segment</div>
                <pre class="gds-code">
1 TK713 Y 15AUG DAC IST 0230 0830 UN
        </pre>
            </div>

            <p class="text-secondary">
                <b>UN</b> = Segment cancelled / unavailable
            </p>

            <!-- ============================= -->
            <!-- SECTION 4 -->
            <!-- ============================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Agent-এর করণীয়
            </h3>

            <ul class="visa-list">
                <li>✔ Passenger-কে immediately inform করুন</li>
                <li>✔ New timing passenger accept করছে কিনা confirm করুন</li>
                <li>✔ Connection break হয়েছে কিনা check করুন</li>
                <li>✔ Airline policy অনুযায়ী revalidation বা reissue করুন</li>
            </ul>

            <div class="info-box">
                📌 Passenger acceptance ছাড়া কখনো schedule change confirm করবেন না।
            </div>

            <!-- ============================= -->
            <!-- SECTION 5 -->
            <!-- ============================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Revalidation vs Reissue
            </h3>

            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>Situation</th>
                        <th>Required Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Minor time change</td>
                        <td>Revalidation</td>
                    </tr>
                    <tr>
                        <td>Flight number change</td>
                        <td>Reissue</td>
                    </tr>
                    <tr>
                        <td>Connection break</td>
                        <td>Reissue / Reroute</td>
                    </tr>
                    <tr>
                        <td>Flight cancellation</td>
                        <td>Reissue / Refund</td>
                    </tr>
                </tbody>
            </table>

            <!-- ============================= -->
            <!-- SECTION 6 -->
            <!-- ============================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Schedule change সবসময় involuntary category</li>
                <li>✔ Fare difference সাধারণত apply হয় না</li>
                <li>✔ Same airline reroute safest option</li>
                <li>✔ OSI remark add করা best practice</li>
            </ul>
            <!-- ============================= -->
            <!-- TRIP DESIGNER CARD (Chapter 13 Specific) -->
            <!-- ============================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Schedule Change ঠিকভাবে handle না করলে passenger complaint, ADM ও agency loss হয়।
                        <b>Trip Designer</b> শেখায় real airline policy অনুযায়ী professional handling।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/12') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/14') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>


        <div id="footer"></div>
@endsection