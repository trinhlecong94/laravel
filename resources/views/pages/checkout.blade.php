@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/styles/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('/styles/checkout_responsive.css') }}">
<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->
    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title">Checkout</div>
                <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                    <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                        <li><a href="#">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout -->
    <form method="POST" action="/checkout-process">
        @csrf
        <div class="checkout">
            <div class="container">
                <div class="row">
                    <!-- Billing -->
                    <div class="col-lg-6">
                        <div class="billing">
                            <div class="checkout_title">Shipping</div>
                            <div class="checkout_form_container">
                                @auth
                                <div>
                                    <input type="text" id="checkout_name" name="fullName" class="checkout_input" value="${Auth::user()->full_name}}" placeholder="Full Name" pattern="[A-Za-z ]{3,50}" title="Only letters and space are allowed, length 3-50" required>
                                </div>
                                <div>
                                    <input type="text" id="checkout_address" name="address" class="checkout_input" value="{{Auth::user()->address}}" placeholder="Address Line" required>
                                </div>
                                <div>
                                    <input type="text" id="checkout_phone" name="phone" class="checkout_input" value="{{Auth::user()->phone}}" placeholder="Phone No." title="Only numbers are allowed, length 10-11" required>
                                </div>
                                <div>
                                    <input type="email" id="checkout_email" name="email" class="checkout_input" value="{{Auth::user()->email}}" placeholder="Email" required>
                                </div>
                                @endauth
                                @guest
                                <div>
                                    <input type="text" id="checkout_name" name="fullName" class="checkout_input" placeholder="Full Name" pattern="[A-Za-z ]{3,50}" title="Only letters and space are allowed, length 3-50" required>
                                </div>
                                <div>
                                    <input type="text" id="checkout_address" name="address" class="checkout_input" placeholder="Address Line" required>
                                </div>
                                <div>
                                    <input type="text" id="checkout_phone" name="phone" class="checkout_input"  placeholder="Phone No." title="Only numbers are allowed, length 10-11" required>
                                </div>
                                <div>
                                    <input type="email" id="checkout_email" name="email" class="checkout_input"  placeholder="Email" required>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <!-- Cart Total -->
                    <div class="col-lg-6 cart_col">
                        <div class="cart_total">
                            <div class="cart_extra_content cart_extra_total">
                                <div class="checkout_title">Cart Total</div>
                                <ul class="cart_extra_total_list">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Subtotal</div>
                                        <div class="cart_extra_total_value ml-auto">{{ $order->getOrderTotal() }}</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Shipping</div>
                                        <div class="cart_extra_total_value ml-auto">Free</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Total</div>
                                        <div class="cart_extra_total_value ml-auto">{{ $order->getOrderTotal() }}</div>
                                    </li>
                                </ul>
                                <button class="checkout_button trans_200" type="submit"><span>place order</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection