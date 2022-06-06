<?php
class Registrado
{
    private $id;
    private $objUsuario;
    private $objCurso;
    private $mensajeoperacion;


    // Constructor
    public function __construct()
    {
        $this->objUsuario = new Usuario();
        $this->objCurso = new Curso();
        $this->mensajeoperacion = "";
    }

    // Getters
    public function getObjUsuario()
    {
        return $this->objUsuario;
    }

    public function getObjCurso()
    {
        return $this->objCurso;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeoperacion;
    }

    // Setters
    public function setObjUsuario($objUsuario)
    {
        $this->objUsuario = $objUsuario;
    }

    public function setObjCurso($objCurso)
    {
        $this->objCurso = $objCurso;
    }

    public function setMensajeOperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    // Metodos
    public function setear($objUsuario, $objCurso)
    {
        $abmUsuario = new AbmUsuario();
        $listaUsuarios = $abmUsuario->buscar(['id' => $objUsuario->getId()]);
        $abmCurso = new AbmCurso();
        $listaCursos = $abmCurso->buscar(['id' => $objCurso->getId()]);

        $this->setObjUsuario($listaUsuarios[0]);
        $this->setObjCurso($listaCursos[0]);
    }

    /** CARGAR **/
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM registrados WHERE idusuario = " . $this->getObjUsuario()->getId() . "and idcurso =" . $this->getObjCurso()->getId();

        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $objUsuario = NULL;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setId($row['idusuario']);
                        $objUsuario->cargar();
                    }
                    $objCurso = NULL;
                    if ($row['idcurso'] != null) {
                        $objCurso = new Curso();
                        $objCurso->setId($row['idcurso']);
                        $objCurso->cargar();
                    }
                    $this->setear($row['idusuario'], $row['idcurso']);
                }
            }
        } else {
            $this->setmensajeoperacion("registrados->listar: " . $base->getError());
        }

        return $resp;
    }


    /** INSERTAR **/
    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO registrados (idusuario, idcurso)  VALUES (" . $this->getObjUsuario()->getId() . ", " . $this->getObjCurso()->getId() . ")";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("registrados->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("registrados->insertar: " . $base->getError());
        }

        return $resp;
    }


    /** ELIMINAR **/
    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM registrados WHERE idusuario = " . $this->getObjUsuario()->getId() . "and idcurso =" . $this->getObjCurso()->getId();

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("registrados->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("registrados->eliminar: " . $base->getError());
        }

        return $resp;
    }


    /** LISTAR **/
    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $consultasql = "SELECT * FROM registrados ";

        if ($parametro != "") {
            $consultasql .= 'WHERE ' . $parametro;
        }

        if (strlen($parametro) > 50) {
            $consultasql = $parametro;
        }

        $res = $base->Ejecutar($consultasql);

        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $objUsuario = NULL;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setId($row['idusuario']);
                        $objUsuario->cargar();
                    }
                    $objCurso = NULL;
                    if ($row['idcurso'] != null) {
                        $objCurso = new Curso();
                        $objCurso->setId($row['idcurso']);
                        $objCurso->cargar();
                    }
                    $obj = new Registrado();
                    $obj->setear($objUsuario, $objCurso);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("Auto->listar: " . $base->getError());
        }

        return $arreglo;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $idUsuario = $this->getObjUsuario()->getId();
        $idCurso = $this->getObjCurso()->getId();
        $sql = " UPDATE registrados SET ";
        $sql .= " idcurso = " . $idCurso;
        $sql .= " WHERE idusuario =" . $idUsuario;

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("registrados->modificar 1: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("registrados->modificar 2: " . $base->getError());
        }

        return $resp;
    }
}
