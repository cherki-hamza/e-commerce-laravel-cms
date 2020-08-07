@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Liste des utilisateurs</h4>

    <div  class="table-responsive dash-social">
        <table id="datatable" class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach($users as $user)
                <tr>
                    <td><span class="text-center"><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$user->getPicture()}}" alt="{{$user->name}}"></span></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->products()->count()}}</td>
                    <td>
                        <a href="{{ route('access',$user->id) }}" class="btn btn-link">
                            Associer
                        </a>
                        <a href="{{ route('cart.show', Auth::user()->id) }}" class="btn btn-link">
                            Gérer les paniers
                        </a>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>

    </div>

    <div class="emptyBox d-none" >
        <!-- <img src="images/illu-11.png" alt=""> -->
        <h2>Oups !</h2>
        <p>Malheureusement, votre recherche n'a donné aucun résultat.</p>
    </div>


     <!-- Modal remove Announce  -->
    <div class="modal fade" id="removeProduct" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-body default-modal">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="text-center">
                        <div class="boxicon btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <h4>Supprimer le produit</h4>
                        <p>
                            Voulez-vous vraiment supprimer ce produit ?
                        </p>
                        <div class="group_buttons">
                            <button type="button" class="btn btn-success btnDone" data-record="" >Oui</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Non</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
