<div id="sidebar">

    <h3>Air Ticketing GDS Master eBook</h3>

    <!-- Search -->
    <input type="text"
           id="searchInput"
           onkeyup="searchBook()"
           class="form-control mb-3"
           placeholder="Search...">

    <!-- ================================
         INDEX
    ================================== -->
    <div class="menu-item">
        <a class="parent" href="{{ url('/ebooks/air-ticket') }}">➤ সূচিপত্র</a>
    </div>

    <!-- ================================
         PART 1
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Air Ticketing Fundamentals</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/1') }}">Air Ticketing Overview</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/2') }}">Airline Industry Structure</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/3') }}">IATA, BSP & ARC System</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/4') }}">Travel Agency Workflow</a>
        </div>
    </div>

    <!-- ================================
         PART 2
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ GDS Core Concepts (Same for All)</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/5') }}">What is GDS & How It Works</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/6') }}">Galileo vs Sabre vs Amadeus</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/7') }}">GDS Login, Terminal & Sign-in</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/8') }}">Cryptic Command Structure</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/9') }}">Work Area, Queue & Sign-in</a>
        </div>
    </div>

    <!-- ================================
         PART 3
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Flight Availability & Schedule</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/10') }}">One Way / Return Search</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/11') }}">Class of Service (RBD)</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/12') }}">Connecting vs Direct Flight</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/13') }}">Schedule Change Handling</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/14') }}">Waitlist & Overbooking</a>
        </div>
    </div>

    <!-- ================================
         PART 4
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Fare & Pricing System</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/15') }}">Fare Display & Fare Basis</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/16') }}">Auto & Manual Pricing</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/17') }}">Fare Rules & Penalty</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/18') }}">Tax & Currency Conversion</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/19') }}">Low Fare Search Tricks</a>
        </div>
    </div>

    <!-- ================================
         PART 5
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ PNR Creation (Same Workflow)</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/20') }}">Passenger Name & Contact</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/21') }}">Itinerary Build</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/22') }}">Ticket Time Limit (TTL)</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/23') }}">SSR & OSI</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/24') }}">Seat, Meal & Special Request</a>
        </div>
    </div>

    <!-- ================================
         PART 6
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Ticketing Operations</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/25') }}">E-Ticket Issue</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/26') }}">Void Ticket</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/27') }}">Reissue / Exchange</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/28') }}">Partial & Full Refund</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/29') }}">Involuntary Change (IRROP)</a>
        </div>
    </div>

    <!-- ================================
         PART 7
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Advanced Ticketing (Expert)</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/30') }}">Multi-City & Open Jaw</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/31') }}">Group Booking</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/32') }}">Infant / Child / Student Fare</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/33') }}">Corporate & Tour Code Fare</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/34') }}">EMD & Ancillary Services</a>
        </div>
    </div>

    <!-- ================================
         PART 8
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Fare Construction & Audit</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/35') }}">Fare Construction Line</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/36') }}">Mileage (TPM / MPM / HIP)</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/37') }}">ADM & ACM Handling</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/38') }}">Ticket Error & Name Correction</a>
        </div>
    </div>

    <!-- ================================
         PART 9
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Special Passenger Handling</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/39') }}">UMNR (Unaccompanied Minor)</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/40') }}">Medical Passenger (MEDA)</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/41') }}">Wheelchair & SSR Codes</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/42') }}">VIP / Deportee Handling</a>
        </div>
    </div>

    <!-- ================================
         PART 10
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Queue & Back Office</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/43') }}">Queue Management</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/44') }}">Schedule Change Queue</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/45') }}">BSP Sales & Report</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/46') }}">Fraud & Risk Prevention</a>
        </div>
    </div>

    <!-- ================================
         PART 11
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Automation & Modern System</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/47') }}">GDS + NDC Concept</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/48') }}">Airline Direct Connect</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/49') }}">Automation & Speed Booking</a>
        </div>
    </div>

    <!-- ================================
         PART 12
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Practical Case Study</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/50') }}">Domestic Case Study</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/51') }}">International Case Study</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/52') }}">Reissue & Refund Case</a>
        </div>
    </div>

    <!-- ================================
         PART 13
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Travel Agency Business</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/53') }}">Agency Setup & GDS Access</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/54') }}">Profit & Markup Strategy</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/55') }}">Client Handling</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/56') }}">Interview & Job Preparation</a>
        </div>
    </div>

    <!-- ================================
         PART 14
    ================================== -->
    <div class="menu-item">
        <a class="parent">➤ Bonus Tools & Pro Tips</a>
        <div class="child">
            <a href="{{ url('/ebooks/air-ticket/chapter/57') }}">GDS Command Cheat Sheet</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/58') }}">Common Agent Mistakes</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/59') }}">Speed Booking Tips</a>
            <a href="{{ url('/ebooks/air-ticket/chapter/60') }}">Career Roadmap</a>
        </div>
    </div>

</div>
