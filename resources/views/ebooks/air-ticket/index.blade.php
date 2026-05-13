@extends('ebooks.air-ticket.layout.app')
@section('title','Air Ticketing GDS Master | সূচিপত্র')
@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">✈️ সূচিপত্র (Index)</h2>
    <p class="text-secondary mb-4">
        Air Ticketing GDS Master eBook ধাপে ধাপে সাজানো হয়েছে।
        যেকোন অধ্যায়ে যেতে ক্লিক করুন।
    </p>

    <div class="index-wrapper">

        <!-- ================= PART 1 ================= -->
        <div class="index-section">
            <div class="index-title">PART 1: Air Ticketing Fundamentals</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/1') }}">Air Ticketing Overview</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/2') }}">Airline Industry Structure</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/3') }}">IATA, BSP & ARC System</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/4') }}">Travel Agency Workflow</div>
        </div>

        <!-- ================= PART 2 ================= -->
        <div class="index-section">
            <div class="index-title">PART 2: GDS Core Concepts</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/5') }}">What is GDS & How It Works</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/6') }}">Galileo vs Sabre vs Amadeus</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/7') }}">GDS Login, Terminal & Sign-in</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/8') }}">Cryptic Command Structure</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/9') }}">Work Area & Queue System</div>
        </div>

        <!-- ================= PART 3 ================= -->
        <div class="index-section">
            <div class="index-title">PART 3: Flight Availability & Schedule</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/10') }}">One Way / Return Search</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/11') }}">Class of Service (RBD)</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/12') }}">Connecting vs Direct Flight</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/13') }}">Schedule Change Handling</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/14') }}">Waitlist & Overbooking</div>
        </div>

        <!-- ================= PART 4 ================= -->
        <div class="index-section">
            <div class="index-title">PART 4: Fare & Pricing System</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/15') }}">Fare Display & Fare Basis</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/16') }}">Auto & Manual Pricing</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/17') }}">Fare Rules & Penalty</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/18') }}">Tax & Currency Conversion</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/19') }}">Low Fare Search Tricks</div>
        </div>

        <!-- ================= PART 5 ================= -->
        <div class="index-section">
            <div class="index-title">PART 5: PNR Creation</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/20') }}">Passenger Name & Contact</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/21') }}">Itinerary Build</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/22') }}">Ticket Time Limit (TTL)</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/23') }}">SSR & OSI</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/24') }}">Seat, Meal & Special Request</div>
        </div>

        <!-- ================= PART 6 ================= -->
        <div class="index-section">
            <div class="index-title">PART 6: Ticketing Operations</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/25') }}">E-Ticket Issue</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/26') }}">Void Ticket</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/27') }}">Reissue / Exchange</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/28') }}">Partial & Full Refund</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/29') }}">Involuntary Change (IRROP)</div>
        </div>

        <!-- ================= PART 7 ================= -->
        <div class="index-section">
            <div class="index-title">PART 7: Advanced Ticketing</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/30') }}">Multi-City & Open Jaw</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/31') }}">Group Booking</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/32') }}">Infant / Child / Student Fare</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/33') }}">Corporate & Tour Code Fare</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/34') }}">EMD & Ancillary Services</div>
        </div>

        <!-- ================= PART 8 ================= -->
        <div class="index-section">
            <div class="index-title">PART 8: Fare Construction & Audit</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/35') }}">Fare Construction Line</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/36') }}">Mileage (TPM / MPM / HIP)</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/37') }}">ADM & ACM Handling</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/38') }}">Ticket Error & Name Correction</div>
        </div>

        <!-- ================= PART 9 ================= -->
        <div class="index-section">
            <div class="index-title">PART 9: Special Passenger Handling</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/39') }}">UMNR (Unaccompanied Minor)</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/40') }}">Medical Passenger (MEDA)</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/41') }}">Wheelchair & SSR Codes</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/42') }}">VIP / Deportee Handling</div>
        </div>

        <!-- ================= PART 10 ================= -->
        <div class="index-section">
            <div class="index-title">PART 10: Queue & Back Office</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/43') }}">Queue Management</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/44') }}">Schedule Change Queue</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/45') }}">BSP Sales & Report</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/46') }}">Fraud & Risk Prevention</div>
        </div>

        <!-- ================= PART 11 ================= -->
        <div class="index-section">
            <div class="index-title">PART 11: Automation & Modern System</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/47') }}">GDS + NDC Concept</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/48') }}">Airline Direct Connect</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/49') }}">Automation & Speed Booking</div>
        </div>

        <!-- ================= PART 12 ================= -->
        <div class="index-section">
            <div class="index-title">PART 12: Practical Case Study</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/50') }}">Domestic Case Study</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/51') }}">International Case Study</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/52') }}">Reissue & Refund Case</div>
        </div>

        <!-- ================= PART 13 ================= -->
        <div class="index-section">
            <div class="index-title">PART 13: Travel Agency Business</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/53') }}">Agency Setup & GDS Access</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/54') }}">Profit & Markup Strategy</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/55') }}">Client Handling</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/56') }}">Interview & Job Preparation</div>
        </div>

        <!-- ================= PART 14 ================= -->
        <div class="index-section">
            <div class="index-title">PART 14: Bonus Tools & Pro Tips</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/57') }}">GDS Command Cheat Sheet</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/58') }}">Common Agent Mistakes</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/59') }}">Speed Booking Tips</div>
            <div class="index-item" data-link="{{ url('/ebooks/air-ticket/chapter/60') }}">Career Roadmap</div>
        </div>

    </div>
</div>
@endsection
