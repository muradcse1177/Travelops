<div class="row justify-content-center gy-4 gx-xl-3 gx-lg-4 gx-4">
    @foreach($permits as $permit)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="pop-touritem">
                <a href="{{'manpower/'.$permit->slug}}" class="card rounded-3 border br-dashed m-0">
                    <div class="flight-thumb-wrapper p-2 pb-0">
                        <div class="popFlights-item-overHidden rounded-3">
                            <img src="{{@$domain.'/'.$permit->c_photo}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="touritem-middle position-relative p-3">
                        <div class="touritem-flexxer">
                            <div class="explot">
                                <h4 class="city fs-6 m-0 fw-bold">
                                    <span>{{$permit->country}} Work permit Visa</span>
                                </h4>
                            </div>
                        </div>
                        <div class="booking-wrapes d-flex align-items-center mt-3">
                            <button class="btn btn-md btn-light-primary fw-medium rounded full-width me-2">View Details</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
