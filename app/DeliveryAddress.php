<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Order;

class DeliveryAddress extends Model
{
    use SoftDeletes;

    //
    protected $table = "deliveryaddresses";  
    public $timestamps = false;

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
        'address', 'city', 'district', 'pincode', 'user_id', 'status',
    ];
}
