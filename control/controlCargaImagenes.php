<?php
include_once '../../configuracion.php';

class controlCargaImagenes
{
    public function cargarImagen($imagen, $idProducto)
    {
        // print_r($imagen);
        $nombreArchivoImagen = md5($idProducto) . ".jpeg";
        $dir = $GLOBALS['IMGS'];

        $todoOK = true;

        if ($nombreArchivoImagen != "") {
            if (!$todoOK || $imagen['imagen']["error"] > 0) {
                $todoOK = false;
            }

            $tipoJpeg = strpos(strtoupper($imagen['imagen']["type"]), "JPEG");

            if ($todoOK && !$tipoJpeg) {
                $todoOK = false;
            }
        }
        // Copiar/Guardar
        if ($todoOK) {
            if (!copy($imagen['imagen']['tmp_name'], $dir . $nombreArchivoImagen)) {
                $todoOK = false;
            }
        }
    }

    public function eliminarImagen($idProducto)
    {
        $nombreArchivoImagen = md5($idProducto) . ".jpeg";
        $dir = $GLOBALS['IMGS'] . $nombreArchivoImagen;

        if (!is_null($dir)) {
            unlink($dir);
        }
    }
}
