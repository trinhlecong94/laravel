<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Favorite;
use App\Services\ProductService;

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

    public function product(Request $request, $id)
    {
        $favorited = array();
        if (Auth::user() != null) {
            $favorited = Favorite::where('product_id', $id)->where('account_id', Auth::user()->id)->get();
        }
        $product = $this->productService->findById($id);
        return view('pages.product', compact('product', 'favorited'));
    }

    public function productSearch(Request $request)
    {
        $searchText = $request->searchText;
        $sort = $request->sort;
        if ($sort == 'Latest') {
            $data = Product::where('name', 'LIKE', '%' . $searchText . '%')->with('category')->orderBy('date', 'ASC')->paginate(9);
        } elseif ($sort == 'Oldest') {
            $data = Product::where('name', 'LIKE', '%' . $searchText . '%')->with('category')->orderBy('date', 'desc')->paginate(9);
        } elseif ($sort == 'HightoLow') {
            $data = Product::where('name', 'LIKE', '%' . $searchText . '%')->with('category')->orderBy('price', 'desc')->paginate(9);
        } else {
            $data = Product::where('name', 'LIKE', '%' . $searchText . '%')->with('category')->orderBy('price', 'ASC')->paginate(9);
        }

        return view('pages.home', compact('data'));
    }

    public function category(Request $request, $id)
    {
        $data = $this->productService->findByCategory($id);
        return view('pages.home', compact('data'));
    }

    public function comment(Request $request)
    {
        $product = Product::find($request->productId);

        $comment = new Comment();
        $comment->date = date("Y-m-d");
        $comment->content = $request->content;
        $comment->product_id = $request->productId;
        $comment->account_id = Auth::user()->id;

        $product->comments()->save($comment);

        return redirect()->action(
            'HomeController@product',
            ['id' => $request->productId],
        );
    }

    public function favorite(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $favorite = Favorite::where('product_id', $id)->where('account_id', Auth::user()->id)->first();
        if ($favorite == null) {
            $favorite = new Favorite();
            $favorite->product_id = $id;
            $favorite->account_id = Auth::user()->id;
            $favorite->save();
        } else {
            $favorite->delete();
        }

        return redirect()->action(
            'HomeController@product',
            ['id' => $id],
        );
    }
}
