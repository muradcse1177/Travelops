@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 26 - দূতাবাস অনুযায়ী নিয়ম')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">দূতাবাস অনুযায়ী নিয়ম</h2>

    <p>
        প্রতিটি দেশের দূতাবাস (Embassy/High Commission) ছাত্রভিসার ক্ষেত্রে ভিন্ন ভিন্ন নিয়ম অনুসরণ করে।  
        তাই ভিসা আবেদন করার আগে কোন দূতাবাস কী চায় তা পরিষ্কারভাবে জানা অত্যন্ত গুরুত্বপূর্ণ।
    </p>

    <div class="highlight-box">
        <b>সঠিক দূতাবাস নিয়ম না মানলে, ডকুমেন্ট ঠিক থাকলেও ভিসা রিজেক্ট হতে পারে।</b>
    </div>

    <!-- SECTION 1 -->
    <h3 class="section-heading"><span class="sec-num">1.</span> USA Embassy Rules</h3>

    <ul class="visa-list">
        <li>✔ I-20 বাধ্যতামূলক</li>
        <li>✔ SEVIS Fee পরিশোধ করতে হবে</li>
        <li>✔ ভিসা হলো পুরোপুরি interview-based</li>
        <li>✔ Financial proof strong হতে হবে</li>
        <li>✔ Family ties & return assurance সবচেয়ে গুরুত্বপূর্ণ</li>
        <li>✔ Academic consistency গুরুত্বপূর্ণ</li>
    </ul>

    <div class="info-box">
        USA দূতাবাস সাধারণত ডকুমেন্ট দেখে না—আপনার কথাই মূল সিদ্ধান্তের ভিত্তি।
    </div>

    <!-- SECTION 2 -->
    <h3 class="section-heading"><span class="sec-num">2.</span> Canada Embassy Rules</h3>

    <ul class="visa-list">
        <li>✔ Complete application + SOP প্রয়োজন</li>
        <li>✔ Tuition fee 1 semester বা 1 year advance দিতে হয়</li>
        <li>✔ GIC বাধ্যতামূলক (Canada)</li>
        <li>✔ Biometrics + Medical</li>
        <li>✔ File হয় 100% paperless (Online)</li>
        <li>✔ GCMS notes — refusal হলে কারণে জানা যায়</li>
    </ul>

    <div class="highlight-box">
        কানাডা ভিসা সম্পূর্ণ documentation-based — interview নেই।
    </div>

    <!-- SECTION 3 -->
    <h3 class="section-heading"><span class="sec-num">3.</span> UK Embassy Rules</h3>

    <ul class="visa-list">
        <li>✔ CAS mandatory</li>
        <li>✔ 28 days fund maintenance rule</li>
        <li>✔ TB test certificate</li>
        <li>✔ Tuition fee payment (partial accepted)</li>
        <li>✔ English requirement (IELTS/other tests)</li>
        <li>✔ Strong academic explanation প্রয়োজন</li>
    </ul>

    <!-- SECTION 4 -->
    <h3 class="section-heading"><span class="sec-num">4.</span> Australia Embassy Rules</h3>

    <ul class="visa-list">
        <li>✔ GTE (Genuine Temporary Entrant) mandatory</li>
        <li>✔ Financial proof strict</li>
        <li>✔ SOP খুব বিস্তারিত হওয়া প্রয়োজন</li>
        <li>✔ Health exam বাধ্যতামূলক</li>
        <li>✔ COE (Confirmation of Enrolment) প্রয়োজন</li>
    </ul>

    <div class="info-box">
        Australia ভিসায় documentation + assessment দুটোই কঠোর।
    </div>

    <!-- SECTION 5 -->
    <h3 class="section-heading"><span class="sec-num">5.</span> Germany Embassy Rules</h3>

    <ul class="visa-list">
        <li>✔ APS Certificate (Mandatory for Bangladesh)</li>
        <li>✔ Blocked Account</li>
        <li>✔ German language requirement (course wise)</li>
        <li>✔ Interview mandatory</li>
        <li>✔ Appointment early booking জরুরি</li>
    </ul>

    <!-- SECTION 6 -->
    <h3 class="section-heading"><span class="sec-num">6.</span> Japan Embassy Rules</h3>

    <ul class="visa-list">
        <li>✔ COE mandatory</li>
        <li>✔ Bank statement + solvency খুব গুরুত্বপূর্ণ</li>
        <li>✔ Sponsor verification করা হয়</li>
        <li>✔ Detailed SOP প্রয়োজন</li>
        <li>✔ Academic performance গুরুত্ব পায়</li>
    </ul>

    <!-- SECTION 7 -->
    <h3 class="section-heading"><span class="sec-num">7.</span> Country-wise Quick Comparison</h3>

    <table class="table table-bordered summary-table">
        <thead class="table-primary">
            <tr>
                <th>দেশ</th>
                <th>মূল মূল্যায়ন</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>USA</td><td>Interview + Return assurance</td></tr>
            <tr><td>Canada</td><td>Strong documentation</td></tr>
            <tr><td>UK</td><td>Fund maintenance + CAS</td></tr>
            <tr><td>Australia</td><td>GTE + Financial + Health</td></tr>
            <tr><td>Germany</td><td>APS + Blocked account</td></tr>
            <tr><td>Japan</td><td>Financial proof + COE</td></tr>
        </tbody>
    </table>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Country Selection, CAS/I-20, GTE, APS, Financial File —  
                দূতাবাস অনুযায়ী সঠিক ডকুমেন্ট তৈরি করতে <b>Trip Designer</b> বিশেষায়িত সাপোর্ট প্রদান করে।
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
        <a href="{{ url('/ebooks/visa-course/chapter/25') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/27') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection