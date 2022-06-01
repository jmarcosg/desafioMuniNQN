<?php
class AbmUsuario
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

            if (isset($param['dni'])) {
                $where .= " and dni ='" . $param['dni'] . "'";
            }

            if (isset($param['razonsocial'])) {
                $where .= " and razonsocial ='" . $param['razonsocial'] . "'";
            }

            if (isset($param['genero'])) {
                $where .= " and genero ='" . $param['genero'] . "'";
            }

            if (isset($param['edad'])) {
                $where .= " and edad ='" . $param['edad'] . "'";
            }
        }
        $arreglo = Usuario::seleccionar($where);
        return $arreglo;
    }

    private function cargarObjeto($param)
    {
        $objUsuario = null;
        if (array_key_exists('dni', $param) && array_key_exists('razonsocial', $param) && array_key_exists('genero', $param) && array_key_exists('edad', $param)) {
            $objUsuario = new Usuario();
            $objUsuario->setear(
                '',
                $param['dni'],
                $param['razonsocial'],
                $param['genero'],
                $param['edad']
            );
        }
        return $objUsuario;
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
        $objUsuario = null;

        if (isset($param['id'])) {
            $objUsuario = new Usuario();
            $objUsuario->setear($param['id'], null, null, null, null);
        }
        return $objUsuario;
    }

    public function modificacion($param)
    {
        $resp = false;
        $lista = $this->buscar(['id' => $param['id']]);
        if ($lista != null) {
            $objUsuario = new Usuario();
            $objUsuario->setear($param['id'], $param['dni'], $param['razonsocial'], $param['genero'], $param['edad']);

            if ($objUsuario->modificar()) {
                $resp = true;
            }
        }

        return $resp;
    }


    public function baja($param)
    {
        $resp = false;

        if ($this->seteadosCamposClaves($param)) {
            $objUsuario = $this->cargarObjetoConClave($param);
            if ($objUsuario != null and $objUsuario->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    public function alta($param)
    {
        print_r($param);
        $resp = false;
        $busquedaUsuario = ["dni" => $param['dni']];
        $existeUsuario = $this->buscar($busquedaUsuario);

        if ($existeUsuario == null) {
            $objUsuario = $this->cargarObjeto($param);
            if ($objUsuario->insertar()) {
                $resp = true;
            }
        }

        return $resp;
    }
}
