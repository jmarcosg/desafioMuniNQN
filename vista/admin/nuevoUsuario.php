<?php
include_once '../../configuracion.php';

$titulo = 'Nuevo Usuario';

$datos = data_submitted();

include_once '../estructura/header.php';

?>
<header class="bg-dark py-1">
    <div class="container px-4 px-lg-5 my-2">
        <div class="text-center text-white">
            <h4>Cargar nuevo usuario</h4>
        </div>
    </div>
</header>

<div class="container mt-3">
    <div class="offset-md-4">
        <form action="../acciones/accionNuevoUsuario.php" method="post" class="col-md-6 mt-3 " id="usuarioNuevo" name="usuarioNuevo">
            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                    <label for="nombre">Nombre</label>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido" required>
                    <label for="apellido">Apellido</label>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="dni" name="dni" type="number" placeholder="DNI" required>
                    <label for="dni">DNI</label>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <select class="form-select" name="genero" id="genero">
                        <option value="" selected disabled>Seleccione su género</option>
                        <option value="MASCULINO">Masculino</option>
                        <option value="FEMENINO">Femenino</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>
            </div>

            <div class="">
                <div class="form-floating mt-3">
                    <input class="form-control" id="fechaNacimiento" name="fechaNacimiento" type="date" placeholder="dd/mm/aaaa" required>
                    <label for="fechaNacimiento">Fecha de Nacimiento</label>
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