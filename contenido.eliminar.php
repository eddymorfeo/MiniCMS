<?php

require './clases/contenido.php';

$contenido = new Contenido();

if (isset($_GET["id"])) {
    $contenido->setIdContenido($_GET["id"]);
    $contenido->eliminar($_GET["id"]);
    header("Location: listar.php");}

?>