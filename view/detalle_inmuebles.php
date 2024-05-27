<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/inmuebles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Detalles de inmueble</title>
</head>

<body>

    <?php
    require("menu_privado.php");
    require_once("../data/DAOInmueble.php");
    require_once("../data/DAOUsuario.php");

    $inmueble = new Inmueble();
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        //var_dump($_GET["id"]);
        //Cuando se recibe el id entonces hay que obtener los datos del inmueble
        $inmueble = (new DAOInmueble())->getInmueble((int) $_GET["id"]);
        $arrendador = (new DAOUsuario())->getUser((int) $inmueble->arrendador);
    }

    ?>

    <div class="father">
        <h1 class="titulo"><?= $inmueble->nombre ?></h1>
        <div class="grid-galeria">
            <div class="item1"> </div>
            <div class="item2"> </div>
            <div class="item3"> </div>
            <div class="item4"> </div>
            <div class="botones">

            </div>
        </div>
        <h1 class="titulo"> <?= $inmueble->nombre . ": " . $inmueble->estado . ", " . $inmueble->municipio ?></h1>
        <a href="tel:<?= $inmueble->telefono ?>" class="subtitulo">Telefono de contacto: <?= $inmueble->telefono ?> </a>
        <div class="grid-descripcion">
            <div class="itemPhoto">
                <div class="photo"></div>
            </div>
            <div class="itemInfo1">
                <p class="info"> Arrendador: <?= $arrendador->nombre . " " . $arrendador->apellidoPaterno  ?></p>
            </div>
            <div class="itemInfo2">
                <p class="info"> Experiencia: 3 años </p>
            </div>
        </div>
        <hr>
        <h1 class="titulo2"> Descripción </h1>
        <div class="descripcion">
            <p>
                <?= $inmueble->descripcion ?>
            </p>
        </div>
        <hr>
        <h1 class="titulo2"> Sercicios del inmueble </h1>
        <div class="grid-servicios">
            <?php
            if ($inmueble->internet) {
            ?>
                <div class="servicios"> <span class="material-symbols-outlined">Wifi</span> </div>
                <div class="itemInfo1">
                    <p> Wi-Fi </p>
                </div>
            <?php
            }
            ?>

            <?php
            if ($inmueble->luz) {
            ?>
                <div class="servicios"> <span class="material-symbols-outlined">Bolt</span> </div>
                <div class="itemInfo2">
                    <p> Electricidad </p>
                </div>
            <?php
            }
            ?>

            <?php
            if ($inmueble->garage) {
            ?>
                <div class="servicios"> <span class="material-symbols-outlined">directions_car</span> </div>
                <div class="itemInfo3">
                    <p> Cochera </p>
                </div>
            <?php
            }
            ?>

            <?php
            if ($inmueble->agua) {
            ?>
                <div class="servicios"> <span class="material-symbols-outlined">water_drop</span> </div>
                <div class="itemInfo4">
                    <p> Agua </p>
                </div>
            <?php
            }
            ?>
        </div>
        <hr>
        <div class="back">
            <div class="grid-ranking">
                <div class="puntuacion">
                    <p> 5.0 </p>
                </div>
                <div class="puntuaInfo">
                    <p> Favorito entre huespedes </p>
                </div>
                <div class="puntuaInfo2">
                    <p> Un alojamiento muy popular en Aloha según las calificaciones, evaluaciones y confiabilidad </p>
                </div>
            </div>
        </div>
        <hr> 
        <div class="grid">
            <div class="contenedor">
                <div class="grid-comentarios">
                    <div class="itemPhoto">
                        <div class="photo2"></div>
                    </div>
                    <div>
                        <p class="info"> Felipe Lopez </p>
                    </div>
                    <div>
                        <p class="info"> Uriangato, Guanajuato </p>
                    </div>
                </div>
                <div class="tituloComentario">
                    <p> Hace 1 semana </p>
                </div>
                <div class="comentario">
                    <p> La casa está muy bonita, cómoda y equipada, espacios muy amplios, áreas verdes hermosas y la alberca muy limpia y agua caliente. El personal muy amable y al pendiente de todo. </p>
                </div>
            </div>
            <div class="contenedor">
                <div class="grid-comentarios">
                    <div class="itemPhoto">
                        <div class="photo2"></div>
                    </div>
                    <div>
                        <p class="info"> Felipe Lopez </p>
                    </div>
                    <div>
                        <p class="info"> Uriangato, Guanajuato </p>
                    </div>
                </div>
                <div class="tituloComentario">
                    <p> Hace 1 semana </p>
                </div>
                <div class="comentario">
                    <p> La casa está muy bonita, cómoda y equipada, espacios muy amplios, áreas verdes hermosas y la alberca muy limpia y agua caliente. El personal muy amable y al pendiente de todo. </p>
                </div>
            </div>
            <div class="contenedor">
                <div class="grid-comentarios">
                    <div class="itemPhoto">
                        <div class="photo2"></div>
                    </div>
                    <div>
                        <p class="info"> Felipe Lopez </p>
                    </div>
                    <div>
                        <p class="info"> Uriangato, Guanajuato </p>
                    </div>
                </div>
                <div class="tituloComentario">
                    <p> Hace 1 semana </p>
                </div>
                <div class="comentario">
                    <p> La casa está muy bonita, cómoda y equipada, espacios muy amplios, áreas verdes hermosas y la alberca muy limpia y agua caliente. El personal muy amable y al pendiente de todo. </p>
                </div>
            </div>
            <div class="contenedor">
                <div class="grid-comentarios">
                    <div class="itemPhoto">
                        <div class="photo2"></div>
                    </div>
                    <div>
                        <p class="info"> Felipe Lopez </p>
                    </div>
                    <div>
                        <p class="info"> Uriangato, Guanajuato </p>
                    </div>
                </div>
                <div class="tituloComentario">
                    <p> Hace 1 semana </p>
                </div>
                <div class="comentario">
                    <p> La casa está muy bonita, cómoda y equipada, espacios muy amplios, áreas verdes hermosas y la alberca muy limpia y agua caliente. El personal muy amable y al pendiente de todo. </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>