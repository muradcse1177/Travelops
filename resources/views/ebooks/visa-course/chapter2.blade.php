@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 2 - ভিসার ধরন')

@section('content')
<div class="chapter-box">

        <!-- CHAPTER HEADER -->
        <h2 class="chapter-title">ভিসার ধরন</h2>
        <p class="chapter-sub">
            ভিসা বিভিন্ন উদ্দেশ্যের ভিত্তিতে বিভিন্ন ধরনের হয়ে থাকে। সঠিক ভিসা নির্বাচন ভ্রমণ, কাজ বা পড়াশোনার জন্য অত্যন্ত গুরুত্বপূর্ণ।
        </p>

        <!-- VISA TYPE : TOURIST -->
        <div class="visa-card">
            <h3 class="visa-title">১. ট্যুরিস্ট ভিসা (Tourist Visa)</h3>
            <p><strong>ব্যবহার:</strong> ভ্রমণ, ছুটি, দর্শনীয় স্থান পরিদর্শন</p>

            <ul class="visa-list">
                <li>✔ চাকরি করা যাবে না</li>
                <li>✔ নির্দিষ্ট সময়ের জন্য প্রদান</li>
                <li>✔ আর্থিক সক্ষমতা ও ট্রাভেল হিস্টরি গুরুত্বপূর্ণ</li>
            </ul>

            <div class="note-box">
                <strong>কার জন্য:</strong> প্রথমবার ভ্রমণকারী বা পরিবারসহ ভ্রমণের জন্য উপযোগী।
            </div>
        </div>

        <!-- VISA TYPE : BUSINESS -->
        <div class="visa-card">
            <h3 class="visa-title">২. বিজনেস ভিসা (Business Visa)</h3>
            <p><strong>ব্যবহার:</strong> মিটিং, কনফারেন্স, ট্রেড শো</p>

            <ul class="visa-list">
                <li>✔ ব্যবসা-সম্পর্কিত কার্যক্রমে অংশগ্রহণ</li>
                <li>✔ আমন্ত্রণপত্র প্রয়োজন হতে পারে</li>
                <li>✔ চাকরি করার অনুমতি নেই</li>
            </ul>
        </div>

        <!-- VISA TYPE : WORK -->
        <div class="visa-card">
            <h3 class="visa-title">৩. ওয়ার্ক ভিসা (Work Visa)</h3>
            <p><strong>ব্যবহার:</strong> বিদেশে চাকরি বা কর্মসংস্থান</p>

            <ul class="visa-list">
                <li>✔ বৈধ চাকরির অনুমতি</li>
                <li>✔ স্পন্সর কোম্পানি প্রয়োজন</li>
                <li>✔ মেডিক্যাল ও নিরাপত্তা পরীক্ষা বাধ্যতামূলক</li>
            </ul>

            <div class="note-box">
                <strong>কার জন্য:</strong> Gulf, UK, Canada, Romania, Croatia ইত্যাদিতে চাকরির জন্য জনপ্রিয়।
            </div>
        </div>

        <!-- VISA TYPE : FAMILY -->
        <div class="visa-card">
            <h3 class="visa-title">৪. ফ্যামিলি / ভিজিট ভিসা</h3>
            <p><strong>ব্যবহার:</strong> বিদেশে থাকা পরিবারের সদস্যদের সাথে সাক্ষাৎ</p>

            <ul class="visa-list">
                <li>✔ আমন্ত্রণকারী ব্যক্তির নথি প্রয়োজন</li>
                <li>✔ স্পন্সরশিপ ডকুমেন্ট আবশ্যক</li>
                <li>✔ নির্দিষ্ট সময়ের অনুমতি</li>
            </ul>
        </div>

        <!-- VISA TYPE : STUDENT -->
        <div class="visa-card">
            <h3 class="visa-title">৫. স্টুডেন্ট ভিসা (Student Visa)</h3>
            <p><strong>ব্যবহার:</strong> বিদেশে উচ্চশিক্ষা</p>

            <ul class="visa-list">
                <li>✔ শিক্ষাপ্রতিষ্ঠানে অ্যাডমিশন প্রয়োজন</li>
                <li>✔ পর্যাপ্ত ফান্ড প্রদর্শন করতে হয়</li>
                <li>✔ দেশভেদে পার্ট-টাইম কাজের সুযোগ</li>
                <li>✔ ইন্টারভিউ প্রয়োজন হতে পারে</li>
            </ul>

            <div class="note-box">
                <strong>কার জন্য:</strong> Canada, UK, USA, Australia, Germany ইত্যাদি দেশে পড়াশোনা ইচ্ছুকদের জন্য।
            </div>
        </div>

        <!-- VISA TYPE : TRANSIT -->
        <div class="visa-card">
            <h3 class="visa-title">৬. ট্রানজিট ভিসা (Transit Visa)</h3>
            <p><strong>ব্যবহার:</strong> Connecting flight-এর লে-ওভার হলে</p>

            <ul class="visa-list">
                <li>✔ খুব স্বল্প সময়ের জন্য বৈধ</li>
                <li>✔ বিমানবন্দর সীমাবদ্ধ</li>
                <li>✔ বাইরে যাওয়ার অনুমতি নাও থাকতে পারে</li>
            </ul>
        </div>

        <!-- SUMMARY -->
        <h3 class="section-heading">সংক্ষেপে (Quick Summary)</h3>

        <table class="table table-bordered summary-table">
            <thead class="table-primary">
                <tr>
                    <th>ভিসার ধরন</th>
                    <th>উদ্দেশ্য</th>
                    <th>চাকরি করা যায়?</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Tourist</td><td>ভ্রমণ</td><td>❌</td></tr>
                <tr><td>Business</td><td>ব্যবসা</td><td>❌</td></tr>
                <tr><td>Work</td><td>চাকরি</td><td>✔️</td></tr>
                <tr><td>Family / Visit</td><td>পরিবার দেখা</td><td>❌</td></tr>
                <tr><td>Student</td><td>পড়াশোনা</td><td>✔️</td></tr>
                <tr><td>Transit</td><td>ট্রানজিট</td><td>❌</td></tr>
            </tbody>
        </table>

        <!-- NAVIGATION -->
        <div class="nav-buttons">
            <a href="{{ url('/ebooks/visa-course/chapter/1') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/3') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection