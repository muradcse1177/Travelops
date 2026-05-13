@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 22 - Offer Letter / CAS / I-20')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">Offer Letter / CAS / I-20 — কী? কেন প্রয়োজন?</h2>

        <p>
            বিদেশে পড়াশোনার ক্ষেত্রে <b>Offer Letter, CAS, I-20</b>—এগুলো হলো ভিসা প্রক্রিয়ার সবচেয়ে গুরুত্বপূর্ণ  
            তিনটি ডকুমেন্ট। দেশভেদে নাম আলাদা হলেও, উদ্দেশ্য একই—  
            <b>আপনাকে একটি অনুমোদিত শিক্ষাপ্রতিষ্ঠানে ভর্তি নিশ্চিত করা।</b>
        </p>

        <!-- ==============================
              SECTION 1
        =============================== -->

        <h3 class="section-heading"> Offer Letter (Admission Offer)</h3>

        <p>
            এটি হলো বিশ্ববিদ্যালয় বা কলেজের পক্ষ থেকে দেওয়া  
            <b>প্রাথমিক ভর্তির নিশ্চিতকরণ চিঠি</b>।  
            এতে উল্লেখ থাকে—
        </p>

        <ul class="visa-list">
            <li>📌 আপনি কোন কোর্সে ভর্তি হয়েছেন</li>
            <li>📌 কোর্স শুরুর তারিখ</li>
            <li>📌 টিউশন ফি</li>
            <li>📌 আপনার প্রয়োজনীয় ডকুমেন্ট</li>
        </ul>

        <div class="highlight-box">
            <b>দুই ধরনের Offer Letter আছে—</b><br>
            ✔ Conditional Offer Letter → কিছু ডকুমেন্ট বাকি থাকলে<br>
            ✔ Unconditional Offer Letter → সবকিছু যাচাই শেষে নিশ্চিত ভর্তি
        </div>

        <!-- ==============================
              SECTION 2
        =============================== -->

        <h3 class="section-heading"> CAS (Confirmation of Acceptance for Studies) – UK</h3>

        <p><b>CAS হলো UK Student Visa (Subclass – Student Route)–এর প্রধান ডকুমেন্ট।</b></p>

        <p>এটি একটি ইউনিক নম্বরসহ ইলেকট্রনিক চিঠি যাতে থাকে—</p>

        <ul class="visa-list">
            <li>📌 আপনার কোর্সের তথ্য</li>
            <li>📌 Institute Sponsor Licence Number</li>
            <li>📌 টিউশন ফি কত পরিশোধ করেছেন</li>
            <li>📌 Fund requirement</li>
        </ul>

        <div class="info-box">
            <b>UKVI Visa</b> তে CAS Number ছাড়া আবেদন গ্রহণ করা হয় না।
        </div>

        <!-- ==============================
              SECTION 3
        =============================== -->

        <h3 class="section-heading"> I-20 Form – USA</h3>

        <p>
            I-20 হলো <b>US F-1 Student Visa</b>–এর সবচেয়ে গুরুত্বপূর্ণ ডকুমেন্ট।  
            এটি SEVIS–approved school থেকে ইস্যু করা হয়।
        </p>

        <p>I-20 তে থাকে—</p>

        <ul class="visa-list">
            <li>📌 School code + SEVIS ID</li>
            <li>📌 Course duration</li>
            <li>📌 Total tuition + living cost</li>
            <li>📌 Financial eligibility proof</li>
        </ul>

        <div class="highlight-box">
            <b>US Visa Interview–এ</b> I-20 হাতে নিয়ে যাওয়া বাধ্যতামূলক।
        </div>

        <!-- ==============================
              SECTION 4
        =============================== -->

        <h3 class="section-heading"> এই ডকুমেন্টগুলো কেন এত গুরুত্বপূর্ণ?</h3>

        <ul class="visa-list">
            <li>✔ আপনার শিক্ষাপ্রতিষ্ঠান অনুমোদিত কিনা প্রমাণ করে</li>
            <li>✔ আপনি যে কোর্সে পড়বেন তা নিশ্চিত করে</li>
            <li>✔ আর্থিক সক্ষমতা যাচাই করতে সাহায্য করে</li>
            <li>✔ Embassy-এর কাছে আপনার বৈধ ছাত্র পরিচয় তুলে ধরে</li>
        </ul>

        <!-- ==============================
              TD SUPPORT CARD
        =============================== -->

        <div class="td-card">
            <div class="td-card-body">
                <p class="td-text">
                    Offer Letter, CAS, I-20 প্রসেসিং, University Selection,  
                    Application Submission—সবকিছুতে  
                    <b>Trip Designer</b> সম্পূর্ণ সহায়তা প্রদান করে।
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
            <a href="{{ url('/ebooks/visa-course/chapter/21') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/23') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>

    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection