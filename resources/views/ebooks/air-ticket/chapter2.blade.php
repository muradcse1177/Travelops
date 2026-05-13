@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 2 - Airline Industry Structure')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Airline Industry Structure</h2>

    <p>
        এয়ার টিকেটিং সঠিকভাবে বুঝতে হলে  
        <b>Airline Industry Structure</b> জানা অত্যন্ত গুরুত্বপূর্ণ।  
        এই ইন্ডাস্ট্রি কীভাবে কাজ করে, কারা কারা জড়িত—  
        সবকিছু পরিষ্কারভাবে জানা থাকলে টিকেটিং কাজ সহজ হয়।
    </p>

    <div class="highlight-box">
        Airline Industry না বুঝে টিকেটিং শিখলে ভুল হওয়ার সম্ভাবনা বেশি।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> Airline Industry কী?</h3>

    <p>
        Airline Industry হলো এমন একটি বৈশ্বিক ব্যবস্থা যেখানে  
        এয়ারলাইন কোম্পানি, ট্রাভেল এজেন্সি, GDS,  
        নিয়ন্ত্রক সংস্থা এবং যাত্রীরা একসাথে যুক্ত থাকে।
    </p>

    <div class="info-box">
        Airline Industry = Airline + GDS + Agency + Regulator + Passenger
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> Airline Industry-এর প্রধান অংশ</h3>

    <ul class="visa-list">
        <li>✔ Airline (এয়ারলাইন কোম্পানি)</li>
        <li>✔ GDS (Global Distribution System)</li>
        <li>✔ Travel Agency</li>
        <li>✔ Regulatory Authority</li>
        <li>✔ Passenger (যাত্রী)</li>
    </ul>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> Airline (এয়ারলাইন) কী করে?</h3>

    <ul class="visa-list">
        <li>✔ ফ্লাইট অপারেট করে</li>
        <li>✔ ভাড়া (Fare) নির্ধারণ করে</li>
        <li>✔ সিট ইনভেন্টরি ম্যানেজ করে</li>
        <li>✔ টিকেট রুলস ও পলিসি সেট করে</li>
    </ul>

    <div class="highlight-box">
        Airline সবসময় final authority — fare, rule ও approval তাদের হাতেই।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> GDS-এর ভূমিকা</h3>

    <p>
        GDS (Galileo, Sabre, Amadeus)  
        এয়ারলাইন ও ট্রাভেল এজেন্সির মধ্যে সেতুবন্ধন তৈরি করে।
    </p>

    <ul class="visa-list">
        <li>✔ Flight availability দেখায়</li>
        <li>✔ Fare calculation করে</li>
        <li>✔ PNR তৈরি করতে সাহায্য করে</li>
        <li>✔ Ticket issue, reissue ও refund সম্ভব করে</li>
    </ul>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> Travel Agency-এর ভূমিকা</h3>

    <ul class="visa-list">
        <li>✔ যাত্রীর জন্য টিকেট বুকিং করে</li>
        <li>✔ Airline rules অনুসরণ করে কাজ করে</li>
        <li>✔ Service charge ও markup নেয়</li>
        <li>✔ After-sales support দেয়</li>
    </ul>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> Regulatory Authority কারা?</h3>

    <ul class="visa-list">
        <li>✔ IATA (International Air Transport Association)</li>
        <li>✔ Civil Aviation Authority (CAA)</li>
        <li>✔ Airport Authority</li>
        <li>✔ Immigration & Security Authority</li>
    </ul>

    <div class="info-box">
        IATA rules না জানলে BSP ও airline settlement সমস্যা হয়।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading"><span class="sec-num">7.</span> একজন Ticketing Agent-এর জন্য কেন জরুরি?</h3>

    <ul class="visa-list">
        <li>✔ সঠিক নিয়মে টিকেট ইস্যু করা যায়</li>
        <li>✔ Airline policy violation এড়ানো যায়</li>
        <li>✔ ADM / penalty risk কমে</li>
        <li>✔ Professional credibility বাড়ে</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Airline Industry, GDS ও Professional Ticketing  
                বিষয়ে পূর্ণাঙ্গ গাইড পেতে  
                <b>Trip Designer</b> আপনার বিশ্বস্ত পার্টনার।
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
        <a href="{{ url('/ebooks/air-ticket/chapter/1') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/3') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection