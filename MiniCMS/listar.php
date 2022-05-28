<?php
require './clases/conexion.php';
require './clases/usuarios.php';


session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>INDEX</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="barra">
                <img src="./img/logo.png" alt="Logo CMS">
                <div class="mobile-menu">
                    <img class="responsive" src="../img/barras.svg" alt="Menu">
                </div>

                <nav class="navegacion">
                    <a class="link" href="index.php"><img src="./img/home.svg"> Inicio</a>
                    <a class="link" href="quienessomos.php"><img src="./img/somos.svg">Quienes Somos</a>
                    <a class="link" href="contenidos.php"><img src="./img/contenido.svg">Contenidos</a>
                    <a class="link" href="logout.php"><img src="./img/log-out.svg">Desconectar</a>

                </nav>
            </div>
        </div>
        </div>
    </header>


    <div class="mt-3">
        <a href="contenido.editar.php?id=0" class="btn btn-primary">Agregar nueva publicación</a>
    </div>


    <div class="row">

        <?php
        require_once './clases/contenido.php';

        $contenido = new Contenido ();
		$registros = $contenido->listar();
        while ($reg = $registros->fetch_assoc()){
		
        ?>

        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title">
                            <img src="<?php echo $reg["imagen"] ?>" class="img-fluid rounded-start w-100" />
                        </div>
                        <div class="col">
                            <h2 class="fw-bold">
                                <?php echo $reg["titulo"] ?>
                            </h2>
                            <div class="card-text fw-bolder"><?php echo $reg["subtitulo"] ?></div>
                            <a href="contenido.editar.php?id=<?php echo $reg["idcontenido"] ?>"
                                class="btn btn-primary">Editar</a>
                            <a href="contenido.eliminar.php?id=<?php echo $reg["idcontenido"] ?>"
                                class="btn btn-primary" onclick="preguntar">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            }
            ?>
    </div>
    <?php
require_once ("./componentes/footer.php");
?>

    <script type="text/javascript">
    function ConfirmarEliminacion() {

        let elimina = document.getElementById(idDelete);
        var respuesta = confirm("¿Esta seguro que desea eliminar el contenido?");
        var paginaEliminar = "contenido.eliminar.php?id=" + elimina;
        if (respuesta) {
            window.location.href = "contenido.eliminar.php?id=" + elimina;

        } else {
            confirm("No se hará nada");
        }
    }
    </script>

</body>

</html>