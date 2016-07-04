<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminRoleController extends Controller
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
		$roles = Role::get();
		$roleUploadPath = config('app.uploadUrl.Role');

		return view('adminroles.index',[
            'roles' => $roles,
            'roleUploadPath' => $roleUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
		return view('adminroles.add');        
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            
            'name' => 'required|max:255',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect('/admin/roles');	
    }

    public function edit(Request $request, Role $role) {
		$roleUploadPath = config('app.uploadUrl.Role');
		return view('adminroles.edit',[

            'role' => $role,
            'roleUploadPath' => $roleUploadPath,

        ]);
	}

	public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $role->name = $request->name;

        $role->save();

        return redirect('/admin/roles');
    }


    public function deleteconfirm(Role $role)
    {
        
        return view('adminroles.deleteconfirm',[
            'role' => $role,
        ]);   

    }

    public function delete(Role $role)
	{
		
	    $role->delete();

	    return redirect('/admin/roles');

	}

}
