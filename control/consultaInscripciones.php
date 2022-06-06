<?php
include_once '../configuracion.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$conexionBD = new mysqli('localhost', 'root', '', 'desafio_muni_nqn');

$sqlCursos = mysqli_query($conexionBD, "SELECT * FROM cursos");

if (mysqli_num_rows($sqlCursos) > 0) {
    $cursos = mysqli_fetch_all($sqlCursos, MYSQLI_ASSOC);
    $datos = [];
    // print_r($cursos);

    foreach ($cursos as $curso) {
        $idCurso = $curso['id'];

        $sqlCantHombres = mysqli_query($conexionBD, "SELECT COUNT(*) AS cantidad FROM registrados AS r INNER JOIN usuarios AS u ON u.id = r.idusuario WHERE r.idcurso = " . $idCurso . "  AND genero = 'MASCULINO'");
        $cantHombres = mysqli_fetch_all($sqlCantHombres, MYSQLI_ASSOC);
        $cantHombres = $cantHombres[0]['cantidad'];

        $sqlCantMujeres = mysqli_query($conexionBD, "SELECT COUNT(*) AS cantidad FROM registrados AS r INNER JOIN usuarios AS u ON u.id = r.idusuario WHERE r.idcurso = " . $idCurso . "  AND genero = 'FEMENINO'");
        $cantMujeres = mysqli_fetch_all($sqlCantMujeres, MYSQLI_ASSOC);
        $cantMujeres = $cantMujeres[0]['cantidad'];


        $sqlCantOtros = mysqli_query($conexionBD, "SELECT COUNT(*) AS cantidad FROM registrados AS r INNER JOIN usuarios AS u ON u.id = r.idusuario WHERE r.idcurso = " . $idCurso . "  AND genero = 'OTROS'");
        $cantOtros = mysqli_fetch_all($sqlCantOtros, MYSQLI_ASSOC);
        $cantOtros = $cantOtros[0]['cantidad'];

        $sqlCantMenores = mysqli_query($conexionBD, "SELECT COUNT(*) AS cantidad FROM registrados AS r INNER JOIN usuarios AS u ON u.id = r.idusuario WHERE r.idcurso = " . $idCurso . "  AND u.edad < 18");
        $cantMenores = mysqli_fetch_all($sqlCantMenores, MYSQLI_ASSOC);
        $sqlCantMayores = mysqli_query($conexionBD, "SELECT COUNT(*) AS cantidad FROM registrados AS r INNER JOIN usuarios AS u ON u.id = r.idusuario WHERE r.idcurso = " . $idCurso . "  AND u.edad >= 18");
        $cantMayores = mysqli_fetch_all($sqlCantMayores, MYSQLI_ASSOC);

        $fila = [
            'nombreCurso' => $curso['nombre'],
            'cantHombres' => $cantHombres,
            'cantMujeres' => $cantMujeres,
            'cantOtros' => $cantOtros,
            'total' => $cantOtros + $cantMujeres + $cantHombres,
            'cantMenores' => $cantMenores[0]['cantidad'],
            'cantMayores' => $cantMayores[0]['cantidad'],
        ];

        array_push($datos, $fila);
    }
    echo json_encode($datos);
    exit();
}
