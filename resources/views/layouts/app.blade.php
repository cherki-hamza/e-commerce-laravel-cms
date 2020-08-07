<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('my-style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg1 navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin') }}"><i class="fa fa-cogs text-success mr-2"></i><span class="text-danger font-weight-bold">Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('productsList') }}">Liste des produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('usersList') }}">Liste des utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cart.show')}}">V1<i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-pill badge-warning">
                                        {{session()->has('cart') ? session()->get('cart')->totalQty : 0}}
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cart.show.v2')}}">V2<i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-pill badge-success">
                                        {{session()->has('cart') ? session()->get('cart')->totalQty : 0}}
                                    </span>
                                </a>
                            </li>


                            <li class="nav-item dropdown">
                                <div class="row">
                                    <span class="mx-4 mt-1">
                                        <img class="img-circle" style="border-radius: 100%" width="35" height="35" src="{{ Auth::user()->hasPicture() ? asset(Auth::user()->getPicture()) : Auth::user()->getGravatar()}}" alt="User Image"/>
                                   </span>
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <b>{{ Auth::user()->name }}</b> <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <!-- start footer -->
        <footer><div class="text-center"><span class="mt-2">cherki hamza shop | 2020</span></div></footer>
        <!-- start footer -->
    </div>


    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{ asset('js/script.js') }}" defer></script>
    @include('sweetalert::alert')
    @yield('my-script')

</body>
</html>
