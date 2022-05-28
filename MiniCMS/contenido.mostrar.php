<?php
require './clases/conexion.php';
require './clases/usuarios.php';
require_once './clases/contenido.php';
require './clases/clasificaciones.php';
require './componentes/nav.php';
?>


<?php
        $clasificaciones = new Clasificaciones();
        $contenido = new Contenido();
        $usuario = new Usuario ();

        if (isset($_GET["id"])) {
        $contenido->setIdContenido($_GET["id"]);
        $clasificaciones->setIdClasificacion($contenido->idclasificacion);
        $usuario->setIdusuario($contenido->autor_idusuario);       
        ?>
<div class="row mt-3">
    <img height="400" src="<?php echo $contenido->imagen ?>" alt="">
</div>

<div class="container col-10 mt-3">    
    <div class="">
        <h1 class="fw-bold"><?php echo $contenido->titulo ?></h1>
    </div>
    <div class="fw-bold">
        <p><?php echo $clasificaciones->nombre ?></p>
    </div>
    <div class="fw-bolder">
        <p><?php echo $contenido->subtitulo ?></p>
    </div>
    <div class="fw-bold d-flex justify-content-end">
        <p><?php echo $usuario->nombre?></p>
    </div>
    <div class="fst-italic">
        <p><?php echo $contenido->contenido ?></p>
    </div>

    <?php            
        }
            ?>
</div>

<?php
require "./componentes/footer.php";
?>
</body>

</html>