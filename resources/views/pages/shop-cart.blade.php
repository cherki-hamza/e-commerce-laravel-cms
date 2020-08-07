@extends('layouts.app')

@section('content')
    <div class="container mt-1 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header"><span class="text-success">Utilisateur  :</span> <b>{{(Auth::user())? Auth::user()->name : ''}}</b></div>
                    <div class="cart-body">

                       @if($cart)
                       <div class="row">
                           <div class="col-md-12">

                                 <div class="container">
                                     <div class="row">
                                         <div class="col-sm-12 col-md-10 col-md-offset-1">
                                             <table class="table table-hover">
                                                 <thead>
                                                 <tr>
                                                     <th>Product</th>
                                                     <th>Quantity</th>
                                                     <th class="text-center">Price</th>
                                                     <th class="text-center">Total</th>
                                                     <th> </th>
                                                 </tr>
                                                 </thead>
                                                 <tbody>
                                                 @foreach($cart->items as $product)
                                                 <tr>
                                                     <td class="col-sm-8 col-md-6">
                                                         <div class="media">
                                                             <a class="thumbnail  pull-left" href="#"> <img class="media-object img-rounded img-circle" src="{{$product['image']}}" style="width: 72px; height: 72px;border-radius: 80%"> </a>
                                                             <div class="media-body">
                                                                 <h4 class="media-heading"><a href="#">{{$product['title']}}</a></h4>
                                                                 <h5 class="media-heading"> by <a href="#">{{(Auth::user())? Auth::user()->name : ''}}</a></h5>
                                                                 <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                                             </div>
                                                         </div></td>
                                                       <div style="margin-bottom: 10px;">
                                                         <form action="{{route('cart.update',$product['id'])}}" method="POST">
                                                             @csrf
                                                             @method('put')
                                                             <td class="col-sm-1 col-md-1" style="text-align: center">
                                                                 <input type="number"  class="form-control" name="qty" id="qty" value="{{$product['qty']}}">
                                                             </td>
                                                             <td class="col-sm-1 col-md-1 text-center"><strong>${{$product['price']}}</strong></td>

                                                             <td class="col-sm-1 col-md-1 text-center"><strong>${{($product['qty']*$product['price'])}}</strong></td>

                                                             <td class="col-sm-1 col-md-1">

                                                             <input type="submit" class="btn btn-primary" value="Change">
                                                         </form>
                                                         </div>

                                                         <form action="{{route('cart.remove',$product['id'])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                             <input type="submit" class="btn btn-danger" value="Remove">
                                                         </form>
                                                     </td>

                                                 </tr>
                                                 @endforeach

                                                 <tr>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td><h5>Subtotal</h5></td>
                                                     <td class="text-right"><h5><strong>{{$cart->totalPrice}}</strong></h5></td>
                                                 </tr>
                                                 <tr>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td><h5>Quantity Total of Products</h5></td>
                                                     <td class="text-right"><h5 class="text-info"><strong>{{$cart->totalQty}}</strong></h5></td>
                                                 </tr>
                                                 <tr>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td><h5>Estimated shipping</h5></td>
                                                     <td class="text-right"><h5><strong>Free Shipping</strong></h5></td>
                                                 </tr>
                                                 <tr>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td><h3>Total</h3></td>
                                                     <td class="text-right"><h3><strong>${{$cart->totalPrice}}</strong></h3></td>
                                                 </tr>
                                                 <tr>
                                                     <td>   </td>
                                                     <td>   </td>
                                                     <td>   </td>

                                                     <td>
                                                         <button type="button" class="btn btn-primary">
                                                             <span class="fa fa-shopping-cart text-sm-center">Shopping</span>
                                                         </button></td>
                                                     <td>
                                                         <a href="{{route('cart.checkout' , $cart->totalPrice)}}" class="btn btn-success">
                                                             <span class="fa fa-play text-sm-center">Checkout</span>
                                                         </a>
                                                     </td>

                                                 </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>

                           </div>

                       </div>
                        @else
                         <div class="row">

                             <div class="container">
                                 <div class="row">
                                     <div class="col-sm-12 col-md-10 col-md-offset-1">
                                         <div class="text-danger text-center"><h1>Oops there is no product in Shpping Cart it is Empty</h1></div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
