<?php
require "./componentes/nav.php";
?>

<?php
require "./componentes/carousel.php";
?>

<div class="row mt-3">
    <?php
        require_once './clases/contenido.php';

        $contenido = new Contenido ();
		$registros = $contenido->listar();
        while ($reg = $registros->fetch_assoc()){
		
        ?>

    <div class="row justify-content-center mt-2 mb-1">
        <div class="col-lg-6">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo $reg["imagen"] ?>" class="img-fluid rounded-start w-100" />
                    </div>
                    <div class="col">
                        <h2>
                            <a href=""><?php echo $reg["titulo"] ?></a>
                        </h2>
                        <div class="card-text"><?php echo $reg["subtitulo"] ?></div>
                        <div class="card-text"><?php echo $reg["contenido"] ?></div>
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
require "./componentes/footer.php";
?>
</body>

</html>