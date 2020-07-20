@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <style>
        .img-thumbnail-list {
            width: 50px;
            height: 67px;
            margin-right: 10px;
        }
    </style>
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">My Order</div>
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-center">
                        @include('layouts.account-menu')
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mainmain">
            <div class="col-xs-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($orders as $key => $order)
                        @foreach($order->orderDetails as $key => $orderDetail)
                        <tr>
                            @if($loop->index==0)
                            <td class="align-middle" rowspan="{{ count($order->orderDetails) }}">{{$order->id}}</td>
                            <td class="align-middle" rowspan="{{ count($order->orderDetails) }}">{{$order->date}}</td>
                            @endif
                            <td class="align-middle"><a href="/product/{{$orderDetail->product->id}}"><img src="{{$orderDetail->product->images[0]->url}}" class="img-thumbnail-list" />{{$orderDetail->product->name}}</a>
                            </td>
                            <td class="align-middle">{{$orderDetail->size->name}}</td>
                            <td class="align-middle">{{$orderDetail->quantity}}</td>
                            <td class="align-middle">{{$orderDetail->product->price}}</td>
                            @if($loop->index==0)
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">{{$order->prices}}</td>
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">{{$order->statusToString()}}</td>
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">
                                @if($order->status=='PENDING')
                                <button onclick="cancelOrder({{$order->id}})" class="btn"><i class="fa fa-trash"></i></button>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @endforeach
                        @if(count($orders)==0)
                        <tr>
                            <td colspan="9" style="text-align: center">No Order</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- profile -->
</div>
<script>
    function cancelOrder(id) {
        var r = confirm("Do you want to cancel an order with id: " + id);
        if (r == true) {
            window.location.href = "order/cancel/" + id;
        }
    }
</script>
@endsection