<div class="row justify-content-center gy-4 gx-xl-3 gx-lg-4 gx-4">
    @foreach($u_packages as $u_package)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="pop-touritem">
                <a href="{{url('hajj-umrah/'.$u_package->slug)}}" class="card rounded-3 border br-dashed m-0">
                    <div class="flight-thumb-wrapper p-2 pb-0">
                        <div class="popFlights-item-overHidden rounded-3">
                            <img src="{{@$domain.'/'.$u_package->p_c_photo}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="touritem-middle position-relative p-3">
                        <div class="touritem-flexxer">
                                <?php
                                $include = json_decode($u_package->include);
                                ?>
                            <div class="tourist-wooks position-relative mb-3">
                                <ul class="activities-flex">
                                    @if(@$include[0] = 'Hotel')
                                        <li>
                                            <div class="actv-wrap">
                                                <div class="actv-wrap-ico"><i class="fa-solid fa-hotel"></i></div>
                                                <div class="actv-wrap-caps">Hotel</div>
                                            </div>
                                        </li>
                                    @endif
                                    @if(@$include[1] = 'SightSeeing')
                                        <li>
                                            <div class="actv-wrap">
                                                <div class="actv-wrap-ico"><i class="fa-solid fa-person-walking-luggage"></i></div>
                                                <div class="actv-wrap-caps">SightSeeing</div>
                                            </div>
                                        </li>
                                    @endif
                                    @if(@$include[2] = 'Transfer')
                                        <li>
                                            <div class="actv-wrap">
                                                <div class="actv-wrap-ico"><i class="fa-solid fa-bus"></i></div>
                                                <div class="actv-wrap-caps">Transfers</div>
                                            </div>
                                        </li>
                                    @endif
                                    @if(@$include[3] = 'Meal')
                                        <li>
                                            <div class="actv-wrap">
                                                <div class="actv-wrap-ico"><i class="fa-solid fa-kitchen-set"></i></div>
                                                <div class="actv-wrap-caps">Meal</div>
                                            </div>
                                        </li>
                                    @endif
                                    @if(@$include[4] = 'Visa')
                                        <li>
                                            <div class="actv-wrap">
                                                <div class="actv-wrap-ico"><i class="fa-brands fa-cc-visa"></i></div>
                                                <div class="actv-wrap-caps">Visa</div>
                                            </div>
                                        </li>
                                    @endif
                                    @if(@$include[5] = 'Flight')
                                        <li>
                                            <div class="actv-wrap">
                                                <div class="actv-wrap-ico"><i class="fa-solid fa-rocket"></i></div>
                                                <div class="actv-wrap-caps">Flight</div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="explot">
                                <h4 class="city fs-title m-0 fw-bold">
                                    <span>{{$u_package->p_name}} &nbsp;<strong><i class="fa-solid fa-star text-warning me-1"></i>{{floatval(rand(4,5))}}</strong></span>
                                </h4>
                            </div>
                            <div class="touritem-amenties my-4">
                                <ul class="activities-flex">
                                    <li>
                                        <div class="actv-wrap">
                                            <div class="actv-wrap-caps text-dark fw-bold fs-6"><span class="text-dhani me-1">{{$u_package->night}}</span>Night {{$u_package->night +1}} Days</div>
                                        </div>
                                    </li>
                                    <li>
                                        <h5 class="fs-5 low-price m-0">{{$c_info->currency}}
                                            <span class="price text-primary"> &nbsp; {{$u_package->p_p_adult}} {{$c_info->symbol}}</span>
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="booking-wrapes d-flex align-items-center mt-3">
                            <button class="btn btn-md btn-light-primary fw-medium rounded full-width me-2">Request Book<i class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
