@extends('ebooks.tour-package.layout.app')

@section('title','Client Checklist | Tour Booking Confirmation Guide')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        Client Checklist  
        <span class="text-secondary">(Before & After Booking)</span>
    </h2>

    <p>
        অনেক সময় ট্যুর ভালোভাবে ডিজাইন করা হলেও
        <b>Client প্রস্তুত না থাকার কারণে</b>
        ভিসা রিজেকশন, ভ্রমণ সমস্যা বা
        শেষ মুহূর্তের ঝামেলা তৈরি হয়।
        এই অধ্যায়ের checklist ব্যবহার করলে
        client নিজেও পরিষ্কার থাকে
        এবং tour execution অনেক smooth হয়।
    </p>

    <div class="highlight-box">
        Prepared Client = Smooth Tour + Fewer Problems
    </div>

    <!-- ================= BEFORE BOOKING ================= -->

    <h3 class="section-heading">১. Booking-এর আগে Client Checklist</h3>
    <ul class="custom-checklist">
        <li>✔ Passport validity minimum 6 months</li>
        <li>✔ Correct spelling (passport অনুযায়ী নাম)</li>
        <li>✔ Travel dates confirm</li>
        <li>✔ Destination & package clear</li>
        <li>✔ Budget understanding</li>
        <li>✔ Visa requirement explained</li>
        <li>✔ Tour inclusions & exclusions understood</li>
    </ul>

    <div class="info-box">
        Booking-এর আগে client-কে  
        সবকিছু লিখিতভাবে explain করা জরুরি।
    </div>

    <!-- ================= DOCUMENTS ================= -->

    <h3 class="section-heading">২. Required Documents Checklist</h3>
    <ul class="custom-checklist">
        <li>✔ Passport copy</li>
        <li>✔ NID / Birth Certificate</li>
        <li>✔ Photo (white background)</li>
        <li>✔ Bank statement / financial proof</li>
        <li>✔ Job letter / business documents</li>
        <li>✔ Marriage certificate (if applicable)</li>
    </ul>

    <div class="highlight-box">
        Incomplete documents = Delay বা Rejection risk
    </div>

    <!-- ================= PAYMENT ================= -->

    <h3 class="section-heading">৩. Payment & Confirmation Checklist</h3>
    <ul class="custom-checklist">
        <li>✔ Advance payment received</li>
        <li>✔ Payment receipt shared</li>
        <li>✔ Written confirmation given</li>
        <li>✔ Cancellation policy explained</li>
        <li>✔ Refund policy acknowledged</li>
    </ul>

    <div class="info-box">
        Payment confirmation ছাড়া  
        কোনো booking final করবেন না।
    </div>

    <!-- ================= PRE-DEPARTURE ================= -->

    <h3 class="section-heading">৪. Pre-Departure Checklist</h3>
    <ul class="custom-checklist">
        <li>✔ Flight ticket issued</li>
        <li>✔ Hotel voucher shared</li>
        <li>✔ Airport pickup details</li>
        <li>✔ Emergency contact number</li>
        <li>✔ Travel insurance (if required)</li>
        <li>✔ Weather & packing guideline</li>
    </ul>

    <div class="highlight-box">
        Pre-departure briefing দিলে  
        client confident থাকে।
    </div>

    <!-- ================= DURING TOUR ================= -->

    <h3 class="section-heading">৫. During Tour Client Checklist</h3>
    <ul class="custom-checklist">
        <li>✔ Daily itinerary reminder</li>
        <li>✔ Local guide / driver contact</li>
        <li>✔ Time management instruction</li>
        <li>✔ Safety & local rules awareness</li>
    </ul>

    <!-- ================= POST TOUR ================= -->

    <h3 class="section-heading">৬. Post Tour Checklist</h3>
    <ul class="custom-checklist">
        <li>✔ Safe return confirmation</li>
        <li>✔ Feedback collection</li>
        <li>✔ Review / testimonial request</li>
        <li>✔ Future offer follow-up</li>
    </ul>

    <div class="info-box">
        Post-tour follow-up মানেই  
        repeat customer সম্ভাবনা।
    </div>

    <!-- ================= COMMON MISTAKES ================= -->

    <h3 class="section-heading">৭. Common Client Mistakes (Explain Clearly)</h3>
    <ul class="visa-list">
        <li>❌ Last minute document submission</li>
        <li>❌ Payment delay</li>
        <li>❌ Verbal assumption</li>
        <li>❌ Policy না পড়া</li>
    </ul>

    <div class="highlight-box">
        Checklist follow করলে  
        ৯০% সমস্যা আগেই এড়ানো যায়।
    </div>

    <!-- ================= TRIP DESIGNER ================= -->

    <h3 class="section-heading">৮. Trip Designer Client Handling System</h3>
    <ul class="visa-list">
        <li>✔ Written communication</li>
        <li>✔ Transparent policies</li>
        <li>✔ Regular follow-up</li>
        <li>✔ Client education first</li>
    </ul>

    <div class="highlight-box">
        Educated client = Happy client
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/tour-package/chapter/49') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/51') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection