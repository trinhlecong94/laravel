<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Promotion;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Enums\Status as EnumStatus;
use App\Enums\OrderStatus as EnumOrderStatus;
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
        $input  = $request->input();
        $sizes = $input['size'];

        $imageLink = $request->input('imageLink');
        $imagesArray = explode("\n", $imageLink);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->brand =  $request->input('brand');
        $product->code = $request->input('code');
        $product->description = $request->input('description');
        $product->category_id = $request->input('categoryId');
        $product->color_id = $request->input('colorId');
        $product->status = EnumStatus::ACTIVE;

        $product->date = date("Y-m-d");
        $product->save();

        foreach ($sizes as $key => $sizeId) {
            $size = Size::find($sizeId);
            $product->sizes()->save($size);
        }

        foreach ($imagesArray as $key => $imagesurl) {
            $images = new Images();
            $images->delete_flag = 0;
            $images->name = 'name';
            $images->url = $imagesurl;
            $images->product_id = $product->id;
            $images->save();
        }

        return view('pages.add-product');
    }

    public function show(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $status = EnumStatus::getKeys();
        return view('seller.edit-product', compact('categories', 'product', 'colors', 'sizes', 'status'));
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->brand =  $request->input('brand');
        $product->category_id = $request->input('categoryId');
        $product->color_id = $request->input('colorId');
        $product->status = EnumStatus::getValue($request->input('status'));
        $product->description = $request->input('description');

        $sizes = $request->size;
        $product->save();

        $product->sizes()->detach();

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

        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $status = EnumStatus::getKeys();
        return view('seller.edit-product', compact('categories', 'product', 'colors', 'sizes', 'status'));
    }

    public function index(Request $request)
    {
        $searchText = $request->input('searchText');
        $products = Product::where('name', 'LIKE', '%' . $searchText . '%')->with('category')->paginate(9);
        return view('seller.product-manager', compact('products'));
    }

    public function deleteImages(Request $request, $id)
    {
        echo url()->previous();
        $img = Images::find($id);
        $img->delete();
        return redirect(url()->previous());
    }
}
