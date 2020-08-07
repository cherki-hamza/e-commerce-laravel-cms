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
                    <small>this is the Trashed Products</small>
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Trashed Products (soft delete)</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="container">
                                    @if($msg = session()->get('success'))
                                        <h2 class="alert alert-success col-md-10">{{$msg}}</h2>
                                    @elseif($msg = session()->get('danger'))
                                        <h2 class="alert alert-danger">{{session()->get('danger')}}</h2>
                                    @else
                                    @endif
                                    <table class="table table-bordered table-responsive table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID#</th>
                                            <th>Title</th>
                                            <th>Product Photo</th>
                                            <th>Description</th>
                                            <th>User Name</th>
                                            <th>Product Price </th>
                                            <th>Product Quantity </th>
                                            <th>Product Total Price </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($trashed as $product)
                                            <tr class="text-center">
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->product_title}}</td>
                                                <td><span class="text-center"><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$product->getPicture()}}" alt="{{$product->product_title}}"></span></td>
                                                <td>{{$product->product_desc}}</td>
                                                <td>{{$product->user['name']}}</td>
                                                <td class="text-center">{{$product->product_price}}</td>
                                                <td class="text-center">{{$product->product_qt}}</td>
                                                <td class="text-center">{{$product->product_total_price}}</td>


                                                <td>
                                                    <div class="row cherki-inline text-center">

                                                        <span>
                                                            <a href="{{route('restore.product',['id'=>$product->id])}}"><button class="btn btn-primary" type="submit">Restore</button></a>
                                                        </span>

                                                        <span>
                                                        <form action="{{route('product.destroy' , ['product'=>$product->id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="submit"  class="btn btn-danger" value="Delete">
                                                        </form>
                                                    </span>

                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
