<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Orderlist;
use App\OrderProduct;
use App\DeliveryAddress;

class Order extends Model
{
    use SoftDeletes;
    
    //
    protected $table = "orders";
    public $timestamps = false;

    /**
     * @return Get the order list of the order.
     */
    public function orderlist()
    {
        return $this->belongsTo(Orderlist::class, 'orderlist_id');
    }

    /**
     * @return Get the order products of the order.
     */
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * @return Get the delivery address of the order.
     */
    public function deliveryAddress()
    {
        return $this->belongsTo(DeliveryAddress::class, 'deliveryaddress_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderlist_id', 'status', 'delivery_date', 'delivered_date', 'order_date', 'deliveryaddress_id', 'status',
    
    ];
}
