@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 3 - IATA, BSP & ARC System')

@section('content')
<div class="chapter-box">

    <h2 class="chapter-title">IATA, BSP & ARC System</h2>

    <p>
        একজন <b>Professional Air Ticketing Agent</b> হতে হলে  
        শুধু GDS জানলেই হবে না —  
        <b>IATA, BSP ও ARC System</b> কীভাবে কাজ করে তা পরিষ্কারভাবে জানা জরুরি।
    </p>

    <div class="highlight-box">
        ⚠️ IATA/BSP না বুঝে ticket issue করলে agency বড় financial loss-এ পড়তে পারে।
    </div>

    <!-- ================================================= -->
    <!-- SECTION 1 -->
    <!-- ================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">1.</span> IATA কী?
    </h3>

    <p>
        <b>IATA (International Air Transport Association)</b>  
        হলো বিশ্বব্যাপী এয়ারলাইন ইন্ডাস্ট্রির নিয়ন্ত্রক সংস্থা।
    </p>

    <ul class="visa-list">
        <li>✔ Airline rules & standards নির্ধারণ করে</li>
        <li>✔ Travel agency accreditation দেয়</li>
        <li>✔ Ticketing & fare policy regulate করে</li>
        <li>✔ Passenger protection নিশ্চিত করে</li>
    </ul>

    <div class="info-box">
        IATA ছাড়া কোনো agency legally international ticket issue করতে পারে না।
    </div>

    <!-- ================================================= -->
    <!-- SECTION 2 -->
    <!-- ================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">2.</span> IATA Accredited Travel Agency
    </h3>

    <p>
        IATA-accredited agency মানে—  
        agency সরাসরি airline-এর ticket issue করতে পারবে  
        এবং BSP-এর মাধ্যমে payment settlement করবে।
    </p>

    <ul class="visa-list">
        <li>✔ IATA Numeric Code থাকে</li>
        <li>✔ BSP access থাকে</li>
        <li>✔ Airline commission eligibility</li>
        <li>✔ Global credibility</li>
    </ul>

    <!-- ================================================= -->
    <!-- SECTION 3 -->
    <!-- ================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">3.</span> BSP (Billing & Settlement Plan)
    </h3>

    <p>
        <b>BSP</b> হলো IATA পরিচালিত একটি financial system  
        যার মাধ্যমে agency ও airline-এর মধ্যে ticket payment settle হয়।
    </p>

    <div class="gds-code-wrapper">
        <div class="gds-code-title">BSP Workflow (Simplified)</div>
        <pre class="gds-code">
Passenger → Travel Agency → BSP → Airline
        </pre>
    </div>

    <ul class="visa-list">
        <li>✔ Weekly / Bi-weekly settlement</li>
        <li>✔ All airline ticket report এক জায়গায়</li>
        <li>✔ BSP Link portal ব্যবহার করা হয়</li>
    </ul>

    <div class="highlight-box">
        ⚠️ BSP deadline miss করলে agency default status পেতে পারে।
    </div>

    <!-- ================================================= -->
    <!-- SECTION 4 -->
    <!-- ================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">4.</span> ARC (Airlines Reporting Corporation)
    </h3>

    <p>
        <b>ARC</b> মূলত USA market-এর জন্য  
        BSP-এর মতোই একটি settlement system।
    </p>

    <table class="table table-bordered summary-table">
        <thead class="table-primary">
            <tr>
                <th>System</th>
                <th>Region</th>
                <th>Used For</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>BSP</td>
                <td>Worldwide (Except USA)</td>
                <td>Air ticket settlement</td>
            </tr>
            <tr>
                <td>ARC</td>
                <td>USA</td>
                <td>Air ticket settlement</td>
            </tr>
        </tbody>
    </table>

    <!-- ================================================= -->
    <!-- SECTION 5 -->
    <!-- ================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">5.</span> BSP & ARC Report কেন গুরুত্বপূর্ণ?
    </h3>

    <ul class="visa-list">
        <li>✔ Ticket sales tracking</li>
        <li>✔ Refund & void monitoring</li>
        <li>✔ ADM / ACM issue handling</li>
        <li>✔ Agency profit calculation</li>
    </ul>

    <div class="info-box">
        Professional agent প্রতিদিন BSP/ARC report check করে।
    </div>

    <!-- ================================================= -->
    <!-- SECTION 6 -->
    <!-- ================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">6.</span> Common Mistake (Beginner Alert)
    </h3>

    <ul class="visa-list">
        <li>❌ BSP deadline ignore করা</li>
        <li>❌ ADM notice না দেখা</li>
        <li>❌ Refund report verify না করা</li>
        <li>❌ Commission assumption করে ticket issue করা</li>
    </ul>

    <!-- ================================================= -->
    <!-- SECTION 7 -->
    <!-- ================================================= -->
    <h3 class="section-heading">
        <span class="sec-num">7.</span> Professional Agent Tips
    </h3>

    <ul class="visa-list">
        <li>✔ BSP Link access নিয়মিত check করুন</li>
        <li>✔ ADM/ACM আলাদা log রাখুন</li>
        <li>✔ Settlement date calendar mark করুন</li>
        <li>✔ Airline-specific rules follow করুন</li>
    </ul>

    <!-- SUPPORT CARD -->
    <div class="td-card">
        <div class="td-card-body">
            <p class="td-text">
                IATA, BSP ও ARC System নিয়ে  
                বাস্তব অভিজ্ঞতা ও professional training-এর জন্য  
                <b>Trip Designer</b> আপনার নির্ভরযোগ্য পার্টনার।
            </p>
        </div>

        <div class="td-card-footer">
            <div class="td-contact-box">
                <span class="cta-icon">📞</span>
                <div>
                    <div class="cta-label">WhatsApp</div>
                    <a href="https://wa.me/8801316444399" target="_blank">
                        +8801316444399
                    </a>
                </div>
            </div>

            <div class="td-contact-box">
                <span class="cta-icon">📘</span>
                <div>
                    <div class="cta-label">Messenger</div>
                    <a href="https://m.me/tripdesigner.xyz" target="_blank">
                        m.me/tripdesigner.xyz
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- NAV -->
    <div class="nav-buttons">
        <a href="{{ url('/ebooks/air-ticket/chapter/2') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
        <a href="{{ url('/ebooks/air-ticket/chapter/4') }}" class="btn btn-primary">পরবর্তী ➡</a>
    </div>

</div>

<!-- FOOTER -->
<div id="footer"></div>
@endsection