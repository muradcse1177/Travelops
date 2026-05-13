@extends('ebooks.visa-course.layout.app')

@section('title','ট্যুরিস্ট ভিসা রিজেকশনের কারণ')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">ট্যুরিস্ট ভিসা রিজেকশনের কারণ</h2>

        <p>
            ট্যুরিস্ট ভিসা সাধারণত সহজ মনে হলেও, বিভিন্ন দেশের দূতাবাস রিজেকশনের জন্য  
            কিছু নির্দিষ্ট কারণকে সবচেয়ে গুরুত্বপূর্ণভাবে বিবেচনা করে।  
            আপনার ভ্রমণের উদ্দেশ্য, আর্থিক সামর্থ্য, ডকুমেন্টের সঠিকতা—সব কিছুই প্রভাব ফেলে।
        </p>

        <div class="highlight-box">
            <b>ভিসা অফিসারের মূল প্রশ্ন:</b>  
            “আপনি ভ্রমণ শেষে দেশে ফেরত আসবেন—এটা কি নিশ্চিত?”
        </div>

        <!-- SECTION 1 -->
        <h3 class="section-heading">১. আর্থিক দুর্বলতা (Weak Financial Profile)</h3>

        <ul class="visa-list">
            <li>❌ ব্যাংক স্টেটমেন্টে কম ব্যালেন্স</li>
            <li>❌ Salary/Business income কম দেখানো</li>
            <li>❌ হঠাৎ টাকা জমা — suspicious transaction</li>
            <li>❌ দীর্ঘসময় ভ্রমণের জন্য পর্যাপ্ত ফান্ড নেই</li>
        </ul>

        <div class="info-box">
            ব্যাংক ব্যালেন্স থাকে ৩–১২ মাসের ধারাবাহিকতা—এটাই সবচেয়ে গুরুত্বপূর্ণ।
        </div>

        <!-- SECTION 2 -->
        <h3 class="section-heading">২. অস্পষ্ট ভ্রমণ উদ্দেশ্য</h3>

        <ul class="visa-list">
            <li>❌ Trip plan / itinerary না থাকা</li>
            <li>❌ Hotel booking / route plan না থাকা</li>
            <li>❌ Cover letter দুর্বল</li>
            <li>❌ ভ্রমণের কারণ অস্পষ্ট বা mismatch</li>
        </ul>

        <!-- SECTION 3 -->
        <h3 class="section-heading">৩. চাকরি/ব্যবসার দুর্বল প্রমাণ</h3>

        <ul class="visa-list">
            <li>❌ NOC সঠিকভাবে না লেখা</li>
            <li>❌ Salary slip নেই / জাল মনে হয়</li>
            <li>❌ ব্যবসা থাকলে trade license / return নেই</li>
            <li>❌ স্থায়ী income source proof নেই</li>
        </ul>

        <div class="highlight-box">
            শক্তিশালী চাকরি/ব্যবসার background → ভিসা approve হওয়ার probability অনেক বেড়ে যায়।
        </div>

        <!-- SECTION 4 -->
        <h3 class="section-heading">৪. Travel History না থাকা বা দুর্বল</h3>

        <ul class="visa-list">
            <li>❌ কোনও পূর্ববর্তী foreign trip নেই</li>
            <li>❌ Risky country visit history</li>
            <li>❌ Immigration rule ভঙ্গের সন্দেহ</li>
        </ul>

        <!-- SECTION 5 -->
        <h3 class="section-heading">৫. Documentation Mistakes (সাধারণ ভুল)</h3>

        <ul class="visa-list">
            <li>❌ Application form-এ ভুল</li>
            <li>❌ Documents mismatch (income vs bank)</li>
            <li>❌ ভুল বুকিং / ভুল itinerary</li>
            <li>❌ Fake documents — সরাসরি ১০০% রিজেকশন</li>
        </ul>

        <!-- SECTION 6 -->
        <h3 class="section-heading">৬. Strong home ties না থাকা</h3>

        <p>দূতাবাস মনে করতে পারে—আপনি ফিরে নাও আসতে পারেন।</p>

        <ul class="visa-list">
            <li>❌ চাকরি নেই</li>
            <li>❌ দেশে পরিবার নেই</li>
            <li>❌ Property / responsibility নেই</li>
            <li>❌ Intent to immigrate মনে হওয়া</li>
        </ul>

        <div class="info-box">
            <b>Home ties strong রাখলে</b> approval rate ৩০–৪০% পর্যন্ত বাড়ে।
        </div>

        <!-- SECTION 7 -->
        <h3 class="section-heading">৭. Embassy-specific Risk Factors</h3>

        <table class="table table-bordered summary-table">
            <thead class="table-primary">
                <tr>
                    <th>দেশ</th>
                    <th>রিজেকশনের সাধারণ কারণ</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Schengen</td><td>Itinerary mismatch, low funds</td></tr>
                <tr><td>UK</td><td>Bank maintenance rule না মানা</td></tr>
                <tr><td>Canada</td><td>Weak financial + travel history</td></tr>
                <tr><td>USA</td><td>Return assurance weak</td></tr>
                <tr><td>Singapore</td><td>Insufficient travel proof</td></tr>
                <tr><td>Dubai</td><td>Job mismatch / immigration risk</td></tr>
            </tbody>
        </table>

        <!-- TRIP DESIGNER SUPPORT CARD -->
        <div class="td-card">
            <div class="td-card-body">
                <p class="td-text">
                    আপনার Tourist Visa রিজেকশন এড়াতে <b>Perfect Cover Letter, Itinerary,  
                    Hotel Booking, Strong Profile Assessment</b> — সবকিছু Trip Designer করে থাকে।
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
            <a href="{{ url('/ebooks/visa-course/chapter/19') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/21') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection