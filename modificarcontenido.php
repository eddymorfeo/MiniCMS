<?php

require_once './clases/contenido.php';  

$contenido = new Contenido();

// $contenido->idClasificacion = 3;
// $contenido->autor_idUsuario = 2;
// $contenido->imagen = "otra imagen2";
// $contenido->titulo = "otro título 3";
// $contenido->subtitulo = "otro subtítulo 4";
// $contenido->contenido = "otro contenido 5";

// $contenido->agregar();

// $contenido->setIdContenido(2);

// $contenido->eliminar(5)

$registros = $contenido->listar();
while ($reg = $registros->fetch_assoc()){
    echo "idContenido: " . $reg["idContenido"] . "<br>";
    echo "idClasificacion: " . $reg["idClasificacion"] . "<br>";
    echo "autor_idUsuario: " . $reg["autor_idUsuario"] . "<br>";
    echo "imagen: " . $reg["imagen"] . "<br>";
    echo "titulo: " . $reg["titulo"] . "<br>";
    echo "subtitulo: " . $reg["subtitulo"] . "<br>";
    echo "Contenido: " . $reg["contenido"] . "<br>";
    echo "<hr>";
}




?>

<!-- idClasificacion: <?php echo $contenido->idClasificacion; ?><br>
autor_idUsuario: <?php echo $contenido->autor_idUsuario; ?><br>
imagen: <?php echo $contenido->imagen; ?><br>
titulo: <?php echo $contenido->titulo; ?><br>
subtitulo: <?php echo $contenido->subtitulo; ?><br>
Contenido: <?php echo $contenido->contenido; ?><br> -->