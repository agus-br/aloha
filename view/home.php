<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" type="image/png" href="/assets/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Aloha</title>
</head>

<body>
    <?php
    require("menu_privado.php");
    ?>

    <div class="container">
        <div class="izq">
            <div class="filtros">
                <div class="titulos">
                    <span>Filtros</span>
                </div>

                <div id="filtro-ubicacion" class="campos">
                    <span class="subtitulos">Ubicación</span>
                    <div class="cajaBusqueda">
                        <input type="text" name="txtubicacion" class="campo-texto" placeholder="Ubicación de inmueble">
                        <span class="material-symbols-outlined">search</span>
                    </div>
                </div>

                <div id="filtro-nombre" class="campos">
                    <span class="subtitulos">Buscar por nombre</span>
                    <div class="cajaBusqueda">
                        <input type="text" name="txtNombre" class="campo-texto" placeholder="Nombre de inmueble">
                        <span class="material-symbols-outlined">search</span>
                    </div>
                </div>

                <div id="filtro-precio">
                    <div class="cabecera">
                        <span class="subtitulos">Precio</span>
                    </div>
                    <div class="precio-input">
                        <div class="campoPrecio">
                            <span>Min</span>
                            <input type="number" id="txtPrecioMinimo" class="input-min" value="1000" step="100" min="500" max="9900" pattern="[0-9]">
                        </div>
                        <div class="campoPrecio">
                            <span>Max</span>
                            <input type="number" id="txtPrecioMaximo" class="input-max" value="5000" step="100" max="10000" min="600" pattern="[0-9]">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progreso">

                        </div>
                    </div>
                </div>

                <!-- <div class="filtro-ranking">
                    <span class="subtitulos">Ranking</span>
                    <div class="rank">
                        <button class="material-symbols-outlined star" value="1">star</b>
                            <button class="material-symbols-outlined star" value="2">star</button>
                            <button class="material-symbols-outlined star" value="3">star</but>
                                <button class="material-symbols-outlined star" value="4">star</button>
                                <button class="material-symbols-outlined star" value="5">star</but>
                    </div>
                </div> -->
            </div>

            <div class="botones">
                <a href="ubicaciones.php"><button type="button">
                    <span id="btn-text">Ver más ubicaciones</span>
                    <span id="btn-icon" class="material-symbols-outlined">search
                </button></a>
            </div>
        </div>

        <div class="der">
            <?php
            require_once("../data/DAOInmueble.php");

            // Obtener todos los inmuebles
            $daoInmueble = new DAOInmueble();
            $inmuebles = $daoInmueble->obtenerInmuebles();

            // Iterar sobre cada inmueble para generar el HTML
            foreach ($inmuebles as $inmueble) {
            ?>
                <div class="item-alquiler">
                    <div class="imagen">
                        <img src="img/photo.png" alt="Imagen de inmueble">
                    </div>

                    <div class="datos-generales">
                        <h2><?php echo $inmueble->nombre; ?></h2>
                        <div class="mostrar-rank">
                            <span class="material-symbols-outlined star">star</span>
                            <span class="material-symbols-outlined star">star</span>
                            <span class="material-symbols-outlined star">star</span>
                            <span class="material-symbols-outlined star">star</span>
                            <span class="material-symbols-outlined star">star</span>
                        </div>
                        <div class="ubicacion">
                            <span class="material-symbols-outlined">location_on</span>
                            <span class="texto-inf"><?php echo $inmueble->estado . " " . $inmueble->municipio; ?></span>
                        </div>
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
                            // if ($inmueble->shower) {
                            //     echo '<span class="material-symbols-outlined">shower</span>';
                            // }
                            ?>
                        </div>
                    </div>

                    <div class="mas-detalles">
                        <div class="precio-logo">
                            <span class="titulos">$</span>
                            <span class="titulos"><?php
                                                    echo $inmueble->precioAlquiler;
                                                    ?></span>
                        </div>
                        <div class="botones">
                            <a href="detalle_inmuebles.php?id=<?php echo $inmueble->id; ?>"><button>
                                    <span id="btn-text">Ver más</span>
                                </button></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>