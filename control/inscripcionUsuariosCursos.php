<?php
include_once "../../configuracion.php";

$datos = data_submitted();

class InscripcionUsuariosCursos
{
    public function inscribirUsuario($datos)
    {
        $abmRegistrado = new AbmRegistrado();
        $abmUsuario = new AbmUsuario();
        $listaUsuarios = $abmUsuario->buscar(['dni' => $datos['dni']]);
        $idUsuario = $listaUsuarios[0]->getId();
        $abmCurso = new AbmCurso();

        $listaCursos = $abmCurso->buscar(['legajo' => $datos['cursoIndividual']]);
        $idCurso = $listaCursos[0]->getId();

        $datosCursoIndividual = ['idusuario' => $idUsuario, 'idcurso' => $idCurso];
        $listaCursos = $abmCurso->buscar(['legajo' => $datos['cursoGrupal']]);

        $idCurso = $listaCursos[0]->getId();
        $datosCursoGrupal = ['idusuario' => $idUsuario, 'idcurso' => $idCurso];

        $exitoIndividual = false;
        $exitoGrupal = false;
        $exitoIndividual = $abmRegistrado->alta($datosCursoIndividual);
        $exitoGrupal = $abmRegistrado->alta($datosCursoGrupal);

        return $exitoIndividual && $exitoGrupal;
    }
}
