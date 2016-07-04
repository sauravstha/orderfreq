<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        $userUploadUrl = config('app.uploadUrl.User');

        $orders = Order::get();
        $orderUploadUrl = config('app.uploadUrl.Order');

        return view('home.index',[
            'orders' => $orders,
            'orderUploadUrl' => $orderUploadUrl,

            'user' => $user,

            'photo' => asset($userUploadUrl .$user->photo),
            'userUploadUrl' => $userUploadUrl,
        ]);
    }
}
