@extends('layout')
@section('content')
    <style>
        /* El contenedor del interruptor */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Ocultar el checkbox real */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* Estilo para el slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        /* La parte del slider redondeada */
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        /* Cuando el checkbox está marcado */
        input:checked+.slider {
            background-color: #2196F3;
        }

        /* Cuando el checkbox está marcado, mover el slider a la derecha */
        input:checked+.slider:before {
            transform: translateX(26px);
        }

        /* Estilos para redondear el slider */
        .round {
            border-radius: 34px;
        }

        .round:before {
            border-radius: 50%;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form textarea {
            text-transform: uppercase;
        }
    </style>
    <div id="wrapper">
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
            <div id="page-inner">
                <div class="row row-nav-breadcrumb">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <h2 class="fg-black">
                            <strong><i class="fa fa-desktop fa-fw"></i> INVENTARIO </strong>
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
                                                <strong id="tittle-header-body">Productos</strong>
                                            </h2>
                                        </div>
                                        <!--BOTONES-->
                                        <div class="col-lg-6 text-right">
                                            <button data-toggle="modal" data-target="#modal-add-prod"
                                                class="btn btn-primary"><i class="fa fa-plus"></i> Agregar
                                                Producto</button>
                                            <button id="clone-button" class="btn btn-primary"><i class="fa fa-clone"></i>
                                                Clonar Seleccionado</button>
                                        </div>

                                        <!--BOTONES-->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <hr class="fg-black line-body" />
                                </div>

                                <div id="" class="col-xs-12 col-sm-12 col-md-12 no-padding">
                                    <table id="datatable"
                                        class="text-center table table-bordered dt-responsive nowrap text-center table-sm"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Cod SUNAT</th>
                                                <th>Medida</th>
                                                <th>stock</th>
                                                <th>M.</th>
                                                <th>P. Venta</th>
                                                <th>Costo</th>
                                                <th>Editar</th>
                                                <th>Detalles</th>
                                                <th>Estado</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                                <tr>
                                                    <td><input type="checkbox" class="select-checkbox"
                                                            value="{{ $producto->id_producto }}"></td>
                                                    <td>{{ $producto->id_producto }}</td>
                                                    <td>{{ $producto->codigo }}</td>
                                                    <td>{{ strtoupper($producto->descripcion) }}</td>
                                                    <td>{{ $producto->codsunat }}</td>
                                                    <td>{{ $producto->unidad_nombre }}</td>
                                                    <td>{{ $producto->stock_raccionNumber }}</td>
                                                    <td>{{ $producto->id_moneda == '1' ? 'S/' : '$' }}</td>
                                                    <td>{{ $producto->ppublico }}</td>
                                                    <td>{{ $producto->pcompra }}</td>

                                                    <td>
                                                        <button data-item="{{ $producto->id_producto }}"
                                                            class="btn-edt btn btn-sm btn-info"> <i
                                                                class="fa fa-edit"></i></button>
                                                    </td>
                                                    <td>
                                                        <button data-item="{{ $producto->id_producto }}"
                                                            class="btn-detalle btn btn-sm btn-success"> <i
                                                                class="fa fa-info"></i></button>
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" class="toggle-status"
                                                                data-id="{{ $producto->id_producto }}"
                                                                {{ $producto->estado ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button data-item="{{ $producto->id_producto }}"
                                                            class="btn-eliminar btn btn-sm btn-danger"><i
                                                                class="bi bi-trash-fill"></i>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-add-prod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Nuevo Producto</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" id="product-form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="row">
                                <div class="form-group col-md-6 mt-2">
                                    <label>Descripci&oacute;n</label>
                                    <input type="text" id="descripcion" name="descripcion" required
                                        class="form-control"></input>
                                </div>
                                <div class="form-group col-md-6 mt-2">
                                    <label>Descripci&oacute;n Ticket</label>
                                    <input type="text" id="ticket_description" name="ticket_description"
                                        class="form-control"></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mt-2">
                                    <label>C&oacute;digo Producto</label>
                                    <input id="codigo" name="codigo" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>C&oacute;digo de Barras</label>
                                    <div class="input-group">
                                        <input id="barcode" name="barcode" type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-upc" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z" />
                                                </svg></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Marca</label>
                                    <div class="input-group">
                                        <select required id="brand" name="brand" class="form-control">
                                            <option value="">--Elegir--</option>
                                            @foreach ($marcas as $marca)
                                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal"
                                                data-target="#modal-add-option" data-type="marca">+</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Medida</label>
                                    <div class="input-group">
                                        <select required id="id_medida" name="id_medida" class="form-control">
                                            <option value="">--Elegir--</option>
                                            @foreach ($unidades as $unidad)
                                                <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal"
                                                data-target="#modal-add-option" data-type="medida">+</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2 mt-2">
                                    <label>Categor&iacute;a</label>
                                    <div class="input-group">
                                        <select required id="id_categoria" name="id_categoria" class="form-control">
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal"
                                                data-target="#modal-add-option" data-type="categoria">+</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Ubicaci&oacute;n</label>
                                    <div class="input-group">
                                        <select name="location" id="location" class="form-control">
                                            @foreach ($ubicacion as $ubicacion)
                                                <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal"
                                                data-target="#modal-add-option" data-type="ubicacion">+</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Cantidad Inicial</label>
                                    <input id="cantidad" name="cantidad" required type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Und Contenidas</label>
                                    <input id="uni_contenidas" name="uni_contenidas" required type="text"
                                        class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Stock Fraccion</label>
                                    <input id="stock_raccion" name="stock_raccion" required type="text"
                                        class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label></label>
                                    <input id="stock_raccionNumber" name="stock_raccionNumber" style="color: red"
                                        required type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mt-2">
                                    <label>Cod. Sunat</label>
                                    <input id="codsunat" name="codsunat" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Peso U. en Kilos</label>
                                    <input id="peso" name="peso" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Afecto ICBP</label>
                                    <select id="iscbp" name="iscbp" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">S&iacute;</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>N&uacute;mero de Lote</label>
                                    <input id="batch_number" name="batch_number" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mt-2">
                                    <label>Acci&oacute;n T&eacute;cnica</label>
                                    <textarea id="technical_action" name="technical_action" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Fecha de Vencimiento</label>
                                    <input id="expiration_date" name="expiration_date" type="date"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Stock M&iacute;nimo</label>
                                    <input id="min_stock" name="min_stock" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mt-2">
                                    <label>Adjuntar Imagen (PNG, JPG)</label>
                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-4 mt-2">
                                    <label>Adjuntar Ficha T&eacute;cnica</label>
                                    <input type="file" id="technical_sheet" name="technical_sheet"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Sucursal</label>
                                    <div class="input-group">
                                        <select name="sucursal" id="sucursal" class="form-control">
                                            @foreach ($sucursales as $sucursal)
                                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal"
                                                data-target="#modal-add-option" data-type="sucursal">+</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" style="margin-bottom: unset;">
                                    <h4 class="fw-bold"><strong>Detalle de precios x producto</strong></h4>
                                </div>
                            </div>
                            <hr style="margin: 0">
                            <div class="row">
                                <div class="form-group col-md-2 mt-2">
                                    <label>Unidad Derivada</label>
                                    <div class="input-group">
                                        <select id="unidad_derivada" class="form-control">
                                            @foreach ($unidadesDerivadas as $unidadDerivada)
                                                <option value="{{ $unidadDerivada->id }}" @selected($unidadDerivada->nombre == 'UNIDAD')>
                                                    {{ $unidadDerivada->nombre }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal"
                                                data-target="#modal-add-option" data-type="derivada">+</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Factor</label>
                                    <input type="text" id="factor" class="form-control" value="1">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Precio Compra</label>
                                    <input type="text" id="precio_compra" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>%Venta</label>
                                    <input type="text" id="porcentaje_venta" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>P.publico</label>
                                    <input type="text" id="precio_modificable" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Pre.Mayor</label>
                                    <input type="text" id="precio_especial" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Prec.Ferreteria</label>
                                    <input type="text" id="precio_minimo" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Precio Ultimo</label>
                                    <input type="text" id="precio_ultimo" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Comision</label>
                                    <input type="text" id="comision" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Com2</label>
                                    <input type="text" id="comision2" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Comision3</label>
                                    <input type="text" id="comision3" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Comision4</label>
                                    <input type="text" id="comision4" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <button type="button" id="agregar_unidad"
                                        class="btn btn-primary mt-2">Agregar</button>
                                </div>

                                <table id="unidades-table" class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>F.Venta</th>
                                            <th>Factor</th>
                                            <th>P.Compra</th>
                                            <th>%V</th>
                                            <th>P.Publi</th>
                                            <th>P.mayor</th>
                                            <th>P.Ferr</th>
                                            <th>P.Ulti</th>
                                            <th>P.Comis</th>
                                            <th>Gan</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="unidades-body">
                                        <!-- Filas de unidades se agregar&aacute;n aqu&iacute; -->
                                    </tbody>
                                </table>
                                <input type="hidden" name="costos" id="costos" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="submit-btn" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edt-prod" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Producto</h3>
                    </div>
                    <form id="edit-product-form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body" style="overflow-y: auto;">
                            @csrf
                            <div class="row">
                                <input type="text" id="edt-id" name="id" value="" hidden>
                                <div class="form-group col-md-6 mt-2">
                                    <label>Descripci&oacute;n</label>
                                    <input type="text" id="edt-descripcion" name="descripcion" required
                                        class="form-control"></input>
                                </div>
                                <div class="form-group col-md-6 mt-2">
                                    <label>Descripci&oacute;n Ticket</label>
                                    <input type="text" id="edt-ticket_description" name="ticket_description"
                                        class="form-control"></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mt-2">
                                    <label>C&oacute;digo Producto</label>
                                    <input id="edt-codigo" name="codigo" type="text" class="form-control">
                                </div>
                                @error('codigo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group col-md-3 mt-2">
                                    <label>C&oacute;digo de Barras</label>
                                    <input id="edt-barcode" name="barcode" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Marca</label>
                                    <select required id="edt-brand" name="brand" class="form-control">
                                        <option value="">--Elegir--</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Medida</label>
                                    <select required id="edt-id_medida" name="id_medida" class="form-control">
                                        <option value="">--Elegir--</option>
                                        @foreach ($unidades as $unidad)
                                            <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2 mt-2">
                                    <label>Categor&iacute;a</label>
                                    <select required id="edt-id_categoria" name="id_categoria" class="form-control">
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Ubicaci&oacute;n</label>
                                    <select name="location" id="edt-location" class="form-control">
                                        @foreach ($ubicaciones as $ubicacions)
                                            <option value="{{ $ubicacions->id }}">{{ $ubicacions->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Cantidad Inicial</label>
                                    <input id="edt-cantidad" name="cantidad" required type="text"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Und Contenidas</label>
                                    <input id="edt-uni_contenidas" name="uni_contenidas" required type="text"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Stock Fraccion</label>
                                    <input id="edt-stock_raccion" name="stock_raccion" required type="text"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label></label>
                                    <input id="edt-stock_raccionNumber" name="stock_raccionNumber" style="color: red"
                                        required type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mt-2">
                                    <label>Cod. Sunat</label>
                                    <input id="edt-codsunat" name="codsunat" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Peso U. en Kilos</label>
                                    <input id="edt-peso" name="peso" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Afecto ICBP</label>
                                    <select id="edt-iscbp" name="iscbp" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">S&iacute;</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>N&uacute;mero de Lote</label>
                                    <input id="edt-batch_number" name="batch_number" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mt-2">
                                    <label>Acci&oacute;n T&eacute;cnica</label>
                                    <textarea id="edt-technical_action" name="technical_action" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Fecha de Vencimiento</label>
                                    <input id="edt-expiration_date" name="expiration_date" type="date"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Stock M&iacute;nimo</label>
                                    <input id="edt-min_stock" name="min_stock" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mt-2">
                                    <label>Adjuntar Ficha T&eacute;cnica</label>
                                    <input type="file" id="edt-technical_sheet" name="technical_sheet"
                                        class="form-control">
                                    <a href="" target="_blank" id="file-preview" type="button"
                                        class="btn btn-primary">Ver</a>
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Imagen del Producto</label>
                                    <input type="file" id="edt-imagen" name="imagen" accept="image/*"
                                        class="form-control">
                                    <img id="img-preview" src="" alt="Vista previa de la imagen"
                                        style="max-width: 100%; height: auto; display: none;">
                                </div>
                                <div class="form-group col-md-3 mt-2">
                                    <label>Sucursales</label>
                                    <select required id="edt-sucursal" name="sucursal" class="form-control">
                                        @foreach ($sucursales as $sucursal)
                                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" style="margin-bottom: unset;">
                                    <h4 class="fw-bold"><strong>Detalle de precios x producto</strong></h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-2 mt-2">
                                    <label>Unidad Derivada</label>
                                    <div class="input-group">
                                        <select id="edt-unidad_derivada" class="form-control">
                                            @foreach ($unidadesDerivadas as $unidadDerivada)
                                                <option value="{{ $unidadDerivada->id }}">{{ $unidadDerivada->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-toggle="modal"
                                                data-target="#modal-add-derivada">+</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Factor</label>
                                    <input type="text" id="edt-factor" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Precio Compra</label>
                                    <input type="text" id="edt-precio_compra" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>%Venta</label>
                                    <input type="text" id="edt-porcentaje_venta" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>P.publico</label>
                                    <input type="text" id="edt-precio_modificable" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Pre.Mayor</label>
                                    <input type="text" id="edt-precio_especial" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Prec.Ferreteria</label>
                                    <input type="text" id="edt-precio_minimo" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Precio Ultimo</label>
                                    <input type="text" id="edt-precio_ultimo" class="form-control">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Comision</label>
                                    <input type="text" id="edt-comision" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Com2</label>
                                    <input type="text" id="edt-comision2" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Comision3</label>
                                    <input type="text" id="edt-comision3" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <label>Comision4</label>
                                    <input type="text" id="edt-comision4" class="form-control" value="0">
                                </div>
                                <div class="form-group col-md-2 mt-2">
                                    <button type="button" id="edt-agregar_unidad"
                                        class="btn btn-primary mt-2">Agregar</button>
                                </div>
                                <table id="unidades-table" class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>F.Venta</th>
                                            <th>Factor</th>
                                            <th>P.Compra</th>
                                            <th>%V</th>
                                            <th>P.Publi</th>
                                            <th>P.Mayor</th>
                                            <th>P.Ferr</th>
                                            <th>P.Ulti</th>
                                            <th>P.Comis</th>
                                            <th>Gan</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="unidades-bodyEdit">
                                        <!-- Filas de unidades se agregar&aacute;n aqu&iacute; -->
                                    </tbody>
                                </table>
                                <input type="hidden" name="costos" id="edt-costos" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div id="modal_ver_detalle" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <input type="hidden" name="idProducto" id="idProducto" value="">

                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Productos
                        </h5>

                    </div>
                    <div class="modal-body" id="modal_detalle">
                        <table id="datatableDetalle"
                            class="text-center table table-bordered dt-responsive nowrap text-center table-sm"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 10%;text-align: center;">Item</th>
                                    <th style="width: 10%;text-align: center;">Movimiento</th>
                                    <th style="width: 10%;text-align: center;">fecha</th>

                                </tr>
                            </thead>


                        </table>
                    </div>



                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Modal para agregar nueva opci&oacute;n -->
        <div class="modal fade" id="modal-add-option" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modalLabel">Agregar Nueva Opci&oacute;n</h4>
                    </div>
                    <form id="form-add-option">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre_option">Nombre</label>
                                <input type="text" class="form-control" id="nombre_option" name="nombre_option"
                                    required>
                                <input type="hidden" id="option_type" name="option_type">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
