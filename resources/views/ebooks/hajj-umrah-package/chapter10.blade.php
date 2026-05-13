@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','পাসপোর্ট ও প্রয়োজনীয় ডকুমেন্ট | Trip Designer')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        পাসপোর্ট, ছবি ও প্রয়োজনীয় ডকুমেন্ট
    </h2>

    <p>
        হজ্জ ও উমরাহ ভিসা প্রসেসের  
        ভিত্তি হলো সঠিক <strong>ডকুমেন্টেশন</strong>।
        সামান্য ভুল বা অসম্পূর্ণ কাগজপত্র
        পুরো যাত্রা ঝুঁকির মধ্যে ফেলতে পারে।
        এই অধ্যায়ে আমরা জানবো—
        কী কী ডকুমেন্ট প্রয়োজন,
        কোথায় বেশি ভুল হয়
        এবং একজন <strong>Trip Designer</strong> হিসেবে
        কীভাবে এগুলো নিখুঁতভাবে ম্যানেজ করবেন।
    </p>

    <div class="highlight-box">
        Correct documents  
        = Approved visa + Peace of mind
    </div>

    <!-- =========================
         SECTION 1
    ========================= -->
    <h3 class="section-heading">১. পাসপোর্ট সংক্রান্ত শর্ত</h3>
    <p>
        হজ্জ ও উমরাহর জন্য
        পাসপোর্ট হলো সবচেয়ে গুরুত্বপূর্ণ ডকুমেন্ট।
        সৌদি কর্তৃপক্ষ এখানে
        কোনো ছাড় দেয় না।
    </p>

    <ul class="visa-list">
        <li>✔ মিনিমাম ৬ মাস validity</li>
        <li>✔ কমপক্ষে ২টি খালি পেজ</li>
        <li>✔ পাসপোর্ট ক্ষতিগ্রস্ত হওয়া যাবে না</li>
        <li>✔ নাম ও জন্মতারিখ পরিষ্কারভাবে পড়া যায়</li>
    </ul>

    <div class="info-box">
        Expired বা damaged passport  
        = Visa rejection risk
    </div>

    <!-- =========================
         SECTION 2
    ========================= -->
    <h3 class="section-heading">২. ছবি (Photograph) সংক্রান্ত নিয়ম</h3>
    <p>
        ছবি ছোট বিষয় মনে হলেও
        এটি ভিসা রিজেকশনের
        অন্যতম বড় কারণ।
    </p>

    <ul class="visa-list">
        <li>✔ সাদা ব্যাকগ্রাউন্ড</li>
        <li>✔ সাম্প্রতিক (৬ মাসের মধ্যে)</li>
        <li>✔ মুখ স্পষ্ট, কোনো ছায়া নয়</li>
        <li>✔ মেয়েদের জন্য হিজাব অনুমোদিত (মুখ খোলা)</li>
    </ul>

    <div class="highlight-box">
        Photo mismatch  
        often causes system rejection
    </div>

    <!-- =========================
         SECTION 3
    ========================= -->
    <h3 class="section-heading">৩. জাতীয় পরিচয়পত্র (NID)</h3>
    <p>
        যদিও সৌদি ভিসার জন্য
        সরাসরি NID সবসময় প্রয়োজন হয় না,
        কিন্তু লোকাল ভেরিফিকেশনের জন্য
        এটি অত্যন্ত গুরুত্বপূর্ণ।
    </p>

    <ul class="visa-list">
        <li>✔ স্মার্ট NID / ল্যামিনেটেড কপি</li>
        <li>✔ নাম ও জন্মতারিখ পাসপোর্টের সাথে মিল</li>
        <li>✔ ঝাপসা বা কাটাছেঁড়া কপি গ্রহণযোগ্য নয়</li>
    </ul>

    <!-- =========================
         SECTION 4
    ========================= -->
    <h3 class="section-heading">৪. মেডিক্যাল ও ভ্যাকসিন ডকুমেন্ট</h3>
    <p>
        হজ্জ ও উমরাহর জন্য
        সৌদি সরকার
        নির্দিষ্ট কিছু ভ্যাকসিন বাধ্যতামূলক করেছে।
    </p>

    <ul class="visa-list">
        <li>✔ Meningitis vaccine certificate</li>
        <li>✔ Covid / Flu (সময়ভেদে)</li>
        <li>✔ সরকারি বা অনুমোদিত হাসপাতালের সনদ</li>
    </ul>

    <div class="info-box">
        Vaccine document missing  
        = Airport trouble
    </div>

    <!-- =========================
         SECTION 5
    ========================= -->
    <h3 class="section-heading">৫. Trip Designer হিসেবে ডকুমেন্ট চেকলিস্ট</h3>
    <p>
        একজন দক্ষ Trip Designer
        কখনোই হাজীর কাছ থেকে
        অসম্পূর্ণ কাগজ নিয়ে
        প্রসেস শুরু করেন না।
    </p>

    <ul class="visa-list">
        <li>✔ Passport validity double-check</li>
        <li>✔ Name spelling match (Passport–NID)</li>
        <li>✔ Photo guideline follow করা হয়েছে কিনা</li>
        <li>✔ Vaccine certificate updated</li>
    </ul>

    <div class="highlight-box">
        One careful check  
        can save weeks of trouble
    </div>

    <!-- =========================
         FINAL CTA (FIXED)
    ========================= -->
    <div class="td-card">

        <div class="td-card-body">
            <p class="td-text">
                আপনি কি নিজে অথবা পরিবারের জন্য  
                <strong>হজ্জ বা উমরাহ প্যাকেজ</strong> খুঁজছেন?
                <br><br>
                <strong>Trip Designer</strong> দিচ্ছে—
                ✔ Trusted Hajj & Umrah Packages  
                ✔ Proper Documentation & Visa Guidance  
                ✔ Transparent Pricing & Support
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
                    <div class="cta-label">Consult with Trip Designer</div>
                    <a href="https://wa.me/8801316444646" target="_blank">
                        +8801316444646 (Contact Now)
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/9') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/hajj-umrah-package/chapter/11') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection