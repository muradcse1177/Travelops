@extends('ebooks.tour-package.layout.app')

@section('title','Ready Tour Package Template | Trip Designer Pro Tool')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        Ready Tour Package Template  
        <span class="text-secondary">(Practical & Editable Format)</span>
    </h2>

    <p>
        অনেক ট্রাভেল এজেন্সির সবচেয়ে বড় সমস্যা হলো—
        <b>package বানানোর কোনো fixed format নেই</b>।
        ফলে কাস্টমার বিভ্রান্ত হয়, quotation clear হয় না
        এবং closing এ সমস্যা হয়।
        এই অধ্যায়ে আমি আপনাকে দিচ্ছি
        <b>Trip Designer tested</b>
        একটি ready tour package template,
        যেটা আপনি copy–paste করে
        যেকোনো destination-এর জন্য ব্যবহার করতে পারবেন।
    </p>

    <div class="highlight-box">
        Proper Template = Clear Offer + Faster Booking
    </div>

    <!-- ================= TEMPLATE START ================= -->

    <h3 class="section-heading">১. Tour Package Basic Info</h3>
    <div class="highlight-box">
        <p><b>Tour Name:</b> Thailand Premium Holiday</p>
        <p><b>Destination:</b> Bangkok – Pattaya – Phuket</p>
        <p><b>Duration:</b> 6 Nights / 7 Days</p>
        <p><b>Travel Type:</b> Family / Couple / Group</p>
        <p><b>Starting Price:</b> BDT XX,XXX per person</p>
    </div>

    <!-- ================= ITINERARY ================= -->

    <h3 class="section-heading">২. Day Wise Itinerary</h3>

    <div class="info-box">
        <b>Day 01:</b> Arrival → Airport Pickup → Hotel Check-in → Free Time  
        <br>
        <b>Day 02:</b> City Tour → Sightseeing → Local Market  
        <br>
        <b>Day 03:</b> Island Tour / Adventure Activity  
        <br>
        <b>Day 04:</b> Transfer to Next City  
        <br>
        <b>Day 05:</b> Free Day / Optional Tour  
        <br>
        <b>Day 06:</b> Shopping → Preparation for Return  
        <br>
        <b>Day 07:</b> Airport Drop → Departure
    </div>

    <!-- ================= INCLUSIONS ================= -->

    <h3 class="section-heading">৩. Package Inclusions</h3>
    <ul class="visa-list">
        <li>✔ Hotel accommodation (as per category)</li>
        <li>✔ Daily breakfast</li>
        <li>✔ Airport pickup & drop</li>
        <li>✔ All transfers & sightseeing</li>
        <li>✔ Local guide assistance</li>
    </ul>

    <!-- ================= EXCLUSIONS ================= -->

    <h3 class="section-heading">৪. Package Exclusions</h3>
    <ul class="visa-list">
        <li>❌ International airfare</li>
        <li>❌ Visa fees</li>
        <li>❌ Personal expenses</li>
        <li>❌ Optional tours</li>
    </ul>

    <!-- ================= HOTEL ================= -->

    <h3 class="section-heading">৫. Hotel Details</h3>
    <ul class="visa-list">
        <li>✔ Bangkok: 3★ / 4★ Hotel</li>
        <li>✔ Pattaya: Beachside Hotel</li>
        <li>✔ Phuket: Resort / Pool Villa (optional)</li>
    </ul>

    <!-- ================= PAYMENT ================= -->

    <h3 class="section-heading">৬. Payment Policy</h3>
    <ul class="visa-list">
        <li>✔ 50% advance to confirm booking</li>
        <li>✔ Balance before travel</li>
        <li>✔ Payment via bank / mobile banking</li>
    </ul>

    <!-- ================= CANCELLATION ================= -->

    <h3 class="section-heading">৭. Cancellation Policy</h3>
    <ul class="visa-list">
        <li>✔ Before 30 days: Minimal charge</li>
        <li>✔ 15–29 days: Partial charge</li>
        <li>✔ Less than 14 days: Non-refundable</li>
    </ul>

    <!-- ================= NOTES ================= -->

    <h3 class="section-heading">৮. Important Notes</h3>
    <div class="info-box">
        ✔ Price may change based on season & availability  
        <br>
        ✔ Final itinerary will be shared after confirmation  
        <br>
        ✔ Passport validity minimum 6 months required
    </div>

    <!-- ================= WHY THIS TEMPLATE ================= -->

    <h3 class="section-heading">৯. এই Template কেন ব্যবহার করবেন?</h3>
    <ul class="visa-list">
        <li>✔ Client confusion কমে</li>
        <li>✔ Professional impression তৈরি হয়</li>
        <li>✔ Faster decision & booking</li>
        <li>✔ Sales closing সহজ হয়</li>
    </ul>

    <div class="highlight-box">
        Good template মানেই  
        half sale done।
    </div>

    <!-- ================= TRIP DESIGNER ================= -->

    <h3 class="section-heading">১০. Trip Designer Pro Tip</h3>
    <div class="info-box">
        এই template আপনি  
        Facebook, WhatsApp, PDF, Website—  
        সব জায়গায় ব্যবহার করতে পারবেন।
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/tour-package/chapter/47') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/49') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection