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
                    <small>this is the Products dashboard</small>
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>All Products</h4>
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
                                          @foreach($products as $product)
                                            <tr class="text-center">
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->product_title}}</td>
                                                <td><span class="text-center"><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$product->getPicture()}}" alt="{{$product->product_title}}"></span></td>
                                                <td>{{$product->product_desc}}</td>
                                                <!-- this is the role of users show the user name for admin and disable the name for the viewer (lecteur) -->
                                                @if(Auth::user()->isAdmin() || Auth::user()->isEditor())
                                                <td>{{$product->user['name']}}</td>
                                                @else
                                                 <td class="text-info">Oops no permission</td>
                                                @endif

                                                <td class="text-center">{{$product->product_price}}</td>
                                                <td class="text-center">{{$product->product_qt}}</td>
                                                <td class="text-center">{{$product->product_total_price}}</td>



{{--                                                <td>--}}
{{--                                                    <div class="row cherki-inline text-center">--}}
{{--                                                        <a href="{{route('product.edit' ,['product'=>$product->id])}}"><span class="btn btn-primary">Edit</span></a>--}}
{{--                                                        <a href="{{route('product.show' , ['product'=>$product->id])}}"> <span class="btn btn-success">Show</span></a>--}}
{{--                                                        <span>--}}
{{--                                                        <form action="{{route('product.destroy' , ['product'=>$product->id])}}" method="POST">--}}
{{--                                                            @csrf--}}
{{--                                                            @method('delete')--}}
{{--                                                            <input type="submit"  class="btn btn-danger" value="Trash">--}}
{{--                                                        </form>--}}
{{--                                                    </span>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}


                                                @if(Auth::user()->isAdmin())
                                                    <td>
                                                        <div class="row cherki-inline text-center">
                                                            <a  href="{{route('product.edit' ,['product'=>$product->id])}}"><span class="btn btn-primary">Edit</span></a>
                                                            <a  href="{{route('product.show' , ['product'=>$product->id])}}"> <span class="btn btn-success">Show</span></a>
                                                            <span>
                                                        <form action="{{route('product.destroy' , ['product'=>$product->id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input onclick="return {{(Auth::user()->isAdmin())? 'true':'false'}};"  type="submit"  class="btn btn-danger" value="Trash">
                                                        </form>
                                                    </span>
                                                        </div>
                                                    </td>
                                                    <!-- if user is Viewer -->
                                                @elseif(Auth::user()->isViewer())
                                                    <td>
                                                        <div class="row cherki-inline text-center">
                                                            <a onclick="return {{ (Auth::user()->isViewer())? 'false':'true'}};" href="{{route('product.edit' ,['product'=>$product->id])}}"><span class="btn btn-primary {{(Auth::user()->isViewer())? 'disabled':'' }}">Edit</span></a>
                                                            <a onclick="return {{ (Auth::user()->isViewer())? 'false':'true'}};" href="{{route('product.show' , ['product'=>$product->id])}}"> <span class="btn btn-success {{(Auth::user()->isViewer())? 'disabled':'' }}">Show</span></a>
                                                            <span>
                                                        <form action="{{route('product.destroy' , ['product'=>$product->id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input onclick="return {{(Auth::user()->isViewer())? 'false':'true'}};"  type="submit"  class="btn btn-danger {{(Auth::user()->isViewer())? 'disabled':'' }}" value="Trash">
                                                        </form>
                                                    </span>
                                                        </div>
                                                    </td>
                                                    <!-- if user is Editor -->
                                                @else
                                                    <td>
                                                        <div class="row cherki-inline text-center">
                                                            <a onclick="return {{ (Auth::user()->isEditor())? 'true':'false'  }};" href="{{route('product.edit' ,['product'=>$product->id])}}"><span class="btn btn-primary {{(Auth::user()->isEditor())? '':'disabled' }}">Edit</span></a>
                                                            <a onclick="return {{ (Auth::user()->isEditor())? 'true':'false'  }};" href="{{route('product.show' , ['product'=>$product->id])}}"> <span class="btn btn-success {{(Auth::user()->isEditor())? '':'disabled' }}">Show</span></a>
                                                            <span>
                                                        <form action="{{route('product.destroy' , ['product'=>$product->id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input onclick="return {{ (Auth::user()->isEditor())? 'true':'false'  }};"  type="submit"  class="btn btn-danger {{(Auth::user()->isEditor())? '':'disabled' }}" value="Trash">
                                                        </form>
                                                    </span>
                                                        </div>
                                                    </td>
                                                @endif


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
