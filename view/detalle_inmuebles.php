<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/inmuebles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Detalle inmuebles</title>
</head>

<body>

    <?php
    require("menu_publico.php");
    ?>
    <!-- <nav class="navbar">
        <div class="icon">
            <a href="index.html">
                <img src="img/head-aloha.png" alt="Aloja">
            </a>
        </div>
        <div id="header-derecha">
            <div class="login-signup">
                <a href="login.html">Iniciar sesión</a>
                <a href="signup.html">Registrarse</a>
            </div>

            <div class="menu-amburguesa">
                <label id="menu-logo" for="check">
                    <span class="material-symbols-outlined">menu</span>
                </label>
                <input type="checkbox" id="check">
                <div class="menu">
                    <ul>
                        <li><a href="conf_perfil.html">Configuración</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> -->


    <div class="father">
        <h1 class="titulo"> Nombre del inmueble </h1>
        <div class="grid-galeria">
            <div class="item1"> </div>
            <div class="item2"> </div>
            <div class="item3"> </div>
            <div class="item4"> </div>
            <div class="botones">

            </div>
        </div>
        <h1 class="titulo"> Nombre del inmueble: departamento, en Uriangato, Guanajuato </h1>
        <p class="subtitulo"> 3 personas - 3 habitaciones - 3 camas - 3 baños </p>
        <div class="grid-descripcion">
            <div class="itemPhoto">
                <div class="photo"></div>
            </div>
            <div class="itemInfo1">
                <p class="info"> Arrendador: Felipe Lopez </p>
            </div>
            <div class="itemInfo2">
                <p class="info"> Experiencia: 3 años </p>
            </div>
        </div>
        <hr>
        <h1 class="titulo2"> Descripción </h1>
        <div class="descripcion">
            <p>
                El departamento en Uriangato, Guanajuato, es un alojamiento cómodo para hasta 4 personas, con 3 habitaciones y camas. Ofrece servicios esenciales como wifi, cochera, electricidad y agua potable, además de baños bien equipados. Ubicado en una zona tranquila, brinda privacidad y comodidad para familias o grupos pequeños. La conexión wifi y la cochera garantizan la comodidad y seguridad de los huéspedes, mientras que los servicios de electricidad y agua potable aseguran una estancia sin preocupaciones. Este alojamiento es ideal para explorar Uriangato y sus alrededores, ofreciendo una experiencia de viaje sin contratiempos en esta encantadora región de México.
            </p>
        </div>
        <hr>
        <h1 class="titulo2"> Lo que ofrece este lugar </h1>
        <div class="grid-servicios">
            <div class="servicios"> <span class="material-symbols-outlined">Wifi</span> </div>
            <div class="itemInfo1">
                <p> Wi-Fi </p>
            </div>

            <div class="servicios"> <span class="material-symbols-outlined">Bolt</span> </div>
            <div class="itemInfo2">
                <p> Electricidad </p>
            </div>

            <div class="servicios"> <span class="material-symbols-outlined">directions_car</span> </div>
            <div class="itemInfo3">
                <p> Cochera </p>
            </div>

            <div class="servicios"> <span class="material-symbols-outlined">water_drop</span> </div>
            <div class="itemInfo4">
                <p> Agua </p>
            </div>

            <div class="servicios"> <span class="material-symbols-outlined">shower</span> </div>
            <div class="itemInfo5">
                <p> Baño </p>
            </div>
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
        <!-- <hr> -->
        <!-- <div class="grid">
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
        </div> -->
    </div>

</body>

</html>