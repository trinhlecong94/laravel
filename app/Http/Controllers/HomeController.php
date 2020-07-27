<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Comment;
use App\Enums\OrderStatus as EnumOrderStatus;
use App\Models\Favorite;
use App\Services\ProductService;
use DateTime;

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

    public function cart(Request $request)
    {
        $order = $request->session()->get('order');
        return view('pages.cart', compact('order'));
    }

    public function checkoutStatus()
    {
        return view('pages.checkout-status');
    }

    public function checkout(Request $request)
    {
        $order = new Order();
        if ($request->session()->has('order')) {
            $order = $request->session()->get('order');
        }
        return view('pages.checkout', compact('order'));
    }

    public function checkoutProcess(Request $request)
    {
        if (!$request->session()->has('order')) {
            return abort(404);
        }

        $shipping = new Shipping();

        $shipping->address = $request->address;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->full_name = $request->fullName;
        $shipping->save();

        if ($request->session()->has('order')) {
            $order = $request->session()->get('order');
        }
        $order->date = new DateTime();
        $order->status = EnumOrderStatus::PENDING;
        $order->prices = $order->getOrderTotal();
        $order->account_id = 1;
        $order->shipping_id = $shipping->id;
        $order->save();

        foreach ($order->orderDetails as $key => $orderDetail) {
            $orderDetail->order_id = $order->id;
            $orderDetail->save();
        }
        $request->session()->forget('order');

        $orderId = $order->id;
        return view('pages.checkout-status', compact('orderId'));
    }

    public function orderDetail(Request $request, $id)
    {
        $order =  Order::find($id);
        return view('pages.order-detail', compact('order'));
    }

    public function cancelOrder(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order->status = EnumOrderStatus::getValue('CANCELLED');
        $order->save();

        return view('pages.order-detail', compact('order'));
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
