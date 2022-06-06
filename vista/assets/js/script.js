const endpoint = "https://weblogin.muninqn.gov.ar/api/Examen";

$(document).ready(function () {
  /**
   * Consulto en la base de datos si la tabla usuarios tiene más de una fila
   * De ser así, oculto el boton de poblar esta tabla
   */
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "http://localhost:8080/desafiomuninqn/consultaUsuarios.php",
    success: function (resp) {
      if (resp.length > 0) {
        $("#botonPoblado").hide();
      }
    },
  });

  /**
   * Pueblo la tabla de usarios en la base de datos con los datos de la API
   */
  $("#poblarListado").on("click", function () {
    $.ajax({
      type: "GET",
      url: endpoint,
      success: function (usuariosResp) {
        usuarios = usuariosResp.value;
        $.each(usuarios, (i, usuario) => {
          let genero = usuario.genero.value;
          datos = {
            dni: usuario.dni,
            razonsocial: usuario.razonSocial,
            genero: genero,
            fechaNacimiento: usuario.fechaNacimiento,
          };
          $.ajax({
            type: "POST",
            url: "http://localhost:8080/desafiomuninqn/vista/acciones/accionNuevoUsuario.php",
            data: datos,
            success: function (r) {
              // console.log(r);
            },
            error: function (r) {
              // console.log(r);
            },
          });
        });
      },
    });
    $("#poblarListado").hide();
  });
});

$(document).ready(function () {
  $.ajax({
    type: "GET",
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    url: "http://localhost:8080/desafiomuninqn/control/consultaInscripciones.php",
    success: function (data) {
      console.log(data);
      let stats;
      $.each(data, function (i, item) {
        stats += `<tr><td>${item.nombreCurso}</td><td>${item.cantHombres}</td><td>${item.cantMujeres}</td><td>${item.cantOtros}</td><td>${item.total}</td><td>${item.cantMenores}</td><td>${item.cantMayores}</td></tr>`;
      });
      //$("#estadisticas").append(stats);
    },
  });
});
