@extends('backend.master.app')

@section('title' , 'Admin Dashboard')

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
                    <h1>Create New Product</h1>
                    <small>New Product</small>
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @if($msg = session()->get('success'))
                        <h2 class="alert alert-success">{{$msg}}</h2>
                    @endif
                    <div class="col-md-10">
                        <div class="card  justify-content-center text-center my-5">
                            <div class="card-header">
                                <h1 class="text-primary">Add New Product</h1>
                            </div>
                            <div class="card-body justify-content-center">
                                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group text-left">
                                        <label for="title"><span class="text-success">Product Title :</span></label>
                                        <input type="text" class="form-control  @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" id="title">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="picture"><span class="text-success">Product Picture :</span></label>
                                        <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" id="picture" value="{{old('picture')}}">
                                        @error('picture')
                                        <div class="alert alert-danger mt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="desc"><span class="text-success">Product Description :</span></label>
                                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"  cols="30" rows="5">{{old('desc')}}</textarea>
                                        @error('desc')
                                        <div class="alert alert-danger mt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="form-group text-left">
                                        <label for="price"><span class="text-success">Product Price :</span></label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}" id="price">
                                        @error('price')
                                        <div class="alert alert-danger mt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="quantity"><span class="text-success">Product Quantity :</span></label>
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity')}}" name="quantity" id="quantity">
                                        @error('quantity')
                                        <div class="alert alert-danger mt-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group my-5">
                                        <input type="submit" class="btn btn-primary" name="update_profile" value="Add New Product">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


@endsection
