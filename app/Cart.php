<?php

namespace App;


// this is a class for represent the cart items for regroup the products in items array
// and the auto calculate the total quantity and also the auto calculate the total price

class Cart
{
    public $items = [];
    public $totalQty;
    public $totalPrice;

    // constructor
    public function __Construct($cart = null)
    {
      if ($cart){
          $this->items = $cart->items;
          $this->totalQty = $cart->totalQty;
          $this->totalPrice = $cart->totalPrice;
      }else{
          $this->items = [];
          $this->totalQty = 0;
          $this->totalPrice = 0;
      }

    }

    // function to add product to cart
    public function add($product){

        $item = [
          'id'=> $product->id,
          'title' => $product->product_title,
          'price' => $product->product_price,
          'qty' => 0,
          'image' => $product->product_picture,
        ];

        if( !array_key_exists($product->id , $this->items) ){
          $this->items[$product->id] = $item;
          $this->totalQty += 1;
          $this->totalPrice += $product->product_price;
        }else{
           $this->totalQty += 1;
           $this->totalPrice += $product->product_price;
        }

        $this->items[$product->id]['qty'] += 1;

    }

    // function to remove item from cart
    public function remove($id){
        if (array_key_exists($id,$this->items)){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];

            unset($this->items[$id]);
        }
    }


    // function to update quantity
    public function updateQty($id,$qty){
        // reset qty and price in the cart
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['qty'];

        // add the item with new quantity
        $this->items[$id]['qty'] = $qty;

        // total price and quantity in car
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['price'] * $qty;
    }


}
