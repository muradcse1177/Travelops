@extends('ebooks.visa-course.layout.app')

@section('title','বাস্তব ভিসা কেস স্টাডি')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">বাস্তব ভিসা কেস স্টাডি</h2>

    <p>
        বাস্তব কেস স্টাডি থেকে শেখা সবচেয়ে কার্যকর উপায়।
        এই অধ্যায়ে কিছু বাস্তব ভিসা আবেদনকারীর উদাহরণ তুলে ধরা হয়েছে,
        যেখানে দেখা যাবে—
        কেন রিজেকশন হয়েছিল এবং
        কীভাবে সঠিক পদক্ষেপ নিয়ে পরবর্তীতে ভিসা অনুমোদন পাওয়া গেছে।
    </p>

    <div class="highlight-box">
        কেস স্টাডি বুঝলে ভবিষ্যতের ভুল এড়ানো অনেক সহজ হয়।
    </div>

    <!-- CASE 1 -->
    <h3 class="section-heading">কেস স্টাডি ১: ট্যুরিস্ট ভিসা রিজেকশন → অনুমোদন</h3>
    <p><b>প্রোফাইল:</b> প্রাইভেট চাকরিজীবী, বয়স ৩২</p>

    <ul class="visa-list">
        <li>✔ রিজেকশনের কারণ: দুর্বল Home Ties</li>
        <li>✔ সমস্যা: চাকরির ডকুমেন্ট স্পষ্ট ছিল না</li>
        <li>✔ সমাধান: Updated Employment Letter ও Leave Approval যোগ করা</li>
        <li>✔ ফলাফল: ৩ মাস পর Reapply করে ভিসা অনুমোদন</li>
    </ul>

    <!-- CASE 2 -->
    <h3 class="section-heading">কেস স্টাডি ২: স্টুডেন্ট ভিসা রিজেকশন → সফল Reapply</h3>
    <p><b>প্রোফাইল:</b> নতুন গ্রাজুয়েট</p>

    <ul class="visa-list">
        <li>✔ রিজেকশনের কারণ: দুর্বল SOP</li>
        <li>✔ সমস্যা: কোর্স সিলেকশন পরিষ্কার ছিল না</li>
        <li>✔ সমাধান: SOP রিরাইট + ক্যারিয়ার গোল ব্যাখ্যা</li>
        <li>✔ ফলাফল: দ্বিতীয় আবেদনে ভিসা অনুমোদন</li>
    </ul>

    <div class="info-box">
        শক্তিশালী SOP স্টুডেন্ট ভিসার ক্ষেত্রে সবচেয়ে গুরুত্বপূর্ণ।
    </div>

    <!-- CASE 3 -->
    <h3 class="section-heading">কেস স্টাডি ৩: ওয়ার্ক ভিসা রিজেকশন → অনুমোদন</h3>
    <p><b>প্রোফাইল:</b> স্কিল্ড টেকনিশিয়ান</p>

    <ul class="visa-list">
        <li>✔ রিজেকশনের কারণ: Job Offer Verification issue</li>
        <li>✔ সমস্যা: Employer document অসম্পূর্ণ</li>
        <li>✔ সমাধান: Employer verification + updated contract</li>
        <li>✔ ফলাফল: ২ মাস পরে Reapply করে ভিসা অনুমোদন</li>
    </ul>

    <!-- COMMON LEARNING -->
    <h3 class="section-heading">এই কেস স্টাডি থেকে যা শিখবেন</h3>
    <ul class="visa-list">
        <li>✔ রিজেকশন মানেই শেষ নয়</li>
        <li>✔ কারণ শনাক্ত করাই সবচেয়ে গুরুত্বপূর্ণ</li>
        <li>✔ একই প্রোফাইল দিয়ে Reapply করা উচিত নয়</li>
        <li>✔ সঠিক গাইডলাইন সফলতার সম্ভাবনা বাড়ায়</li>
    </ul>

    <div class="highlight-box">
        সঠিক কৌশল ও প্রস্তুতি থাকলে অধিকাংশ রিজেকশন recover করা সম্ভব।
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                ভিসা রিজেকশন কেস এনালাইসিস,
                Strong Reapply Strategy এবং
                Profile Recovery Support-এর জন্য
                <b>Trip Designer</b> অভিজ্ঞ ও প্রফেশনাল সাপোর্ট দিয়ে থাকে।
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
        <a href="{{ url('/ebooks/visa-course/chapter/61') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/63') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection