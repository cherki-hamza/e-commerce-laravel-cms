@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($cart)
            <div class="card">
                <div class="card-header">Utilisateur <b></b></div>

                <div class="card-body">
                     <form >
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="userName">Nom </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" class="form-control" id="userName" value="{{Auth::user()->name}}" name="userName" readonly="" disabled />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="mail">Email  </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" class="form-control" id="mail" value="{{Auth::user()->email}}" name="mail" readonly="" disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="shopcart">Panier </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="wrapper_shopcart">

                                    <div class="item_shopcart">

                                        <div class="mb-3 feilds_shopcart">
                                            <select class="form-control shopcart" placeholder="Panier" name="shopcart" required="" >
                                                <option></option>
                                                @foreach($cart->items as $product)
                                                  <option value="{{$product['id']}}"> Panier {{$product['id']}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row  mb-3 item_product d-none">
                                            <div class="row col-lg-10 feilds_product ">
                                                <div class="col-lg-6 pr-0 w_products">
                                                    <select class="form-control product" placeholder="Produit"  name="product" required="" >
                                                        <option></option>
                                                        @foreach($cart->items as $product)
                                                            <option value="{{$product['id']}}">  {{$product['title']}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-6 w_amount d-none">
                                                    @foreach($cart->items as $product)
                                                    <input type="number" class="form-control amount"   value="{{$product['qty']}}"   name="amount" min="1" placeholder="Quantité" />
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-lg-2 pl-0 w_action d-none">
                                                <button class="btn btn-primary addProduct" type="button" >+</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <a href="javascipte:;" class="text-primary addShopcart">+ Ajouter autre panier</a>


                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="count">Quantité totale  </label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="number" class="form-control" id="count" value="" name="count" placeholder="Quantité totale" readonly/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-9 col-xl-9 text-right my-4">
                                <button type="submit" id="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
                <div class="row">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-md-offset-1">
                                <div class="text-danger text-center"><h1>Oops there is no product in Shpping Cart it is Empty</h1></div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('my-script')
    <script type="text/javascript">
        $(document).ready(function(){

            $('.wrapper_shopcart').on('change', '.shopcart', function (event) {

                if ( $(this).val() != ""){
                    $(this).parents('.item_shopcart').find('.item_product').removeClass('d-none')
                }else{
                    $(this).parents('.item_shopcart').find('.item_product').addClass('d-none')
                }
                var count = 0;
                $('.amount').each(function(){
                    if ( ! $(this).parent('.w_amount').hasClass('d-none'))
                        count += Number($(this).val())
                });
                $('#count').val(count)
            })

            $('.wrapper_shopcart').on('change', '.product', function (event) {

                if ( $(this).val() != ""){
                    $(this).parents('.item_shopcart').find('.w_amount, .w_action').removeClass('d-none')
                }else{
                    $(this).parents('.item_shopcart').find('.w_amount, .w_action').addClass('d-none')
                }
                var count = 0;
                $('.amount').each(function(){
                    if ( ! $(this).parent('.w_amount').hasClass('d-none'))
                        count += Number($(this).val())
                });
                $('#count').val(count)
            })

            $('.wrapper_shopcart').on('change', '.amount', function (event) {

                var count = 0;
                $('.amount').each(function(){
                    if ( ! $(this).parent('.w_amount').hasClass('d-none'))
                        count += Number($(this).val())
                });
                $('#count').val(count)
            })


            $('.wrapper_shopcart').on('click', '.addProduct', function (event) {

                var htmlinner = $(this).parents('.item_product').find('.feilds_product').html()

                var newhtmlinner = '<div class="row mb-3 item_product"><div class="row col-lg-10 feilds_product ">' + htmlinner;
                newhtmlinner += '</div><div class="col-lg-2 pl-0">'
                newhtmlinner += '<button class="btn btn-danger removeProduct" type="button">-</button>'
                newhtmlinner += '</div></div>'

               $(this).parents('.item_shopcart').append(newhtmlinner)

            })


            $('.wrapper_shopcart').on('click', '.removeProduct', function (event) {

                $(this).parents('.item_product').remove()

            })


            $('.addShopcart').on('click', function (event) {

                var feilds_shopcart = $('.wrapper_shopcart').find('.feilds_shopcart').html()
                var feilds_product = $('.wrapper_shopcart').find('.feilds_product').html()
                var newhtmlinner = "";

                newhtmlinner += '<div class="item_shopcart">'
                newhtmlinner += '<div class="mb-3 feilds_shopcart">'
                newhtmlinner += feilds_shopcart
                newhtmlinner += '</div>'
                newhtmlinner += '<div class="row mb-3 item_product d-none"><div class="row col-lg-10 feilds_product ">' + feilds_product;
                newhtmlinner += '</div><div class="col-lg-2 pl-0">'
                newhtmlinner += '<button class="btn btn-primary addProduct" type="button">+</button>'
                newhtmlinner += '</div></div></div>'

               $('.wrapper_shopcart').append(newhtmlinner)

            })





        })
    </script>
@endsection
