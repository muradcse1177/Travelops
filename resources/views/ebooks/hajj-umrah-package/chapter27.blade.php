@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','Hidden Cost এড়ানোর উপায় | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        Hidden Cost এড়ানোর উপায়  
        (How to Avoid Hidden Costs)
    </h2>

    <p>
        হজ্জ ও উমরাহ ব্যবসায়ে  
        অনেক Trip Designer ভালো সেলস করেও  
        লাভ করতে পারেন না।
        কারণ—<strong>Hidden Cost</strong>।
        এই খরচগুলো ছোট মনে হলেও  
        মিলিয়ে দেখলে পুরো মার্জিন শেষ করে দেয়।
    </p>

    <div class="highlight-box">
        Hidden cost kills visible profit
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading">১. Hidden Cost কী?</h3>
    <p>
        Hidden Cost হলো এমন খরচ  
        যা প্রাথমিক প্রাইসিংয়ে ধরা হয় না  
        কিন্তু অপারেশনের সময় বাস্তবে দিতে হয়।
    </p>

    <ul class="visa-list">
        <li>✔ শেষ মুহূর্তের অতিরিক্ত চার্জ</li>
        <li>✔ অনাকাঙ্ক্ষিত সার্ভিস ফি</li>
        <li>✔ জরুরি সিদ্ধান্তের খরচ</li>
    </ul>

    <div class="info-box">
        If it’s not planned, it becomes hidden
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading">২. সবচেয়ে সাধারণ Hidden Cost গুলো</h3>
    <p>
        নিচের খরচগুলো প্রায় সব হজ্জ ও উমরাহ গ্রুপেই দেখা যায়।
    </p>

    <ul class="visa-list">
        <li>❌ Flight reschedule / excess baggage</li>
        <li>❌ Extra hotel night / room upgrade</li>
        <li>❌ Transport overtime / extra bus</li>
        <li>❌ Staff overtime & food</li>
        <li>❌ Medical & emergency expense</li>
    </ul>

    <div class="highlight-box">
        Most losses come from small extras
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading">৩. Hidden Cost কোথা থেকে আসে?</h3>
    <p>
        Hidden cost হঠাৎ আসে না।
        সাধারণত এগুলো আসে—
    </p>

    <ul class="visa-list">
        <li>✔ Poor planning</li>
        <li>✔ Over-promising to clients</li>
        <li>✔ Vendor terms clear না থাকা</li>
        <li>✔ Emergency buffer না রাখা</li>
    </ul>

    <div class="info-box">
        Bad planning = guaranteed hidden cost
    </div>

    <!-- SECTION 4 -->
    <h3 class="section-heading">৪. Hidden Cost এড়ানোর প্র্যাকটিক্যাল উপায়</h3>

    <ul class="visa-list">
        <li>✔ Every cost item লিখিত রাখা</li>
        <li>✔ Vendor agreement clear করা</li>
        <li>✔ Emergency buffer (2–5%) রাখা</li>
        <li>✔ Client expectation realistic রাখা</li>
        <li>✔ Staff expense pre-approve করা</li>
    </ul>

    <div class="highlight-box">
        Written plan saves money
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading">৫. Client Communication & Hidden Cost</h3>
    <p>
        অনেক Hidden Cost  
        আসলে ভুল কমিউনিকেশন থেকে তৈরি হয়।
        পরিষ্কার কথা বললে  
        এই খরচগুলো এড়ানো সম্ভব।
    </p>

    <ul class="visa-list">
        <li>✔ Inclusion & exclusion পরিষ্কার</li>
        <li>✔ Extra cost upfront জানানো</li>
        <li>✔ Written consent নেওয়া</li>
    </ul>

    <div class="info-box">
        Clear communication prevents dispute
    </div>

    <!-- SECTION 6 -->
    <h3 class="section-heading">৬. Trip Designer Pro Cost Control Rules</h3>

    <ul class="visa-list">
        <li>✔ No verbal commitment only</li>
        <li>✔ Every extra = approval required</li>
        <li>✔ Daily expense tracking</li>
        <li>✔ Post-tour cost review</li>
    </ul>

    <div class="highlight-box">
        Control cost, control profit
    </div>

    <!-- CTA -->
    <div class="td-card">

        <div class="td-card-body">
            <p class="td-text">
                আপনি কি চান  
                <strong>লস-মুক্ত ও নিয়ন্ত্রিত হজ্জ/উমরাহ ব্যবসা</strong>?
                <br><br>
                <strong>Trip Designer</strong> নিশ্চিত করে—
                ✔ Hidden Cost Controlled Planning  
                ✔ Transparent Client Communication  
                ✔ Profit Protection System
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
                    <div class="cta-label">Business Consultation</div>
                    <a href="https://wa.me/8801316444646" target="_blank">
                        +8801316444646 (Contact Now)
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/26') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/28') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection