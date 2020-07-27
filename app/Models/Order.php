<?php

namespace App\Models;

use App\Enums\OrderStatus as EnumOrderStatus;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = ['date', 'status', 'prices', 'account_id', 'shipping_id',];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }

    public function statusToString()
    {
        return EnumOrderStatus::getKey($this->status);
    }

    public function getOrderTotal()
    {

        $OrderTotal = 0;

        foreach ($this->orderDetails as $key => $orderDetail) {


            $OrderTotal += $orderDetail->getTotal();
        }

        return $OrderTotal;
    }
}
