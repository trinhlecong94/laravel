@extends('layouts.app')

@section('content')
<div class="super_container">

    <!-- Header -->
    <jsp:include page="../include/header.jsp" />

    <div class="super_container_inner">
        <div class="super_overlay"></div>
        <div class="container">
            <div class="row" style="margin-top: 100px">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">Order manager</div>
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
            <div class="row" style="margin-top: 3em">
                <div class="col-xs-6 col-sm-6">
                    <a href="{{ url('/downloadOrderExcel')}}"><i class="fa fa-download" aria-hidden="true"></i> Export to Excel</a>
                </div>
                <div class="col-xs-6 col-sm-6">
                    <form action="" class="form-inline" style="float: right">
                        <div class="form-group">
                            <input type="text" name="searchText" class="form-control" />
                            <button type="submit" class="btn btn-primary" style="margin-left: 5px">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mainmain">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($orders as $key => $order)
                        @foreach($order->orderDetails as $key => $orderDetail)
                        <tr>
                            @if($loop->index==0)
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">{{$order->id}}</td>
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">{{$order->date}}</td>
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">{{$order->account->username}}</td>
                            @endif
                            <td class="align-middle"><a href="/product/{{$orderDetail->product->id}}">{{$orderDetail->product->name}}</a></td>
                            <td class="align-middle">{{$orderDetail->size->name}}</td>
                            <td class="align-middle">{{$orderDetail->quantity}}</td>
                            <td class="align-middle">{{$orderDetail->product->price}}</td>
                            @if($loop->index == 0)
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">{{$order->prices}}</td>
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">{{$order->statusToString()}}</td>
                            <td class="align-middle" rowspan="{{count($order->orderDetails)}}">
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="orderID" value="{{ $order->id }}">
                                    <select class="form-control" name='status' onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value='0'>Change status</option>
                                        @foreach($status as $key => $s)
                                        <option value='{{$s}}'>{{$s}}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav">
                        <ul class="d-flex flex-row align-items-start justify-content-center">
                            {{ $orders->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection