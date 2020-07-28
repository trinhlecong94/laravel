<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Promotion;
use App\Enums\Status as EnumStatus;
use Illuminate\Http\Request;
use App\Enums\OrderStatus as EnumOrderStatus;
use DateTime;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

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

    public function cart(Request $request)
    {
        $order = $request->session()->get('order');
        return view('pages.cart', compact('order'));
    }

    public function applyPromotion(Request $request)
    {
        $order = new Order();
        if ($request->session()->has('order')) {
            $order = $request->session()->get('order');
        }

        $promotion = Promotion::where('name', $request->promotion_name)->where('status', EnumStatus::ACTIVE)->first();

        foreach ($order->orderDetails as $key => $orderDetail) {
            $orderDetail->promotion_id = null;
            foreach ($promotion->products as $key => $product) {
                if ($product->id == $orderDetail->product->id) {
                    $orderDetail->promotion_id = $promotion->id;
                }
            }
        }

        session(['order' => $order]);
        session(['promotion' => $promotion]);

        return redirect()->action('OrderController@cart');
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
        if (Auth::user() != null) {
            $order->account_id = Auth::user()->id;
        }

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
}
