@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 59 – Speed Booking Tips')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Speed Booking Tips
                <small class="text-muted">Bonus Tools & Pro Tips – Chapter 59</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন কীভাবে
                <b>Galileo, Sabre ও Amadeus</b>-এ fast, error-free এবং professionalভাবে booking করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Speed মানে shortcut না, speed মানে correct workflow।
            </div>

            <!-- ================= GALILEO ================= -->
            <h3 class="section-heading">1. GALILEO – Speed Booking Tips</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tip 1: Direct Sell</div>
                <pre class="gds-code">
A15AUGDACDXB
N1Y1
</pre>
            </div>

            <p class="text-secondary">
                ✔ Availability দেখেই direct sell করলে time save হয়
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tip 2: Combined Entry</div>
                <pre class="gds-code">
N.P1/RAHIM KARIM+SI.P1/CTCM8801XXXX
</pre>
            </div>

            <p class="text-secondary">
                ✔ Passenger + contact এক লাইনে entry
            </p>

            <div class="info-box">
                📌 Galileo power entry speed dramatically বাড়ায়
            </div>

            <!-- ================= SABRE ================= -->
            <h3 class="section-heading">2. SABRE – Speed Booking Tips</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tip 1: Short Sell Format</div>
                <pre class="gds-code">
1DACDXB15AUG
01Y1
</pre>
            </div>

            <p class="text-secondary">
                ✔ Short availability format faster response দেয়
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tip 2: Name & Contact Fast Entry</div>
                <pre class="gds-code">
-RAHIM/KARIM
9M8801XXXXXXX
</pre>
            </div>

            <p class="text-secondary">
                ✔ Separate but fast structured input
            </p>

            <div class="highlight-box">
                ✔ Sabre speed আসে clean entry থেকে
            </div>

            <!-- ================= AMADEUS ================= -->
            <h3 class="section-heading">3. AMADEUS – Speed Booking Tips</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tip 1: Smart Sell</div>
                <pre class="gds-code">
AN15AUGDACDXB
SS1Y1
</pre>
            </div>

            <p class="text-secondary">
                ✔ Smart sell auto validation করে
            </p>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Tip 2: Auto Pricing</div>
                <pre class="gds-code">
FXP
TTP
</pre>
            </div>

            <p class="text-secondary">
                ✔ Pricing + ticket issue smooth
            </p>

            <div class="info-box">
                📌 FXP ছাড়া speed booking risky
            </div>

            <!-- ================= UNIVERSAL ================= -->
            <h3 class="section-heading">4. Universal Speed Formula (All GDS)</h3>

            <ul class="visa-list">
                <li>✔ Keyboard practice (mouse dependency কমান)</li>
                <li>✔ Fare rule skim reading skill</li>
                <li>✔ Queue follow-up discipline</li>
                <li>✔ One-screen workflow maintain</li>
            </ul>

            <!-- ================= RESULT ================= -->
            <h3 class="section-heading">5. Speed Booking Result</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PNR CREATED
FARE CONFIRMED
TICKET ISSUED IN 6 MINUTES
</pre>
            </div>

            <p class="text-secondary">
                ✔ Faster service ✔ Happy client
            </p>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Speed booking হলো professional agent-এর signature skill।
                        <b>Trip Designer</b> শেখায় GDS-wise shortcut, mistake-free fast workflow এবং real office productivity technique।
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
                <a href="{{ url('/ebooks/air-ticket/chapter/58') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/60') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>
        <div id="footer"></div>
@endsection