@extends('ebooks.visa-course.layout.app')

@section('title','স্পন্সরশিপ লেটার (Sponsorship Letter)')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">স্পন্সরশিপ লেটার (Sponsorship Letter)</h2>

    <p>
        ভিসা আবেদনের ক্ষেত্রে যখন আবেদনকারীর নিজের আর্থিক সক্ষমতা
        পর্যাপ্ত না থাকে, তখন একজন
        <b>Sponsor</b> (যেমন— বাবা, মা, ভাই, বোন, আত্মীয়)
        ভ্রমণ ব্যয়ের দায়িত্ব গ্রহণ করে।
        এই বিষয়টি স্পষ্টভাবে বোঝানোর জন্য
        <b>স্পন্সরশিপ লেটার</b> অত্যন্ত গুরুত্বপূর্ণ।
    </p>

    <div class="highlight-box">
        স্পন্সরশিপ লেটার না থাকলে বা দুর্বল হলে ভিসা রিজেকশন হতে পারে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">স্পন্সরশিপ লেটার কেন প্রয়োজন</h3>
    <ul class="visa-list">
        <li>✔ ভ্রমণ ব্যয় কে বহন করবে তা পরিষ্কারভাবে বোঝাতে</li>
        <li>✔ আবেদনকারীর আর্থিক সাপোর্ট প্রমাণ করতে</li>
        <li>✔ কনসুলার অফিসারের সন্দেহ দূর করতে</li>
        <li>✔ ফ্যামিলি বা রিলেশনশিপ প্রমাণ করতে</li>
    </ul>

    <!-- SECTION 2 -->
    <h3 class="section-heading">কারা Sponsor হতে পারেন</h3>
    <ul class="visa-list">
        <li>✔ বাবা / মা</li>
        <li>✔ ভাই / বোন</li>
        <li>✔ স্বামী / স্ত্রী</li>
        <li>✔ নিকট আত্মীয় (বিশ্বাসযোগ্য ক্ষেত্রে)</li>
    </ul>

    <div class="info-box">
        Sponsor-এর সাথে আবেদনকারীর সম্পর্ক প্রমাণকারী ডকুমেন্ট থাকা বাধ্যতামূলক।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">স্পন্সরশিপ লেটারের সাথে যেসব ডকুমেন্ট দিতে হয়</h3>
    <ul class="visa-list">
        <li>✔ Sponsor-এর Bank Statement</li>
        <li>✔ Sponsor-এর NID / Passport Copy</li>
        <li>✔ Relationship Proof (Birth Certificate, Family Tree)</li>
        <li>✔ Income Proof / Employment Details</li>
    </ul>

    <!-- TEMPLATE -->
    <h3 class="section-heading">Sample Sponsorship Letter (Template)</h3>

    <div class="highlight-box" style="font-family: monospace; white-space: pre-line;">
To  
The Visa Officer  
Embassy of [Country Name]

Subject: Sponsorship Letter for [Applicant Name]

Dear Sir/Madam,

I, [Sponsor Name], holding Bangladeshi passport/NID number [XXXX],
would like to inform you that I am the [relationship]
of [Applicant Name].

I hereby confirm that I will fully sponsor all expenses of
[Applicant Name] including travel, accommodation, food and other
related costs during the stay in [Country Name].

I am currently working as [Occupation] at [Company Name] and have
sufficient financial capability to bear all expenses.
My supporting financial documents are attached herewith.

I kindly request you to consider this sponsorship while
processing the visa application.

Sincerely,  
[Sponsor Name]  
[Contact Number]  
[Signature]
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">গুরুত্বপূর্ণ টিপস</h3>
    <ul class="visa-list">
        <li>✔ Sponsor-এর ব্যাংক ব্যালেন্স বাস্তবসম্মত হতে হবে</li>
        <li>✔ Sponsor ও Applicant-এর তথ্য মিল থাকতে হবে</li>
        <li>✔ মিথ্যা বা অতিরঞ্জিত তথ্য ব্যবহার করবেন না</li>
        <li>✔ Country-wise format follow করা ভালো</li>
    </ul>

    <div class="info-box">
        Sponsor শক্তিশালী না হলে ভিসা আবেদন দুর্বল হয়ে যায়।
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Professional Sponsorship Letter Draft,
                Sponsor Evaluation এবং
                Country-wise Financial Guidance-এর জন্য
                <b>Trip Designer</b> নির্ভরযোগ্য সাপোর্ট প্রদান করে।
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
        <a href="{{ url('/ebooks/visa-course/chapter/70') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/72') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection