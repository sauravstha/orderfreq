<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\OrderList;

class Home extends Model
{
    //
    protected $table = "homes";

    /**
     * @return Get the user of the home.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Get the order lists of the home.
     */
    public function orderLists()
    {
        return $this->hasMany(OrderList::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'city', 'district', 'pincode', 'phone', 'user_id',
    ];
}
