<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BaBlog Administrador</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="common-css/ionicons.css" rel="stylesheet">

</head>
<body>
    <div id="app-dashboard">

        <nav class="navbar navbar-expand-md navbar-white bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand ml-4 " href="{{ url('/administrador') }}">
                    <img src="images/logo-admin.png" alt="logo-admin" height="30px">
                </a>

                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" style="padding-top: 3px">
                        <i class="icon ion-navicon"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @if (Route::has('register'))
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
<!--    <script src="common-js/jquery-3.1.1.min.js"></script>-->
<!--    <script src="common-js/tether.min.js"></script>-->
<!--    <script src="common-js/bootstrap.js"></script>-->

    <script src="js/app-dashboard.js"></script>
</body>
</html>
