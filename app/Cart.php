<?php
namespace App;


class Cart
{
    
	public $items= [];
	public $totalQty, $totalPrice;

	public function __construct($cart=null){

		if($cart){
			$this->items = $cart->items;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQty = $cart->totalQty;
		}
		else{
			$this->items = [];
			$this->totalPrice =0;
			$this->totalQty = 0;
		}
	}

	public function add($product){
		$item = [
				'id'=> $product->id,
				'name'=> $product->name,
				'price'=> $product->price,
				'qty'=> 0,
				'image'=> $product->image
		];

		if(!array_key_exists($product->id, $this->items)){
			$this->items[$product->id] = $item;
			$this->totalQty+=1;
			$this->totalPrice+=$product->price;
		}
		else{
			$this->totalQty+=1;
			$this->totalPrice+=$product->price;
		}
		$this->items[$product->id]['qty']+=1;
	}

	public function updateQty($id, $qty){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price']* $this->items[$id]['qty'];
		//adding new item
		$this->items[$id]['qty']= $qty;
		$this->totalQty += $qty; 
		$this->totalPrice += $qty*$this->items[$id]['price'];
		
	}

	public function removeCart($id){
		if(array_key_exists($id, $this->items)){
			$this->totalQty -= $this->items[$id]['qty'];
			$this->totalPrice -= $this->items[$id]['price']* $this->items[$id]['qty'];
			unset($this->items[$id]);
		}
	}

}
