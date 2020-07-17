<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Little Closet</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
    <link href="{{ url('/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ url('/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ url('/plugins/flexslider/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/styles/product.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/styles/comment.css') }}">
</head>

<body>
    @include('layouts.mobile-menu')

    <div class="super_container">
        @include('layouts.header')
        @yield('content')
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- script -->
    <script src="{{ url('/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('/styles/bootstrap-4.1.2/popper.js') }}"></script>
    <script src="{{ url('/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
    <script src="{{ url('/plugins/greensock/TweenMax.min.js') }} "></script>
    <script src="{{ url('/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ url('/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ url('/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ url('/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ url('/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ url('/plugins/easing/easing.js') }}"></script>
    <script src="{{ url('/plugins/progressbar/progressbar.min.js') }}"></script>
    <script src="{{ url('/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ url('/js/custom.js') }}"></script>
    <script src="{{ url('/js/product-script-custom.js') }}"></script>

    <script src="{{ url('/plugins/flexslider/jquery.flexslider-min.js') }}"></script>
    <script src="{{ url('/js/product.js') }}"></script>
    <script src="{{ url('/js/product-script-custom.js') }}"></script>
</body>

</html>