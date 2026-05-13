@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 57 – GDS Command Cheat Sheet')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                GDS Command Cheat Sheet
                <small class="text-muted">Bonus Tools & Pro Tips – Chapter 57</small>
            </h2>

            <p>
                এই অধ্যায়ে দেওয়া হয়েছে
                <b>Galileo, Sabre ও Amadeus</b>–এর সবচেয়ে বেশি ব্যবহৃত command গুলো
                <b>GDS অনুযায়ী আলাদা করে</b>।
            </p>

            <div class="highlight-box">
                📌 Interview-তে প্রায়ই জিজ্ঞেস করে: “এই command কোন GDS-এর?”
            </div>

            <!-- ================= GALILEO ================= -->
            <h3 class="section-heading">1. GALILEO – Common Commands</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Galileo Commands</div>
                <pre class="gds-code">
A15AUGDACDXB     → Availability
N1Y1             → Sell segment
N.P1/RAHIM KARIM → Passenger name
SI.P1/CTCM8801.. → Mobile contact
TKTL/20AUG/1800  → Ticketing time limit
FQ               → Auto pricing
TTP              → Ticket issue
TTP/EXCH         → Reissue
TRF              → Refund
QP/12            → Place on queue
QS/SC            → Schedule change queue
</pre>
            </div>

            <p class="text-secondary">
                ✔ Used mainly in <b>Galileo / Travelport</b>
            </p>

            <!-- ================= SABRE ================= -->
            <h3 class="section-heading">2. SABRE – Common Commands</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Sabre Commands</div>
                <pre class="gds-code">
1DACDXB15AUG     → Availability
01Y1             → Sell segment
-RAHIM/KARIM     → Passenger name
9M8801XXXXXXX    → Contact number
7TAW20AUG        → Ticketing deadline
WP               → Pricing
WETR             → Ticket report
WFR              → Refund
Q/12             → Queue access
</pre>
            </div>

            <p class="text-secondary">
                ✔ Used in <b>Sabre system</b>
            </p>

            <!-- ================= AMADEUS ================= -->
            <h3 class="section-heading">3. AMADEUS – Common Commands</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Amadeus Commands</div>
                <pre class="gds-code">
AN15AUGDACDXB    → Availability
SS1Y1            → Sell segment
NM1RAHIM/KARIM   → Passenger name
AP 8801XXXXXXX   → Contact
TKTL/20AUG       → Ticketing limit
FXP              → Pricing
TTP              → Ticket issue
TTP/EXCH         → Reissue
TRF              → Refund
QS12             → Queue
</pre>
            </div>

            <p class="text-secondary">
                ✔ Used in <b>Amadeus</b>
            </p>

            <!-- ================= INTERVIEW ================= -->
            <h3 class="section-heading">4. Interview Ready Tip</h3>

            <div class="info-box">
                ✔ Galileo → A / N / SI / FQ ✔ Sabre → 1 / 0 / WP ✔ Amadeus → AN / SS / FXP
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Interview ও live job-এ সবচেয়ে common mistake হলো
                        <b>ভুল GDS-এর command বলা</b>।
                        <b>Trip Designer</b> এই cheat sheet দিয়েছে যেন আপনি confidently বলতে পারেন – “এই command এই GDS-এর”।
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

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/56') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/58') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>
        <div id="footer"></div>
@endsection