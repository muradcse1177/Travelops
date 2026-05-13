@extends('ebooks.air-ticket.layout.app')

@section('title','Chapter 17 – Fare Rules & Penalty')

@section('content')
<div class="chapter-box">

            <!-- TITLE -->
            <h2 class="chapter-title">
                Fare Rules & Penalty
                <small class="text-muted">Galileo / Sabre / Amadeus – Practical Rule Reading</small>
            </h2>

            <p>
                এই অধ্যায়ে আপনি শিখবেন <b>Fare Rule</b> কী,
                <b>Penalty / Change / Refund</b> condition কীভাবে পড়তে হয় এবং ticket issue করার আগে কোন rules অবশ্যই check করতে হয়।
            </p>

            <div class="highlight-box">
                ⚠️ Fare rule না বুঝে ticket issue করলে refund/reissue সময় সবচেয়ে বেশি সমস্যা হয়।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 1 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">1.</span> Fare Rule কী?
            </h3>

            <p>
                <b>Fare Rule</b> হলো airline-defined condition যেটা বলে দেয় ticket-এর <b>change, refund, cancellation, penalty</b> কীভাবে apply হবে।
            </p>

            <p class="text-secondary">
                Fare rule সাধারণত ভাগ করা হয়:
                <br>• Change Rule
                <br>• Refund Rule
                <br>• No-show Rule
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 2 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">2.</span> Galileo – Fare Rule Display
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQN1
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Rule Result</div>
                <pre class="gds-code">
CHANGES
ANY TIME CHANGES PERMITTED
CHARGE USD 100

CANCELLATIONS
BEFORE DEPARTURE REFUND PERMITTED
CHARGE USD 150
        </pre>
            </div>

            <p class="text-secondary">
                • Change fee = USD 100
                <br>• Refund allowed before departure with penalty
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 3 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">3.</span> Sabre – Fare Rule Display
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
RD1
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Rule Result</div>
                <pre class="gds-code">
PENALTIES
CHANGE ANY TIME
FEE USD100

REFUND
BEFORE DEPARTURE PERMITTED
FEE USD150
        </pre>
            </div>

            <p class="text-secondary">
                Sabre-এ <b>PENALTIES</b> section সবচেয়ে গুরুত্বপূর্ণ।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 4 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">4.</span> Amadeus – Fare Rule Display
            </h3>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Command</div>
                <pre class="gds-code">
FQN1*PE
        </pre>
            </div>

            <div class="gds-code-wrapper">
                <div class="gds-code-title">Rule Result</div>
                <pre class="gds-code">
PENALTIES
CHANGES PERMITTED
FEE USD100

REFUND
PERMITTED BEFORE DEPARTURE
CHARGE USD150
        </pre>
            </div>

            <p class="text-secondary">
                Amadeus-এ rule section আলাদা করে দেখা যায় (PE = Penalties)।
            </p>

            <!-- ========================================================= -->
            <!-- SECTION 5 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">5.</span> Important Fare Rule Sections
            </h3>

            <ul class="visa-list">
                <li>✔ Advance Purchase</li>
                <li>✔ Minimum / Maximum Stay</li>
                <li>✔ Change Penalty</li>
                <li>✔ Refund Penalty</li>
                <li>✔ No-show Condition</li>
            </ul>

            <div class="info-box">
                📌 Always check No-show rule – এটা সবচেয়ে dangerous penalty।
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 6 -->
            <!-- ========================================================= -->
            <h3 class="section-heading">
                <span class="sec-num">6.</span> Professional Agent Tips
            </h3>

            <ul class="visa-list">
                <li>✔ Fare rule ticket issue করার আগেই explain করুন</li>
                <li>✔ Penalty amount লিখিতভাবে passenger-কে জানান</li>
                <li>✔ Refund “permitted” মানে free না</li>
                <li>✔ Cheapest fare usually strict rule follow করে</li>
            </ul>

            <!-- ========================================================= -->
            <!-- TD CARD -->
            <!-- ========================================================= -->
            <div class="td-card">
                <div class="td-card-body">
                    <p class="td-text">
                        Fare Rule & Penalty না বুঝলে সবচেয়ে বেশি dispute ও loss হয়।
                        <b>Trip Designer</b> শেখায় real GDS rule reading zero confusion সহ।
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

            <!-- NAVIGATION -->
            <div class="nav-buttons">
                <a href="{{ url('/ebooks/air-ticket/chapter/16') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
                <a href="{{ url('/ebooks/air-ticket/chapter/18') }}" class="btn btn-primary">পরবর্তী ➡</a>
            </div>

        </div>

        <div id="footer"></div>
@endsection