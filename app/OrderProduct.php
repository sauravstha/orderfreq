<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class OrderProduct extends Model
{
    //
    protected $table = "orderproducts";
    public $timestamps = false;

    /**
     * @return Get the order of the order product.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return Get the product of the order product.
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
        'order_id', 'product_id', 'price', 'quantity',
    ];
}
