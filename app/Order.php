<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderList;
use App\OrderProduct;
use App\DeliveryAddress;

class Order extends Model
{
    //
    protected $table = "orders";

    /**
     * @return Get the order list of the order.
     */
    public function orderList()
    {
        return $this->belongsTo(OrderList::class);
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
        return $this->belongsTo(DeliveryAddress::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderlist_id', 'status', 'delivery_date', 'delivered_date', 'order_date', 'delivery_address_id',
    ];
}
