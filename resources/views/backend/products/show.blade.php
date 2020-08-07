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
                                    <h4>Show Product</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="card mb-3">
                                        <img src="{{$product->getPicture()}}" class="card-img-top img-thumbnail" width="60%" height="20px" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$product->product_title}}</h5>
                                            <p class="card-text">{{$product->product_desc}}</p>
                                            <p class="card-text"><small class="text-danger">Last updated {{$product->updated_at->diffForHumans()}}</small></p>
                                        </div>
                                    </div>
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
