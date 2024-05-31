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
    if ($_SESSION["rol"] != "Arrendador") {
        header("Location: home.php");
    }
    ?>

    <div class="container">
        <div class="derecha">
            <div class="titulos">
                <span>Lista de inmuebles</span>
            </div>

            <div class="lista-inmuebles">
                <?php
                require_once("../data/DAOInmueble.php");

                // Obtener todos los inmuebles
                $daoInmueble = new DAOInmueble();
                $inmuebles = $daoInmueble->obtenerInmueblesArrendador($_SESSION["id"]);
                if (isset($_SESSION["nombreTemp"])) {
                    unset($_SESSION["nombreTemp"]);
                }
                // Iterar sobre cada inmueble para generar el HTML
                foreach ($inmuebles as $inmueble) {
                ?>
                    <div class="inmueble-item">
                        <a href="conf_inmueble.php?id=<?= $inmueble->id; ?>">
                            <button type="button" class="short-list-inmuebles">
                                <div class="item-alquiler">
                                    <div class="imagen">
                                        <img src="img/photo.png" alt="Imagen de inmueble">
                                    </div>
                                    <div class="datos-generales">
                                        <h2><?= $inmueble->nombre; ?></h2>
                                        <div class="ubicacion">
                                            <span class="material-symbols-outlined">location_on</span>
                                            <span class="texto-inf"><?= $inmueble->estado . ", " . $inmueble->municipio ?></span>
                                        </div>
                                    </div>

                                </div>
                            </button>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>

            <a href="conf_inmueble.php">
                <button type="button" id="btn-add-flotante">
                    <span class="material-symbols-outlined">add</span>
                </button>
            </a>
        </div>
    </div>
</body>

</html>