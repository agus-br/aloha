<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/ubicaciones.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Mapa de ubicaciones de inmuebles</title>
</head>

<body>

    <?php
    require("menu_privado.php");
    ?>

    <div class="container">
        <div class="izq">
            <?php
            require_once("../data/DAOInmueble.php");

            // Obtener todos los inmuebles
            $daoInmueble = new DAOInmueble();
            $inmuebles = $daoInmueble->obtenerInmuebles();

            // Iterar sobre cada inmueble para generar el HTML
            foreach ($inmuebles as $inmueble) {
            ?>
                <button type="button" class="short-list-inmuebles" value="<?php echo $inmueble->nombre . "," . $inmueble->latitud . ',' . $inmueble->longitud ?>">
                    <div class="item-alquiler">
                        <div class="imagen">
                            <img src="img/photo.png" alt="Imagen de inmueble">
                        </div>
                        <div class="datos-generales">
                            <h2><?php echo $inmueble->nombre; ?></h2>
                            <div class="servicios">
                                <?php
                                if ($inmueble->internet) {
                                    echo '<span class="material-symbols-outlined">Wifi</span>';
                                }
                                if ($inmueble->agua) {
                                    echo '<span class="material-symbols-outlined">water_drop</span>';
                                }
                                if ($inmueble->luz) {
                                    echo '<span class="material-symbols-outlined">Bolt</span>';
                                }
                                if ($inmueble->garage) {
                                    echo '<span class="material-symbols-outlined">directions_car</span>';
                                }
                                ?>
                            </div>
                            <div class="ubicacion">
                                <span class="material-symbols-outlined">location_on</span>
                                <span class="texto-inf"><?php echo $inmueble->estado . " " . $inmueble->municipio; ?></span>
                            </div>
                        </div>

                        <div class="mas-detalles">
                            <div class="precio-logo">
                                <span class="titulos">$ <?php echo $inmueble->precioAlquiler; ?></span>
                            </div>
                            <div class="botones">
                                <a class="btnDetalles" href="detalle_inmuebles.php?id=<?php echo $inmueble->id; ?>">Ver más</a>
                            </div>

                        </div>

                    </div>
                </button>
            <?php
            }
            ?>

        </div>

        <div class="der">
            <div class="map" id="mapaAlquileres">

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/mapaAlquileres.js"></script>
</body>

</html>