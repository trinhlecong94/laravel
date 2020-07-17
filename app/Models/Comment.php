<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function accounts()
    {
        return $this->belongsTo(Account::class,"account_id");
    }

    public function products()
    {
        return $this->hasOne(Product::class);
    }
}
