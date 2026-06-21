<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="themexriver">

    <!-- Page Title -->
    <title>{{ $setting?->meta_title ?? ($setting?->brand_name ?? 'HSGA School') }}</title>

    <!-- SEO Meta Tags -->
    @if ($setting?->meta_description)
        <meta name="description" content="{{ $setting->meta_description }}">
    @endif
    @if ($setting?->meta_keywords)
        <meta name="keywords" content="{{ $setting->meta_keywords }}">
    @endif

    <!-- Favicon and Touch Icons -->
    <link href="{{ $setting?->favicon_url ?? asset('static/logo/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ $setting?->favicon_url ?? asset('static/logo/favicon.png') }}" rel="apple-touch-icon">

    <!-- Icon fonts -->
    <link href="{{ asset('assets/web/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/flaticon.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/web/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Plugins for this template -->
    <link href="{{ asset('assets/web/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/magnific-popup.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/custom.css') }}" rel="stylesheet">

    @stack('pageStyles')

</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        @include('layouts._web.loader')
        <!-- end preloader -->

        <!-- Start header -->
        <header class="site-header header-style-2">
            @include('layouts._web.topbar')
            @include('layouts._web.bottom-bar')
            @include('layouts._web.navbar')
        </header>
        <!-- end of header -->


        {{ $slot }}


        <!-- start footer-->
        @include('layouts._web.footer')
        <!-- end footer-->

    </div>
    <!-- end of page-wrapper -->


    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('assets/web/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>

    <!-- Plugins for this template -->
    <script src="{{ asset('assets/web/js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('assets/web/js/portfolio.js') }}"></script>

    <!-- Custom script for this template -->
    <script src="{{ asset('assets/web/js/script.js') }}"></script>

    @stack('pageScripts')

    <a class="floating-whatsapp" href="https://wa.me/910000000000" target="_blank" rel="noopener noreferrer"
        aria-label="Chat on WhatsApp">
        <span class="floating-whatsapp-icon" aria-hidden="true">
            <i class="fa fa-whatsapp"></i>
        </span>
        <span class="floating-whatsapp-text">Enquiry</span>
    </a>
</body>

</html>
