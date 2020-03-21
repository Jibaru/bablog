<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <div id="app-dashboard">
        @php
        $nombre = 'demo';

        $menu = [
        [
        'icon'=>'fas fa-cube',
        'title'=>'Operaciones',
        'link'=>'/',
        'nested'=>[
        [
        'icon'=>'fas fa-paste',
        'title'=>'Salidas',
        'link'=>'/salidas'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Pagar Reserva Telefónica',
        'link'=>'/reserva'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Confirmar Reservas',
        'link'=>'/confirmar-reserva'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Anular Boleto',
        'link'=>'/boleto/anular'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Canje Boleta',
        'link'=>'/canje-boleta'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Imprimir Boletos',
        'link'=>'/imprimir-boleto'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Corregir Viaje Invalido',
        'link'=>'/corregir-viaje-invalido'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Cambio De Bus',
        'link'=>'/bus/traspaso'
        ]
        ]
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Reportes',
        'link'=>'/reportes',
        'nested'=>[
        [
        'icon'=>'fas fa-paste',
        'title'=>'Manifiesto',
        'link'=>'/manifiesto'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Liquidacion General',
        'link'=>'/liquidacion/general'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Liquidacion Por Terminal',
        'link'=>'/liquidacion/terminal'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Corte De Caja',
        'link'=>'/corte-caja'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Informe Boletos',
        'link'=>'/informe-boletos'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Informe Liquidacion Terminal',
        'link'=>'/liquidacion/terminal/informe'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Informe Salidas',
        'link'=>'/salidas/informe'
        ]
        ]
        ],
        [
        'icon'=>'fas fa-user-cog',
        'title'=>'Mantenimiento Usuario',
        'link'=>'/',
        'nested'=>[
        [
        'icon'=>'fas fa-paste',
        'title'=>'Persona',
        'link'=>'/personas'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Usuarios',
        'link'=>'/usuarios'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Terminales',
        'link'=>'/terminales'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Buses',
        'link'=>'/buses'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Empresas',
        'link'=>'/empresas'
        ]
        ]
        ],
        [
        'icon'=>'fas fa-tools',
        'title'=>'Mantenimiento',
        'link'=>'/mantenimiento',
        'nested'=>[
        [
        'icon'=>'fas fa-paste',
        'title'=>'Modelos',
        'link'=>'/modelos'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Roles',
        'link'=>'/roles'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Tipo de servicio',
        'link'=>'/tipo-servicio'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Marcas',
        'link'=>'/marcas'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Cargos',
        'link'=>'/cargos'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Series',
        'link'=>'/series'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Tipo documento',
        'link'=>'/tipo-documentos'
        ]
        ]
        ],
        [
        'icon'=>'fas fa-tools',
        'title'=>'Ejemplos (Desarrollo)',
        'link'=>'/ejemplos',
        'nested' => [
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 1',
        'link'=>'/ejemplo-1'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 2',
        'link'=>'/ejemplo-2'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 3',
        'link'=>'/ejemplo-3'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 4',
        'link'=>'/ejemplo-4'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 5',
        'link'=>'/ejemplo-5'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 6',
        'link'=>'/ejemplo-6'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 7',
        'link'=>'/ejemplo-7'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 8',
        'link'=>'/ejemplo-8'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 9',
        'link'=>'/ejemplo-9'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 10',
        'link'=>'/ejemplo-10'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 20',
        'link'=>'/ejemplo-20'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 21',
        'link'=>'/ejemplo-21'
        ],
        [
        'icon'=>'fas fa-paste',
        'title'=>'Ejemplo 22',
        'link'=>'/ejemplo-22'
        ],

        ]
        ]
        ];

        @endphp

        <!--<app-menu :listmenu="{{json_encode($menu)}}"></app-menu>-->
        <nav class="navbar navbar-expand-md navbar-white bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand ml-4 " href="{{ url('/administrador') }}">
                    BaBlog Administrador
                </a>
                <a class="ml-4 " href="{{ url('/') }}">
                    Visita la Web
                </a>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<!--    <script src="common-js/jquery-3.1.1.min.js"></script>-->
<!--    <script src="common-js/tether.min.js"></script>-->
<!--    <script src="common-js/bootstrap.js"></script>-->
<!--    <script src="{{ asset('js/app-dashboard.js') }}" defer></script>-->
</body>
</html>
