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
        $resultado =  $db->ejecutar_pdo($query, []); 
        return $resultado;
    }

    public function listar2(){
        $db = new ConexionDB ();
        $query = "SELECT * FROM contenidos ORDER BY idcontenido DESC LIMIT 5";
        $resultado =  $db->ejecutar_pdo($query, []); 
        return $resultado;
    }

    public function agregar (){
        $db = new ConexionDB ();
        $query = "INSERT INTO contenidos VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $parametros = [$this->idClasificacion, $this->autor_idUsuario, $this->imagen, $this->titulo, $this->subtitulo, $this->contenido];
        $db->ejecutar_pdo($query, $parametros); 
        $db->cerrar(); 
    }
    public function modificar (){
        $db = new ConexionDB ();
        $query = "UPDATE contenidos SET idclasificacion = ?, autor_idusuario = ?, imagen = ?, titulo = ?, subtitulo = ?, contenido = ? WHERE idContenido = ?";
        $parametros = [$this->idClasificacion, $this->autor_idUsuario, $this->imagen, $this->titulo, $this->subtitulo, $this->contenido, $this->idContenido];
        $db->ejecutar_pdo($query, $parametros); 
        $db->cerrar(); 
    }

    public function setIdContenido($id){
        $this->idContenido = $id;
        $this->obtener();
    }


    public function obtener(){
        $db = new ConexionDB ();
        $query = "SELECT * FROM contenidos WHERE idcontenido = ?";
        $resultado =  $db->ejecutar_pdo($query, [$this->idContenido]); 
        if ($resultado->num_rows > 0){
            $fila = $resultado ->fetch_assoc();
            $this->idClasificacion = $fila["idclasificacion"];
            $this->autor_idUsuario = $fila["autor_idusuario"];
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
        $query = "DELETE FROM contenidos WHERE idcontenido = ?";
        $db->ejecutar_pdo($query, [$id]);
        $db->cerrar(); 
    }
}

?>
