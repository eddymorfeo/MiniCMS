<?php 

class conexionDB {

    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "cms");
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
    }

    // inseguro  -- NO USAR
    public function ejecutar($sql) {
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    // PDO - seguro -- USAR
    public function ejecutar_pdo($sql, $parametros)  {
        $resultado = $this->conexion->prepare($sql);
        // foreach ($parametros as $key => $parametro) {
        //     $resultado->bind_param("s", $parametro);
        // }
        if (sizeof($parametros))    {
            $tipos = str_repeat("s", sizeof($parametros));
            $resultado->bind_param($tipos, ...$parametros);
        }
        $resultado->execute();
        $resultado = $resultado->get_result();
        return $resultado;
    }

    public function cerrar() {
        $this->conexion->close();
    }


}



?>



