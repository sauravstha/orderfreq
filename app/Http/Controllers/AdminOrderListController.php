<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderlist;
use App\Home;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminOrderlistController extends Controller
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
		$orderlists = Orderlist::get();

		return view('adminorderlists.index',[
            'orderlists' => $orderlists,
        ]);   
	}

	public function add(Request $request)
	{
        $homes = Home::get();

        return view('adminorderlists.add',[
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

        Orderlist::create([
            'name' => $request->name,
            'frequency' => $request->frequency,
            'start_delivery_date' => $request->start_delivery_date,
            'scheduled_delivery_date' => $request->scheduled_delivery_date,
            'actual_delivery_date' => $request->actual_delivery_date,
            'home_id' => $request->home_id,
        ]);

        return redirect('/admin/orderlists');	
    }

    public function edit(Request $request, Orderlist $orderlist) {

        $homes = Home::get();
		return view('adminorderlists.edit',[

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

        return redirect('/admin/orderlists');
    }

    public function deleteconfirm(Orderlist $orderlist)
    {
        return view('adminorderlists.deleteconfirm',[
            'orderlist' => $orderlist,
        ]);   

    }

    public function delete(Orderlist $orderlist)
	{
		
	    $orderlist->delete();

	    return redirect('/admin/orderlists');

	}

}
