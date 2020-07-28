<?php

namespace App\Models;

use App\Enums\Status as EnumStatus;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name', 'description', 'discount', 'start_date', 'end_date', 'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_promotion');
    }

    public function statusToString()
    {
        return EnumStatus::getKey($this->status);
    }
}
