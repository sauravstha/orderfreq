<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\OrderProduct;
use App\OrderListProduct;

class Product extends Model
{
    //
    protected $table = "products";

    /**
     * @return Get the category of the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return Get the order products for the product.
     */
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * @return Get the orderlist products for the product.
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
        'name', 'description', 'cost_price', 'selling_price', 'stock_quantity', 'category_id', 'photo',
    ];
}
