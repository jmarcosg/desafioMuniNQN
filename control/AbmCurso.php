<?php
class AbmCurso
{
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['id'])) {
                $where .= " and id ='" . $param['id'] . "'";
            }

            if (isset($param['nombre'])) {
                $where .= " and nombre ='" . $param['nombre'] . "'";
            }

            if (isset($param['descripcion'])) {
                $where .= " and descripcion ='" . $param['descripcion'] . "'";
            }

            if (isset($param['modalidad'])) {
                $where .= " and modalidad ='" . $param['modalidad'] . "'";
            }
        }
        $arreglo = Curso::seleccionar($where);
        return $arreglo;
    }

    private function cargarObjeto($param)
    {
        $objCurso = null;
        if (array_key_exists('nombre', $param) && array_key_exists('descripcion', $param) && array_key_exists('modalidad', $param)) {
            $objCurso = new Curso();
            $objCurso->setear(
                '',
                $param['nombre'],
                $param['descripcion'],
                $param['modalidad'],
                ''
            );
        }
        return $objCurso;
    }

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['id'])) {
            $resp = true;
        }
        return $resp;
    }

    private function cargarObjetoConClave($param)
    {
        $objCurso = null;

        if (isset($param['id'])) {
            $objCurso = new Curso();
            $objCurso->setear($param['id'], null, null, null, null);
        }
        return $objCurso;
    }

    public function modificacion($param)
    {
        $resp = false;
        $lista = $this->buscar(['id' => $param['id']]);
        if ($lista != null) {
            $objCurso = new Curso();
            $objCurso->setear($param['id'], $param['nombre'], $param['descripcion'], $param['modalidad'], $param['cursodeshabilitado']);

            if ($objCurso->modificar()) {
                $resp = true;
            }
        }

        return $resp;
    }


    public function baja($param)
    {
        $resp = false;

        if ($this->seteadosCamposClaves($param)) {
            $objCurso = $this->cargarObjetoConClave($param);
            if ($objCurso != null and $objCurso->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    public function alta($param)
    {
        $resp = false;
        $busquedaCurso = ["nombre" => $param['nombre'], "modalidad" => $param['modalidad']];
        $existeCurso = $this->buscar($busquedaCurso);

        if ($existeCurso == null) {
            $objCurso = $this->cargarObjeto($param);
            if ($objCurso->insertar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    //Hace un borrado logico del curso. 
    //En caso de que ya estuviese deshabilitado, lo vuelve a habilitar.
    public function deshabilitarCurso($param)
    {
        $resp = false;
        $objCurso = $this->cargarObjetoConClave($param);
        $listadoCursos = $objCurso->seleccionar("id=" . $param['id']);
        if (count($listadoCursos) > 0) {
            $estadoCurso = $listadoCursos[0]->getCursoDeshabilitado();
            if ($estadoCurso == '0000-00-00 00:00:00') {
                if ($objCurso->estado(date("Y-m-d H:i:s"))) {
                    $resp = true;
                }
            } else {
                if ($objCurso->estado()) {
                    $resp = true;
                }
            }
        }
        return $resp;
    }
}
