<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orderlist;
use App\Product;

class OrderlistProduct extends Model
{
    //
    protected $table = "orderlistproducts";
    public $timestamps = false;

    /**
     * @return Get the order list of the orderlist product.
     */
    public function orderlist()
    {
        return $this->belongsTo(Orderlist::class);
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
