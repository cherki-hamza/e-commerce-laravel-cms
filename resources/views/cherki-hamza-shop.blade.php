@extends('layouts.app')

@section('content')
<div class="container  col-md-12">
 <div class="row">
      <div class="col-md-12">

          <section class="our-publication">
              <div class="container">
                  <div class="section-header">
                      <i class="fa fa-shopping-bag"></i>
                      <h2>Welcome To Prodacto Shop</h2>
                      <div class="container">
                          @if($msg = session()->get('success'))
                              <h2 class="alert alert-success col-md-10">{{$msg}}</h2>
                          @endif
                      </div>
                  </div>
{{--                       {{dd(session()->get('cart'))}}--}}
                  <!-- start row shop 1 -->
                  <div class="row">
                      @foreach($products as $product)
                      <div class="col-sm-6 col-lg-3">
                          <div class="single-publication">
                              <figure>
                                  <a href="{{ (Auth::user() ? route('product.show',$product->id) : route('main'))}}">
                                      <img  style="width: 263px;height: 250px;" class="img-circle" src="{{$product->getPicture()}}" alt="{{$product->product_title}}">
{{--                                      <img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/1.jpg" alt="Publication Image">--}}
                                  </a>

                                  <ul>
                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>
                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>
                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>
                                  </ul>
                              </figure>

                              <div class="publication-content">
                                  <span class="category">{{$product->product_title}}</span>
                                  <h3><a href="#">{{$product->product_desc}}</a></h3>
                                  <ul>
                                      <li><i class="icofont-star"></i></li>
                                      <li><i class="icofont-star"></i></li>
                                      <li><i class="icofont-star"></i></li>
                                      <li><i class="icofont-star"></i></li>
                                      <li><i class="icofont-star"></i></li>
                                  </ul>
                                  <h4 class="price">$ {{$product->product_price}} <span>$ {{$product->product_price +  ($product->product_price*45/100)}}</span></h4>
                              </div>

                              <div class="add-to-cart">
                                  <a href="{{route('cart.add',$product->id)}}" class="default-btn">Add to Cart</a>
                              </div>
                          </div>
                      </div>
                      @endforeach

                          {{-- Pagination --}}
                          <div class="container my-5">
                              <div class="row justify-content-center">
                                  <nav aria-label="Page navigation example">
                                      <ul class="pagination">
                                          {{ $products->links() }}
                                      </ul>
                                  </nav>
                              </div>
                          </div>

                          {{-- Pagination --}}

{{--                      <div class="col-sm-6 col-lg-3">--}}
{{--                          <div class="single-publication">--}}
{{--                              <figure>--}}
{{--                                  <a href="#">--}}
{{--                                      <img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/2.jpg" alt="Publication Image">--}}
{{--                                  </a>--}}

{{--                                  <ul>--}}
{{--                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>--}}
{{--                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>--}}
{{--                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>--}}
{{--                                  </ul>--}}
{{--                              </figure>--}}

{{--                              <div class="publication-content">--}}
{{--                                  <span class="category">Book</span>--}}
{{--                                  <h3><a href="#">Think Python</a></h3>--}}
{{--                                  <ul>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                  </ul>--}}
{{--                                  <h4 class="price">$119</h4>--}}
{{--                              </div>--}}

{{--                              <div class="add-to-cart">--}}
{{--                                  <a href="#" class="default-btn">Add to Cart</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </div>--}}

{{--                      <div class="col-sm-6 col-lg-3">--}}
{{--                          <div class="single-publication">--}}
{{--                              <figure>--}}
{{--                                  <a href="#"><img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/3.jpg" alt="Publication Image"></a>--}}

{{--                                  <ul>--}}
{{--                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>--}}
{{--                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>--}}
{{--                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>--}}
{{--                                  </ul>--}}
{{--                              </figure>--}}

{{--                              <div class="publication-content">--}}
{{--                                  <span class="category">Book</span>--}}
{{--                                  <h3><a href="#">Think Python</a></h3>--}}
{{--                                  <ul>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                  </ul>--}}
{{--                                  <h4 class="price">$119</h4>--}}
{{--                              </div>--}}

{{--                              <div class="add-to-cart">--}}
{{--                                  <a href="#" class="default-btn">Add to Cart</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </div>--}}

{{--                      <div class="col-sm-6 col-lg-3">--}}
{{--                          <div class="single-publication">--}}
{{--                              <figure>--}}
{{--                                  <a href="#"><img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/4.jpg" alt="Publication Image"></a>--}}

{{--                                  <ul>--}}
{{--                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>--}}
{{--                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>--}}
{{--                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>--}}
{{--                                  </ul>--}}
{{--                              </figure>--}}

{{--                              <div class="publication-content">--}}
{{--                                  <span class="category">Book</span>--}}
{{--                                  <h3><a href="#">Think Python</a></h3>--}}
{{--                                  <ul>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                  </ul>--}}
{{--                                  <h4 class="price">$119</h4>--}}
{{--                              </div>--}}

{{--                              <div class="add-to-cart">--}}
{{--                                  <a href="#" class="default-btn">Add to Cart</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </div>--}}
                  </div>
                  <!-- end row shop 1 -->
                  <!-- start row shop 2 -->
{{--                  <div class="row">--}}
{{--                      <div class="col-sm-6 col-lg-3">--}}
{{--                          <div class="single-publication">--}}
{{--                              <figure>--}}
{{--                                  <a href="#">--}}
{{--                                      <img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/1.jpg" alt="Publication Image">--}}
{{--                                  </a>--}}

{{--                                  <ul>--}}
{{--                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>--}}
{{--                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>--}}
{{--                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>--}}
{{--                                  </ul>--}}
{{--                              </figure>--}}

{{--                              <div class="publication-content">--}}
{{--                                  <span class="category">Book</span>--}}
{{--                                  <h3><a href="#">Think Python</a></h3>--}}
{{--                                  <ul>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                  </ul>--}}
{{--                                  <h4 class="price">$119 <span>$299</span></h4>--}}
{{--                              </div>--}}

{{--                              <div class="add-to-cart">--}}
{{--                                  <a href="#" class="default-btn">Add to Cart</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </div>--}}

{{--                      <div class="col-sm-6 col-lg-3">--}}
{{--                          <div class="single-publication">--}}
{{--                              <figure>--}}
{{--                                  <a href="#">--}}
{{--                                      <img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/2.jpg" alt="Publication Image">--}}
{{--                                  </a>--}}

{{--                                  <ul>--}}
{{--                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>--}}
{{--                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>--}}
{{--                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>--}}
{{--                                  </ul>--}}
{{--                              </figure>--}}

{{--                              <div class="publication-content">--}}
{{--                                  <span class="category">Book</span>--}}
{{--                                  <h3><a href="#">Think Python</a></h3>--}}
{{--                                  <ul>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                  </ul>--}}
{{--                                  <h4 class="price">$119</h4>--}}
{{--                              </div>--}}

{{--                              <div class="add-to-cart">--}}
{{--                                  <a href="#" class="default-btn">Add to Cart</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </div>--}}

{{--                      <div class="col-sm-6 col-lg-3">--}}
{{--                          <div class="single-publication">--}}
{{--                              <figure>--}}
{{--                                  <a href="#"><img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/3.jpg" alt="Publication Image"></a>--}}

{{--                                  <ul>--}}
{{--                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>--}}
{{--                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>--}}
{{--                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>--}}
{{--                                  </ul>--}}
{{--                              </figure>--}}

{{--                              <div class="publication-content">--}}
{{--                                  <span class="category">Book</span>--}}
{{--                                  <h3><a href="#">Think Python</a></h3>--}}
{{--                                  <ul>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                  </ul>--}}
{{--                                  <h4 class="price">$119</h4>--}}
{{--                              </div>--}}

{{--                              <div class="add-to-cart">--}}
{{--                                  <a href="#" class="default-btn">Add to Cart</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </div>--}}

{{--                      <div class="col-sm-6 col-lg-3">--}}
{{--                          <div class="single-publication">--}}
{{--                              <figure>--}}
{{--                                  <a href="#"><img src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/4.jpg" alt="Publication Image"></a>--}}

{{--                                  <ul>--}}
{{--                                      <li><a href="#" title="Add to Favorite"><i class="fa fa-heart"></i></a></li>--}}
{{--                                      <li><a href="#" title="Add to Compare"><i class="fa fa-refresh"></i></a></li>--}}
{{--                                      <li><a href="#" title="Quick View"><i class="fa fa-search"></i></a></li>--}}
{{--                                  </ul>--}}
{{--                              </figure>--}}

{{--                              <div class="publication-content">--}}
{{--                                  <span class="category">Book</span>--}}
{{--                                  <h3><a href="#">Think Python</a></h3>--}}
{{--                                  <ul>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                      <li><i class="icofont-star"></i></li>--}}
{{--                                  </ul>--}}
{{--                                  <h4 class="price">$119</h4>--}}
{{--                              </div>--}}

{{--                              <div class="add-to-cart">--}}
{{--                                  <a href="#" class="default-btn">Add to Cart</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </div>--}}
{{--                  </div>--}}
                  <!-- end row shop 2 -->


              </div>
          </section>

      </div>
     <!-- end shop content -->
 </div>
</div>
@endsection
