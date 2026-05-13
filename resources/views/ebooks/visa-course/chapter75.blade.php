@extends('ebooks.visa-course.layout.app')

@section('title','ফ্রি টুলস (Free Tools)')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">ফ্রি টুলস (Free Tools)</h2>

    <p>
        ভিসা প্রসেসিং, ট্রাভেল প্ল্যানিং এবং ডকুমেন্ট প্রস্তুতিতে
        কিছু <b>ফ্রি অনলাইন টুলস</b> সঠিকভাবে ব্যবহার করলে
        কাজ অনেক সহজ ও দ্রুত হয়ে যায়।
        নিচে ভিসা আবেদনকারীদের জন্য কিছু
        অত্যন্ত দরকারী ফ্রি টুলস তুলে ধরা হলো।
    </p>

    <div class="highlight-box">
        সঠিক টুল ব্যবহার করলে সময় বাঁচে এবং ভুল কমে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">Visa Application & Status Check Tools</h3>
    <ul class="visa-list">
        <li>✔ DS-160 Application (USA): https://ceac.state.gov</li>
        <li>✔ USA Visa Status Check: https://ceac.state.gov/CEACStatTracker</li>
        <li>✔ VFS Global Tracking: https://www.vfsglobal.com</li>
        <li>✔ Embassy Visa Information Portals</li>
    </ul>

    <!-- SECTION 2 -->
    <h3 class="section-heading">Travel Planning Tools</h3>
    <ul class="visa-list">
        <li>✔ Google Flights – Air Fare Comparison</li>
        <li>✔ Skyscanner – Cheapest Flight Search</li>
        <li>✔ Google Maps – Location & Route Planning</li>
        <li>✔ Booking.com – Hotel Price Comparison</li>
    </ul>

    <div class="info-box">
        Dummy booking তৈরি করার সময় সতর্কতা অবলম্বন করা উচিত।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">Document & File Preparation Tools</h3>
    <ul class="visa-list">
        <li>✔ PDF Compressor – ফাইল সাইজ কমানোর জন্য</li>
        <li>✔ PDF Merger – একাধিক ডকুমেন্ট এক ফাইলে</li>
        <li>✔ Online Photo Resize Tool (Visa Photo)</li>
        <li>✔ Google Docs – Cover Letter / SOP Draft</li>
    </ul>

    <!-- SECTION 4 -->
    <h3 class="section-heading">Currency & Financial Tools</h3>
    <ul class="visa-list">
        <li>✔ Google Currency Converter</li>
        <li>✔ XE Currency Converter</li>
        <li>✔ Bank Exchange Rate Checker</li>
    </ul>

    <!-- SECTION 5 -->
    <h3 class="section-heading">Student & Education Related Tools</h3>
    <ul class="visa-list">
        <li>✔ University Official Websites</li>
        <li>✔ IELTS / Language Test Official Sites</li>
        <li>✔ Course Comparison Tools</li>
    </ul>

    <div class="highlight-box">
        সব তথ্য অবশ্যই অফিসিয়াল সোর্স থেকে যাচাই করা উচিত।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">Free Tools ব্যবহারের সময় সতর্কতা</h3>
    <ul class="visa-list">
        <li>✔ তৃতীয়-পক্ষ অনির্ভরযোগ্য ওয়েবসাইট এড়িয়ে চলুন</li>
        <li>✔ ব্যক্তিগত তথ্য সাবধানে ব্যবহার করুন</li>
        <li>✔ Embassy নির্দেশনা সবসময় প্রাধান্য দিন</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Free Tools ব্যবহার,
                Visa Application Guidance এবং
                Professional File Preparation-এর জন্য
                <b>Trip Designer</b> অভিজ্ঞ সাপোর্ট প্রদান করে।
            </p>
        </div>

        <div class="td-card-footer">
            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">WhatsApp</div>
                    <a href="https://wa.me/8801707011562" target="_blank">+8801707011562</a>
                </div>
            </div>

            <div class="td-contact-box">
                <span class="cta-icon">🌐</span>
                <div>
                    <div class="cta-label">Website</div>
                    <a href="https://tripdesigner.net" target="_blank">tripdesigner.net</a>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVIGATION -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/visa-course/chapter/74') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/') }}" class="btn btn-primary">সূচিপত্র ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection