@extends('layout')
@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h6 class="page-header">

            </h6>
        </div>
        <div id="page-inner">

            <div class="row row-nav-breadcrumb">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <h2 class="fg-black">
                        <strong><i class="fa fa-desktop fa-fw"></i> COMPRAS </strong>
                    </h2>
                    <hr class="new5" />

                    <ol class="breadcrumb panel-default">
                        <li><a href="index.php" class="btn btn-sm btn-default"><i class="fa fa-home"></i> </a></li>
                        <li><a href="#" class="fg-black">&nbsp;<strong>Compras</strong></a></li>
                        <li><a href="#" class="fg-black">&nbsp;<strong>Importaciones</strong></a></li>
                        <li><a href="#" class="fg-black">&nbsp;<strong>Datos</strong></a></li>

                    </ol>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h2 class="fg-azul no-padding no-margin">
                                            <i class="fa fa-folder-open fa-fw"></i>
                                            <strong id="tittle-header-body">Compras</strong>
                                        </h2>
                                    </div>
                                    <!--BOTONES-->
                                    <div class="col-lg-6 text-right">
                                        <a href="comprasproductos" class="btn btn-primary">
                                            <i class="fa fa-plus "></i> Agregar Compra
                                        </a>

                                    </div>

                                    <!--BOTONES-->
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr class="fg-black line-body" />
                            </div>


                            <div id="" class="col-xs-12 col-sm-12 col-md-12 no-padding">

                                <table id="datatableCompras" class="table table-bordered dt-responsive nowrap text-center table-sm"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Id</th>
                                            <th style="text-align: center;">F. Emision</th>
                                            <th style="text-align: center;">F. Vencimiento</th>
                                            <th style="text-align: center;">Serie</th>
                                            <th style="text-align: center;">Numero</th>
                                            <th style="text-align: center;" width="50%">Razon Social</th>
                                            <th style="text-align: center;">Detalles</th>

                                        </tr>
                                    </thead>

                                </table>
                            </div>

                            <div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                                        </div>
                                        <div class="modal-body">
                                            <table id="datatableProductoDetalle"
                                                class="table table-bordered dt-responsive nowrap text-center table-sm"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Id</th>
                                                        <th style="text-align: center;" width="60%">Producto</th>
                                                        <th style="text-align: center;">Cantidad</th>
                                                        <th style="text-align: center;">Precio</th>
                                                        <th style="text-align: center;">Total</th>

                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
@endsection

<script>
    
</script>
