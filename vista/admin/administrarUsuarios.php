<?php
include_once '../../configuracion.php';

$titulo = 'Administración de Usuarios';

$abmUsuario = new AbmUsuario();
$listadoUsuarios = $abmUsuario->buscar(null);

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
                            <th class="bg-secondary">Razón Social</th>
                            <th class="bg-secondary">DNI</th>
                            <th class="bg-secondary">Género</th>
                            <th class="bg-secondary">Edad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listadoUsuarios as $usuario) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $usuario->getRazonSocial() ?></td>
                                <td class="text-center"><?php echo $usuario->getDni() ?></td>
                                <td class="text-center"><?php echo $usuario->getGenero() ?></td>
                                <td class="text-center"><?php echo $usuario->getEdad() ?></td>
                            </tr>
                        <?php
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