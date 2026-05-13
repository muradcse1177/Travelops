@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 3 - বিভিন্ন দেশের ভিসা নীতিমালার পার্থক্য')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">বিভিন্ন দেশের ভিসা নীতিমালার পার্থক্য</h2>

        <p>
            প্রতিটি দেশ তাদের নিজস্ব নিরাপত্তা, অর্থনীতি, শ্রমবাজার এবং অভিবাসন নীতির ভিত্তিতে ভিসা প্রদান করে।
            তাই সব দেশের ভিসা নিয়ম একই নয়। কেউ ডকুমেন্টকে গুরুত্ব দেয়, কেউ আবার ইন্টারভিউ—কেউ আবার সম্পূর্ণ ডিজিটাল সিস্টেম ব্যবহার করে।
        </p>

        <h3 class="country-section-title">🌎 বিশ্বব্যাপী জনপ্রিয় দেশের ভিসা নীতিমালা</h3>

        <!-- USA -->
        <div class="country-card">
            <h3 class="country-title">১. যুক্তরাষ্ট্র (USA) – ইন্টারভিউ ভিত্তিক কঠোর স্ক্রিনিং</h3>
            <ul class="country-list">
                <li>ইন্টারভিউয়ে কনসুলার অফিসারের সিদ্ধান্তই চূড়ান্ত</li>
                <li>Financial + Purpose verification</li>
                <li>Family ties & job stability অত্যন্ত গুরুত্বপূর্ণ</li>
                <li>Documents optional কিন্তু প্রমাণ থাকা জরুরি</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: <b>আপনি ভ্রমণ শেষে দেশে ফিরবেন কিনা</b></div>
        </div>

        <!-- Canada -->
        <div class="country-card">
            <h3 class="country-title">২. কানাডা – ডকুমেন্ট-ভিত্তিক Digital মূল্যায়ন</h3>
            <ul class="country-list">
                <li>পুরো প্রক্রিয়া অনলাইনে</li>
                <li>ব্যাংক স্টেটমেন্ট, ট্যাক্স, চাকরি/ব্যবসার কাগজ কঠোরভাবে যাচাই</li>
                <li>Travel history বড় ভূমিকা রাখে</li>
                <li>Rejection হলে GCMS Note পাওয়া যায়</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: <b>উদ্দেশ্য + আর্থিক সক্ষমতা + ভ্রমণ অভিজ্ঞতা</b></div>
        </div>

        <!-- UK -->
        <div class="country-card">
            <h3 class="country-title">৩. যুক্তরাজ্য (UK) – Highly Structured Visa Rules</h3>
            <ul class="country-list">
                <li>Online application + biometric submission</li>
                <li>Bank fund maintenance rule (২৮ দিন)</li>
                <li>Strong cover letter প্রয়োজন</li>
                <li>TB test নির্দিষ্ট দেশের জন্য বাধ্যতামূলক</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: <b>রিটার্ন অ্যাশিওরেন্স + আর্থিক স্থিতি</b></div>
        </div>

        <!-- Schengen -->
        <div class="country-card">
            <h3 class="country-title">৪. শেঙ্গেন দেশসমূহ – একটি ভিসায় ২৬ দেশ</h3>
            <ul class="country-list">
                <li>Hotel booking + itinerary অপরিহার্য</li>
                <li>Travel insurance বাধ্যতামূলক</li>
                <li>Maximum stay rule অনুযায়ী embassy নির্বাচন</li>
                <li>Strong documentation ছাড়া approval কঠিন</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: <b>ভ্রমণ পরিকল্পনা + আর্থিক সক্ষমতা</b></div>
        </div>

        <!-- Australia -->
        <div class="country-card">
            <h3 class="country-title">৫. অস্ট্রেলিয়া – Deep Document Verification</h3>
            <ul class="country-list">
                <li>Immigration risk assessment</li>
                <li>Career gap বা inconsistent fund সমস্যার সৃষ্টি করতে পারে</li>
                <li>Health exam বাধ্যতামূলক</li>
                <li>ডকুমেন্ট scanning খুব বিস্তারিতভাবে হয়</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: <b>GTE + Financial stability</b></div>
        </div>

        <!-- Middle East -->
        <div class="country-card">
            <h3 class="country-title">৬. মধ্যপ্রাচ্য (Dubai, Qatar, Oman, KSA)</h3>
            <ul class="country-list">
                <li>Tourist visa তুলনামূলক সহজ</li>
                <li>Work visa employer sponsorship ভিত্তিক</li>
                <li>Medical test + Police clearance প্রয়োজন</li>
                <li>Processing time দ্রুত</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: <b>Sponsorship + Medical fitness</b></div>
        </div>

        <!-- ASIAN COUNTRIES -->
        <h3 class="country-section-title">🌏 এশিয়ান দেশের ভিসা নীতিমালা</h3>

        <!-- India -->
        <div class="country-card">
            <h3 class="country-title">৭. ভারত (India) – সহজ eVisa সিস্টেম</h3>
            <ul>
                <li>eVisa সহজ ও দ্রুত</li>
                <li>Online application</li>
                <li>Purpose mismatch হলে রিজেকশন</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: পরিষ্কার উদ্দেশ্য + return assurance</div>
        </div>

        <!-- Thailand -->
        <div class="country-card">
            <h3 class="country-title">৮. থাইল্যান্ড – Easy Tourist Visa</h3>
            <ul>
                <li>Visa on arrival / eVisa</li>
                <li>Hotel booking প্রয়োজন</li>
                <li>Financial capability proof important</li>
            </ul>
            <div class="highlight">মূল মূল্যায়ন: ভ্রমণ উদ্দেশ্য + পর্যাপ্ত ফান্ড</div>
        </div>

        <!-- Malaysia -->
        <div class="country-card">
            <h3 class="country-title">৯. মালয়েশিয়া – EMGS ভিত্তিক Student Visa</h3>
            <ul>
                <li>eNTRI / eVisa available</li>
                <li>Student visa complex (EMGS approval বাধ্যতামূলক)</li>
                <li>Finance + academic proof প্রয়োজন</li>
            </ul>
        </div>

        <!-- Singapore -->
        <div class="country-card">
            <h3 class="country-title">১০. সিঙ্গাপুর – Documentation Strongly Required</h3>
            <ul>
                <li>No walk-in — authorized agent required</li>
                <li>Financial + employment documents mandatory</li>
            </ul>
        </div>

        <!-- Japan -->
        <div class="country-card">
            <h3 class="country-title">১১. জাপান – Strong Financial & Family Ties</h3>
            <ul>
                <li>Bank savings is key</li>
                <li>Strong itinerary প্রয়োজন</li>
                <li>Family ties থাকলে approval rate বেশি</li>
            </ul>
        </div>

        <!-- S Korea -->
        <div class="country-card">
            <h3 class="country-title">১২. দক্ষিণ কোরিয়া – Increasingly Strict</h3>
            <ul>
                <li>Job stability + strong bank balance needed</li>
                <li>Business invitation helpful</li>
            </ul>
        </div>

        <!-- China -->
        <div class="country-card">
            <h3 class="country-title">১৩. চীন (China) – Invitation Letter Important</h3>
            <ul>
                <li>Business visa → PU Letter mandatory</li>
                <li>Tourist visa → itinerary required</li>
                <li>Strict political screening</li>
            </ul>
        </div>

        <!-- Nepal -->
        <div class="country-card">
            <h3 class="country-title">১৪. নেপাল – Easy On Arrival</h3>
            <ul>
                <li>Minimal documentation</li>
                <li>On arrival visa</li>
            </ul>
        </div>

        <!-- Sri Lanka -->
        <div class="country-card">
            <h3 class="country-title">১৫. শ্রীলংকা – ETA Visa System</h3>
            <ul>
                <li>Online ETA approval</li>
                <li>Return ticket mandatory</li>
            </ul>
        </div>

        <!-- Bhutan -->
        <div class="country-card">
            <h3 class="country-title">১৬. ভুটান – Guided Entry Rules</h3>
            <ul>
                <li>Tour must be booked via authorized operators</li>
                <li>SDF Fee mandatory</li>
            </ul>
        </div>

        <!-- SUMMARY TABLE -->
        <h3 class="summary-heading">বিশ্ব + এশিয়ার ভিসা নীতিমালার সারসংক্ষেপ</h3>

        <table class="table table-bordered summary-table">
            <thead class="table-primary">
                <tr>
                    <th>দেশ</th>
                    <th>মূল মূল্যায়ন</th>
                </tr>
            </thead>

            <tbody>
                <tr><td>USA</td><td>ইন্টারভিউ + রিটার্ন অ্যাশিওরেন্স</td></tr>
                <tr><td>Canada</td><td>ডকুমেন্ট + আর্থিক প্রমাণ + উদ্দেশ্যের স্বচ্ছতা</td></tr>
                <tr><td>UK</td><td>Structured rules + Fund maintenance (28 days)</td></tr>
                <tr><td>Schengen</td><td>Itinerary + Insurance + Strong documentation</td></tr>
                <tr><td>Australia</td><td>GTE + Financial + Health exam</td></tr>
                <tr><td>Middle East (UAE, Qatar, KSA)</td><td>Employer sponsorship + Medical fitness</td></tr>
                <tr><td>Japan</td><td>Savings + Family ties + শৃঙ্খলাপূর্ণ ডকুমেন্ট</td></tr>
                <tr><td>India</td><td>eVisa + উদ্দেশ্য পরিষ্কার + Return assurance</td></tr>
                <tr><td>Thailand</td><td>Financial proof + Travel plan</td></tr>
                <tr><td>Malaysia</td><td>EMGS approval + Financial + Academic proof</td></tr>
                <tr><td>Singapore</td><td>Strong documentation + Job profile verification</td></tr>
                <tr><td>South Korea</td><td>Bank solvency + Job stability + Travel history</td></tr>
                <tr><td>China</td><td>Invitation letter (PU) + Political screening</td></tr>
                <tr><td>Nepal</td><td>On arrival + Basic verification</td></tr>
                <tr><td>Sri Lanka</td><td>ETA approval + Return ticket</td></tr>
                <tr><td>Bhutan</td><td>Tour operator approval + SDF fee</td></tr>
                <tr><td>Vietnam</td><td>eVisa + Hotel booking + Itinerary</td></tr>
                <tr><td>Indonesia</td><td>Visa on Arrival + Basic purpose check</td></tr>
                <tr><td>Philippines</td><td>Clear documentation + Bank proof + Hotel booking</td></tr>
            </tbody>
        </table>


        <!-- Navigation -->
        <div class="nav-buttons">
            <a href="{{ url('/ebooks/visa-course/chapter/2') }}" class="btn btn-secondary">⬅ পূর্ববর্তী অধ্যায়</a>
            <a href="{{ url('/ebooks/visa-course/chapter/4') }}" class="btn btn-primary">পরবর্তী অধ্যায় ➡</a>
        </div>

    </div>

    <div id="footer"></div>
@endsection