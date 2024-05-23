<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <title>Iniciar sesión</title>
</head>

<body>
    <?php
    require("menu_publico.php");
    require_once("../data/DAOUsuario.php");

    $correo = $password = $validado = $error = $showBackError = $errorMessage = "";

    if (isset($_POST["txtCorreo"]) && isset($_POST["txtPassword"])) {
        $correo = trim($_POST["txtCorreo"]);
        $password = trim($_POST["txtPassword"]);

        //Validar los datos
        if (
            filter_var($correo, FILTER_VALIDATE_EMAIL) != false &&
            strlen($password) > 0 && strlen($password) <= 50
        ) {
            $dao = new DAOUsuario();
            $usuario = $dao->login($correo, $password);
            //Verificar que el usuario sea admin@gmail.com y pass 12345678  
            if ($usuario) {
                //header("Location: home.php?dato=$correo");
                session_start();
                $_SESSION["nombre"] = $usuario->nombre;
                $_SESSION["correo"] = $correo;
                $_SESSION["rol"] = $usuario->rol;
                header("Location: home.php");
            } else {
                $showBackError = "show";
                $errorMessage = "Correo y/o contraseña incorrecta";
            }
        } else {
            $validado = "validado";
            $showBackError = "show";
            $errorMessage = "Correo o contraseña incorrecta";
        }
    }
    /*else{
            echo "viene de otra página sin datos";
        }*/
    ?>
    <div class="container">
        <form method="post" novalidate>
            <div class="form-navbar">
                <a id="login"><button type="button" class="btn-active">Iniciar sesión</button></a>
                <a href="signup.php" id="signup"><button type="button" class="def-btn">Registrarse</button></a>
            </div>
            <div class="controles">
                <div class="campo-texto">
                    <label for="txtCorreo" class=" subtitulos">Correo</label>
                    <input type="email" id="txtCorreo" name="txtCorreo" required maxlength="25">
                    <div class="msg-error" id="error-correo">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtPassword" class="subtitulos">Contraseña</label>
                    <input type="password" id="txtPassword" name="txtPassword" required maxlength="40">
                    <div class="msg-error" id="error-password">
                        Este es un mensaje de error
                    </div>
                </div>
            </div>

            <div class="btn-container">
                <div class="msg-warning <? $showBackError ?>">
                    <? $errorMessage ?>
                </div>
                <button type="submit" class="action-btn-default" id="btn-login">Iniciar sesión</button>
            </div>
        </form>

    </div>
    <script src="validation/login.js"></script>
</body>

</html>