<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Enums\Status as EnumStatus;
use App\Models\Images;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
    }

    public function add(Request $request)
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('seller.add-product', compact('categories', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $data = $request->only(['name', 'price', 'brand', 'code', 'description', 'category_id', 'color_id']);
        $product->status = EnumStatus::ACTIVE;
        $product->date = date("Y-m-d");
        $product->fill($data)->save();

        $sizes =  $request->size;
        foreach ($sizes as $key => $sizeId) {
            $size = Size::find($sizeId);
            $product->sizes()->save($size);
        }

        $imageLink = $request->input('imageLink');
        $imagesArray = explode("\n", $imageLink);
        foreach ($imagesArray as $key => $imagesurl) {
            $images = new Images();
            $images->delete_flag = 0;
            $images->name = 'name';
            $images->url = $imagesurl;
            $images->product_id = $product->id;
            $images->save();
        }

        return redirect()->action('Seller\ProductController@show', ['id' => $product->id]);
    }

    public function show(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $status = EnumStatus::getKeys();
        return view('seller.edit-product', compact('categories', 'product', 'colors', 'sizes', 'status'));
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->only(['name', 'code', 'price', 'brand', 'category_id', 'color_id']);
        $product->status = EnumStatus::getValue($request->status);
        $product->description = $request->description;
        $product->fill($data)->save();

        $sizes = $request->size;

        $product->sizes()->detach();

        foreach ($sizes as $key => $sizeId) {
            $size = Size::find($sizeId);
            $product->sizes()->save($size);
        }

        $image_link = $request->image_link;
        $imagesArray = explode("\n", $image_link);

        foreach ($imagesArray as $key => $imagesurl) {
            $images = new Images();
            $images->delete_flag = 0;
            $images->name = 'name';
            $images->url = $imagesurl;
            $images->product_id = $product->id;
            $images->save();
        }

        return redirect()->action('Seller\ProductController@show', ['id' => $product->id]);
    }

    public function index(Request $request)
    {
        $search_text = $request->search_text;
        $products = Product::where('name', 'LIKE', '%' . $search_text . '%')->with('category')->paginate(9);
        return view('seller.product-manager', compact('products'));
    }

    public function deleteImages(Request $request, $id)
    {
        $img = Images::find($id);
        $img->delete();
        return redirect(url()->previous());
    }
}
