<?php
include_once '../../configuracion.php';

$datos = data_submitted();

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
                <table class="table align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class='text-center'>Razon Social</th>
                            <th scope="col" class='text-center'>DNI</th>
                            <th scope='col' class='text-center'>Genero</th>
                            <th scope="col" class='text-center'>Edad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listadoUsuarios as $usuario) {
                        ?>
                            <tr>
                                <td scope="row" class="text-center"><?php echo $usuario->getRazonSocial() ?></td>
                                <td scope="row" class="text-center"><?php echo $usuario->getDni() ?></td>
                                <td scope="row" class="text-center"><?php echo $usuario->getGenero() ?></td>
                                <td scope="row" class="text-center"><?php echo $usuario->getEdad() ?></td>
                            <?php
                        }
                            ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- <section class="py-2">
    </section> -->
</div>

<?php

include_once '../estructura/footer.php';

?>