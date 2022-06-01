<?php
$titulo = 'Acerca';
include_once '../estructura/header.php';
?>

<div class="container">
    <h4 class="mt-3">Objetivo</h4>
    <p>El objetivo del trabajo es integrar los conceptos vistos en la materia. Se espera que el alumno implemente una tienda On-Line que tendrá 2 vistas: una vista “pública” y otra “privada”.</p>

    <p>Desde la <b>vista pública</b> se tiene acceso a la información de la tienda: dirección, medios de contacto, descripción y toda aquella información que crea importante desplegar. Además se podrá acceder a la vista privada de la aplicación, a partir del ingreso de un usuario y contraseña válida.</p>

    <p>Desde la <b>vista privada</b>, luego de concretar el proceso de autenticación y dependiendo los roles con el que cuenta el usuario que ingresa al sistema, se van a poder realizar diferentes operaciones.</p>

    <p>Los roles iniciales son: cliente, depósito y administrador.</p>


</div>


<?php
include_once '../estructura/footer.php';
?>