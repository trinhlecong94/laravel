@extends('layouts.app')

@section('content')
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
                                        ??
                                    </div>
                                    <div class="product_price text-right">{{ number_format($value->price, 1) }}</div>
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