<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['address', 'email', 'discount', 'full_name', 'phone',];
}
