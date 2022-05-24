<?php 

class ConexionDB {

    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost","root","","cms");
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
    }

    public function pdo ($sql, $parametros){
        $resultado = $this->conexion->prepare($sql);
        if (sizeof($parametros))    {
            $tipos = str_repeat("s", sizeof($parametros));
            $resultado->bind_param($tipos, ...$parametros);
        }
        $resultado->execute();
        $resultado = $resultado->get_result();
        return $resultado;
    }

    public function cerrar(){
        $this->conexion->close();
    }

}
?>



