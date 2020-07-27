<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'date', 'product_id', 'account_id'];

    public function account()
    {
        return $this->belongsTo(Account::class, "account_id");
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
