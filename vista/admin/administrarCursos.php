<?php
include_once '../../configuracion.php';

$titulo = 'Administración de Cursos';

$abmCurso = new AbmCurso();
$listadoCursos = $abmCurso->buscar(null);
shuffle($listadoCursos);

include_once '../estructura/header.php';
?>

<header class="bg-dark py-1">
    <div class="container px-4 px-lg-5 my-2">
        <div class="text-center text-white">
            <h4>Listado Cursos</h4>
        </div>
    </div>
</header>
<div class="container mt-2">
    <section class="py-2">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            if (count($listadoCursos) > 0) {
                foreach ($listadoCursos as $curso) {
                    $deshabilitado = $curso->getCursoDeshabilitado();

                    if ($deshabilitado == "0000-00-00 00:00:00") { ?>
                        <div class='col mb-5'>
                            <div class='card shadow h-100'>
                                <?php
                                if ($curso->getModalidad() == "Grupal") {
                                ?>
                                    <div class='badge rounded-pill bg-danger position-absolute' style='top: 0.5rem; left: 0.5rem'><i class="fas fa-users"></i>&nbsp;<?php echo $curso->getModalidad() ?></span></div>
                                <?php
                                } else {
                                ?>
                                    <div class='badge rounded-pill bg-danger position-absolute' style='top: 0.5rem; left: 0.5rem'><i class="fas fa-user-alt"></i>&nbsp;<?php echo $curso->getModalidad() ?></span></div>
                                <?php
                                }
                                ?>
                                <img class="card-img-top" src="https://dash-bootstrap-components.opensource.faculty.ai/static/images/placeholder286x180.png" alt="Imagen previsoria de curso" />

                                <div class='card-body p-4'>
                                    <div class='text-center'>
                                        <h5 class='fw-bolder'><?php echo $curso->getNombre() ?></h5>
                                        <p><?php echo $curso->getDescripcion() ?></p>
                                    </div>
                                </div>
                                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                    <div class='text-center'>
                                        <form method='post' action=''>
                                            <td class='text-center'>
                                                <input name='legajoCurso' id='legajoCurso' type='hidden' value='<?php echo $curso->getId() ?>'>
                                                <button class='btn btn-outline-dark mt-auto' type='submit' role='button'>Ver más</button>
                                            </td>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } ?>
        </div>
    </section>
</div>

<?php

include_once '../estructura/footer.php';

?>