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

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href=â€œhttp://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.cssâ€
        rel=â€stylesheetâ€ type=â€text/cssâ€ />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
</head>
<style>
    .contenedor-boder-r {
        border: 1px solid #d4cfcf;
        border-radius: 10px;
        -webkit-box-shadow: -1px 3px 29px -8px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -1px 3px 29px -8px rgba(0, 0, 0, 0.75);
        box-shadow: -1px 3px 29px -8px rgba(0, 0, 0, 0.75);
    }

    .onliborder {
        border: 1px solid #d4cfcf;
        border-radius: 10px;
    }

    .contenedor-cal {
        clear: both;
        overflow: hidden;
    }

    .cont-ds-cal {}

    .headcontenedor-cal {
        background-color: #0866c6;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding-bottom: 5px;
        padding-top: 5px;
    }

    .cal-cont-se {
        border-bottom: 1px solid rgba(6, 33, 73, 0.94);
        clear: both;
        overflow: hidden;
        background-color: #0866c61f;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .box-d-cal {
        width: 14.284%;
        text-align: center;

        display: flex;
        position: relative;
        float: left;
        min-height: 1px;
        height: 16.5%;

    }

    .box-day-cal:hover {
        border: 1px solid rgb(194, 194, 194);
        cursor: pointer;
        color: white;
        background-color: rgba(8, 102, 198, 0.53);
    }

    .elemt-box-cal {
        display: block;
        margin: auto;
        font-size: 14px;
    }

    .send-left {
        float: left;
    }

    .send-right {
        float: right;
    }

    .box-unit {


        clear: both;
        overflow: hidden;

        height: 120px;
    }

    .box-footer-unic {

        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        text-align: center;
        padding: 5px;
    }

    .headbox {
        clear: both;
        overflow: hidden;
        padding: 15px;
        margin-bottom: 13px;
    }

    .boxclice:hover {
        cursor: pointer;
        -webkit-box-shadow: -1px 3px 29px -8px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -1px 3px 29px -8px rgba(0, 0, 0, 0.75);
        box-shadow: -1px 3px 29px -8px rgba(0, 0, 0, 0.75);
    }

    @keyframes ldio-407auvblvok {
        0% {
            transform: rotate(0)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .ldio-407auvblvok div {
        box-sizing: border-box !important
    }

    .ldio-407auvblvok>div {
        position: absolute;
        width: 79.92px;
        height: 79.92px;
        top: 15.540000000000001px;
        left: 15.540000000000001px;
        border-radius: 50%;
        border: 8.88px solid #000;
        border-color: #626ed4 transparent #626ed4 transparent;
        animation: ldio-407auvblvok 1s linear infinite;
    }

    .ldio-407auvblvok>div:nth-child(2),
    .ldio-407auvblvok>div:nth-child(4) {
        width: 59.940000000000005px;
        height: 59.940000000000005px;
        top: 25.53px;
        left: 25.53px;
        animation: ldio-407auvblvok 1s linear infinite reverse;
    }

    .ldio-407auvblvok>div:nth-child(2) {
        border-color: transparent #02a499 transparent #02a499
    }

    .ldio-407auvblvok>div:nth-child(3) {
        border-color: transparent
    }

    .ldio-407auvblvok>div:nth-child(3) div {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: rotate(45deg);
    }

    .ldio-407auvblvok>div:nth-child(3) div:before,
    .ldio-407auvblvok>div:nth-child(3) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 8.88px;
        height: 8.88px;
        top: -8.88px;
        left: 26.64px;
        background: #626ed4;
        border-radius: 50%;
        box-shadow: 0 71.04px 0 0 #626ed4;
    }

    .ldio-407auvblvok>div:nth-child(3) div:after {
        left: -8.88px;
        top: 26.64px;
        box-shadow: 71.04px 0 0 0 #626ed4;
    }

    .ldio-407auvblvok>div:nth-child(4) {
        border-color: transparent;
    }

    .ldio-407auvblvok>div:nth-child(4) div {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: rotate(45deg);
    }

    .ldio-407auvblvok>div:nth-child(4) div:before,
    .ldio-407auvblvok>div:nth-child(4) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 8.88px;
        height: 8.88px;
        top: -8.88px;
        left: 16.650000000000002px;
        background: #02a499;
        border-radius: 50%;
        box-shadow: 0 51.06px 0 0 #02a499;
    }

    .ldio-407auvblvok>div:nth-child(4) div:after {
        left: -8.88px;
        top: 16.650000000000002px;
        box-shadow: 51.06px 0 0 0 #02a499;
    }

    .loadingio-spinner-double-ring-8kmkrab6ncg {
        width: 111px;
        height: 111px;
        display: inline-block;
        overflow: hidden;
        background: rgba(255, 255, 255, 0);
    }

    .ldio-407auvblvok {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
        /* see note above */
    }

    .ldio-407auvblvok div {
        box-sizing: content-box;
    }

    /* generated by https://loading.io/ */
</style>
<style>
    #loader-menor {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        width: 100%;
        height: 100%;
        display: none;
        background-color: #ffffff96;
        line-height: 100vh;
        text-align: center;
    }
</style>

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

    <script src="{{ asset('assets/jQuery-3.3.1/jquery-3.3.1.js') }}" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/Bootstrap-select-1.13.9/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/Bootstrap-select-1.13.9/dist/js/i18n/defaults-es_ES.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="{{ asset('js/tools.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        let token = "{{ csrf_token() }}";
        let tabla = $("#datatable").DataTable({
            order: [
                [0, "desc"]
            ]
        });
        $('#modal-add-unidadmedida').on('hidden.bs.modal', function(e) {
            $("#" + nomIdModa).modal('show');
        })

        function btnAddMedida() {
            $("#modal-add-prod").modal("hide")
            nomIdModa = 'modal-add-prod';
            $("#modal-add-unidadmedida").modal("show");
        }

        $(document).ready(function() {
            // Abrir el modal con los datos del producto
            $('.btn-edt').click(function() {
                var productoId = $(this).data('item');
                $.ajax({
                    url: `{{ route('productos.show') }}`,
                    method: 'POST',
                    data: {
                        _token: token,
                        productoId: productoId
                    },
                    success: function(data) {
                        // Rellenar los campos del formulario con los datos del producto
                        let producto = data.producto;
                        $('#edt-id').val(producto.id_producto);
                        $('#edt-descripcion').val(producto.descripcion);
                        $('#edt-ticket_description').val(producto.ticket_description);
                        $('#edt-codigo').val(producto.codigo);
                        $('#edt-barcode').val(producto.barcode);
                        $('#edt-brand').val(producto.brand);
                        $('#edt-id_medida').val(producto.id_medida);
                        $('#edt-id_categoria').val(producto.id_categoria);
                        $('#edt-location').val(producto.location);
                        $('#edt-id_moneda').val(producto.id_moneda);
                        $('#edt-precio').val(producto.precio);
                        $('#edt-costo').val(producto.costo);
                        $('#edt-cantidad').val(producto.cantidad);
                        $('#edt-codsunat').val(producto.codsunat);
                        $('#edt-peso').val(producto.peso);
                        $('#edt-iscbp').val(producto.iscbp);
                        $('#edt-batch_number').val(producto.batch_number);
                        $('#edt-technical_action').val(producto.technical_action);
                        $('#edt-expiration_date').val(producto.expiration_date);
                        $('#edt-min_stock').val(producto.min_stock);

                        // Mostrar la imagen del producto si existe
                        if (producto.image) {
                            $('#img-preview').attr('src',
                                `{{ env('APP_URL') }}/storage/${producto.image}`).show();
                        } else {
                            $('#img-preview').hide();
                        }

                        if (producto.technical_sheet) {
                            $('#file-preview').attr('href',
                                `{{ env('APP_URL') }}/storage/${producto.technical_sheet}`)
                        } else {
                            $('#file-preview').hide();
                        }

                        // Rellenar las unidades derivadas en la tabla
                        var tableBody = $('#unidades-bodyEdit');
                        var newRow = '';
                        $.each(data.unidad, function(i, v) {
                            newRow += '<tr>';
                            newRow += '<td>' + v.nombre + '</td>';
                            newRow += '<td>' + parseFloat(v.factor).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.pcompra).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.porcentajeVenta).toFixed(
                                2) + '</td>';
                            newRow += '<td>' + parseFloat(v.ppublico).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.pespecial).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.pminimo).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.pultimo).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.comision).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.ganancia).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.comision2).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.comision3).toFixed(2) +
                                '</td>';
                            newRow += '<td>' + parseFloat(v.comision4).toFixed(2) +
                                '</td>';
                            newRow += '<td>';
                            newRow +=
                                `<button type="button" class="btn btn-danger btn-sm" onclick="removeRowEdit(this,'${v.id}')">Eliminar</button>`;
                            newRow += '</td>';
                            newRow += '</tr>';
                        });
                        tableBody.html(newRow);

                        // Llenar el selector de unidades derivadas
                        unidadDerivada(producto.id_medida);

                        $('#modal-edt-prod').modal('show');
                    }
                });
            });



            $('#edt-unidad_derivada').on('change', function() {
                var $selectedOption = $(this).find('option:selected');
                var factor = $selectedOption.data('factor');
                var precioVenta = parseFloat($('#edt-precio').val()) || 0;
                var precioCalculado = (precioVenta * factor).toFixed(2);

                $('#edt-precio_calculado').val(precioCalculado);
                $('#edt-precio_modificable').val(precioCalculado);
            });



            $('#edt-agregar_unidad').on('click', function() {
                var unidadId = $('#edt-unidad_derivada').val();
                var unidadNombre = $('#edt-unidad_derivada option:selected').text();
                var precio = $('#edt-precio_modificable').val();
                let factor = $('#edt-factor').val();
                let pcompra = $('#edt-precio_compra').val();
                let v = $('#edt-porcentaje_venta').val();
                let ppublico = $('#edt-precio_modificable').val();
                let pespecial = $('#edt-precio_especial').val();
                let pminimo = $('#edt-precio_minimo').val();
                let pultimo = $('#edt-precio_ultimo').val();
                let comis = $('#edt-comision').val();
                let c2 = $('#edt-comision2').val();
                let c3 = $('#edt-comision3').val();
                let c4 = $('#edt-comision4').val();
                let ga = (parseFloat(ppublico) - parseFloat(pcompra)).toFixed(2); // Calcular ganancia

                if (unidadId && precio) {
                    var $tbody = $('#unidades-bodyEdit');
                    $tbody.append(`
                        <tr>
                            <td>${unidadNombre}</td>
                            <td>${factor}</td>
                            <td>${pcompra}</td>
                            <td>${v}</td>
                            <td>${ppublico}</td>
                            <td>${pespecial}</td>
                            <td>${pminimo}</td>
                            <td>${pultimo}</td>
                            <td>${comis}</td>
                            <td>${ga}</td>
                            <td>${c2}</td>
                            <td>${c3}</td>
                            <td>${c4}</td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeRow(this)">Eliminar</button>
                            </td>
                        </tr>
                    `);

                    // Actualizar el campo oculto con los costos
                    var costos = [];
                    $('#unidades-bodyEdit tr').each(function() {
                        var row = $(this);
                        var unidadNombre = row.find('td:eq(0)').text();
                        var factor = row.find('td:eq(1)').text();
                        var pcompra = row.find('td:eq(2)').text();
                        var porcentajeVenta = row.find('td:eq(3)').text();
                        var ppublico = row.find('td:eq(4)').text();
                        var pespecial = row.find('td:eq(5)').text();
                        var pminimo = row.find('td:eq(6)').text();
                        var pultimo = row.find('td:eq(7)').text();
                        var comision = row.find('td:eq(8)').text();
                        var ganancia = row.find('td:eq(9)').text();
                        var comision2 = row.find('td:eq(10)').text();
                        var comision3 = row.find('td:eq(11)').text();
                        var comision4 = row.find('td:eq(12)').text();

                        costos.push({
                            unidadId: unidadId,
                            factor: factor,
                            pcompra: pcompra,
                            porcentajeVenta: porcentajeVenta,
                            ppublico: ppublico,
                            pespecial: pespecial,
                            pminimo: pminimo,
                            pultimo: pultimo,
                            comision: comision,
                            ganancia: ganancia,
                            comision2: comision2,
                            comision3: comision3,
                            comision4: comision4
                        });
                    });
                    $('#edt-costos').val(JSON.stringify(costos));

                    // Limpiar campos después de agregar
                    $('#edt-unidad_derivada').val('');
                    $('#edt-precio_calculado').val('');
                    $('#edt-precio_modificable').val('');
                } else {
                    alert('Por favor, seleccione una unidad derivada y especifique un precio.');
                }
            });

            // Actualizar el producto
            $('#edit-product-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('costos', $('#edt-costos').val());
                $.ajax({
                    url: '{{ route('productos.update') }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#modal-edt-prod').modal('hide');
                            // Actualizar la vista o mostrar un mensaje de éxito
                            location
                                .reload(); // O una lógica personalizada para actualizar la vista
                        } else {
                            alert('Error al actualizar el producto.');
                        }
                    },
                    error: function() {
                        alert('Error al procesar la solicitud.');
                    }
                });
            });


            datatable = $("#datatableCompras").DataTable({
                order: [
                    [0, "desc"]
                ],
                paging: true,
                bFilter: true,
                ordering: true,
                searching: true,
                destroy: true,
                ajax: {
                    url: '{{ route('comprasAll') }}',
                    method: "POST",
                    data: {
                        _token: token,
                    },
                    dataSrc: ""
                },
                columns: [{
                        data: "id_compra",
                        class: "text-center",
                    },
                    {
                        data: "fecha_emision",
                        class: "text-center",
                    },
                    {
                        data: "fecha_vencimiento",
                        class: "text-center",
                    },
                    {
                        data: "serie",
                        class: "text-center",
                    },
                    {
                        data: "numero",
                        class: "text-center",
                    },
                    {
                        data: "razon_social",
                        class: "text-center",
                    },

                    {
                        data: null,
                        class: "text-center",
                        render: function(data, type, row) {
                            return `<div class="text-center">
              <div class="btn-group"><button  data-id="${Number(
                row.id_compra
              )}" class="btn btn-success btnDetalle"><i class="fa fa-eye"></i> </button></div></div>`;
                        },
                    },
                ],
            });

            $("#datatableCompras").on("click", ".btnDetalle ", function(event) {
                $("#loader-menor").show()
                var table = $("#tabla_clientes").DataTable();
                var trid = $(this).closest("tr").attr("id");
                var id = $(this).data("id");
                $("#modalDetalle").modal("show");
                $("#modalDetalle")
                    .find(".modal-title")
                    .text("Detelle compra NÂ°" + id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('compras.show') }}",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(resp) {
                        datatableProductoDetalle = $("#datatableProductoDetalle").DataTable({
                            paging: true,
                            bFilter: true,
                            ordering: true,
                            searching: true,
                            destroy: true,
                            data: resp,
                            columns: [{
                                    data: "id_compra",
                                    class: "text-center",
                                },
                                {
                                    data: "descripcion",
                                    class: "text-center",
                                },
                                {
                                    data: "cantidad",
                                    class: "text-center",
                                },
                                {
                                    data: "precio",
                                    class: "text-center",
                                },
                                {
                                    data: "totalTotal",
                                    class: "text-center",
                                },
                            ],
                        });
                    }
                });

            });

            // Sincroniza el campo 'descripcion' con 'ticket_description'
            $('#descripcion').on('input', function() {
                var descriptionText = $(this).val();
                $('#ticket_description').val(descriptionText);
            });

            // Permite editar el campo 'ticket_description' sin afectar 'descripcion'
            $('#ticket_description').on('input', function() {
                // No se hace nada aquí para no sobrescribir 'descripcion'
                // Este campo puede ser modificado libremente por el usuario
            });

            $('#modal-add-prod').on('shown.bs.modal', function() {
                $.ajax({
                    url: '{{ route('productos.generarCodigo') }}',
                    method: 'GET',
                    success: function(data) {
                        $('#codigo').val(data.codigo);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al generar código de producto:', error);
                    }
                });
            });

            function unidadDerivada(unidadId) {
                $.ajax({
                    url: '{{ route('getUnidadesDerivadas') }}',
                    method: 'POST',
                    data: {
                        id_unidad: unidadId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        var $unidadDerivadaSelect = $('#edt-unidad_derivada');
                        $unidadDerivadaSelect.empty();
                        $unidadDerivadaSelect.append(
                            '<option value="">--Elegir--</option>');

                        $.each(data, function(index, unidad) {
                            $unidadDerivadaSelect.append('<option value="' + unidad
                                .id + '" data-factor="' + unidad.factor + '">' +
                                unidad.nombre + '</option>');
                        });
                    }
                });
            }

            // $('#id_medida').on('change', function() {
            //     var unidadId = $(this).val();

            //     if (unidadId) {
            //         $.ajax({
            //             url: '{{ route('getUnidadesDerivadas') }}',
            //             method: 'POST',
            //             data: {
            //                 id_unidad: unidadId,
            //                 _token: '{{ csrf_token() }}' // CSRF token for security
            //             },
            //             success: function(data) {
            //                 var $unidadDerivadaSelect = $('#unidad_derivada');
            //                 $unidadDerivadaSelect.empty();
            //                 $unidadDerivadaSelect.append(
            //                     '<option value="">--Elegir--</option>');

            //                 $.each(data, function(index, unidad) {
            //                     $unidadDerivadaSelect.append('<option value="' + unidad
            //                         .id + '" data-factor="' + unidad.factor + '">' +
            //                         unidad.nombre + '</option>');
            //                 });
            //             }
            //         });
            //     } else {
            //         $('#unidad_derivada').empty().append('<option value="">--Elegir--</option>');
            //     }
            // });


            $('#unidad_derivada').on('change', function() {
                var $selectedOption = $(this).find('option:selected');
                var factor = $selectedOption.data('factor');
                var precioVenta = parseFloat($('#precio').val()) || 0;
                var precioCalculado = (precioVenta * factor).toFixed(2);

                $('#precio_calculado').val(precioCalculado);
                $('#precio_modificable').val(precioCalculado);
            });

            $('#precio_compra, #precio_modificable').on('input', calcularPorcentajeVenta);

            $('#agregar_unidad').on('click', function() {
                var unidadId = $('#unidad_derivada').val();
                var unidadNombre = $('#unidad_derivada option:selected').text();
                var precio = $('#precio_modificable').val();
                let factor = $('#factor').val();
                let pcompra = $('#precio_compra').val();
                let v = $('#porcentaje_venta').val();
                let ppublico = $('#precio_modificable').val();
                let pespecial = $('#precio_especial').val();
                let pminimo = $('#precio_minimo').val();
                let pultimo = $('#precio_ultimo').val();
                let comis = $('#comision').val();
                let c2 = $('#comision2').val();
                let c3 = $('#comision3').val();
                let c4 = $('#comision4').val();
                let ga = (parseFloat(ppublico) - parseFloat(pcompra)).toFixed(2); // Calcular ganancia

                if (unidadId && precio) {
                    var $tbody = $('#unidades-body');
                    $tbody.append(`
                        <tr>
                            <td>${unidadNombre}</td>
                            <td>${factor}</td>
                            <td>${pcompra}</td>
                            <td>${v}</td>
                            <td>${ppublico}</td>
                            <td>${pespecial}</td>
                            <td>${pminimo}</td>
                            <td>${pultimo}</td>
                            <td>${comis}</td>
                            <td>${ga}</td>
                            <td>${c2}</td>
                            <td>${c3}</td>
                            <td>${c4}</td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeRow(this)">Eliminar</button>
                            </td>
                        </tr>
                    `);

                    // Actualizar el campo oculto con los costos
                    var costos = [];
                    $('#unidades-body tr').each(function() {
                        var row = $(this);
                        var unidadNombre = row.find('td:eq(0)').text();
                        var factor = row.find('td:eq(1)').text();
                        var pcompra = row.find('td:eq(2)').text();
                        var porcentajeVenta = row.find('td:eq(3)').text();
                        var ppublico = row.find('td:eq(4)').text();
                        var pespecial = row.find('td:eq(5)').text();
                        var pminimo = row.find('td:eq(6)').text();
                        var pultimo = row.find('td:eq(7)').text();
                        var comision = row.find('td:eq(8)').text();
                        var ganancia = row.find('td:eq(9)').text();
                        var comision2 = row.find('td:eq(10)').text();
                        var comision3 = row.find('td:eq(11)').text();
                        var comision4 = row.find('td:eq(12)').text();

                        costos.push({
                            unidadId: unidadId,
                            factor: factor,
                            pcompra: pcompra,
                            porcentajeVenta: porcentajeVenta,
                            ppublico: ppublico,
                            pespecial: pespecial,
                            pminimo: pminimo,
                            pultimo: pultimo,
                            comision: comision,
                            ganancia: ganancia,
                            comision2: comision2,
                            comision3: comision3,
                            comision4: comision4
                        });
                    });
                    $('#costos').val(JSON.stringify(costos));

                    // Limpiar campos después de agregar
                    $('#unidad_derivada').val('');
                    $('#precio_calculado').val('');
                    $('#precio_modificable').val('');
                } else {
                    alert('Por favor, seleccione una unidad derivada y especifique un precio.');
                }
            });


            var modalTitle = {
                medida: 'Agregar Medida',
                categoria: 'Agregar Categoría',
                ubicacion: 'Agregar Ubicación' // Añadido para 'Ubicación'
            };

            // Manejar la apertura del modal
            $('#modal-add-option').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var type = button.data('type'); // tipo: 'medida', 'categoria' o 'ubicacion'

                $('#modalLabel').text(modalTitle[type]);
                $('#option_type').val(type);

                // Ocultar el modal principal si está abierto
                if ($('#modal-add-prod').hasClass('in')) {
                    $('#modal-add-prod').modal('hide');
                }
                $('#nombre_option').val('')
            });

            // Manejar el envío del formulario
            $('#form-add-option').on('submit', function(e) {
                e.preventDefault();

                var nombreOption = $('#nombre_option').val();
                var type = $('#option_type').val();
                var route;
                let id;
                if (type == 'medida') {
                    route = '{{ route('unidad-medida.store') }}';
                    id = 'id_medida';
                } else if (type == 'categoria') {
                    route = '{{ route('categoria.store') }}';
                    id = 'id_categoria';
                } else if (type == 'ubicacion') {
                    route = '{{ route('ubicacion.store') }}';
                    id = 'location';
                } else if (type == 'marca') {
                    route = '{{ route('marca.store') }}';
                    id = 'brand';
                }

                $.ajax({
                    url: route, // 'medidas', 'categorias' o 'ubicaciones'
                    method: 'POST',
                    data: {
                        nombre: nombreOption,
                        _token: '{{ csrf_token() }}' // Asegúrate de que el token CSRF esté disponible
                    },
                    success: function(data) {
                        // Cerrar el modal de agregar opción
                        $('#modal-add-option').modal('hide');

                        // Agregar la nueva opción al selector adecuado
                        var select = $('#' + id);
                        select.append('<option value="' + data.id + '">' + data.nombre +
                            '</option>');

                        // Esperar a que el modal se cierre completamente antes de reabrir el modal principal
                        $('#modal-add-option').on('hidden.bs.modal', function() {
                            // Asegurarse de que el cuerpo tenga la clase 'modal-open'
                            $('body').addClass('modal-open');
                            $('#modal-add-prod').modal('show');
                            $('#nombre_option').val('')
                        });
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });


            // Volver a abrir el modal principal si se cierra el modal de agregar opción
            $('#modal-add-option').on('hidden.bs.modal', function() {
                $('#modal-add-prod').modal('show');
            });

            $('#modal-add-derivada').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                $('#modal-add-prod').modal('hide');
                $('#nombreu_option').val('');
                $('#factor').val('');
            });

            $("#form-add-derivada").on('submit', function(e) {
                e.preventDefault();
                $.post("{{ route('unidadDerivada.store') }}", {
                        nombre: $('#nombreu_option').val(),
                        id_unidad: $('#unidad_option').val(),
                        factor: $('#factor').val(),
                        _token: token
                    },
                    function(data, textStatus, jqXHR) {
                        $('#modal-add-derivada').modal('hide');
                        var select = $('#unidad_derivada');
                        select.append('<option value="' + data.id + '">' + data.nombre +
                            '</option>');
                        $('#modal-add-derivada').on('hidden.bs.modal', function() {
                            // Asegurarse de que el cuerpo tenga la clase 'modal-open'
                            $('body').addClass('modal-open');
                            $('#modal-add-prod').modal('show');
                        });
                        $('#modal-add-prod').modal('show');
                        $('#nombreu_option').val('')
                    },
                );
            });

            $('#modal-add-derivada').on('hidden.bs.modal', function() {
                $('#modal-add-prod').modal('show');
            });

            // Clonar registros seleccionados
            $('#clone-button').click(function() {
                var selectedIds = [];
                $('.select-checkbox:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    // Realizar una solicitud AJAX para clonar los registros en la base de datos
                    $.ajax({
                        url: '{{ route('productos.clonar') }}', // Ruta para clonar en tu controlador Laravel
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            ids: selectedIds
                        },
                        success: function(response) {
                            // Manejar la respuesta
                            if (response.success) {
                                Swal.fire({
                                    title: "Correcto",
                                    text: "Registros clonados exitosamente",
                                    icon: "success"
                                });
                                location.reload(); // Recargar la página para ver los cambios
                            } else {
                                alert('Hubo un error al clonar los registros');
                            }
                        }
                    });
                } else {
                    alert('Por favor selecciona al menos un registro para clonar.');
                }
            });

            // Seleccionar/deseleccionar todos los checkboxes
            $('#check-all').click(function() {
                var isChecked = $(this).is(':checked');
                $('.select-checkbox').prop('checked', isChecked);
            });

            $('.toggle-status').change(function() {
                var productId = $(this).data('id');
                var newStatus = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route('productos.updateStatus') }}', // Ruta para actualizar el estado
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: productId,
                        activo: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Correcto",
                                text: "Estado actualizado con exito",
                                icon: "success"
                            });
                        } else {
                            alert('Error al actualizar el estado');
                        }
                    }
                });
            });
        });

        function removeRowEdit(button, id) {
            $(button).closest('tr').remove();
            $.post("{{ route('productounidad.delete') }}", {
                    _token: token,
                    id: id
                },
                function(data, textStatus, jqXHR) {

                },
                "dataType"
            );
        }

        function removeRowEditRow(button) {
            $(button).closest('tr').remove();
            // Actualizar el campo oculto de costos
            var costos = [];
            $('#unidades-bodyEdit tr').each(function() {
                var costo = $(this).find('td:eq(1)').text();
                if (costo) {
                    costos.push(costo);
                }
            });
            $('#edt-costos').val(costos.join(','));
        }

        function removeRow(button) {
            $(button).closest('tr').remove();

            // Actualizar el campo oculto con los costos
            var costos = [];
            $('#unidades-body tr').each(function() {
                var unidadId = $(this).find('input[name^="costos"]').attr('name').match(/\d+/)[0];
                var costo = $(this).find('input[name^="costos"]').val();
                costos.push({
                    id: unidadId,
                    costo: costo
                });
            });
            $('#costos').val(JSON.stringify(costos));
        }

        $("#datatable").on("click", ".btn-detalle", function(evt) {
            const cod = $(evt.currentTarget).attr("data-item");
            $.ajax({
                type: 'POST',
                url: '{{ route('historial.show') }}',
                data: {
                    cod: cod,
                    _token: token
                },

                success: function(resp) {
                    $("#modal_ver_detalle").modal("show");
                    $("#modal_ver_detalle")
                        .find(".modal-title")
                        .text("Movimiento del producto " + cod);

                    datatableDetalle = $("#datatableDetalle").DataTable({

                        paging: true,
                        bFilter: true,
                        ordering: true,
                        searching: true,
                        destroy: true,

                        language: {
                            url: "ServerSide/Spanish.json",
                        },
                        data: resp,
                        columns: [{
                                data: "id_historial",
                                class: "text-center",
                            },
                            {
                                data: "detalle_mov",
                                class: "text-center",
                            },
                            {
                                data: "fecha",
                                class: "text-center",
                            },

                        ],
                    });
                }
            });


        })
        $('#precio').on('input', function() {
            var precio = parseFloat($(this).val());
            var unidadId = $('#id_medida').val();
            if (precio && unidadId) {
                $.ajax({
                    url: '{{ route('getUnidadesDerivadas') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        unidadId: unidadId
                    },
                    success: function(response) {
                        var unidadesBody = $('#unidades-body');
                        unidadesBody.empty();

                        $.each(response.unidades_derivadas, function(i, unidad) {
                            var precioDerivado = precio * parseFloat(unidad.factor);
                            var row = `<tr>
        <td>${unidad.nombre}</td>
        <td><input type="text" name="unidades[${i}][costo]" value="${precioDerivado.toFixed(2)}"
                class="form-control"></td>
        <td><input type="hidden" name="unidades[${i}][id]" value="${unidad.id}"></td>
        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Eliminar</button></td>
    </tr>`;
                            unidadesBody.append(row);
                        });
                    },
                    error: function() {
                        console.error('Error al obtener las unidades derivadas');
                    }
                });
            }
        });

        $('#edt-precio').on('input', function() {
            var precio = parseFloat($(this).val());
            var unidadId = $('#edt-medida').val();
            if (precio && unidadId) {
                $.ajax({
                    url: '{{ route('getUnidadesDerivadas') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        unidadId: unidadId
                    },
                    success: function(response) {
                        var unidadesBody = $('#unidades-bodyEdit');
                        unidadesBody.empty();

                        $.each(response.unidades_derivadas, function(i, unidad) {
                            var precioDerivado = precio * parseFloat(unidad.factor);
                            var row = `<tr>
        <td>${unidad.nombre}</td>
        <td><input type="text" name="unidades[${i}][costo]" value="${precioDerivado.toFixed(2)}"
                class="form-control"></td>
        <td><input type="hidden" name="unidades[${i}][id]" value="${unidad.id}"></td>
        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Eliminar</button></td>
    </tr>`;
                            unidadesBody.append(row);
                        });
                    },
                    error: function() {
                        console.error('Error al obtener las unidades derivadas');
                    }
                });
            }
        });
        // Función para eliminar una fila
        window.removeRow = function(button) {
            $(button).closest('tr').remove();
        };

        function calcularPorcentajeVenta() {
            console.log("dd");
            var precioCompra = parseFloat($('#precio_compra').val());
            var precioPublico = parseFloat($('#precio_modificable').val());
            console.log(precioCompra, precioPublico);
            if (!isNaN(precioPublico)) {
                $('#precio_especial').val(precioPublico);
                $('#precio_minimo').val(precioPublico);
                $('#precio_ultimo').val(precioPublico);
            }
            if (!isNaN(precioCompra) && !isNaN(precioPublico) && precioCompra > 0) {
                var porcentajeVenta = ((precioPublico - precioCompra) / precioCompra) * 100;
                $('#porcentaje_venta').val(porcentajeVenta.toFixed(2)); // Redondear a dos decimales
            } else {
                $('#porcentaje_venta').val(''); // Limpiar el campo si los valores no son válidos
            }
        }
    </script>
</body>

</html>
