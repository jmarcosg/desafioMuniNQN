<?php
include_once '../../configuracion.php';

$titulo = 'Nuevo Curso';

$datos = data_submitted();

include_once '../estructura/header.php';

?>
<header class="bg-dark py-1">
    <div class="container px-4 px-lg-5 my-2">
        <div class="text-center text-white">
            <h4>Cargar nuevo curso</h4>
        </div>
    </div>
</header>

<div class="container mt-3">
    <div class="offset-md-4">
        <form action="../acciones/accionNuevoCurso.php" method="post" class="col-md-6 mt-3 " id="cursoNuevo" name="cursoNuevo">
            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="legajo" name="legajo" type="text" placeholder="Legajo" required>
                    <label for="legajo">Legajo</label>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                    <label for="nombre">Nombre</label>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="descripcion" name="descripcion" type="text" placeholder="Descripcion" required>
                    <label for="descripcion">Descripcion</label>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <select class="form-select" name="modalidad" id="modalidad" required>
                        <option value="" selected disabled>Seleccione la modalidad</option>
                        <option value="Grupal">Grupal</option>
                        <option value="Individual">Individual</option>
                    </select>
                    <label for="modalidad">Modalidad</label>
                </div>
            </div>

            <div class="mt-3 mb-3">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Cargar</button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>

<?php

include_once '../estructura/footer.php';

?>