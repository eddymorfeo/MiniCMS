<?php
require_once "conexion.php";

class Usuario {
    public $idusuario;
    public $email;
    public $nombre;
    public $apellido;
    public $contrasena;
    public $activo;

    public function __construct()   {
    }

    public function setIdusuario($id){
        $this->idusuario = $id;
        $this->listar();
    }

    public function listar(){
        $db = new conexionDB();
        $sql = "SELECT concat_ws(' ', nombre, apellido) nombre FROM usuarios WHERE idusuario = ?";
        $resultado = $db->ejecutar_pdo($sql, [$this->idusuario]);
        $fila = $resultado ->fetch_assoc();
        $this->nombre = $fila["nombre"];
        $db->cerrar();
    }

    public function autenticar($email, $contrasena)    {
        $db = new conexionDB();
        $sql = "SELECT * FROM usuarios WHERE email = ? AND contrasena = PASSWORD(?) AND activo = 1";
        $parametros = array($email, $contrasena);
        $resultado = $db->ejecutar_pdo($sql, $parametros);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $this->idusuario = $fila["idusuario"];
            $this->email = $fila["emaile"];
            $this->nombre = $fila["nombre"];
            $this->apellido = $fila["apellidol"];
            // $this->contrasena = $fila["contrasena"];
            // $this->activo = $fila["activo"];
            return true;
        } else {
            return false;
        }
    }

}


?>