@extends('layouts.app')

@section('content')
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-6 offset-lg-3">
                <div class="section_title text-center">Edit Product</div>
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
                <form action="" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <input type="hidden" name="id" id="productid" value="${product.id}" />
                            <tr>
                                <th>Name <span style="color: red">(*)</span></th>
                                <td><input type="text" name="name" value="{{ $product->name }}" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td><input type="text" name="brand" value="{{ $product->brand }}" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Code <span style="color: red">(*)</span></th>
                                <td><input type="text" name="code" value="{{ $product->code }}" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <select class="form-control" name="categoryId">
                                        @foreach($categories as $key => $category)
                                        <option value="{{ $category->id }}" @if($product->category->id == $category->id) selected @endif >
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea></td>
                            </tr>
                            <tr>
                                <th>Price <span style="color: red">(*)</span></th>
                                <td><input type="number" name="price" value="{{ $product->price }}" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Color</th>
                                <td>
                                    <select class="form-control" name="colorId">
                                        @foreach($colors as $key => $color)
                                        <option value="{{ $color->id }}" @if($product->color->id == $color->id) selected @endif >
                                            {{ $color->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Size <span style="color: red">(*)</span></th>
                                <td>
                                    @foreach($sizes as $key => $size)
                                    {{ $check=false }}
                                    @foreach($product->sizes as $key => $productSize)
                                    @if($productSize->id== $size->id)
                                    {{ $check=true }}
                                    @endif
                                    @endforeach
                                    @if( $check==true )
                                    <label class="checkbox-inline"><input type="checkbox" name="size[{{ $loop->index }}]" value="{{ $size->id }}" checked>{{ $size->name }}</label>
                                    @else
                                    <label class="checkbox-inline"><input type="checkbox" name="size[{{ $loop->index }}]" value="{{ $size->id }}">{{ $size->name }}</label>
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Images link <span style="color: red">(*)</span></th>
                                <td>
                                    <div id="img_list">
                                        @foreach($product->images as $key => $img)
                                        <div class="productpic" id="productpic_{{ $img->id }}">
                                            <img src="{{ $img->url }}" class="img-thumbnail" width="150" height="200" />
                                            <button type="button" class="btn" imgid="{{ $img->id }}" onclick="location.href='/seller/images/delete/{{ $img->id }}'">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                    Images link
                                    <textarea name="imageLink" rows="6" class="form-control" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @foreach($status as $key => $value)
                                    <label class="radio-inline" style="margin-right: 7px">
                                        <input type="radio" name="status" value="{{ $value }}" @if($product->statusToString() == $value)
                                        checked
                                        @endif >
                                        {{ $value }}
                                    </label>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12" style="text-align: center">
                            <input type="submit" value="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>


@endsection