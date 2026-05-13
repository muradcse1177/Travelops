@extends('ebooks.tour-package.layout.app')

@section('title','Supplier, DMC ও Partner Management | Tour Business Guide')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        Supplier, DMC ও Partner Management  
        <span class="text-secondary">(Tour Business Backbone)</span>
    </h2>

    <p>
        ট্যুর ব্যবসার সবচেয়ে গুরুত্বপূর্ণ কিন্তু সবচেয়ে কম আলোচিত অংশ হলো
        <b>Supplier ও Partner Management</b>।
        ভালো মার্কেটিং থাকলেও যদি supplier দুর্বল হয়,
        তাহলে পুরো ট্যুর অভিজ্ঞতা নষ্ট হয়ে যায়।
        এই অধ্যায়ে আপনি শিখবেন—
        কীভাবে reliable supplier খুঁজবেন,
        DMC-এর সাথে কাজ করবেন,
        এবং long-term profitable partnership তৈরি করবেন
        <b>Trip Designer</b> স্টাইলে।
    </p>

    <div class="highlight-box">
        Strong Supplier Network = Smooth Tour Execution
    </div>

    <!-- ================= SECTION 1 ================= -->

    <h3 class="section-heading">১. Supplier কারা?</h3>
    <ul class="visa-list">
        <li>✔ Hotel & Resort</li>
        <li>✔ Transport (Bus, Car, Boat, Cruise)</li>
        <li>✔ Tour Guide</li>
        <li>✔ Ticketing & Visa support</li>
    </ul>

    <div class="info-box">
        Supplier মানেই শুধু দাম নয়,  
        reliability সবচেয়ে গুরুত্বপূর্ণ।
    </div>

    <!-- ================= SECTION 2 ================= -->

    <h3 class="section-heading">২. ভালো Supplier বাছাইয়ের কৌশল</h3>
    <ul class="visa-list">
        <li>✔ Verified business profile</li>
        <li>✔ Past performance & reviews</li>
        <li>✔ Clear pricing & policy</li>
        <li>✔ Emergency response capability</li>
    </ul>

    <div class="highlight-box">
        Cheapest supplier সবসময় best নয়।
    </div>

    <!-- ================= SECTION 3 ================= -->

    <h3 class="section-heading">৩. DMC (Destination Management Company) কী?</h3>
    <p>
        DMC হলো সেই প্রতিষ্ঠান যারা
        নির্দিষ্ট দেশ বা ডেস্টিনেশনে
        ground operation পরিচালনা করে—
        যেমন hotel, transport, guide, permits সবকিছু।
    </p>

    <ul class="visa-list">
        <li>✔ International tour handling</li>
        <li>✔ Local expertise</li>
        <li>✔ Crisis management</li>
    </ul>

    <div class="info-box">
        International tour-এর জন্য  
        DMC ছাড়া কাজ করা ঝুঁকিপূর্ণ।
    </div>

    <!-- ================= SECTION 4 ================= -->

    <h3 class="section-heading">৪. DMC-এর সাথে কাজ করার নিয়ম</h3>
    <ul class="visa-list">
        <li>✔ Clear itinerary sharing</li>
        <li>✔ Written quotation</li>
        <li>✔ Payment schedule</li>
        <li>✔ Cancellation & refund policy</li>
    </ul>

    <div class="highlight-box">
        Written agreement থাকলে  
        dispute এড়ানো যায়।
    </div>

    <!-- ================= SECTION 5 ================= -->

    <h3 class="section-heading">৫. Local Partner Management (Domestic)</h3>
    <ul class="visa-list">
        <li>✔ Local guide coordination</li>
        <li>✔ Transport & hotel sync</li>
        <li>✔ On-spot problem solving</li>
    </ul>

    <div class="info-box">
        Domestic tour-এ  
        local partner সবচেয়ে গুরুত্বপূর্ণ।
    </div>

    <!-- ================= SECTION 6 ================= -->

    <h3 class="section-heading">৬. Supplier Pricing & Negotiation</h3>
    <ul class="visa-list">
        <li>✔ Volume-based discount</li>
        <li>✔ Off-season rate negotiation</li>
        <li>✔ Long-term deal</li>
    </ul>

    <div class="highlight-box">
        Relationship ভালো হলে  
        price control সহজ হয়।
    </div>

    <!-- ================= SECTION 7 ================= -->

    <h3 class="section-heading">৭. Payment & Risk Management</h3>
    <ul class="visa-list">
        <li>✔ Advance vs balance payment</li>
        <li>✔ Supplier backup option</li>
        <li>✔ Written confirmation</li>
    </ul>

    <div class="info-box">
        Supplier risk মানেই  
        client dissatisfaction।
    </div>

    <!-- ================= SECTION 8 ================= -->

    <h3 class="section-heading">৮. Common Mistakes (Avoid These)</h3>
    <ul class="visa-list">
        <li>❌ Single supplier dependency</li>
        <li>❌ No written agreement</li>
        <li>❌ Last-minute confirmation</li>
        <li>❌ Ignoring feedback</li>
    </ul>

    <div class="highlight-box">
        Backup plan থাকলে  
        tour stress-free হয়।
    </div>

    <!-- ================= TRIP DESIGNER ================= -->

    <h3 class="section-heading">৯. Trip Designer Supplier & DMC Model</h3>
    <ul class="visa-list">
        <li>✔ Multi-supplier network</li>
        <li>✔ Verified DMC partnerships</li>
        <li>✔ Transparent communication</li>
        <li>✔ Client-first execution</li>
    </ul>

    <div class="highlight-box">
        Strong backend থাকলেই  
        brand grow করে।
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/tour-package/chapter/46') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/48') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection