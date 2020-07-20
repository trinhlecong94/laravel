<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Enums\OrderStatus as EnumOrderStatus;
use Illuminate\Http\Request;
use App\Services\ProductService;
use DateTime;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{

    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function productSearch(Request $request)
    {
        $searchText = $request->input('searchText');
        $sort = $request->input('sort');
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

    public function index(Request $request)
    {
        $data = $this->productService->pagination();
        return view('pages.home', compact('data'));
    }

    public function product(Request $request, $id)
    {
        $product = $this->productService->findById($id);
        return view('pages.product', compact('product'));
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

    public function checkoutStatus(Request $request)
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
            $orderDetail->order_id=$order->id;
            $orderDetail->save();
        }
        $request->session()->forget('order');
        return view('pages.checkout', compact('order'));
    }

    public function orderDetail(Request $request)
    {
        return view('pages.order-detail');
    }
}
