<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class AdminCategoryController extends Controller
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
		$categories = Category::get();
		$categoryUploadPath = config('app.uploadUrl.Category');

		return view('admincategories.index',[
            'categories' => $categories,
            'categoryUploadPath' => $categoryUploadPath,
        ]);   
	}

	public function add(Request $request)
	{
        $categories = Category::get();

        return view('admincategories.add',[
            'categories' => $categories,
        ]);     
	}

	protected function create(Request $request)
    {
    	$this->validate($request, [
            
            'name' => 'required|max:255',
            'parent_id' => '',

        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id == "" ? NULL : $request->parent_id,
        ]);

        return redirect('/admin/categories');	
    }

    public function edit(Request $request, Category $category) {

        $categories = Category::get();
		return view('admincategories.edit',[

            'category' => $category,
            'categories' => $categories,

        ]);
	}

	public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            
            'name' => 'required|max:255',
            'parent_id' => '',
        ]);

        $category->name = $request->name;
        $category->parent_id = $request->parent_id == "" ? NULL : $request->parent_id;

        $category->save();

        return redirect('/admin/categories');
    }

    public function deleteconfirm(Category $category)
    {
        return view('admincategories.deleteconfirm',[
            'category' => $category,
        ]);   

    }

    public function delete(Category $category)
	{
		
	    $category->delete();

	    return redirect('/admin/categories');

	}

}
