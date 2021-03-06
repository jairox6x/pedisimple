<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/e739f5c7c6.js" crossorigin="anonymous"></script>

    @yield('css-scripts')
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{asset('images/logo.png')}}" width="150px" alt="">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                @if(Auth::user())
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <img width="150px" src="{{asset('images/uploads/user/'.Auth::user()->image)}}" class="img-nav d-inline m-1">
                </button>
                @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li> --}}
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <img width="150px" src="{{asset('images/uploads/user/'.Auth::user()->image)}}" class="img-nav d-inline m-1">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline pl-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Auth::user()->first_name}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->restaurant || Auth::user()->type=='merchant')
                                    <a class="dropdown-item" href="{{route('restaurant.index')}}">Mi comercio</a>
                                    @endif

                                    @if(Auth::user()->type=='administrator')
                                    <a class="dropdown-item" href="{{route('restaurant.admin.list')}}">Panel de administración</a>
                                    @endif
                                    {{-- <a class="dropdown-item" href="{{route('address.index')}}">Mis direcciones</a>
                                    <a class="dropdown-item" href="{{route('order.index')}}">Mis pedidos</a> --}}
                                    <a class="dropdown-item" href="{{route('user.index')}}">Mis datos</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main role="main" class="flex-shrink-0">
            @yield('content')
        </main>  
    </div>
    
<footer class="footer">
    <div class="container d-flex justify-content-between">
        <div class="col-xl-6">
            <span class="d-flex p-0"></span>
        </div>
        <div class="col-xl-6 col-sm-12">
            @guest
            <a style="color:white" class="nav-link float-right p-0" href="{{ route('login') }}">{{ __('Ingreso comerciantes') }}</a>
            @endguest
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  

@yield('js-scripts-carrito')
@yield('js-scripts')
@yield('messages-script')

</body>
</html>
