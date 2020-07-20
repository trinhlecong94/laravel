@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ url('/styles/cart.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('/styles/cart_responsive.css') }}">
<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title">Shopping Cart</div>
                <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                </div>
            </div>
        </div>
    </div>

    <!-- Cart -->
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cart_container">
                        <!-- Cart Bar -->
                        <div class="cart_bar">
                            <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                <li class="mr-auto">Product</li>
                                <li>Size</li>
                                <li>Price</li>
                                <li>Quantity</li>
                                <li>Total</li>
                                <li style="width: 100px">Action</li>
                            </ul>
                        </div>

                        <!-- Cart Items -->
                        <div class="cart_items">
                            <ul class="cart_items_list">
                                @if($order!=null)
                                @foreach($order->orderDetails as $key=>$orderDetail )
                                <!-- Cart Item -->
                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                        <div>
                                            <div class="product_image"><img src=" {{ $orderDetail->product->images[0]->url }}" alt=""></div>
                                        </div>
                                        <div class="product_name_container">
                                            <div class="product_name"><a href=/product/ {{ $orderDetail->product->id }}>{{ $orderDetail->product->name }} </a> </div>

                                        </div>
                                    </div>
                                    <div class="product_size product_text"><span>Size: </span>{{ $orderDetail->size->name }}</div>
                                    <div class="product_price product_text"><span>Price: </span>{{ $orderDetail->product->price }}</div>
                                    <div class="product_quantity_container">
                                        <div>
                                            <input type="number" id="quantity_{{ $loop->index }}" name="quantity" value="{{ $orderDetail->quantity }}" min="1" max="99">
                                        </div>
                                    </div>
                                    <div class="product_total product_text"><span>Total: </span>{{ $orderDetail->getTotal() }}</div>
                                    <div style="width: 100px">
                                        <button class="btn" onclick="window.location.href='/order/update/{{ $orderDetail->product->id }}/{{ $orderDetail->size->id }}/'+document.getElementById('quantity_{{ $loop->index }}').value"><i class="fa fa-refresh"></i></button>
                                        <button class="btn" onclick="window.location.href='/order/delete/{{ $orderDetail->product->id }}/{{ $orderDetail->size->id }}'"><i class="fa fa-trash"></i></button>
                                    </div>
                                </li>
                                @endforeach
                                @else
                                <li style="text-align: center">
                                    <h3>Your cart is empty</h3>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Cart Buttons -->
                        <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                            <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                @if(($order!=null) && (count($order->orderDetails) >0))
                                <div class="button button_clear trans_200">
                                    <a href="{{ url('order/clear') }}">
                                        clear cart
                                    </a>
                                </div>
                                @endif
                                <div class="button button_continue trans_200">
                                    <a href="{{ url('/home') }}">
                                        continue shopping
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            @if(($order!=null) && (count($order->orderDetails) >0))
            <div class="row cart_extra_row">
                <div class="col-lg-6">
                    <div class="cart_extra cart_extra_1">
                        <div class="cart_extra_content cart_extra_coupon">
                            <div class="cart_extra_title">Coupon code</div>

                            <!-- <div class="coupon_form_container">
                                <form action="${pageContext.request.getContextPath()}/apply-promotion" method="post" id="coupon_form" class="coupon_form">
                                    <input type="text" name="promotion_name" class="coupon_input" required="required">
                                    <button type="submit" class="coupon_button">apply</button>
                                </form>
                            </div> -->


                            <div class="coupon_text">List of promotional codes applied:</div>
                            <br>
                            <br>
                            <div class="cart_extra_title">TODO</div>

                            <!-- <div style="margin-top: 15px">
                                <ul class="list-group list-group-flush">
                                    @foreach($order->orderDetails as $key => $orderDetail)
                                    @if($orderDetail->product->promotions != null)
                                    <li class="list-group-item">
                                        {{ $orderDetail->product->promotions }}
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 cart_extra_col">
                    <div class="cart_extra cart_extra_2">
                        <div class="cart_extra_content cart_extra_total">
                            <div class="cart_extra_title">Cart Total</div>
                            <ul class="cart_extra_total_list">
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Subtotal</div>
                                    <div class="cart_extra_total_value ml-auto">{{$order->getOrderTotal()}}</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Discount</div>
                                    <div class="cart_extra_total_value ml-auto">TODO</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Shipping</div>
                                    <div class="cart_extra_total_value ml-auto">Free</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Total</div>
                                    <div class="cart_extra_total_value ml-auto">{{$order->getOrderTotal()}}</div>
                                </li>
                            </ul>
                            <div class="checkout_button trans_200">
                                <a href="{{ url('/checkout') }}">
                                    proceed to checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endsection