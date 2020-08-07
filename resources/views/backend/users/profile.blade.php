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
                    <h1>show User Profile</h1>
                    <small class="text-danger">Welcome {{$user->name}}</small>
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>User Profile Information</h4>
                                </div>
                            </div>
                            <div class="panel-body row">
                                <div class="col-md-6">
                                    <div class="" >
                                        <img  style="width: 50px;height: 50px;" src="{{ $user->hasPicture()? $user->getPicture() : $user->getGravatar()}}" class="img-circle" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><span class="text-success">Profile Name : </span>{{$user->name}}</h5>
                                            <p class="card-text"><span class="text-success"><i class="fa fa-paragraph"></i></span> {{$user->profile->about}}</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><span class="text-success">Email : </span>{{$user->email}}</li>
                                            <li class="list-group-item"><span class="text-success">Tel and whatsApp : </span>{{$user->profile->tel}}</li>
                                            <li class="list-group-item"><span class="text-success"><i class="fa fa-calendar-times-o"></i></span> Updated at {{$user->profile->updated_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <h5 class="text-success">cherki hamza</h5>
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
