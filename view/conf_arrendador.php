<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuraciones.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Configuración de perfil de arrendador</title>
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

    if (isset($_POST["txtTelefono"])){
        if(strlen($_POST["txtTelefono"]) == 10) {
            $usuario->telefono = $_POST["txtTelefono"];
            $usuario->rol = "Arrendador";
            $res = $dao->editarRol($usuario);
            if ($res) {
                $_SESSION["rol"] = $usuario->rol;
                $showBackError = "showSuccess";
                $errorMessage = "Configuración guardada con éxito.";
                header("conf_arrendador.php");
            } else {
                $showBackError = "show";
                $errorMessage = "Error al guardar los datos.";
            }
        } else {
            $showBackError = "show";
            $errorMessage = "Error al procesar los datos.";
        }
    }

    ?>

    <div class="container">
        <?php
        require("leftNavBar.php");
        ?>

        <form class="derecha" action="conf_arrendador.php" method="post">
            <div class="msg-warning <?= $showBackError ?>">
                <?= $errorMessage ?>
            </div>
            <div class="titulos">
                <?php
                if ($_SESSION["rol"] == "Usuario") {
                    echo "<span>Carga tus datos para convertirte en arrendador.</span>";
                } else {
                    echo "<span>Configuración de perfil de arrendador.</span>";
                }
                ?>
            </div>
            <div class="campos">
                <div class="med">
                    <div class="campo-texto">
                        <label for="txtTelefono" class="subtitulos" required>Teléfono de contacto</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" value="<?= $usuario->telefono ?>">
                    </div>
                    <div class="campo-texto">
                        <label for="txtVerificacion" class="subtitulos">Estatus de verificación</label>
                        <input type="text" id="txtVerificacion" disabled value="<?= $usuario->estatus ?>">
                    </div>
                </div>
                <div class="med">
                    <button type="button" class="campo-file">
                        <label for="datos-verificación" class="subtitulos">Documento de verificación</label>
                        <input type="file" id="datos-verificación">
                    </button>
                </div>
            </div>
            <div class="btn-container">
                <button type="submit" id="btnGuardar" class="action-btn-default">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>