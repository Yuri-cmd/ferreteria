@push('almacen')
    <script>
        let tabla = $("#datatable").DataTable({
            order: [
                [0, "desc"]
            ],
            // pageLength: 25
        });
        $(document).ready(function() {
            //genera el codigo de producto
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

            // Sincroniza el campo 'descripcion' con 'ticket_description'
            $('#edt-descripcion').on('input', function() {
                var descriptionText = $(this).val();
                $('#edt-ticket_description').val(descriptionText);
            });

            // Permite editar el campo 'ticket_description' sin afectar 'descripcion'
            $('#edt-ticket_description').on('input', function() {
                // No se hace nada aquí para no sobrescribir 'descripcion'
                // Este campo puede ser modificado libremente por el usuario
            });

            //calcular porcentaje de Venta
            $('#precio_compra, #precio_modificable').on('input', function() {
                calcularPorcentajeVenta('#precio_compra', '#precio_modificable', '#precio_especial',
                    '#precio_minimo', '#precio_ultimo', '#porcentaje_venta');
            });
            $('#edt-precio_compra, #edt-precio_modificable').on('input', function() {
                calcularPorcentajeVenta('#edt-precio_compra', '#edt-precio_modificable',
                    '#edt-precio_especial', '#edt-precio_minimo', '#edt-precio_ultimo',
                    '#edt-porcentaje_venta');
            });

            $('#edt-cantidad, #edt-uni_contenidas, #edt-stock_raccion').on('input', function() {
                calcularYMostrarStockFraccion('#edt-cantidad', '#edt-uni_contenidas', '#edt-stock_raccion',
                    '#edt-stock_raccionNumber');
            });

            $('#cantidad, #uni_contenidas, #stock_raccion').on('input', function() {
                calcularYMostrarStockFraccion('#cantidad', '#uni_contenidas', '#stock_raccion',
                    '#stock_raccionNumber');
            });

            function calcularYMostrarStockFraccion(cantidad, uni_contenidas, stock_raccion, stock_raccionNumber) {
                // Obtén los valores de los campos
                const cantidadInicial = parseFloat($(cantidad).val()) || 0;
                const undContenidas = parseFloat($(uni_contenidas).val()) || 1; // Evitar dividir por 0
                const stockFraccion = parseFloat($(stock_raccion).val()) || 0;

                // Realiza el cálculo
                const stockFraccionNumber = calcularStockFraccion(cantidadInicial, undContenidas, stockFraccion);

                // Asigna el resultado al campo edt-stock_raccionNumber
                $(stock_raccionNumber).val(stockFraccionNumber);
            }

            function calcularStockFraccion(cantidadInicial, undContenidas, stockFraccion) {
                // Suma la cantidad inicial al stock fraccionado
                const stockTotal = stockFraccion + cantidadInicial;

                // Calcula las unidades completas y la fracción restante
                const unidadesCompletas = Math.floor(stockTotal / undContenidas);
                const fraccionRestante = stockTotal % undContenidas;

                return `${unidadesCompletas}F${fraccionRestante.toFixed(2)}`;
            }

            //guardar formulario de producto
            $('#submit-btn').on('click', function() {
                var formData = new FormData($('#product-form')[0]);
                $.ajax({
                    url: '{{ route('productos.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Manejar respuesta exitosa (si es necesario)
                        if (response.success) {
                            alert('Producto guardado con éxito');
                            $('#modal-add-prod').modal('hide');
                            location.reload();
                        } else {
                            if (response.errors) {
                                alertError(response.errors);
                            }
                        }
                    },
                    error: function(xhr) {
                        // Manejar errores
                        alertError(xhr.responseJSON.errors)
                    }
                });
            });

            // Manejar la apertura del modal
            $('#modal-add-option').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var type = button.data('type');
                $('#option_type').val(type);
                const {
                    route,
                    id,
                    title
                } = config[type] || {};
                $('#modalLabel').text(title);
                // Ocultar el modal principal si está abierto
                if ($('#modal-add-prod').hasClass('in')) {
                    $('#modal-add-prod').modal('hide');
                }
                $('#nombre_option').val('')
            });

            // Agregar opciones de medida,categoria,ubicacion,marca,sucursal
            $('#form-add-option').on('submit', function(e) {
                e.preventDefault();
                const nombreOption = $('#nombre_option').val();
                const type = $('#option_type').val();
                const {
                    route,
                    id,
                    title
                } = config[type] || {};
                if (!route || !id) {
                    console.error('Tipo no válido o configuración no encontrada');
                    return;
                }
                $.ajax({
                    url: route,
                    method: 'POST',
                    data: {
                        nombre: nombreOption,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success == false) {
                            alertError(data.errors);
                            return
                        }
                        $('#modal-add-option').modal('hide');
                        $('#' + id).append(
                            `<option value="${data.id}">${data.nombre}</option>`);
                        $('#modal-add-option').on('hidden.bs.modal', function() {
                            $('body').addClass('modal-open');
                            $('#modal-add-prod').modal('show');
                            $('#nombre_option').val('');
                        });
                    },
                    error: function(xhr) {
                        alertError(xhr.responseJSON.errors)
                    }
                });
            });
            // Volver a abrir el modal principal si se cierra el modal de agregar opción
            $('#modal-add-option').on('hidden.bs.modal', function() {
                $('#modal-add-prod').modal('show');
            });

            $('.select-checkbox').on('change', function() {
                if (this.checked) {
                    $('.select-checkbox').not(this).prop('checked', false);
                }
            });
            // Clonar registros seleccionados
            $('#clone-button').click(function() {
                var selectedIds = '';
                $('.select-checkbox:checked').each(function() {
                    selectedIds = $(this).val();
                });

                if (selectedIds !== '') {
                    $.ajax({
                        url: `{{ route('productos.show') }}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            productoId: selectedIds
                        },
                        success: function(data) {
                            // Rellenar los campos del formulario con los datos del producto
                            let producto = data.producto;
                            $('#id').val(producto
                                .id_producto);
                            $('#descripcion').val(
                                producto.descripcion);
                            $('#ticket_description')
                                .val(producto
                                    .ticket_description);
                            $('#codigo').val(producto
                                .codigo);
                            $('#barcode').val(producto
                                .barcode);
                            $('#brand').val(producto
                                .brand);
                            $('#id_medida').val(producto
                                .id_medida);
                            $('#id_categoria').val(
                                producto.id_categoria);
                            $('#location').val(producto
                                .location);
                            $('#id_moneda').val(producto
                                .id_moneda);
                            $('#precio').val(producto
                                .precio);
                            $('#costo').val(producto
                                .costo);
                            $('#cantidad').val(producto
                                .cantidad);
                            $('#codsunat').val(producto
                                .codsunat);
                            $('#peso').val(producto
                                .peso);
                            $('#iscbp').val(producto
                                .iscbp);
                            $('#batch_number').val(
                                producto.batch_number);
                            $('#technical_action').val(
                                producto
                                .technical_action);
                            $('#expiration_date').val(
                                producto.expiration_date
                            );
                            $('#min_stock').val(producto
                                .min_stock);
                            $('#uni_contenidas').val(
                                producto
                                .uni_contenidas ?? 0);
                            $('#stock_raccion').val(
                                producto
                                .stock_raccion ?? 0);
                            $('#sucursal').val(producto
                                .sucursal);
                            $('#stock_raccionNumber')
                                .val(producto
                                    .stock_raccionNumber);

                            // Mostrar la imagen del producto si existe
                            if (producto.image) {
                                $('#img-preview').attr(
                                    'src',
                                    `{{ env('APP_URL') }}/storage/${producto.image}`
                                ).show();
                            } else {
                                $('#img-preview').hide();
                            }

                            if (producto.technical_sheet) {
                                $('#file-preview').attr(
                                    'href',
                                    `{{ env('APP_URL') }}/storage/${producto.technical_sheet}`
                                )
                            } else {
                                $('#file-preview').hide();
                            }

                            // Rellenar las unidades derivadas en la tabla
                            var tableBody = $(
                                '#unidades-body');
                            var newRow = '';
                            $.each(data.unidad, function(i,
                                v) {
                                newRow += '<tr>';
                                newRow += '<td>' + v
                                    .nombre +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .factor)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .pcompra)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .porcentajeVenta
                                    ).toFixed(
                                        2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .ppublico)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .pespecial)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .pminimo)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .pultimo)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .comision)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .ganancia)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .comision2)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .comision3)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>' +
                                    parseFloat(v
                                        .comision4)
                                    .toFixed(2) +
                                    '</td>';
                                newRow += '<td>';
                                newRow +=
                                    `<button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this,'${v.id}')"><i class="bi bi-trash-fill"></i></button>
                                               <button type="button" class="btn btn-primary btn-sm" onclick="editRow(this)"><i class="bi bi-pencil-fill"></i></button>
                                               <button type="button" class="btn btn-success btn-sm" style="display: none;" onclick="saveRow(this,'${v.id}')"><i class="bi bi-check-lg"></i></button>`;
                                newRow += '</td>';
                                newRow += '</tr>';
                            });
                            tableBody.html(newRow);
                            $('#costos').val(JSON.stringify(data.unidad));
                            $('#modal-add-prod').modal(
                                'show');
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

            // actualizar el estado
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
                            alertSucces("Correcto", "Estado actualizado con exito");
                        } else {
                            alert('Error al actualizar el estado');
                        }
                    }
                });
            });

            // Abrir el modal con los datos del producto
            $("#datatable").on("click", ".btn-edt", function(evt) {
                let productoId = $(evt.currentTarget).attr("data-item");
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
                        $('#edt-uni_contenidas').val(producto.uni_contenidas ?? 0);
                        $('#edt-stock_raccion').val(producto.stock_raccion ?? 0);
                        $('#edt-sucursal').val(producto.sucursal);
                        $('#edt-stock_raccionNumber').val(producto.stock_raccionNumber);

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
                            console.log(v);
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
                                `<button type="button" class="btn btn-danger btn-sm" onclick="removeRowEditBD(this,'${v.id}')"><i class="bi bi-trash-fill"></i></button>
                                <button type="button" class="btn btn-primary btn-sm" onclick="editRow(this)"><i class="bi bi-pencil-fill"></i></button><button type="button" class="btn btn-success btn-sm" style="display: none;" onclick="saveRowEditBD(this,'${v.id}')"><i class="bi bi-check-lg"></i></button>`;
                            newRow += '</td>';
                            newRow += '</tr>';
                        });
                        tableBody.html(newRow);
                        // Llenar el selector de unidades derivadas
                        //unidadDerivada(producto.id_medida);

                        $('#modal-edt-prod').modal('show');
                    }
                });
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

            //eliminar producto
            $("#datatable").on("click", ".btn-eliminar", function(evt) {
                let id = $(evt.currentTarget).attr("data-item");
                Swal.fire({
                    title: "Esta seguro?",
                    text: "No se puede restablecer la accion",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post("{{ route('producto.delete') }}", {
                                _token: token,
                                id: id
                            },
                            function(data, textStatus, jqXHR) {
                                alertSucces("Eliminado!", "Eliminado correctamente.");
                            },
                        );
                    }
                });
            });

        });


        let editingRow = null;
        // Manejador para agregar o editar una fila
        $('#agregar_unidad').on('click', function() {
            const data = {
                unidadNombre: $('#unidad_derivada option:selected').text(),
                factor: $('#factor').val(),
                pcompra: $('#precio_compra').val(),
                v: $('#porcentaje_venta').val(),
                ppublico: $('#precio_modificable').val(),
                pespecial: $('#precio_especial').val(),
                pminimo: $('#precio_minimo').val(),
                pultimo: $('#precio_ultimo').val(),
                comis: $('#comision').val(),
                c2: $('#comision2').val(),
                c3: $('#comision3').val(),
                c4: $('#comision4').val()
            };
            const unidadId = $('#unidad_derivada').val();

            const ga = (parseFloat(data.ppublico) - parseFloat(data.pcompra)).toFixed(2); // Calcular ganancia

            if (unidadId && data.ppublico) {
                if (editingRow) {
                    updateRow(editingRow, data, ga, unidadId);
                    editingRow = null;
                } else {
                    addRow(data, ga, unidadId);
                }

                updateCostos('unidades-body', 'costos', unidadId);
                limpiarCampos();
            } else {
                alert('Por favor, seleccione una unidad derivada y especifique un precio.');
            }
        });

        let editingRowEdit = null;

        // Manejador para agregar o editar una fila en el formulario de edición
        $('#edt-agregar_unidad').on('click', function() {
            const data = {
                unidadNombre: $('#edt-unidad_derivada option:selected').text(),
                factor: $('#edt-factor').val(),
                pcompra: $('#edt-precio_compra').val(),
                v: $('#edt-porcentaje_venta').val(),
                ppublico: $('#edt-precio_modificable').val(),
                pespecial: $('#edt-precio_especial').val(),
                pminimo: $('#edt-precio_minimo').val(),
                pultimo: $('#edt-precio_ultimo').val(),
                comis: $('#edt-comision').val(),
                c2: $('#edt-comision2').val(),
                c3: $('#edt-comision3').val(),
                c4: $('#edt-comision4').val()
            };
            const unidadId = $('#edt-unidad_derivada').val();
            const ga = (parseFloat(data.ppublico) - parseFloat(data.pcompra)).toFixed(2); // Calcular ganancia

            if (unidadId && data.ppublico) {
                if (editingRowEdit) {
                    updateRowEdit(editingRowEdit, data, ga);
                    editingRowEdit = null;
                } else {
                    addRowEdit(data, ga, unidadId);
                }

                updateCostos('unidades-bodyEdit', 'edt-costos', unidadId);
                limpiarCamposEdit();
            } else {
                alert('Por favor, seleccione una unidad derivada y especifique un precio.');
            }
        });

        // Actualiza una fila existente en el formulario de edición
        function updateRowEdit(row, data, ga) {
            row.find('td').each(function(index) {
                const value = index === 0 ?
                    `<select class="form-control" disabled>${$('#edt-unidad_derivada').html()}</select>` :
                    Object.values(data)[index - 1] || ga;
                $(this).html(value);
            });

            // Actualiza el atributo data-id para las filas que vienen de la base de datos
            if (row.data('db-id')) {
                row.data('unidad-id', data.unidadId);
            }
        }

        // Agrega una nueva fila al formulario de edición
        function addRowEdit(data, ga, unidadId) {
            $('#unidades-bodyEdit').append(`<tr data-unidad-id="${unidadId}">
                <td><select class="form-control" disabled>${$('#edt-unidad_derivada').html()}</select></td>
                ${Object.values(data).slice(1).map(value => `<td>${value}</td>`).join('')}
                <td>${ga}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="removeRowEdit(this, ${unidadId})"><i class="bi bi-trash-fill"></i></button>
                    <button type="button" class="btn btn-primary" onclick="editRow(this)"><i class="bi bi-pencil-fill"></i></button>
                    <button type="button" class="btn btn-success" onclick="saveRowEdit(this)" style="display: none;"><i class="bi bi-check-lg"></i></button>
                </td>
            </tr>`);
        }

        // Limpia los campos del formulario de edición
        function limpiarCamposEdit() {
            $('#edt-unidad_derivada').val('');
            $('#edt-precio_calculado, #edt-precio_modificable, #edt-factor, #edt-precio_compra, #edt-porcentaje_venta, #edt-precio_modificable, #edt-precio_especial, #edt-precio_minimo, #edt-precio_ultimo, #edt-comision, #edt-comision2, #edt-comision3, #edt-comision4')
                .val('');
        }

        // salva una fila
        function saveRowEdit(button) {
            const row = $(button).closest('tr');
            const unidadId = row.find('td:eq(0) select').val(); // Obtiene el nuevo valor del select
            row.find('td').each(function(index) {
                const input = $(this).find('input');
                const select = $(this).find('select');
                if (input.length) {
                    $(this).text(input.val());
                } else if (select.length) {
                    $(this).text(select.find('option:selected').text());
                }
            });

            row.attr('data-unidad-id', unidadId);

            $(button).hide(); // Ocultar botón de guardar
            row.find('.btn-primary').show(); // Mostrar botón de edición

            updateCostos('unidades-bodyEdit', 'edt-costos', unidadId);
        }
    </script>

    <script>
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
    </script>
@endpush
