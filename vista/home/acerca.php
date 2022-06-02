<?php
$titulo = 'Acerca';
include_once '../estructura/header.php';

$abmCurso = new AbmCurso();
$listaCursos = $abmCurso->buscar(null);

$abmUsuario = new AbmUsuario();

$abmRegistrado = new AbmRegistrado();

?>

<div class="container">
    <table id="listadoUsuarios" class="table table-light table-hover" style="width:100%">
        <thead>
            <th>Curso</th>
            <th>Total Hombres</th>
            <th>Total Mujeres</th>
            <th>Total Otros</th>
            <th>Total Registrados</th>
            <th>Total Menores Edad</th>
            <th>Total Mayores Edad</th>
        </thead>
        <tbody id="estadisticas">
        </tbody>

    </table>
</div>

<?php
include_once '../estructura/footer.php';
?>