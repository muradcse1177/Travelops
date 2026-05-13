@extends('ebooks.tour-package.layout.app')

@section('title','Editable Itinerary Format | Trip Designer Pro Tool')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        Editable Itinerary Format  
        <span class="text-secondary">(Client-Friendly & Customizable)</span>
    </h2>

    <p>
        অনেক ট্রাভেল এজেন্সি itinerary পাঠায়
        এমনভাবে, যেটা কাস্টমার ঠিকভাবে বুঝতেই পারে না।
        ফলে বারবার প্রশ্ন আসে, confusion তৈরি হয়
        এবং booking delay হয়।
        এই অধ্যায়ে আপনি পাচ্ছেন
        <b>Trip Designer tested</b>
        একটি editable itinerary format,
        যেটা আপনি সহজেই
        destination, hotel, activity অনুযায়ী
        modify করতে পারবেন।
    </p>

    <div class="highlight-box">
        Clear Itinerary = Client Confidence + Faster Booking
    </div>

    <!-- ================= BASIC INFO ================= -->

    <h3 class="section-heading">১. Itinerary Header Information</h3>
    <div class="highlight-box">
        <p><b>Tour Name:</b> Singapore & Malaysia Highlights</p>
        <p><b>Travel Dates:</b> DD/MM/YYYY – DD/MM/YYYY</p>
        <p><b>Duration:</b> 5 Nights / 6 Days</p>
        <p><b>No. of Persons:</b> 2 Adults</p>
        <p><b>Prepared By:</b> Trip Designer</p>
    </div>

    <!-- ================= DAY WISE ================= -->

    <h3 class="section-heading">২. Day-wise Editable Itinerary</h3>

    <div class="info-box">
        <b>Day 01:</b> Arrival at Destination → Airport Pickup → Hotel Check-in  
        <br>
        <small>Edit Tip:</small> Arrival time, flight no. চাইলে যোগ করতে পারেন
    </div>

    <div class="info-box">
        <b>Day 02:</b> City Tour → Sightseeing → Local attractions  
        <br>
        <small>Edit Tip:</small> Attraction list bullet আকারে লিখুন
    </div>

    <div class="info-box">
        <b>Day 03:</b> Optional Tour / Free Day  
        <br>
        <small>Edit Tip:</small> Optional tour আলাদা করে mention করুন
    </div>

    <div class="info-box">
        <b>Day 04:</b> Transfer to Next City → Hotel Check-in  
        <br>
        <small>Edit Tip:</small> Transport mode উল্লেখ করুন
    </div>

    <div class="info-box">
        <b>Day 05:</b> Shopping / Leisure / Special Activity  
        <br>
        <small>Edit Tip:</small> Client preference অনুযায়ী modify করুন
    </div>

    <div class="info-box">
        <b>Day 06:</b> Hotel Checkout → Airport Drop → Departure
    </div>

    <!-- ================= HOTEL ================= -->

    <h3 class="section-heading">৩. Hotel Information (Editable)</h3>
    <ul class="visa-list">
        <li>✔ City 1: Hotel Name / Category</li>
        <li>✔ City 2: Hotel Name / Category</li>
        <li>✔ Room Type: Standard / Deluxe</li>
        <li>✔ Meal Plan: Breakfast Included</li>
    </ul>

    <!-- ================= TRANSPORT ================= -->

    <h3 class="section-heading">৪. Transport & Transfer Details</h3>
    <ul class="visa-list">
        <li>✔ Airport pickup & drop</li>
        <li>✔ City tour transport</li>
        <li>✔ Intercity transfer (Bus / Car / Flight)</li>
    </ul>

    <!-- ================= INCLUSION ================= -->

    <h3 class="section-heading">৫. Included Services</h3>
    <ul class="visa-list">
        <li>✔ Accommodation</li>
        <li>✔ Transfers & sightseeing</li>
        <li>✔ Guide assistance (if applicable)</li>
    </ul>

    <!-- ================= EXCLUSION ================= -->

    <h3 class="section-heading">৬. Excluded Services</h3>
    <ul class="visa-list">
        <li>❌ Air ticket</li>
        <li>❌ Visa fee</li>
        <li>❌ Personal expenses</li>
    </ul>

    <!-- ================= NOTES ================= -->

    <h3 class="section-heading">৭. Important Notes (Must Edit)</h3>
    <div class="info-box">
        ✔ Itinerary may change due to weather or local conditions  
        <br>
        ✔ Hotel subject to availability  
        <br>
        ✔ Final confirmation after payment
    </div>

    <!-- ================= WHY USE ================= -->

    <h3 class="section-heading">৮. এই Editable Itinerary Format কেন কার্যকর?</h3>
    <ul class="visa-list">
        <li>✔ Client বুঝতে সুবিধা হয়</li>
        <li>✔ Professional presentation</li>
        <li>✔ Customization সহজ</li>
        <li>✔ Fewer follow-up questions</li>
    </ul>

    <div class="highlight-box">
        Clean itinerary মানেই  
        professional tour business।
    </div>

    <!-- ================= TRIP DESIGNER ================= -->

    <h3 class="section-heading">৯. Trip Designer Practical Advice</h3>
    <div class="info-box">
        এই format আপনি  
        Word, PDF, WhatsApp, Email—  
        সব জায়গায় ব্যবহার করতে পারবেন।
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/tour-package/chapter/48') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/50') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection