@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 4 - Travel Agency Workflow')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Travel Agency Workflow</h2>

    <p>
        একজন সফল Ticketing Agent বা Travel Consultant হতে হলে  
        <b>Travel Agency Workflow</b> পরিষ্কারভাবে জানা অত্যন্ত জরুরি।  
        এই workflow অনুযায়ী কাজ করলেই টিকেটিং হয় সঠিক, দ্রুত ও নিরাপদ।
    </p>

    <div class="highlight-box">
        Workflow না জানলে ticket issue ঠিক হলেও agency risk-এ পড়ে।
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> Travel Agency Workflow কী?</h3>

    <p>
        Travel Agency Workflow হলো এমন একটি ধাপে ধাপে প্রক্রিয়া  
        যার মাধ্যমে একজন যাত্রীর enquiry থেকে শুরু করে  
        ticket issue, payment settlement এবং after-sales support পর্যন্ত  
        সব কাজ সম্পন্ন করা হয়।
    </p>

    <div class="info-box">
        Workflow = Enquiry → Booking → Ticketing → Payment → Support
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> Client Enquiry & Requirement Analysis</h3>

    <ul class="visa-list">
        <li>✔ যাত্রীর ভ্রমণের উদ্দেশ্য জানা</li>
        <li>✔ Travel date ও route confirm করা</li>
        <li>✔ One way / return / multi-city নির্ধারণ</li>
        <li>✔ Budget ও airline preference বোঝা</li>
    </ul>

    <div class="highlight-box">
        ভুল requirement = ভুল ticket
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> Flight Search & Fare Quotation</h3>

    <ul class="visa-list">
        <li>✔ GDS ব্যবহার করে flight availability দেখা</li>
        <li>✔ Fare rules ও baggage check করা</li>
        <li>✔ Cheapest vs suitable option তুলনা করা</li>
        <li>✔ Client-কে clear quotation দেওয়া</li>
    </ul>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> Booking & PNR Creation</h3>

    <ul class="visa-list">
        <li>✔ Passenger name passport অনুযায়ী নেওয়া</li>
        <li>✔ Correct itinerary build করা</li>
        <li>✔ Contact details add করা</li>
        <li>✔ Ticket Time Limit (TTL) set করা</li>
    </ul>

    <div class="info-box">
        PNR হলো পুরো booking-এর backbone।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> Payment Collection & Confirmation</h3>

    <ul class="visa-list">
        <li>✔ Client থেকে payment collect করা</li>
        <li>✔ Cash / Bank / Online payment verify করা</li>
        <li>✔ Payment confirmation নেওয়া</li>
        <li>✔ Receipt / invoice প্রস্তুত করা</li>
    </ul>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> Ticket Issue & Delivery</h3>

    <ul class="visa-list">
        <li>✔ Correct fare verify করা</li>
        <li>✔ Ticket issue করা (E-ticket)</li>
        <li>✔ Ticket copy client-কে পাঠানো</li>
        <li>✔ Baggage, rule & check-in info জানানো</li>
    </ul>

    <div class="highlight-box">
        Ticket issue করার পর double-check বাধ্যতামূলক।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading"><span class="sec-num">7.</span> After-Sales Support</h3>

    <ul class="visa-list">
        <li>✔ Reissue / date change support</li>
        <li>✔ Refund handling</li>
        <li>✔ Schedule change notify করা</li>
        <li>✔ Travel-time assistance</li>
    </ul>

    <!-- SECTION 8 -->
    <h3 class="section-heading"><span class="sec-num">8.</span> Professional Workflow কেন জরুরি?</h3>

    <ul class="visa-list">
        <li>✔ Client satisfaction বাড়ে</li>
        <li>✔ Agency risk ও penalty কমে</li>
        <li>✔ Repeat client তৈরি হয়</li>
        <li>✔ Business credibility বৃদ্ধি পায়</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Professional Travel Agency Workflow,  
                Ticketing SOP ও Real-life practice শিখতে  
                <b>Trip Designer</b> আপনার নির্ভরযোগ্য গাইড।
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
        <a href="{{ url('/ebooks/air-ticket/chapter/3') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/5') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection