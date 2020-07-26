@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;margin-top: 150px;margin-bottom: 300px;">
    @if( !isset($messageSuccess))
    <h1 style="color: blue">Thank you for your purchase</h1>
    <a href="{{ url('/order-detail/'.$orderId) }}">
        Click here to view order status
    </a>
    @else
    <h1 style="color: red">An error occurred on the server. Please try to place the order again</h1>
    @endif
</div>
@endsection