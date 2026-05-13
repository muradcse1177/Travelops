@extends('ebooks.visa-course.layout.app')

@section('title','Chapter - পাসপোর্ট ভ্যালিডিটি')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">পাসপোর্ট ভ্যালিডিটি</h2>

        <p>
            ভিসা করার ক্ষেত্রে পাসপোর্ট ভ্যালিডিটি সবচেয়ে গুরুত্বপূর্ণ বিষয়গুলোর একটি।  
            কোন দেশই সময়োত্তীর্ণ বা শিগগিরই মেয়াদ শেষ হতে চলা পাসপোর্টে ভিসা দিতে চায় না।
        </p>

        <div class="highlight-box">
            <b>পাসপোর্ট ভ্যালিডিটি = পাসপোর্টের মেয়াদ + বাকি বৈধতার সময়</b>
        </div>

        <h3 class="section-heading">কেন পাসপোর্ট ভ্যালিডিটি গুরুত্বপূর্ণ?</h3>
        <p>
            কারণ একটি দেশের ইমিগ্রেশন আইন অনুযায়ী, আপনার পাসপোর্টের মেয়াদ  
            ভ্রমণের সময়সীমার সাথে সামঞ্জস্যপূর্ণ হতে হবে। মেয়াদ শেষের দিকে থাকা পাসপোর্ট  
            ভিসা প্রত্যাখ্যানের অন্যতম সাধারণ কারণ।
        </p>

        <h3 class="section-heading">সাধারণ নিয়ম: Minimum 6 Months Validity</h3>
        <p>
            প্রায় সব দেশই চায় আপনার পাসপোর্টে কমপক্ষে <b>৬ মাস</b> মেয়াদ বাকি থাকুক।  
            এর কম হলে ভিসা আবেদনে সমস্যা হবে বা সরাসরি রিজেক্ট হবে।
        </p>

        <div class="info-box">
            ✦ ভ্রমণের নির্ধারিত তারিখের পর কমপক্ষে <b>৬ মাস</b> মেয়াদ বাকি থাকতে হবে।  
            <br>
            ✦ কিছু দেশ ৩ মাস ভ্যালিডিটিও গ্রহণ করে (Schengen Entry Rules)।  
        </div>

        <h3 class="section-heading">দেশভেদে পাসপোর্ট ভ্যালিডিটি নিয়ম</h3>

        <ul class="visa-list">
            <li><b>USA:</b> ভ্রমণ শেষে ৬ মাস ভ্যালিডিটি প্রয়োজন</li>
            <li><b>Canada:</b> ভ্রমণ শেষে ৬ মাস ভ্যালিডিটি প্রয়োজন</li>
            <li><b>UK:</b> ভ্রমণ শেষে ৬ মাস ভ্যালিডিটি প্রেফারেবল</li>
            <li><b>Schengen Zone:</b> Entry date + ৩ মাস ভ্যালিডিটি</li>
            <li><b>UAE (Dubai):</b> Minimum ৬ months validity mandatory</li>
            <li><b>Malaysia / Singapore / Thailand:</b> কমপক্ষে ৬ মাস ভ্যালিডিটি বাধ্যতামূলক</li>
        </ul>

        <h3 class="section-heading">পাসপোর্টে ভিসা স্টিকার লাগানোর জন্য কী কী প্রয়োজন?</h3>

        <ul class="visa-list">
            <li>পর্যাপ্ত খালি পাতা (Minimum ২ blank pages)</li>
            <li>পাসপোর্টে কোন ক্ষতি (Damage) থাকা যাবে না</li>
            <li>MRP / e-Passport—উভয়ই গ্রহণযোগ্য</li>
        </ul>

        <h3 class="section-heading">কখন পাসপোর্ট নবায়ন করা উচিত?</h3>
        <p>
            যদি আপনার পাসপোর্টে মাত্র—
        </p>

        <ul class="visa-list">
            <li>৬ মাসের কম মেয়াদ থাকে</li>
            <li>১–২টি পাতা বাকি থাকে</li>
            <li>ছবি ঝাপসা / পাসপোর্ট ক্ষতিগ্রস্ত</li>
        </ul>

        <div class="highlight-box">
            <b>সেরা সময়:</b> পাসপোর্টে ১ বছর মেয়াদ বাকি থাকতেই রিনিউ করে নেওয়া বুদ্ধিমানের কাজ।
        </div>

        <h3 class="section-heading">পাসপোর্ট ভ্যালিডিটি কম হলে কী সমস্যা হতে পারে?</h3>

        <ul class="visa-list">
            <li>ভিসা রিজেকশন</li>
            <li>এয়ারপোর্টে বোর্ডিং বন্ধ হতে পারে</li>
            <li>ইমিগ্রেশন ক্লিয়ারেন্সে সমস্যা</li>
            <li>ভ্রমণের পুরো পরিকল্পনা নষ্ট হতে পারে</li>
        </ul>

        <div class="info-box">
            ✦ ভ্রমণের আগে সবসময় পাসপোর্ট ভ্যালিডিটি পরীক্ষা করুন।  
            <br>
            ✦ প্রয়োজনে তাড়াতাড়ি নবায়ন করুন যাতে ভিসা প্রক্রিয়ায় বাধা না হয়।
        </div>

        <!-- Navigation Buttons -->
        <div class="nav-buttons">
            <a href="{{ url('/ebooks/visa-course/chapter/5') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/7') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection