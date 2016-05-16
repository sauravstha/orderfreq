<?php

namespace App\Http\Controllers;

use App\User;
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

        return view('user.index', [
            'photo' => asset($userUploadPath .$user->photo),
        ]);
    }

    public function store(Request $request)
	{
	    $this->validate($request, [
	        'photo' => 'required|image',
	    ]);

	    // Get photo from form.
	    $photo = $request->file('photo');
	    $photoFileName = $photo->getClientOriginalName();
	    $photoPath = $photo->getRealPath();

	    // Get current user.
	    $user = $request->user();

	    // Save photo filename
	    $user->photo = $photoFileName;
	    $user->save();

	    // Get user upload location
	    $uploadLocation = config('app.uploadPath.User');

        // Uploads photo to the directory.
        Storage::disk('public')->put(
            $uploadLocation.$photoFileName,
            file_get_contents($photoPath)
        );

        return redirect('/user');
	}
}
