@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 27 – Reissue / Exchange')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Reissue / Exchange
                <small class="text-muted">Ticketing Operations – Step 2 (All GDS)</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Reissue / Exchange</b> কী, কখন ticket reissue করা লাগে, fare difference ও penalty কীভাবে apply হয় এবং বিভিন্ন GDS-এ কীভাবে correctly reissue করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Wrong reissue মানেই ADM, fare loss এবং airline dispute।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Reissue / Exchange কী?
            </h3>

            <p>
                <b>Reissue</b> মানে— already issued ticket-এ
                <b>date / flight / routing / class</b> change করে নতুন ticket issue করা।
            </p>

            <p class="text-secondary">
                Common reissue reasons:
                <br>• Date change
                <br>• Flight change
                <br>• Routing change
                <br>• Class upgrade / downgrade
            </p>

            <div class="info-box">
                📌 Name change reissue দিয়ে allowed নয় (airline policy)।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Reissue করার আগে Checklist
            </h3>

            <ul class="visa-list">
                <li>✔ Fare rule (change penalty) check</li>
                <li>✔ Additional collection (ADC) calculate</li>
                <li>✔ Fare difference (if any)</li>
                <li>✔ Passenger approval confirmed</li>
            </ul>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Galileo – Ticket Reissue
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Retrieve Ticket</div>
                <pre class="gds-code">
*HTE
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reprice Itinerary</div>
                <pre class="gds-code">
FQ
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reissue Command</div>
                <pre class="gds-code">
TKR
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reissue Result</div>
                <pre class="gds-code">
EXCH TKT 176-9876543210 ISSUED
ADC BDT 2500
        </pre>
            </div>

            <p class="text-secondary">
                • TKR = Ticket Reissue
                <br>• ADC = Additional Collection
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Sabre – Ticket Reissue
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Display Ticket</div>
                <pre class="gds-code">
*T
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reprice</div>
                <pre class="gds-code">
WPNC
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reissue Command</div>
                <pre class="gds-code">
W‡ER
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reissue Result</div>
                <pre class="gds-code">
EXCHANGE TICKET ISSUED
ADC BDT2500
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ W‡ER = Exchange Reissue
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Amadeus – Ticket Reissue
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Display Ticket</div>
                <pre class="gds-code">
TWD
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reprice</div>
                <pre class="gds-code">
FXQ
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reissue Command</div>
                <pre class="gds-code">
TTP/EXCH
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Reissue Result</div>
                <pre class="gds-code">
OK ETKT EXCH 176-9876543210
ADC BDT2500
        </pre>
            </div>

            <p class="text-secondary">
                • EXCH = Exchange ticket
                <br>• Fare difference + penalty auto adjust
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Even Exchange vs Additional Collection
            </h3>

            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Even Exchange</td>
                        <td>No fare difference (only penalty)</td>
                    </tr>
                    <tr>
                        <td>ADC</td>
                        <td>Fare increase + penalty</td>
                    </tr>
                </tbody>
            </table>

            <div class="info-box">
                📌 Fare decrease হলে usually refund via EMD/Refund process।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 7 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">7.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Passenger approval ছাড়া reissue করবেন না</li>
                <li>✔ Old ticket number record রাখুন</li>
                <li>✔ Fare rule reissue section double check করুন</li>
                <li>✔ Reissue confirmation verify করুন</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Reissue / Exchange হলো advanced ticketing skill। Wrong handling মানেই agency loss।
                        <b>Trip Designer</b> শেখায় zero-error reissue logic real GDS practice সহ।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/26') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/28') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection