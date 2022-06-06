<?php
class AbmRegistrado
{

    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idusuario', $param) and array_key_exists('idcurso', $param)) {
            $objusuario = new Usuario();
            $objusuario->setId($param['idusuario']);
            $objusuario->cargar();

            $objcurso = new Curso();
            $objcurso->setId($param['idcurso']);
            $objcurso->cargar();

            $obj = new Registrado();
            $obj->setear($objusuario, $objcurso);
        }

        return $obj;
    }


    //Definir como se va a cargar el objeto y asignar las claves de lo que hace falta
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param[''])) {
            $obj = new Registrado();
            $obj->setear($param[''], null, null,);
        }
        return $obj;
    }


    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idusuario']) && isset($param['idcurso']))
            $resp = true;
        return $resp;
    }


    /**
     * Carga un objeto con los datos pasados por parámetro y lo 
     * Inserta en la base de datos
     * @param array $param= idusuario/idrol
     * @return boolean
     */
    public function alta($param)
    {
        $resp = false;
        //Creo objeto con los datos
        $obj = $this->cargarObjeto($param);
        //Verifico que el objeto no sea nulo y lo inserto en BD 
        if ($obj != null and $obj->insertar()) {
            $resp = true;
        }
        return $resp;
    }


    /**
     * Por lo general no se usa ya que se utiliza borrado lógico (es decir pasar de activo a inactivo)
     * Permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objRegistrado = $this->cargarObjetoConClave($param);
            if ($objRegistrado != null and $objRegistrado->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function modificacion($param)
    {
        $resp = false;
        $objRegistrado = new Registrado();
        $abmCurso = new AbmCurso();
        $listaCurso = $abmCurso->buscar(['id' => $param['idcurso']]);
        $abmUsuario = new AbmUsuario();
        $listaUsuario = $abmUsuario->buscar(['id' => $param['idusuario']]);
        $objRegistrado->setear($listaUsuario[0], $listaCurso[0]);
        if ($objRegistrado->modificar()) {
            $resp = true;
        }
        return $resp;
    }


    /**
     * Puede traer un obj específico o toda la lista si el parámetro es null
     * Permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idusuario']))
                $where .= " and idusuario =" . $param['idusuario'];
            if (isset($param['idcurso']))
                $where .= " and idcurso =" . $param['idcurso'];
            if (isset($param['contar'])) {
                $where = "";
                $where = "SELECT COUNT(*) AS cantidad FROM registrados AS r INNER JOIN usuarios AS u ON u.id = r.idusuario WHERE r.idcurso = " . $param['id'] . "  AND genero = '" . $param['contar'] . "' GROUP BY r.idusuario, r.idcurso";
            }
        }
        $arreglo = Registrado::listar($where);

        return $arreglo;
    }


    /** 
     * Busca todos los registrados correspondientes a un objusuario
     * Lista todos los cursos que tiene el usuario
     * @param object
     * @return array devuelve las descripciones de cada curso de dicho usuario
     */
    public function buscarRegistrado($objUsuario)
    {
        $listaRegistrado = [];
        //Listo todos los obj registros
        $listaRegistrado = $this->buscar(null);

        if ($listaRegistrado != "") {
            $cursos = [];
            foreach ($listaRegistrado as $registrado) {
                if ($registrado->getObjRegistrado()->getId() == $objUsuario->getId()) {
                    $cursoid = $registrado->getObjCurso()->getId();
                    array_push($cursos, $cursoid);
                }
            }
        }
        return $cursos;
    }
}
