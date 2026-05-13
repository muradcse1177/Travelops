@extends('ebooks.tour-package.layout.app')

@section('title','Couple, Family ও Group Package')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Couple, Family ও Group Package</h2>

    <p>
        সব কাস্টমারের প্রয়োজন এক নয়।
        একজন Honeymoon Couple, একটি Family
        আর একটি Group — সবার expectation আলাদা।
        একজন <b>Trip Designer</b> হিসেবে
        এই পার্থক্য বুঝে প্যাকেজ ডিজাইন করাই
        আপনার সবচেয়ে বড় দক্ষতা।
    </p>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. Couple / Honeymoon Package</h3>

    <p>
        Couple Package মূলত Experience ও Privacy
        ফোকাস করে ডিজাইন করা হয়।
    </p>

    <ul class="visa-list">
        <li>✔ Romantic hotel / resort</li>
        <li>✔ Private transfer</li>
        <li>✔ Candle light dinner / special setup</li>
        <li>✔ Flexible itinerary</li>
    </ul>

    <div class="highlight-box">
        Couple Package-এ Emotion বিক্রি হয়,
        দাম নয়।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. Family Package Design</h3>

    <p>
        Family Package সবচেয়ে বেশি জনপ্রিয়,
        কিন্তু সবচেয়ে বেশি দায়িত্বশীলও।
    </p>

    <ul class="visa-list">
        <li>✔ Family-friendly hotel</li>
        <li>✔ Child & senior citizen consideration</li>
        <li>✔ Halal food & safety</li>
        <li>✔ Balanced itinerary (Rest + Fun)</li>
    </ul>

    <div class="info-box">
        Family tour ভালোভাবে handle করতে পারলে
        Repeat customer প্রায় নিশ্চিত।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Group Package Design</h3>

    <p>
        Group tour মানেই Scale ও Volume।
        কিন্তু Coordination সবচেয়ে বড় চ্যালেঞ্জ।
    </p>

    <ul class="visa-list">
        <li>✔ Fixed itinerary</li>
        <li>✔ Group transport (Bus / Coaster)</li>
        <li>✔ Tour leader / coordinator</li>
        <li>✔ Clear rules & discipline</li>
    </ul>

    <div class="highlight-box">
        Group Package-এ Clear instruction না দিলে
        Chaos নিশ্চিত।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. Pricing Strategy – Couple vs Family vs Group</h3>

    <ul class="visa-list">
        <li>✔ Couple → Premium pricing possible</li>
        <li>✔ Family → Value-based pricing</li>
        <li>✔ Group → Low margin + High volume</li>
    </ul>

    <div class="info-box">
        সব প্যাকেজে একই মার্জিন আশা করা ভুল।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. Common Mistakes যেগুলো এড়াতে হবে</h3>

    <ul class="visa-list">
        <li>❌ Couple package-এ group style itinerary</li>
        <li>❌ Family tour-এ over-packed schedule</li>
        <li>❌ Group tour-এ flexible rule</li>
        <li>❌ One-size-fits-all approach</li>
    </ul>

    <div class="highlight-box">
        Package customize না করলে
        Complaint আসবেই।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Pro Tips (Trip Designer Insight)</h3>

    <ul class="visa-list">
        <li>✔ Couple tour-এ surprise element যোগ করুন</li>
        <li>✔ Family tour-এ safety highlight করুন</li>
        <li>✔ Group tour-এ written rules দিন</li>
        <li>✔ Expectation আগেই set করুন</li>
    </ul>

    <div class="info-box">
        Proper expectation management = Successful tour
    </div>

    <!-- TD SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Couple, Family ও Group Tour Package Design,
                Smart Pricing এবং
                Smooth Tour Operation-এর জন্য  
                <b>Trip Designer</b> বিশ্বস্ত পার্টনার।
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
        <a href="{{ url('/ebooks/tour-package/chapter/9') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/11') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection