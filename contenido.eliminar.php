<?php

require './clases/contenido.php';
require './clases/usuarios.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$contenido = new Contenido();

if (isset($_GET["id"])) {
    $contenido->setIdContenido($_GET["id"]);
    $contenido->eliminar($_GET["id"]);
    header("Location: listar.php");}

?>