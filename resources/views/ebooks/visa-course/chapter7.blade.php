@extends('ebooks.visa-course.layout.app')

@section('title','Bank Statement & Solvency - ভিসা ডকুমেন্টেশন')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">ব্যাংক স্টেটমেন্ট ও সলভেন্সি</h2>

        <p class="chapter-sub">
            ভিসা প্রসেসিংয়ে ব্যাংক স্টেটমেন্ট এবং ব্যাংক সলভেন্সি হলো সবচেয়ে গুরুত্বপূর্ণ আর্থিক ডকুমেন্ট।
            বেশিরভাগ ভিসা রিজেকশনের কারণই হয় *দুর্বল আর্থিক প্রোফাইল* বা *অপ্রমাণিত ফিন্যান্সিয়াল ডকুমেন্ট*।
        </p>
        <!-- SECTION 6: SERVICE BOX -->
        <div class="service-box" style="
            background:#eaf7ff;
            border-left:5px solid #0d6efd;
            padding:18px;
            border-radius:8px;
            margin-top:25px;">
            
            <h4 style="color:#0d6efd; margin-bottom:10px;">💼 Need Professional Bank Solvency Support?</h4>
            <p>
                TripDesigner ভিসা আবেদনকারীদের জন্য  
                <b>ব্যাংক স্টেটমেন্ট প্রস্তুতি</b> এবং  
                <b>ব্যাংক সলভেন্সি সার্টিফিকেট</b> সাপোর্ট প্রদান করে।
            </p>

            <a href="https://tripdesigner.net/services/bank-solvency-support" target="_blank" 
               style="display:inline-block; padding:10px 18px; background:#0d6efd; color:#fff;
               border-radius:6px; text-decoration:none; margin-top:8px;">
                🔗 Visit Service Page
            </a>
        </div>

        <!-- SECTION 1 -->
        <div class="chapter-section">
            <h3 class="section-heading">ব্যাংক স্টেটমেন্ট কী?</h3>
            <p>
                ব্যাংক স্টেটমেন্ট হলো গত কয়েক মাসে (সাধারণত ৬ মাস) আপনার অ্যাকাউন্টে  
                কী পরিমাণ টাকা জমা–উত্তোলন হয়েছে তার সম্পূর্ণ বিবরণ।
            </p>

            <div class="highlight-box">
                <b>Bank Statement ≠ শুধুমাত্র ব্যালেন্স</b>  
                <br>
                এটি আপনার আর্থিক স্থিতি, আয়-ব্যয়, এবং লেনদেনের স্বচ্ছতা প্রমাণ করে।
            </div>

            <h4 class="sub-heading">কেন এটি গুরুত্বপূর্ণ?</h4>
            <ul class="visa-list">
                <li>✔ আপনার আর্থিক সামর্থ্য যাচাই করতে</li>
                <li>✔ ট্রাভেল খরচ বহন করতে পারবেন কি না বুঝতে</li>
                <li>✔ অসামঞ্জস্যপূর্ণ বা হঠাৎ বড় লেনদেন আছে কি না যাচাই করতে</li>
            </ul>
        </div>

        <!-- SECTION 2 -->
        <div class="chapter-section">
            <h3 class="section-heading">ব্যাংক সলভেন্সি কী?</h3>
            <p>
                ব্যাংক সলভেন্সি হলো একটি সার্টিফিকেট, যা প্রমাণ করে—
            </p>

            <div class="info-box">
                ✦ আপনি আর্থিকভাবে স্থিতিশীল  
                <br>
                ✦ আপনার ব্যাংক অ্যাকাউন্ট বৈধ ও সক্রিয়  
                <br>
                ✦ আন্তর্জাতিক ভ্রমণ বা পড়াশোনার খরচ বহন করতে সক্ষম  
            </div>

            <h4 class="sub-heading">কোন কোন ভিসায় সলভেন্সি লাগে?</h4>
            <ul class="visa-list">
                <li>✔ USA Student Visa (I-20 Requirement)</li>
                <li>✔ Canada Study Permit</li>
                <li>✔ Schengen Visa (Tourist)</li>
                <li>✔ UK Visit & Student Visa</li>
                <li>✔ Australia Student Visa</li>
                <li>✔ Japan / Korea Visa</li>
            </ul>
        </div>

        <!-- SECTION 3 -->
        <h3 class="section-heading">কত টাকা থাকা উচিত?</h3>

        <table class="table table-bordered summary-table">
            <thead class="table-primary">
                <tr>
                    <th>ভিসার ধরন</th>
                    <th>মোট ফান্ড (আনুমানিক)</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Tourist Visa</td><td>৳ 2–5 লাখ</td></tr>
                <tr><td>Schengen Visa</td><td>৳ 10–15 লাখ</td></tr>
                <tr><td>USA Visit</td><td>৳ 8–15 লাখ</td></tr>
                <tr><td>Student Visa (Canada)</td><td>৳ 15–25 লাখ</td></tr>
                <tr><td>Student Visa (UK)</td><td>৳ 10–20 লাখ</td></tr>
                <tr><td>Work Visa</td><td>৳ 2–5 লাখ</td></tr>
            </tbody>
        </table>

        <div class="highlight-box">
            ⚠️ সতর্কতা: ভিসা অফিসার সবসময় *transaction pattern* পরীক্ষা করেন।  
            হঠাৎ বড় অংকের টাকা জমা দিলে সেটি রেড ফ্ল্যাগ হতে পারে।
        </div>

        <!-- SECTION 4 -->
        <h3 class="section-heading">ব্যাংক স্টেটমেন্টে যেসব ভুল হলে ভিসা রিজেক্ট হয়</h3>

        <ul class="visa-list">
            <li>❌ হঠাৎ বড় অংকের টাকা জমা</li>
            <li>❌ Salary mismatch বা অজানা জমা</li>
            <li>❌ ৬ মাসের লেনদেন নেই / অ্যাকাউন্ট নিস্ক্রিয়</li>
            <li>❌ Overdraft বা Loan Dependency</li>
            <li>❌ Fake statement (সরাসরি ভিসা ব্যান হতে পারে)</li>
        </ul>

        <!-- SECTION 5 -->
        <h3 class="section-heading">কীভাবে একটি শক্তিশালী ব্যাংক স্টেটমেন্ট তৈরি করবেন?</h3>

        <ul class="visa-list">
            <li>✔ নিয়মিত লেনদেন রাখুন</li>
            <li>✔ Salary / আয় নিয়মিত দেখান</li>
            <li>✔ Cash deposit কম দেখান — Bank transfer ভালো</li>
            <li>✔ ৬ মাস আগে থেকেই ফান্ড তৈরি করুন</li>
            <li>✔ ব্যালেন্স maintain করুন (Sudden spike নয়)</li>
        </ul>


        <!-- NAVIGATION BUTTONS -->
        <div class="nav-buttons">
            <a href="{{ url('/ebooks/visa-course/chapter/6') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/8') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection