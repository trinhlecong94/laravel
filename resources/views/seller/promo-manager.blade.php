@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Promotion manager</div>
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
                <button class="btn btn-primary" onclick="location.href = '/seller/add-promo'">Add promotion</button>
            </div>
            <div class="col-xs-6 col-sm-6">
                <!-- TODO -->
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
                        <th>Promotion ID</th>
                        <th>Name</th>
                        <th>Discount</th>
                        <th>Product ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($promos as $key => $promo)
                    <tr>
                        <td class="align-middle">{{ $promo->id }}</td>
                        <td class="align-middle">{{ $promo->name }}</td>
                        <td class="align-middle">{{ $promo->discount }}</td>
                        <td class="align-middle">
                            @foreach($promo->products as $key => $product )
                            {{ $product->name }}
                            <br>
                            @endforeach
                        </td>
                        <td class="align-middle">{{ $promo->start_date }}</td>
                        <td class="align-middle">{{ $promo->end_date }}</td>
                        @if($promo->statusToString()=="ACTIVE")
                        <td class="align-middle" style="color: blue">{{$promo->statusToString()}}</td>
                        @else
                        <td class="align-middle" style="color: red">{{$promo->statusToString()}}</td>
                        @endif
                        <td class="align-middle"><a href="/seller/edit-promo/{{$promo->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row page_nav_row">
            <div class="col">
                <div class="page_nav">
                    <ul class="d-flex flex-row align-items-start justify-content-center">
                        {{ $promos->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection