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
        <div class="row mainmain">
            <div class="col-xs-12 col-sm-12">

                <form action="" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered" style="color: #000">
                            <tr>
                                <th>Name <span style="color: red">(*)</span></th>
                                <td><input type="text" name="name" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Description <span style="color: red">(*)</span></th>
                                <td><input type="text" name="description" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Start date <span style="color: red">(*)</span></th>
                                <td><input type="date" name="start_date" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>End date <span style="color: red">(*)</span></th>
                                <td><input type="date" name="end_date" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Discount <span style="color: red">(*)</span></th>
                                <td><input type="number" name="discount" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Apply for products <span style="color: red">(*)</span></th>
                                <td>
                                    @foreach($products as $key => $product)
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="products[{{ $loop->index }}]" value="{{ $product->id }}">ID: {{ $product->id }} {{ $product->name }}</label>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection