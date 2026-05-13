@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 5 - What is GDS & How It Works')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">What is GDS & How It Works</h2>

    <p>
        আধুনিক Air Ticketing পুরোপুরি নির্ভর করে  
        <b>GDS (Global Distribution System)</b>-এর উপর।  
        এই অধ্যায়ে আমরা জানবো GDS কী, কীভাবে কাজ করে  
        এবং কেন Galileo, Sabre ও Amadeus এত গুরুত্বপূর্ণ।
    </p>

    <div class="highlight-box">
        GDS না জানলে professional ticketing অসম্ভব।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> GDS কী?</h3>

    <p>
        <b>GDS (Global Distribution System)</b> হলো একটি  
        কম্পিউটারাইজড নেটওয়ার্ক সিস্টেম  
        যা এয়ারলাইন, ট্রাভেল এজেন্সি ও যাত্রীদের  
        মধ্যে রিয়েল-টাইম তথ্য আদান-প্রদান করে।
    </p>

    <ul class="visa-list">
        <li>✔ Flight availability দেখায়</li>
        <li>✔ Fare ও tax calculate করে</li>
        <li>✔ PNR তৈরি করতে সাহায্য করে</li>
        <li>✔ Ticket issue, reissue ও refund সম্ভব করে</li>
    </ul>

    <div class="info-box">
        GDS = Backbone of Air Ticketing Industry
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> GDS কেন প্রয়োজন?</h3>

    <ul class="visa-list">
        <li>✔ হাজারো airline এক প্ল্যাটফর্মে পাওয়া যায়</li>
        <li>✔ Manual কাজের ঝামেলা কমে</li>
        <li>✔ Fast & accurate booking সম্ভব</li>
        <li>✔ Airline rules automatically apply হয়</li>
    </ul>

    <div class="highlight-box">
        GDS ছাড়া ticketing করলে error ও penalty risk বেশি।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> GDS কীভাবে কাজ করে?</h3>

    <p>
        GDS মূলত তিনটি পক্ষকে সংযুক্ত করে—
    </p>

    <ul class="visa-list">
        <li>✔ Airline → flight & fare data দেয়</li>
        <li>✔ GDS → data process ও distribute করে</li>
        <li>✔ Travel Agency → booking ও ticket issue করে</li>
    </ul>

    <div class="info-box">
        Airline → GDS → Travel Agency → Passenger
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> প্রধান GDS সিস্টেম</h3>

    <ul class="visa-list">
        <li>✔ Galileo (Travelport)</li>
        <li>✔ Sabre</li>
        <li>✔ Amadeus</li>
    </ul>

    <p>
        এই তিনটি GDS-এর workflow প্রায় একই,  
        শুধু command structure কিছুটা আলাদা।
    </p>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> GDS ব্যবহার করে কী কী কাজ করা যায়?</h3>

    <ul class="visa-list">
        <li>✔ One way / return / multi-city booking</li>
        <li>✔ Fare comparison</li>
        <li>✔ Seat, meal ও SSR add</li>
        <li>✔ Ticket issue, reissue ও refund</li>
        <li>✔ Queue & schedule change handling</li>
    </ul>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> একজন Agent-এর জন্য GDS কেন বাধ্যতামূলক?</h3>

    <ul class="visa-list">
        <li>✔ Professional level কাজ করা যায়</li>
        <li>✔ Airline policy violation এড়ানো যায়</li>
        <li>✔ Time & cost save হয়</li>
        <li>✔ Job opportunity বাড়ে</li>
    </ul>

    <div class="highlight-box">
        GDS জানা মানেই global travel industry-তে প্রবেশ।
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Galileo, Sabre ও Amadeus  
                Practical GDS Training ও Support-এর জন্য  
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
        <a href="{{ url('/ebooks/air-ticket/chapter/4') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/6') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection