<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/conf_inmuebles.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Configuración de inmueble</title>
</head>

<body>
    <?php
    require("menu_privado.php");
    ?>

    <div class="container">
        <form class="derecha">
            <div class="titulos">
                <span>Configuración de inmueble</span>
            </div>

            <div class="campos">
                <div class="med">
                    <a href="conf_inmueble.php">
                        <button type="button" class="short-list-inmuebles">
                            <div class="item-alquiler">
                                <div class="imagen">
                                    <img src="img/photo.png" alt="Imagen de inmueble">
                                </div>
                                <div class="datos-generales">
                                    <h2>Nombre de inmueble</h2>
                                    <div class="ubicacion">
                                        <span class="material-symbols-outlined">location_on</span>
                                        <span class="texto-inf">Uriangato, Guanajuato</span>
                                    </div>
                                </div>

                            </div>
                        </button>
                    </a>
                </div>
                <div class="med">
                    <a href="conf_inmueble.php">
                        <button type="button" class="short-list-inmuebles">
                            <div class="item-alquiler">
                                <div class="imagen">
                                    <img src="img/photo.png" alt="Imagen de inmueble">
                                </div>
                                <div class="datos-generales">
                                    <h2>Nombre de inmueble</h2>
                                    <div class="ubicacion">
                                        <span class="material-symbols-outlined">location_on</span>
                                        <span class="texto-inf">Uriangato, Guanajuato</span>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
                <div class="med">
                    <a href="conf_inmueble.php">
                        <button type="button" class="short-list-inmuebles">
                            <div class="item-alquiler">
                                <div class="imagen">
                                    <img src="img/photo.png" alt="Imagen de inmueble">
                                </div>
                                <div class="datos-generales">
                                    <h2>Nombre de inmueble</h2>
                                    <div class="ubicacion">
                                        <span class="material-symbols-outlined">location_on</span>
                                        <span class="texto-inf">Uriangato, Guanajuato</span>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
            </div>

            <a href="conf_inmueble.php">
                <button type="button" id="btn-add-flotante">
                    <span class="material-symbols-outlined">add</span>
                </button>
            </a>
        </form>
    </div>
</body>

</html>