@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-5">
            <h4>Result of research Products by date between [ <span class="text-danger font-weight-bold">{{$start}} <span class="text-primary mx-4">And</span> {{$end}}</span> ]</h4>
        </div>
        <div  class="table-responsive dash-social">
            <table id="datatable" class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products_by_date as $product)
                    <tr>
                        <td><span class="text-center"><img  style="width: 50px;height: 50px;" class="img-circle" src="{{$product->getPicture()}}" alt="{{$product->product_title}}"></span></td>
                        <td>{{$product->product_title}}</td>
                        <td>{{$product->product_qt}}</td>
                        <td><div class="w-s-nowrap">{{$product->Total_Price()}} €</div></td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('product.show',$product->id)}}" class="btn btn-link">
                                    <i data-toggle="tooltip" title="Voir le détail">
                                        <svg  width="24px" height="24px" viewBox="0 0 461.312 461.312">
                                            <g>
                                                <g>
                                                    <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                    S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                    c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"/>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                    c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                    C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                    s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </i>
                                </a>

                                <form action="{{route('product.destroy' , ['product'=>$product->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <i data-toggle="tooltip" title="Supprimer">
                                        <svg  width="24px" height="24px" viewBox="-48 0 407 407">
                                            <path d="m89.199219 37c0-12.132812 9.46875-21 21.601562-21h88.800781c12.128907 0 21.597657 8.867188 21.597657 21v23h16v-23c0-20.953125-16.644531-37-37.597657-37h-88.800781c-20.953125 0-37.601562 16.046875-37.601562 37v23h16zm0 0"/><path d="m60.601562 407h189.199219c18.242188 0 32.398438-16.046875 32.398438-36v-247h-254v247c0 19.953125 14.15625 36 32.402343 36zm145.597657-244.800781c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm-59 0c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm-59 0c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm0 0"/><path d="m20 108h270.398438c11.046874 0 20-8.953125 20-20s-8.953126-20-20-20h-270.398438c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20zm0 0"/>
                                        </svg>
                                    </i>

                                    @if(Auth::user()->isViewer())
                                        <input type="submit" onclick="return {{ (Auth::user()->isViewer())? 'false':'true'  }};"  class="btn btn-danger {{(Auth::user()->isViewer())? 'disabled':'' }}" value="Delete">
                                    @else
                                        <input type="submit"  class="btn btn-danger" value="Delete">
                                    @endif
                                </form>

                                {{--                            <a href="{{}}" class="btn btn-link" data-target="#removeProduct" data-toggle="modal" data-id="1">--}}
                                {{--                                <i data-toggle="tooltip" title="Supprimer">--}}
                                {{--                                    <svg  width="24px" height="24px" viewBox="-48 0 407 407">--}}
                                {{--                                       <path d="m89.199219 37c0-12.132812 9.46875-21 21.601562-21h88.800781c12.128907 0 21.597657 8.867188 21.597657 21v23h16v-23c0-20.953125-16.644531-37-37.597657-37h-88.800781c-20.953125 0-37.601562 16.046875-37.601562 37v23h16zm0 0"/><path d="m60.601562 407h189.199219c18.242188 0 32.398438-16.046875 32.398438-36v-247h-254v247c0 19.953125 14.15625 36 32.402343 36zm145.597657-244.800781c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm-59 0c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm-59 0c0-4.417969 3.582031-8 8-8s8 3.582031 8 8v189c0 4.417969-3.582031 8-8 8s-8-3.582031-8-8zm0 0"/><path d="m20 108h270.398438c11.046874 0 20-8.953125 20-20s-8.953126-20-20-20h-270.398438c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20zm0 0"/>--}}
                                {{--                                    </svg>--}}
                                {{--                                </i>--}}
                                {{--                            </a>--}}

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    {{-- Modal --}}
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

