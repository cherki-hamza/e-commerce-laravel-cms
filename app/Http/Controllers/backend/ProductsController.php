<?php

namespace App\Http\Controllers\backend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\ProductRequest;
use App\Http\Requests\backend\ProductUpdateRequest;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // add product to cart
    public function addToCart(Product $product){
      if (session()->has('cart')){
          $cart = new Cart(session()->get('cart'));
      }else{
          $cart = new Cart();
      }
      $cart->add($product);
      //dd($cart);
      session()->put('cart',$cart);
      return redirect()->back()->with('success','the product add to cart with success');
    }

    // remove product from cart
    public function remove(){

    }

    // show all product to cart v1
    public function shopCart(){

        if (session()->has('cart')){
          $cart = new Cart(session()->get('cart'));
        }else{
           $cart = null;
        }
        return view('pages.shop-cart')->with('cart',$cart);
    }

    // show all product to cart v2
    public function shopCartV2(){

        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        $orders = Order::all();
        return view('pages.shopcart')->with('cart',$cart)->with('orders',$orders);
    }

    // checkout the cart total price for payment
    public function checkout($amount){
        return view('pages.checkout',['amount'=>$amount]);
    }


    // show all product in dashboard
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index',['products'=>$products]);
    }

    // create new product for show the create form product
    public function create()
    {
        return view('backend.products.create');
    }

    // store new product in database
    public function store(ProductRequest $request)
    {
        if ($request->hasFile('picture')){
            $image = $request->file('picture');
            $input['image_name'] = time().  '.' . $image->getClientOriginalExtension();
            $the_image = '/images/products/'.$input['image_name'];
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath , $input['image_name']);

                Product::create([
                   'product_title'  =>  $request->get('title'),
                   'product_picture'  =>  $the_image,
                   'product_desc'  =>   $request->get('desc'),
                   'product_price'  => $price = $request->get('price'),
                   'product_qt'  =>  $qt = $request->get('quantity'),
                   'product_total_price'  =>  ($qt*$price),
                   'user_id'  =>  $request->get('user_id'),
                ]);
        }
        return redirect()->back()->with('success','the product created with success');
    }

    // show single product by id
    public function show(Product $product)
    {
        return view('backend.products.show',['product'=>$product])->with('success','the product restore with success');
    }

    // edit the product
    public function edit(Product $product)
    {
        return view('backend.products.edit',['product'=>$product]);
    }

    // update the product
    public function update(ProductUpdateRequest $request, Product $product)
    {
        if ($request->hasFile('picture')){
            $image = $request->file('picture');
            $input['image_name'] = time().  '.' . $image->getClientOriginalExtension();
            $the_image = '/images/products/'.$input['image_name'];
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath , $input['image_name']);

            $product->update([
                'product_title'  =>  $request->get('title'),
                'product_picture'  =>  $the_image,
                'product_desc'  =>   $request->get('desc'),
                'product_price'  => $price = $request->get('price'),
                'product_qt'  =>  $qt = $request->get('quantity'),
                'product_total_price'  =>  ($qt*$price),
                'user_id'  =>  $request->input('user_id'),
            ]);

        }else{
            $product->update([
                'product_title'  =>  $request->get('title'),
                'product_desc'  =>   $request->get('desc'),
                'product_price'  => $price = $request->get('price'),
                'product_qt'  =>  $qt = $request->get('quantity'),
                'product_total_price'  =>  ($qt*$price),
                'user_id'  =>  $request->input('user_id'),
            ]);
        }

        return redirect()->back()->with('success','the Product Updated with success');

    }


    // delete the product
    public function destroy($product)
    {
        if (session('success')){
            toast(session('success'),'success','top-right')->hideCloseButton();
        }
        // get the trashed product
        $the_product = Product::withTrashed()->where('id',$product)->first();

        // check if this $the_product is a trashed() product
        if ($the_product->trashed()){
            // delete file methode 1 :
            // this is for delete the image product file from the storage (php artisan storage link )
            //Storage::delete($the_product->product_picture);

            // delete file methode 2 :
            // get the file path and delete the file
            $image_path = app_path("images/products/".$the_product->product_picture);
            // check the fil if exist
            if(file_exists($image_path)){
                //File::delete($image_path);
                Storage::delete($image_path);
            }
            // force delete the product post from the database
            $the_product->forceDelete();
        }else{
            // just trash the product ==> make it in trashed product
            $the_product->delete();
        }

        return redirect()->back()->with('success','the Product Trashed with success');
    }

    // show All the trashed Products
    public function trashed(){
        if (session('success')){
            toast(session('success'),'success','top-right')->hideCloseButton();
        }
        $trashed = Product::onlyTrashed()->get();
        return view('backend.products.trashed-product',['trashed'=>$trashed])->with('success','the Product Trashed with success');
    }

    // restore the trashed product
    public function restore($id){
        if (session('success')){
            toast(session('success'),'success','top-right')->hideCloseButton();
        }
        Product::withTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('success' , 'the product Restore with success');
    }


}
