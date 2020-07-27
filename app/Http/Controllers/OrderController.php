<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
    }

    public function deleteProductInCart(Request $request, $id, $size_id)
    {
        if ($request->session()->has('order')) {
            $order = $request->session()->get('order');
        }

        foreach ($order->orderDetails as $key => $orderDetail) {
            if (($orderDetail->product_id == $id) && ($orderDetail->size_id) == $size_id) {
                $order->orderDetails->forget($key);
            }
        }
        session(['order' => $order]);
        return redirect(url('/cart'));
    }

    public function index(Request $request, $id, $size_id)
    {
        if ($request->session()->has('order')) {
            $order = $request->session()->get('order');
        } else {
            $order = new Order();
        }

        $temp = true;
        foreach ($order->orderDetails as $key => $orderDetail) {
            if (($orderDetail->product_id == $id) && ($orderDetail->size_id) == $size_id) {
                $temp = false;
            }
        }

        if ($temp) {
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $id;
            $orderDetail->size_id = $size_id;
            $orderDetail->quantity = 1;
            $order->orderDetails->add($orderDetail);
        }

        session(['order' => $order]);
        return redirect(url('/cart'));
    }

    public function updateProductInCart(Request $request, $id, $size_id, $quantity)
    {
        if ($request->session()->has('order')) {
            $order = $request->session()->get('order');
        }

        foreach ($order->orderDetails as $key => $orderDetail) {
            if (($orderDetail->product_id == $id) && ($orderDetail->size_id) == $size_id) {
                $orderDetail->quantity = $quantity;
            }
        }

        session(['order' => $order]);
        return redirect(url('/cart'));
    }

    public function clearProductInCart(Request $request)
    {
        $request->session()->forget('order');
        return redirect(url('/cart'));
    }
}
