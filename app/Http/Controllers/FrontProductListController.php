<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategory;

class FrontProductListController extends Controller
{
    public function index(){
    	$products = Product::latest()->limit(9)->get();//these product are displayed in descending order of creation with a limit at 9
    	$randomActiveProduct = Product::inRandomOrder()->limit(3)->get();//we get 3 random product from the database

    	$randomActiveProductIds = [];

    	foreach($randomActiveProduct as $product){
    		array_push($randomActiveProductIds, $product->id);
    	}
    	$randomItemProduct = Product::whereNotIn('id', $randomActiveProductIds)->limit(3)->get();
    	//gets products which ids are not in the randomActiveProductIds
    	return view('product', compact('products', 'randomActiveProduct', 'randomItemProduct'));
    }

    public function show($id){
    	$product = Product::find($id);
    	$productFromSameCategory = Product::inRandomOrder()
    	->where('category_id',$product->category_id)
    	->where('id','!=',$product->id)
    	->limit(3)
    	->get();
    	return view('show', compact('product', 'productFromSameCategory'));
    }

    public function allProducts($name, Request $request){
    	$category = Category::where('slug',$name)->first();
    	$categoryId = $category->id;
    	//For creating ::where statements, you will use get() and first() methods. The first() method will return only one record, while the get() method will return an array of records that you can loop over
    	$filtersubcategories=[];
    	if($request->subcategory){
	   		//filter
	   		$products = $this->filterProducts($request);
	   		$filtersubcategories = $this->getSubcategoriesId($request);

	   	}
    	elseif ($request->min || $request->max) {
	   		$products = $this->filterByPrice($request);
	   	}
	   	else{
    		$products = Product::where('category_id',$category->id)->get();
    	}
    	$subcategories = Subcategory::where('category_id',$category->id)->get();

    	$slug = $name;

    	return view('category', compact('category','products','subcategories','slug','filtersubcategories','categoryId'));
    }

    public function filterProducts(Request $request){
    	$subId= [];
    	$subcategory = Subcategory::whereIn('id',$request->subcategory)->get();
    	//whereIn method will take a field as first argument and the second will be an array which will be used to create an array of elements they both have in common
    	foreach($subcategory as $sub){
    		array_push($subId, $sub->id);
    	}

    	$products = Product::whereIn('subcategory_id', $subId)->get();

    	return $products;
    }

    public function getSubcategoriesId(Request $request){
    	$subId= [];
    	$subcategory = Subcategory::whereIn('id',$request->subcategory)->get();
    	//whereIn method will take a field as first argument and the second will be an array which will be used to create an array of elements they both have in common
    	foreach($subcategory as $sub){
    		array_push($subId, $sub->id);
    	}

    	return $subId;
    }

    public function filterByPrice(Request $request){
    	$categoryId = $request->categoryId;
    	$products = Product::whereBetween('price',[$request->min,$request->max])->where('category_id',$categoryId)->get();
    	return $products;
    }


}
