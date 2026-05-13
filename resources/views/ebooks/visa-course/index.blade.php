@extends('ebooks.visa-course.layout.app')

@section('title','Visa Processing Mastering eBook | সূচিপত্র')

@section('content')
<div class="chapter-box">

    <h2 style="font-size:30px; font-weight:800; color:#04107C; margin-bottom:10px;">
        📘 সূচিপত্র (INDEX)
    </h2>

    <p class="text-secondary" style="font-size:16px; margin-bottom:25px;">
        এই মাস্টার কোর্সে আপনি ভিসা প্রসেসিং সম্পর্কিত A–Z তথ্য পাবেন।
    </p>

    <div class="index-wrapper">

        <!-- PART 1 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ১: ভিসা প্রসেসিং পরিচিতি</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/1') }}">➤ ভিসা কী? কেন প্রয়োজন?</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/2') }}">➤ ভিসার ধরন</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/3') }}">➤ বিভিন্ন দেশের ভিসা নীতিমালা</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/4') }}">➤ এম্ব্যাসি ও ভিএফএস সেন্টারের কার্যপ্রণালির বিস্তারিত ধারণা</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/5') }}">➤ ভিসা প্রসেসিং এজেন্সির ভূমিকা</div>
        </div>

        <!-- PART 2 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ২: ভিসা ডকুমেন্টেশন বেসিকস</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/6') }}">➤ পাসপোর্ট ভ্যালিডিটি</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/7') }}">➤ ব্যাংক স্টেটমেন্ট ও সলভেন্সি</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/8') }}">➤ এমপ্লয়মেন্ট লেটার / NOC</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/9') }}">➤ ফিনান্সিয়াল অ্যাফিডেভিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/10') }}">➤ ট্রাভেল হিস্ট্রি</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/11') }}">➤ স্পন্সরশিপ ডকুমেন্টস</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/12') }}">➤ কভার লেটার কীভাবে লিখবেন</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/13') }}">➤ Business Documents</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/14') }}">➤ Document Legalization</div>
        </div>

        <!-- PART 3 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ৩: ট্যুরিস্ট ভিসা প্রসেসিং</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/15') }}">➤ ট্যুরিস্ট ভিসা কীভাবে কাজ করে</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/16') }}">➤ শক্তিশালী প্রোফাইল তৈরির নির্দেশিকা</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/17') }}">➤ ইনভিটেশন লেটার থাকলে/না থাকলে</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/18') }}">➤ হোটেল বুকিং ও ইটিনারারি</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/19') }}">➤ ট্রাভেল ইন্স্যুরেন্স</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/20') }}">➤ ট্যুরিস্ট ভিসা রিজেকশনের কারণ</div>
        </div>

        <!-- PART 4 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ৪: স্টুডেন্ট ভিসা প্রসেসিং</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/21') }}">➤ বিশ্ববিদ্যালয় নির্বাচন</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/22') }}">➤ Offer Letter / CAS / I-20</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/23') }}">➤ টিউশন ফি প্রসেস</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/24') }}">➤ স্টুডেন্ট ভিসা ইন্টারভিউ</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/25') }}">➤ SOP লেখার গাইড</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/26') }}">➤ দূতাবাস অনুযায়ী নিয়ম</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/27') }}">➤ Proof of Funds প্রস্তুতি</div>
        </div>

        <!-- PART 5 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ৫: ওয়ার্ক ভিসা ও এমপ্লয়মেন্ট</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/28') }}">➤ ওয়ার্ক পারমিট বনাম ওয়ার্ক ভিসা</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/29') }}">➤ স্কিল্ড ওয়ার্কার ভিসার শর্ত</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/30') }}">➤ জব অফার লেটার ভেরিফিকেশন</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/31') }}">➤ LMIA / Employer Approval</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/32') }}">➤ চাকরি জালিয়াতি চিহ্নিত করার উপায়</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/33') }}">➤ ভিসা স্ক্যাম প্রতারণা থেকে বাঁচার উপায়</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/34') }}">➤ মেডিকেল ও পুলিশ ক্লিয়ারেন্স প্রসেস</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/35') }}">➤ ভিসা অনুমোদনের পর করণীয়</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/36') }}">➤ বিভিন্ন দেশের ভিসা চেক করার ওয়েবসাইট</div>
        </div>

        <!-- PART 6 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ৬: কান্ট্রি-ওয়াইজ ভিসা গাইড</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/37') }}">➤ USA Visa (B1/B2, F1, Work Visa)</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/38') }}">➤ Canada Visa (Tourist, Study, Work)</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/39') }}">➤ UK Visa (Visit, Student, Skilled Worker)</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/40') }}">➤ Schengen Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/41') }}">➤ Australia Visa</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/42') }}">➤ Dubai / Middle East Visa</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/43') }}">➤ India Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/44') }}">➤ Thailand Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/45') }}">➤ Malaysia Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/46') }}">➤ Singapore Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/47') }}">➤ Vietnam Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/48') }}">➤ China Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/49') }}">➤ Hongkong Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/50') }}">➤ Japan Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/51') }}">➤ New Zealand Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/52') }}">➤ South Korea Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/53') }}">➤ Philippines Visa Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/54') }}">➤ Indonesia Visa Guide</div>
        </div>

        <!-- PART 7 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ৭: ভিসা ইন্টারভিউ প্রস্তুতি</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/55') }}">➤ কনসুলার অফিসার কী যাচাই করেন</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/56') }}">➤ সাধারণ প্রশ্ন ও উত্তর</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/57') }}">➤ বডি ল্যাঙ্গুয়েজ টিপস</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/58') }}">➤ রেড ফ্ল্যাগ এড়িয়ে চলা</div>
        </div>

        <!-- PART 8 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ৮: ভিসা রিজেকশন — কারণ ও সমাধান</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/59') }}">➤ সাধারণ রিজেকশনের কারণ</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/60') }}">➤ ডকুমেন্ট উন্নত করার উপায়</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/61') }}">➤ Reapply করার সঠিক সময়</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/62') }}">➤ বাস্তব কেস স্টাডি</div>
        </div>

        <!-- PART 9 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ৯: ভিসা প্রসেসিং ব্যবসা</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/63') }}">➤ কীভাবে এজেন্সি শুরু করবেন</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/64') }}">➤ রেজিস্ট্রেশন ও লাইসেন্সিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/65') }}">➤ সার্ভিস চার্জ / প্যাকেজ তৈরি</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/66') }}">➤ লিড জেনারেশন ও মার্কেটিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/67') }}">➤ ক্লায়েন্ট হ্যান্ডলিং টেকনিক</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/68') }}">➤ CRM / Automation Setup</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/69') }}">➤ বিশ্ববিদ্যালয়, এয়ারলাইন ও DMC পার্টনারশিপ</div>
        </div>

        <!-- PART 10 -->
        <div class="index-section">
            <h3 class="index-title">পার্ট ১০: Bonus Tools</h3>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/70') }}">➤ কভার লেটার টেমপ্লেট</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/71') }}">➤ স্পন্সরশিপ লেটার</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/72') }}">➤ SOP টেমপ্লেট</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/73') }}">➤ ইন্টারভিউ Q/A</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/74') }}">➤ ডকুমেন্ট চেকলিস্ট</div>
            <div class="index-item" data-link="{{ url('/ebooks/visa-course/chapter/75') }}">➤ ফ্রি টুলস</div>
        </div>

    </div>
</div>
@endsection
