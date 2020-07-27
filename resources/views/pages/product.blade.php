@extends('layouts.app')
@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <!-- Product -->
    <div class="product">
        <div class="container">
            <div class="row">
                <!-- Product Image -->
                <div class="col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($product->images as $key => $image)
                            @if($loop->index ==0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="active"></li>
                            @endif
                            @if($loop->index >0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"></li>
                            @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($product->images as $key => $image)
                            @if($loop->index ==0)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ $image->url }}">
                            </div>
                            @endif
                            @if($loop->index >0)
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ $image->url }}">
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- Product Info -->
                <div class="col-lg-6 product_col">
                    <div class="product_info">
                        <div class="product_name">
                            {{ $product->name }}
                        </div>
                        <div class="product_category">In
                            <a href="/category/{{ $product->category->id }}">
                                {{ $product->category->name }}
                            </a>
                        </div>
                        <div class="product_rating_container d-flex flex-row align-items-center justify-content-start">
                            <div class="product_reviews">
                                <i class="fa fa-heart fa-1x" style="color: #ff66a3" aria-hidden="true"></i>
                                {{ count($product->Favorites) }}
                            </div>
                        </div>
                        <div class="product_price">
                            {{ number_format($product->price, 1) }}
                        </div>
                        <div class="product_size">
                            <div class="product_size_title">
                                Select Size
                            </div>
                            <ul class="d-flex flex-row align-items-start justify-content-start">
                                @foreach($product->sizes as $key => $size)
                                <li>
                                    <input type="radio" id="radio_{{ $loop->index+1 }}" name="product_size_radio" value="{{ $size->id }}" class="regular_radio" @if($loop->index==0) checked @endif>
                                    <label for="radio_{{ $loop->index+1 }}">{{ $size->name }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            @if($product->promotions->count()>0)
                            <p style="font-weight: bold;color: red">Promotions: </p>
                            @foreach($product->promotions as $key => $promotion)
                            <p>{{ $promotion->name }} - {{ $promotion->description }} </p>
                            @endforeach
                            @endif
                        </div>
                        <div class="product_text">
                            <p>Product Color: {{ $product->color->name }}</p>
                            <p>Product Code: {{ $product->code }}</p>
                            <p>Brand: {{ $product->brand }}</p>
                            <p>Description: {{ $product->description }}</p>
                        </div>
                        <div class="product_buttons">
                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center" productId="${product.id}">
                                    <div>
                                        <div>
                                            @if(count($favorited)!=0)
                                            <i id="favicon" class="fa fa-heart fa-3x" style="color: #ff66a3" aria-hidden="true" onclick="location.href = '/product/favorite/{{ $product->id }}'"></i>
                                            @else
                                            <i id="favicon" class="fa fa-heart-o fa-3x" style="color: #ff66a3" aria-hidden="true" onclick="location.href = '/product/favorite/{{ $product->id }}'"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center" onclick="location.href = '/order/{{ $product->id }}' + '/'+getSizeSelected();">
                                    <div>
                                        <div><img src="/images/cart.svg" class="svg" alt="">
                                            <div>+</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="comments" id="comments">
        <div class='container'>
            @if($product->comments->count()>0)
            <h2 class="comment-header">{{ $product->comments->count() }} Comments</h2>
            @foreach($product->comments as $key => $comment)
            <div class="media comment-box">
                <div class="media-left">
                    <a href="#">
                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->account->full_name }}
                        <span>
                            {{ $comment->date }}
                        </span>
                    </h4>
                    <p>{{ $comment->content }}</p>
                </div>
            </div>
            @endforeach
            @else
            <h2 class="comment-header">0 Comments</h2>
            @endif
            @auth
            <form action="{{ url('comment') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </div>
                <input type="hidden" name="productId" value="{{ $product->id }}" />
            </form>
            @endauth
        </div>
    </div>
</div>
@endsection