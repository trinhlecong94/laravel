@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Product manager</div>
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

                <form method="POST" action="add-product">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name <span style="color: red">(*)</span></th>
                                <td><input type="text" name="name" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td><input type="text" name="brand" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Code <span style="color: red">(*)</span></th>
                                <td><input type="text" name="code" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><textarea name="description" rows="3" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <th>Price <span style="color: red">(*)</span></th>
                                <td><input type="number" name="price" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <th>Color</th>
                                <td>
                                    <select class="form-control" name="color_id">
                                        @foreach($colors as $key => $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>
                                    @foreach($sizes as $key => $size)
                                    <label class="checkbox-inline"><input type="checkbox" name="size[{{ $size->id }}]" value="{{ $size->id }}">{{ $size->name }}</label>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Images link <span style="color: red">(*)</span></th>
                                <td><textarea name="imageLink" rows="6" class="form-control" required></textarea></td>
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