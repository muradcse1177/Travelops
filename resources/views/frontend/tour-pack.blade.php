@extends('frontend.layout.body')
@section('title','Trip Designer - Tour Package - The Best Tour Package Provider in Bangladesh.')
@section('content')
    <div id="main-wrapper">
        <div class="clearfix"></div>

        <!-- ================= Hero Banner ================= -->
        <div class="py-5 bg-primary position-relative">
            <div class="container">

                <!-- Search Form -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="search-wrap position-relative my-3">

                            {{ Form::open(['url' => 'search-tour-package','method' => 'get','class' =>'form-horizontal']) }}

                            <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                
                                {{-- original design kept untouched --}}
                                <div class="col-xl-8 col-lg-7 col-md-12">
                                    <div class="row gy-3 gx-md-3 gx-sm-2">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="goingto form-control fw-bold" name="country">
                                                    <option value="">Select</option>
                                                    @foreach($t_country as $country)
                                                        <option value="{{$country->name}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out" name="checkinout" id="checkinout" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-5 col-md-12">
                                    <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                            <select class="tour form-control fw-bold" required>
                                                <option value="">Select</option>
                                                <option value="ny">Family Package</option>
                                                <option value="sd">Honeymoon Package</option>
                                                <option value="sj">Group Package</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <button type="submit" class="btn btn-whites text-primary full-width fw-medium">
                                                <i class="fa-solid fa-magnifying-glass me-2"></i>Search
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ================= Offers ================= -->
        <section class="gray-simple">
            <div class="container">
                <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

                    <div class="col-xl-12">
                        <h5 class="fw-bold fs-6 mb-lg-0 mb-3">Showing {{$count}} Search Results</h5>
                    </div>

                    <!-- WRAPPER FOR AUTO SCROLL -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="row justify-content-center gy-4 gx-xl-4 gx-3" id="data-wrapper">

                            @foreach($t_package as $package)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="pop-touritem">
                                        <a href="{{ url('tour-package/'.$package->slug) }}" class="card rounded-3 m-0">
                                            <div class="flight-thumb-wrapper p-2 pb-0">
                                                <div class="popFlights-item-overHidden rounded-3">

                                                    {{-- FIX IMAGE ABSOLUTE PATH --}}
                                                    <img src="{{ url('/'.$package->p_c_photo) }}" class="img-fluid" alt="">

                                                </div>
                                            </div>

                                            <div class="touritem-middle position-relative p-3">
                                                <div class="touritem-flexxer">
                                                    <?php $include = json_decode($package->include); ?>

                                                    <div class="tourist-wooks position-relative mb-3">
                                                        <ul class="activities-flex">
                                                            @if(@$include[0] == 'Hotel')
                                                                <li>
                                                                    <div class="actv-wrap">
                                                                        <div class="actv-wrap-ico"><i class="fa-solid fa-hotel"></i></div>
                                                                        <div class="actv-wrap-caps">Hotel</div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                            @if(@$include[1] == 'SightSeeing')
                                                                <li>
                                                                    <div class="actv-wrap">
                                                                        <div class="actv-wrap-ico"><i class="fa-solid fa-person-walking-luggage"></i></div>
                                                                        <div class="actv-wrap-caps">SightSeeing</div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                            @if(@$include[2] == 'Transfer')
                                                                <li>
                                                                    <div class="actv-wrap">
                                                                        <div class="actv-wrap-ico"><i class="fa-solid fa-bus"></i></div>
                                                                        <div class="actv-wrap-caps">Transfers</div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                            @if(@$include[3] == 'Meal')
                                                                <li>
                                                                    <div class="actv-wrap">
                                                                        <div class="actv-wrap-ico"><i class="fa-solid fa-kitchen-set"></i></div>
                                                                        <div class="actv-wrap-caps">Meal</div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>

                                                    <h4 class="city fs-title m-0 fw-bold">
                                                        <span>{{$package->p_name}}</span>
                                                    </h4>

                                                    <div class="touritem-amenties my-4">
                                                        <ul class="activities-flex">
                                                            <li>
                                                                <div class="actv-wrap">
                                                                    <div class="actv-wrap-caps text-dark fw-bold fs-6">
                                                                        {{$package->night}} Night {{ $package->night +1 }} Days
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <h5 class="fs-5 low-price m-0">
                                                                    {{$c_info->currency}}
                                                                    <span class="price text-primary"> {{$package->p_p_adult}} {{$c_info->symbol}}</span>
                                                                </h5>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>

                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Hidden Pagination -->
                        <div id="pagination" style="display:none;">
                            {{ $t_package->links() }}
                        </div>

                        <!-- Auto Scroll Trigger -->
                        <div id="load-more-trigger" style="height:50px;"></div>

                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection


@section('js')
<script>

let page = 1;
let lastPage = {{ $t_package->lastPage() }};
let loading = false;

const trigger = document.querySelector("#load-more-trigger");

// SCROLL OBSERVER
let observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
        loadMore();
    }
}, { threshold: 1 });

observer.observe(trigger);


// LOAD MORE FUNCTION
function loadMore() {

    if (loading) return;
    if (page >= lastPage) return;

    loading = true;
    page++;

    fetch("?page=" + page)
        .then(res => res.text())
        .then(data => {

            let parser = new DOMParser();
            let htmlDoc = parser.parseFromString(data, "text/html");

            let newItems = htmlDoc.querySelectorAll('#data-wrapper .col-xl-4');

            newItems.forEach(item => {

                let img = item.querySelector("img");

                // FORCE FULL IMAGE PATH
                if (img) {
                    let src = img.getAttribute("src");

                    if (!src.startsWith("http")) {
                        img.src = "{{ url('/') }}/" + src.replace(/^\//,'');
                    }
                }

                document.querySelector("#data-wrapper").appendChild(item);
            });

            loading = false;
        })
        .catch(err => {
            console.error(err);
            loading = false;
        });
}

</script>
@endsection
