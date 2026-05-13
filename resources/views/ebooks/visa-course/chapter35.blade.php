@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 35 - ভিসা অনুমোদনের পর করণীয়')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">ভিসা অনুমোদনের পর করণীয়</h2>

        <p>
            ভিসা অনুমোদন পাওয়া মানেই যাত্রা শেষ নয় — বরং আসল প্রস্তুতির শুরু।  
            ভ্রমণ, কাজ বা পড়াশোনার উদ্দেশ্য অনুযায়ী কয়েকটি গুরুত্বপূর্ণ কাজ  
            ভিসা পাওয়ার পরই সম্পন্ন করা উচিত।
        </p>

        <div class="highlight-box">
            ভুল প্রস্তুতির কারণে অনেক সময় Immigration-এ সমস্যা হয়।  
            তাই ভিসা পাওয়ার পর নিচের ধাপগুলো খুবই গুরুত্বপূর্ণ।
        </div>

        <!-- SECTION 1 -->
        <h3 class="section-heading">১. ভিসার তথ্য যাচাই করুন</h3>

        <p>পাসপোর্টে লাগানো ভিসার প্রতিটি তথ্য সঠিক আছে কি না চেক করুন:</p>

        <ul class="visa-list">
            <li>নাম সঠিক বানানে আছে?</li>
            <li>পাসপোর্ট নম্বর ঠিক আছে?</li>
            <li>ভিসার Validity সঠিক?</li>
            <li>Number of Entries (Single / Multiple) ঠিক আছে?</li>
            <li>Permitted stay কতদিন?</li>
        </ul>

        <div class="info-box">
            যদি তথ্য ভুল পান — সঙ্গে সঙ্গে Embassy বা VFS সেন্টারে যোগাযোগ করুন।
        </div>

        <!-- SECTION 2 -->
        <h3 class="section-heading">২. ফ্লাইট বুকিং</h3>

        <p>ভিসা পাওয়ার পর নিশ্চিত ফ্লাইট বুকিং করা সবচেয়ে গুরুত্বপূর্ণ ধাপ।</p>

        <ul class="visa-list">
            <li>সরাসরি ফ্লাইট হলে সুবিধা বেশি</li>
            <li>Layover country-তে Transit Visa প্রয়োজন কিনা দেখুন</li>
            <li>Flexible ticket option নিন (পরিবর্তন যোগ্য)</li>
        </ul>

        <div class="highlight-box">
            কম দামে টিকিট পেতে আগেভাগে বুক করুন।
        </div>

        <!-- SECTION 3 -->
        <h3 class="section-heading">৩. হোটেল ও থাকার ব্যবস্থা (Accommodation)</h3>

        <ul class="visa-list">
            <li>প্রথম ১৪ দিনের থাকার ব্যবস্থা নিশ্চিত করুন</li>
            <li>Student হলে বিশ্ববিদ্যালয়ের Dormitory বুক করুন</li>
            <li>Work Visa হলে Employer কি accommodation দিচ্ছে তা যাচাই করুন</li>
        </ul>

        <!-- SECTION 4 -->
        <h3 class="section-heading">৪. ভ্রমণ বীমা (Travel Insurance)</h3>

        <p>
            Schengen, Turkey, Dubai সহ অনেক দেশে ভ্রমণের সময়  
            স্বাস্থ্য বীমা বাধ্যতামূলক।
        </p>

        <ul class="visa-list">
            <li>Medical coverage minimum €30,000 (Schengen)</li>
            <li>Travel delay, baggage loss coverage</li>
            <li>Emergency assistance coverage</li>
        </ul>

        <!-- SECTION 5 -->
        <h3 class="section-heading">৫. প্রয়োজনীয় ডকুমেন্টস সবসময় সাথে রাখুন</h3>

        <p>ইমিগ্রেশনে নিচের নথিগুলো চাইতে পারে:</p>

        <ul class="visa-list">
            <li>Passport + Visa</li>
            <li>Return Ticket / Travel Plan</li>
            <li>Hotel booking</li>
            <li>Bank statement / Sufficient money proof</li>
            <li>Invitation Letter (যদি থাকে)</li>
            <li>Employment/University documents</li>
        </ul>

        <!-- SECTION 6 -->
        <h3 class="section-heading">৬. ইমিগ্রেশন প্রশ্নোত্তর প্রস্তুতি</h3>

        <p>ইমিগ্রেশন অফিসার সাধারণত জিজ্ঞেস করেন:</p>

        <ul class="visa-list">
            <li>আপনার ভ্রমণের উদ্দেশ্য কী?</li>
            <li>কোথায় থাকবেন?</li>
            <li>কতদিন থাকবেন?</li>
            <li>কে খরচ দিচ্ছে?</li>
        </ul>

        <div class="info-box">
            স্পষ্ট, সংক্ষিপ্ত এবং সত্য উত্তর দিন।
        </div>

        <!-- SECTION 7 -->
        <h3 class="section-heading">৭. বিদেশে পৌঁছানোর পর করণীয় (Work/Study/Visit)</h3>

        <ul class="visa-list">
            <li>Local SIM সংগ্রহ করুন</li>
            <li>Accommodation check-in সম্পন্ন করুন</li>
            <li>Visa rules অনুযায়ী registration (যদি প্রয়োজন)</li>
            <li>Health insurance activate করুন</li>
            <li>Student হলে orientation-এ অংশ নিন</li>
        </ul>

        <!-- SUPPORT CARD -->
        <div class="td-card">
            <div class="td-card-body">
                <p class="td-text">
                    ফ্লাইট বুকিং, হোটেল বুকিং, ইমিগ্রেশন গাইড, ট্রাভেল ইন্স্যুরেন্স—  
                    সবকিছুতেই <b>Trip Designer</b> আপনার পাশে আছে।
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
            <a href="{{ url('/ebooks/visa-course/chapter/34') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/36') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection