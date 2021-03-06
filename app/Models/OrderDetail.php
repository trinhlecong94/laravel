<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['quantity', 'product_id', 'promotion_id', 'order_id', 'size_id',];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function getTotal()
    {
        if (isset($this->promotion_id)) {
            return $this->product->price * $this->quantity * (100 - $this->promotion->discount) / 100;
        }
        return $this->product->price * $this->quantity;
    }
}
