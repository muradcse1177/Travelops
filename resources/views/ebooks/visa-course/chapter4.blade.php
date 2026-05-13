@extends('ebooks.visa-course.layout.app')

@section('title','Chapter - এম্ব্যাসি ও VFS সেন্টারের কার্যপ্রণালি')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">এম্ব্যাসি ও VFS সেন্টারের কার্যপ্রণালির বিস্তারিত ধারণা</h2>

        <p>
            বিদেশে যাওয়ার জন্য ভিসা আবেদন করলে দুটি প্রতিষ্ঠান সম্পর্কে সবাই শুনে থাকে—
            <b>এম্ব্যাসি (Embassy)</b> এবং <b>VFS/VAC (Visa Application Centre)</b>।
            অনেকেই মনে করেন দুটো একই—কিন্তু বাস্তবে এদের কাজ সম্পূর্ণ ভিন্ন।
        </p>

        <!-- EMBASSY -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ১. এম্ব্যাসি (Embassy) কী?</h3>
            <p>
                এম্ব্যাসি হলো কোনো দেশের সরকারি কূটনৈতিক অফিস যেখানে ভিসা মূল্যায়ন, কনস্যুলার সেবা এবং দুই দেশের রাজনৈতিক সম্পর্ক রক্ষার কাজ হয়।
                ভিসা অনুমোদন বা রিজেকশনের চূড়ান্ত সিদ্ধান্ত এখানেই হয়।
            </p>

            <h5 class="sub-heading">✔ এম্ব্যাসির কাজ:</h5>
            <ul>
                <li>ভিসা আবেদন যাচাই</li>
                <li>ডকুমেন্ট ভেরিফিকেশন</li>
                <li>নিরাপত্তা যাচাই</li>
                <li>ইন্টারভিউ গ্রহণ (USA, Canada, Japan ইত্যাদি)</li>
                <li>ভিসা অনুমোদন বা বাতিল</li>
                <li>জরুরি/কনস্যুলার সেবা</li>
            </ul>

            <div class="highlight">
                📌 বেশির ভাগ ক্ষেত্রে আবেদনকারী সরাসরি এম্ব্যাসিতে যায় না—VFS মারফত আবেদন জমা হয়।
            </div>
        </div>

        <!-- VFS -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ২. VFS Global / Visa Application Centre কী?</h3>
            <p>
                VFS হলো একটি আন্তর্জাতিক প্রতিষ্ঠান যা এম্ব্যাসির বদলে ভিসা আবেদন গ্রহণের দায়িত্ব পালন করে।
                তারা কখনোই ভিসার সিদ্ধান্ত প্রদান করে না।
            </p>

            <h5 class="sub-heading">✔ VFS-এর কাজ:</h5>
            <ul>
                <li>ভিসা আবেদন গ্রহণ</li>
                <li>পাসপোর্ট সংগ্রহ/ফেরত দেওয়া</li>
                <li>বায়োমেট্রিক (Fingerprint + Photo)</li>
                <li>ডকুমেন্ট স্ক্যান করে এম্ব্যাসিতে পাঠানো</li>
                <li>ভিসা ফি আদায়</li>
            </ul>

            <h5 class="sub-heading">✔ Premium Services (Optional)</h5>
            <ul>
                <li>SMS Tracking</li>
                <li>Courier Return</li>
                <li>Premium Lounge</li>
                <li>Photocopy/Print</li>
            </ul>

            <div class="highlight">
                ❌ VFS ভিসা অনুমোদন/রিজেকশন করে না এবং ইন্টারভিউও নেয় না।
            </div>
        </div>

        <!-- DIFFERENCE TABLE -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ৩. এম্ব্যাসি ও VFS—মূল পার্থক্য</h3>

            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>দিক</th>
                        <th>এম্ব্যাসি</th>
                        <th>VFS সেন্টার</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>ভূমিকা</td><td>ভিসা অনুমোদন/রিজেকশন</td><td>শুধু আবেদন গ্রহণ</td></tr>
                    <tr><td>ইন্টারভিউ</td><td>হ্যাঁ (USA/Canada)</td><td>না</td></tr>
                    <tr><td>নিরাপত্তা চেক</td><td>হ্যাঁ</td><td>না</td></tr>
                    <tr><td>ডকুমেন্ট যাচাই</td><td>এম্ব্যাসি করে</td><td>স্ক্যান করে পাঠায়</td></tr>
                    <tr><td>চূড়ান্ত সিদ্ধান্ত</td><td>এম্ব্যাসি</td><td>কখনই না</td></tr>
                    <tr><td>সাপোর্ট সার্ভিস</td><td>সীমিত</td><td>অনেক</td></tr>
                </tbody>
            </table>
        </div>

        <!-- PROCESS FLOW -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ৪. ভিসা প্রসেসিং কীভাবে ভাগ হয়?</h3>

            <div class="step-box">
                <h5>ধাপ ১: আবেদনকারী → VFS সেন্টার</h5>
                <ul>
                    <li>ভিসা আবেদন জমা</li>
                    <li>পাসপোর্ট জমা</li>
                    <li>বায়োমেট্রিক</li>
                    <li>ফি প্রদান</li>
                </ul>
            </div>

            <div class="step-box">
                <h5>ধাপ ২: VFS → এম্ব্যাসি</h5>
                <ul>
                    <li>Background check</li>
                    <li>Travel history check</li>
                    <li>Financial verification</li>
                    <li>Security clearance</li>
                </ul>
            </div>

            <div class="step-box">
                <h5>ধাপ ৩: এম্ব্যাসি → VFS → আবেদনকারী</h5>
                <ul>
                    <li>এম্ব্যাসি ভিসা অনুমোদন/রিজেকশন</li>
                    <li>পাসপোর্টে ভিসা স্টিকার লাগানো</li>
                    <li>VFS আবেদনকারীকে SMS/Email এ জানায়</li>
                </ul>
            </div>
        </div>

        <!-- DIRECT EMBASSY CASES -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ৫. কোন ক্ষেত্রে সরাসরি এম্ব্যাসিতে যেতে হয়?</h3>
            <ul>
                <li><b>USA Visa (DS-160)</b> – ইন্টারভিউ বাধ্যতামূলক</li>
                <li><b>Japan Visa</b> – কিছু ক্ষেত্রে সরাসরি verification</li>
                <li><b>Turkey Work Visa</b> – সরাসরি জমা</li>
            </ul>
        </div>

        <!-- WORK DISTRIBUTION TABLE -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ৬. আবেদনকারীকে কোন কাজ কোথায় করতে হয়?</h3>
            <table class="table table-bordered summary-table">
                <thead class="table-primary">
                    <tr>
                        <th>কাজ</th>
                        <th>কোথায় করবেন</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>ফর্ম পূরণ</td><td>Online</td></tr>
                    <tr><td>Appointment নেওয়া</td><td>VFS/Embassy Site</td></tr>
                    <tr><td>ডকুমেন্ট জমা</td><td>VFS</td></tr>
                    <tr><td>Interview</td><td>Embassy</td></tr>
                    <tr><td>ভিসার সিদ্ধান্ত</td><td>Embassy</td></tr>
                    <tr><td>পাসপোর্ট সংগ্রহ</td><td>VFS</td></tr>
                </tbody>
            </table>
        </div>

        <!-- WHY VFS -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ৭. কেন VFS সেন্টার তৈরি করা হয়েছে?</h3>
            <ul>
                <li>এম্ব্যাসির কাজের চাপ কমানো</li>
                <li>আবেদন প্রক্রিয়া দ্রুত ও সংগঠিত করা</li>
                <li>Biometrics নিরাপদভাবে সংরক্ষণ</li>
                <li>Global tracking system</li>
                <li>Queue-free modern service</li>
            </ul>
        </div>

        <!-- Example -->
        <div class="info-card">
            <h3 class="topic-title">⭐ ৮. ব্যবহারিক উদাহরণ: Schengen Visa Process</h3>

            <div class="step-box">
                ✔ ধাপ ১: অনলাইনে ফর্ম পূরণ → VFS-এ Appointment  
                <br>Documents + Biometrics + Fee submission
            </div>

            <div class="step-box">
                ✔ ধাপ ২: VFS → Embassy  
                <br>Embassy verification begins
            </div>

            <div class="step-box">
                ✔ ধাপ ৩: Embassy decision → Passport to VFS  
            </div>

            <div class="step-box">
                ✔ ধাপ ৪: VFS আপনাকে জানাবে—“Your passport is ready.”
            </div>
        </div>

        <!-- NAV BUTTONS -->
        <div class="nav-buttons">
            <a href="{{ url('/ebooks/visa-course/chapter/3') }}" class="btn btn-secondary">⬅ পূর্ববর্তী অধ্যায়</a>
            <a href="{{ url('/ebooks/visa-course/chapter/5') }}" class="btn btn-primary">পরবর্তী অধ্যায় ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection