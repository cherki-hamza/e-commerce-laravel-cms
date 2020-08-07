@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Utilisateur <b>{{ $carts }}</b></div>

                    <div class="card-body">
                        <form >
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="userName">Nom </label>
                                <div class="col-lg-9 col-xl-6">
                                    <input type="text" class="form-control" id="userName" value="Nom prénom" name="userName" readonly="" disabled />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-lg-right" for="mail">Email  </label>
                                <div class="col-lg-9 col-xl-6">
                                    <input type="text" class="form-control" id="mail" value="example@mail.com" name="mail" readonly="" disabled />
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
                                                    <option value="1"> Panier 1</option>
                                                    <option value="2"> Panier 2</option>
                                                    <option value="3"> Panier 3</option>
                                                    <option value="4"> Panier 4</option>
                                                </select>

                                            </div>
                                            <div class="row  mb-3 item_product d-none">
                                                <div class="row col-lg-10 feilds_product ">
                                                    <div class="col-lg-6 pr-0 w_products">
                                                        <select class="form-control product" placeholder="Produit"  name="product" required="" >
                                                            <option></option>
                                                            <option value="1"> Produit 1</option>
                                                            <option value="2"> Produit 2</option>
                                                            <option value="3"> Produit 3</option>
                                                            <option value="4"> Produit 4</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 w_amount d-none">
                                                        <input type="number" class="form-control amount"  value="1" name="amount" min="1" placeholder="Quantité" />
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
            </div>
        </div>
    </div>
@endsection

@section('scriptJs')
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
