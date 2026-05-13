@extends('ebooks.visa-course.layout.app')

@section('title','Dubai / Middle East Visa (Tourist, Visit, Work)')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">Dubai / Middle East Visa (Tourist, Visit, Work)</h2>

    <p>
        Dubai ও Middle East (UAE, Saudi Arabia, Qatar, Kuwait, Oman, Bahrain)
        বাংলাদেশের জন্য অত্যন্ত জনপ্রিয় ভিসা ডেস্টিনেশন, বিশেষ করে
        <b>Tourist</b> এবং <b>Work Visa</b>–এর ক্ষেত্রে।
        এই চ্যাপ্টারে Middle East ভিসার সম্পূর্ণ প্রক্রিয়া সহজভাবে ব্যাখ্যা করা হয়েছে।
    </p>

    <div class="highlight-box">
        Middle East ভিসার ক্ষেত্রে Sponsor, Employer Approval
        এবং Medical Clearance অত্যন্ত গুরুত্বপূর্ণ।
    </div>

    <!-- VISA TYPES -->
    <h3 class="section-heading">Dubai / Middle East ভিসার ধরন</h3>
    <ul class="visa-list">
        <li>Tourist Visa (30 / 60 Days)</li>
        <li>Visit Visa (Family / Relative)</li>
        <li>Employment / Work Visa</li>
        <li>Transit Visa</li>
    </ul>

    <!-- JOB HOLDER -->
    <h3 class="section-heading">ভিসার জন্য প্রয়োজনীয় ডকুমেন্ট (Job Holder)</h3>
    <ul class="visa-list">
        <li>Valid Passport (কমপক্ষে ৬ মাস ভ্যালিড)</li>
        <li>Visa Application Form</li>
        <li>Passport Size Photo</li>
        <li>Employment Contract / Offer Letter</li>
        <li>Company Approval / Labour Contract</li>
        <li>Police Clearance Certificate (PCC)</li>
        <li>Medical Fitness Report</li>
    </ul>

    <div class="info-box">
        Work Visa–তে Medical ও PCC ছাড়া ভিসা প্রসেস সম্পন্ন হয় না।
    </div>

    <!-- BUSINESSMAN -->
    <h3 class="section-heading">ভিসার জন্য প্রয়োজনীয় ডকুমেন্ট (Businessman)</h3>
    <ul class="visa-list">
        <li>Valid Passport</li>
        <li>Visa Application</li>
        <li>Invitation Letter (Company / Partner)</li>
        <li>Trade License / Business Profile</li>
        <li>Return Air Ticket</li>
        <li>Hotel Booking</li>
    </ul>

    <!-- TOURIST / VISIT -->
    <h3 class="section-heading">ভিসার জন্য প্রয়োজনীয় ডকুমেন্ট (Tourist / Visit)</h3>
    <ul class="visa-list">
        <li>Valid Passport</li>
        <li>Passport Size Photo</li>
        <li>Hotel Booking / Sponsor ID</li>
        <li>Return Air Ticket</li>
        <li>Bank Statement (যদি প্রয়োজন হয়)</li>
    </ul>

    <div class="highlight-box">
        Tourist Visa সাধারণত Sponsor বা Travel Agency এর মাধ্যমে প্রসেস করা হয়।
    </div>

    <!-- PRICE -->
    <h3 class="section-heading">Dubai / Middle East ভিসা ফি ও খরচের বিবরণ</h3>
    <ul class="visa-list">
        <li>Tourist Visa: AED 350 – 900 (Duration অনুযায়ী)</li>
        <li>Visit Visa: Country অনুযায়ী</li>
        <li>Work Visa: Employer Sponsored</li>
        <li>Medical & PCC Cost: Extra</li>
    </ul>

    <div class="info-box">
        Middle East ভিসা ফি Country ও Visa Type অনুযায়ী পরিবর্তিত হয়।
    </div>

    <!-- EMBASSY -->
    <h3 class="section-heading">Dubai / Middle East Embassy & Authority Information</h3>
    <ul class="visa-list">
        <li>Authority: GDRFA / MOHRE / Concerned Country Immigration</li>
        <li>Submission Method: Online / Sponsor Based</li>
        <li>Processing Time: 3–15 Working Days</li>
    </ul>

    <!-- WEBSITE (GOOD DESIGN) -->
    <h3 class="section-heading">ভিসা আবেদন ও স্ট্যাটাস চেক করার অফিসিয়াল ওয়েবসাইট</h3>

    <div class="study-card">
        <div class="study-country-list">

            <div class="country-tag">
                📝 UAE Visa Application<br>
                <a href="https://www.gdrfad.gov.ae" target="_blank">
                    gdrfad.gov.ae
                </a>
            </div>

            <div class="country-tag">
                🏢 Saudi / Gulf Visa Info<br>
                <a href="https://visa.mofa.gov.sa" target="_blank">
                    visa.mofa.gov.sa
                </a>
            </div>

            <div class="country-tag">
                🔍 UAE Visa Status Check<br>
                <a href="https://smartservices.icp.gov.ae" target="_blank">
                    ICP Smart Services
                </a>
            </div>

        </div>
    </div>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                Dubai ও Middle East ভিসার জন্য Sponsor Arrangement,
                Medical Booking, PCC Guidance এবং Complete Processing–এর ক্ষেত্রে
                <b>Trip Designer</b> নির্ভরযোগ্য প্রফেশনাল সাপোর্ট প্রদান করে।
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

    <!-- NAVIGATION -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/visa-course/chapter/41') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/visa-course/chapter/43') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<div id="footer"></div>
@endsection