@extends('frontend.layout.body')
@section('title','Trip Designer - Tour Package - The Best Tour Package Provider in Bangladesh.')
@section('content')
    <div id="main-wrapper">
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <section class="pt-4 gray-simple position-relative">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="div-title d-flex align-items-center mb-3">
                            <h4>Guests Detail</h4>
                        </div>
                        {{ Form::open(array('url' => 'make-payment-tour',  'method' => 'post','class' => 'mt-4 text-start')) }}
                        {{ csrf_field() }}
                        <div class="row align-items-start">
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                @for($i = 0;$i<$adult; $i++)
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h4>Adult No: {{$i +1}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="ad_f_name[]" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" name="ad_l_name[]" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Date of Birth</label>
                                                        <input type="date" name="ad_dob[]" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Passport Number</label>
                                                        <input type="text" class="form-control" name="ad_passport[]" placeholder="Passport Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                @for($i = 0;$i<$child; $i++)
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h4>Child No: {{$i +1}}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" name="ch_f_name[]" class="form-control" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" name="ch_l_name[]" class="form-control" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Date of Birth</label>
                                                        <input type="date" name="ch_dob[]" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Passport Number</label>
                                                        <input type="text" name="ch_passport[]" class="form-control" placeholder="Passport Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h4>Lead Contact Person Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="c_f_name" class="form-control" placeholder="First Name" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" name="c_l_name" class="form-control" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label">Country Code</label>
                                                    <select class="form-control" name="phoneCode" required>
                                                            <option value="880">+880</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="number" name="phone" class="form-control" maxlength="10" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="side-block card rounded-2 p-3">
                                    <h5 class="fw-semibold fs-6">Reservation Summary</h5>
                                    <div class="mid-block rounded-2 border br-dashed p-2 mb-3">
                                        <div class="row align-items-center justify-content-between g-2 mb-4">
                                            <div class="col-6">
                                                <div class="gray rounded-2 p-2">
                                                    <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-In</span>
                                                    <p class="text-dark fw-semibold lh-base text-md mb-0">{{$checkin}}</p>
                                                    <span class="text-dark text-md">From 14:00</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="gray rounded-2 p-2">
                                                    <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-Out</span>
                                                    <p class="text-dark fw-semibold lh-base text-md mb-0">{{$checkout}}</p>
                                                    <span class="text-dark text-md">To 11:50</span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $date1 = new DateTime($checkin);
                                            $date2 = new DateTime($checkout);

                                            $diff = $date1->diff($date2);
                                        ?>
                                        <div class="row align-items-center justify-content-between mb-4">
                                            <div class="col-12">
                                                <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">Total Length of Stay:</p>
                                                <div class="d-flex align-items-center">
                                                    <div class="square--30 circle text-seegreen bg-light-seegreen"><i
                                                            class="fa-regular fa-calendar"></i></div><span class="text-dark fw-semibold ms-2">{{$diff->days}} Days \
                                                            {{$diff->days-1}} Night</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-12">
                                                <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">Your Selected Package</p>
                                                <div class="d-flex align-items-center flex-column">
                                                    <p class="mb-0"><a href="{{url('tour-package/'.$tour_details->slug)}}" class="fw-medum text-primary">{{$tour_details->p_name}}</p>
                                                    <p class="mb-0"><a href="{{url('tour-package')}}" class="fw-medum text-primary"> Change your Selection</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bott-block d-block mb-3">
                                        <h5 class="fw-semibold fs-6">Your Price Summary</h5>
                                        <ul class="list-group list-group-borderless">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="fw-medium mb-0">Adult Price</span>
                                                <span class="fw-semibold">{{$c_info->currency}} {{number_format($tour_details->p_p_adult*$adult, 2)}}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="fw-medium mb-0">Child Price</span>
                                                <span class="fw-semibold">{{$c_info->currency}} {{number_format($tour_details->p_p_child*$child, 2)}}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="fw-medium mb-0">VAT,Taxes and AIT</span>
                                                <span class="fw-semibold">{{$c_info->currency}} 0.00</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="fw-medium text-success mb-0">Total Price</span>
                                                <span class="fw-semibold text-success">{{$c_info->currency}} {{number_format($tour_details->p_p_adult*$adult + $tour_details->p_p_child*$child, 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bott-block">
                                        <div class="searchBar-single-wrap">
                                            <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                                                <li class="col-12">
                                                    <div class="form-check lg">
                                                        <div class="frm-slicing d-flex align-items-center">
                                                            <div class="frm-slicing-first">
                                                                <input class="form-check-input" type="checkbox" id="hyundai" required>
                                                                <label class="form-check-label" for="hyundai"></label>
                                                            </div>
                                                            <div class="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                                                                <div class="frms-flex d-flex align-items-center">
                                                                    <div class="frm-slicing-title ps-2">
                                                                        <span class="text-muted-2">I agreed with
                                                                            <a href="{{url('privacy-policy')}}">Privacy Policy , </a>
                                                                            <a href="{{url('terms-conditions')}}">Terms & Conditions , </a>
                                                                            <a href="{{url('refund-policy')}}">Refund Policy</a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="hidden" name="tour-id" value="{{$tour_details->id}}">
                                        <button type="submit" class="btn fw-medium btn-primary full-width">Make Payment</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>

{{--                    <div class="col-xl-12 col-lg-12 col-md-12">--}}
{{--                        <div class="text-center d-flex align-items-center justify-content-center mt-4">--}}
{{--                            <a href="booking-page.html" class="btn btn-md btn-dark fw-semibold mx-2"><i--}}
{{--                                    class="fa-solid fa-arrow-left me-2"></i>Previous</a>--}}
{{--                            <a href="bookingpage-03.html" class="btn btn-md btn-primary fw-semibold mx-2">Make Your Payment<i--}}
{{--                                    class="fa-solid fa-arrow-right ms-2"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>

@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[maxlength]').forEach(input => {
                input.addEventListener('input', e => {
                    let val = e.target.value, len = +e.target.getAttribute('maxlength');
                    e.target.value = val.slice(0,len);
                })
            })
        })
    </script>
@endsection
