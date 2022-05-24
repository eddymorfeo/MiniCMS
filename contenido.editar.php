<?php

require './clases/conexion.php';
require './clases/contenido.php';

$contenido = new Contenido();

if (isset($_GET["id"])) {
    $contenido->setIdContenido($_GET["id"]);
}
if (!empty($_POST)) {
    $contenido->idContenido = $_POST["idContenido"];
    $contenido->idClasificacion = $_POST["idClasificacion"];
    $contenido->autor_idUsuario = $_POST["autor_idUsuario"];
    $contenido->imagen = $_POST["imagen"];
    $contenido->titulo = $_POST["titulo"];
    $contenido->subtitulo = $_POST["subtitulo"];
    $contenido->contenido = $_POST["contenido"];
    if ($_POST["idContenido"] == 0) {
        $contenido->agregar();
    } else {
        $contenido->modificar();
    }
    header("Location: contenidos.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Contenido</title>
</head>
<body>

    <div class="container mt-6">

        <form method="post">
            <input type="hidden" name="idContenido" value="<?php echo $contenido->idContenido ?>">
            <label class="mt-1" for="idClasificacion">Clasificacion</label>
            <div class="form-floating mb-2 mt-3">                
                <select name="idClasificacion" id="idClasificacion">
                    <option value="1">Noticias</option> 
                    <option value="2">Asociación</option>
                    <option value="3">Información</option>
                    <option value="4">Otros</option>
                </select>             
            </div>
            <div class="form-floating mb-2">
                <input type="text" maxlength="255" class="form-control" id="imagen" name="imagen" placeholder=""
                    value="<?php echo $contenido->imagen ?>">
                <label for="imagen">imagen</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" maxlength="12" class="form-control" id="titulo" name="titulo" placeholder=""
                    value="<?php echo $contenido->titulo ?>">
                <label for="titulo">titulo</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" maxlength="20" class="form-control" id="subtitulo" name="subtitulo" placeholder=""
                    value="<?php echo $contenido->subtitulo ?>">
                <label for="subtitulo">subtitulo</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" maxlength="20" class="form-control" id="contenido" name="contenido" placeholder=""
                    value="<?php echo $contenido->contenido ?>">
                <label for="contenido">contenido</label>
            </div>
            <div class="form-floating mt-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button href="listar.php" class="btn btn-primary">Cancelar</button>
            </div>
        </form>
    </div>


</body>
</html>