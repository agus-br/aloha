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
    ?>

    <div class="container">
        <?php
        require("leftNavBar.php");
        ?>

        <form class="derecha">
            <div class="titulos">
                <?php
                    if($_SESSION["rol"] == "Usuario"){
                        echo "<span>Carga tus datos para convertirte en arrendador.</span>";
                    }else{
                        echo "<span>Configuración de perfil de arrendador.</span>";
                    }
                ?>
            </div>
            <div class="campos">
                <div class="med">
                    <div class="campo-texto">
                        <label for="txtTelefono" class="subtitulos">Teléfono de contacto</label>
                        <input type="text" id="txtTelefono">
                    </div>
                    <div class="campo-texto">
                        <label for="txtVerificacion" class="subtitulos">Estatus de verificación</label>
                        <input type="text" id="txtVerificacion" disabled>
                    </div>
                </div>
                <div class="med">
                    <button type="button" class="campo-file">
                        Documento de verificación
                        <label for="datos-verificación" class="subtitulos"></label>
                        <input type="file" id="datos-verificación">
                    </button>
                </div>
            </div>
            <div class="btn-container">
                <button class="action-btn-default">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>