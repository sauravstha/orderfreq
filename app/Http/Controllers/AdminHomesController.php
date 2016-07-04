<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\User;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminHomesController extends Controller
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
		$homes = Home::get();
		$homeUploadPath = config('app.uploadUrl.Home');

		return view('adminhomes.index',[
            'homes' => $homes,
            'homeUploadPath' => $homeUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
        $users = User::get();

        return view('adminhomes.add',[
            'users' => $users,
        ]);      
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'city' => 'required|max:255',
            'district' => 'required|max:255',
            'pincode' => 'required|max:255',
            'user_id' => 'required',

        ]);

        Home::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'district' => $request->district,
            'pincode' => $request->pincode,
            'user_id' => $request->user_id,

        ]);

        return redirect('/admin/homes');	
    }

    public function edit(Request $request, Home $home) {

        $users = User::get();
        return view('adminhomes.edit',[
            'home' => $home,
            'users' => $users,
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
            'user_id' => 'required',
        ]);

        $home->address = $request->address;
        $home->phone = $request->phone;
        $home->city = $request->city;
        $home->district = $request->district;
        $home->pincode = $request->pincode;
        $home->user_id = $request->user_id;

        $home->save();

        return redirect('/admin/homes');
    }

    public function deleteconfirm(Home $home)
    {
        return view('adminhomes.deleteconfirm',[
            'home' => $home,
        ]);   

    }

    public function delete(Home $home)
	{
		
	    $home->delete();

	    return redirect('/admin/homes');

	}

}
