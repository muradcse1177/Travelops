@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 24 - স্টুডেন্ট ভিসা ইন্টারভিউ')

@section('content')
<div class="chapter-box">
        
        <h2 class="chapter-title">স্টুডেন্ট ভিসা ইন্টারভিউ</h2>
        <p>স্টুডেন্ট ভিসা অনুমোদনের সবচেয়ে গুরুত্বপূর্ণ ধাপ হলো **ইন্টারভিউ**।  
           বিশেষ করে USA, Canada, UK, Japan — এসব দেশে ইন্টারভিউ আপনাকে ভিসা পাওয়ার সম্ভাবনা অনেক বাড়িয়ে দেয়।</p>

        <h3 class="section-heading">🎯 ইন্টারভিউতে মূলত কী যাচাই করা হয়?</h3>

        <ul class="custom-checklist">
            <li>✔ আপনার ভ্রমণের উদ্দেশ্য সত্যি কিনা</li>
            <li>✔ আপনি সত্যিই স্টাডি করতে যাচ্ছেন কিনা</li>
            <li>✔ আপনার আর্থিক সক্ষমতা যথেষ্ট কিনা</li>
            <li>✔ আপনি দেশে ফিরবেন কিনা</li>
            <li>✔ আপনার পূর্বের শিক্ষা + পরিকল্পনা যুক্তিযুক্ত কিনা</li>
        </ul>

        <h3 class="section-heading">📌 ইন্টারভিউতে যে প্রশ্নগুলো বেশি করা হয়</h3>

        <ul class="custom-checklist">
            <li>✔ Why did you choose this university?</li>
            <li>✔ Why this country and not others?</li>
            <li>✔ Who is sponsoring your education?</li>
            <li>✔ What is your future plan after study?</li>
            <li>✔ What subjects will you study?</li>
            <li>✔ How will this degree help your career?</li>
        </ul>

        <h3 class="section-heading">🧠 প্রশ্নের উত্তর দেওয়ার কৌশল</h3>
        <ul class="custom-checklist">
            <li>✔ অপ্রয়োজনীয় গল্প নয় — Short & direct answer</li>
            <li>✔ Financial sponsor সম্পর্কে পরিষ্কার ধারণা রাখা</li>
            <li>✔ Course + University সম্পর্কে শক্তিশালী জ্ঞান</li>
            <li>✔ Future plan এ return assurance অবশ্যই রাখতে হবে</li>
            <li>✔ Confidence + Eye contact maintain করা</li>
        </ul>

        <h3 class="section-heading">❌ যেসব কারণে ইন্টারভিউতে রিজেকশন হয়</h3>

        <ul class="custom-checklist">
            <li>✔ অস্পষ্ট Purpose of study</li>
            <li>✔ দুর্বল Financial explanation</li>
            <li>✔ University/Course সম্পর্কে না জানা</li>
            <li>✔ পূর্বের Academic gap explain করতে না পারা</li>
            <li>✔ Nervous আচরণ</li>
        </ul>

        <!-- SUPPORT CARD -->
        <div class="td-card">
            <div class="td-card-body">
                <p class="td-text">
                    স্টুডেন্ট ভিসার জন্য ইন্টারভিউ প্রস্তুতি, মোডেল প্রশ্ন, আর্থিক ব্যাখ্যা তৈরি—  
                    সবকিছুতে <b>Trip Designer</b> প্রফেশনাল সাপোর্ট প্রদান করে।
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
            <a href="{{ url('/ebooks/visa-course/chapter/23') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/25') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <div id="footer"></div>
@endsection