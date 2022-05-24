<?php

require_once "conexion.php";

class Contenido {
    public $idContenido;
    public $idClasificacion;
    public $autor_idUsuario;
    public $imagen;
    public $titulo;
    public $subtitulo;
    public $contenido;

    public function __construct()   {

    }

    public function listar(){
        $db = new ConexionDB ();
        $query = "SELECT * FROM contenidos";
        $resultado =  $db->pdo($query, []); 
        return $resultado;
    }

    public function listar2(){
        $db = new ConexionDB ();
        $query = "SELECT * FROM contenidos ORDER BY IdContenido DESC LIMIT 5";
        $resultado =  $db->pdo($query, []); 
        return $resultado;
    }

    public function agregar (){
        $db = new ConexionDB ();
        $query = "INSERT INTO contenidos VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $parametros = [$this->idClasificacion, $this->autor_idUsuario, $this->imagen, $this->titulo, $this->subtitulo, $this->contenido];
        $db->pdo($query, $parametros); 
        $db->cerrar(); 
    }
    public function modificar (){
        $db = new ConexionDB ();
        $query = "UPDATE contenidos SET idClasificacion = ?, autor_idUsuario = ?, imagen = ?, titulo = ?, subtitulo = ?, contenido = ? WHERE idContenido = ?";
        $parametros = [$this->idClasificacion, $this->autor_idUsuario, $this->imagen, $this->titulo, $this->subtitulo, $this->contenido, $this->idContenido];
        $db->pdo($query, $parametros); 
        $db->cerrar(); 
    }

    public function setIdContenido($id){
        $this->idContenido = $id;
        $this->obtener();
    }


    public function obtener(){
        $db = new ConexionDB ();
        $query = "SELECT * FROM contenidos WHERE idContenido = ?";
        $resultado =  $db->pdo($query, [$this->idContenido]); 
        if ($resultado->num_rows > 0){
            $fila = $resultado ->fetch_assoc();
            $this->idClasificacion = $fila["idClasificacion"];
            $this->autor_idUsuario = $fila["autor_idUsuario"];
            $this->imagen = $fila["imagen"];
            $this->titulo = $fila["titulo"];
            $this->subtitulo = $fila["subtitulo"];
            $this->contenido = $fila["contenido"];
        } else{
            $this->idClasificacion = null;
            $this->autor_idUsuario = null;
            $this->imagen = null;
            $this->titulo = null;
            $this->subtitulo = null;
            $this->contenido = null;
        }
        $db->cerrar();
    }

    public function eliminar ($id){
        $db = new ConexionDB ();
        $query = "DELETE FROM contenidos WHERE idContenido = ?";
        $db->pdo($query, [$id]);
        $db->cerrar(); 
    }
}

?>