@extends('ebooks.tour-package.layout.app')

@section('title','পারফেক্ট Itinerary তৈরির ফর্মুলা')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">পারফেক্ট Itinerary তৈরির ফর্মুলা</h2>

    <p>
        একটি ট্যুর প্যাকেজ যত সুন্দরই হোক,
        যদি Itinerary দুর্বল হয়—
        কাস্টমার Confused হয় এবং Trust কমে যায়।
        এই অধ্যায়ে আপনি শিখবেন
        কীভাবে একটি <b>Clear, Professional ও Sellable Itinerary</b>
        তৈরি করতে হয়।
    </p>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. Itinerary আসলে কী?</h3>

    <p>
        Itinerary হলো দিনভিত্তিক ভ্রমণ পরিকল্পনা,
        যেখানে প্রতিদিন কী হবে, কখন হবে
        এবং কোথায় হবে—সবকিছু পরিষ্কারভাবে লেখা থাকে।
    </p>

    <div class="highlight-box">
        Good Itinerary = Clear Plan + Customer Confidence
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. পারফেক্ট Itinerary-এর মূল উপাদান</h3>

    <ul class="visa-list">
        <li>✔ Day-wise breakdown</li>
        <li>✔ Hotel check-in / check-out</li>
        <li>✔ Sightseeing details</li>
        <li>✔ Meal information</li>
        <li>✔ Free time mention</li>
    </ul>

    <div class="info-box">
        যত বেশি পরিষ্কার হবে,
        তত কম প্রশ্ন আসবে।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Day-wise Itinerary লেখার সঠিক পদ্ধতি</h3>

    <p>
        প্রতিটি দিন আলাদা শিরোনাম দিয়ে শুরু করুন।
    </p>

    <ul class="visa-list">
        <li>✔ Day 1: Arrival + Hotel Check-in</li>
        <li>✔ Day 2: City Tour + Sightseeing</li>
        <li>✔ Day 3: Free Day / Optional Tour</li>
    </ul>

    <div class="highlight-box">
        প্রতিদিনের শুরু ও শেষ কীভাবে হবে—
        সেটি অবশ্যই উল্লেখ করবেন।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. Over-Packing ভুল এড়িয়ে চলুন</h3>

    <p>
        অনেক নতুন এজেন্ট Itinerary-তে
        অতিরিক্ত জায়গা ঢুকিয়ে ফেলেন।
    </p>

    <ul class="visa-list">
        <li>❌ এক দিনে বেশি sightseeing</li>
        <li>❌ Travel time ignore করা</li>
        <li>❌ Rest time না রাখা</li>
    </ul>

    <div class="info-box">
        Realistic Itinerary মানেই
        Happy Customer।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. Optional Activity কীভাবে দেখাবেন?</h3>

    <p>
        Optional activity আলাদা করে দেখালে
        কাস্টমারের expectation ঠিক থাকে।
    </p>

    <ul class="visa-list">
        <li>✔ Clearly marked as Optional</li>
        <li>✔ Extra cost mention</li>
        <li>✔ Time slot indication</li>
    </ul>

    <div class="highlight-box">
        Optional activity = Upsell opportunity
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Bangladesh-Friendly Itinerary Tips</h3>

    <ul class="visa-list">
        <li>✔ Halal food mention</li>
        <li>✔ Prayer time consideration</li>
        <li>✔ Family & child friendly pacing</li>
        <li>✔ Shopping time inclusion</li>
    </ul>

    <div class="info-box">
        কাস্টমারের Culture বুঝে
        Itinerary বানানোই Trip Designer-এর কাজ।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading">৭. Itinerary Presentation কেমন হওয়া উচিত?</h3>

    <ul class="visa-list">
        <li>✔ Clean formatting</li>
        <li>✔ Easy language</li>
        <li>✔ No spelling mistakes</li>
        <li>✔ Professional tone</li>
    </ul>

    <div class="highlight-box">
        Itinerary দেখেই কাস্টমার বুঝে নেয়—
        আপনি Professional কিনা।
    </div>

    <!-- TD SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Professional Itinerary Design,
                Custom Tour Planning এবং
                Client-Friendly Presentation-এর জন্য  
                <b>Trip Designer</b> নির্ভরযোগ্য সমাধান দেয়।
            </p>
        </div>

        <div class="td-card-footer">

            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">WhatsApp</div>
                    <a href="https://wa.me/8801316444266" target="_blank">+8801316444266</a>
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
        <a href="{{ url('/ebooks/tour-package/chapter/6') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/8') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection