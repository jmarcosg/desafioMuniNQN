/**
 * Verificaciones formularios
 */
// Nuevo Usuario
$(document).ready(function () {
  $("#usuarioNuevo").bootstrapValidator({
    message: "Este valor no es valido",
    feedbackIcons: {
      valid: "glyphicon glyphicon-ok",
      invalid: "glyphicon glyphicon-remove",
      validating: "glyphicon glyphicon-refresh",
    },
    fields: {
      nombre: {
        message: " Nombre no valido",
        validators: {
          notEmpty: {
            message: " El nombre es obligatorio",
          },
          regexp: {
            regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
            message: " La primer letra en mayúscula. Solo letras.",
          },
        },
      },
      apellido: {
        message: " Apellido no valido",
        validators: {
          notEmpty: {
            message: " El apellido es obligatorio",
          },
          regexp: {
            regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
            message: " La primer letra en mayúscula. Solo letras.",
          },
        },
      },
      dni: {
        message: " DNI no valido",
        validators: {
          notEmpty: {
            message: " El DNI es obligatorio",
          },
          regexp: {
            regexp: /^[\d]{1,3}\.?[\d]{3,3}\.?[\d]{3,3}$/,
            message: " Ejemplo: 1.123.123",
          },
        },
      },
    },
  });
});
