<?php
include_once "../../configuracion.php";

$datos = data_submitted();

if (!array_key_exists("razonsocial", $datos)) {
    $datos['razonsocial'] = strtoupper($datos['apellido'] . ", " . $datos['nombre']); // Concateno y llevo el string a mayusculas
}

$fechaNacimiento = $datos['fechaNacimiento'];
$hoy = date("Y-m-d");
$diff = date_diff(date_create($fechaNacimiento), date_create($hoy));
$datos['edad'] = $diff->format('%y');

$abmUsuario = new AbmUsuario();

$exito = false;
$exito = $abmUsuario->alta($datos);

if ($exito) {
    $message = 'Se cargo correctamente el usuario';
    header("Location: ../admin/administrarUsuarios.php?Message=" . urlencode($message));
    exit;
} else {
    $message = 'Hubo un error al registrar el usuario';
    header("Location: ../admin/nuevoUsuario.php?Message=" . urlencode($message));
    exit;
}
