<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\User;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    // secure the page controller
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    // show the Main / shop website
    public function index(){

        if (session('success')){
            toast(session('success'),'success','top-right')->hideCloseButton();
        }

        $products = Product::paginate(4);
        return view('cherki-hamza-shop',['products'=>$products]);
    }

    // show the products
    public function products()
    {
        if (session('success')){
            //toast(session('success'),'success','top-right')->hideCloseButton();
            alert()->error('Delete Product','Are you sur to delete this product')->autoClose(100000);
        }
        if (Auth::user()){
            $products = Product::where('user_id' , Auth::user()->id)->paginate(5);
        }else{
            $products = Product::paginate(5);
        }


        return view('pages.productsList',['products'=>$products])->with('success','User Profile Edited with success');
    }

    // show product by id
    public function product(Product $product)
    {
        return view('pages.product', ['product'=>$product])->with('success','User Profile Edited with success');
    }

    // show users
    public function users()
    {
        $users = User::all();
        return view('pages.usersList',['users'=>$users]);
    }

    // role of users
    public function access(User $user)
    {
        if (session('success')){
            toast(session('success'),'success','top-right')->hideCloseButton();
        }
        return view('pages.accessManagement', ['user'=>$user]);
    }

    // shop cart
    public function shopcart($user)
    {
        return view('pages.shopcart', compact('user'));
    }

    // function to change role for users
    public function changeRole(Request $request,User $user){
         $role = $user->role = $request->get('role');
          if ($role == 1){
              $newRole = $user->role = 'admin';
              $user->save();
          }elseif($role == 2){
              $newRole = $user->role = 'editor';
              $user->save();
          }else{
              $newRole = $user->role = 'viewer';
              $user->save();
          }

          return redirect()->back()->with('success' , 'the user role updated with success');

    }

    // function to handle payment with strip
    public function charge(Request $request){
        Auth::user()->orders()->create([
            'cart'=> serialize(session()->get('cart'))
        ]);
        $amount = $request->amount;
        session()->forget('cart');
        return redirect()->route('main',['amount'=>$amount])->with('success','Your Total shop is $'.$amount.' and the Payment was done.  Thanks :)');

    }

    // remove product item from cart
    public function remove_product(Product $product){
        $cart =  new Cart( session()->get('cart') );
        $cart->remove($product->id);

        if ($cart->totalQty <= 0){
            session()->forget('cart');
        }else{
            session()->put('cart' , $cart);
        }

        return redirect()->route('cart.show')->with('success','the product remove with success');
    }

    // update product quantity and price and total price in the cart shop
    public function update_product(Request $request , Product $product){
        // validate the request
        $request->validate([
           'qty' => 'required|numeric|min:1',
        ]);

        // create updated new cart shop
        $cart = new Cart(session()->get('cart'));
        // update the cart quantity
        $cart->updateQty($product->id , $request->qty);
        // put the updated cart to session cart
        session()->put('cart',$cart);
        // redirect to view
        return redirect()->back()->with('success','the product qty and price and total price updated with success');

    }

}



/* stripe payment test
 * //        $stripe = new Stripe();
//
//        $stripe = Stripe::make('pk_test_hTyDO8JSqK5XMMoKdlQLXu7d00vgzx80q6','2019-02-19');
//        //dd($request->stripeToken);
//        $stripe->charges()->create([
//           'currency' => 'USD',
//           'source' => $request->stripeToken,
//           'amount' => $request->amount,
//          // 'description' => 'hello from cherki hamza your shopping is with success'
//        ]);
//
//        $chargeId = $stripe['id'];
//
//
//        if ($chargeId){
//            // save order on orders table
//            // clear cart
//            // session()->forget('cart');
//            return redirect()->route('main')->with('success','Payment was done. Thanks');
//        }else{
//            return redirect()->back();
//        }
 * */
