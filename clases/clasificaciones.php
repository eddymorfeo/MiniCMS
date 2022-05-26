<?php

require_once("conexion.php");

class Clasificaciones {
    public $idclasificacion;
    public $nombre;

    public function __construct()   {

    }

    public function listar()    {
        $db = new conexionDB();
        $query = "select idclasificacion, nombre from clasificaciones order by nombre";
        $resultado = $db->ejecutar_pdo($query, array());
        return $resultado;
    }


}

?>