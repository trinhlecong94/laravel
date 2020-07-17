<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{

    private $productService;
 
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $data = $this->productService->pagination();
        return view('pages.home', compact('data'));
    }

    public function product(Request $request,$id)
    {
        $product= $this->productService->findById($id);
        return view('pages.product', compact('product'));
    }

    public function category(Request $request,$id)
    {
        $data = $this->productService->findByCategory($id);
        return view('pages.home', compact('data'));
    }
}
