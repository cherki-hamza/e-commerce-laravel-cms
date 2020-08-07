@extends('backend.master.app')

@section('my-styles')
    <style>
        .cherki-inline span{
            display: inline-block;
        }
    </style>
@endsection

@section('title' , 'Users Admin Dashboard')



@section('content')

    <!-- Site wrapper -->
    <div class="wrapper">
    @include('backend.partials.headerSection-admin')
    <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
    @include('backend.partials.nav-admin')
    <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon">
                    <i class="fa fa-file-text"></i>
                </div>
                <div class="header-title">
                    <h1>Admin Dashboard</h1>
                    <small>this is the Admin dashboard</small>
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>All Orders by User</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="container">
                                    @if($carts->count() > 0)
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th>the Order ID#</th>
                                            <th>Order product photo</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>Order product title</th>
                                            <th>Order product price</th>
                                            <th>Order product quantity</th>
                                            <th>Order product Total Prise</th>
                                            <th>Status</th>
                                            <th>Order date shop</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $cart)
{{--                                             {{print_r($cart)}}--}}
                                             @foreach($cart->items as $item)
{{--                                                 {{print_r($cart)}}--}}
                                                 @foreach($the_orders as $the_order)
                                             <tr>
                                                 <td>{{$the_order->id}}</td>
                                                 <td><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$item['image']}}" alt="{{$item['title']}}"></td>
                                                 <td>{{Auth::user()->name}}</td>
                                                 <td>{{Auth::user()->email}}</td>
                                                 <td>{{$item['title']}}</td>
                                                 <td>{{$item['price']}}</td>
                                                 <td>{{$item['qty']}}</td>
                                                 <td>{{$cart->totalPrice}}</td>
                                                 <td class="text-success">Was purchased</td>
                                                 <td>{{$the_order->created_at->diffForHumans()}}</td>

                                             </tr>
                                                 @endforeach
                                             @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                      <div class="alert alert-success text-center"><span class="font-weight-bold">Oops this user dont have any order the cart shop is Empty</span></div>
                                    @endif
                                </div>
                            </div>
                            <div class="panel-footer">
                                This is standard panel footer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


@endsection
