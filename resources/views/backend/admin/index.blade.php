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
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>This is page content</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <p>You can create here any grid layout you want. And any variation layout you imagine:) Check out main dashboard and other site. It use many different layout. </p>
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
