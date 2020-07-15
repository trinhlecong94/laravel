<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function color()
    {
        return $this->hasOne(Color::class);
    }
}