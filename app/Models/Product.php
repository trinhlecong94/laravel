<?php

namespace App\Models;

use App\Enums\Status as EnumStatus;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }

    public function color()
    {
        return $this->belongsTo(Color::class,"color_id");
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class,'product_promotion');
    }

    public function statusToString()
    {
        return EnumStatus::getKey($this->status);
    }

}
