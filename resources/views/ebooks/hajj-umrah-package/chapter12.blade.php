@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','ভিসা রিজেকশন এড়ানোর কৌশল | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        ভিসা রিজেকশন এড়ানোর কৌশল
    </h2>

    <p>
        হজ্জ ও উমরাহ ভিসা রিজেকশন মানেই—
        শুধু সময় ও টাকা নষ্ট নয়,
        বরং হাজীর মানসিক কষ্টও।
        এই অধ্যায়ে আমরা জানবো—
        কেন ভিসা রিজেক্ট হয়,
        সাধারণ ভুলগুলো কী
        এবং একজন <strong>Trip Designer</strong> হিসেবে
        কীভাবে এই ঝুঁকি প্রায় শূন্যে নামিয়ে আনবেন।
    </p>

    <div class="highlight-box">
        Visa rejection is not bad luck —  
        it’s usually a process mistake
    </div>

    <!-- =========================
         SECTION 1
    ========================= -->
    <h3 class="section-heading">১. ভিসা রিজেকশনের প্রধান কারণ</h3>

    <ul class="visa-list">
        <li>❌ পাসপোর্ট validity কম</li>
        <li>❌ নাম বা জন্মতারিখ mismatch</li>
        <li>❌ ভুল বা পুরনো ছবি</li>
        <li>❌ Nusuk data entry error</li>
        <li>❌ ভ্যাকসিন তথ্য অসম্পূর্ণ</li>
    </ul>

    <div class="info-box">
        Most rejections  
        happen due to human error
    </div>

    <!-- =========================
         SECTION 2
    ========================= -->
    <h3 class="section-heading">২. নাম ও ডেটা mismatch কীভাবে এড়াবেন?</h3>
    <p>
        নামের spelling mismatch
        সবচেয়ে common এবং
        সবচেয়ে dangerous ভুল।
    </p>

    <ul class="visa-list">
        <li>✔ Passport অনুযায়ী exact spelling</li>
        <li>✔ NID ও passport cross-check</li>
        <li>✔ Nusuk-এ copy–paste না করে manual verify</li>
    </ul>

    <div class="highlight-box">
        One letter difference  
        can block the entire system
    </div>

    <!-- =========================
         SECTION 3
    ========================= -->
    <h3 class="section-heading">৩. ছবি ও ডকুমেন্ট সংক্রান্ত সতর্কতা</h3>

    <ul class="visa-list">
        <li>✔ Recent photo (max 6 months)</li>
        <li>✔ White background, no shadow</li>
        <li>✔ Clear face, no blur</li>
        <li>✔ Correct document format</li>
    </ul>

    <div class="info-box">
        Do not reuse old photos  
        from previous visas
    </div>

    <!-- =========================
         SECTION 4
    ========================= -->
    <h3 class="section-heading">৪. Nusuk ও সিস্টেমভিত্তিক ভুল এড়ানো</h3>
    <p>
        Nusuk সিস্টেম automated,
        তাই এখানে manual excuse চলে না।
    </p>

    <ul class="visa-list">
        <li>✔ Hotel & visa linking confirm</li>
        <li>✔ Travel date match check</li>
        <li>✔ Mahram info (for female pilgrims)</li>
        <li>✔ Early registration</li>
    </ul>

    <div class="highlight-box">
        System rejection  
        means zero negotiation
    </div>

    <!-- =========================
         SECTION 5
    ========================= -->
    <h3 class="section-heading">৫. Trip Designer-এর Pro Checklist</h3>

    <ul class="visa-list">
        <li>✔ Passport validity 6+ months</li>
        <li>✔ All spelling double verified</li>
        <li>✔ Vaccine certificate uploaded</li>
        <li>✔ Nusuk screenshot saved</li>
        <li>✔ Pilgrim briefing completed</li>
    </ul>

    <div class="info-box">
        One extra check  
        saves weeks of headache
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
                ✔ Rejection-safe Visa Process  
                ✔ Nusuk Compliant Packages  
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
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/11') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/13') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection