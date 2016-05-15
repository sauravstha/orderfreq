<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Home;
use App\OrderList;

class OrderList extends Model
{
    //
    protected $table = "orderlists";

    /**
     * @return Get the home of the order list.
     */
    public function home()
    {
        return $this->belongsTo(Home::class);
    }

    /**
     * @return Get the orderlist products of the orderlist.
     */
    public function orderListProducts()
    {
        return $this->hasMany(OrderListProduct::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_delivery_date', 'frequency', 'scheduled_delivery_date', 'next_delivery_date', 'home_id',
    ];
}
