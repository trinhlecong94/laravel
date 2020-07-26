@extends('layouts.app')

@section('content')
<style>
    .table-footer {
        font-weight: bold;
    }

    .order-info p {
        color: #000;
        font-weight: bold;
        margin-bottom: 1em;
    }

    .mainmain>div>div:first-child {
        float: left;
    }

    .mainmain>div>div:nth-of-type(2) {
        float: right;
        margin-bottom: 2em;
    }
</style>
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Order detail</div>
            </div>
        </div>
        <br>
        <br>
        <div class="row mainmain">
            <div class="col-xs-12 col-sm-12">
                <div class="col-xs-6 col-sm-6">
                    <div class="order-info">
                        <p>Order Information</p>
                        <span>Order Id: #{{ $order->id }}</span><br>
                        <span>Order Date: {{ $order->date }}</span><br>
                        <span>Order Status: {{ $order->statusToString() }}

                            @if($order->statusToString()!='CANCELLED')
                            <a href="{{ url('/account/order/cancel/'.$order->id) }}">
                                Cancel?
                            </a>
                            @endif
                        </span>
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6">
                    <div class="order-info">
                        <p>Shipping Information</p>
                        <span>Full name: {{ $order->shipping->full_name }}</span><br>
                        <span>Email: {{ $order->shipping->email }}</span><br>
                        <span>Phone: {{ $order->shipping->phone }}</span><br>
                        <span>Address: {{ $order->shipping->address }}</span>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $key => $orderDetail)
                            <tr>
                                <td>
                                    <a href="{{ url('product/'.$orderDetail->product->id) }}">
                                        {{ $orderDetail->product->name }}
                                    </a>
                                </td>
                                <td>{{ $orderDetail->size->name }}</td>
                                <td>{{ $orderDetail->product->price }}</td>
                                <td>{{ $orderDetail->quantity }}</td>
                                <td>{{ $orderDetail->getTotal() }}</td>
                            </tr>
                        @endforeach
                        <tr class="table-footer">
                            <td colspan="4">Total</td>
                            <td>{{ $order->getOrderTotal() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @endsection