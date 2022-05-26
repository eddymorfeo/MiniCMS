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

<?php
require "./componentes/nav.php";
require "./componentes/carousel.php";
?>

<div class="row mt-3">
    <?php
        require_once './clases/contenido.php';

        $contenido = new Contenido ();
		$registros = $contenido->listar2();
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
                            <?php echo $reg["titulo"] ?>
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


            <?php
require "./componentes/footer.php";

?>





</body>
</html>