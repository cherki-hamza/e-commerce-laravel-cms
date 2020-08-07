@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produit <b>{{ $product->id }}</b></div>

                <div class="card-body">
                    <dl class="d-flex">
                        <dt class="w-25 pr-3">Identifiant</dt>
                        <dd class="w-75">
                            @if(Auth::user()->isAdmin() || Auth::user()->isEditor())
                                <span>{{$product->user->name}}</span>
                            @else
                                <span class="text-info">Oops no permission To show the name of user</span>
                            @endif
                        </dd>
                    </dl>

                    <dl class="d-flex">
                        <dt class="w-25 pr-3">Image</dt>
                        <dd class="w-75"> <span class="text-center"><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$product->getPicture()}}" alt="{{$product->product_title}}"></span> </dd>
                    </dl>

                    <dl class="d-flex">
                        <dt class="w-25 pr-3">Titre</dt>
                        <dd class="w-75">{{$product->product_title}}</dd>
                    </dl>

                    <dl class="d-flex">
                        <dt class="w-25 pr-3">Description</dt>
                        <dd class="w-75"> {{$product->product_desc}} </dd>
                    </dl>


                    <dl class="d-flex">
                        <dt class="w-25 pr-3">Prix (par unité)</dt>
                        <dd class="w-75">{{$product->product_price}} €</dd>
                    </dl>

                    <dl class="d-flex">
                        <dt class="w-25 pr-3">Quantité</dt>
                        <dd class="w-75">{{$product->product_qt}}</dd>
                    </dl>

                    <dl class="d-flex">
                        <dt class="w-25 pr-3">Prix total</dt>
                        <dd class="w-75">{{$product->product_total_price}} €</dd>
                    </dl>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
