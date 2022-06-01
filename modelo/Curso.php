<?php
class Curso
{
    private $id;
    private $nombre;
    private $descripcion;
    private $modalidad;
    private $cursoDeshabilitado;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->id = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->modalidad = "";
        $this->cursoDeshabilitado = "";
        $this->mensajeOperacion = "";
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getModalidad()
    {
        return $this->modalidad;
    }

    public function getCursoDeshabilitado()
    {
        return $this->cursoDeshabilitado;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;
        return $this;
    }

    public function setCursoDeshabilitado($cursoDeshabilitado)
    {
        $this->cursoDeshabilitado = $cursoDeshabilitado;
        return $this;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function setear($id, $nombre, $descripcion, $modalidad, $cursoDeshabilitado)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setModalidad($modalidad);
        $this->setCursoDeshabilitado($cursoDeshabilitado);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM cursos WHERE id=" . $this->getId();

        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['nombre'], $row['descripcion'], $row['modalidad'], $row['cursodeshabilitado']);
                }
            }
        } else {
            $this->setMensajeOperacion("cursos->cargar: " . $base->getError());
        }

        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO cursos (nombre, descripcion, modalidad, cursodeshabilitado) VALUES ('" . $this->getNombre() . "','" . $this->getDescripcion() . "','" . $this->getModalidad() . "','0000-00-00 00:00:00');";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion("cursos->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("cursos->insertar: " . $base->getError());
        }

        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE cursos SET nombre= '" . $this->getNombre() . "', descripcion= '" . $this->getDescripcion() . "', modalidad= '" . $this->getModalidad() . ", cursodeshabilitado='0000-00-00 00:00:00' WHERE id='" . $this->getId();

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("cursos->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("cursos->modificar: " . $base->getError());
        }

        return $resp;
    }

    public function estado($param = "")
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE cursos SET cursodeshabilitado='" . $param . "' WHERE id=" . $this->getId();

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("cursos->estado: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("cursos->estado: " . $base->getError());
        }

        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM cursos WHERE id=" . $this->getId();

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("cursos->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("cursos->eliminar: " . $base->getError());
        }

        return $resp;
    }

    public static function seleccionar($condicion = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM cursos ";

        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }

        $res = $base->Ejecutar($sql);

        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Curso();
                    $obj->setear($row['id'], $row['nombre'], $row['descripcion'], $row['modalidad'], $row['cursodeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("cursos->seleccionar: " . $base->getError());
        }

        return $arreglo;
    }
}
