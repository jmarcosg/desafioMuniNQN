const endpoint = "https://weblogin.muninqn.gov.ar/api/Examen";

$(document).ready(function () {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "http://localhost/desafioMuniNQN/control/consultaUsuarios.php",
    success: function (resp) {
      console.log(resp);
      if (resp.length > 0) {
        $("#botonPoblado").hide();
      }
    },
  });
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
            url: "http://localhost/desafioMuniNQN/vista/acciones/accionNuevoUsuario.php",
            data: datos,
            success: function (r) {
              console.log(r);
            },
            error: function (r) {
              console.log(r);
            },
          });
        });
      },
    });
    $("#poblarListado").hide();
  });
});
