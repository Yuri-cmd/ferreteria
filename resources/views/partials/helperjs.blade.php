@push('helperjs')
    <script>
        const config = {
            medida: {
                route: '{{ route('unidad-medida.store') }}',
                id: 'id_medida',
                title: 'Agregar Medida'
            },
            categoria: {
                route: '{{ route('categoria.store') }}',
                id: 'id_categoria',
                title: 'Agregar Categoría',
            },
            ubicacion: {
                route: '{{ route('ubicacion.store') }}',
                id: 'location',
                ubicacion: 'Agregar Ubicación',
            },
            marca: {
                route: '{{ route('marca.store') }}',
                id: 'brand',
                marca: 'Agregar Marca',
            },
            sucursal: {
                route: '{{ route('sucursal.store') }}',
                id: 'sucursal',
                sucursal: 'Agregar Sucursal',
            },
            derivada: {
                route: '{{ route('unidadDerivada.store') }}',
                id: 'unidad_derivada',
                derivada: 'Agregar Unidad Derivada',
            }
        };

        // Función unificada para calcular porcentaje de venta
        function calcularPorcentajeVenta(precioCompraSelector, precioPublicoSelector, precioEspecialSelector,
            precioMinimoSelector, precioUltimoSelector, porcentajeVentaSelector) {
            var precioCompra = parseFloat($(precioCompraSelector).val());
            var precioPublico = parseFloat($(precioPublicoSelector).val());
            console.log(precioCompra, precioPublico);

            if (!isNaN(precioPublico)) {
                $(precioEspecialSelector).val(precioPublico);
                $(precioMinimoSelector).val(precioPublico);
                $(precioUltimoSelector).val(precioPublico);
            }

            if (!isNaN(precioCompra) && !isNaN(precioPublico) && precioCompra > 0) {
                var porcentajeVenta = ((precioPublico - precioCompra) / precioCompra) * 100;
                $(porcentajeVentaSelector).val(porcentajeVenta.toFixed(2)); // Redondear a dos decimales
            } else {
                $(porcentajeVentaSelector).val(''); // Limpiar el campo si los valores no son válidos
            }
        }

        function alertError(errors) {
            var errorMsg = '';
            if (errors) {
                $.each(errors, function(key, value) {
                    errorMsg += value[0] +
                        '\n'; // Concatenar todos los errores
                });
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: errorMsg,
                });
            }
        }

        function alertSucces(title, text) {
            Swal.fire({
                title: title,
                text: text,
                icon: "success"
            }).then((result) => {
                location.reload();
            });
        }

        function updateRow(row, data, ga, unidadId) {
            // Actualiza el atributo data-unidad-id
            $(row).attr('data-unidad-id', unidadId);

            // Obtén todas las celdas de la fila
            const cells = $(row).find('td');

            // Solo actualiza las celdas relevantes
            $(cells[0]).text(data.unidadNombre); // Ejemplo para la primera celda
            $(cells[1]).text(data.factor);
            $(cells[2]).text(data.pcompra);
            $(cells[3]).text(data.v);
            $(cells[4]).text(data.ppublico);
            $(cells[5]).text(data.pespecial);
            $(cells[6]).text(data.pminimo);
            $(cells[7]).text(data.pultimo);
            $(cells[8]).text(data.comis);
            $(cells[9]).text(data.c2);
            $(cells[10]).text(data.c3);
            $(cells[11]).text(data.c4);
            $(cells[12]).text(ga); // Ganancia (ajusta el índice según la posición correcta)
        }

        // Agrega una nueva fila
        function addRow(data, ga, unidadId) {
            $('#unidades-body').append(`<tr data-unidad-id="${unidadId}">
                ${Object.values(data).map(value => `<td>${value}</td>`).join('')}
                <td>${ga}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="bi bi-trash-fill"></i></button>
                    <button type="button" class="btn btn-primary" onclick="editRow(this)"><i class="bi bi-pencil-fill"></i></button>
                    <button type="button" class="btn btn-success" onclick="saveRow(this)" style="display: none;"><i class="bi bi-check-lg"></i></button>
                </td>
            </tr>`);
        }

        // Actualiza el campo oculto con los costos
        function updateCostos(idBody, idCosto, unidadId) {
            const costos = [];
            $(`#${idBody} tr`).each(function() {
                const row = $(this);
                const data = {
                    unidadId: row.attr('data-unidad-id'), // Usa el atributo data-unidad-id
                    factor: row.find('td').eq(1).text(),
                    pcompra: row.find('td').eq(2).text(),
                    v: row.find('td').eq(3).text(),
                    ppublico: row.find('td').eq(4).text(),
                    pespecial: row.find('td').eq(5).text(),
                    pminimo: row.find('td').eq(6).text(),
                    pultimo: row.find('td').eq(7).text(),
                    comis: row.find('td').eq(8).text(),
                    c2: row.find('td').eq(9).text(),
                    c3: row.find('td').eq(10).text(),
                    c4: row.find('td').eq(11).text(),
                    ga: row.find('td').eq(12).text()
                };
                costos.push(data);
            });
            $(`#${idCosto}`).val(JSON.stringify(costos));
        }

        // Limpia los campos del formulario
        function limpiarCampos() {
            $('#unidad_derivada').val('');
            $('#precio_calculado, #precio_modificable, #factor, #precio_compra, #porcentaje_venta, #precio_especial, #precio_minimo, #precio_ultimo')
                .val('');
            $('#factor').val(1);
            $('#comision, #comision2, #comision3, #comision4').val(0)
        }

        // Edita una fila
        function editRow(button) {
            const row = $(button).closest('tr');
            const unidadesOptions = `@foreach ($unidadesDerivadas as $unidadDerivada)
                                        <option value="{{ $unidadDerivada->id }}" 
                                            ${row.attr('data-unidad-id') === '{{ $unidadDerivada->id }}' ? 'selected' : ''}>
                                            {{ $unidadDerivada->nombre }}
                                        </option>
                                    @endforeach`;

            row.find('td:eq(0)').html(
                `<select class="form-control">${unidadesOptions}</select>`
            );
            row.find('td:eq(1)').html(
                `<input type="text" value="${row.find('td:eq(1)').text()}" class="form-control">`
            );
            row.find('td:eq(2)').html(
                `<input type="text" value="${row.find('td:eq(2)').text()}" class="form-control">`
            );
            row.find('td:eq(3)').html(
                `<input type="text" value="${row.find('td:eq(3)').text()}" class="form-control">`
            );
            row.find('td:eq(4)').html(
                `<input type="text" value="${row.find('td:eq(4)').text()}" class="form-control">`
            );
            row.find('td:eq(5)').html(
                `<input type="text" value="${row.find('td:eq(5)').text()}" class="form-control">`
            );
            row.find('td:eq(6)').html(
                `<input type="text" value="${row.find('td:eq(6)').text()}" class="form-control">`
            );
            row.find('td:eq(7)').html(
                `<input type="text" value="${row.find('td:eq(7)').text()}" class="form-control">`
            );
            row.find('td:eq(8)').html(
                `<input type="text" value="${row.find('td:eq(8)').text()}" class="form-control">`
            );
            row.find('td:eq(9)').html(
                `<input type="text" value="${row.find('td:eq(9)').text()}" class="form-control">`
            );
            row.find('td:eq(10)').html(
                `<input type="text" value="${row.find('td:eq(10)').text()}" class="form-control">`
            );
            row.find('td:eq(11)').html(
                `<input type="text" value="${row.find('td:eq(11)').text()}" class="form-control">`
            );
            row.find('td:eq(12)').html(
                `<input type="text" value="${row.find('td:eq(12)').text()}" class="form-control">`
            );
            $(button).hide(); // Ocultar botón de edición
            row.find('.btn-success').show(); // Mostrar botón de guardar
        }

        // Guarda una fila editada
        function saveRow(button) {
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

            updateCostos('unidades-body', 'costos', unidadId);
        }


        // Elimina la unidad derivada del formulario de edit
        function removeRowEditBD(button, id) {
            // Elimina la fila más cercana al botón
            $(button).closest('tr').remove();
            // Realiza la solicitud POST para eliminar el registro
            $.post("{{ route('productounidad.delete') }}", {
                _token: token,
                id: id
            }).fail(function(xhr, status, error) {
                console.error('Error:', error);
            });
        }

        function saveRowEditBD(button, id) {
            const row = $(button).closest('tr');

            // Crear un objeto para almacenar los datos de la fila editada
            let rowData = {
                _token: token, // Incluye el token CSRF
                id: id // Incluye el ID del registro que se está editando
            };

            // Itera sobre cada celda de la fila para obtener los datos
            row.find('td').each(function(index) {
                const input = $(this).find('input');
                const select = $(this).find('select');
                let value;

                if (input.length) {
                    value = input.val();
                    $(this).text(value); // Actualiza el texto en la celda
                } else if (select.length) {
                    value = select.find('option:selected').val();
                    $(this).text(select.find('option:selected').text()); // Actualiza el texto en la celda
                } else {
                    value = $(this).text(); // Si no es input ni select, almacena el texto existente
                }

                // Asigna el valor al objeto rowData usando un índice o una clave específica
                rowData[`columna${index}`] = value;
            });

            // Ocultar el botón de guardar y mostrar el de editar
            $(button).hide();
            row.find('.btn-primary').show();

            // Realiza la solicitud POST para actualizar el registro en la base de datos
            $.post("{{ route('productounidad.update') }}", rowData)
                .done(function(response) {
                    // Maneja la respuesta de éxito aquí
                    console.log('Registro actualizado con éxito:', response);
                })
                .fail(function(xhr, status, error) {
                    console.error('Error al actualizar el registro:', error);
                });
        }


        function removeRowEdit(button) {
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

        // Función para eliminar una fila
        window.removeRow = function(button) {
            $(button).closest('tr').remove();
        };
    </script>
@endpush
