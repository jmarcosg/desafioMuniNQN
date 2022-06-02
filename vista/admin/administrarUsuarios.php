<?php
include_once '../../configuracion.php';

$titulo = 'Administración de Usuarios';

$abmUsuario = new AbmUsuario();
$listadoUsuarios = $abmUsuario->buscar(['filtro' => 1]);
$abmCurso = new AbmCurso();
$listadoCursos = $abmCurso->buscar(null);
$abmRegistrado = new AbmRegistrado();
$listaRegistrados = $abmRegistrado->buscar(null);


include_once '../estructura/header.php';
?>

<header class="bg-dark py-1">
    <div class="container px-4 px-lg-5 my-2">
        <div class="text-center text-white">
            <h4>Listado Usuarios</h4>
        </div>
    </div>
</header>
<div class="container mt-2">
    <section class="py-2">
        <div class="">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <table id="listadoUsuarios" class="table table-light table-hover" style="width:100%">
                    <thead>
                        <tr class="text-light">
                            <th class="bg-secondary text-center">Razón Social</th>
                            <th class="bg-secondary text-center">DNI</th>
                            <th class="bg-secondary text-center">Género</th>
                            <th class="bg-secondary text-center">Edad</th>
                            <th class="bg-secondary text-center">Curso Grupal</th>
                            <th class="bg-secondary text-center">Curso Individual</th>
                            <th class="bg-secondary text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($listadoUsuarios as $usuario) {
                            // if ($usuario->getId() != $listaRegistrados[$i]->getIdUsuario()) {
                        ?>
                            <tr>
                                <form method='post' action='../acciones/accionInscribirUsuario.php'>
                                    <td class="text-center"><?php echo $usuario->getRazonSocial() ?></td>
                                    <td class="text-center"><?php echo $usuario->getDni() ?></td>
                                    <td class="text-center"><?php echo $usuario->getGenero() ?></td>
                                    <td class="text-center"><?php echo $usuario->getEdad() ?></td>
                                    <td class="text-center">
                                        <select class="form-select" name="cursoGrupal" id="cursoGrupal" required>
                                            <option value="" selected disabled>Seleccione un curso</option>
                                            <?php
                                            foreach ($listadoCursos as $curso) {
                                                if ($curso->getModalidad() == "Grupal") {
                                            ?>
                                                    <option value='<?php echo $curso->getLegajo() ?>'><?php echo $curso->getNombre() ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="form-select" name="cursoIndividual" id="cursoIndividual" required>
                                            <option value="" selected disabled>Seleccione un curso</option>
                                            <?php
                                            foreach ($listadoCursos as $curso) {
                                                if ($curso->getModalidad() == "Individual") {
                                            ?>
                                                    <option value='<?php echo $curso->getLegajo() ?>'><?php echo $curso->getNombre() ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    <td class='text-center'>
                                        <input name='dni' id='dni' type='hidden' value='<?php echo $usuario->getDni() ?>'>
                                        <button class='btn btn-warning btn-sm' type='submit' value='' role='button'><i class='bi bi-clipboard'></i>&nbsp;Inscribir</button>
                                    </td>
                                </form>
                            </tr>
                        <?php
                            // }
                            // $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php

include_once '../estructura/footer.php';

?>