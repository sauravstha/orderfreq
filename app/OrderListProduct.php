<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderList;
use App\Product;

class OrderListProduct extends Model
{
    //
    protected $table = "orderlistproducts";

    /**
     * @return Get the order list of the orderlist product.
     */
    public function orderList()
    {
        return $this->belongsTo(OrderList::class);
    }

    /**
     * @return Get the product of the orderlist product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderlist_id', 'product_id', 'quantity',
    ];
}
