@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 28 - ওয়ার্ক পারমিট বনাম ওয়ার্ক ভিসা')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">ওয়ার্ক পারমিট বনাম ওয়ার্ক ভিসা</h2>

        <p>
            বিদেশে চাকরি করতে চাইলে দুটি গুরুত্বপূর্ণ শব্দ সবসময় শুনতে পাবেন—  
            <b>Work Permit</b> এবং <b>Work Visa</b>।  
            অনেকেই এই দুটি বিষয়কে একই মনে করেন, কিন্তু বাস্তবে এদের কাজ, উদ্দেশ্য ও প্রক্রিয়া সম্পূর্ণ আলাদা।
        </p>

        <div class="highlight-box">
            <b>সংক্ষেপে:</b>  
            <br>✔ Work Permit = কাজ করার অনুমতি  
            <br>✔ Work Visa = দেশে প্রবেশ + কাজ করার জন্য ভিসা স্ট্যাম্প  
        </div>

        <!-- SECTION 1 -->
        <h3 class="section-heading"> Work Permit কী?</h3>

        <p>Work Permit হলো একটি দেশের সরকার প্রদত্ত আনুষ্ঠানিক অনুমতি, যার মাধ্যমে আপনি সেই দেশে বৈধভাবে কাজ করতে পারবেন।</p>

        <ul class="visa-list">
            <li>✔ নিয়োগদাতা (Employer) সাধারণত এটি আবেদন করে</li>
            <li>✔ দেশের শ্রম আইন অনুযায়ী ইস্যু করা হয়</li>
            <li>✔ এটি প্রমাণ করে যে আপনি সেই দেশে বৈধভাবে কাজ করতে পারবেন</li>
        </ul>

        <div class="info-box">
            উদাহরণ: Canada LMIA, Romania Work Permit, Croatia Work Permit, Gulf দেশের Work Permit ইত্যাদি।
        </div>

        <!-- SECTION 2 -->
        <h3 class="section-heading"> Work Visa কী?</h3>

        <p>Work Permit পাওয়ার পর আপনার পাসপোর্টে যে ভিসা স্ট্যাম্প করা হয়, সেটিই Work Visa।</p>

        <ul class="visa-list">
            <li>✔ এটি দেশে প্রবেশের অনুমতি দেয়</li>
            <li>✔ বিমানবন্দরে Immigration clearance পেতে এটি প্রয়োজন</li>
            <li>✔ Work Permit + Visa = বৈধভাবে কাজের সম্পূর্ণ অনুমতি</li>
        </ul>

        <div class="highlight-box">
            <b>Work Permit কাজের অনুমতি দেয়, আর Work Visa দেশে প্রবেশের অনুমতি দেয়।</b>
        </div>

        <!-- SECTION 3 -->
        <h3 class="section-heading"> Work Permit এবং Work Visa—মূল পার্থক্য</h3>

        <table class="table table-bordered summary-table">
            <thead class="table-primary">
                <tr>
                    <th>দিক</th>
                    <th>Work Permit</th>
                    <th>Work Visa</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>উদ্দেশ্য</td>
                    <td>বৈধভাবে কাজ করার অনুমতি</td>
                    <td>দেশে প্রবেশ + কাজ করার অনুমতি</td>
                </tr>
                <tr>
                    <td>কে ইস্যু করে?</td>
                    <td>Government Labor Department</td>
                    <td>Embassy / Immigration</td>
                </tr>
                <tr>
                    <td>কে আবেদন করে?</td>
                    <td>Employer</td>
                    <td>Applicant</td>
                </tr>
                <tr>
                    <td>কখন প্রয়োজন?</td>
                    <td>চাকরি শুরু করার আগে</td>
                    <td>দেশে ভ্রমণের আগে</td>
                </tr>
                <tr>
                    <td>ছাড়া কি কাজ করা যায়?</td>
                    <td>❌ না</td>
                    <td>❌ না</td>
                </tr>
            </tbody>
        </table>

        <!-- SECTION 4 -->
        <h3 class="section-heading"> কোন কোন দেশে Work Permit আগে নিতে হয়?</h3>

        <ul class="visa-list">
            <li>✔ Canada — LMIA + Work Permit</li>
            <li>✔ Romania — Employer Work Permit</li>
            <li>✔ Croatia — Work Permit + Contract</li>
            <li>✔ Malta — Single Permit</li>
            <li>✔ Gulf Countries (Saudi, Qatar, Dubai)</li>
        </ul>

        <div class="info-box">
            <b>USA:</b> Work Visa (H1B) আগে Lottery, তারপর Employer Petition (I-129), শেষে Embassy Visa।
        </div>

        <!-- SECTION 5 -->
        <h3 class="section-heading"> কাজের জন্য কোনটি বেশি গুরুত্বপূর্ণ?</h3>

        <p>দুটোই গুরুত্বপূর্ণ।</p>

        <ul class="visa-list">
            <li>✔ Work Permit ছাড়া কাজ করা অবৈধ</li>
            <li>✔ Work Visa ছাড়া দেশে প্রবেশ করা যাবে না</li>
        </ul>

        <div class="highlight-box">
            <b>সঠিকভাবে বললে — Work Permit + Work Visa = সম্পূর্ণ বৈধ চাকরি</b>
        </div>

        <!-- TD SUPPORT CARD -->
        <div class="td-card">
            <div class="td-card-body">
                <p class="td-text">
                    বৈধ ও সঠিক Work Permit Verification, Job Offer ভেরিফিকেশন, LMIA/Permit Check —  
                    সবকিছুতেই <b>Trip Designer</b> প্রফেশনাল সাপোর্ট প্রদান করে।
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
            <a href="{{ url('/ebooks/visa-course/chapter/27') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/29') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection