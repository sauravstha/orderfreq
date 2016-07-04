<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\DeliveryAddress;
use App\Orderlist;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
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
		$orders = Order::get();
		$orderUploadPath = config('app.uploadUrl.Order');

		return view('adminorders.index',[
            'orders' => $orders,
            'orderUploadPath' => $orderUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
        $deliveryaddresses = DeliveryAddress::get();
        $orderlists = Orderlist::get();

        return view('adminorders.add',[
            'deliveryaddresses' => $deliveryaddresses,
            'orderlists' => $orderlists,
        ]);       
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            'order_date' => 'required|date',
            'delivery_date' => 'required|date',
            'delivered_date' => 'date',
            'deliveryaddress_id' => 'required',
            'orderlist_id' => 'required',

        ]);

        Order::create([
            'order_date' => $request->order_date,
            'delivery_date' => $request->delivery_date,
            'delivered_date' => $request->delivered_date,
            'deliveryaddress_id' => $request->deliveryaddress_id,
            'orderlist_id' => $request->orderlist_id,
        ]);

        return redirect('/admin/orders');	
    }

    public function edit(Request $request, Order $order) {
        $deliveryaddresses = DeliveryAddress::get();
        $orderlists = Orderlist::get();
		return view('adminorders.edit',[

            'order' => $order,
            'deliveryaddresses' => $deliveryaddresses,
            'orderlists' => $orderlists,

        ]);
	}

	public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'order_date' => 'required|date',
            'delivery_date' => 'required|date',
            'delivered_date' => 'date',
            'deliveryaddress_id' => 'required',
            'orderlist_id' => 'required',

        ]);

        $order->order_date = $request->order_date;
        $order->delivery_date = $request->delivery_date;
        $order->delivered_date = $request->delivered_date;
        $order->deliveryaddress_id = $request->deliveryaddress_id;
        $order->orderlist_id = $request->orderlist_id;

        $order->save();

        return redirect('/admin/orders');
    }

    public function deleteconfirm(Order $order)
    {
        return view('adminorders.deleteconfirm',[
            'order' => $order,
        ]);   

    }

    public function delete(Order $order)
	{
		
	    $order->delete();

	    return redirect('/admin/orders');

	}
}
