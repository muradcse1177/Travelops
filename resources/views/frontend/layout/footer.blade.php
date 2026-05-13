<!-- ================================ Article Section Start ======================================= -->

<!-- ============================ Call To Action Start ================================== -->
@if(@$c_info->name)
<div class="position-relative bg-cover py-5 bg-primary" style="background:url({{url('/public/b2c/assets/img/bg.jpg')}})no-repeat;"
     data-overlay="5">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="calltoAction-wraps position-relative py-5 px-4">
                    <div class="ht-40"></div>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11 text-center">

                            <div class="calltoAction-title mb-5">
                                <h4 class="text-light fs-2 fw-bold lh-base m-0">Subscribe & Get<br>Special Discount with {{@$c_info->name}}
                                </h4>
                            </div>
                            <div class="newsletter-forms mt-md-0 mt-4">
                                {{ Form::open(array('url' => 'subscribe',  'method' => 'post' ,'class' =>'form-horizontal')) }}
                                    <div class="row align-items-center justify-content-between bg-white rounded-3 p-2 gx-0">

                                        <div class="col-xl-9 col-lg-8 col-md-8">
                                            <div class="form-group m-0">
                                                <input type="email" class="form-control bold ps-1 border-0"  name="email" placeholder="Enter Your Mail!" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4">
                                            <div class="form-group m-0">
                                                <button type="submit" class="btn btn-primary fw-medium full-width">Submit<i
                                                        class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                {{ Form::close() }}
                            </div>

                        </div>
                    </div>
                    <div class="ht-40"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Call To Action Start ================================== -->


<!-- ============================ Footer Start ================================== -->
<footer class="footer " style="background: white;">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <div class="d-flex align-items-start flex-column mb-3">
                            <div class="d-inline-block"><img src="{{url('/'.@$c_info->logo)}}" class="img-fluid" width="160"
                                                             alt="Footer Logo"></div>
                        </div>
                        <div class="footer-add pe-xl-3">
                            <p style="color: #04107C;">{{@$c_info->tagline}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Important Link</h4>
                        <ul class="footer-menu">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('visa')}}">Visa</a></li>
                            <li><a href="{{url('tour-package')}}">Tour Package</a></li>
                            <li><a href="{{url('')}}">Educations</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Important Link</h4>
                        <ul class="footer-menu">
                            <li><a href="{{url('hajj-umrah')}}">Hajj Umrah</a></li>
                            <li><a href="{{url('services')}}">Services</a></li>
                            <li><a href="{{url('work-permit')}}">Work Permit</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Our Resources</h4>
                        <ul class="footer-menu">
                            <li><a href="{{url('about-us')}}">About Us</a></li>
                            <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                            <li><a href="{{url('blogs')}}">Blogs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">The Company</h4>
                        <ul class="footer-menu">
                            <li><a href="{{url('terms-conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{url('refund-policy')}}">Refund Policy</a></li>
                            <li><a href="{{url('cookie-policy')}}">Cookie Policy</a></li>
                            <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Social Links</h4>
                        <div class="foot-socials" style="margin-top: -10px;">
                            <ul>
                                <li style="border: solid 1px #04107C;"><a href="{{@$c_info->f_link}}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                                <li style="border: solid 1px #04107C;"><a href="{{@$c_info->in_link}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li style="border: solid 1px #04107C;"><a href="{{@$c_info->y_link}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ssl" style="margin-top: -90px;">
                    <img style="height: 120px; width: 100%;" src="{{url('/public/ssl_gat.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom border-top" style="background: white;">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <p class="mb-0" style="color: #04107C;">All rights reserved by {{@$c_info->name}} © 2021 -<?php echo date('Y')?></p>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <center>
                        <p class="mb-0" style="color: #ef2874;"> Trade Licence No:  TRAD/DNCC/051155/2023 </p>
                    </center>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4" >
                    <ul class="p-0 d-flex justify-content-start justify-content-md-end text-start text-md-end m-0" >
                        <li><a href="{{url('terms-conditions')}}" style="color: #04107C;">Terms of services</a></li>
                        <li class="ms-3"><a href="{{url('privacy-policy')}}" style="color: #04107C;">Privacy Policies</a></li>
                        <li class="ms-3"><a href="{{url('cookie-policy')}}" style="color: #04107C;">Cookies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->
<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>
</div>
@endif
<script src="{{url('/public/b2c/assets/js/jquery.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/popper.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/dropzone.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/flatpickr.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/flickity.pkgd.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/lightbox.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/rangeslider.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/select2.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/counterup.min.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/prism.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/addadult.js')}}"></script>
<script src="{{url('/public/b2c/assets/js/custom.js')}}"></script>
<script src="{{url('/public/b2c_custom.js')}}"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(event) {
        $(".cAreaLink").click(function(){
            $('.c_sign_div').show();
            $('.a_sign_div').hide();
        });
        $(".aAreaLink").click(function(){
            $('.c_sign_div').hide();
            $('.a_sign_div').show();
        });
    });
    (function($) {
        $(document).ready(function(event) {
            $('.loadingstart').click(function() {
                $('.loading').toggle('show');
                $('a').attr('disable','true');
            });
        });
    })(jQuery);

    $(document).ready(function () {
        function showDivOnMobile() {
            if ($(window).width() >= 768) {
                $('.ssl').show();
            } else {
                $('.ssl').hide(); // optional: hide on desktop
            }
        }

        showDivOnMobile(); // on load
        $(window).resize(showDivOnMobile); // on resize
    });
    const loader = document.getElementById("site-loader");

    function showLoader() {
        loader.style.display = "flex";
    }
    function hideLoader() {
        loader.style.display = "none";
    }

    /* CLICK HANDLER — MOBILE SAFE */
    document.addEventListener("click", function (e) {

        // Find closest anchor tag
        const aTag = e.target.closest("a");

        // If no anchor tag → do NOT show loader
        if (!aTag) return;

        // Fetch href
        const href = aTag.getAttribute("href");

        // If href missing → ignore
        if (!href || href.trim() === "") return;

        // HASH links (#section) → ignore
        if (href.startsWith("#")) return;

        // JS links → ignore
        if (href.startsWith("javascript")) return;

        // tel:, mailto: → ignore (mobile dialer)
        if (href.startsWith("tel:") || href.startsWith("mailto:")) return;

        // Links that only toggle dropdown/collapse → ignore
        if (
            aTag.dataset.toggle === "dropdown" ||
            aTag.dataset.toggle === "collapse" ||
            aTag.classList.contains("dropdown-toggle")
        ) return;

        // Menu/Hamburger toggle → ignore
        if (
            aTag.classList.contains("nav-toggle") ||
            aTag.classList.contains("menu-toggle") ||
            aTag.getAttribute("data-widget") === "pushmenu"
        ) return;

        // If opens in new tab → ignore
        if (aTag.target === "_blank") return;

        // 🔥 TRUE PAGE NAVIGATION → SHOW LOADER
        showLoader();
    });

    /* FORM SUBMIT */
    document.addEventListener("submit", function () {
        showLoader();
    });

    /* PAGE LOADED */
    window.addEventListener("load", hideLoader);

    /* BEFORE UNLOAD */
    window.addEventListener("beforeunload", showLoader);

    /* BACK/FORWARD CACHE FIX */
    window.addEventListener("pageshow", function () {
        hideLoader();
    });

</script>
<script>
    // $(function(){
    //     // 1) Disable copy and cut from the page
    //     $(document).on('copy cut', function(e){
    //         var tgt = e.target || e.srcElement;
    //         var tag = (tgt.tagName || '').toLowerCase();
    //         var isEditable = (tag === 'input' || tag === 'textarea' || $(tgt).is('[contenteditable="true"]') || $(tgt).closest('[contenteditable="true"]').length);
    //         if (!isEditable) {
    //             e.preventDefault();
    //         }
    //     });
    //     $(document).on('contextmenu', function(e){
    //         var tgt = e.target || e.srcElement;
    //         var tag = (tgt.tagName || '').toLowerCase();
    //         var isEditable = (tag === 'input' || tag === 'textarea' || $(tgt).is('[contenteditable="true"]') || $(tgt).closest('[contenteditable="true"]').length);
    //         if (!isEditable) {
    //             e.preventDefault();
    //         }
    //     });
    //
    //     // 4) Disable selectstart (text selection) only for non-editable areas so users can still select & paste into inputs
    //     $(document).on('selectstart', function(e){
    //         var tgt = e.target || e.srcElement;
    //         var tag = (tgt.tagName || '').toLowerCase();
    //         var isEditable = (tag === 'input' || tag === 'textarea' || $(tgt).is('[contenteditable="true"]') || $(tgt).closest('[contenteditable="true"]').length);
    //         if (!isEditable) {
    //             e.preventDefault();
    //         }
    //     });
    //
    //     // 5) Prevent dragging images/files from the page (non-editable)
    //     $(document).on('dragstart', function(e){
    //         var tgt = e.target || e.srcElement;
    //         var tag = (tgt.tagName || '').toLowerCase();
    //         var isEditable = (tag === 'input' || tag === 'textarea' || $(tgt).is('[contenteditable="true"]') || $(tgt).closest('[contenteditable="true"]').length);
    //         if (!isEditable) {
    //             e.preventDefault();
    //         }
    //     });
    //
    //     // 6) Keyboard shortcuts: block copy/cut shortcuts when focus is NOT in editable fields.
    //     $(document).on('keydown', function(e){
    //         var kc = e.which || e.keyCode;
    //         var tgt = e.target || e.srcElement;
    //         var tag = (tgt.tagName || '').toLowerCase();
    //         var isEditable = (tag === 'input' || tag === 'textarea' || $(tgt).is('[contenteditable="true"]') || $(tgt).closest('[contenteditable="true"]').length);
    //
    //         // If Ctrl/Cmd pressed and focus is NOT in editable element, block C (copy) and X (cut)
    //         if ((e.ctrlKey || e.metaKey) && !isEditable) {
    //             // 67=C, 88=X
    //             if ($.inArray(kc, [67, 88]) !== -1) {
    //                 e.preventDefault();
    //                 return false;
    //             }
    //         }
    //     });
    //
    //     // 7) Prevent middle-click / ctrl+click opening images/links in new tab, only for non-editable regions
    //     $(document).on('mousedown', function(e){
    //         var tgt = e.target || e.srcElement;
    //         var tag = (tgt.tagName || '').toLowerCase();
    //         var isEditable = (tag === 'input' || tag === 'textarea' || $(tgt).is('[contenteditable="true"]') || $(tgt).closest('[contenteditable="true"]').length);
    //         if (!isEditable && (e.which === 2 || e.ctrlKey || e.metaKey)) {
    //             e.preventDefault();
    //             return false;
    //         }
    //     });
    //
    // });
</script>
</body>

</html>
