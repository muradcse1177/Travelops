@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 27 - Proof of Funds প্রস্তুতি')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Proof of Funds প্রস্তুতি</h2>

    <p>
        বিদেশে পড়াশোনা, ভ্রমণ বা যেকোনো ধরনের ভিসার ক্ষেত্রে  
        <b>Proof of Funds (POF)</b> সবচেয়ে গুরুত্বপূর্ণ ডকুমেন্টগুলোর একটি।  
        দূতাবাস অবশ্যই নিশ্চিত হতে চায় আপনি কি আপনার খরচ নিজের সামর্থ্যে বহন করতে পারবেন।
    </p>

    <div class="highlight-box">
        <b>POF ঠিক না থাকলে ভিসা রিজেক্ট হওয়ার সম্ভাবনা সবচেয়ে বেশি।</b>
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> Proof of Funds কী?</h3>

    <p>
        Proof of Funds হলো এমন আর্থিক প্রমাণ যা দেখায়—
    </p>

    <ul class="visa-list">
        <li>✔ আপনার কাছে পর্যাপ্ত টাকা আছে</li>
        <li>✔ আপনি নিজের খরচ নিজেই বহন করতে পারবেন</li>
        <li>✔ আপনার স্টেটমেন্ট সত্যিকারের এবং স্থিতিশীল</li>
        <li>✔ টাকা হঠাৎ জমা নয় — ব্যালেন্স ধারাবাহিক</li>
    </ul>

    <div class="info-box">
        POF আপনার financial strength + credibility প্রমাণ করে।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> কোন কোন ডকুমেন্ট Proof of Funds হিসেবে গ্রহণযোগ্য?</h3>

    <ul class="visa-list">
        <li>✔ Bank Statement (৩–৬ মাস)</li>
        <li>✔ Bank Solvency Certificate</li>
        <li>✔ Fixed Deposit (FDR)</li>
        <li>✔ Savings Certificate</li>
        <li>✔ Tax Return / Income Source Proof</li>
        <li>✔ Sponsorship documents (parents/relatives)</li>
        <li>✔ Student → GIC (Canada)</li>
        <li>✔ Blocked Account → Germany</li>
    </ul>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> কোন দেশের জন্য কত টাকা দেখাতে হয়?</h3>

    <table class="table table-bordered summary-table">
        <thead class="table-primary">
            <tr>
                <th>দেশ</th>
                <th>ন্যূনতম প্রয়োজনীয় ফান্ড</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Canada</td><td>Tuition + GIC (CAD 20,635)</td></tr>
            <tr><td>UK</td><td>Living £9,207–£12,006 + tuition fee</td></tr>
            <tr><td>Australia</td><td>AUD 24,505/year + tuition</td></tr>
            <tr><td>Germany</td><td>Blocked Account €11,208</td></tr>
            <tr><td>USA</td><td>I-20 অনুযায়ী total funds</td></tr>
            <tr><td>Japan</td><td>¥1,500,000+ (depend on course)</td></tr>
        </tbody>
    </table>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> Bank Statement প্রস্তুত করার সঠিক নিয়ম</h3>

    <ul class="visa-list">
        <li>✔ হঠাৎ টাকা জমা (sudden deposit) থাকবে না</li>
        <li>✔ Regular transactions থাকতে হবে</li>
        <li>✔ শেষের ব্যালেন্স স্থিতিশীল হওয়া জরুরি</li>
        <li>✔ Statement সম্পূর্ণ ৩–৬ মাসের হওয়া চাই</li>
        <li>✔ Business income হলে bank flow থাকতে হবে</li>
        <li>✔ Sponsor → sponsor account must match income</li>
    </ul>

    <div class="highlight-box">
        Bank statement–এ সবচেয়ে বড় ভুল → “হঠাৎ ১০–১৫ লাখ জমা দেওয়া।”
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> Bank Solvency Certificate কেন প্রয়োজন?</h3>

    <ul class="visa-list">
        <li>✔ এটা প্রমাণ করে আপনার ব্যাংকে মোট সম্পদের পরিমাণ</li>
        <li>✔ Embassy-তে financial stability দেখাতে ব্যবহৃত হয়</li>
        <li>✔ Student, tourist—দুই ভিসাতেই প্রয়োজন</li>
    </ul>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> Sponsorship Proof (If Applicable)</h3>

    <p>যদি বাবা/মা/আত্মীয় sponsor হন, তাহলে লাগবে:</p>

    <ul class="visa-list">
        <li>✔ Sponsor letter</li>
        <li>✔ Relationship proof</li>
        <li>✔ Sponsor bank statement</li>
        <li>✔ Income source documents</li>
        <li>✔ Tax returns</li>
    </ul>

    <!-- SECTION 7 -->
    <h3 class="section-heading"><span class="sec-num">7.</span> প্রফেশনালভাবে Proof of Funds তৈরি করার গাইড</h3>

    <ul class="visa-list">
        <li>✔ Bank flow নিশ্চিত করুন</li>
        <li>✔ Sudden deposit এড়িয়ে চলুন</li>
        <li>✔ Income source প্রমাণ রাখুন</li>
        <li>✔ Solvency + Statement মিল রেখে বানান</li>
        <li>✔ Sponsor হলে তার documents match হতে হবে</li>
        <li>✔ স্টেটমেন্ট অরিজিনাল ব্যাংক থেকে সংগ্রহ করুন</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Bank Statement, Solvency, Sponsorship Letter, Income Proof —  
                সব ধরনের <b>Proof of Funds</b> প্রস্তুতিতে  
                <b>Trip Designer</b> বিশেষায়িত সহায়তা প্রদান করে।
            </p>
        </div>

        <div class="td-card-footer">

            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">WhatsApp</div>
                    <a href="https://wa.me/8801707011562" target="_blank">+8801707011562</a>
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
        <a href="{{ url('/ebooks/visa-course/chapter/26') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/28') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection