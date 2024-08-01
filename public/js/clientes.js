$(document).ready(function () {
  tabla_clientes = $("#tabla_clientes").DataTable({
    paging: true,
    bFilter: true,
    ordering: true,
    searching: true,
    destroy: true,
    ajax: {
      url: _URL + "/ajs/clientes/render",
      method: "POST", //usamos el metodo POST
      dataSrc: "",
    },
    language: {
      url: "ServerSide/Spanish.json",
    },
    columns: [
      {
        data: "id_cliente",
        class: "text-center",
      },
      {
        data: "documento",
        class: "text-center",
      },
      {
        data: "datos",
        class: "text-center",
      },
      {
        data: "email",
        class: "text-center",
      },
      {
        data: "telefono",
        class: "text-center",
      },
      {
        data: "ultima_venta",
        class: "text-center",
      },
      {
        data: "total_venta",
        class: "text-center",
      },
      {
        data: null,
        class: "text-center",
        render: function (data, type, row) {
          return `<div class="text-center">
            <div class="btn-group"><button  data-id="${Number(
              row.id_cliente
            )}" class="btn btn-warning btnEditar"><i class="fa fa-edit"></i> </button><button  data-id="${Number(
            row.id_cliente
          )}" class="btn btn-danger btnBorrar"><i class="fa fa-trash"></i> </button></div></div>`;
        },
      },
    ],
  });
  /*   $.ajax({

        type: "POST",
        url: _URL + '/ajs/clientes/render',
        
        success: function (resp) {
          let data = JSON.parse(resp);
          console.log(data);
        },
    });   */
  $("#nuevoCliente").click(function () {
    $("#loader-menor").show();
    let data = $("#frmClientesAgregar").serializeArray();
    $.ajax({
      type: "POST",
      url: _URL + "/ajs/clientes/add",
      data: data,
      success: function (resp) {
        $("#loader-menor").hide();
        let data = JSON.parse(resp);
        if (typeof data === "object") {
          tabla_clientes.ajax.reload(null, false);
          Swal.fire("¡Buen trabajo!", "Registro Exitoso", "success");
          $("#agregarModal").modal("hide");
          $("body").removeClass("modal-open");
          $("#frmClientesAgregar").trigger("reset");
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: JSON.parse(resp),
          });
        }
      },
    });
  });
  $("#agregarClientesImport").click(function () {
    var tr = $("#trImportar");
    /*  var currentRow = $(table).closest("tr"); */
    /*   var col1 = currentRow.find("td:eq(1)").val(); */
    /*   console.log(col1); */
    $(tr).each(function () {
      var currentRow = $(this);

      var col1_value = currentRow.find("td:eq(0)").text();
      var col2_value = currentRow.find("td:eq(1)").text();
      var col3_value = currentRow.find("td:eq(2)").text();
      var col4_value = currentRow.find("td:eq(3)").text();
      var col5_value = currentRow.find("td:eq(4)").text();
      var col6_value = currentRow.find("td:eq(5)").text();
      var col7_value = currentRow.find("td:eq(6)").text();
      let datos = {
        documentoAgregar: col1_value,
        datosAgregar: col2_value,
        direccionAgregar: col3_value,
        direccionAgregar2: col4_value,
        telefonoAgregar: col5_value,
        telefonoAgregar2: col6_value,
        direccion: col7_value,
      };

      /*  console.log(array); */
      /*    console.log(array); */
      $.ajax({
        type: "POST",
        url: _URL + "/ajs/clientes/add",
        data: datos,
        success: function (resp) {
          $("#loader-menor").hide();
          tabla_clientes.ajax.reload(null, false);
          Swal.fire("¡Buen trabajo!", "Registro Exitoso", "success");
          $("#modal-lista-clientes").modal("hide");
          $("body").removeClass("modal-open");
        },
      });
    });
  });
  $("#tabla_clientes").on("click", ".btnEditar ", function (event) {
    $("#loader-menor").show();
    var table = $("#tabla_clientes").DataTable();
    var trid = $(this).closest("tr").attr("id");
    var id = $(this).data("id");
    $("#editarModal").modal("show");
    $("#editarModal")
      .find(".modal-title")
      .text("Editar cliente N°" + id);
    $.ajax({
      url: _URL + "/ajs/clientes/getOne",
      data: {
        id: id,
      },
      type: "post",
      success: function (data) {
        $("#loader-menor").hide();
        let json = JSON.parse(data);
        let datos = json[0];
        console.log(datos);
        $("#documentoEditar").val(datos.documento);
        $("#datosEditar").val(datos.datos);
        $("#direccionEditar").val(datos.direccion);
        $("#direccionEditar2").val(datos.direccion2);
        $("#telefonoEditar").val(datos.telefono);
        $("#telefonoEditar2").val(datos.telefono2);
        $("#emailEditar").val(datos.email);
        $("#idCliente").val(id);
        $("#trid").val(trid);
      },
    });
  });
  $("#updateCliente").click(function () {
    $("#loader-menor").show();
    let data = $("#clientesEditar").serializeArray();
    let id = $("#idCliente").val();
    let idData = {
      name: "idPre",
      value: id,
    };
    $.ajax({
      url: _URL + "/ajs/clientes/editar",
      type: "POST",
      data: data,
      success: function (resp) {
        $("#loader-menor").hide();
        let data = JSON.parse(resp);
        console.log(resp);
        if (Array.isArray(data)) {
          tabla_clientes.ajax.reload(null, false);
          Swal.fire("¡Buen trabajo!", "Actualización exitosa", "success");
          $("#editarModal").modal("hide");
          $("body").removeClass("modal-open");
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: JSON.parse(resp),
          });
        }
      },
    });
  });
  $("#tabla_clientes").on("click", ".btnBorrar", function () {
    var id = $(this).data("id");
    let idData = {
      name: "idDelete",
      value: id,
    };
    Swal.fire({
      title: "¿Deseas borrar el registro?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: _URL + "/ajs/clientes/borrar",
          type: "post",
          data: idData,
          success: function (resp) {
            /* console.log(resp); */
            tabla_clientes.ajax.reload(null, false);
            Swal.fire(
              "¡Buen trabajo!",
              "Registro Borrado Exitosamente",
              "success"
            );
          },
        });
      } else {
      }
    });
  });
  $("#btnBuscarInfo").click(function (e) {
    e.preventDefault();
    if (!$("#documentoAgregar").val()) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Debe ingresar un DNI o RUC",
      });
    } else {
      if (
        $("#documentoAgregar").val().length === 8 ||
        $("#documentoAgregar").val().length === 11
      ) {
        let docu = $("#documentoAgregar").val();
        $("#loader-menor").show();
        $.ajax({
          url: _URL + "/ajs/consulta/doc/cliente",
          type: "post",
          data: { doc: docu },
          success: function (resp) {
            $("#loader-menor").hide();
            let datos = JSON.parse(resp);
            console.log(datos.data);
            /*  console.log(resp); */
            /*             if (datos.data.nombre) {
              $("#datosAgregar").val(datos.data.nombre);
            } else if (datos.data.razon_social) {
              $("#datosAgregar").val(datos.data.razon_social);
            } else {
              alertAdvertencia("Documento no encontrado");
            } */
            /* $("#datosAgregar").val(datos.data.dni);   */
            //PRUEBA RUC 10427993120
          },
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Debe ingresar un DNI o RUC",
        });
      }
    }
  });
  $("#btnBuscarInfoEditar").click(function (e) {
    e.preventDefault();
    if (!$("#documentoEditar").val()) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Debe ingresar un DNI o RUC",
      });
    } else {
      if (
        $("#documentoEditar").val().length === 8 ||
        $("#documentoEditar").val().length === 11
      ) {
        let docu = $("#documentoEditar").val();
        $("#loader-menor").show();
        $.ajax({
          url: _URL + "/ajs/consulta/doc/cliente",
          type: "post",
          data: { doc: docu },
          success: function (resp) {
            $("#loader-menor").hide();
            let datos = JSON.parse(resp);
            console.log(datos.data);
            console.log(resp);
            if (datos.data.nombre) {
              $("#datosEditar").val(datos.data.nombre);
            } else if (datos.data.razon_social) {
              $("#datosEditar").val(datos.data.razon_social);
            } else {
              alertAdvertencia("Documento no encontrado");
            }
            /* $("#datosAgregar").val(datos.data.dni);   */
            //PRUEBA RUC 10427993120
          },
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Debe ingresar un DNI o RUC",
        });
      }
    }
  });
  $("#nuevoExcel").change(function () {
    console.log("aaaaaaaa");
    if ($("#nuevoExcel").val().length > 0) {
      var fd = new FormData();
      fd.append("file", $("#nuevoExcel")[0].files[0]);
      $.ajax({
        type: "POST",
        url: _URL + "/ajs/clientes/add/exel",
        data: fd,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          console.log("inicio");
          $("#loader-menor").show();
        },
        error: function (err) {
          $("#loader-menor").hide();
          console.log(err);
        },
        success: function (resp) {
          $("#loader-menor").hide();
          let data = JSON.parse(resp);
          let dataInserted = data.data[1];

          console.log(dataInserted);
          if (dataInserted == undefined) {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Sube el excel correctamente",
            });
          } else {
            let documento = `<td>${dataInserted[0]}</td>`;
            let datos = `<td>${dataInserted[1]}</td>`;
            let direccion = `<td> ${dataInserted[2]}</td>`;
            let direccion2 = `<td>${dataInserted[3]}</td>`;
            let telefono = `<td>${dataInserted[4]}</td>`;
            let telefono2 = `<td>${dataInserted[5]}</td>`;
            let email = `<td>${dataInserted[6]}</td>`;
            $("#trImportar").append(documento);
            $("#trImportar").append(datos);
            $("#trImportar").append(direccion);
            $("#trImportar").append(direccion2);
            $("#trImportar").append(telefono);
            $("#trImportar").append(telefono2);
            $("#trImportar").append(email);
            $("#tbodyImportar").append($("#trImportar"));
            $("#importarModal").modal("hide");
            $("#modal-lista-clientes").modal("show");
          }
        },
      });
    }
  });
});
