@extends('ebooks.visa-course.layout.app')

@section('title','কভার লেটার টেমপ্লেট')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">কভার লেটার টেমপ্লেট (Cover Letter Template)</h2>

    <p>
        ভিসা আবেদনে একটি <b>Strong Cover Letter</b>
        অত্যন্ত গুরুত্বপূর্ণ ভূমিকা পালন করে।
        এটি কনসুলার অফিসারকে আপনার ভ্রমণের উদ্দেশ্য,
        প্রোফাইল এবং বিশ্বাসযোগ্যতা পরিষ্কারভাবে বুঝতে সাহায্য করে।
        নিচে একটি প্রফেশনাল কভার লেটার টেমপ্লেট দেওয়া হলো।
    </p>

    <div class="highlight-box">
        একটি ভালো কভার লেটার অনেক সময় দুর্বল প্রোফাইলও শক্তিশালী করে তোলে।
    </div>

    <!-- SECTION -->
    <h3 class="section-heading">কভার লেটারে যা অবশ্যই থাকতে হবে</h3>
    <ul class="visa-list">
        <li>✔ ভ্রমণের উদ্দেশ্য (Purpose of Travel)</li>
        <li>✔ ভ্রমণের সময়কাল ও পরিকল্পনা</li>
        <li>✔ আর্থিক সক্ষমতার ব্যাখ্যা</li>
        <li>✔ দেশে ফিরে আসার নিশ্চয়তা (Home Ties)</li>
    </ul>

    <!-- TEMPLATE BOX -->
    <h3 class="section-heading">Sample Cover Letter (Template)</h3>

    <div class="highlight-box" style="font-family: monospace; white-space: pre-line;">
To  
The Visa Officer  
Embassy of [Country Name]  

Subject: Application for [Visa Type]

Dear Sir/Madam,

I am [Your Full Name], a citizen of Bangladesh holding passport number [XXXXXXX].
I would like to apply for a [Visa Type] to visit [Country Name] from [Date] to [Date].

The purpose of my travel is [clearly explain purpose].
During my stay, I will be staying at [Hotel / Address].
All expenses will be borne by [Self / Sponsor].

I am currently working as [Job Title] at [Company Name] and will resume my duties after returning.
I have strong family, professional and financial ties in Bangladesh.

I am submitting all required documents for your kind consideration.

Thank you for your time and consideration.

Sincerely,  
[Your Name]  
[Contact Number]
    </div>

    <!-- TIPS -->
    <h3 class="section-heading">গুরুত্বপূর্ণ টিপস</h3>
    <ul class="visa-list">
        <li>✔ তথ্য সংক্ষিপ্ত ও সত্য হতে হবে</li>
        <li>✔ অপ্রয়োজনীয় গল্প এড়িয়ে চলুন</li>
        <li>✔ প্রতিটি দেশের জন্য আলাদা কভার লেটার লিখুন</li>
    </ul>

    <div class="info-box">
        একই কভার লেটার কপি করে সব ভিসায় ব্যবহার করা উচিত নয়।
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Professional Cover Letter Writing,
                Profile Analysis এবং
                Country-wise Custom Letter তৈরির জন্য
                <b>Trip Designer</b> অভিজ্ঞ সাপোর্ট প্রদান করে।
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
        <a href="{{ url('/ebooks/visa-course/chapter/69') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/71') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection