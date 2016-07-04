<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\User;
use App\OrderlistProduct;
use App\Orderlist;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
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
    
	public function index(Request $request, Orderlist $orderlists)
    {

        $orderlists = $orderlists->get();
        return view('deliveries.index',[
            'orderlists' => $orderlists,
        ]);        
    } 

    public function details(Request $request, Orderlist $orderlist)
    {
        $orderlistProducts = $orderlist->orderlistProducts()->get();

        $this->authorize('view', $orderlist);

        return view('deliveries.details',[
            'orderlist' => $orderlist,
            'orderlistProducts' => $orderlistProducts,
        ]);         
    }

    
}
