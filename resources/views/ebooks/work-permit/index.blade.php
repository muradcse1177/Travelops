@extends('ebooks.work-permit.layout.app')

@section('title','Work Permit Mastering Secrets | সূচিপত্র')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">📘 সূচিপত্র</h2>
    <p class="text-secondary mb-4">
        এই ই–বুকটি ধাপে ধাপে এমনভাবে সাজানো হয়েছে, যাতে সম্পূর্ণ পড়লে আপনি নিজেই ওয়ার্ক পারমিট সার্ভিস দিয়ে একটি এজেন্সি শুরু করতে পারেন।
    </p>

    <div class="index-wrapper">

        <!-- PART 1 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১: ওয়ার্ক পারমিট বেসিক</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/1') }}">ওয়ার্ক পারমিট কী এবং কেন প্রয়োজন</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/2') }}">ভিসা ও ওয়ার্ক পারমিটের পার্থক্য</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/3') }}">বাস্তবতা, ঝুঁকি ও সীমাবদ্ধতা</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/4') }}">কোন দেশে ওয়ার্ক পারমিট পাওয়া যায়</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/5') }}">ক্লায়েন্ট যোগ্যতা যাচাই পদ্ধতি</div>
        </div>

        <!-- PART 2 -->
        <div class="index-section">
            <div class="index-title">পার্ট ২: ওয়ার্ক পারমিটের ধরন</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/6') }}">টেম্পোরারি ওয়ার্ক পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/7') }}">পার্মানেন্ট ওয়ার্ক পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/8') }}">এমপ্লয়ার স্পন্সরড পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/9') }}">ওপেন ও ক্লোজড ওয়ার্ক পারমিট</div>
        </div>

        <!-- PART 3 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৩: দেশভিত্তিক ওয়ার্ক পারমিট প্রসেস</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/10') }}">কানাডা ওয়ার্ক পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/11') }}">পোল্যান্ড ওয়ার্ক পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/12') }}">রোমানিয়া ওয়ার্ক পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/13') }}">ইউরোপ জোন ওয়ার্ক পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/14') }}">মালয়েশিয়া ও মিডল ইস্ট ওয়ার্ক পারমিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/15') }}">অন্যান্য ইউরোপিয়ান দেশের ওয়ার্ক পারমিট</div>
        </div>

        <!-- PART 4 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৪: চাকরি ও এমপ্লয়ার প্রসেস</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/16') }}">জব অফার লেটার কী</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/17') }}">এমপ্লয়ার যাচাই করার উপায়</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/18') }}">ভুয়া জব অফার চেনার কৌশল</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/19') }}">ওয়ার্ক অ্যাপ্রুভাল / এলএমআইএ</div>
        </div>

        <!-- PART 5 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৫: ডকুমেন্টেশন</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/20') }}">পাসপোর্ট ও ব্যক্তিগত কাগজপত্র</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/21') }}">মেডিকেল ও পুলিশ ক্লিয়ারেন্স</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/22') }}">শিক্ষাগত ও অভিজ্ঞতার প্রমাণ</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/23') }}">ব্যাংক স্টেটমেন্ট ও ফাইন্যান্স</div>
        </div>

        <!-- PART 6 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৬: Application প্রসেস</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/24') }}">Online Application ধাপ</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/25') }}">Embassy Submission</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/26') }}">Biometrics ও Interview</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/27') }}">Processing Time ও Tracking</div>
        </div>

        <!-- PART 7 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৭: Approval ও Travel</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/28') }}">Visa Approval পরবর্তী করণীয়</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/29') }}">Air Ticket ও Travel Planning</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/30') }}">Airport Immigration Process</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/31') }}">বিদেশে প্রথম কাজের দিন</div>
        </div>

        <!-- PART 8 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৮: Fraud ও Safety Guide</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/32') }}">Fake Agent চিনবেন যেভাবে</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/33') }}">Scam থেকে বাঁচার উপায়</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/34') }}">Legal Agreement ও Receipt</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/35') }}">Client Protection System</div>
        </div>

        <!-- PART 9 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৯: এজেন্সি বিজনেস সেটআপ</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/36') }}">ওয়ার্ক পারমিট এজেন্সি শুরু করবেন যেভাবে</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/37') }}">লাইসেন্স ও আইনি বিষয়</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/38') }}">অফিস ও অনলাইন সেটআপ</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/39') }}">সার্ভিস প্রাইসিং ও প্রফিট</div>
        </div>

        <!-- PART 10 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১০: ক্লায়েন্ট ও মার্কেটিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/40') }}">ক্লায়েন্ট হ্যান্ডলিং সিস্টেম</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/41') }}">হোয়াটসঅ্যাপ ও কল স্ক্রিপ্ট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/42') }}">বিশ্বাস তৈরি করার কৌশল</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/43') }}">ডিজিটাল মার্কেটিং বেসিক</div>
        </div>

        <!-- PART 11 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১১: অ্যাডভান্সড গাইড</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/44') }}">রিজেকশন কেস হ্যান্ডলিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/45') }}">রিফান্ড ও ডিসপিউট ম্যানেজমেন্ট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/46') }}">এজেন্সি রিস্ক ম্যানেজমেন্ট</div>
        </div>

        <!-- PART 12 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১২: বোনাস ও প্রো টিপস</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/47') }}">রেডি ক্লায়েন্ট চেকলিস্ট</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/48') }}">সাধারণ ভুল ও সমাধান</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/49') }}">আইনি নিরাপত্তা গাইড</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/50') }}">দীর্ঘমেয়াদি ক্যারিয়ার পরিকল্পনা</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/51') }}">ট্রিপ ডিজাইনার প্রো সিক্রেটস</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/52') }}">রিয়েল কেস স্টাডি</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/53') }}">FAQ ও কমন প্রশ্ন</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/54') }}">আপডেট ও নীতি পরিবর্তন</div>
            <div class="index-item" data-link="{{ url('/ebooks/work-permit/chapter/55') }}">ফাইনাল গাইডলাইন ও পরামর্শ</div>
        </div>

    </div>
</div>
@endsection
