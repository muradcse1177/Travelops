@extends('ebooks.tour-package.layout.app')

@section('title','হোটেল, ট্রান্সপোর্ট ও খাবার নির্বাচন')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">হোটেল, ট্রান্সপোর্ট ও খাবার নির্বাচন</h2>

    <p>
        একটি ট্যুর প্যাকেজে সবচেয়ে বেশি অভিযোগ আসে
        <b>হোটেল, ট্রান্সপোর্ট ও খাবার</b> নিয়ে।
        তাই Trip Designer হিসেবে এই তিনটি বিষয়
        বেছে নেওয়ার সময় সবচেয়ে বেশি সতর্ক হতে হয়।
    </p>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. হোটেল নির্বাচন করার সঠিক পদ্ধতি</h3>

    <p>
        হোটেল শুধু ঘুমানোর জায়গা নয় —
        এটি পুরো ট্রিপের অভিজ্ঞতাকে প্রভাবিত করে।
    </p>

    <ul class="visa-list">
        <li>✔ Location (City Center vs Outskirts)</li>
        <li>✔ Hotel Category (3★ / 4★ / 5★)</li>
        <li>✔ Guest Review & Rating</li>
        <li>✔ Family / Couple Friendly কিনা</li>
    </ul>

    <div class="highlight-box">
        Always remember:
        ভালো Location > বড় Hotel।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. Room Type ও Night Breakdown</h3>

    <ul class="visa-list">
        <li>✔ Single / Double / Triple Room</li>
        <li>✔ Extra Bed Policy</li>
        <li>✔ Number of Nights per City</li>
        <li>✔ Early Check-in / Late Check-out</li>
    </ul>

    <div class="info-box">
        Room confusion হলে
        সবচেয়ে বেশি dispute তৈরি হয়।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. ট্রান্সপোর্ট নির্বাচন (Transport Planning)</h3>

    <p>
        ট্রান্সপোর্ট ঠিক না হলে
        পুরো itinerary ভেঙে পড়ে।
    </p>

    <ul class="visa-list">
        <li>✔ Airport Pickup & Drop</li>
        <li>✔ Private vs SIC Transport</li>
        <li>✔ Vehicle Type (Sedan / Van / Bus)</li>
        <li>✔ Driver + Fuel Included কিনা</li>
    </ul>

    <div class="highlight-box">
        Family ও VIP Client-এর জন্য
        Always Private Transport Prefer করুন।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. খাবার নির্বাচন (Meal Planning)</h3>

    <p>
        বাংলাদেশি ট্রাভেলারদের কাছে
        খাবার একটি emotional বিষয়।
    </p>

    <ul class="visa-list">
        <li>✔ Breakfast / Half Board / Full Board</li>
        <li>✔ Halal Food Availability</li>
        <li>✔ Hotel Restaurant vs Outside Restaurant</li>
        <li>✔ Bengali / Indian Food Option</li>
    </ul>

    <div class="info-box">
        Halal food mention না করলে
        কাস্টমার hesitant হয়ে যায়।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. Budget vs Comfort Balance</h3>

    <p>
        সব কাস্টমার Luxury চায় না,
        কিন্তু সবাই Comfort চায়।
    </p>

    <ul class="visa-list">
        <li>✔ Budget Client → 3★ + SIC</li>
        <li>✔ Mid-range Client → 4★ + Private</li>
        <li>✔ Premium Client → 5★ + Luxury Vehicle</li>
    </ul>

    <div class="highlight-box">
        Budget অনুযায়ী Smart Combination-ই
        একজন Trip Designer-এর দক্ষতা।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Common Mistakes যেগুলো এড়াতে হবে</h3>

    <ul class="visa-list">
        <li>❌ Unknown Hotel booking</li>
        <li>❌ Transport detail hide করা</li>
        <li>❌ Meal plan unclear রাখা</li>
        <li>❌ Over-promise করা</li>
    </ul>

    <div class="info-box">
        Over-promise করলে
        Post-trip complaint নিশ্চিত।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading">৭. Pro Tips (Trip Designer Secret)</h3>

    <ul class="visa-list">
        <li>✔ Always Hotel Photo share করুন</li>
        <li>✔ Transport type লিখে দিন</li>
        <li>✔ Meal short form avoid করুন</li>
        <li>✔ Everything in writing দিন</li>
    </ul>

    <div class="highlight-box">
        Clear communication = Happy client
    </div>

    <!-- TD SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Hotel Selection, Transport Planning,
                Meal Arrangement এবং
                Balanced Tour Package Design-এর জন্য  
                <b>Trip Designer</b> সম্পূর্ণ সহায়তা প্রদান করে।
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
        <a href="{{ url('/ebooks/tour-package/chapter/7') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/9') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection