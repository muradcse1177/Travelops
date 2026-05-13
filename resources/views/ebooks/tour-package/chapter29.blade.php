@extends('ebooks.tour-package.layout.app')

@section('title','Visa, Ticket ও Hotel Coordination')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Visa, Ticket ও Hotel Coordination</h2>

    <p>
        ট্যুর অপারেশনের সবচেয়ে সেনসিটিভ অংশ হলো
        <b>Visa, Ticket ও Hotel Coordination</b>।
        এখানে ছোট ভুলও বড় সমস্যার কারণ হতে পারে।
        এই অধ্যায়ে আপনি শিখবেন
        কীভাবে তিনটি সেকশন একসাথে
        সঠিকভাবে ম্যানেজ করে
        একটি Smooth Tour নিশ্চিত করবেন।
    </p>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. Coordination কেন এত গুরুত্বপূর্ণ?</h3>

    <ul class="visa-list">
        <li>✔ Timeline mismatch এড়ানো যায়</li>
        <li>✔ Last-minute panic কমে</li>
        <li>✔ Client confidence বাড়ে</li>
        <li>✔ Operational error কমে</li>
    </ul>

    <div class="highlight-box">
        Coordination ভালো না হলে
        সবকিছু এলোমেলো হয়।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. Visa Coordination Best Practice</h3>

    <ul class="visa-list">
        <li>✔ Visa processing timeline clear</li>
        <li>✔ Embassy requirement checklist</li>
        <li>✔ Client document follow-up</li>
        <li>✔ Submission & result tracking</li>
    </ul>

    <div class="info-box">
        Visa status না জেনে
        Ticket confirm করবেন না।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Ticket Coordination Strategy</h3>

    <ul class="visa-list">
        <li>✔ Tentative booking আগে</li>
        <li>✔ Visa approval পরেই issue</li>
        <li>✔ Baggage & transit check</li>
        <li>✔ Name & date double-check</li>
    </ul>

    <div class="highlight-box">
        Ticket error মানেই
        Financial loss।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. Hotel Coordination Essentials</h3>

    <ul class="visa-list">
        <li>✔ Location verify</li>
        <li>✔ Room type & pax match</li>
        <li>✔ Check-in/check-out time</li>
        <li>✔ Special request note</li>
    </ul>

    <div class="info-box">
        Cheap hotel নয় —
        Right hotel গুরুত্বপূর্ণ।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. Timeline Management (Golden Rule)</h3>

    <ul class="visa-list">
        <li>✔ Visa → Ticket → Hotel sequence</li>
        <li>✔ Buffer days রাখুন</li>
        <li>✔ Client update নিয়মিত দিন</li>
    </ul>

    <div class="highlight-box">
        Timeline control মানেই
        Stress control।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Client Communication During Coordination</h3>

    <ul class="visa-list">
        <li>✔ Status update message</li>
        <li>✔ Delay হলে আগে জানান</li>
        <li>✔ Clear expectation set</li>
    </ul>

    <div class="info-box">
        Silence মানেই
        Client anxiety।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading">৭. Coordination Checklist (Internal)</h3>

    <ul class="visa-list">
        <li>✔ Passport & visa status</li>
        <li>✔ Ticket draft & final copy</li>
        <li>✔ Hotel voucher verified</li>
        <li>✔ Emergency contact ready</li>
    </ul>

    <div class="highlight-box">
        Checklist ছাড়া
        Coordination risky।
    </div>

    <!-- SECTION 8 -->
    <h3 class="section-heading">৮. Common Coordination Mistakes</h3>

    <ul class="visa-list">
        <li>❌ Visa result আগে ticket issue</li>
        <li>❌ Name spelling ignore</li>
        <li>❌ Hotel location check না করা</li>
        <li>❌ Client update না দেওয়া</li>
    </ul>

    <div class="info-box">
        একবার ভুল হলে
        Trust নষ্ট হয়।
    </div>

    <!-- SECTION 9 -->
    <h3 class="section-heading">৯. Trip Designer Coordination Standard</h3>

    <ul class="visa-list">
        <li>✔ Written timeline share</li>
        <li>✔ Double verification system</li>
        <li>✔ Proactive client update</li>
        <li>✔ No assumption policy</li>
    </ul>

    <div class="highlight-box">
        Strong coordination মানেই
        Smooth operation।
    </div>

    <!-- TD SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Visa Processing Coordination,
                Ticketing Workflow এবং
                Hotel Management System-এর জন্য  
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
        <a href="{{ url('/ebooks/tour-package/chapter/28') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/30') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection