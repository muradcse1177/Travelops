
                            <div class="tab-pane show" id="flights">
                                <ul class="nav nav-pills primary-soft medium justify-content-center mb-3" id="tour-pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#oneWay"> One Way</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#round"> Round Trip</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#multi"> Multi City</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="oneWay">
                                        {{ Form::open(array('url' => 'flight-search-result',  'method' => 'get' ,'class' =>'form-horizontal')) }}
                                        <div class="row gx-lg-2 g-3">
                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                                        <div class="form-group hdd-arrow mb-0">
                                                            <input class="form-control fw-bold" type="text" id="departure" name="departure" value="DAC,Dhaka" placeholder="Enter City or Airport Name">
                                                        </div>
                                                        <div class="btn-flip-icon mt-md-0">
                                                            <button class="p-0 m-0 text-primary"><i class="fa-solid fa-right-left"></i></button>
                                                        </div>
                                                        <div id="suggesstion-box"></div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-groupp hdd-arrow mb-0">
                                                            <input class="form-control fw-bold " type="text" id="arrival" name="arrival" value="CXB,Cox's Bazar" placeholder="Enter City or Airport Name">
                                                            <div id="suggesstion-box1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" name="dep_date" type="text" value="<?php echo date("Y-m-d", time() + 86400); ?>" placeholder="Departure Date.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <div class="booking-form__input guests-input mixer-auto">
                                                                <button name="guests-btn" id="guests-input-btn">1 Guest</button>
                                                                <input type="hidden" name="adult" id="adult" value="">
                                                                <input type="hidden" name="child" id="child" value="">
                                                                <input type="hidden" name="infant" id="infant" value="">
                                                                <div class="guests-input__options" id="guests-input-options">
                                                                    <div>
                                                                        <span class="guests-input__ctrl minus" id="adults-subs-btn"><i
                                                                                class="fa-solid fa-minus"></i></span>
                                                                            <span class="guests-input__value"><span id="guests-count-adults">1</span>Adults</span>
                                                                            <span class="guests-input__ctrl plus" id="adults-add-btn"><i
                                                                                    class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="guests-input__ctrl minus" id="children-subs-btn"><i
                                                                                class="fa-solid fa-minus"></i></span>
                                                                            <span class="guests-input__value"><span id="guests-count-children">0</span>Children 0-12 Years</span>
                                                                            <span class="guests-input__ctrl plus" id="children-add-btn"><i
                                                                                    class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="guests-input__ctrl minus" id="room-subs-btn"><i
                                                                                class="fa-solid fa-minus"></i></span>
                                                                            <span class="guests-input__value"><span id="guests-count-room">0</span>Infant</span>
                                                                            <span class="guests-input__ctrl plus" id="room-add-btn"><i
                                                                                    class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-1 col-lg-1 col-md-12">
                                                <div class="form-group hdd-arrow mb-0">
                                                    <select class="Infant form-control fw-bold" name="f_class">
                                                        <option value="Economy">Economy</option>
                                                        <option value="Premium Economy">Premium Economy</option>
                                                        <option value="Business">Business</option>
                                                        <option value="FirstClass">First Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-1 col-lg-1 col-md-12">
                                                <div class="form-group mb-0">
                                                    <input type="hidden" name="f_type" value="Oneway">
                                                    <button type="submit" class="btn btn-primary full-width fw-medium loadingstart"><i
                                                            class="fa-solid fa-magnifying-glass fs-5"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>

                                    <div class="tab-pane" id="round">
                                        <div class="row gx-lg-2 g-3">
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                                        <div class="form-group hdd-arrow mb-0">
                                                            <input class="form-control fw-bold " type="text" placeholder="Departure">
                                                        </div>
                                                        <div class="btn-flip-icon mt-md-0">
                                                            <button class="p-0 m-0 text-primary"><i class="fa-solid fa-right-left"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-groupp hdd-arrow mb-0">
                                                            <input class="form-control fw-bold " type="text" placeholder="Arrival">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" type="text" placeholder="Departure Date.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" type="text" placeholder="Arrival Date.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <div class="booking-form__input guests-input mixer-auto">
                                                                <button name="guests-btn" id="guests-input-btn">1 Guest</button>
                                                                <div class="guests-input__options" id="guests-input-options">
                                                                    <div>
																	<span class="guests-input__ctrl minus" id="adults-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-adults">1</span>Adults</span>
                                                                        <span class="guests-input__ctrl plus" id="adults-add-btn"><i
                                                                                class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
																	<span class="guests-input__ctrl minus" id="children-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-children">0</span>Children</span>
                                                                        <span class="guests-input__ctrl plus" id="children-add-btn"><i
                                                                                class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
																	<span class="guests-input__ctrl minus" id="room-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-room">0</span>Rooms</span>
                                                                        <span class="guests-input__ctrl plus" id="room-add-btn"><i
                                                                                class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-1 col-lg-1 col-md-12">
                                                <div class="form-group hdd-arrow mb-0">
                                                    <select class="Infant form-control fw-bold">
                                                        <option value="Economy">Economy</option>
                                                        <option value="Business">Business</option>
                                                        <option value="FirstClass">First Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-1 col-lg-1 col-md-12">
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-primary full-width fw-medium"><i
                                                            class="fa-solid fa-magnifying-glass fs-5"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="multi">
                                        <div class="row gx-lg-2 g-3">
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                                        <div class="form-group hdd-arrow mb-0">
                                                            <input class="form-control fw-bold " type="text" placeholder="Departure">
                                                        </div>
                                                        <div class="btn-flip-icon mt-md-0">
                                                            <button class="p-0 m-0 text-primary"><i class="fa-solid fa-right-left"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-groupp hdd-arrow mb-0">
                                                            <input class="form-control fw-bold " type="text" placeholder="Arrival">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" type="text" placeholder="Departure Date.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <div class="booking-form__input guests-input mixer-auto">
                                                                <button name="guests-btn" id="guests-input-btn">1 Guest</button>
                                                                <div class="guests-input__options" id="guests-input-options">
                                                                    <div>
																	<span class="guests-input__ctrl minus" id="adults-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-adults">1</span>Adults</span>
                                                                        <span class="guests-input__ctrl plus" id="adults-add-btn"><i
                                                                                class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
																	<span class="guests-input__ctrl minus" id="children-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-children">0</span>Children</span>
                                                                        <span class="guests-input__ctrl plus" id="children-add-btn"><i
                                                                                class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
																	<span class="guests-input__ctrl minus" id="room-subs-btn"><i
                                                                            class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-room">0</span>Rooms</span>
                                                                        <span class="guests-input__ctrl plus" id="room-add-btn"><i
                                                                                class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-12">
                                                <div class="form-group hdd-arrow mb-0">
                                                    <select class="Infant form-control fw-bold">
                                                        <option value="Economy">Economy</option>
                                                        <option value="Business">Business</option>
                                                        <option value="FirstClass">First Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-1 col-lg-1 col-md-12">
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-primary full-width fw-medium"><i
                                                            class="fa-solid fa-plus fs-5"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
