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
    require_once("menu_publico.php");
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
                    <input type="text" id="txtNombre" required maxlength="50" name="txtNombre">
                    <div class="msg-error show" id="error-nombre">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtApellidoPaterno" class=" subtitulos">Apellido paterno</label>
                    <input type="text" id="txtApellidoPaterno" required maxlength="50" name="txtApellidoPaterno">
                    <div class="msg-error show" id="error-apellido-paterno">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtApellidoMaterno" class=" subtitulos">Apellido materno</label>
                    <input type="text" id="txtApellidoMaterno" required maxlength="50" name="txtApellidoMaterno">
                    <div class="msg-error show" id="error-apellido-materno">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtCorreo" class=" subtitulos">Correo</label>
                    <input type="Correo" id="txtCorreo" required maxlength="50" name="txtApellidoPaterno">
                    <div class="msg-error show" id="error-correo">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtPassword" class="subtitulos">Contreaseña</label>
                    <input type="password" id="txtPassword" name="txtPassword" required maxlength="40">
                    <div class="msg-error show" id="error-password">
                        Este es un mensaje de error
                    </div>
                </div>
                <div class="campo-texto">
                    <label for="txtPasswordConfirm" class="subtitulos">Contreaseña</label>
                    <input type="password" id="txtPasswordConfirm" required maxlength="40">
                    <div class="msg-error show" id="error-password-confirmation">
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
    <script src="validation/signup.js"></script>
</body>
</html>