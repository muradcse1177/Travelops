@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 1 - Air Ticketing Overview')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Air Ticketing Overview</h2>

    <p>
        এয়ার টিকেটিং হলো বিমান ভ্রমণের জন্য যাত্রীকে নির্দিষ্ট ফ্লাইটে  
        আসন সংরক্ষণ (Seat Reservation) করে  
        <b>টিকেট ইস্যু, পরিবর্তন ও বাতিল</b> করার পূর্ণাঙ্গ প্রক্রিয়া।
    </p>

    <div class="highlight-box">
        সঠিক এয়ার টিকেটিং না জানলে বড় আর্থিক ক্ষতি এবং ভিসা/ভ্রমণ সমস্যা হতে পারে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> Air Ticketing কী?</h3>

    <p>
        Air Ticketing হলো এমন একটি প্রক্রিয়া যেখানে—
    </p>

    <ul class="visa-list">
        <li>✔ সঠিক ফ্লাইট নির্বাচন করা হয়</li>
        <li>✔ নির্দিষ্ট ক্লাস ও ভাড়া নির্ধারণ করা হয়</li>
        <li>✔ যাত্রীর তথ্য সংরক্ষণ (PNR) করা হয়</li>
        <li>✔ টিকেট ইস্যু, রিইস্যু বা রিফান্ড করা হয়</li>
    </ul>

    <div class="info-box">
        Air Ticketing = Flight + Fare + Rule + Passenger Data
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> Air Ticketing কেন গুরুত্বপূর্ণ?</h3>

    <ul class="visa-list">
        <li>✔ বিমান ভ্রমণ সবচেয়ে দ্রুত যাতায়াত মাধ্যম</li>
        <li>✔ ট্রাভেল ইন্ডাস্ট্রির প্রধান আয়ের উৎস</li>
        <li>✔ ভুল টিকেটিং বড় আর্থিক ক্ষতি ঘটাতে পারে</li>
        <li>✔ দক্ষ টিকেটিং এজেন্টদের চাহিদা সবসময় বেশি</li>
    </ul>

    <div class="highlight-box">
        একজন দক্ষ Ticketing Agent মানেই trusted professional।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> Air Ticketing ইন্ডাস্ট্রিতে কারা জড়িত?</h3>

    <ul class="visa-list">
        <li>✔ Airline (এয়ারলাইন)</li>
        <li>✔ GDS (Galileo, Sabre, Amadeus)</li>
        <li>✔ Travel Agency</li>
        <li>✔ Travel Agent / Ticketing Officer</li>
    </ul>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> GDS-এর ভূমিকা</h3>

    <p>
        GDS (Global Distribution System) হলো এমন একটি প্ল্যাটফর্ম  
        যা এয়ারলাইন এবং ট্রাভেল এজেন্সিকে সংযুক্ত করে।
    </p>

    <ul class="visa-list">
        <li>✔ Flight availability দেখায়</li>
        <li>✔ Fare calculation করে</li>
        <li>✔ PNR তৈরি করতে সাহায্য করে</li>
        <li>✔ Ticket issue, reissue ও refund সম্ভব করে</li>
    </ul>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> এই কোর্সে আপনি কী শিখবেন?</h3>

    <ul class="visa-list">
        <li>✔ Complete Air Ticketing workflow</li>
        <li>✔ Galileo, Sabre ও Amadeus ব্যবহার</li>
        <li>✔ Error-free ticket issue</li>
        <li>✔ Reissue, Refund ও Advanced Ticketing</li>
        <li>✔ Job & Agency ready skills</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Air Ticketing শেখা, GDS Training অথবা  
                Professional Support-এর জন্য  
                <b>Trip Designer</b> নির্ভরযোগ্য পার্টনার।
            </p>
        </div>

        <div class="td-card-footer">

            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">WhatsApp</div>
                    <a href="https://wa.me/8801316444399" target="_blank">+8801316444399</a>
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
        <a href="{{ url('/ebooks/air-ticket/') }}" class="btn btn-secondary">⬅ সূচিপত্র</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/2') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection