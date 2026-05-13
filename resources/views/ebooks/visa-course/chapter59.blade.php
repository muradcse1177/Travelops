@extends('ebooks.visa-course.layout.app')

@section('title','সাধারণ ভিসা রিজেকশনের কারণ')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">সাধারণ ভিসা রিজেকশনের কারণ</h2>

    <p>
        ভিসা আবেদন রিজেক্ট হওয়ার পেছনে কিছু কমন কারণ থাকে,
        যেগুলো প্রায় সব দেশের ক্ষেত্রেই প্রযোজ্য।
        এই অধ্যায়ে সবচেয়ে গুরুত্বপূর্ণ ও বাস্তব
        <b>ভিসা রিজেকশনের কারণগুলো</b> সহজভাবে তুলে ধরা হলো।
    </p>

    <div class="highlight-box">
        অধিকাংশ ভিসা রিজেকশন হয় — ভুল প্রস্তুতি ও অস্পষ্ট প্রোফাইলের কারণে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. দুর্বল আর্থিক প্রোফাইল</h3>
    <ul class="visa-list">
        <li>✔ পর্যাপ্ত ব্যাংক ব্যালেন্স না থাকা</li>
        <li>✔ হঠাৎ বড় অঙ্কের টাকা জমা</li>
        <li>✔ ইনকামের উৎস পরিষ্কার না হওয়া</li>
    </ul>

    <div class="info-box">
        আর্থিক সক্ষমতা স্পষ্ট না হলে অফিসার খরচ বহনের বিষয়ে সন্দেহ করে।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. দুর্বল Home Ties</h3>
    <ul class="visa-list">
        <li>✔ দেশে স্থায়ী চাকরি বা ব্যবসার প্রমাণ না থাকা</li>
        <li>✔ পরিবারিক বা সামাজিক দায়বদ্ধতা দুর্বল</li>
        <li>✔ দেশে ফেরার স্পষ্ট পরিকল্পনা না থাকা</li>
    </ul>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. ভ্রমণের উদ্দেশ্য অস্পষ্ট</h3>
    <ul class="visa-list">
        <li>✔ ভ্রমণের উদ্দেশ্য পরিষ্কারভাবে বোঝাতে না পারা</li>
        <li>✔ ডকুমেন্ট ও কথার মধ্যে অমিল</li>
        <li>✔ মুখস্থ বা ঘুরানো উত্তর</li>
    </ul>

    <div class="highlight-box">
        Purpose of Travel অস্পষ্ট হলে রিজেকশন প্রায় নিশ্চিত।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. অসম্পূর্ণ বা ভুল ডকুমেন্ট</h3>
    <ul class="visa-list">
        <li>✔ ভুল ব্যাংক স্টেটমেন্ট</li>
        <li>✔ NOC / Employment Letter ঠিক না থাকা</li>
        <li>✔ জাল বা সন্দেহজনক ডকুমেন্ট</li>
    </ul>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. খারাপ বা না থাকা Travel History</h3>
    <ul class="visa-list">
        <li>✔ কোনো ট্রাভেল হিস্ট্রি না থাকা</li>
        <li>✔ আগের ভিসা রিজেকশন</li>
        <li>✔ Overstay বা Illegal Stay record</li>
    </ul>

    <div class="info-box">
        ভালো ট্রাভেল হিস্ট্রি না থাকলে রিজেকশনের ঝুঁকি বাড়ে।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. ইন্টারভিউ পারফরম্যান্স দুর্বল</h3>
    <ul class="visa-list">
        <li>✔ নার্ভাস আচরণ</li>
        <li>✔ প্রশ্ন অনুযায়ী উত্তর না দেওয়া</li>
        <li>✔ আত্মবিশ্বাসের অভাব</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                ভিসা রিজেকশনের কারণ বিশ্লেষণ,
                Profile Review এবং Correct Strategy নির্ধারণের জন্য
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
        <a href="{{ url('/ebooks/visa-course/chapter/58') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/60') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection