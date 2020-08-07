@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if($msg = session()->get('success'))
                <h2 class="alert alert-success col-md-10">{{$msg}}</h2>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Utilisateur <b>{{ $user->id }}</b></div>

                <div class="card-body">
                    <form action="{{route('changeRole' , $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="userName">Nom </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" class="form-control" id="userName" value="{{$user->name}}" name="userName" readonly="" disabled />
                            </div>
                        </div>

                         <div class="form-group row">
                             <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="userName">Image </label>
                             <div class="col-lg-9 col-xl-6">
                                 <span class="text-center"><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$user->getPicture()}}" alt="{{$user->name}}"></span>
                             </div>
                         </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="mail">Email  </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" class="form-control" id="mail" value="{{$user->email}}" name="mail" readonly="" disabled />
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="product">Produit  </label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control" placeholder="Produit" id="product" name="product" required="" multiple="">
                                    <option value="1"> Produit 1</option>
                                    <option value="2"> Produit 2</option>
                                    <option value="3"> Produit 3</option>
                                    <option value="4"> Produit 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="amount">Quantité  </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="number" class="form-control" id="amount" value="" name="amount" placeholder="Quantité" />
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="role">Rôle  </label>

                            <div class="col-lg-9 col-xl-6">
                                @if(Auth::user()->isAdmin())
                                    <select class="form-control" id="role" name="role" placeholder="Produit" required="" placeholder="Rôle"  >
                                        <option>{{$user->role}}</option>
                                        <option value="1"> Admin</option>
                                        <option value="2"> Editor</option>
                                        <option value="3"> Viewer</option>

                                    </select>
                                @else
                                    <span class="text-success" style="margin-left: 8px;">{{$user->role}}</span>
                                    <span class="text-danger" style="margin-left: 20px;">Oops no permission to change role</span>
                                @endif
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-9 col-xl-9 text-right my-4">
                                <button onclick="return {{  (Auth::user()->isAdmin())?  'true':'false'  }}" type="submit" id="submit" class="btn btn-primary {{(Auth::user()->isAdmin())? '': 'disabled'}}">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
