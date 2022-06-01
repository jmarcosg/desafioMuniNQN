/**
 * Verificaciones formularios admin
 */
// Actualizar-Modificar Menu
$(document).ready(function() {
    $('#actualizarMenu').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            menombre: {
                message: ' Nombre no valido',
                validators: {
                    notEmpty: {
                        message: ' El nombre del menú es obligatorio'
                    },
                    stringLength: {
                        min: 1,
                        message: ' Debe tener al menos un caracter'
                    }
                }
            },
            medescripcion: {
                message: ' Número no valido',
                validators: {
                    notEmpty: {
                        message: ' La descripción del menú es obligatoria'
                    },
                    stringLength: {
                        min: 1,
                        message: ' Debe tener al menos un caracter'
                    }
                }
            },
            idpadre: {
                message: ' Número no valido',
                validators: {
                    notEmpty: {
                        message: ' Ingrese un número por favor'
                    },
                    stringLength: {
                        min: 1,
                        message: ' Debe tener al menos un número'
                    }
                }
            }
        },
    });
});

// Actualizar-Modificar Usuario
$(document).ready(function() {
    $('#actualizarUsuario').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usnombre: {
                message: ' Nombre de usuario no valido',
                validators: {
                    notEmpty: {
                        message: ' El nombre de usuario es obligatorio'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: ' La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            usmail: {
                message: ' Correo electronico no valido',
                validators: {
                    notEmpty: {
                        message: ' El correo electronico es obligatorio'
                    },
                    regexp: {
                        regexp: /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/,
                        message: 'Ejemplo: ejemplo@gmail.com'
                    }
                }
            },
            idrol: {
                message: ' Rol no valido',
                validators: {
                    notEmpty: {
                        message: ' El rol es obligatorio'
                    },
                }
            }
        },
    });
});

// Nuevo Menu
$(document).ready(function() {
    $('#menuNuevo').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            menombre: {
                message: ' Nombre del menu no valido',
                validators: {
                    notEmpty: {
                        message: ' El nombre del menu es obligatorio'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: ' La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            medescripcion: {
                message: ' Descripcion no valida',
                validators: {
                    notEmpty: {
                        message: ' La descripcion es obligatoria'
                    },
                    regexp: {
                        regexp: /^([a-z])\w/,
                        message: ' Todo minusculas. Solo letras.'
                    }
                }
            },
            idpadre: {
                message: ' ID Padre no valido',
                validators: {
                    notEmpty: {
                        message: ' El ID del Padre es obligatorio'
                    }
                }
            },
        },
    });
});

// Nuevo Usuario
$(document).ready(function() {
    $('#usuarioNuevo').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usnombre: {
                message: ' Nombre de usuario no valido',
                validators: {
                    notEmpty: {
                        message: ' El nombre de usuario es obligatorio'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: ' La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            uspass: {
                message: ' Contraseña no valida',
                validators: {
                    notEmpty: {
                        message: ' La contraseña es obligatoria'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]{8,}$/,
                        message: ' Longitud mínima de 8 caracteres. Al menos una mayúscula o minúscula y un número.\n'
                    },
                    different: {
                        field: 'usnombre',
                        message: ' La contraseña y el nombre de usuario no pueden ser iguales'
                    }
                }
            },
            usmail: {
                message: ' Correo electronico no valido',
                validators: {
                    notEmpty: {
                        message: ' El correo electronico es obligatorio'
                    },
                    regexp: {
                        regexp: /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/,
                        message: ' Ejemplo: ejemplo@gmail.com'
                    }
                }
            },
            idrol: {
                message: ' Rol no valido',
                validators: {
                    notEmpty: {
                        message: ' El rol es obligatorio'
                    },
                }
            }
        },
    });
});

/**
 * Verificaciones formularios manager deposito
 */
// Actualizar-modificar producto
$(document).ready(function() {
    $('#actualizarProducto').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            pronombre: {
                message: ' Nombre no valido',
                validators: {
                    notEmpty: {
                        message: ' El nombre no es válido'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: ' La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            prodetalle: {
                message: ' Número no valido',
                validators: {
                    notEmpty: {
                        message: ' El detalle es obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]/,
                        message: ' Detalle no válido'
                    }
                }
            },
            proprecio: {
                message: ' Precio no valido',
                validators: {
                    notEmpty: {
                        message: ' El precio es obligatorio'
                    },
                    regexp: {
                        regexp: /^[0-9]/,
                        message: ' Precio no válido'
                    }
                }
            },
            prodescuento: {
                message: ' Descuento no valido',
                validators: {
                    notEmpty: {
                        message: ' El descuento es obligatorio'
                    },
                    regexp: {
                        regexp: /^[0-9]/,
                        message: ' Descuento no válido'
                    }
                }
            },
            procantstock: {
                message: ' Stock no valido',
                validators: {
                    notEmpty: {
                        message: ' La cantidad en stock es obligatoria'
                    },
                    regexp: {
                        regexp: /^[0-9]/,
                        message: ' Cantidad en stock no válida'
                    }
                }
            },
            provecescomprado: {
                message: ' Stock no valido',
                validators: {
                    notEmpty: {
                        message: ' Ingrese un valor por favor'
                    },
                    stringLength: {
                        min: 1,
                        message: ' Debe tener al menos un número'
                    }
                }
            }
        },
    });
});

// Nuevo producto
$(document).ready(function() {
    $('#productoNuevo').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            idproducto: {
                message: ' ID no valido',
                validators: {
                    notEmpty: {
                        message: ' El ID es obligatorio'
                    },
                    regexp: {
                        regexp: /[A-Z0-9]{2,}/,
                        message: ' Identificador de tipo y número'
                    }
                }
            },
            pronombre: {
                message: ' Nombre no valido',
                validators: {
                    notEmpty: {
                        message: ' El nombre no es válido'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: ' La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            prodetalle: {
                message: ' Número no valido',
                validators: {
                    notEmpty: {
                        message: ' El detalle es obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]/,
                        message: ' Detalle no válido'
                    }
                }
            },
            proprecio: {
                message: ' Precio no valido',
                validators: {
                    notEmpty: {
                        message: ' El precio es obligatorio'
                    },
                    regexp: {
                        regexp: /^[0-9]/,
                        message: ' Precio no válido'
                    }
                }
            },
            prodescuento: {
                message: ' Descuento no valido',
                validators: {
                    notEmpty: {
                        message: ' El descuento es obligatorio'
                    },
                    regexp: {
                        regexp: /^[0-9]/,
                        message: ' Descuento no válido'
                    }
                }
            },
            procantstock: {
                message: ' Stock no valido',
                validators: {
                    notEmpty: {
                        message: ' La cantidad en stock es obligatoria'
                    },
                    regexp: {
                        regexp: /^[0-9]/,
                        message: ' Cantidad en stock no válida'
                    }
                }
            },
            provecescomprado: {
                message: ' Stock no valido',
                validators: {
                    notEmpty: {
                        message: ' Ingrese un valor por favor'
                    },
                    stringLength: {
                        min: 1,
                        message: ' Debe tener al menos un número'
                    }
                }
            }
        },
    });
});

/**
 * Verificaciones formularios cliente
 */
// Login
$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usnombre: {
                message: ' ID no valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es obligatorio'
                    },
                    regexp: {
                        regexp: /^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/,
                        message: 'Longitud mínima de 8 caracteres. Al menos una mayúscula. Al menos una minúscula. Al menos un número'
                    }
                }
            },
            uspass: {
                message: ' Contraseña no válida',
                validators: {
                    notEmpty: {
                        message: ' La contraseña es obligatoria'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]{8,}$/,
                        message: ' Longitud mínima de 8 caracteres. Al menos una mayúscula o minúscula y un número.\n'
                    },
                    different: {
                        field: 'usnombre',
                        message: ' La contraseña y el nombre de usuario no pueden ser iguales'
                    }
                }
            }
        },
    });
});

// Actualizar-modificar perfil
$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usnombre: {
                message: ' ID no valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es obligatorio'
                    },
                    regexp: {
                        regexp: /^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/,
                        message: 'Longitud mínima de 8 caracteres. Al menos una mayúscula. Al menos una minúscula. Al menos un número'
                    }
                }
            },
            uspass: {
                message: ' Contraseña no válida',
                validators: {
                    notEmpty: {
                        message: ' La contraseña es obligatoria'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]{8,}$/,
                        message: ' Longitud mínima de 8 caracteres. Al menos una mayúscula o minúscula y un número.\n'
                    },
                    different: {
                        field: 'usnombre',
                        message: ' La contraseña y el nombre de usuario no pueden ser iguales'
                    }
                }
            }
        },
    });
});