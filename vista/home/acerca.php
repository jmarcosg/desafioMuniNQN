<?php
$titulo = 'Acerca';
include_once '../estructura/header.php';

$abmCurso = new AbmCurso();
$listaCursos = $abmCurso->buscar(null);

$abmUsuario = new AbmUsuario();
$listaUsuarios = $abmUsuario->buscar(null);

$abmRegistrado = new AbmRegistrado();
$listadoRegistrados = $abmRegistrado->buscar(null);

?>

<div class="container">
    <table id="listadoUsuariosInscriptos" class="table table-light table-hover" style="width:100%">
        <thead>
            <th>Curso</th>
            <th>Total Hombres</th>
            <th>Total Mujeres</th>
            <th>Total Otros</th>
            <th>Total Registrados</th>
            <th>Total Menores Edad</th>
            <th>Total Mayores Edad</th>
            <th></th>
        </thead>
        <tbody id="estadisticas">
            <form method='get' action='../admin/verInformacionCurso.php'>
                <?php
                    $totalHombres = 0;
                    $totalMujeres = 0;
                    $totalOtros = 0;
                    $totalGeneral = 0;
                    $totalMenores = 0;
                    $totalMayores = 0;


                    foreach($listadoRegistrados as $registrado) {
                        $curso = $registrado->getObjCurso();
                        $usuario = $registrado->getObjUsuario();

                        if ($usuario->getGenero() == "MASCULINO") {
                            $totalHombres++;
                        } else if ($usuario->getGenero() == "FEMENINO") {
                            $totalMujeres++;
                        } else {
                            $totalOtros++;
                        }

                        $totalGeneral = $totalHombres + $totalMujeres + $totalOtros;

                        if ($usuario->getEdad() < 18) {
                            $totalMenores++;
                        } else {
                            $totalMayores++;
                        }
                    ?>
                    <tr>
                        <td><?php echo $curso->getNombre() ?></td>
                        <td><?php echo $totalHombres ?></td>
                        <td><?php echo $totalMujeres ?></td>
                        <td><?php echo $totalOtros ?></td>
                        <td><?php echo $totalGeneral ?></td>
                        <td><?php echo $totalMenores ?></td>
                        <td><?php echo $totalMayores ?></td>
                        <td class='text-center'>
                            <input name='idcurso' id='idcurso' type='hidden' value='<?php echo $curso->getId() ?>'>
                            <button class='btn btn-warning btn-sm' type='submit' value='' role='button'><i class='bi bi-clipboard'></i>&nbsp;Ver Detalles</button>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
            </form>
        </tbody>

    </table>
</div>

<?php
include_once '../estructura/footer.php';
?>