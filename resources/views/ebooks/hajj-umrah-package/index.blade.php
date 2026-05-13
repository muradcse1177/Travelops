@extends('ebooks.hajj-umrah-package.layout.app')

@section('title','Hajj & Umrah Mastering Secrets | সূচিপত্র')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">🕋 সূচিপত্র (Index)</h2>
    <p class="text-secondary mb-4">
        এই ই-বুকটি ধাপে ধাপে সাজানো হয়েছে।
        যেকোন অধ্যায়ে যেতে ক্লিক করুন।
    </p>

    <div class="index-wrapper">

        <!-- PART 1 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১: হজ্জ ও উমরাহ বেসিক</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/1') }}">হজ্জ ও উমরাহ কী এবং কেন গুরুত্বপূর্ণ</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/2') }}">হজ্জ বনাম উমরাহ: পার্থক্য ও নিয়ম</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/3') }}">ফরজ, ওয়াজিব ও সুন্নাহ আমল</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/4') }}">হজ্জ ও উমরাহর ফজিলত ও নিয়ত</div>
        </div>

        <!-- PART 2 -->
        <div class="index-section">
            <div class="index-title">পার্ট ২: হজ্জ ও উমরাহ প্যাকেজ প্ল্যানিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/5') }}">Trip Designer হিসেবে আপনার ভূমিকা</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/6') }}">হজ্জ ও উমরাহ প্যাকেজের ধরন</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/7') }}">বাজেট, স্ট্যান্ডার্ড ও VIP প্যাকেজ</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/8') }}">গ্রুপ বনাম প্রাইভেট প্যাকেজ</div>
        </div>

        <!-- PART 3 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৩: ভিসা ও ডকুমেন্টেশন</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/9') }}">হজ্জ ও উমরাহ ভিসা প্রসেস</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/10') }}">পাসপোর্ট, ছবি ও প্রয়োজনীয় কাগজপত্র</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/11') }}">মিনিস্ট্রি ও সৌদি সিস্টেম ওভারভিউ</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/12') }}">ভিসা রিজেকশন এড়ানোর কৌশল</div>
        </div>

        <!-- PART 4 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৪: টিকেট, হোটেল ও ট্রান্সপোর্ট</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/13') }}">এয়ার টিকেট বুকিং স্ট্র্যাটেজি</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/14') }}">মক্কা ও মদিনার হোটেল নির্বাচন</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/15') }}">হারাম শরীফের দূরত্ব ও ক্যাটাগরি</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/16') }}">বাস ও লোকাল ট্রান্সপোর্ট ম্যানেজমেন্ট</div>
        </div>

        <!-- PART 5 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৫: ইহরাম ও আমল গাইড</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/17') }}">ইহরাম বাঁধার নিয়ম</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/18') }}">উমরাহ ধাপে ধাপে সম্পন্ন করার পদ্ধতি</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/19') }}">হজ্জের দিনভিত্তিক আমল</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/20') }}">সাধারণ ভুল ও সমাধান</div>
        </div>

        <!-- PART 6 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৬: গ্রুপ ম্যানেজমেন্ট</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/21') }}">হাজী ও মু’তামির হ্যান্ডলিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/22') }}">বয়স্ক ও অসুস্থ হাজী ব্যবস্থাপনা</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/23') }}">গ্রুপ লিডার ও গাইড সিস্টেম</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/24') }}">ইমার্জেন্সি সমস্যা সমাধান</div>
        </div>

        <!-- PART 7 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৭: প্রাইসিং ও প্রফিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/25') }}">হজ্জ ও উমরাহ প্যাকেজ প্রাইসিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/26') }}">কমিশন ও মার্জিন ক্যালকুলেশন</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/27') }}">Hidden Cost এড়ানোর উপায়</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/28') }}">Advance ও Refund Policy</div>
        </div>

        <!-- PART 8 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৮: মার্কেটিং ও সেলস</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/29') }}">হজ্জ ও উমরাহ কাস্টমার সাইকোলজি</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/30') }}">Facebook ও WhatsApp Marketing</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/31') }}">বিশ্বাস তৈরি করার কৌশল</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/32') }}">কাস্টমার ক্লোজিং টেকনিক</div>
        </div>

        <!-- PART 9 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৯: ট্যুর চলাকালীন অপারেশন</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/33') }}">Pre-Departure Orientation</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/34') }}">সৌদিতে Arrival & Check-in</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/35') }}">ট্যুর চলাকালীন সমস্যা ম্যানেজমেন্ট</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/36') }}">Post Hajj / Umrah Follow-up</div>
        </div>

        <!-- PART 10 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১০: বোনাস ও প্রো টিপস</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/37') }}">Ready Hajj & Umrah Package Template</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/38') }}">Client Checklist</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/39') }}">Common Mistakes & Solutions</div>
            <div class="index-item" data-link="{{ url('/ebooks/hajj-umrah-package/chapter/40') }}">Trip Designer Pro Secrets</div>
        </div>

    </div>

</div>
@endsection
