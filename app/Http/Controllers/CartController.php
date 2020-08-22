<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    	public function addToCart(Product $product ){

    		if(session()->has('cart')){
    			$cart = new Cart(session()->get('cart'));
    		}
    		else{
    			$cart = new Cart();
    		}
    		$cart->add($product);

    		session()->put('cart', $cart);
    		// the put method is here to update the session by putting $cart in cart
    		notify()->success('Product added succesfully⚡️');
        	return redirect()->back();
    	}

    	public function showCart(){
    		if(session()->has('cart')){
    			$cart = new Cart(session()->get('cart'));
    		}
    		else{
    			$cart = null;
    		}

    		return view('cart', compact('cart'));
    	}

    	public function updateCart(Request $request, Product $product){
    		$request->validate([
    			'qty' => 'required|numeric|min:1'

    		]);

    		$cart = new Cart(session()->get('cart'));
    		$cart->updateQty($product->id, $request->qty);
    		session()->put('cart',$cart);
    		notify()->success('Cart Updated⚡️');
        	return redirect()->back();

    	}

    	public function removeCart(Product $product){
    		$cart = new Cart(session()->get('cart'));
    		$cart->removeCart($product->id);
    		if($cart->totalQty<=0){
    			session()->forget('cart');
    		}
    		else{
    			session()->put('cart', $cart);
	    		
    		}
	    	notify()->success('Cart Updated⚡️');
	        return redirect()->back();
    	}

    	public function checkout($amount){
    		return view('checkout', compact('amount'));
    	}
}
