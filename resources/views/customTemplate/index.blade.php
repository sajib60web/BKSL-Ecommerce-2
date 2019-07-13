<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="http://localhost/BK-E-commerce/public/backEnd/assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/bootstrap4/bootstrap.min.css">
    <link href="{{ asset('/customTemplate') }}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/customTemplate') }}/styles/responsive.css">    
</head>
<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            @include('customTemplate.include.header.index')
        </header>

        <!-- main Content -->
        @yield('mainContent')
        <!--End main Content -->
        
        <!-- Footer -->
        @include('customTemplate.include.footer.index')
        <!-- Footer -->
    </div>

    <script src="{{ asset('/customTemplate') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('/customTemplate') }}/styles/bootstrap4/popper.js"></script>
    <script src="{{ asset('/customTemplate') }}/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/greensock/TweenMax.min.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/greensock/TimelineMax.min.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/greensock/animation.gsap.min.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/slick-1.8.0/slick.js"></script>
    <script src="{{ asset('/customTemplate') }}/plugins/easing/easing.js"></script>
    <script src="{{ asset('/customTemplate') }}/js/custom.js"></script>
</body>
</html>