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
            if (isset($param['idusuario'])) {
                $where .= " and idusuario ='" . $param['idusuario'] . "'";
            }

            if (isset($param['usnombre'])) {
                $where .= " and usnombre ='" . $param['usnombre'] . "'";
            }

            if (isset($param['uspass'])) {
                $where .= " and uspass ='" . $param['uspass'] . "'";
            }

            if (isset($param['usmail'])) {
                $where .= " and usmail ='" . $param['usmail'] . "'";
            }
            if (isset($param['usdeshabilitado'])) {
                $where .= " and usdeshabilitado ='" . $param['usdeshabilitado'] . "'";
            }
        }
        $arreglo = Usuario::seleccionar($where);
        return $arreglo;
    }

    private function cargarObjeto($param)
    {
        $objUs = null;
        if (array_key_exists('usnombre', $param) && array_key_exists('usmail', $param) && array_key_exists('uspass', $param)) {
            $objUs = new Usuario();
            $pass = md5($param['uspass']);
            $objUs->setear(
                '',
                $param['usnombre'],
                $pass,
                $param['usmail'],
                ''
            );
        }
        return $objUs;
    }

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idusuario'])) {
            $resp = true;
        }
        return $resp;
    }

    private function cargarObjetoConClave($param)
    {
        $objUs = null;

        if (isset($param['idusuario'])) {
            $objUs = new Usuario();
            $objUs->setear($param['idusuario'], null, null, null, null);
        }
        return $objUs;
    }

    public function modificacion($param)
    {
        $resp = false;
        $lista = $this->buscar(['idusuario' => $param['idusuario']]);
        if ($lista != null) {
            $objUs = new Usuario();
            $pass = md5($param['uspass']);
            $objUs->setear($param['idusuario'], $param['usnombre'], $pass, $param['usmail'], $param['usdeshabilitado']);

            if ($objUs->modificar()) {
                $resp = true;
            }
        }

        return $resp;
    }


    public function baja($param)
    {
        $resp = false;
        $usuarioActual = false;
        if ($param['idusuario'] == $param['idusuariosesion']) {
            $usuarioActual = true;
        }
        if (!$usuarioActual) {
            if ($this->seteadosCamposClaves($param)) {
                $objUsuario = $this->cargarObjetoConClave($param);
                if ($objUsuario != null and $objUsuario->eliminar()) {
                    $resp = true;
                }
            }
        }
        return $resp;
    }

    public function alta($param)
    {
        $resp = false;
        $busquedaUsuario = ["usnombre" => $param['usnombre']];
        $busquedaCorreo = ["usmail" => $param['usmail']];
        $existeUsuario = $this->buscar($busquedaUsuario);
        $existeCorreo = $this->buscar($busquedaCorreo);
        if (($existeUsuario == null && $existeCorreo == null)) {
            $objUsuario = $this->cargarObjeto($param);
            if ($objUsuario->insertar()) {
                $resp = true;
            }
        }
        if ($resp) {
            $usuarioNuevo = $this->buscar($busquedaUsuario);
            $idUsuario = $usuarioNuevo[0]->getIdUsuario();
            $idRolUsuario = $param['idrol'];

            $arrayRolUsuario = ["idrol" => $idRolUsuario, "idusuario" => $idUsuario];

            $abmUsuarioRol = new AbmUsuarioRol();
            $abmUsuarioRol->alta($arrayRolUsuario);
        }
        return $resp;
    }

    //Hace un borrado logico del usuario. 
    //En caso de que ya estuviese deshabilitado, lo vuelve a habilitar.
    public function deshabilitarUsuario($param)
    {
        $resp = false;
        $objUsuario = $this->cargarObjetoConClave($param);
        $listadoProductos = $objUsuario->seleccionar("idusuario=" . $param['idusuario']);
        if (count($listadoProductos) > 0) {
            $estadoUsuario = $listadoProductos[0]->getUsDeshabilitado();
            if ($estadoUsuario == '0000-00-00 00:00:00') {
                if ($objUsuario->estado(date("Y-m-d H:i:s"))) {
                    $resp = true;
                }
            } else {
                if ($objUsuario->estado()) {
                    $resp = true;
                }
            }
        }
        return $resp;
    }
}
