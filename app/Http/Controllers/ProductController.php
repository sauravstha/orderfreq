<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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


		return view('products.index');        
	}

	

	protected function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image',
            'name' => 'required|max:255',
            'description' => 'max:255',
            'cost_price' => 'required|max:255',
            'selling_price' => 'required|max:255',
            'stock_quantity' => 'required',
            'catrgory_id' => 'required',
        ]);

        // Get photo from form.
	    $photo = $request->file('photo');
	    $photoFileName = $photo->getClientOriginalName();
	    $photoPath = $photo->getRealPath();

	    // Get current products.
	    $products = $request->products();

	    // Save photo filename
	    $products->photo = $photoFileName;
	    $products->save();

	    // Get products upload location
	    $uploadLocation = config('app.uploadPath.Product');

        // Uploads photo to the directory.
        Storage::disk('public')->put(
            $uploadLocation.$photoFileName,
            file_get_contents($photoPath)
        );

        return redirect('/products');
    }

    protected function create(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'cost_price' => $data['cost_price'],
            'selling_price' => $data['selling_price'],
            'stock_quantity' => $data['stock_quantity'],
            'category_id' => $data['category_id'],
            'photo' => $data['a'],
        ]);
    }

}
