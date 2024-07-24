<?php
session_start();
if (!isset($_SESSION['usuario_erp'])) {
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ERP</title>

    <link href="{{ asset('css/lodi-css.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-wesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Toast/build/jquery.toast.min.css') }}" rel='stylesheet' />

    <link href="{{ asset('assets/Bootstrap-3.3.7/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top top-navbar no-radius" role="navigation">
            <div class="navbar-header">
                <div class="visible-xs">
                </div>
            </div>
        </nav>

        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side hidden-lg hidden-md" role="navigation">
            <div class="hidden-md hidden-lg">
                <div id="sideNav" href="">
                </div>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="lii">
                        <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="header">
                <h6 class="page-header">

                </h6>
            </div>
            <div id="page-inner" class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <img
                            style="margin: auto;max-width: 100%;display: block;"src="{{ asset('login/logo_erp.png') }}">
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2 style="color: #ce383a;font-weight: bold;font-size: 3em;">Mis Modulos
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mt-2 col-lg-4 col-md-4 col-sm-6">
                                            <a href="./almacen/inventario">
                                                <div class="onliborder box-unit boxclice"
                                                    style="background-color: #0073b6;">
                                                    <div class="headbox" style="">
                                                        <p style="color: white; font-size: 25px;" class="send-left">
                                                            Almacen</p> <i style="color: white;    font-size: 32px;"
                                                            class="send-right bi bi-asterisk fa-lg"></i>

                                                    </div>
                                                    <div style="background-color: #0066a4;" class="box-footer-unic">
                                                        <span style="color: white">Mas Informacion <i
                                                                class="bi bi-arrow-right-circle-fill"></i></span>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="mt-2 col-lg-4 col-md-4 col-sm-6">
                                            <a href="./ventas">
                                                <div style="background-color: #dd4c39;"
                                                    class="onliborder box-unit boxclice">
                                                    <div class="headbox" style="">
                                                        <p style="color: white; font-size: 25px;" class="send-left">
                                                            Ventas</p> <i style="color: white;    font-size: 32px;"
                                                            class="send-right bi bi-boxes fa-lg"></i>

                                                    </div>
                                                    <div style="background-color: #c64233;" class="box-footer-unic">
                                                        <span style="color: white">Mas Informacion <i
                                                                class="bi bi-arrow-right-circle-fill"></i></span>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="mt-2 col-lg-4 col-md-4 col-sm-6">
                                            <a href="./cuentas-cp">
                                                <div class="onliborder box-unit boxclice"
                                                    style="background-color: #f39c11;">
                                                    <div class="headbox" style="">
                                                        <p style="color: white; font-size: 25px;" class="send-left">
                                                            Cobranzas y pagos</p> <i
                                                            style="color: white;    font-size: 32px;"
                                                            class="send-right bi bi-copy fa-lg"></i>

                                                    </div>
                                                    <div style="background-color: #da8c10;" style=""
                                                        class="box-footer-unic">
                                                        <span style="color: white">Mas Informacion <i
                                                                class="bi bi-arrow-right-circle-fill"></i></span>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                                <div id="conten-principal" class="col-xs-12 col-sm-12 col-md-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <style>
            .sorting:after {
                display: none !important;
            }

            #table-folder-import_info {
                display: none !important;
                color: rgba(255, 255, 0, 0) !important;
            }
        </style>

        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>



</body>

</html>
