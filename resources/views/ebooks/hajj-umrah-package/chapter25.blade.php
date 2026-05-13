@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','হজ্জ ও উমরাহ প্যাকেজ প্রাইসিং | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        হজ্জ ও উমরাহ প্যাকেজ প্রাইসিং  
        (Hajj & Umrah Package Pricing)
    </h2>

    <p>
        হজ্জ ও উমরাহ ব্যবসায়  
        সবচেয়ে সংবেদনশীল বিষয় হলো <strong>প্রাইসিং</strong>।
        কম দাম দিলে লস,
        বেশি দাম দিলে কাস্টমার হারানোর ঝুঁকি।
        একজন <strong>Trip Designer</strong> হিসেবে  
        সঠিক প্রাইসিং স্ট্র্যাটেজি জানা  
        আপনার লাভের মূল চাবিকাঠি।
    </p>

    <div class="highlight-box">
        Pricing decides profit, not volume
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. হজ্জ ও উমরাহ প্যাকেজের মূল খরচ</h3>
    <p>
        প্রাইসিং শুরু হয়  
        <strong>Actual Cost Calculation</strong> দিয়ে।
        একটি প্যাকেজে সাধারণত নিচের খরচগুলো থাকে।
    </p>

    <ul class="visa-list">
        <li>✔ Air Ticket</li>
        <li>✔ Visa Processing</li>
        <li>✔ Hotel (Makkah & Madinah)</li>
        <li>✔ Transport & Ziyarah</li>
        <li>✔ Food / Catering</li>
        <li>✔ Guide & Staff Cost</li>
    </ul>

    <div class="info-box">
        ভুল cost calculation = নিশ্চিত loss
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. প্যাকেজ ক্যাটাগরি অনুযায়ী প্রাইসিং</h3>
    <p>
        সব কাস্টমারের বাজেট এক নয়।
        তাই প্যাকেজকে ক্যাটাগরিতে ভাগ করা জরুরি।
    </p>

    <ul class="visa-list">
        <li>✔ Budget Package → Minimum facility</li>
        <li>✔ Standard Package → Balanced service</li>
        <li>✔ Premium / VIP Package → Comfort & proximity</li>
    </ul>

    <div class="highlight-box">
        Different budget needs different packages
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Per Person Cost Calculation</h3>
    <p>
        গ্রুপ সাইজ অনুযায়ী  
        প্রতি জনের খরচ পরিবর্তন হয়।
        ভুলভাবে ভাগ করলে  
        প্রফিট গলে যায়।
    </p>

    <ul class="visa-list">
        <li>✔ Total cost ÷ Total pilgrims</li>
        <li>✔ Extra buffer (unexpected)</li>
        <li>✔ Currency fluctuation consideration</li>
    </ul>

    <div class="info-box">
        Always calculate with buffer
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. মার্কেট প্রাইস বনাম নিজের প্রাইস</h3>
    <p>
        শুধু বাজারের দাম দেখে  
        প্রাইস সেট করা  
        একটি বড় ভুল।
        আপনার সার্ভিস ভ্যালু  
        প্রাইস নির্ধারণ করে।
    </p>

    <ul class="visa-list">
        <li>✔ Competitor analysis</li>
        <li>✔ Service comparison</li>
        <li>✔ Brand trust value</li>
    </ul>

    <div class="highlight-box">
        Cheapest is not always profitable
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. Trip Designer Pro Pricing Tips</h3>

    <ul class="visa-list">
        <li>✔ Clear inclusion & exclusion</li>
        <li>✔ Written pricing breakup</li>
        <li>✔ Avoid price dumping</li>
        <li>✔ Focus on value, not discount</li>
    </ul>

    <div class="info-box">
        Transparent pricing builds trust
    </div>

    <!-- CTA -->
    <div class="td-card">

        <div class="td-card-body">
            <p class="td-text">
                আপনি কি চান  
                <strong>লাভজনক ও টেকসই হজ্জ/উমরাহ ব্যবসা</strong>?
                <br><br>
                <strong>Trip Designer</strong> দিচ্ছে—
                ✔ Professionally Designed Packages  
                ✔ Transparent Pricing Model  
                ✔ Profit-focused Planning
            </p>
        </div>

        <div class="td-card-footer">

            <div class="td-contact-box">
                <span class="cta-icon">🕋</span>
                <div>
                    <div class="cta-label">Hajj & Umrah Packages</div>
                    <a href="https://tripdesigner.net/hajj-umrah" target="_blank">
                        Visit Official Page
                    </a>
                </div>
            </div>

            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">Business Consultation</div>
                    <a href="https://wa.me/8801316444646" target="_blank">
                        +8801316444646 (Contact Now)
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/24') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/26') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection