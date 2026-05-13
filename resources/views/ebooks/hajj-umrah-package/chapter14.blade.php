@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','মক্কা ও মদিনার হোটেল নির্বাচন | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        মক্কা ও মদিনার হোটেল নির্বাচন
    </h2>

    <p>
        হজ্জ ও উমরাহ যাত্রায়  
        <strong>হোটেল নির্বাচন</strong> সরাসরি
        হাজীর ইবাদতের মানের উপর প্রভাব ফেলে।
        ভুল হোটেল মানে—
        অতিরিক্ত হাঁটা, ক্লান্তি
        এবং ইবাদতে মনোযোগ নষ্ট।
        এই অধ্যায়ে আমরা জানবো—
        মক্কা ও মদিনায় হোটেল কীভাবে নির্বাচন করবেন
        একজন <strong>Trip Designer</strong> হিসেবে।
    </p>

    <div class="highlight-box">
        Better hotel location  
        = Better Ibadah focus
    </div>

    <!-- =========================
         SECTION 1
    ========================= -->
    <h3 class="section-heading">১. মক্কার হোটেল নির্বাচন কেন গুরুত্বপূর্ণ?</h3>
    <p>
        মক্কায় অধিকাংশ ইবাদত হয়
        হাঁটা ও সময়ের উপর নির্ভর করে।
        তাই হারামের দূরত্ব
        সবচেয়ে বড় ফ্যাক্টর।
    </p>

    <ul class="visa-list">
        <li>✔ নামাজের জন্য বারবার হারামে যাওয়া</li>
        <li>✔ তাওয়াফ ও উমরাহ সহজ হয়</li>
        <li>✔ বয়স্ক হাজীদের জন্য আরাম</li>
    </ul>

    <div class="info-box">
        Makkah hotel location  
        matters more than star rating
    </div>

    <!-- =========================
         SECTION 2
    ========================= -->
    <h3 class="section-heading">২. মদিনার হোটেল নির্বাচন</h3>
    <p>
        মদিনায় ইবাদতের পরিবেশ
        তুলনামূলক শান্ত,
        কিন্তু এখানেও
        মসজিদে নববীর দূরত্ব গুরুত্বপূর্ণ।
    </p>

    <ul class="visa-list">
        <li>✔ Masjid-e-Nabawi distance</li>
        <li>✔ Ladies gate proximity</li>
        <li>✔ Lift & corridor convenience</li>
    </ul>

    <div class="highlight-box">
        In Madinah,  
        gate access matters more than luxury
    </div>

    <!-- =========================
         SECTION 3
    ========================= -->
    <h3 class="section-heading">৩. হোটেল ক্যাটাগরি (Budget / Standard / VIP)</h3>

    <ul class="visa-list">
        <li>✔ Budget → দূরের হোটেল, shuttle নির্ভর</li>
        <li>✔ Standard → walking distance, basic comfort</li>
        <li>✔ VIP → very close, minimal walking</li>
    </ul>

    <div class="info-box">
        Star rating ≠ Distance  
        (Always check Google map)
    </div>

    <!-- =========================
         SECTION 4
    ========================= -->
    <h3 class="section-heading">৪. Trip Designer হিসেবে সাধারণ ভুল</h3>

    <ul class="visa-list">
        <li>❌ শুধু star rating দেখে হোটেল বাছাই</li>
        <li>❌ actual walking distance না বলা</li>
        <li>❌ lift capacity ignore করা</li>
        <li>❌ room sharing clear না করা</li>
    </ul>

    <div class="highlight-box">
        Wrong hotel promise  
        causes maximum complaints
    </div>

    <!-- =========================
         SECTION 5
    ========================= -->
    <h3 class="section-heading">৫. Professional Hotel Selection Checklist</h3>

    <ul class="visa-list">
        <li>✔ Actual walking time (Google map)</li>
        <li>✔ Elevator & crowd handling</li>
        <li>✔ Room size & sharing clarity</li>
        <li>✔ Meal arrangement details</li>
        <li>✔ Contract & refund terms</li>
    </ul>

    <div class="info-box">
        Honest hotel briefing  
        builds lifelong trust
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
                ✔ Prime Location Hotels  
                ✔ Transparent Distance Disclosure  
                ✔ Trusted Hajj & Umrah Packages
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
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/13') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/15') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection