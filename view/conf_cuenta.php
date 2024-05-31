<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuraciones.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Configuración cuenta</title>
</head>

<body>
    <?php
    require("menu_privado.php");
    ?>

    <div class="container">
        <?php
        require("leftNavBar.php");
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

        if (
            isset($_POST["txtPassword"]) && isset($_POST["txtPasswordConfirm"])
        ) {
            if (
                strlen($_POST["txtPassword"]) > 0 && strlen($_POST["txtPassword"]) <= 50 &&
                strlen($_POST["txtPasswordConfirm"]) > 0 && strlen($_POST["txtPasswordConfirm"]) <= 50
            ) {
                if (
                    $_POST["txtPassword"] == $_POST["txtPasswordConfirm"]
                ) {
                    $usuario->password = $_POST["txtPasswordConfirm"];
                    $res = $dao->editarPassword($usuario);
                    if ($res) {
                        $showBackError = "showSuccess";
                        $errorMessage = "Configuración guardada con éxito.";
                    } else {
                        $showBackError = "show";
                        $errorMessage = "Error al guardar los datos.";
                    }
                } else {
                    $showBackError = "show";
                    $errorMessage = "Las contraseñas no coinciden.";
                }
            } else {
                $showBackError = "show";
                $errorMessage = "Error al procesar los datos.";
            }
        }
        ?>

        <form class="derecha" method="post" action="conf_cuenta.php">
            <div class="msg-warning <?= $showBackError ?>">
                <?= $errorMessage ?>
            </div>
            <div class="titulos">
                <span>Configuración de cuenta</span>
            </div>
            <div class="campos">
                <div class="med">
                    <div class="campo-texto">
                        <span class="subtitulos">Correo electrónico </span>
                        <input type="email" disabled readonly id="txtNombre" name="txtNombre" value="<?= $usuario->correo ?>">
                        <div class="msg-error" id="error-correo">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Contraseña</span>
                        <input type="password" id="txtPassword" name="txtPassword">
                        <div class="msg-error" id="error-password">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Confirmar contraseña</span>
                        <input type="password" id="txtPasswordConfirm" name="txtPasswordConfirm">
                        <div class="msg-error" id="error-password-confirmation">
                            Este es un mensaje de error
                        </div>
                    </div>
                </div>
                <div class="med">
                </div>
            </div>
            <div class="btn-container">
                <button class="action-btn-default">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>