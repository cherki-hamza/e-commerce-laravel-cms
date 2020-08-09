@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row align-items-center justify-content-between mb-3">
        <div class="col-6">
            <h4>Liste des produits</h4>
        </div>
        <div class="col-6 text-right">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                        <svg  width="24px" height="24px"  viewBox="0 0 512 512" >
                            <g><g> <g>
                                <circle cx="386" cy="210" r="20"/>
                                <path d="M432,40h-26V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v20h-91V20c0-11.046-8.954-20-20-20
                                    c-11.046,0-20,8.954-20,20v20h-90V20c0-11.046-8.954-20-20-20s-20,8.954-20,20v20H80C35.888,40,0,75.888,0,120v312
                                    c0,44.112,35.888,80,80,80h153c11.046,0,20-8.954,20-20c0-11.046-8.954-20-20-20H80c-22.056,0-40-17.944-40-40V120
                                    c0-22.056,17.944-40,40-40h25v20c0,11.046,8.954,20,20,20s20-8.954,20-20V80h90v20c0,11.046,8.954,20,20,20s20-8.954,20-20V80h91
                                    v20c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20V80h26c22.056,0,40,17.944,40,40v114c0,11.046,8.954,20,20,20
                                    c11.046,0,20-8.954,20-20V120C512,75.888,476.112,40,432,40z"/>
                                <path d="M391,270c-66.72,0-121,54.28-121,121s54.28,121,121,121s121-54.28,121-121S457.72,270,391,270z M391,472
                                    c-44.663,0-81-36.336-81-81s36.337-81,81-81c44.663,0,81,36.336,81,81S435.663,472,391,472z"/>
                                <path d="M420,371h-9v-21c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v41c0,11.046,8.954,20,20,20h29
                                    c11.046,0,20-8.954,20-20C440,379.954,431.046,371,420,371z"/>
                                <circle cx="299" cy="210" r="20"/>
                                <circle cx="212" cy="297" r="20"/>
                                <circle cx="125" cy="210" r="20"/>
                                <circle cx="125" cy="297" r="20"/>
                                <circle cx="125" cy="384" r="20"/>
                                <circle cx="212" cy="384" r="20"/>
                                <circle cx="212" cy="210" r="20"/>
                            </g></g> </g>
                        </svg>
                  </span>
                </div>

                <form action="{{route('search.product')}}" method="GET" class="form-inline my-2 my-lg-0">
                    <input type="text" class="form-control my-lg-2" name="datetimes" placeholder="Date" />
                    <button class="btn btn-outline-success my-2 ml-5" type="submit">Search</button>
                </form>


              </div>

        </div>
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
                @foreach($products as $product)
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

{{-- Modal --}}
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

@section('my-script')
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#removeProduct').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this)
                var _id = button.attr('data-id');
                modal.find('.btnDone').attr('data-record', _id)
            })

            $('#removeProduct').on('click', '.btnDone', function(){
                var _id = $(this).attr('data-record');
                console.log("Supprimer le produit ::  =>  " + _id)

                $('#removeProduct').modal('hide')
            })

            $('input[name="datetimes"]').daterangepicker({
                opens: 'left',
                timePicker: true,
                startDate: moment().local('fr').startOf('hour'),
                endDate: moment().local('fr').startOf('hour').add(32, 'hour'),
                locale: {
                    //format: 'dddd DD YYYY HH:MM',
                    format: 'YYYY MM DD',
                    "separator": " - ",
                    "applyLabel": "Appliquer",
                    "cancelLabel": "Annuler",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Personnalisé",
                    "weekLabel": "W",
                    "daysOfWeek": ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
                    "monthNames": ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
                    "firstDay": 1
                },
            });

            $('input[name="datetimes"]').on('apply.daterangepicker', function(ev, picker) {
                console.log(picker.startDate.format('MM/DD/YYYY HH:MM') + ' - ' + picker.endDate.format('MM/DD/YYYY HH:MM'));
            });
            $('input[name="datetimes"]').on('cancel.daterangepicker', function(ev, picker) {
                //do something, like clearing an input
                $('input[name="datetimes"]').val('');
            });

        })
    </script>
@endsection
