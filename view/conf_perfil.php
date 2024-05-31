<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuraciones.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Configuración de perfil público</title>
</head>

<body>
    <?php
    require("menu_privado.php");
    require_once("../data/DAOUsuario.php");

    $showBackError = $errorMessage = "";

    $dao = new DAOUsuario();
    $usuario = $dao->getUser($_SESSION["id"]);
    $_SESSION["nombre"] = $usuario->nombre;
    $_SESSION["correo"] = $usuario->correo;
    $_SESSION["rol"] = $usuario->rol;

    if (isset($_SESSION["msgSuccesful"])) {
        session_unset("msgSuccesful");
    }

    if (isset($_POST["txtNombre"]) && isset($_POST["txtApellidoPaterno"]) && isset($_POST["txtApellidoMaterno"])) {
        if (
            strlen($_POST["txtNombre"]) > 0 && strlen($_POST["txtNombre"]) <= 50 &&
            strlen($_POST["txtApellidoPaterno"]) > 0 && strlen($_POST["txtApellidoPaterno"]) <= 50 &&
            strlen($_POST["txtApellidoMaterno"]) > 0 && strlen($_POST["txtApellidoMaterno"]) <= 50
        ) {
            $usuario->nombre = trim($_POST["txtNombre"]);
            $usuario->apellidoPaterno = trim($_POST["txtApellidoPaterno"]);
            $usuario->apellidoMaterno = trim($_POST["txtApellidoMaterno"]);
            $res = $dao->editarPerfil($usuario);
            var_dump($res);
            if ($res) {
                //$_SESSION["rol"] = $usuario->rol;
                $showBackError = "showSuccess";
                $errorMessage = "Configuración guardada con éxito.";
                //header("conf_arrendador.php");
            } else {
                $showBackError = "show";
                $errorMessage = "Error al guardar los datos.";
            }
        } else {
            $showBackError = "show";
            $errorMessage = "Error al procesar los datos. Formato de datos incorrecto";
        }
    }
    ?>

    <div class="container">
        <?php
        require("leftNavBar.php");
        ?>

        <form class="derecha" method="post" action="conf_perfil.php">
            <div class="msg-warning <?= $showBackError ?>">
                <?= $errorMessage ?>
            </div>
            <div class="titulos">
                <span>Configuración de perfil</span>
            </div>
            <div class="campos">
                <div class="med">
                    <div class="campo-texto">
                        <span class="subtitulos">Nombre</span>
                        <input type="text" id="txtNombre" name="txtNombre" value="<?= $usuario->nombre ?>">
                        <div class="msg-error" id="error-nombre">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Apellido paterno</span>
                        <input type="text" id="txtApellidoPaterno" name="txtApellidoPaterno" value="<?= $usuario->apellidoPaterno ?>">
                        <div class="msg-error" id="error-apellido-paterno">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Apellido materno</span>
                        <input type="text" id="txtApellidoMaterno" name="txtApellidoMaterno" value="<?= $usuario->apellidoMaterno ?>">
                        <div class="msg-error" id="error-apellido-materno">
                            Este es un mensaje de error
                        </div>
                    </div>
                </div>
                <div class="med">
                    <div class="campo-imagen">
                        <span class="subtitulos">Foto de perfil</span>
                        <div class="img-circular">
                            <img src="img/photo.png" alt="">
                        </div>
                        <button type="button" class="btn-editar-imagen">
                            <span id="icono" class="material-symbols-outlined">edit</span>
                            <span>Editar</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="btn-container">
                <button type="submit" id="btnGuardar" class="action-btn-default">Guardar</button>
            </div>
        </form>
    </div>
    <script src="validation/conf_perfil.js"></script>
</body>

</html>