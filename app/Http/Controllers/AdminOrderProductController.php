<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProduct;
use App\Order;
use App\Product;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminOrderProductController extends Controller
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
		$orderproducts = OrderProduct::get();
		$orderproductUploadPath = config('app.uploadUrl.OrderProduct');

		return view('adminorderproducts.index',[
            'orderproducts' => $orderproducts,
            'orderproductUploadPath' => $orderproductUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
        $orders = Order::get();
        $products = Product::get();

        return view('adminorderproducts.add',[
            'orders' => $orders,
            'products' => $products,
        ]);     
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            
            'order_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',

        ]);

        OrderProduct::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect('/admin/orderproducts');	
    }

    public function edit(Request $request, OrderProduct $orderproduct) {
        $orders = Order::get();
        $products = Product::get();
		return view('adminorderproducts.edit',[

            'orderproduct' => $orderproduct,
            'orders' => $orders,
            'products' => $products,

        ]);
	}

	public function update(Request $request, OrderProduct $orderproduct)
    {
        $this->validate($request, [
            
            'order_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $orderproduct->order_id = $request->order_id;
        $orderproduct->product_id = $request->product_id;
        $orderproduct->price = $request->price;
        $orderproduct->quantity = $request->quantity;

        $orderproduct->save();

        return redirect('/admin/orderproducts');
    }

    public function deleteconfirm(OrderProduct $orderproduct)
    {
        return view('adminorderproducts.deleteconfirm',[
            'orderproduct' => $orderproduct,
        ]);   

    }

    public function delete(OrderProduct $orderproduct)
	{
		
	    $orderproduct->delete();

	    return redirect('/admin/orderproducts');

	}
}
