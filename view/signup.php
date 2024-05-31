<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <title>Registrarse</title>
</head>

<body>
    <?php
    require("menu_publico.php");
    require_once("../data/DAOUsuario.php");

    $correo = $password = $validado = $error = $showBackError = $errorMessage = "";
    $usuario = new Usuario();
    $error = false;

    if (
        isset($_POST["txtCorreo"]) && isset($_POST["txtPassword"]) && isset($_POST["txtNombre"])
        && isset($_POST["txtPasswordConfirm"]) && isset($_POST["txtApellidoPaterno"])
        && isset($_POST["txtApellidoMaterno"])
    ) {

        $usuario->nombre = trim($_POST["txtNombre"]);
        $usuario->apellidoPaterno = trim($_POST["txtApellidoPaterno"]);
        $usuario->apellidoMaterno = trim($_POST["txtApellidoMaterno"]);
        $usuario->correo = trim($_POST["txtCorreo"]);
        $usuario->password = trim($_POST["txtPassword"]);
        $confirmPasword = trim($_POST["txtPasswordConfirm"]);

        if ($usuario->password != $confirmPasword) {
            $showBackError = "show";
            $errorMessage = "Las contraseñas no coinciden";
            return;
        }
        //Validar los datos
        if (
            filter_var($usuario->correo, FILTER_VALIDATE_EMAIL) != false &&
            strlen($usuario->password) > 0 && strlen($usuario->password) <= 40
        ) {
            $dao = new DAOUsuario();

            $usuarios = $dao->obtenerUsuarios();

            // Iterar sobre cada inmueble para generar el HTML
            foreach ($usuarios as $user) {
                if ($user->correo == $usuario->correo) {
                    $error = true;
                    break;
                }
            }
            if ($error) {
                $showBackError = "show";
                $errorMessage = "El correo ingresado ya está registrado.";
            } else {
                $res = $dao->agregar($usuario);
                if ($res > 0) {
                    header("Location: login.php");
                } else {
                    $showBackError = "show";
                    $errorMessage = "Correo o contraseña incorrecta";
                }
            }
        } else {
            //$validado = "validado";
            $showBackError = "show";
            $errorMessage = "Error de validación";
        }
    } else {
        $showBackError = "show";
        $errorMessage = "Error inesperado. Por favor vuelva a intentarlo.";
    }
    ?>
    <div class="container">
        <div class="sub-container">
            <div class="msg-warning <?= $showBackError ?>">
                <?= $errorMessage ?>
            </div>
            <form method="post" action="signup.php">
                <div class="form-navbar">
                    <a href="login.php" id="login"><button type="button" class="def-btn">Iniciar sesión</button></a>
                    <a id="signup"><button type="button" class="btn-active">Registrarse</button></a>
                </div>
                <div class="controles">
                    <div class="campo-texto">
                        <label for="txtNombre" class=" subtitulos">Nombre</label>
                        <input type="text" id="txtNombre" required maxlength="50" name="txtNombre">
                        <div class="msg-error" id="error-nombre">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <label for="txtApellidoPaterno" class=" subtitulos">Apellido paterno</label>
                        <input type="text" id="txtApellidoPaterno" required maxlength="50" name="txtApellidoPaterno">
                        <div class="msg-error" id="error-apellido-paterno">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <label for="txtApellidoMaterno" class=" subtitulos">Apellido materno</label>
                        <input type="text" id="txtApellidoMaterno" required maxlength="50" name="txtApellidoMaterno">
                        <div class="msg-error" id="error-apellido-materno">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <label for="txtCorreo" class=" subtitulos">Correo</label>
                        <input type="Correo" id="txtCorreo" required maxlength="50" name="txtCorreo">
                        <div class="msg-error" id="error-correo">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <label for="txtPassword" class="subtitulos">Contreaseña</label>
                        <input type="password" id="txtPassword" name="txtPassword" required maxlength="40">
                        <div class="msg-error" id="error-password">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <label for="txtPasswordConfirm" class="subtitulos">Contreaseña</label>
                        <input type="password" id="txtPasswordConfirm" required maxlength="40" name="txtPasswordConfirm">
                        <div class="msg-error" id="error-password-confirmation">
                            Este es un mensaje de error
                        </div>
                    </div>
                </div>
                <div class="btn-container">
                    <button type="submit" class="action-btn-default" id="btn-signup">Registrate</button>
                </div>
            </form>
        </div>
    </div>
    <script src="validation/signup.js"></script>
</body>

</html>