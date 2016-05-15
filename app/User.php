<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Home;
use App\Role;
use App\DeliveryAddress;

class User extends Authenticatable
{
    protected $table = "users";

    /**
     * @return Get the homes of the user.
     */
    public function homes()
    {
        return $this->hasMany(Home::class);
    }

    /**
     * @return Get the roles of the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'userroles', 'user_id', 'role_id');
    }

    /**
     * @return Get the delivery addresses of the user.
     */
    public function deliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
