@extends('ebooks.visa-course.layout.app')

@section('title','Chapter 36 - বিশ্বব্যাপী ভিসা চেক')

@section('content')
<div class="chapter-box">

        <h2 class="chapter-title">বিশ্বব্যাপী ভিসা চেক (২০০+ দেশ)</h2>
        <p>এখানে আপনি যেকোনো দেশের অফিসিয়াল ভিসা ওয়েবসাইট থেকে সরাসরি ভিসা-সংক্রান্ত তথ্য চেক করতে পারবেন।</p>

        <!-- SEARCH BAR -->
        <input type="text" id="search" class="form-control search-box" placeholder="দেশের নাম লিখে সার্চ করুন…">

        <!-- TABLE -->
        <table class="table table-bordered visa-table">
            <thead class="table-primary">
                <tr>
                    <th>Flag</th>
                    <th>Country</th>
                    <th>Visa Check</th>
                </tr>
            </thead>
            <tbody id="countryTable"></tbody>
        </table>

        <!-- PAGINATION -->
        <div id="pagination">
            <button class="btn btn-secondary btn-page" id="prevBtn">Prev</button>
            <button class="btn btn-primary btn-page" id="nextBtn">Next</button>
        </div>
        <div class="nav-buttons">
            <a href="{{ url('/ebooks/visa-course/chapter/35') }}" class="btn btn-secondary">⬅ পূর্ববর্তী</a>
            <a href="{{ url('/ebooks/visa-course/chapter/37') }}" class="btn btn-primary">পরবর্তী ➡</a>
        </div>
    </div>

    <!-- FOOTER -->
    <div id="footer"></div>
@endsection