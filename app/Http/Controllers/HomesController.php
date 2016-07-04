<?php

namespace App\Http\Controllers;


use Log;
use Illuminate\Http\Request;
use App\Home;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	{
		$homeUploadPath = config('app.uploadUrl.Home');

		$user = $request->user();
        $homes = $user->homes()->get();

		return view('homes.index',[
            'homes' => $homes,
            'homeUploadPath' => $homeUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
		return view('homes.add');        
	}

	protected function create(Request $request)
    {

        $user = $request->user();
    	$this->validate($request, [
            
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'pincode' => 'required|max:255',
            'user_id' => '',

        ]);

        Home::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'district' => $request->district,
            'pincode' => $request->pincode,

            'user_id' => $user->id,

        ]);

        return redirect('/homes');	
    }

    public function edit(Request $request, Home $home) {

        $this->authorize('edit', $home);

		$homeUploadPath = config('app.uploadUrl.Home');
		return view('homes.edit',[

            'home' => $home,
            'homeUploadPath' => $homeUploadPath,

        ]);
	}

	public function update(Request $request, Home $home)
    {
        $this->validate($request, [
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'pincode' => 'required|max:255',
            'user_id' => '',
        ]);

        $home->address = $request->address;
        $home->phone = $request->phone;
        $home->city = $request->city;
        $home->district = $request->district;
        $home->pincode = $request->pincode;

        $home->save();

        return redirect('/homes');
    }

    public function delete(Home $home)
    {

        $this->authorize('destroy', $home);
        
        $home->delete();

        return redirect('/homes');

    }

    public function deletehomeconfirmation(Home $home)
	{
        return view('homes.deletehomeconfirmation',[

            'home' => $home,

        ]);

	}
}
