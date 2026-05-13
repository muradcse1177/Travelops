@if(!empty($c_info->agent_id))
@php
    $user_id   = Session::get('user_id');
    $customer  = Session::get('customer');
    $user      = $user_id ? DB::table('users')->find($user_id) : null;
    $photo     = $user && $user->logo ? $user->logo : 'public/user.png';

    $visaCountries      = DB::table('b2c_visa_country')->where('agent_id', $c_info->agent_id)->orderBy('name')->get();
    $tourCountries      = DB::table('b2c_tour_package_country')->where('agent_id', $c_info->agent_id)->orderBy('name')->get();
    $manpowerCountries  = DB::table('b2c_manpower_country')->where('agent_id', $c_info->agent_id)->orderBy('name')->get();
    $educations         = DB::table('edu_countries')->where('agent_id', $c_info->agent_id)->get();
    $services           = DB::table('b2c_service')->where('agent_id', $c_info->agent_id)->get();
    $courses            = DB::table('course_details')->get();
    $eBooks            = DB::table('ebooks')->get();

    $today = now()->addDays(3)->format('Y-m-d');
    $date  = now()->addDays(8)->format('Y-m-d');
@endphp


{{-- ✅ Safe global flag function --}}
@php
if (!function_exists('getFlagUrl')) {
    function getFlagUrl($countryName) {
        $map = [
            // 🌍 Full ISO Country Map (Updated)
            'Afghanistan'=>'af','Albania'=>'al','Algeria'=>'dz','Andorra'=>'ad','Angola'=>'ao','Argentina'=>'ar',
            'Armenia'=>'am','Australia'=>'au','Austria'=>'at','Azerbaijan'=>'az','Bahamas'=>'bs','Bahrain'=>'bh',
            'Bangladesh'=>'bd','Barbados'=>'bb','Belarus'=>'by','Belgium'=>'be','Belize'=>'bz','Bhutan'=>'bt',
            'Bolivia'=>'bo','Bosnia and Herzegovina'=>'ba','Botswana'=>'bw','Brazil'=>'br','Brunei'=>'bn',
            'Bulgaria'=>'bg','Cambodia'=>'kh','Cameroon'=>'cm','Canada'=>'ca','Chile'=>'cl','China'=>'cn',
            'Colombia'=>'co','Costa Rica'=>'cr','Croatia'=>'hr','Cyprus'=>'cy','Czech Republic'=>'cz','Denmark'=>'dk',
            'Dominican Republic'=>'do','Dubai'=>'ae','Ecuador'=>'ec','Egypt'=>'eg','Estonia'=>'ee','Ethiopia'=>'et',
            'Finland'=>'fi','France'=>'fr','Georgia'=>'ge','Germany'=>'de','Ghana'=>'gh','Greece'=>'gr','Grenada'=>'gd',
            'Guyana'=>'gy','Hong Kong'=>'hk','Hungary'=>'hu','Iceland'=>'is','India'=>'in','Indonesia'=>'id',
            'Iran'=>'ir','Iraq'=>'iq','Ireland'=>'ie','Israel'=>'il','Italy'=>'it','Jamaica'=>'jm','Japan'=>'jp',
            'Jordan'=>'jo','Kazakhstan'=>'kz','Kenya'=>'ke','Kuwait'=>'kw','Laos'=>'la','Latvia'=>'lv','Lebanon'=>'lb',
            'Lithuania'=>'lt','Luxembourg'=>'lu','Macau'=>'mo','Macedonia'=>'mk','Malaysia'=>'my','Maldives'=>'mv',
            'Malta'=>'mt','Mauritius'=>'mu','Mexico'=>'mx','Monaco'=>'mc','Mongolia'=>'mn','Morocco'=>'ma',
            'Myanmar'=>'mm','Namibia'=>'na','Nepal'=>'np','Netherlands'=>'nl','New Zealand'=>'nz','Nigeria'=>'ng',
            'Norway'=>'no','Oman'=>'om','Pakistan'=>'pk','Palestine'=>'ps','Panama'=>'pa','Peru'=>'pe','Philippines'=>'ph',
            'Poland'=>'pl','Portugal'=>'pt','Qatar'=>'qa','Romania'=>'ro','Russia'=>'ru','Saudi Arabia'=>'sa',
            'Schengen'=>'eu','Serbia'=>'rs','Singapore'=>'sg','Slovakia'=>'sk','Slovenia'=>'si','South Africa'=>'za',
            'South Korea'=>'kr','Spain'=>'es','SriLanka'=>'lk','Sweden'=>'se','Switzerland'=>'ch','Syria'=>'sy',
            'Taiwan'=>'tw','Tajikistan'=>'tj','Tanzania'=>'tz','Thailand'=>'th','Turkey'=>'tr','Turkiye'=>'tr',
            'Uganda'=>'ug','Ukraine'=>'ua','United Arab Emirates'=>'ae','United Kingdom'=>'gb','United States'=>'us',
            'Uruguay'=>'uy','Uzbekistan'=>'uz','Vatican City'=>'va','Venezuela'=>'ve','Vietnam'=>'vn','Zambia'=>'zm','Zimbabwe'=>'zw'
        ];
        return isset($map[$countryName]) 
            ? "https://flagcdn.com/24x18/{$map[$countryName]}.png" 
            : "https://flagcdn.com/24x18/un.png";
    }
}
@endphp


<div id="main-wrapper">
    <div class="header header-light theme" style="background:white;">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">

                {{-- 🧭 Logo --}}
                <div class="nav-header">
                    <a class="nav-brand static-show" href="{{url('/')}}">
                        <img src="{{url($domain.'/'.$c_info->logo)}}" class="logo" alt="">
                    </a>
                    <a class="nav-brand mob-show" href="{{url('/')}}">
                        <img src="{{url($domain.'/'.$c_info->logo)}}" class="logo" alt="">
                    </a>
                    <div class="nav-toggle"></div>

                    {{-- 👤 Mobile User Menu --}}
                    <div class="mobile_nav">
                        <ul>
                            @if($customer)
                                <li class="btn-group me-2">
                                    <div class="btn-group account-drop">
                                        <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown">
                                            <img src="{{ url($photo) }}" class="img-fluid">
                                        </button>
                                        <div class="dropdown-menu pull-right animated flipInX">
                                            <div class="drp_menu_headr">
                                                <h4>{{ $user->company_name ?? '' }}</h4>
                                                <div class="drp_menu_headr-right">
                                                    <a href="{{url('logout')}}" class="btn btn-md fw-medium btn-whites text-dark">Logout</a>
                                                </div>
                                            </div>
                                            <ul class="notification-grousp px-3 py-3">
                                                <li><a href="{{ url('customer-profile') }}"><i class="fa-regular fa-id-card me-2"></i> My Profile</a></li>
                                                <li><a href="{{ url('my-booking') }}"><i class="fa-solid fa-ticket me-2"></i> My Bookings</a></li>
                                                <li><a href="#"><i class="fa-solid fa-user-group me-2"></i> My Travellers</a></li>
                                                <li><a href="{{ url('my-booking') }}"><i class="fa-solid fa-wallet me-2"></i> Payment Details</a></li>
                                                <li><a href="{{ url('logout') }}"><i class="fa-solid fa-power-off me-2"></i> Sign Out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{url('all-login')}}" class="bg-light-primary text-primary rounded"><i class="fa-regular fa-circle-user fs-6"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                {{-- 🧭 Navigation Menu --}}
                <div class="nav-menus-wrapper" style="transition-property:none;">
                    <ul class="nav-menu">
                        <li><a href="{{url('/')}}">Home</a></li>

                        {{-- 🌍 VISA --}}
                        <li>
                            <a href="{{ url('/visa') }}">Visa</a>
                            <ul class="nav-dropdown nav-submenu">
                                <div class="row px-3 py-3" style="min-width:360px;">
                                    @foreach($visaCountries->chunk(ceil($visaCountries->count()/2)) as $chunk)
                                        <div class="col-6 px-2">
                                            <ul class="list-unstyled mb-0">
                                                @foreach($chunk as $row)
                                                    <li class="mb-1">
                                                        <a href="{{ url('search-visa?country='.$row->name) }}" class="d-flex align-items-center text-dark">
                                                            <img src="{{ getFlagUrl($row->name) }}" width="20" height="14" class="me-2" style="border-radius:3px;">
                                                            <i class="fa-solid fa-angle-right text-primary me-2"></i>{{ $row->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </ul>
                        </li>

                        {{-- 🏖️ TOUR PACKAGE --}}
                        <li>
                            <a href="{{ url('tour-package') }}">Tour Package</a>
                            <ul class="nav-dropdown nav-submenu">
                                <div class="row px-3 py-3" style="min-width:360px;">
                                    @foreach($tourCountries->chunk(ceil($tourCountries->count()/2)) as $chunk)
                                        <div class="col-6 px-2">
                                            <ul class="list-unstyled mb-0">
                                                @foreach($chunk as $row)
                                                    <li class="mb-1">
                                                        <a href="{{ url('search-tour-package?country='.$row->name.'&checkinout='.$today.'+to+'.$date) }}" class="d-flex align-items-center text-dark">
                                                            <img src="{{ getFlagUrl($row->name) }}" width="20" height="14" class="me-2" style="border-radius:3px;">
                                                            <i class="fa-solid fa-angle-right text-primary me-2"></i>{{ $row->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </ul>
                        </li>

                        {{-- 🧳 WORK PERMIT --}}
                        <li>
                            <a href="{{ url('work-permit') }}">Work Permit</a>
                            <ul class="nav-dropdown nav-submenu">
                                <div class="row px-3 py-3" style="min-width:360px;">
                                    @foreach($manpowerCountries->chunk(ceil($manpowerCountries->count()/2)) as $chunk)
                                        <div class="col-6 px-2">
                                            <ul class="list-unstyled mb-0">
                                                @foreach($chunk as $row)
                                                    <li class="mb-1">
                                                        <a href="{{ url('search-manpower?country='.$row->name) }}" class="d-flex align-items-center text-dark">
                                                            <img src="{{ getFlagUrl($row->name) }}" width="20" height="14" class="me-2" style="border-radius:3px;">
                                                            <i class="fa-solid fa-angle-right text-primary me-2"></i>{{ $row->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </ul>
                        </li>

                        <li><a href="{{url('hajj-umrah')}}">Hajj & Umrah</a></li>

                        {{-- 🎓 STUDY ABROAD --}}
                        <li>
                            <a href="{{url('study-abroad')}}">Study Abroad</a>
                            <ul class="nav-dropdown nav-submenu">
                                <div class="row px-3 py-3" style="min-width:360px;">
                                    @foreach($educations->chunk(ceil($educations->count()/2)) as $chunk)
                                        <div class="col-6 px-2">
                                            <ul class="list-unstyled mb-0">
                                                @foreach($chunk as $row)
                                                    <li class="mb-1">
                                                        <a href="{{ url('countries/'.$row->slug) }}" class="d-flex align-items-center text-dark">
                                                            <img src="{{ getFlagUrl($row->country_name) }}" width="20" height="14" class="me-2" style="border-radius:3px;">
                                                            <i class="fa-solid fa-angle-right text-primary me-2"></i>{{ $row->country_name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                    <div class="col-12 text-center mt-3">
                                        <a href="{{ route('study.abroad.form') }}" class="btn btn-primary fw-bold px-4 py-2">
                                            <i class="fa-solid fa-graduation-cap me-2"></i> Apply Now
                                        </a>
                                    </div>
                                </div>
                            </ul>
                        </li>

                        {{-- 📘 Academy --}}
                        <li>
                            <a href="{{url('academy')}}">Academy</a>
                            <ul class="nav-dropdown nav-submenu">
                                <li>
                                    <a href="{{url('courses')}}">Courses</a>
                                    <ul class="nav-dropdown nav-submenu">
                                        @foreach($courses as $c)
                                            <li><a href="{{url('course/'.$c->slug)}}">{{ $c->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('ebooks')}}">eBooks</a>
                                    <ul class="nav-dropdown nav-submenu">
                                        @foreach($eBooks as $book)
                                            <li><a href="{{url('ebook/'.$book->slug)}}">{{ $book->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        {{-- ⚙️ Services --}}
                        <li>
                            <a href="{{url('services')}}">Services</a>
                            <ul class="nav-dropdown nav-submenu">
                                @foreach($services as $s)
                                    <li><a href="{{url('services/'.$s->slug)}}">{{ $s->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{url('blogs')}}">Blogs</a></li>
                        <li><a href="{{url('about-us')}}">About</a></li>
                        <li><a href="{{url('contact-us')}}">Contact</a></li>
                    </ul>

                    {{-- 👤 Right Side User --}}
                    <ul class="nav-menu nav-menu-social align-to-right">
                        @if($user)
                            <li>
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown">
                                        <img src="{{ url($photo) }}" class="img-fluid" alt="User">
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <h4 style="margin-top:20px; margin-left:20px;">{{ $user->company_name ?? '' }}</h4>
                                        <ul>
                                            <li><a href="{{url('customer-profile')}}">My Profile</a></li>
                                            <li><a href="{{url('my-booking')}}">My Booking</a></li>
                                            <li><a href="#">My Travellers</a></li>
                                            <li><a href="{{url('my-booking')}}">Payment Details</a></li>
                                            <li><a href="{{url('logout')}}">Sign Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="list-buttons light">
                                <a href="{{url('all-login')}}"><i class="fa-regular fa-circle-user fs-6 me-2"></i>Sign In / Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>


{{-- 🎨 Shared Styles --}}
<style>
.nav-submenu img {
    vertical-align: middle;
    transition: 0.2s;
}
.nav-submenu a:hover img {
    transform: scale(1.1);
}
.nav-submenu a {
    font-size: 14px;
}
.nav-submenu i {
    font-size: 12px;
}
.nav-submenu .btn {
    border-radius: 8px;
    background-color: #0a2e6c;
    transition: 0.3s;
}
.nav-submenu .btn:hover {
    background-color: #173b8a;
    transform: translateY(-2px);
}
</style>

@endif
