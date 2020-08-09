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
                    <h1>Admin Dashboard</h1>
                    <small>this is the Admin dashboard</small>
                    @if($msg = session()->get('success'))
                        <h2 class="alert alert-success col-md-10">{{$msg}}</h2>
                    @endif
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>Dashboard Statistics</h4>
                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- alerts with icons -->
                                        <div class="row">
                                            <div class="col-sm-6 my-5">
                                                <div class="alert alert-sm alert-success alert-dismissible" role="alert">
                                                    <h2><i class="fa fa-users"></i>Users</h2>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <i class="fa fa-users"></i><strong>Total Users : <span class="badge">{{$users_count}}</span></strong>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 my-5">
                                                <div class="alert alert-sm alert-info alert-dismissible" role="alert">
                                                    <h2><i class="fa fa-shopping-basket"></i>Products</h2>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <i class="fa fa-shopping-basket"></i><strong>Total Products :  <span class="badge">{{$products_count}}</span></strong>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 my-5">
                                                <div class="alert alert-sm alert-warning alert-dismissible" role="alert">
                                                    <h2><i class="fa fa-shopping-cart"></i>Orders</h2>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <i class="fa fa-shopping-cart"></i><strong>Total Orders : <span class="badge">{{$orders_count}}</span></strong>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 my-5">
                                                <div class="alert alert-sm alert-danger alert-dismissible" role="alert">
                                                    <h2>Trashed Products</h2>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <i class="fa fa-shopping-bag"></i><strong class="header-title">Total Soft Delete Products (trashed) : <span class="badge">{{$trashed}}</span></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- / alerts with icons -->
                                    </div>

                                </div>

                           </div>
                            <div class="panel-footer">
                                Dashboard
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


@endsection
