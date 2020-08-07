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
                                    <h4>All Users</h4>
                                    <h3 style="color: darkred;margin: 20px">Hello {{Auth::user()->name}} your Role is
                                          @if(Auth::user()->isAdmin())
                                           <span class="text-success text-uppercase text-capitalize">{{Auth::user()->role}} so you have a Full Permissions</span>
                                          @elseif(Auth::user()->isViewer())
                                            <span class="text-success text-uppercase text-capitalize">{{Auth::user()->role}} so you have Permission to view all Users And just to show your profiles   </span>
                                          @else
                                            <span class="text-success text-uppercase text-capitalize">{{Auth::user()->role}} so you have Permission to view all Users And Edit just Your Profile</span>
                                          @endif
                                    </h3>
                                </div>
                            </div>
                            <div class="panel-body">
                              <div class="container">
                                  <table class="table table-bordered table-responsive">
                                      <thead>
                                            <tr>
                                                <th>ID#</th>
                                                <th>User Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Change Role</th>
                                                <th>Action</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($users as $user)
                                        <tr class="{{(Auth::user()->name == $user->name)? 'bg-info':'' }}">
                                            <td>{{$user->id}}</td>
                                            <td><span class="text-center"><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$user->profile->picture}}" alt=""></span></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-center" style="font-weight :bold ;color: {{($user->role === 'admin')? 'gold':'red'}}">{{$user->role}}</td>

                                            <td style="background-color:{{ (Auth::user()->name == 'cherki hamza' && $user->id == 1) ? 'black':''  }}"  class="text-center">
                                                @if(Auth::user()->isAdmin())
                                                    @if(Auth::user()->name == 'cherki hamza' && $user->name =="cherki hamza")
                                                        <span class="text-white text-center font-weight-bold">I'm a super Admin I Have Fll Administration</span>
                                                    @endif
                                                 <div class="row cherki-inline text-center">
                                                  <span>
                                                        <form action="{{route('user.make-admin' , ['user'=> $user->id])}}" method="POST">
                                                            @csrf
                                                             <input type="submit" class="btn btn-add" value="Admin">
                                                        </form>
                                                   </span>

                                                     <span>
                                                            <form action="{{route('user.make-editor' , ['user'=> $user->id])}}" method="POST">
                                                                @csrf
                                                                  <input type="submit" class="btn btn-add" value="Editor">
                                                            </form>
                                                     </span>

                                                     <span>
                                                            <form action="{{route('user.make-viewer' , ['user'=> $user->id])}}" method="POST">
                                                                @csrf
                                                                 <input type="submit" class="btn btn-add" value="Viewer">
                                                            </form>
                                                     </span>

                                                 </div>

                                                @else
                                                  <a href=""><span class="text-warning">Oops No Permission</span></a>
                                                @endif

                                             </td>

                                          <!--start the action buttons -->
                                             <!-- if user is admin -->
                                             @if(Auth::user()->isAdmin())
                                            <td>
                                                <div class="row cherki-inline text-center">
                                                    <a  href="{{route('user.edit', ['user'=>$user->id])}}"><span class="btn btn-primary">Edit</span></a>
                                                    <a  href="{{route('profile' , ['user'=>$user->id,'name'=>$user->name])}}"> <span class="btn btn-success">Show</span></a>
                                                    <span>
                                                        <form action="{{route('user.destroy' , ['user'=>$user->id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input  type="submit"  class="btn btn-danger" value="Delete">
                                                        </form>
                                                    </span>
                                                </div>
                                            </td>
                                               <!-- if user is Viewer -->
                                             @elseif(Auth::user()->isViewer())
                                            <td>
                                                <div class="row cherki-inline text-center">
                                                    <a onclick="return false;" href="{{route('user.edit', ['user'=>$user->id])}}"><span class="btn btn-primary {{(Auth::user()->isViewer())? 'disabled':'' }}">Edit</span></a>
                                                    <a onclick="return {{ (Auth::user()->isViewer() && Auth::user()->name === $user->name)? 'true':'false'}};" href="{{route('profile' , ['user'=>$user->id,'name'=>$user->name])}}"> <span class="btn btn-success {{(Auth::user()->name === $user->name)? '':'disabled' }}">Show</span></a>
                                                    <span>
                                                        <form action="{{route('user.destroy' , ['user'=>$user->id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input onclick="return false;"  type="submit"  class="btn btn-danger {{(Auth::user()->isViewer())? 'disabled':'' }}" value="Delete">
                                                        </form>
                                                    </span>
                                                </div>
                                            </td>
                                            <!-- if user is Editor -->
                                            @else
                                            <td>
                                                <div class="row cherki-inline text-center">
                                                    <a onclick="return {{ (Auth::user()->isEditor() && Auth::user()->role == $user->role)? 'true':'false'  }};" href="{{route('user.edit', ['user'=>$user->id])}}"><span class="btn btn-primary {{(Auth::user()->isEditor() && Auth::user()->role == $user->role)? '':'disabled' }}">Edit</span></a>
                                                   <a onclick="return {{ (Auth::user()->isEditor() && Auth::user()->role == $user->role)? 'true':'false'  }};" href="{{route('profile' , ['user'=>$user->id,'name'=>$user->name])}}"> <span class="btn btn-success {{(Auth::user()->isEditor() && Auth::user()->role == $user->role)? '':'disabled' }}">Show</span></a>
                                                    <span>
                                                        <form action="{{route('user.destroy' , ['user'=>$user->id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <input onclick="return {{ (Auth::user()->isEditor() && Auth::user()->role == $user->role)? 'true':'false'  }};"  type="submit"  class="btn btn-danger {{(Auth::user()->isEditor())? '':'disabled' && (Auth::user()->role == $user->role)? '':'disabled' }}" value="Delete">
                                                        </form>
                                                    </span>
                                                </div>
                                            </td>
                                            @endif
                                            <!-- end the actions button -->

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
