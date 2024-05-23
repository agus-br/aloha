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
        ?>

        <form class="derecha">
            <div class="titulos">
                <span>Configuración de cuenta</span>
            </div>
            <div class="campos">
                <div class="med">
                    <div class="campo-texto">
                        <span class="subtitulos">Correo electrónico </span>
                        <input type="email" disabled>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Contraseña</span>
                        <input type="password">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Contraseña</span>
                        <input type="password">
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