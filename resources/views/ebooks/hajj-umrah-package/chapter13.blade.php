@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','এয়ার টিকেট বুকিং স্ট্র্যাটেজি | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        এয়ার টিকেট বুকিং স্ট্র্যাটেজি
    </h2>

    <p>
        হজ্জ ও উমরাহ প্যাকেজের
        সবচেয়ে বড় খরচের অংশ হলো
        <strong>এয়ার টিকেট</strong>।
        ভুল সময় বা ভুল স্ট্র্যাটেজিতে টিকেট কাটলে
        পুরো প্যাকেজই লস হয়ে যেতে পারে।
        এই অধ্যায়ে আমরা জানবো—
        কখন টিকেট বুক করা উচিত,
        কোন এয়ারলাইন্স ভালো,
        এবং একজন <strong>Trip Designer</strong> হিসেবে
        কীভাবে ঝুঁকি কমাবেন।
    </p>

    <div class="highlight-box">
        Smart ticket strategy  
        = Controlled package cost
    </div>

    <!-- =========================
         SECTION 1
    ========================= -->
    <h3 class="section-heading">১. হজ্জ ও উমরাহ টিকেটের পার্থক্য</h3>
    <p>
        হজ্জ মৌসুমে
        টিকেটের দাম, availability
        এবং নিয়ম একদম আলাদা হয়।
        উমরাহ টিকেট তুলনামূলকভাবে
        বেশি ফ্লেক্সিবল।
    </p>

    <ul class="visa-list">
        <li>✔ হজ্জ টিকেট → Seasonal & quota based</li>
        <li>✔ উমরাহ টিকেট → Year-round availability</li>
        <li>✔ হজ্জ → Cancellation restriction বেশি</li>
    </ul>

    <div class="info-box">
        Hajj ticket mistake  
        = Huge financial loss
    </div>

    <!-- =========================
         SECTION 2
    ========================= -->
    <h3 class="section-heading">২. কখন টিকেট বুক করা সবচেয়ে ভালো?</h3>
    <p>
        খুব আগে বা খুব দেরিতে—
        দুইটাই ঝুঁকিপূর্ণ।
        সঠিক সময় নির্ভর করে
        ভিসা ও গ্রুপ কনফার্মেশনের উপর।
    </p>

    <ul class="visa-list">
        <li>✔ Umrah: Visa approval এর পর</li>
        <li>✔ Hajj: Ministry quota confirmation এর পর</li>
        <li>✔ Group ticket: Minimum pax confirm হলে</li>
    </ul>

    <div class="highlight-box">
        Never book tickets  
        before visa certainty
    </div>

    <!-- =========================
         SECTION 3
    ========================= -->
    <h3 class="section-heading">৩. কোন এয়ারলাইন্স নির্বাচন করবেন?</h3>

    <ul class="visa-list">
        <li>✔ Saudi Airlines (Direct, reliable)</li>
        <li>✔ Biman Bangladesh Airlines</li>
        <li>✔ Flynas / Flyadeal (Umrah)</li>
        <li>✔ Transit airline (only if budget required)</li>
    </ul>

    <div class="info-box">
        Elderly pilgrims  
        prefer direct flights
    </div>

    <!-- =========================
         SECTION 4
    ========================= -->
    <h3 class="section-heading">৪. Group Ticket বনাম Individual Ticket</h3>

    <ul class="visa-list">
        <li>✔ Group ticket → দাম কম, flexibility কম</li>
        <li>✔ Individual → দাম বেশি, change সুবিধা বেশি</li>
        <li>✔ Group → strict cancellation rule</li>
    </ul>

    <div class="highlight-box">
        Group ticket saves money  
        but increases responsibility
    </div>

    <!-- =========================
         SECTION 5
    ========================= -->
    <h3 class="section-heading">৫. Trip Designer-এর টিকেট বুকিং Pro Tips</h3>

    <ul class="visa-list">
        <li>✔ Always check baggage allowance</li>
        <li>✔ Avoid risky short transit</li>
        <li>✔ Save ticket rules & fare conditions</li>
        <li>✔ Explain refund policy to pilgrims</li>
        <li>✔ Keep buffer days for Hajj flights</li>
    </ul>

    <div class="info-box">
        A good ticket decision  
        prevents 50% complaints
    </div>

    <!-- =========================
         FINAL CTA (FIXED)
    ========================= -->
    <div class="td-card">

        <div class="td-card-body">
            <p class="td-text">
                আপনি কি নিজে অথবা পরিবারের জন্য  
                <strong>হজ্জ বা উমরাহ প্যাকেজ</strong> খুঁজছেন?
                <br><br>
                <strong>Trip Designer</strong> দিচ্ছে—
                ✔ Smart Ticket Planning  
                ✔ Trusted Hajj & Umrah Packages  
                ✔ Transparent Pricing & Support
            </p>
        </div>

        <div class="td-card-footer">

            <div class="td-contact-box">
                <span class="cta-icon">🕋</span>
                <div>
                    <div class="cta-label">Hajj & Umrah Packages</div>
                    <a href="https://tripdesigner.net/hajj-umrah" target="_blank">
                        Visit Official Page
                    </a>
                </div>
            </div>

            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">Consult with Trip Designer</div>
                    <a href="https://wa.me/8801316444646" target="_blank">
                        +8801316444646 (Contact Now)
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/12') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/14') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection