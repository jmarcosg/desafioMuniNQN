<?php
include_once "../../configuracion.php";

$datos = data_submitted();

// print_r($datos);

$abmCurso = new AbmCurso();

$exito = false;
$exito = $abmCurso->alta($datos);

if ($exito) {
    $message = 'Se cargo correctamente el curso';
    header("Location: ../home/index.php?Message=" . urlencode($message));
    exit;
} else {
    $message = 'Hubo un error al registrar el curso';
    header("Location: ../admin/nuevoCurso.php?Message=" . urlencode($message));
    exit;
}
