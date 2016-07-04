<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryAddress;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeliveryAddressController extends Controller
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

		$user = $request->user();
        $deliveryaddresses = $user->deliveryaddresses()->get();
		$deliveryaddressUploadPath = config('app.uploadUrl.DeliveryAddress');

		return view('deliveryaddresses.index',[
            'deliveryaddresses' => $deliveryaddresses,
            'deliveryaddressUploadPath' => $deliveryaddressUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
		return view('deliveryaddresses.add');        
	}

	protected function create(Request $request)
    {
        $user = $request->user();
    	$this->validate($request, [
            
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'pincode' => 'required|max:255',
            'user_id' => '',

        ]);

        DeliveryAddress::create([
            'address' => $request->address,
            'city' => $request->city,
            'district' => $request->district,
            'pincode' => $request->pincode,
            'user_id' => $user->id,

        ]);

        return redirect('/deliveryaddresses');	
    }

    public function edit(Request $request, DeliveryAddress $deliveryaddress) {

        $this->authorize('edit', $deliveryaddress);
		$deliveryaddressUploadPath = config('app.uploadUrl.DeliveryAddress');
		return view('deliveryaddresses.edit',[

            'deliveryaddress' => $deliveryaddress,
            'deliveryaddressUploadPath' => $deliveryaddressUploadPath,

        ]);
	}

	public function update(Request $request, DeliveryAddress $deliveryaddress)
    {
        $this->validate($request, [
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'pincode' => 'required|max:255',
            'user_id' => '',
        ]);

        $deliveryaddress->address = $request->address;
        $deliveryaddress->city = $request->city;
        $deliveryaddress->district = $request->district;
        $deliveryaddress->pincode = $request->pincode;

        $deliveryaddress->save();

        return redirect('/deliveryaddresses');
    }

    public function deletedeliveryaddressconfirm(DeliveryAddress $deliveryaddress)
	{
		
		return view('deliveryaddresses.deletedeliveryaddressconfirm',[
            'deliveryaddress' => $deliveryaddress,
        ]);   

	}

    public function delete(DeliveryAddress $deliveryaddress)
	{
		
        $this->authorize('destroy', $deliveryaddress);
		
	    $deliveryaddress->delete();

	    return redirect('/deliveryaddresses');

	}
}
