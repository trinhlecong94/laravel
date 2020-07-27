<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Enums\Role as EnumRole;

class Role extends Model
{
    protected $fillable = ['name',];

    public function roleString()
    {
        $this->roleString = EnumRole::getKey($this->name);
        return $this->roleString;
    }

    public function users()
    {
        return $this->belongsToMany(Account::class);
    }
}
