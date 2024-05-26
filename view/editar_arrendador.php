<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <title>Editar arrendador</title>
</head>

<body>
    <?php
    require_once("menu_privado.php");
    require_once("../data/DAOUsuario.php");
    $usuario = new Usuario();
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        //var_dump($_GET["id"]);
        //Cuando se recibe el id entonces hay que obtener los datos del usuario
        $usuario = (new DAOUsuario())->getUser((int) $_GET["id"]);
    }
    //var_dump($usuario);
    ?>
    <div class="container">
        <form method="POST">
            <div class="form-navbar">
                <a href="login.php" id="login"><button type="button" class="def-btn">Iniciar sesión</button></a>
                <a id="signup"><button type="button" class="btn-active">Registrarse</button></a>
            </div>
            <div class="controles">
                <div class="campo-texto">
                    <label for="txtNombre" class=" subtitulos">Nombre</label>
                    <input type="text" id="txtNombre" required maxlength="50" name="txtNombre" value="<?= $usuario->nombre ?>">
                    <div class="msg-error show" id="error-nombre">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtApellidoPaterno" class=" subtitulos">Apellido paterno</label>
                    <input type="text" id="txtApellidoPaterno" required maxlength="50" name="txtApellidoPaterno" value="<?= $usuario->apellidoPaterno ?>">
                    <div class="msg-error show" id="error-apellido-paterno">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtApellidoMaterno" class=" subtitulos">Apellido materno</label>
                    <input type="text" id="txtApellidoMaterno" required maxlength="50" name="txtApellidoMaterno" value="<?= $usuario->apellidoMaterno ?>">
                    <div class="msg-error show" id="error-apellido-materno">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtCorreo" class=" subtitulos">Correo</label>
                    <input type="Correo" id="txtCorreo" required maxlength="50" name="txtApellidoPaterno" value="<?= $usuario->correo ?>">
                    <div class="msg-error show" id="error-correo">
                        Este es un mensaje de error
                    </div>
                </div>
            </div>
            <div class="btn-container">
                <div class="msg-warning <? $showBackError ?>">
                    <? $errorMessage ?>
                </div>
                <button type="submit" class="action-btn-default" id="btn-signup">Registrate</button>
            </div>
        </form>
    </div>
    <script src="validation/editar_arrendador.js"></script>
</body>

</html>