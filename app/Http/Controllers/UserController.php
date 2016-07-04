<?php

namespace App\Http\Controllers;

use Log;
use App\User;
use App\UserRole;
use App\Role;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class UserController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = $request->user();

    	$userUploadPath = config('app.uploadUrl.User');

        $roles = Role::all();

        return view('user.index', [

            'user' => $user,
            'photo' => asset($userUploadPath .$user->photo),
            'roles' => $roles,
        ]);
    }

    public function update(Request $request)
	{
	    $this->validate($request, [
            'first_name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'username'=>'required|max:255',
            'phone'=>'required|max:255',
            'email'=>'required|max:255',
	        'photo' => 'image',
	    ]);


        // Get current user.
        $user = $request->user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;

        $roles = $request->roles;

        if(!is_null($roles)) {
            $user->roles()->sync($roles);
        }

	    // Get photo from form.
	    $photo = $request->file('photo');
        if ( !is_null($photo)) {
            $photoFileName = $photo->getClientOriginalName();

            $photoPath = $photo->getRealPath();
                    
    	    // Save photo filename
    	    $user->photo = $photoFileName;
    	    
    	    // Get user upload location
    	    $uploadLocation = config('app.uploadPath.User');

            // Uploads photo to the directory.
            Storage::disk('public')->put(
                $uploadLocation.$photoFileName,
                file_get_contents($photoPath)
            );
        }
        $user->save();

        return redirect('/user');
	}
}
