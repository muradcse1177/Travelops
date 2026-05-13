@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','হারাম শরীফের দূরত্ব ও ক্যাটাগরি | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        হারাম শরীফের দূরত্ব ও ক্যাটাগরি
    </h2>

    <p>
        হজ্জ ও উমরাহ প্যাকেজে  
        সবচেয়ে বেশি ভুল বোঝাবুঝি হয়
        <strong>হারাম শরীফের দূরত্ব</strong> নিয়ে।
        “হারামের কাছে” কথাটার মানে
        সবার কাছে এক না।
        এই অধ্যায়ে আমরা জানবো—
        হারাম শরীফের দূরত্ব কীভাবে মাপা হয়,
        বিভিন্ন ক্যাটাগরি কী
        এবং একজন <strong>Trip Designer</strong> হিসেবে
        কীভাবে পরিষ্কারভাবে বুঝিয়ে দেবেন।
    </p>

    <div class="highlight-box">
        Distance clarity  
        = Zero complaints
    </div>

    <!-- =========================
         SECTION 1
    ========================= -->
    <h3 class="section-heading">১. হারাম শরীফের দূরত্ব কীভাবে নির্ধারণ হয়?</h3>
    <p>
        হারামের দূরত্ব
        কখনোই “লাইন ধরে” মাপা হয় না।
        বাস্তবে মাপা হয়—
        <strong>হাঁটার সময় ও রুট</strong> অনুযায়ী।
    </p>

    <ul class="visa-list">
        <li>✔ Google Map walking distance</li>
        <li>✔ Tunnel, bridge ও escalator বিবেচনা</li>
        <li>✔ ভিড় ও traffic flow</li>
    </ul>

    <div class="info-box">
        300 meter straight ≠  
        300 meter walking
    </div>

    <!-- =========================
         SECTION 2
    ========================= -->
    <h3 class="section-heading">২. হারাম শরীফের দূরত্বের ক্যাটাগরি</h3>

    <ul class="visa-list">
        <li>✔ Very Close: 0–300 meter (VIP)</li>
        <li>✔ Close: 300–700 meter</li>
        <li>✔ Medium: 700m – 1.2 km</li>
        <li>✔ Far: 1.2 km+ (Shuttle required)</li>
    </ul>

    <div class="highlight-box">
        Distance category  
        defines package price
    </div>

    <!-- =========================
         SECTION 3
    ========================= -->
    <h3 class="section-heading">৩. বয়স্ক হাজীদের জন্য কোন দূরত্ব নিরাপদ?</h3>
    <p>
        বয়স ও শারীরিক সক্ষমতা অনুযায়ী
        দূরত্ব নির্বাচন করা
        খুবই গুরুত্বপূর্ণ।
    </p>

    <ul class="visa-list">
        <li>✔ Elderly → 0–500 meter</li>
        <li>✔ Average → up to 800 meter</li>
        <li>✔ Young → 1 km+ possible</li>
    </ul>

    <div class="info-box">
        Wrong distance choice  
        causes exhaustion & complaints
    </div>

    <!-- =========================
         SECTION 4
    ========================= -->
    <h3 class="section-heading">৪. Trip Designer হিসেবে সাধারণ ভুল</h3>

    <ul class="visa-list">
        <li>❌ “5 minute walking” vague promise</li>
        <li>❌ Actual walking route না দেখানো</li>
        <li>❌ Elderly health ignore করা</li>
        <li>❌ Shuttle dependency লুকানো</li>
    </ul>

    <div class="highlight-box">
        Distance exaggeration  
        kills long-term trust
    </div>

    <!-- =========================
         SECTION 5
    ========================= -->
    <h3 class="section-heading">৫. Professional Distance Disclosure Formula</h3>

    <ul class="visa-list">
        <li>✔ Walking time (minutes)</li>
        <li>✔ Google map screenshot</li>
        <li>✔ Route explanation (tunnel/bridge)</li>
        <li>✔ Crowd impact explanation</li>
    </ul>

    <div class="info-box">
        Transparency  
        turns clients into promoters
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
                ✔ Accurate Distance Disclosure  
                ✔ Prime Location Packages  
                ✔ Trusted Hajj & Umrah Support
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
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/14') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/16') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection