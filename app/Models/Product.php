<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,"category_id");
    }
}
