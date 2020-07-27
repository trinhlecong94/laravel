<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Enums\Status as EnumStatus;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function __construct()
    {
    }

    public function show(Request $request, $id)
    {
        $promotion = Promotion::find($id);
        $products = Product::all();
        $status = EnumStatus::getkeys();
        return view('seller.edit-promo', compact('promotion', 'products', 'status'));
    }

    public function store(Request $request, $id)
    {
        $promotion = Promotion::find($id);
        $promotion->name = $request->name;
        $promotion->discount = $request->discount;
        $promotion->description = $request->description;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->status = EnumStatus::getValue($request->status);

        $products = $request->products;
        $promotion->products()->detach();

        $promotion->save();
        foreach ($products as $key => $product) {
            $promotion->products()->save(Product::find($product));
        }

        $products = Product::all();
        $status = EnumStatus::getkeys();
        return view('seller.edit-promo', compact('promotion', 'products', 'status'));
    }

    public function index(Request $request)
    {
        $searchText = $request->input('searchText');
        $promos = Promotion::where('name', 'LIKE', '%' . $searchText . '%')->with('products')->paginate(9);
        return view('seller.promo-manager', compact('promos'));
    }

    public function add(Request $request)
    {
        $products = Product::all();
        return view('seller.add-promo', compact('products'));
    }
}
