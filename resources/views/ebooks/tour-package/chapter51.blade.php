@extends('ebooks.tour-package.layout.app')

@section('title','Common Mistakes ও Pro Tips | Tour Business Mastery')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">
        Common Mistakes ও Pro Tips  
        <span class="text-secondary">(Final Success Guide)</span>
    </h2>

    <p>
        এই অধ্যায়টি আপনার eBook-এর সবচেয়ে বাস্তব
        এবং সবচেয়ে গুরুত্বপূর্ণ অংশ।
        এখানে আমি এমন ভুলগুলো তুলে ধরেছি
        যেগুলো <b>৯০% নতুন ট্যুর এজেন্সি</b> করে থাকে—
        এবং সেগুলো এড়ানোর
        <b>Trip Designer tested pro tips</b>।
        আপনি যদি এই অধ্যায়টি সিরিয়াসলি follow করেন,
        তাহলে আপনার ট্যুর ব্যবসা
        অন্যদের থেকে একধাপ এগিয়ে থাকবে।
    </p>

    <div class="highlight-box">
        Avoiding Mistakes = Faster Growth
    </div>

    <!-- ================= MISTAKES ================= -->

    <h3 class="section-heading">১. সবচেয়ে কমন ভুলগুলো (Common Mistakes)</h3>

    <ul class="visa-list">
        <li>❌ খুব কম দামে প্যাকেজ অফার করা</li>
        <li>❌ Written quotation না দেওয়া</li>
        <li>❌ Policy clear না রাখা</li>
        <li>❌ Supplier যাচাই না করে বুকিং</li>
        <li>❌ Client expectation ঠিক না করা</li>
        <li>❌ Advance না নিয়ে কাজ শুরু</li>
        <li>❌ Documentation half-done রাখা</li>
    </ul>

    <div class="info-box">
        এই ভুলগুলো শুরুতে ছোট মনে হলেও  
        পরে বড় ক্ষতির কারণ হয়।
    </div>

    <!-- ================= PRICING ================= -->

    <h3 class="section-heading">২. Pricing সংক্রান্ত ভুল</h3>
    <ul class="visa-list">
        <li>❌ Competitor দেখে blindly দাম কমানো</li>
        <li>❌ নিজের cost calculation না জানা</li>
        <li>❌ Hidden cost ignore করা</li>
    </ul>

    <div class="highlight-box">
        Low price নয়,  
        right price আপনাকে বাঁচায়।
    </div>

    <!-- ================= CLIENT HANDLING ================= -->

    <h3 class="section-heading">৩. Client Handling-এর ভুল</h3>
    <ul class="visa-list">
        <li>❌ Verbal promise বেশি দেওয়া</li>
        <li>❌ Written confirmation না দেওয়া</li>
        <li>❌ Follow-up না করা</li>
        <li>❌ Problem হলে late response</li>
    </ul>

    <div class="info-box">
        Client management দুর্বল হলে  
        marketing কোনো কাজে আসে না।
    </div>

    <!-- ================= PRO TIPS ================= -->

    <h3 class="section-heading">৪. Pro Tips (Trip Designer Formula)</h3>

    <ul class="visa-list">
        <li>✔ Always written communication</li>
        <li>✔ Clear itinerary + checklist</li>
        <li>✔ Supplier backup list রাখুন</li>
        <li>✔ Client education first, sale later</li>
        <li>✔ Payment policy upfront explain</li>
        <li>✔ After-tour follow-up বাধ্যতামূলক</li>
    </ul>

    <div class="highlight-box">
        Professional system থাকলে  
        stress কমে, profit বাড়ে।
    </div>

    <!-- ================= GROWTH ================= -->

    <h3 class="section-heading">৫. Business Growth Pro Advice</h3>
    <ul class="visa-list">
        <li>✔ Niche market select করুন</li>
        <li>✔ Repeat client system বানান</li>
        <li>✔ Review & testimonial collect করুন</li>
        <li>✔ Digital presence শক্ত করুন</li>
        <li>✔ Slow but steady grow করুন</li>
    </ul>

    <div class="info-box">
        Tour business sprint না,  
        এটি marathon।
    </div>

    <!-- ================= MINDSET ================= -->

    <h3 class="section-heading">৬. Successful Tour Entrepreneur Mindset</h3>
    <ul class="visa-list">
        <li>✔ Trust > Profit (long term)</li>
        <li>✔ System > Shortcut</li>
        <li>✔ Learning > Ego</li>
        <li>✔ Consistency > Motivation</li>
    </ul>

    <div class="highlight-box">
        Mindset ঠিক থাকলে  
        business নিজেই grow করে।
    </div>

    <!-- ================= FINAL WORD ================= -->

    <h3 class="section-heading">৭. Final Words</h3>
    <div class="info-box">
        আপনি যদি এই eBook-এর প্রতিটি chapter
        বাস্তবে apply করেন,
        তাহলে আলাদা কোনো “secret” লাগবে না।
        Tour business সফল হয়
        <b>planning, honesty ও execution</b> দিয়ে।
    </div>

    <div class="highlight-box">
        Tour Package Mastery  
        starts with discipline & ethics।
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/tour-package/chapter/50') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/tour-package/') }}" class="btn btn-primary">সমাপ্ত ✔</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection