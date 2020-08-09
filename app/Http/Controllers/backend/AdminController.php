<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Cartalyst\Stripe\Api\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

//    // secure the Admin controller
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    // function to show the Admin Dashboard
    public function index(){
        if (session('success')){
            toast(session('success'),'success','top-right')->hideCloseButton();
        }
        $products_count = Product::all()->count();
        $users_count = User::all()->count();
        $orders_count = Order::all()->count();
        $trashed = Product::onlyTrashed()->count();
        return view('backend.admin.index' ,
                      [
                          'products_count'=> $products_count,
                          'users_count'   => $users_count,
                          'orders_count'  => $orders_count,
                          'trashed'=>$trashed,
                      ]);
    }

    // show the all users
    public function users(){
        $users = User::all();

        return view('backend.users.index',['users'=>$users]);
    }

    // show User Profile
    public function profile(User $user){
        $profile = $user->profile;
        return view('backend.users.profile',['user'=>$user , '$profile'=>$profile]);
    }

    // edit user profile
    public function edit(User $user){
        $profile = $user->profile;
        return view('backend.users.edit' , ['user'=>$user , 'profile'=>$profile]);
    }

    // update user profile
    public function update(Request $request , User $user){
        if (session('success')){
            toast(session('success'),'success','top-right')->hideCloseButton();
        }
        $profile = $user->profile;
        $data = $request->all();
        if($request->hasFile('picture')){

            $image = $request->file('picture');
            $input['image_name'] = time().  '.' . $image->getClientOriginalExtension();
            $the_image = '/images/users/'.$input['image_name'];
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath , $input['image_name']);
            $data['picture'] = $the_image;
        }
        $profile->update($data);
        return redirect()->back()->with('success','User Profile Edited with success');
    }

    // function to delete user Profile
    public function destroy(User $user){
        $user->delete();
        return redirect(route('users'))->with('success','the User Profile deleted with success');
    }

    public function makeAdmin(User $user){
        $user->role = "admin";
        $user->save();
        return redirect(route('users'))->with('success' , 'the role change with success');
    }

    public function makeEditor(User $user){
        $user->role = "editor";
        $user->save();
        return redirect(route('users'))->with('success' , 'the role change with success');
    }

    // make user viewer
    public function makeViewer(User $user){
        $user->role = "viewer";
        $user->save();
        return redirect(route('users'))->with('success' , 'the role change with success');
    }

    // show the all orders in the admin dashboard
    public function orders(){
        // get all the_orders
        $the_orders = Order::all();
        //get the orders for auth user
        $orders = Auth::user()->orders;
        // convert data cart to json
        $carts = $orders->transform( function ($cart,$key){
            return unserialize($cart->cart);
        });
        //dd($carts);
        return view('backend.orders.index' , ['carts'=>$carts , 'the_orders'=>$the_orders]);
    }
}
