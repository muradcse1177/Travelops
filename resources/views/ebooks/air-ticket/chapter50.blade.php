@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 50 – Domestic Case Study')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Domestic Case Study
                <small class="text-muted">Practical Case Study – Chapter 50</small>
            </h2>

            <p>
                এই অধ্যায়ে একটি
                <b>Bangladesh Domestic Ticketing</b> real-life case study দেওয়া হয়েছে, যেখানে search থেকে ticket issue পর্যন্ত পুরো workflow দেখানো হয়েছে।
            </p>

            <div class="highlight-box">
                ⚠️ Domestic booking-এ ভুল হলে instant loss হয়, কারণ refund policy strict।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Case Scenario</h3>

            <ul class="visa-list">
                <li>✔ Route: DAC – CXB – DAC</li>
                <li>✔ Passenger: Adult (1)</li>
                <li>✔ Airline: BG (Biman Bangladesh)</li>
                <li>✔ Travel Date: 15 AUG</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Availability Search</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
A15AUGDACCXB
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
BG 435 Y 15AUG DACCXB 0900 1005
SEATS AVAILABLE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Flight available ✔ Economy class open
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Segment Sell</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
N1Y1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SEGMENT CONFIRMED
STATUS: HK1
    </pre>
            </div>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Passenger Name Entry</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
N.P1/RAHIM KARIM
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
PASSENGER ADDED
PNR UPDATED
    </pre>
            </div>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Contact & Ticketing Time Limit</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.P1/CTCM8801712345678
TKTL/15AUG/1800
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
CONTACT SAVED
TICKETING TIME LIMIT SET
    </pre>
            </div>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Pricing</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE: BDT 4500
TAX:  BDT 1500
TOTAL: BDT 6000
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Auto pricing successful ✔ Fare verified
            </p>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Ticket Issue</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
TTP
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
E-TICKET ISSUED
TICKET NO: 997-1234567890
    </pre>
            </div>

            <div class="highlight-box">
                ✔ Domestic ticket successfully issued
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Domestic case study বোঝা মানে agent-এর foundation strong হওয়া।
                        <b>Trip Designer</b> শেখায় real Bangladesh domestic workflow, pricing logic এবং instant ticketing practice।
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

            <!-- ================= SECTION 8 ================= -->
            <h3 class="section-heading">8. Agent Learning Outcome</h3>

            <ul class="visa-list">
                <li>✔ Domestic workflow clarity</li>
                <li>✔ Speed + accuracy balance</li>
                <li>✔ Zero-error ticketing practice</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/49') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/51') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection