@extends('ebooks.work-permit.layout.app')

@section('title','Chapter 1 | ওয়ার্ক পারমিট কী এবং কেন প্রয়োজন')

@section('content')
<div class="chapter-box">

            <h1 class="chapter-title">📘 Chapter 1: ওয়ার্ক পারমিট কী এবং কেন প্রয়োজন</h1>

            <p class="text-secondary">
                এই অধ্যায়ে আপনি ওয়ার্ক পারমিটের মূল ধারণা, এর প্রয়োজনীয়তা এবং এটি কীভাবে একজন ব্যক্তির
                বিদেশে কাজ করার বৈধ পথ তৈরি করে — তা পরিষ্কারভাবে বুঝতে পারবেন।
            </p>

            <!-- SECTION 1 -->
            <h2 class="section-heading">ওয়ার্ক পারমিট কী?</h2>

            <p>
                <strong>ওয়ার্ক পারমিট</strong> হলো একটি সরকারি অনুমোদন (Official Authorization),
                যা কোনো দেশের সরকার বিদেশি নাগরিককে নির্দিষ্ট সময়ের জন্য তাদের দেশে কাজ করার অনুমতি দেয়।
            </p>

            <div class="highlight-box">
                👉 সহজ ভাষায় বলতে গেলে, <strong>ভিসা আপনাকে দেশে ঢুকতে দেয়</strong>,
                আর <strong>ওয়ার্ক পারমিট আপনাকে কাজ করতে দেয়</strong>।
            </div>

            <p>
                প্রতিটি দেশের ওয়ার্ক পারমিটের নিয়ম আলাদা হলেও মূল উদ্দেশ্য একটাই —
                বিদেশি শ্রমিক যেন আইনগতভাবে কাজ করতে পারে এবং স্থানীয় শ্রমবাজার সুরক্ষিত থাকে।
            </p>

            <!-- SECTION 2 -->
            <h2 class="section-heading">ওয়ার্ক পারমিট কেন প্রয়োজন?</h2>

            <p>
                অনেকেই মনে করেন ভিসা থাকলেই বিদেশে কাজ করা যায়, কিন্তু বাস্তবতা হলো —
                <strong>ওয়ার্ক পারমিট ছাড়া কাজ করা সম্পূর্ণ অবৈধ</strong>।
            </p>

            <div class="info-box">
                ⚠️ ওয়ার্ক পারমিট ছাড়া কাজ করলে:
                <ul class="visa-list mt-2">
                    <li>❌ ডিপোর্ট হতে পারেন</li>
                    <li>❌ ভবিষ্যতে ভিসা ব্যান হতে পারে</li>
                    <li>❌ জরিমানা বা জেল পর্যন্ত হতে পারে</li>
                </ul>
            </div>

            <!-- SECTION 3 -->
            <h2 class="section-heading">ওয়ার্ক পারমিটের মূল সুবিধা</h2>

            <ul class="custom-checklist">
                <li>✅ বৈধভাবে কাজ করার অধিকার</li>
                <li>✅ নির্দিষ্ট এমপ্লয়ারের অধীনে চাকরি</li>
                <li>✅ ব্যাংক একাউন্ট ও ট্যাক্স সুবিধা</li>
                <li>✅ পরিবার নেওয়ার সুযোগ (কিছু দেশে)</li>
                <li>✅ ভবিষ্যতে PR বা রেসিডেন্সির পথ</li>
            </ul>

            <!-- SECTION 4 -->
            <h2 class="section-heading">কারা ওয়ার্ক পারমিট নিতে পারে?</h2>

            <p>
                সাধারণত নিম্নলিখিত শর্ত পূরণ করলে একজন ব্যক্তি ওয়ার্ক পারমিটের জন্য আবেদন করতে পারে:
            </p>

            <div class="highlight-box">
                <ul class="visa-list">
                    <li>✔ বৈধ জব অফার</li>
                    <li>✔ নির্দিষ্ট স্কিল বা অভিজ্ঞতা</li>
                    <li>✔ মেডিকেল ও পুলিশ ক্লিয়ারেন্স</li>
                    <li>✔ আর্থিক সক্ষমতার প্রমাণ</li>
                </ul>
            </div>

            <!-- SECTION 5 -->
            <h2 class="section-heading">বাস্তব কথা (Reality Check)</h2>

            <p>
                ওয়ার্ক পারমিট কোনো ম্যাজিক না।
                এটি একটি <strong>প্রসেস</strong> — যেখানে সময়, ডকুমেন্ট এবং সঠিক গাইডলাইন দরকার।
            </p>

            <div class="info-box">
                💡 মনে রাখবেন:
                <br>
                “যেখানে গ্যারান্টি বলা হয়, সেখানেই সাধারণত স্ক্যাম লুকিয়ে থাকে।”
            </div>

            <!-- NAVIGATION -->
            <div class="nav-buttons">
                <a href="{{ url('/ebooks/work-permit/') }}" class="btn btn-outline-primary">⬅ সূচিপত্র</a>
                <a href="{{ url('/ebooks/work-permit/chapter/2') }}" class="btn btn-primary">পরবর্তী অধ্যায় ➡</a>
            </div>

        </div>

        <!-- Footer -->
        <div id="footer"></div>
@endsection