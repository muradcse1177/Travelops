@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 51 – International Case Study')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                International Case Study
                <small class="text-muted">Practical Case Study – Chapter 51</small>
            </h2>

            <p>
                এই অধ্যায়ে একটি
                <b>International Flight Ticketing</b> real-life case study দেওয়া হয়েছে, যেখানে availability search থেকে ticket issue পর্যন্ত পুরো GDS workflow দেখানো হয়েছে।
            </p>

            <div class="highlight-box">
                ⚠️ International booking-এ fare rule ও transit requirement ভুল হলে big loss হয়।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Case Scenario</h3>

            <ul class="visa-list">
                <li>✔ Route: DAC – DXB – LHR</li>
                <li>✔ Passenger: Adult (1)</li>
                <li>✔ Airline: EK (Emirates)</li>
                <li>✔ Travel Date: 20 SEP</li>
            </ul>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. Availability Search</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
A20SEPDACDXB
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
EK 585 Y 20SEP DACDXB 1025 1345
SEATS AVAILABLE
    </pre>
            </div>

            <p class="text-secondary">
                ✔ First sector available
            </p>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. Connecting Flight Search</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
A20SEP DXBLHR
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
EK 001 Y 20SEP DXBLHR 1450 1935
CONNECTION VALID
    </pre>
            </div>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. Segment Sell</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
N1Y1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
SEGMENTS CONFIRMED
STATUS: HK1
    </pre>
            </div>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Passenger Name Entry</h3>

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

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Contact, TKTL & SSR</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
SI.P1/CTCM8801712345678
TKTL/18SEP/1800
SR VGML EK HK1
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
CONTACT SAVED
TICKETING TIME LIMIT SET
SSR CONFIRMED
    </pre>
            </div>

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Pricing</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQ
    </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">System Result</div>
                <pre class="gds-code">
FARE: USD 650
TAX:  USD 180
TOTAL: USD 830
    </pre>
            </div>

            <p class="text-secondary">
                ✔ International fare priced successfully
            </p>

            <!-- ================= SECTION 8 ================= -->
            <h3 class="section-heading">8. Ticket Issue</h3>

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
TICKET NO: 176-9876543210
    </pre>
            </div>

            <div class="highlight-box">
                ✔ International ticket issued successfully
            </div>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        International case study বোঝা মানে global ticketing workflow clear হওয়া।
                        <b>Trip Designer</b> শেখায় connection logic, fare rule application এবং airline-compliant ticket issue।
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

            <!-- ================= SECTION 9 ================= -->
            <h3 class="section-heading">9. Agent Learning Outcome</h3>

            <ul class="visa-list">
                <li>✔ International routing clarity</li>
                <li>✔ Fare & tax understanding</li>
                <li>✔ Error-free ticket issue practice</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/50') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/52') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection