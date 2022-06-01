<?php

$titulo = 'Secretaria de Modernización';

include_once '../estructura/header.php';
?>

<div class="container">
    <div class="card bg-dark text-white rounded-4 mt-3 mb-3">
        <div class="card-body p-4">
            <figure class="mb-0">
                <ul class="list-unstyled">
                    <li><strong>Desafio Propuesto</strong></li>
                    <li>Se debe realizar una petición a un Endpoint el cual le otorgará información sobre 100 personas en una DB.</li>
                    <li>Una vez obtenidos los datos, se necesita que realice las siguientes tareas:</li>
                    <ul>
                        <li>Crear un CRUD o ABM web que permita inscribir personas a cursos de capacitación, con las siguientes restricciones y requerimientos:</li>
                        <ul>
                            <li>Para las personas se pide registrar su nombre, apellido, DNI, género y edad. No puede haber personas duplicadas en el sistema (insertar los datos consumidos desde la api).</li>
                            <li>De los cursos se sabe que poseen un legajo, un nombre que le permite a un usuario poder reconocerlo, una descripción que permite conocer el detalle del mismo y su modalidad, la cual puede ser grupal o individual.</li>
                            <li>Un curso no puede contener 2 modalidades diferentes, es decir, es grupal o es individual. Tampoco puede haber cursos duplicados.</li>
                            <li>Una persona se puede inscribir a 1 solo curso por modalidad.</li>
                        </ul>
                    </ul>
                    <li>Emitir un reporte por pantalla de personas por curso.</li>
                    <ul>
                        <li>Listar por separado los cursos individuales y grupales, mostrar los nombres en orden de la lista creada, a un costado de la misma, solo que el nombre que se muestra debe estar en grande, cambiar cada 10-15 segundos (si es posible animar tanto cuando desaparece el nombre como cuando aparece el próximo) y debe corresponder con el nombre en la lista.</li>
                        <li>Obtener cantidad de mujeres y hombres.</li>
                        <li>Obtener cantidad de menores y mayores de edad.</li>
                    </ul>
                </ul>
            </figure>
        </div>
    </div>
</div>
<!-- Section-->
<section class="py-2">
    <div class="container px-4 px-lg-5 mt-5">
        <div id="botonPoblado" class="text-center">
            <button id="poblarListado" type="button" class="btn btn-danger">Poblar listado usuarios desde API</button>
        </div>
    </div>
</section>



<?php

include_once '../estructura/footer.php';

?>