<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{

    private $productService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = $this->productService->pagination();
        return view('pages.home', compact('data'));
    }

    public function product(Request $request,$id)
    {
        $product= $this->productService->findById($id);
        // echo '<pre>'.var_export($product->colors,true)."</pre>";
        // die();
        return view('pages.product', compact('product'));
    }
}
