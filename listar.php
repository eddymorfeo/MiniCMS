<?php
require './clases/conexion.php';
require "./componentes/nav.php";
?>

<div class="mt-3">
    <a href="contenido.editar.php?id=0" class="btn btn-primary">Agregar nueva publicación</a>
</div>

<div>
    <a href="logout.php">Desconectar</a>
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
                        <h2>
                            <a href=""><?php echo $reg["titulo"] ?></a>
                        </h2>
                        <div class="card-text"><?php echo $reg["subtitulo"] ?></div>
                        <div class="card-text"><?php echo $reg["contenido"] ?></div>
                        <a href="contenido.editar.php?id=<?php echo $reg["idContenido"] ?>"
                            class="btn btn-primary">Editar</a>
                        <a href="contenido.eliminar.php?id=<?php echo $reg["idContenido"] ?>"
                            class="btn btn-primary">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
            }
            ?>
    <?php
require "./componentes/footer.php";
?>