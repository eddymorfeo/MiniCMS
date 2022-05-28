<?php

require './clases/conexion.php';
require './clases/contenido.php';
require './clases/usuarios.php';
require './clases/clasificaciones.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$idautor = $_SESSION['usuario']->idusuario;

$contenido = new Contenido();

if (isset($_GET["id"])) {
    $contenido->setIdContenido($_GET["id"]);
}
if (!empty($_POST)) {
    $contenido->idcontenido = $_POST["idcontenido"];
    $contenido->idclasificacion = $_POST["idclasificacion"];
    $contenido->autor_idusuario = $idautor;
    $contenido->imagen = $_POST["imagen"];
    $contenido->titulo = $_POST["titulo"];
    $contenido->subtitulo = $_POST["subtitulo"];
    $contenido->contenido = $_POST["contenido"];
    if ($_POST["idcontenido"] == 0) {
        $contenido->autor_idusuario = $idautor;
        echo var_dump($contenido);
        $contenido->agregar();
    } else {
        $contenido->modificar();
    }
    header("Location: listar.php");
}

$clasificacion = new Clasificaciones();
$seleccionClasificaciones = $clasificacion->listar();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Contenido</title>
</head>
<body>

<?php require "./componentes/nav.php"; ?>
    <div class="container mt-6">

        <form method="post">
            <input type="hidden" name="idcontenido" value="<?php echo $contenido->idcontenido ?>">
            <label class="mt-1" for="idclasificacion">Clasificacion</label>
            <div class="form-floating mb-2 mt-3">                
                <select name="idclasificacion">
                    <?php
                        foreach ($seleccionClasificaciones as $key => $value) {
                            $selected = "";
                            if ($value["idclasificacion"] == $idclasificacion)  {
                                $selected = "selected";
                            }
                            echo "<option value='".$value["idclasificacion"]."' ".$selected.">".$value["nombre"]."</option>";
                        }
                    ?>  
                </select>            
            </div>
            <input type="hidden" name="autor_idusuario" value="<?php $contenido->autor_idusuario ?>">
            <div class="form-floating mb-2">
                <input type="text" maxlength="255" class="form-control" id="imagen" name="imagen" placeholder=""
                    value="<?php echo $contenido->imagen ?>">
                <label for="imagen">imagen</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" maxlength="200" class="form-control" id="titulo" name="titulo" placeholder=""
                    value="<?php echo $contenido->titulo ?>">
                <label for="titulo">titulo</label>
            </div>

            <div class="form-floating mb-2">
             <textarea type="text" class="form-control" style="width: 100%; height: 15rem; border: 1px solid #cecdcd; 
             border-radius: 3px;" id="subtitulo" name="subtitulo" placeholder=""
                    value="<?php echo $contenido->contenido ?>"><?php echo $contenido->subtitulo ?></textarea>
                    <label for="subtitulo">subtitulo</label>
               
            </div>
            <div class="form-floating mb-2">
             <textarea type="text" class="form-control" style="width: 100%; height: 20rem; border: 1px solid #cecdcd; 
             border-radius: 3px;" id="contenido" name="contenido" placeholder=""
                    value="<?php echo $contenido->contenido ?>"><?php echo $contenido->contenido ?></textarea>
                    <label for="contenido">contenido</label>
               
            </div>
            <div class="form-floating mt-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button href="listar.php" class="btn btn-primary">Cancelar</button>
            </div>
        </form>
    </div>

    <?php require "./componentes/footer.php"; ?>
</body>
</html>