<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
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
		$products = Product::get();
		$productUploadPath = config('app.uploadUrl.Product');

		return view('adminproducts.index',[
            'products' => $products,
            'productUploadPath' => $productUploadPath,
        ]);        
	}

	public function add(Request $request)
	{
        $categories = Category::get();

        return view('adminproducts.add',[
            'categories' => $categories,
        ]);       
	}

	public function edit(Request $request, Product $product) {
        
        $categories = Category::get();
		$productUploadPath = config('app.uploadUrl.Product');
		return view('adminproducts.edit',[

            'product' => $product,
            'productUploadPath' => $productUploadPath,
            'categories' => $categories,

        ]);
	}

	public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'photo' => 'image',
            'name' => 'required|max:255',
            'description' => 'max:255',
            'cost_price' => 'required|max:255',
            'selling_price' => 'required|max:255',
            'stock_quantity' => 'required',
            'category_id' => 'required',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->cost_price = $request->cost_price;
        $product->selling_price = $request->selling_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->category_id = $request->category_id;

        if($request->file('photo')) {
        	// Get photo from form.
		    $photo = $request->file('photo');
		    $photoFileName = $photo->getClientOriginalName();
		    $photoPath = $photo->getRealPath();

		    // Get products upload location
		    $uploadLocation = config('app.uploadPath.Product');

	        // Uploads photo to the directory.
	        Storage::disk('public')->put(
	            $uploadLocation.$photoFileName,
	            file_get_contents($photoPath)
	        );

	        $product->photo = $photoFileName;

        }

        $product->save();

        return redirect('/admin/products');
    }

    protected function create(Request $request)
    {
    	$this->validate($request, [
            'photo' => 'required|image',
            'name' => 'required|max:255',
            'description' => 'max:255',
            'cost_price' => 'required|max:255',
            'selling_price' => 'required|max:255',
            'stock_quantity' => 'required',
            'category_id' => 'required',
        ]);


    	// Get photo from form.
	    $photo = $request->file('photo');
	    $photoFileName = $photo->getClientOriginalName();
	    $photoPath = $photo->getRealPath();

	    // Get products upload location
	    $uploadLocation = config('app.uploadPath.Product');

	    // Uploads photo to the directory.
        Storage::disk('public')->put(
            $uploadLocation.$photoFileName,
            file_get_contents($photoPath)
        );

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'stock_quantity' => $request->stock_quantity,
            'category_id' => $request->category_id,
            'photo' => $photoFileName,
        ]);

        return redirect('/admin/products');	
    }

    public function deleteconfirm(Product $product)
    {
        
        $productUploadPath = config('app.uploadUrl.Product');
        return view('adminproducts.deleteconfirm',[
            'product' => $product,
            'productUploadPath' => $productUploadPath,
        ]);   

    }

    public function delete(Product $product)
	{
		
	    $product->delete();

	    return redirect('/admin/products');

	}

}
