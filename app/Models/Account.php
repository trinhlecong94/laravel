<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Enums\Status as EnumStatus;
use App\Enums\Role as EnumRole;

class Account extends Authenticatable
{
    use Notifiable;
    protected $table = 'accounts';

    protected $fillable = [
        'address', 'birthday', 'email', 'full_name', 'password', 'phone', 'status', 'username'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
 
    public function hasAnyRole($roles)
    {
        return null !==  $this->roles()->whereIn('name', $roles)->first();
    }
  
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', EnumRole::getValue(strval($role)))->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function statusToString()
    {
        return EnumStatus::getKey($this->status);
    }
}
