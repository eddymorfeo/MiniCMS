<?php
require_once "./clases/conexion.php";
?>
<?php

$db = new conexionDB();

require "./componentes/nav.php";
?>

<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        if ($_GET["logout"] == 1) {
            session_destroy();
        } else {
            header("Location: index.php");
            exit();
        }
    }

    $usuario = null;
    $contrasena = null;
    $usuarioValido = null;
    $usuarioNoValido = null;

    if (!empty($_POST)) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        if ($usuario == 'admin@admin.cl' && $contrasena == '123') {
            $usuarioValido = "Usuario válido";
            $_SESSION["usuario"] = $usuario;
            header("Location: listar.php");
        } else {
            $usuarioNoValido = "Usuario no válido";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="card shadow">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="email" class="form-control" maxlength="100" required id="usuario"
                                    name="usuario" placeholder="name@example.com">
                            </div>
                            <div class="mb-4">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" maxlength="15" required id="contrasena"
                                    name="contrasena" placeholder="123">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
require "./componentes/footer.php";
?>
</html>
