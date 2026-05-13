@extends('ebooks.tour-package.layout.app')
@section('title','Tour Package Marketing Secret | সূচিপত্র')
@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">📘 সূচিপত্র (Index)</h2>
    <p class="text-secondary mb-4">
        এই ই-বুকটি sidebar অনুযায়ী সাজানো হয়েছে।
        যেকোন অধ্যায়ে যেতে ক্লিক করুন।
    </p>

    <div class="index-wrapper">

        <!-- PART 1 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১: ট্যুর প্যাকেজ বেসিকস</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/1') }}">ট্যুর প্যাকেজ কী ও কেন গুরুত্বপূর্ণ</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/2') }}">বাংলাদেশি ট্রাভেলার সাইকোলজি</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/3') }}">দেশীয় ও আন্তর্জাতিক ডেস্টিনেশন নির্বাচন</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/4') }}">ট্যুর প্যাকেজে কী কী অন্তর্ভুক্ত থাকে</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/5') }}">নিজে ট্রিপ প্ল্যান বনাম এজেন্সি</div>
        </div>

        <!-- PART 2 -->
        <div class="index-section">
            <div class="index-title">পার্ট ২: ট্যুর প্যাকেজ ডিজাইন</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/6') }}">Trip Designer Mindset</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/7') }}">পারফেক্ট Itinerary তৈরির ফর্মুলা</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/8') }}">হোটেল, ট্রান্সপোর্ট ও খাবার নির্বাচন</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/9') }}">Seasonal Package Design</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/10') }}">Couple, Family ও Group Package</div>
        </div>

        <!-- PART 3 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৩: প্রাইসিং ও প্রফিট</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/11') }}">ট্যুর প্যাকেজের দাম নির্ধারণ</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/12') }}">Low Price Trap এড়ানোর কৌশল</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/13') }}">কমিশন, মার্জিন ও Hidden Cost</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/14') }}">Advance, Cancellation ও Refund Policy</div>
        </div>

        <!-- PART 4 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৪: ট্যুর প্যাকেজ মার্কেটিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/15') }}">কাস্টমার কেন আপনার প্যাকেজ কিনবে</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/16') }}">Facebook Marketing Strategy</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/17') }}">Copywriting যা Inbox আনে</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/18') }}">Paid Ads ছাড়াই Lead Generation</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/19') }}">WhatsApp ও Messenger Funnel</div>
        </div>

        <!-- PART 5 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৫: Sales & Closing</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/20') }}">কাস্টমার হ্যান্ডলিং সাইকোলজি</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/21') }}">WhatsApp / Call Closing Technique</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/22') }}">দাম বেশি বললে আপত্তি সামলানো</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/23') }}">Invoice, Advance ও Confirmation</div>
        </div>

        <!-- PART 6 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৬: Trust & Brand</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/24') }}">Fake Agency ভিড়ে আলাদা হওয়া</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/25') }}">Review, Testimonial ও Social Proof</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/26') }}">অফিস, লাইসেন্স ও ট্রান্সপারেন্সি</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/27') }}">Repeat Customer System</div>
        </div>

        <!-- PART 7 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৭: ট্যুর অপারেশন</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/28') }}">Pre-Departure Checklist</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/29') }}">Visa, Ticket ও Hotel Coordination</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/30') }}">ট্যুর চলাকালীন সমস্যা হ্যান্ডলিং</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/31') }}">Post-Trip Follow-up</div>
        </div>

        <!-- PART 8 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৮: দেশভিত্তিক ট্যুর প্যাকেজ</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/32') }}">থাইল্যান্ড ট্যুর প্যাকেজ</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/33') }}">মালয়েশিয়া ও সিঙ্গাপুর ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/34') }}">দুবাই ও মিডল ইস্ট ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/35') }}">তুরস্ক ও ইউরোপ ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/36') }}">শ্রীলঙ্কা ও ভুটান ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/37') }}">ভারত ও নেপাল ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/38') }}">ভিয়েতনাম ও ফিলিপাইন ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/39') }}">ইন্দোনেশিয়া ও মালদ্বীপ ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/40') }}">জাপান ও চীন ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/41') }}">জর্ডান ও মিশর ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/42') }}">মঙ্গোলিয়া ও পাকিস্তান ট্যুর</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/43') }}">দেশীয় ট্যুর (কক্সবাজার, সাজেক, সুন্দরবন)</div>
        </div>

        <!-- PART 9 -->
        <div class="index-section">
            <div class="index-title">পার্ট ৯: ট্যুর ব্যবসা সেটআপ</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/44') }}">ট্যুর এজেন্সি শুরু করার ধাপ</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/45') }}">লাইসেন্স ও রেজিস্ট্রেশন</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/46') }}">Facebook Page ও WhatsApp Setup</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/47') }}">Supplier, DMC ও Partner Management</div>
        </div>

        <!-- PART 10 -->
        <div class="index-section">
            <div class="index-title">পার্ট ১০: বোনাস টুলস</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/48') }}">Ready Tour Package Template</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/49') }}">Editable Itinerary Format</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/50') }}">Client Checklist</div>
            <div class="index-item" data-link="{{ url('/ebooks/tour-package/chapter/51') }}">Common Mistakes ও Pro Tips</div>
        </div>

    </div>

</div>
@endsection
