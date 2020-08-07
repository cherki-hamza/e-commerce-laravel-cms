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
                    <h1>Edit User</h1>
                    <small>it all starts here</small>
                </div>
            </section>
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="col-md-10">
                        <div class="card  justify-content-center text-center my-5">
                            <div class="card-header">
                                <h2></h2>
                                <h1 class="text-primary">Edit Profile :</h1>
                            </div>
                            <div class="card-body justify-content-center">
                                <form action="{{route('user.update' , $profile->user_id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group text-left">
                                        <label for="name"><span class="text-success">User Profile Name :</span></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$profile->user->name}}">
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="about"><span class="text-success">About me :</span></label>
                                        <input type="text" class="form-control" name="about" id="about" value="{{$profile->about}}">
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="tel"><span class="text-success">Tel And WhatsApp :</span></label>
                                        <input type="text" class="form-control" name="tel" id="tel" value="{{$profile->tel}}">
                                    </div>


                                    <div class="form-group text-left">
                                        <label for="email"><span class="text-success">Email :</span></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$profile->email}}">
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="picture"><span class="text-success">Photo Profile :</span></label>
                                        <input type="file" class="form-control" name="picture" id="picture">
                                        <hr>
                                        <img style="border-radius: 100%;width: 100px;height: 100px;" id="" class="img-circle" src="{{ $profile->user->hasPicture()? $profile->user->getPicture() : $user->getGravatar()}}" />
                                    </div>

                                    <div class="form-group my-5">
                                        <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
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
