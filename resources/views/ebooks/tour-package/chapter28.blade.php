@extends('ebooks.tour-package.layout.app')

@section('title','Pre-Departure Checklist')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Pre-Departure Checklist</h2>

    <p>
        ট্যুর শুরুর আগে সবচেয়ে গুরুত্বপূর্ণ কাজ হলো
        <b>Pre-Departure Preparation</b>।
        এই ধাপে ভুল হলে
        পুরো ট্যুর অভিজ্ঞতা নষ্ট হতে পারে।
        এই অধ্যায়ে আপনি শিখবেন
        কীভাবে একটি Professional Pre-Departure Checklist
        ব্যবহার করে ঝামেলামুক্ত ট্যুর নিশ্চিত করবেন।
    </p>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. Pre-Departure Checklist কেন দরকার?</h3>

    <ul class="visa-list">
        <li>✔ Last-minute problem কমে</li>
        <li>✔ Client anxiety কমে</li>
        <li>✔ Tour smooth হয়</li>
        <li>✔ Professional impression তৈরি হয়</li>
    </ul>

    <div class="highlight-box">
        Tour শুরু হয়
        Departure-এর আগেই।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. Travel Documents Checklist</h3>

    <ul class="visa-list">
        <li>✔ Passport (Validity check)</li>
        <li>✔ Visa (Print + Soft copy)</li>
        <li>✔ Air ticket / E-ticket</li>
        <li>✔ Hotel confirmation</li>
        <li>✔ Travel insurance</li>
    </ul>

    <div class="info-box">
        Original + Soft copy
        দুইটাই রাখুন।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Payment & Financial Checklist</h3>

    <ul class="visa-list">
        <li>✔ Remaining payment cleared</li>
        <li>✔ Currency exchange info</li>
        <li>✔ International card activation</li>
    </ul>

    <div class="highlight-box">
        Payment clear না হলে
        Tour risk হয়।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. Client Briefing (Must)</h3>

    <ul class="visa-list">
        <li>✔ Flight time & reporting time</li>
        <li>✔ Baggage allowance</li>
        <li>✔ Airport rules</li>
        <li>✔ Immigration basics</li>
    </ul>

    <div class="info-box">
        Briefing থাকলেই
        Panic কমে।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. Emergency & Support Info</h3>

    <ul class="visa-list">
        <li>✔ Agency contact number</li>
        <li>✔ Local emergency number</li>
        <li>✔ Hotel / guide contact</li>
    </ul>

    <div class="highlight-box">
        Emergency info মানেই
        Peace of mind।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Destination-Specific Reminder</h3>

    <ul class="visa-list">
        <li>✔ Weather & clothing guide</li>
        <li>✔ Local law & culture</li>
        <li>✔ Currency rules</li>
    </ul>

    <div class="info-box">
        Country-wise briefing
        Professional touch দেয়।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading">৭. Pre-Departure WhatsApp Message Sample</h3>

    <div class="info-box">
        আপনার ট্যুরের সব ডকুমেন্ট প্রস্তুত।  
        ফ্লাইট ডিটেইলস, হোটেল ভাউচার ও জরুরি নম্বর
        এখানে দেওয়া হলো।  
        কোনো প্রশ্ন থাকলে জানাবেন।
    </div>

    <!-- SECTION 8 -->
    <h3 class="section-heading">৮. Common Pre-Departure Mistakes</h3>

    <ul class="visa-list">
        <li>❌ Last day briefing</li>
        <li>❌ Document soft copy না দেওয়া</li>
        <li>❌ Emergency info না দেওয়া</li>
    </ul>

    <div class="highlight-box">
        Preparation কম হলে
        Complaint বাড়ে।
    </div>

    <!-- SECTION 9 -->
    <h3 class="section-heading">৯. Trip Designer Pre-Departure Standard</h3>

    <ul class="visa-list">
        <li>✔ 48–72 hours আগে briefing</li>
        <li>✔ Written checklist share</li>
        <li>✔ Dedicated support contact</li>
    </ul>

    <div class="info-box">
        Strong preparation মানেই
        Smooth tour।
    </div>

    <!-- TD SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Pre-Departure Checklist,
                Client Briefing System এবং
                Smooth Tour Operation Setup-এর জন্য  
                <b>Trip Designer</b> আপনার নির্ভরযোগ্য গাইড।
            </p>
        </div>

        <div class="td-card-footer">

            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">WhatsApp</div>
                    <a href="https://wa.me/8801316444266" target="_blank">+8801316444266</a>
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
        <a href="{{ url('/ebooks/tour-package/chapter/27') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/29') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection