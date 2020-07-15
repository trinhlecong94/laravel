<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(Account::class);
    }
}
