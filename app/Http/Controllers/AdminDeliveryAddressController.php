<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DeliveryAddress;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminDeliveryAddressController extends Controller
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
		$deliveryaddresses = DeliveryAddress::get();
		$deliveryaddressUploadPath = config('app.uploadUrl.DeliveryAddress');

		return view('admindeliveryaddresses.index',[
            'deliveryaddresses' => $deliveryaddresses,
            'deliveryaddressUploadPath' => $deliveryaddressUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
        $users = User::get();

        return view('admindeliveryaddresses.add',[
            'users' => $users,
        ]);   
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'pincode' => 'required|max:255',
            'user_id' => 'required',

        ]);

        DeliveryAddress::create([
            'address' => $request->address,
            'city' => $request->city,
            'district' => $request->district,
            'pincode' => $request->pincode,
            'user_id' => $request->user_id,

        ]);

        return redirect('/admin/deliveryaddresses');	
    }

    public function edit(Request $request, DeliveryAddress $deliveryaddress) {
        $users = User::get();
		return view('admindeliveryaddresses.edit',[

            'deliveryaddress' => $deliveryaddress,
            'users' => $users,
        ]);
	}

	public function update(Request $request, DeliveryAddress $deliveryaddress)
    {
        $this->validate($request, [
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'pincode' => 'required|max:255',
            'user_id' => 'required',
        ]);

        $deliveryaddress->address = $request->address;
        $deliveryaddress->city = $request->city;
        $deliveryaddress->district = $request->district;
        $deliveryaddress->pincode = $request->pincode;
        $deliveryaddress->user_id = $request->user_id;

        $deliveryaddress->save();

        return redirect('/admin/deliveryaddresses');
    }

    public function deleteconfirm(DeliveryAddress $deliveryaddress)
    {
        return view('admindeliveryaddresses.deleteconfirm',[
            'deliveryaddress' => $deliveryaddress,
        ]);   

    }

    public function delete(DeliveryAddress $deliveryaddress)
	{
		
	    $deliveryaddress->delete();

	    return redirect('/admin/deliveryaddresses');

	}
}
