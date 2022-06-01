<?php

include_once '../configuracion.php';

$AbmUsuario = new AbmUsuario;

$usuarios = $AbmUsuario->buscar(null);
echo json_encode($usuarios);
exit();
