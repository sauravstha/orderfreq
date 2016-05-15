<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    //

    protected $table = "categories";

    /**
     * @return Get the parent category of current category
     */
    public function parentCategory()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return Get the products of the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id',
    ];
}
