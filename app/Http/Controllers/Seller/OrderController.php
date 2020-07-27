<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Enums\OrderStatus as EnumOrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $searchText = $request->input('searchText');
        if (isset($searchText)) {
            $orders = Order::where('id', $searchText)->with('orderDetails')->paginate(9);
        } else {
            $orders = Order::with('orderDetails')->paginate(9);
        }

        $status = EnumOrderStatus::getkeys();
        return view('seller.order-manager', compact('orders', 'status'));
    }

    public function update(Request $request)
    {
        $order = Order::find($request->orderID);
        $order->status = EnumOrderStatus::getValue(strval($request->status));
        $order->save();
        return redirect(url()->current());
    }
}
