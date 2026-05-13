@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 53 – Agency Setup & GDS Access')

@section('content')
<div class="chapter-box">

            <h2 class="chapter-title">
                Agency Setup & GDS Access
                <small class="text-muted">Travel Agency Business – Chapter 53</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন একটি <b>Travel Agency</b> শুরু করতে কী কী দরকার,
                <b>GDS access</b> কীভাবে পাওয়া যায় এবং agency setup complete হলে system-level outcome কী হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Proper agency setup ছাড়া GDS access পাওয়া সম্ভব না।
            </div>

            <!-- ================= SECTION 1 ================= -->
            <h3 class="section-heading">1. Travel Agency Setup Basics</h3>

            <ul class="visa-list">
                <li>✔ Trade License</li>
                <li>✔ Bank Account (Business)</li>
                <li>✔ Office Address & Contact</li>
                <li>✔ Skilled Ticketing Staff</li>
            </ul>

            <p class="text-secondary">
                ✔ এগুলো ছাড়া airline বা GDS application approve হয় না
            </p>

            <!-- ================= SECTION 2 ================= -->
            <h3 class="section-heading">2. IATA vs Non-IATA Agency</h3>

            <ul class="visa-list">
                <li>✔ IATA Agency – Direct airline ticket issue</li>
                <li>✔ Non-IATA – Consolidator / Host agency based</li>
            </ul>

            <div class="info-box">
                📌 Beginner agency-র জন্য Non-IATA setup বেশি practical।
            </div>

            <!-- ================= SECTION 3 ================= -->
            <h3 class="section-heading">3. GDS Application Process</h3>

            <ul class="visa-list">
                <li>✔ Office verification</li>
                <li>✔ Financial security check</li>
                <li>✔ Staff training verification</li>
            </ul>

            <div class="highlight-box">
                ⚠️ Fake document দিলে permanent rejection হতে পারে।
            </div>

            <!-- ================= SECTION 4 ================= -->
            <h3 class="section-heading">4. GDS Access Approval (System Result)</h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Approval Result</div>
                <pre class="gds-code">
AGENCY ID CREATED
OFFICE ID: DAC123
GDS ACCESS: ACTIVE
TRAINING MODE ENABLED
    </pre>
            </div>

            <p class="text-secondary">
                ✔ Agency successfully registered ✔ GDS access activated
            </p>

            <!-- ================= SECTION 5 ================= -->
            <h3 class="section-heading">5. Live vs Training GDS Access</h3>

            <ul class="visa-list">
                <li>✔ Training mode – practice only</li>
                <li>✔ Live mode – real ticket issue</li>
            </ul>

            <div class="info-box">
                📌 Training mode skip করলে costly mistake হতে পারে।
            </div>

            <!-- ================= SECTION 6 ================= -->
            <h3 class="section-heading">6. Common Beginner Mistakes</h3>

            <ul class="visa-list">
                <li>✔ Without knowledge GDS access নেওয়া</li>
                <li>✔ Fare rule না পড়ে ticket issue</li>
                <li>✔ Payment risk ignore করা</li>
            </ul>

            <!-- ================= TD CARD ================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Agency setup হলো travel business-এর foundation।
                        <b>Trip Designer</b> শেখায় step-by-step agency registration, GDS approval process এবং beginner-safe business setup strategy।
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

            <!-- ================= SECTION 7 ================= -->
            <h3 class="section-heading">7. Agent Learning Outcome</h3>

            <ul class="visa-list">
                <li>✔ Agency setup clarity</li>
                <li>✔ GDS access understanding</li>
                <li>✔ Safe business start roadmap</li>
            </ul>

            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/52') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/54') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection