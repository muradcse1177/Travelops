@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 6 - Galileo vs Sabre vs Amadeus')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Galileo vs Sabre vs Amadeus</h2>

    <p>
        বর্তমানে বিশ্বব্যাপী Air Ticketing-এর জন্য  
        তিনটি প্রধান GDS সবচেয়ে বেশি ব্যবহৃত হয় —  
        <b>Galileo, Sabre এবং Amadeus</b>।  
        এই অধ্যায়ে আমরা জানবো এদের পার্থক্য, ব্যবহার  
        এবং একজন Ticketing Agent-এর জন্য কোনটা কেন গুরুত্বপূর্ণ।
    </p>

    <div class="highlight-box">
        GDS আলাদা হলেও workflow প্রায় একই — skill transferable।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> Galileo GDS</h3>

    <p>
        <b>Galileo</b> হলো Travelport group-এর একটি GDS  
        যা ইউরোপ, এশিয়া ও আফ্রিকা অঞ্চলে বেশি ব্যবহৃত।
    </p>

    <ul class="visa-list">
        <li>✔ Beginner-friendly interface</li>
        <li>✔ Strong airline coverage</li>
        <li>✔ Corporate & leisure booking</li>
        <li>✔ Popular in Bangladesh & South Asia</li>
    </ul>

    <div class="info-box">
        Galileo = Easy learning + wide usage
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> Sabre GDS</h3>

    <p>
        <b>Sabre</b> মূলত USA-based GDS  
        যা North America ও corporate market-এ বেশি জনপ্রিয়।
    </p>

    <ul class="visa-list">
        <li>✔ Strong US airline coverage</li>
        <li>✔ Advanced pricing tools</li>
        <li>✔ Corporate travel management</li>
        <li>✔ ARC system integration</li>
    </ul>

    <div class="highlight-box">
        Sabre = USA market mastery
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> Amadeus GDS</h3>

    <p>
        <b>Amadeus</b> হলো Europe-based সবচেয়ে শক্তিশালী GDS  
        যা international market-এ ব্যাপকভাবে ব্যবহৃত।
    </p>

    <ul class="visa-list">
        <li>✔ Strong international airline coverage</li>
        <li>✔ Powerful pricing & inventory tools</li>
        <li>✔ Used by major global airlines</li>
        <li>✔ Advanced automation support</li>
    </ul>

    <div class="info-box">
        Amadeus = Global dominance
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> Galileo vs Sabre vs Amadeus (Comparison)</h3>

    <table class="table table-bordered summary-table">
        <thead class="table-primary">
            <tr>
                <th>বিষয়</th>
                <th>Galileo</th>
                <th>Sabre</th>
                <th>Amadeus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Main Region</td>
                <td>Asia / Europe</td>
                <td>USA</td>
                <td>Global</td>
            </tr>
            <tr>
                <td>Learning Curve</td>
                <td>Easy</td>
                <td>Medium</td>
                <td>Medium</td>
            </tr>
            <tr>
                <td>Corporate Use</td>
                <td>Medium</td>
                <td>High</td>
                <td>High</td>
            </tr>
            <tr>
                <td>Popularity</td>
                <td>High (South Asia)</td>
                <td>High (USA)</td>
                <td>Very High (Global)</td>
            </tr>
        </tbody>
    </table>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> কোন GDS শিখবেন?</h3>

    <ul class="visa-list">
        <li>✔ Bangladesh / Asia → Galileo</li>
        <li>✔ USA Market → Sabre</li>
        <li>✔ International Career → Amadeus</li>
        <li>✔ Best option → Any one + workflow mastery</li>
    </ul>

    <div class="highlight-box">
        একটি GDS ভালোভাবে শিখলে অন্যগুলো শেখা সহজ।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> Job & Career Perspective</h3>

    <ul class="visa-list">
        <li>✔ All three GDS job demand রয়েছে</li>
        <li>✔ Skill transferable between systems</li>
        <li>✔ Agency ও airline—দুই জায়গাতেই সুযোগ</li>
        <li>✔ Freelance & remote job possibility</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Galileo, Sabre ও Amadeus  
                Practical Comparison ও Hands-on Training-এর জন্য  
                <b>Trip Designer</b> নির্ভরযোগ্য পার্টনার।
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

    <!-- NAV BUTTONS -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/air-ticket/chapter/5') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/7') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection