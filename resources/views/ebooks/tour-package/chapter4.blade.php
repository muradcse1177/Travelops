@extends('ebooks.tour-package.layout.app')

@section('title','ট্যুর প্যাকেজে কী কী অন্তর্ভুক্ত থাকে')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">ট্যুর প্যাকেজে কী কী অন্তর্ভুক্ত থাকে</h2>

    <p>
        অনেক কাস্টমার ট্যুর প্যাকেজ দেখার সময় শুধু দামটাই দেখেন,
        কিন্তু একজন স্মার্ট ট্রাভেল এজেন্ট জানেন—
        <b>প্যাকেজের ভিতরে কী আছে সেটাই আসল বিষয়</b>।
        এই অধ্যায়ে আমরা বিস্তারিতভাবে দেখবো
        একটি স্ট্যান্ডার্ড ট্যুর প্যাকেজে কী কী অন্তর্ভুক্ত থাকে।
    </p>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. ট্রান্সপোর্ট (Transport)</h3>

    <p>
        ট্রান্সপোর্ট হলো ট্যুর প্যাকেজের মূল ভিত্তি।
        এটি সঠিকভাবে পরিকল্পনা না হলে পুরো ট্যুর এলোমেলো হয়ে যেতে পারে।
    </p>

    <ul class="visa-list">
        <li>✔ Air Ticket / Bus / Train</li>
        <li>✔ Airport Pickup & Drop</li>
        <li>✔ Local Sightseeing Transfer</li>
        <li>✔ Private / Shared Vehicle</li>
    </ul>

    <div class="highlight-box">
        পরিষ্কারভাবে উল্লেখ করতে হবে —
        Economy নাকি Business Class,
        Private নাকি SIC Transport।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. হোটেল ও থাকার ব্যবস্থা (Accommodation)</h3>

    <p>
        হোটেল কাস্টমারের সন্তুষ্টির সবচেয়ে বড় অংশ।
        ভালো হোটেল মানেই ভালো রিভিউ।
    </p>

    <ul class="visa-list">
        <li>✔ Hotel Category (3★ / 4★ / 5★)</li>
        <li>✔ Room Type (Single / Double / Triple)</li>
        <li>✔ City Center / Outskirts Location</li>
        <li>✔ Number of Nights</li>
    </ul>

    <div class="info-box">
        হোটেলের নাম উল্লেখ করা না গেলে
        "Similar Category Hotel" লিখে পরিষ্কার করতে হবে।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. খাবার (Meal Plan)</h3>

    <p>
        খাবার বিষয়টি বাংলাদেশি ট্রাভেলারদের জন্য খুবই গুরুত্বপূর্ণ।
    </p>

    <ul class="visa-list">
        <li>✔ Breakfast Only</li>
        <li>✔ Half Board (Breakfast + Dinner)</li>
        <li>✔ Full Board (Breakfast + Lunch + Dinner)</li>
        <li>✔ Halal Food Arrangement</li>
    </ul>

    <div class="highlight-box">
        Meal Plan পরিষ্কার না হলে
        ট্যুর শেষে সবচেয়ে বেশি অভিযোগ আসে।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. Sightseeing ও Activities</h3>

    <p>
        ট্যুরের আনন্দের অংশ হলো Sightseeing।
        এখানে পরিষ্কারভাবে উল্লেখ করা প্রয়োজন।
    </p>

    <ul class="visa-list">
        <li>✔ কোন কোন জায়গা ভিজিট করা হবে</li>
        <li>✔ Entrance Fees Included নাকি নয়</li>
        <li>✔ Optional Activities</li>
        <li>✔ Free Time উল্লেখ</li>
    </ul>

    <div class="info-box">
        Optional Activity আলাদা করে লিখলে
        কাস্টমারের expectation ঠিক থাকে।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. ট্যুর গাইড ও কো-অর্ডিনেশন</h3>

    <ul class="visa-list">
        <li>✔ Local Tour Guide</li>
        <li>✔ বাংলা / ইংরেজি ভাষা</li>
        <li>✔ Tour Coordinator Support</li>
        <li>✔ Emergency Contact</li>
    </ul>

    <div class="highlight-box">
        Group Tour-এ Guide না থাকলে
        Chaos হওয়ার সম্ভাবনা বেশি।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. ভিসা, ইন্স্যুরেন্স ও অতিরিক্ত সার্ভিস</h3>

    <p>
        অনেক প্যাকেজে ভিসা সার্ভিস অন্তর্ভুক্ত থাকে,
        আবার অনেক ক্ষেত্রে আলাদা করা হয়।
    </p>

    <ul class="visa-list">
        <li>✔ Visa Processing (If Included)</li>
        <li>✔ Travel Insurance</li>
        <li>✔ Airport Assistance</li>
        <li>✔ 24/7 Support</li>
    </ul>

    <div class="info-box">
        ভিসা অন্তর্ভুক্ত না হলে
        স্পষ্টভাবে "Visa Not Included" লিখুন।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading">৭. Inclusions বনাম Exclusions পরিষ্কার করা</h3>

    <ul class="visa-list">
        <li>✔ What is Included</li>
        <li>✔ What is Not Included</li>
        <li>✔ Personal Expenses</li>
        <li>✔ Tips & Porterage</li>
    </ul>

    <div class="highlight-box">
        যত বেশি পরিষ্কার করবেন,
        তত কম ঝামেলা হবে।
    </div>

    <!-- TD SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Clear Tour Inclusions, Transparent Pricing এবং
                Professional Package Structuring-এর জন্য  
                <b>Trip Designer</b> সম্পূর্ণ সহায়তা দেয়।
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
        <a href="{{ url('/ebooks/tour-package/chapter/3') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/5') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection