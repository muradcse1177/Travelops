<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{csrf_token()}}">
     <link rel="icon" sizes="192x192" href="{{url('/public/dist/img/AdminLTELogo.png')}}">
    <title>@yield('title')</title>
    @include('ebooks.visa-course.layout.source')
</head>

<body>
    <!-- MOBILE MENU -->
    <div id="mobileMenuBtn" onclick="toggleSidebar()">☰ Menu</div>

    <!-- SIDEBAR -->
    @include('ebooks.visa-course.layout.sidebar')
    @include('ebooks.visa-course.layout.header')
    <!-- CONTENT -->
    <div id="content">
        @yield('content')
        <!-- FOOTER -->
        @include('ebooks.visa-course.includes.td-modal')
        @include('ebooks.visa-course.layout.footer')
    </div>
    <script>
        $('.index-item').on('click', function() {
            const link = $(this).data('link');
            if (link) window.location.href = link;
        });
    </script>

</body>

</html>