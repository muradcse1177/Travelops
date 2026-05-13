@extends('ebooks.tour-package.layout.app')

@section('title','Seasonal Package Design')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Seasonal Package Design</h2>

    <p>
        সব ডেস্টিনেশন সারা বছর একইভাবে কাজ করে না।
        একজন সফল <b>Trip Designer</b> জানেন—
        কোন সময়ে কোন প্যাকেজ বিক্রি করতে হবে।
        এই অধ্যায়ে আপনি শিখবেন
        কীভাবে <b>Season অনুযায়ী Tour Package</b> ডিজাইন করবেন।
    </p>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. Seasonal Package বলতে কী বোঝায়?</h3>

    <p>
        Seasonal Package হলো এমন ট্যুর প্যাকেজ,
        যা নির্দিষ্ট সময় বা মৌসুমকে কেন্দ্র করে ডিজাইন করা হয়।
    </p>

    <div class="highlight-box">
        Right Package + Right Season = Easy Sale
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. ট্রাভেল ইন্ডাস্ট্রির প্রধান Seasons</h3>

    <ul class="visa-list">
        <li>✔ Peak Season (High Demand)</li>
        <li>✔ Shoulder Season (Balanced)</li>
        <li>✔ Off Season (Low Demand)</li>
    </ul>

    <div class="info-box">
        Season বুঝতে পারলেই
        Pricing ও Marketing সহজ হয়।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Peak Season Package Design</h3>

    <p>
        Peak Season-এ Demand বেশি,
        তাই প্যাকেজ ডিজাইনেও আলাদা কৌশল লাগে।
    </p>

    <ul class="visa-list">
        <li>✔ Limited seat package</li>
        <li>✔ Early booking offer</li>
        <li>✔ Fixed itinerary</li>
        <li>✔ Higher margin possible</li>
    </ul>

    <div class="highlight-box">
        Peak Season-এ
        Over-promise করা সবচেয়ে বড় ভুল।
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. Off Season Package Design</h3>

    <p>
        Off Season-এ বিক্রি কম,
        কিন্তু smart design করলে profit সম্ভব।
    </p>

    <ul class="visa-list">
        <li>✔ Budget-friendly pricing</li>
        <li>✔ Flexible dates</li>
        <li>✔ Value-added services</li>
        <li>✔ Honeymoon / Couple focus</li>
    </ul>

    <div class="info-box">
        Off Season মানেই Loss নয় —
        Strategy থাকলে Profit হয়।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. বাংলাদেশি ট্রাভেলার ও Season</h3>

    <ul class="visa-list">
        <li>✔ Winter → International tour peak</li>
        <li>✔ Summer → Family & School vacation</li>
        <li>✔ Eid holiday → Short international trip</li>
        <li>✔ Puja / Festival → Regional travel</li>
    </ul>

    <div class="highlight-box">
        Holiday calendar জানাটা
        Trip Designer-এর বড় শক্তি।
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Seasonal Pricing Strategy</h3>

    <ul class="visa-list">
        <li>✔ Peak → Higher price + limited offer</li>
        <li>✔ Off → Discount + extra service</li>
        <li>✔ Group → Special group rate</li>
    </ul>

    <div class="info-box">
        Price কমানো নয় —
        Value বাড়ানোই smart strategy।
    </div>

    <!-- SECTION 7 -->
    <h3 class="section-heading">৭. Seasonal Package Promotion Tips</h3>

    <ul class="visa-list">
        <li>✔ সময়ের আগে marketing শুরু করুন</li>
        <li>✔ Season-based creatives ব্যবহার করুন</li>
        <li>✔ Urgency create করুন</li>
        <li>✔ Limited offer clearly বলুন</li>
    </ul>

    <div class="highlight-box">
        Season শেষ হওয়ার পর
        Package promote করে লাভ নেই।
    </div>

    <!-- TD SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Seasonal Tour Package Planning,
                Smart Pricing Strategy এবং
                High-Demand Package Design-এর জন্য  
                <b>Trip Designer</b> নির্ভরযোগ্য সহযোগী।
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
        <a href="{{ url('/ebooks/tour-package/chapter/8') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/chapter/10') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection