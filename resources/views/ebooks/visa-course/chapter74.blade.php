@extends('ebooks.visa-course.layout.app')

@section('title','ভিসা ডকুমেন্ট চেকলিস্ট')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">ভিসা ডকুমেন্ট চেকলিস্ট</h2>

    <p>
        ভিসা প্রসেসিংয়ে সবচেয়ে বেশি রিজেকশন হয়
        <b>অসম্পূর্ণ বা ভুল ডকুমেন্ট</b>–এর কারণে।
        তাই আবেদন করার আগে একটি সঠিক
        <b>Document Checklist</b> ফলো করা অত্যন্ত জরুরি।
        নিচে ভিসা টাইপ অনুযায়ী প্রয়োজনীয় ডকুমেন্ট তালিকা দেওয়া হলো।
    </p>

    <div class="highlight-box">
        একটি ডকুমেন্টও মিস হলে পুরো আবেদন ঝুঁকিতে পড়ে যেতে পারে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">Common Documents (সব ভিসার জন্য)</h3>
    <ul class="visa-list">
        <li>✔ Valid Passport (কমপক্ষে ৬ মাস ভ্যালিড)</li>
        <li>✔ Passport Size Photo</li>
        <li>✔ Visa Application Form</li>
        <li>✔ Cover Letter</li>
        <li>✔ Bank Statement / Financial Proof</li>
    </ul>

    <!-- SECTION 2 -->
    <h3 class="section-heading">Tourist Visa – Document Checklist</h3>
    <ul class="visa-list">
        <li>✔ Travel Itinerary</li>
        <li>✔ Hotel Booking</li>
        <li>✔ Return Air Ticket</li>
        <li>✔ Travel Insurance</li>
        <li>✔ Employment Letter / Business Documents</li>
    </ul>

    <!-- SECTION 3 -->
    <h3 class="section-heading">Student Visa – Document Checklist</h3>
    <ul class="visa-list">
        <li>✔ Offer Letter / CAS / I-20</li>
        <li>✔ Academic Certificates & Transcripts</li>
        <li>✔ SOP (Statement of Purpose)</li>
        <li>✔ Proof of Funds</li>
        <li>✔ IELTS / Language Test Result</li>
    </ul>

    <div class="info-box">
        Student Visa-তে SOP ও Fund Proof সবচেয়ে গুরুত্বপূর্ণ ডকুমেন্ট।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">Work Visa – Document Checklist</h3>
    <ul class="visa-list">
        <li>✔ Job Offer Letter</li>
        <li>✔ Employment Contract</li>
        <li>✔ Work Permit / LMIA (যদি প্রযোজ্য)</li>
        <li>✔ Experience Certificates</li>
        <li>✔ Medical & Police Clearance</li>
    </ul>

    <!-- SECTION 5 -->
    <h3 class="section-heading">Sponsor থাকলে অতিরিক্ত ডকুমেন্ট</h3>
    <ul class="visa-list">
        <li>✔ Sponsorship Letter</li>
        <li>✔ Sponsor Bank Statement</li>
        <li>✔ Sponsor NID / Passport Copy</li>
        <li>✔ Relationship Proof</li>
    </ul>

    <div class="highlight-box">
        Sponsor দুর্বল হলে পুরো ফাইল দুর্বল হয়ে যায়।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">ডকুমেন্ট প্রস্তুতের সময় সতর্কতা</h3>
    <ul class="visa-list">
        <li>✔ সব ডকুমেন্ট আপডেট ও ভ্যালিড হতে হবে</li>
        <li>✔ তথ্য যেন একে অপরের সাথে মিল থাকে</li>
        <li>✔ জাল বা ফেক ডকুমেন্ট ব্যবহার করবেন না</li>
        <li>✔ Country-wise requirement ফলো করুন</li>
    </ul>

    <div class="info-box">
        ডকুমেন্ট mismatch হলে ভিসা রিজেকশন প্রায় নিশ্চিত।
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Document Checklist Verification,
                File Review এবং
                Country-wise Document Guidance-এর জন্য
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
        <a href="{{ url('/ebooks/visa-course/chapter/73') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/75') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection