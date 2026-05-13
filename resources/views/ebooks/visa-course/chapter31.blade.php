@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 31 - LMIA / Employer Approval')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">LMIA / Employer Approval</h2>

        <p>
            বিদেশে চাকরি করতে চাইলে সবচেয়ে গুরুত্বপূর্ণ ধাপগুলোর একটি হলো  
            <b>Employer Approval</b> বা <b>LMIA (Labour Market Impact Assessment)</b>—যা প্রমাণ করে যে  
            বিদেশি কর্মীকে নিয়োগ দেওয়ার প্রয়োজন রয়েছে এবং এটি দেশটির অর্থনীতির জন্য ক্ষতিকর নয়।
        </p>

        <div class="highlight-box">
            LMIA হলো কানাডার জন্য বাধ্যতামূলক একটি এমপ্লয়ার ডকুমেন্ট, যা বিদেশি কর্মী নিয়োগের অনুমতি দেয়।
        </div>


        <!-- SECTION 1 -->
        <h3 class="section-heading"><span class="sec-num">1.</span> LMIA কী?</h3>

        <p>
            LMIA হলো কানাডা সরকারের একটি অনুমোদনপত্র যেটি নিশ্চিত করে—
        </p>

        <ul class="visa-list">
            <li>✔ এমপ্লয়ার সত্যিই একজন বিদেশি কর্মী প্রয়োজন মনে করছে</li>
            <li>✔ স্থানীয় বা কানাডিয়ান কোনো কর্মী পাওয়া যায়নি</li>
            <li>✔ বিদেশি কর্মী নিয়োগ দিলে দেশের শ্রম বাজারে নেতিবাচক প্রভাব পড়বে না</li>
        </ul>

        <div class="info-box">
            নোট: LMIA approval ছাড়া কানাডায় Work Permit সাধারণত ইস্যু হয় না (কিছু ভিসা ক্যাটেগরি ছাড়া)।
        </div>


        <!-- SECTION 2 -->
        <h3 class="section-heading"><span class="sec-num">2.</span> LMIA অনুমোদনের জন্য এমপ্লয়ারকে কী করতে হয়?</h3>

        <ul class="visa-list">
            <li>✔ সরকার অনুমোদিত জব পোর্টালে চাকরির বিজ্ঞাপন পোস্ট করা</li>
            <li>✔ স্থানীয়/কানাডিয়ান প্রার্থীদের ইন্টারভিউ করার চেষ্টা দেখানো</li>
            <li>✔ জবের ডিটেইল (NOC Code, Salary, Benefits) জমা দেওয়া</li>
            <li>✔ Application fee প্রদান করা</li>
            <li>✔ প্রয়োজন হলে কোম্পানির আর্থিক বিবরণ প্রদান</li>
        </ul>


        <!-- SECTION 3 -->
        <h3 class="section-heading"><span class="sec-num">3.</span> LMIA–এর ধরন</h3>

        <ul class="visa-list">
            <li>✔ High-Wage LMIA</li>
            <li>✔ Low-Wage LMIA</li>
            <li>✔ Agricultural LMIA</li>
            <li>✔ Seasonal LMIA</li>
            <li>✔ Global Talent Stream LMIA</li>
        </ul>

        <p>
            কোন ক্যাটেগরিতে আপনার জব পড়ে তা নির্ভর করে জব টাইপ, স্যালারি এবং ইন্ডাস্ট্রির ওপর।
        </p>


        <!-- SECTION 4 -->
        <h3 class="section-heading"><span class="sec-num">4.</span> LMIA Approval পেতে সময় কত লাগে?</h3>

        <ul class="visa-list">
            <li>✔ সাধারণ LMIA: 2–12 সপ্তাহ</li>
            <li>✔ Global Talent Stream: 10–14 দিন</li>
            <li>✔ Seasonal Worker: দ্রুত প্রসেসিং</li>
        </ul>


        <!-- SECTION 5 -->
        <h3 class="section-heading"><span class="sec-num">5.</span> LMIA প্রাপ্তি মানে কি ভিসা অনুমোদন?</h3>

        <p>
            না। LMIA হলো কেবল এমপ্লয়ারের অনুমতি।  
            এরপর আবেদনকারীকে <b>Work Permit</b> এর জন্য আবেদন করতে হবে, যেখানে দেখা হয়—
        </p>

        <ul class="visa-list">
            <li>✔ মেডিকেল</li>
            <li>✔ পুলিশ ক্লিয়ারেন্স</li>
            <li>✔ ডকুমেন্ট ভেরিফিকেশন</li>
            <li>✔ আবেদনকারীর যোগ্যতা</li>
        </ul>


        <!-- SECTION 6 -->
        <h3 class="section-heading"><span class="sec-num">6.</span> কিভাবে বুঝবেন LMIA আসল নাকি ভুয়া?</h3>

        <ul class="visa-list">
            <li>✔ LMIA নম্বর যাচাই করা যায় (Service Canada)</li>
            <li>✔ Employer নাম ও ঠিকানা সরকারি রেকর্ডে থাকা উচিত</li>
            <li>✔ Processing fee আবেদনকারীর কাছ থেকে নেওয়া হয় না</li>
            <li>✔ Offer letter + LMIA একই কোম্পানির হওয়া উচিত</li>
        </ul>

        <div class="highlight-box">
            গুরুত্বপূর্ণ: কোনো কোম্পানি যদি আপনাকে LMIA-এর জন্য টাকা দিতে বলে—  
            ৯৯% ক্ষেত্রে এটি প্রতারণা।
        </div>


        <!-- TD SUPPORT CARD -->
        <div class="td-card">
            <div class="td-card-body">
                <p class="td-text">
                    কানাডা, রোমানিয়া, ক্রোয়েশিয়া, দুবাইসহ বিভিন্ন দেশের Work Visa Profile  
                    মূল্যায়ন ও ডকুমেন্টেশন সাপোর্ট দিয়ে থাকে <b>Trip Designer</b>।
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


        <!-- NAV BUTTONS -->
        <div class="nav-buttons">
            <a href="{{ url('/ebooks/visa-course/chapter/30') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/32') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection