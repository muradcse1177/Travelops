@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','Client Checklist | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        Client Checklist  
        (Hajj & Umrah Pilgrim Checklist)
    </h2>

    <p>
        হজ্জ ও উমরাহ যাত্রায়  
        হাজীদের বেশিরভাগ সমস্যার কারণ  
        প্রস্তুতির ঘাটতি।
        একটি পরিষ্কার <strong>Client Checklist</strong>  
        দিলে হাজীরা আত্মবিশ্বাসী থাকে  
        এবং Trip Designer–এর উপর চাপ কমে।
    </p>

    <div class="highlight-box">
        Checklist reduces confusion
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. যাত্রার আগে (Before Departure)</h3>

    <ul class="visa-list custom-checklist">
        <li>☑ Passport (valid minimum 6 months)</li>
        <li>☑ Visa copy (printed & soft)</li>
        <li>☑ Air ticket copy</li>
        <li>☑ 2–3 copy passport photo</li>
        <li>☑ Mahram document (if applicable)</li>
        <li>☑ Necessary vaccination</li>
        <li>☑ Personal medicines</li>
    </ul>

    <div class="info-box">
        Missing documents cause airport stress
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. লাগেজ প্রস্তুতি (Luggage Checklist)</h3>

    <ul class="visa-list custom-checklist">
        <li>☑ Ihram (male) / Modest dress (female)</li>
        <li>☑ Comfortable footwear</li>
        <li>☑ Prayer mat & tasbih</li>
        <li>☑ Umbrella / cap</li>
        <li>☑ Small backpack</li>
        <li>☑ Mobile charger & power bank</li>
    </ul>

    <div class="highlight-box">
        Light luggage = easy movement
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Hand Carry Checklist</h3>

    <ul class="visa-list custom-checklist">
        <li>☑ Passport & visa</li>
        <li>☑ Money & card</li>
        <li>☑ Important phone numbers</li>
        <li>☑ Emergency contact card</li>
        <li>☑ Basic medicine</li>
    </ul>

    <div class="info-box">
        Never put essentials in check-in baggage
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. সৌদিতে অবস্থানকালীন করণীয়</h3>

    <ul class="visa-list custom-checklist">
        <li>☑ Group leader follow করা</li>
        <li>☑ Time discipline বজায় রাখা</li>
        <li>☑ Haram etiquette মানা</li>
        <li>☑ Crowd এ সতর্ক থাকা</li>
        <li>☑ Emergency হলে দ্রুত জানানো</li>
    </ul>

    <div class="highlight-box">
        Discipline ensures safety
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. যা করবেন না (Do Not List)</h3>

    <ul class="visa-list custom-checklist">
        <li>❌ Group ছাড়া একা ঘোরাঘুরি</li>
        <li>❌ অপ্রয়োজনীয় বিতর্ক</li>
        <li>❌ নিয়ম ভঙ্গ করা</li>
        <li>❌ অচেনা কারও সাহায্য নেওয়া</li>
    </ul>

    <div class="info-box">
        Following rules protects you
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Trip Designer Pro Checklist Rules</h3>

    <ul class="visa-list">
        <li>✔ Printed + WhatsApp version দিন</li>
        <li>✔ Orientation–এ explain করুন</li>
        <li>✔ Simple Bangla ব্যবহার</li>
        <li>✔ Elderly-friendly format</li>
    </ul>

    <div class="highlight-box">
        Checklist = silent guide
    </div>

    <!-- CTA -->
    <div class="td-card">

        <div class="td-card-body">
            <p class="td-text">
                আপনি কি চান  
                <strong>প্রস্তুত, আত্মবিশ্বাসী ও শান্ত হাজী</strong>?
                <br><br>
                <strong>Trip Designer</strong> নিশ্চিত করে—
                ✔ Complete Client Checklist System  
                ✔ Reduced On-Tour Confusion  
                ✔ Smooth & Disciplined Pilgrims
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
                    <div class="cta-label">Client Support</div>
                    <a href="https://wa.me/8801316444646" target="_blank">
                        +8801316444646 (Contact Now)
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/37') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/39') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection