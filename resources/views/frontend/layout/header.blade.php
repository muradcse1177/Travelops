
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{url('/public/b2c/assets/images/Icon.png')}}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WX9PDZHD');</script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-15GYQ2MMEC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        // সব Measurement ID এখানে config করুন
        gtag('config', 'G-15GYQ2MMEC');
        gtag('config', 'G-D2KW1TQ0VD');
        gtag('config', 'G-L86XYEEKPT');
        gtag('config', 'G-TP4X0YPZE4');
    </script>
    <!-- End Google Tag Manager -->
    <!-- All Plugins -->
    <link href="{{url('/public/b2c/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/animation.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/dropzone.min.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/flatpickr.min.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/flickity.min.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/magnifypopup.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/rangeSlider.min.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/prism.css')}}" rel="stylesheet">

    <!-- Fontawesome & Bootstrap Icons CSS -->
    <link href="{{url('/public/b2c/assets/css/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('/public/b2c/assets/css/fontawesome.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('/public/b2c/assets/css/style.css')}}" rel="stylesheet">

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '553968797047208');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=553968797047208&ev=PageView&noscript=1"
        />
    </noscript>
    @if(app()->environment('production') && config('services.adsense.client'))
        @if (Request::is('blogs') || Request::is('blog/*'))
            <script async
                    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ config('services.adsense.client') }}"
                    crossorigin="anonymous"></script>
        @endif
    @endif

    <style>
        #suggest-list {
            float: left;
            list-style: none;
            margin-top: -3px;
            padding: 0;
            width: 96%;
            position: absolute;
            z-index: 900;
            max-height: 200px;
            overflow-y: auto;

        }

        #suggest-list li {
            border-radius: 2px;
            padding: 10px;
            background: #f0f0f0;
            border-bottom: #04107C 1px solid;
        }

        #suggest-list li:hover {
            background: #ece3d2;
            cursor: pointer;
        }
        #suggest-list1 {
            float: left;
            list-style: none;
            margin-top: -3px;
            padding: 0;
            width: 23%;
            position: absolute;
            z-index: 900;
            max-height: 200px;
            overflow-y: auto;
        }
        @media only screen and (max-width: 600px) {
            #suggest-list1 {
                float: left;
                list-style: none;
                margin-top: -3px;
                padding: 0;
                width: 88%;
                position: absolute;
                z-index: 900;
                max-height: 200px;
                overflow-y: auto;
            }
        }
        #suggest-list1 li {
            border-radius: 2px;
            padding: 10px;
            background: #f0f0f0;
            border-bottom: #04107C 1px solid;
        }

        #suggest-list1 li:hover {
            background: #ece3d2;
            cursor: pointer;
        }
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #888;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #04107C;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        .loading{
            position: fixed;
            width: 300px;
            height: 160px;
            z-index: 9999;
            background: 50% 50% no-repeat rgb(249,249,249);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .error {
            color:red;
        }
        @media (max-width: 767.98px) {
            .header {
                position: sticky;
                top: 0;
                z-index: 1030;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }
        }
        .notification-grousp {
            list-style: none;
            margin: 0;
            padding: 0;
            display: block !important;
            text-align: left;   /* left align */
        }

        .notification-grousp li {
            display: block;
            margin: 0;
            text-align: left;
        }

        .notification-grousp li a {
            display: flex;
            align-items: flex-start;      /* ⬅️ উপরে/বামে ঠেলে দেয় (vertical axis) */
            justify-content: flex-start;  /* ⬅️ horizontal axis এ left align */
            text-align: left !important;  /* ⬅️ টেক্সট বামে */
            padding: 10px 16px;
            font-weight: 600;
            color: #0b214a;
            text-decoration: none;
            border-radius: 6px;
        }

        .notification-grousp li a:hover {
            background: #eef4ff;
        }

        .notification-grousp li i {
            width: 20px;
            text-align: left;
            margin-right: 8px;
        }
        @media (max-width: 991.98px) {
            .header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 2000;
            }

            /* header জায়গা compensate করা—আপনার header এর প্রকৃত height অনুযায়ী ঠিক করুন */
            body {
                padding-top: 72px; /* header এর উচ্চতা */
            }
        }
        .modal {
            z-index: 9999 !important;
        }
        .modal-backdrop {
            z-index: 9998 !important;
        }
        .nav-pills .nav-item {
            margin-bottom: 8px;
        }
        /* Fullscreen Overlay */
        .loader-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.85);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 99999;
        }

        /* Spinner */
        .loader-spinner {
        border: 8px solid #e1e1e1;
        border-top: 8px solid #1e058f;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 0.9s linear infinite;
        }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
        }
    /* Floating Social Buttons */
        .floating-buttons {
        position: fixed;
        right: 10px;
        bottom: 10px;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 9999;
        }

        .float-btn {
        width: 55px;
        height: 55px;
        background: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.25);
        transition: 0.3s;
        }

        .float-btn img {
        width: 28px;
        }

        .float-btn:hover {
        transform: scale(1.15);
        }

        /* WhatsApp */
        .whatsapp {
        border: 2px solid #25d366;
        }

        /* Messenger */
        .messenger {
        border: 2px solid #0084ff;
        }

        /* Messenger */
        .payment {
        border: 2px solid #eb920e;
        }

    </style>
</head>
