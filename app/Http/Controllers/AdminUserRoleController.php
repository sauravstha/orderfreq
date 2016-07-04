<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\UserRole;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminUserRoleController extends Controller
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
		$userroles = UserRole::get();
		$userroleUploadPath = config('app.uploadUrl.UserRole');

		return view('adminuserroles.index',[
            'userroles' => $userroles,
            'userroleUploadPath' => $userroleUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
        $users = User::get();
        $roles = Role::get();

        return view('adminuserroles.add',[
            'users' => $users,
            'roles' => $roles,
        ]);       
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            
            'user_id' => 'required',
            'role_id' => 'required',

        ]);

        UserRole::create([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
        ]);

        return redirect('/admin/userroles');	
    }

    public function edit(Request $request, UserRole $userrole) {
        $users = User::get();
        $roles = Role::get();
		return view('adminuserroles.edit',[

            'userrole' => $userrole,
            'users' => $users,
            'roles' => $roles,

        ]);
	}

	public function update(Request $request, UserRole $userrole)
    {
        $this->validate($request, [
            
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $userrole->user_id = $request->user_id;
        $userrole->role_id = $request->role_id;

        $userrole->save();

        return redirect('/admin/userroles');
    }

    public function deleteconfirm(UserRole $userrole)
    {
        
        return view('adminuserroles.deleteconfirm',[
            'userrole' => $userrole,
        ]);   

    }

    public function delete(UserRole $userrole)
	{
		
	    $userrole->delete();

	    return redirect('/admin/userroles');

	}
}
