<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderlistProduct;
use App\Product;
use App\Orderlist;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminOrderlistProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
	{
		$orderlistproducts = OrderlistProduct::get();

		return view('adminorderlistproducts.index',[
            'orderlistproducts' => $orderlistproducts,
        ]);   
	}

	public function add(Request $request)
	{
        $products = Product::get();
        $orderlists = Orderlist::get();

        return view('adminorderlistproducts.add',[
            'products' => $products,
            'orderlists' => $orderlists,
        ]);        
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            
            'product_id' => 'required',
            'quantity' => 'required',
            'orderlist_id' => 'required',

        ]);

        OrderlistProduct::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'orderlist_id' => $request->orderlist_id,
        ]);

        return redirect('/admin/orderlistproducts');	
    }

    public function edit(Request $request, OrderlistProduct $orderlistproduct) {
        $products = Product::get();
        $orderlists = Orderlist::get();
		return view('adminorderlistproducts.edit',[
            'products' => $products,
            'orderlists' => $orderlists,

            'orderlistproduct' => $orderlistproduct,

        ]);
	}

	public function update(Request $request, OrderlistProduct $orderlistproduct)
    {
        $this->validate($request, [
            
            'product_id' => 'required',
            'quantity' => 'required',
            'orderlist_id' => 'required',

        ]);

        $orderlistproduct->product_id = $request->product_id;
        $orderlistproduct->quantity = $request->quantity;
        $orderlistproduct->orderlist_id = $request->orderlist_id;

        $orderlistproduct->save();

        return redirect('/admin/orderlistproducts');
    }

    public function deleteconfirm(OrderlistProduct $orderlistproduct)
    {
        return view('adminorderlistproducts.deleteconfirm',[
            'orderlistproduct' => $orderlistproduct,
        ]);   

    }

    public function delete(OrderlistProduct $orderlistproduct)
	{
		
	    $orderlistproduct->delete();

	    return redirect('/admin/orderlistproducts');

	}

}
