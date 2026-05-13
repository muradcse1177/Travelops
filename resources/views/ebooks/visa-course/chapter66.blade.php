@extends('ebooks.visa-course.layout.app')

@section('title','লিড জেনারেশন ও মার্কেটিং')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">ভিসা প্রসেসিং ব্যবসা: লিড জেনারেশন ও মার্কেটিং</h2>

    <p>
        ভিসা প্রসেসিং ব্যবসায় ক্লায়েন্ট আসবে না—এমন ভাবলে ব্যবসা টিকবে না।
        তাই <b>Lead Generation</b> ও <b>Marketing Strategy</b>
        একটি এজেন্সির সবচেয়ে গুরুত্বপূর্ণ অংশ।
        এই অধ্যায়ে অনলাইন ও অফলাইন—দুই ধরনের কার্যকর মার্কেটিং কৌশল আলোচনা করা হয়েছে।
    </p>

    <div class="highlight-box">
        লিড যত বেশি ও কোয়ালিটি যত ভালো—ব্যবসার সফলতা তত বেশি।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. অনলাইন লিড জেনারেশন পদ্ধতি</h3>
    <ul class="visa-list">
        <li>✔ Facebook Page ও Group Marketing</li>
        <li>✔ WhatsApp Business Catalogue</li>
        <li>✔ Website + SEO Optimization</li>
        <li>✔ Google Ads / Facebook Ads</li>
    </ul>

    <div class="info-box">
        অনলাইন লিড তুলনামূলক কম খরচে বেশি পাওয়া যায়।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. কনটেন্ট মার্কেটিংয়ের গুরুত্ব</h3>
    <ul class="visa-list">
        <li>✔ Visa Tips & Educational Post</li>
        <li>✔ Success Story & Case Study</li>
        <li>✔ Short Video / Reels Content</li>
        <li>✔ Live Q&A Session</li>
    </ul>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. অফলাইন মার্কেটিং কৌশল</h3>
    <ul class="visa-list">
        <li>✔ অফিস ব্যানার ও সাইনবোর্ড</li>
        <li>✔ ভিজিটিং কার্ড ও ফ্লায়ার</li>
        <li>✔ রেফারেন্স ও ওয়ার্ড-অফ-মাউথ</li>
        <li>✔ শিক্ষা প্রতিষ্ঠান ও ট্রাভেল এজেন্সির সাথে যোগাযোগ</li>
    </ul>

    <div class="highlight-box">
        অফলাইন রেফারেন্স অনেক সময় সবচেয়ে বিশ্বাসযোগ্য লিড দেয়।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. লিড কনভার্সন টেকনিক</h3>
    <ul class="visa-list">
        <li>✔ দ্রুত Response দেওয়া</li>
        <li>✔ বিনামূল্যে প্রাথমিক Consultation</li>
        <li>✔ বাস্তবসম্মত তথ্য দেওয়া</li>
        <li>✔ Follow-up System রাখা</li>
    </ul>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. সাধারণ মার্কেটিং ভুল</h3>
    <ul class="visa-list">
        <li>✔ ভিসা গ্যারান্টির বিজ্ঞাপন</li>
        <li>✔ ভুয়া Success Rate দাবি</li>
        <li>✔ সব লিড গ্রহণ করা</li>
    </ul>

    <div class="info-box">
        ভুল মার্কেটিং ব্যবসার সুনাম নষ্ট করতে পারে।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">সফল মার্কেটিংয়ের জন্য টিপস</h3>
    <ul class="visa-list">
        <li>✔ নির্দিষ্ট টার্গেট অডিয়েন্স নির্বাচন</li>
        <li>✔ নিয়মিত কনটেন্ট আপডেট</li>
        <li>✔ বিশ্বাসযোগ্যতা বজায় রাখা</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                ভিসা প্রসেসিং ব্যবসার জন্য
                Lead Generation Strategy,
                Digital Marketing Setup এবং
                Conversion Training-এর জন্য
                <b>Trip Designer</b> প্রফেশনাল সাপোর্ট প্রদান করে।
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
                <span class="cta-icon">📘</span>
                <div>
                    <div class="cta-label">Messenger</div>
                    <a href="https://m.me/tripdesigner.xyz" target="_blank">m.me/tripdesigner.xyz</a>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVIGATION -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/visa-course/chapter/65') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/67') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection