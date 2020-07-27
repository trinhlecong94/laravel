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
    <link rel="stylesheet" type="text/css" href="{{ url('/styles/comment.css') }}">
</head>

<body>
    @include('layouts.mobile-menu')

    <div class="super_container">
        @include('layouts.header')

        <link rel="stylesheet" type="text/css" href="{{ url('/styles/main_styles.css') }}">
        <div class="super_container_inner">
            <div class="super_overlay"></div>
            <!-- Products -->
            <div class="products">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="section_title text-center">Newest on Little Closet</div>
                        </div>
                    </div>

                    <!-- TO DO -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="dropdown float-right">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/search?searchText='.app('request')->input('searchText').'&sort=Latest') }}">Latest</a>
                                    <a class="dropdown-item" href="{{ url('/search?searchText='.app('request')->input('searchText').'&sort=Oldest') }}">Oldest</a>
                                    <a class="dropdown-item" href="{{ url('/search?searchText='.app('request')->input('searchText').'&sort=HightoLow') }}">Price: High to Low</a>
                                    <a class="dropdown-item" href="{{ url('/search?earchText='.app('request')->input('searchText').'&sort=LowtoHigh') }}">Price: Low to High</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row products_row">
                        @if(!empty($data) && $data->count())
                        @foreach($data as $key => $value)
                        <div class="col-xl-4 col-md-6">
                            <div class="product">
                                <div class="product_image">
                                    <a href="/product/{{ $value->id }}">
                                        <img src="{{ $value->images[0]->url }}" alt="">
                                    </a>
                                </div>
                                <div class="product_content">
                                    <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div>
                                                <div class="product_name">
                                                    <a href="/product/{{ $value->id }}"> {{ $value->name}}</a>
                                                </div>
                                                <div class="product_category">In
                                                    <a href="/category/{{ $value->category->id }}">
                                                        {{ $value->category->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-auto text-right">
                                            <div class="rating_r">
                                                <i class="fa fa-heart fa-1x" style="color: #ff66a3" aria-hidden="true"></i>
                                                {{ count($value->Favorites) }}
                                            </div>
                                            <div class="product_price text-right">${{ number_format($value->price, 1) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-12" style="text-align: center">
                            <h3>We couldn't find any matches!</h3>
                        </div>
                        @endif
                    </div>
                    <div class="row justify-content-md-center">
                        {!! $data->appends(request()->query())->links() !!}
                    </div>
                </div>
            </div>
        </div>

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