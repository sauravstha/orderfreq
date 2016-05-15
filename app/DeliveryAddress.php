<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order;

class DeliveryAddress extends Model
{
    //
    protected $table = "deliveryaddresses";

    /**
     * @return Get the user for the delivery address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Get the user of the home.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'city', 'district', 'pincode', 'user_id',
    ];
}
