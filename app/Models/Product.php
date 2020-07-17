<?php

namespace App\Models;

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

    public function categories()
    {
        return $this->belongsTo(Category::class,"category_id");
    }

    public function colors()
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

}
