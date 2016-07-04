<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Product;
use App\Orderlist;
use App\OrderlistProduct;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderlistController extends Controller
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


    public function index(Request $request, Product $product)
    {
        // Get order lists of the current user
        $user = $request->user();
        $homes = $user->homes()->get();

        $orderlists = array();
        foreach ($homes as $home) {
            $lists = $home->orderlists()->get();
            foreach ($lists as $list) {
                array_push($orderlists, $list);
            }
        }

        return view('orderlists.index',[
            'orderlists' => $orderlists,
            'product' => $product,
        ]);        
    } 

    public function makeorder(Request $request, Product $product)
    {
        // Get order lists of the current user
        $user = $request->user();
        $homes = $user->homes()->get();

        $orderlists = array();
        foreach ($homes as $home) {
            $lists = $home->orderlists()->get();
            foreach ($lists as $list) {
                array_push($orderlists, $list);
            }
        }

        $productUploadUrl = config('app.uploadUrl.Product');

        return view('orderlists.makeorder',[
            'productUploadUrl' => $productUploadUrl,

            'product' => $product,
            'orderlists' => $orderlists,
        ]);        
    } 

    public function delete(Orderlist $orderlist)
    {
        
        $this->authorize('destroy', $orderlist);

        $orderlist->delete();

        return redirect('/orderlists');

    }
    public function deleteorderlistconfirmation(Orderlist $orderlist)
    {
        $orderlistProducts = $orderlist->orderlistProducts()->get();

        $this->authorize('view', $orderlist);
        
        return view('orderlists.deleteorderlistconfirmation',[

            'orderlist' => $orderlist,
            'orderlistProducts' => $orderlistProducts,

        ]);
    }

    public function deleteOrderlistProduct(Orderlist $orderlist, OrderlistProduct $orderlistProduct)
    {
        
        $this->authorize('deleteOrderlistProduct', $orderlistProduct);

        $orderlistProduct->delete();

        return redirect('/orderlists/details/'.$orderlist->id);

    }

	public function deleteOrderlistProductConfirmation(Orderlist $orderlist, OrderlistProduct $orderlistProduct)
	{
		
        return view('orderlists.deleteOrderlistProductConfirmation',[
            'orderlist' => $orderlist,
            'orderlistProduct' => $orderlistProduct,
        ]);

	}

    public function editOrderlistProduct(Request $request, Orderlist $orderlist, OrderlistProduct $orderlistProduct) {
        $this->authorize('editOrderlistProduct', $orderlistProduct);

        return view('orderlists.editorderlistProduct',[
            'orderlist' => $orderlist,
            'orderlistProduct' => $orderlistProduct,
        ]);
    }

    public function updateOrderlistProduct(Request $request, Orderlist $orderlist, OrderlistProduct $orderlistProduct)
    {
        $this->validate($request, [
            'quantity' => 'required',
        ]);

        $orderlistProduct->quantity = $request->quantity;

        $orderlistProduct->save();

        return redirect('/orderlists/details/'.$orderlist->id);

    }

    public function add(Request $request)
    {
        $user = $request->user();
        $homes = $user->homes()->get();

        return view('orderlists.add',[
            'homes' => $homes,
        ]);        
    }

    protected function create(Request $request)
    {
        $this->validate($request, [
            
            'name' => 'required|max:255',
            'frequency' => '',
            'start_delivery_date' => 'required|date',
            'scheduled_delivery_date' => 'date',
            'actual_delivery_date' => 'required|date',
            'home_id' => '',

        ]);

        $orderlist = new Orderlist;
        $orderlist->name = $request->name;
        $orderlist->frequency = $request->frequency;
        $orderlist->start_delivery_date = $request->start_delivery_date;
        $orderlist->scheduled_delivery_date = $request->scheduled_delivery_date;
        $orderlist->actual_delivery_date = $request->actual_delivery_date;
        $orderlist->home_id = $request->home_id;

        $this->authorize('add', $orderlist);

        $orderlist->save();

        // Orderlist::create([
        //     'name' => $request->name,
        //     'frequency' => $request->frequency,
        //     'start_delivery_date' => $request->start_delivery_date,
        //     'scheduled_delivery_date' => $request->scheduled_delivery_date,
        //     'actual_delivery_date' => $request->actual_delivery_date,
        //     'home_id' => $request->home_id,
        // ]);

        return redirect('/orderlists'); 
    }

    public function edit(Request $request, Orderlist $orderlist) {
        $this->authorize('edit', $orderlist);
        $user = $request->user();
        $homes = $user->homes()->get();

        return view('orderlists.edit',[

            'orderlist' => $orderlist,
            'homes' => $homes,

        ]);
    }

    public function update(Request $request, Orderlist $orderlist)
    {
        $this->validate($request, [
            
            'name' => 'required|max:255',
            'frequency' => '',
            'start_delivery_date' => 'required|date',
            'scheduled_delivery_date' => 'date',
            'actual_delivery_date' => 'required|date',
            'home_id' => '',
        ]);

        $orderlist->name = $request->name;
        $orderlist->frequency = $request->frequency;
        $orderlist->start_delivery_date = $request->start_delivery_date;
        $orderlist->scheduled_delivery_date = $request->scheduled_delivery_date;
        $orderlist->actual_delivery_date = $request->actual_delivery_date;
        $orderlist->home_id = $request->home_id;

        $orderlist->save();

        return redirect('/orderlists');
    }

    public function details(Request $request, Orderlist $orderlist)
    {
        $orderlistProducts = $orderlist->orderlistProducts()->get();

        $this->authorize('view', $orderlist);

        return view('orderlists.details',[
            'orderlist' => $orderlist,
            'orderlistProducts' => $orderlistProducts,
        ]);         
    }

    public function addToList(Request $request, Product $product)
    {

        $this->validate($request, [
            'quantity' => 'required',
            'orderlist' => 'required',
        ]);

        $orderlist = Orderlist::find($request->orderlist);
        $orderlistProducts = $orderlist->orderlistProducts()->get();


        // Search for existing product in the orderlist.
        // If not found, add a new product to the orderlist.
        // Else, update the quantity.
        $recordFound = false;
        foreach ($orderlistProducts as $orderlistProduct) 
        {
            if($orderlistProduct->product_id == $product->id)
            {
                $orderlistProduct->quantity = $orderlistProduct->quantity + $request->quantity;
                $orderlistProduct->save();
                $recordFound = true;
                break;
            }
        }

        if(!$recordFound)
        {
             $newOrderlist = OrderlistProduct::create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'orderlist_id' => $request->orderlist,
            ]);
        }

        return redirect('/products');
    }


}
