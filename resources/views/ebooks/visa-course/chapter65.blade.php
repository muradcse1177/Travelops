@extends('ebooks.visa-course.layout.app')

@section('title','সার্ভিস চার্জ ও প্যাকেজ তৈরি')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">ভিসা প্রসেসিং ব্যবসা: সার্ভিস চার্জ ও প্যাকেজ তৈরি</h2>

    <p>
        ভিসা প্রসেসিং ব্যবসায় সফল হতে হলে
        <b>সঠিক সার্ভিস চার্জ নির্ধারণ</b> এবং
        <b>পেশাদার প্যাকেজ তৈরি</b> অত্যন্ত গুরুত্বপূর্ণ।
        অতিরিক্ত চার্জ নিলে যেমন ক্লায়েন্ট হারানোর ঝুঁকি থাকে,
        তেমনি খুব কম চার্জ করলে ব্যবসা টেকসই হয় না।
    </p>

    <div class="highlight-box">
        সঠিক মূল্য নির্ধারণ = ক্লায়েন্টের আস্থা + ব্যবসার লাভ।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. সার্ভিস চার্জ নির্ধারণের ভিত্তি</h3>
    <ul class="visa-list">
        <li>✔ ভিসার ধরন (Tourist / Student / Work)</li>
        <li>✔ কেসের জটিলতা</li>
        <li>✔ ডকুমেন্ট প্রস্তুতির পরিমাণ</li>
        <li>✔ Embassy / Country requirement</li>
    </ul>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. আলাদা আলাদা সার্ভিস চার্জ নির্ধারণ</h3>
    <ul class="visa-list">
        <li>✔ Visa File Checking Fee</li>
        <li>✔ Full Visa Processing Fee</li>
        <li>✔ SOP / Cover Letter Writing Fee</li>
        <li>✔ Interview Preparation Fee</li>
    </ul>

    <div class="info-box">
        সব ক্লায়েন্টের জন্য এক রকম চার্জ প্রযোজ্য নাও হতে পারে।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. প্যাকেজ সিস্টেম কেন প্রয়োজন</h3>
    <ul class="visa-list">
        <li>✔ ক্লায়েন্ট সহজে সিদ্ধান্ত নিতে পারে</li>
        <li>✔ সার্ভিস পরিষ্কারভাবে বোঝানো যায়</li>
        <li>✔ ব্যবসার পেশাদার ইমেজ তৈরি হয়</li>
    </ul>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. উদাহরণস্বরূপ কিছু প্যাকেজ</h3>
    <ul class="visa-list">
        <li>✔ Basic Package – File Checking + Guidance</li>
        <li>✔ Standard Package – Full Processing + Documentation</li>
        <li>✔ Premium Package – End-to-End Support + Interview Prep</li>
    </ul>

    <div class="highlight-box">
        Premium Package সাধারণত সবচেয়ে বেশি লাভজনক।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. সার্ভিস চার্জ সম্পর্কে স্বচ্ছতা</h3>
    <ul class="visa-list">
        <li>✔ Embassy Fee ও Service Fee আলাদা করে বলা</li>
        <li>✔ Refund Policy পরিষ্কার রাখা</li>
        <li>✔ Written Agreement / Invoice প্রদান</li>
    </ul>

    <!-- SECTION 6 -->
    <h3 class="section-heading">সাধারণ ভুল যেগুলো এড়িয়ে চলবেন</h3>
    <ul class="visa-list">
        <li>✔ অস্বাভাবিক কম চার্জ অফার করা</li>
        <li>✔ ভিসা গ্যারান্টির প্রতিশ্রুতি দেওয়া</li>
        <li>✔ চার্জের বিষয়ে লিখিত প্রমাণ না রাখা</li>
    </ul>

    <div class="info-box">
        ভুল মূল্য নির্ধারণ ব্যবসার সুনাম নষ্ট করতে পারে।
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                ভিসা প্রসেসিং সার্ভিস চার্জ সেটআপ,
                প্রফেশনাল প্যাকেজ ডিজাইন এবং
                Pricing Strategy তৈরির জন্য
                <b>Trip Designer</b> অভিজ্ঞ গাইডলাইন প্রদান করে।
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
        <a href="{{ url('/ebooks/visa-course/chapter/64') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/66') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection