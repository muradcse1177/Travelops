@extends('ebooks.visa-course.layout.app')

@section('title','SOP টেমপ্লেট (Statement of Purpose)')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">SOP টেমপ্লেট (Statement of Purpose)</h2>

    <p>
        <b>Statement of Purpose (SOP)</b> হলো একটি ব্যক্তিগত লিখিত বিবৃতি,
        যেখানে আবেদনকারী তার শিক্ষাগত লক্ষ্য, ক্যারিয়ার পরিকল্পনা এবং
        নির্দিষ্ট দেশ বা প্রতিষ্ঠানে পড়াশোনার উদ্দেশ্য ব্যাখ্যা করে।
        স্টুডেন্ট ভিসা এবং অনেক সময় ওয়ার্ক ভিসার ক্ষেত্রেও SOP অত্যন্ত গুরুত্বপূর্ণ।
    </p>

    <div class="highlight-box">
        একটি শক্তিশালী SOP আপনার প্রোফাইলকে অন্যদের থেকে আলাদা করে তোলে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">একটি ভালো SOP-এ যা যা থাকতে হবে</h3>
    <ul class="visa-list">
        <li>✔ Academic Background ও Education History</li>
        <li>✔ কেন এই কোর্স ও এই দেশ নির্বাচন করেছেন</li>
        <li>✔ Career Goal ও ভবিষ্যৎ পরিকল্পনা</li>
        <li>✔ Home Country-তে ফিরে আসার যুক্তি</li>
    </ul>

    <!-- SECTION 2 -->
    <h3 class="section-heading">SOP লেখার সময় যে ভুলগুলো এড়িয়ে চলবেন</h3>
    <ul class="visa-list">
        <li>✔ Copy-paste SOP ব্যবহার করা</li>
        <li>✔ অপ্রাসঙ্গিক ব্যক্তিগত গল্প</li>
        <li>✔ অতিরঞ্জিত বা মিথ্যা তথ্য</li>
        <li>✔ খুব ছোট বা খুব বড় SOP লেখা</li>
    </ul>

    <div class="info-box">
        প্রতিটি SOP অবশ্যই Country ও Course-specific হতে হবে।
    </div>

    <!-- TEMPLATE -->
    <h3 class="section-heading">Sample SOP Template</h3>

    <div class="highlight-box" style="font-family: monospace; white-space: pre-line;">
Statement of Purpose

My name is [Your Full Name], a citizen of Bangladesh.
I have completed my [Last Degree] from [Institution Name].

I am applying for the [Course Name] at [University Name] in [Country].
My interest in this field developed due to [brief background].

This course will help me gain advanced knowledge and practical skills
which are directly related to my career goal of becoming a
[Your Career Objective].

After completing my studies, I intend to return to Bangladesh and
apply my skills in [Industry / Organization / Business].
My family, career and financial ties strongly connect me to my home country.

I have sufficient financial support for my studies and living expenses,
and all supporting documents are attached.

I sincerely request you to consider my application.

Thank you.

Sincerely,  
[Your Name]
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">Country-wise SOP-এ সাধারণত যেগুলো বেশি গুরুত্ব পায়</h3>
    <ul class="visa-list">
        <li>✔ UK / Australia – Career Progression</li>
        <li>✔ Canada – Study Plan ও Return Intention</li>
        <li>✔ USA – Academic Consistency</li>
        <li>✔ Europe – Course Relevance</li>
    </ul>

    <div class="highlight-box">
        এক দেশ ও অন্য দেশের SOP কখনো একরকম হয় না।
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Professional SOP Writing,
                Profile Analysis এবং
                Country-wise Custom SOP তৈরির জন্য
                <b>Trip Designer</b> অভিজ্ঞ ও নির্ভরযোগ্য সাপোর্ট প্রদান করে।
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
        <a href="{{ url('/ebooks/visa-course/chapter/71') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/73') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection