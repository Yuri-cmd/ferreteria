<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ERP </title>

    <link href="{{ asset('css/lodi-css.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Toast/build/jquery.toast.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/Bootstrap-3.3.7/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Bootstrap-select-1.13.9/dist/css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <link href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href=â€œhttp://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.cssâ€
        rel=â€stylesheetâ€ type=â€text/cssâ€ />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top top-navbar no-radius" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="visible-xs">
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i> WENDY YELINA SESA QUIJANDRIA&nbsp;<i
                                class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> ConfiguraciÃ³n</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="">cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
        </div>
        <div class="visible-md visible-lg">
            <ul class="nav navbar-top-links">
                <li><a href="{{ route('dashboard') }}"><strong><i class="fa fa-home fa-fw"></i>
                            Incio</strong></a></li>

                <li class="dropdown text-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <strong><i class="fa fa-cogs fa-warehouse"></i> Almacen<i class="fa fa-caret-down"></i></strong>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('almacen') }}"> Inventario<span class="fa arrow rtop"></span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('compras') }}"><i class="fa fa-warehouse"></i> <strong> Compras</strong></a>
                </li>
                <li class="dropdown text-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <strong><i class="fa fa-cogs fa-fw"></i> Configuracion<i class="fa fa-caret-down"></i></strong>
                    </a>
                    <ul class="dropdown-menu">
                        <li hidden><a href="funsionesmodulo/agencia_transporte.php"><i class="fa fa-truck fa-fw"></i>
                                Agencias Transporte<span class="fa arrow rtop"></span></a></li>
                        <li hidden><a href="tasacambio"><i class="fa fa-money-bill"></i> Tasa de Cambio</a></li>
                        <li><a href="javascript:void(0)" data-toggle="modal"><i class="fa fa-user fa-fw"></i>
                                Perfil<span class="fa arrow rtop"></span></a></li>
                        <li><a href=""><i class="fa fa-sign-out fa-fw"></i> Salir <span
                                    class="fa arrow rtop"></span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!--#hidden-xs oculto / visible-xs -->
    </nav>
    <main>
        @yield('content')
    </main>
    @include('partials.scripts')
    @stack('scripts')
    @include('partials.helperjs')
    @stack('helperjs')
    @include('partials.almacen')
    @stack('almacen')
</body>

</html>
