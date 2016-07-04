<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Home;
use App\Orderlist;
use App\Order;

class Orderlist extends Model
{
    use SoftDeletes;
    
    //
    protected $table = "orderlists";
    public $timestamps = false;

    /**
     * @return Get the home of the order list.
     */
    public function home()
    {
        return $this->belongsTo(Home::class);
    }

     /**
     * @return Get the order of the order list.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return Get the orderlist products of the orderlist.
     */
    public function orderlistProducts()
    {
        return $this->hasMany(OrderlistProduct::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_delivery_date', 'frequency', 'scheduled_delivery_date', 'actual_delivery_date', 'home_id', 'status',
    
    ];
}
