<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Orderlist;
use App\Product;
use App\Category;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $orderlists = Orderlist::get();
        $categories = Category::get();

        if(isset($request->category))
        {
            $currentCategory = $request->category;
            $products = Product::where('category_id', $currentCategory)->paginate(9);
        }
        else
        {
            $currentCategory = NULL;
            $products = Product::paginate(9);
        }

        $productUploadUrl = config('app.uploadUrl.Product');

        return view('products.index',[

            'orderlists' => $orderlists,
            'currentCategory' => $request->category,
            'products' => $products,
            'productUploadUrl' => $productUploadUrl,
            'categories' => $categories,
        ]);        
    }
}
