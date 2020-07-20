<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class,'size_id');
    }

    public function getTotal()
    {
        return $this->product->price*$this->quantity;
    }

  }
