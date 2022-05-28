<?php

require_once "conexion.php";

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

    public function setIdClasificacion($id){
        $this->idcontenido = $id;
        $this->obtener();
    }


    public function obtener(){
        $db = new ConexionDB ();
        $query = "SELECT nombre FROM  clasificaciones WHERE idclasificacion = ?";
        $resultado =  $db->ejecutar_pdo($query, [$this->idcontenido]); 
        $fila = $resultado ->fetch_assoc();
        $this->nombre = $fila["nombre"];
        $db->cerrar();
    }
}



?>