<?php

namespace App\Http\Controllers;

use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

        	'name'=> 'required',
            'description'=> 'required|min:3',// the minimum of 3 characters
            'price'=> 'required|numeric',
            'image'=> 'required|mimes:jpeg,png',
            'additional_info'=> 'required',
            'category'=> 'required'

            
            // these names are the names given to the form in create.blade
        ]);
        $image = $request->file('image')->store('public/product');

        product::create([
                "name"=> $request->name,
                'description'=> $request->description,
	            'price'=> $request->price,
	            'image'=> $image,
	            'additional_info'=> $request->additional_info,
                "category_id"=> $request->category,
                "subcategory_id"=> $request->subcategory
                //these names comes from App\Product, they are the attributes you created in the file
        ]);
        notify()->success('Product created successfully ⚡️');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
       	return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

        	'name'=> 'required',
            'description'=> 'required|min:3',// the minimum of 3 characters
            'price'=> 'required|numeric',
            'image'=> 'required|mimes:jpeg,png',
            'additional_info'=> 'required',
            'category'=> 'required'

            
            // these names are the names given to the form in create.blade
        ]); 
        $product = Product::find($id);
        // dd($product);
        //It is a helper function which is used to dump a variable's contents to the browser and stop the further script execution. It stands for Dump and Die, but it's not always convinient.
        $filename = $product->image;
        if($request->file('image'))//if a file(image) is uploaded 
        {
        // we use the word image here because it is the name of the input field containing the image created in edit.blade
            $image = $request->file('image')->store('product/files');
            \Storage::delete($filename);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = $image;
            $product->price = $request->price;
            $product->additional_info = $request->additional_info;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
        }
        else{
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->additional_info = $request->additional_info;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
        }
        
        $product->save();
        notify()->success('Product updated successfully ⚡️');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        $filename= $product->image;
        $product->delete();
        \Storage::delete($filename);
        notify()->success('Product deleted successfully ⚡️');
        return redirect()->route('product.index');
    }

    public function loadSubcategories(Request $request, $id){

    	$subcategory = Subcategory::where('category_id', $id)->pluck('name', 'id');
    	
    	return response()->json($subcategory);
    }
}
