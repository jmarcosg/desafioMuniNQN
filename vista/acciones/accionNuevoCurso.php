<?php
include_once "../../configuracion.php";

$datos = data_submitted();

$datos['cursodeshabilitado'] = strtotime("0000-00-00 00:00:00");

$abmCurso = new AbmCurso();

$exito = false;
$exito = $abmCurso->alta($datos);

if ($exito) {
    $message = 'Se cargo correctamente el curso';
    // header("Location: ../home/index.php?Message=" . urlencode($message));
    // exit;
} else {
    $message = 'Hubo un error al registrar el curso';
    // header("Location: ../admin/nuevoCurso.php?Message=" . urlencode($message));
    // exit;
}
