<?php
include_once "../../configuracion.php";

$datos = data_submitted();

$controlInscripcion = new InscripcionUsuariosCursos();
$exito = $controlInscripcion->inscribirUsuario($datos);


if ($exito) {
    $message = 'Se inscribio correctamente al usuario';
    header("Location: ../home/acerca.php?Message=" . urlencode($message));
    exit;
} else {
    $message = 'Hubo un error al inscribir al usuario';
    header("Location: ../admin/administrarUsuarios.php?Message=" . urlencode($message));
    exit;
}
