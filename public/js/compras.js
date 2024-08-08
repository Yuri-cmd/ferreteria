$(document).ready(function() {
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
            url: comprasAll,
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
            url: comprasShow,
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
});
