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

    <!-- <nav class="navbar">
        <div class="icon">
            <a href="#">
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

    <?php 
    require("components/menu_publico.php");
        //session_start();
        //$_SESSION["algo"]=1;
        //unset($_SESSION["correo"]);
        //if(!(isset($_SESSION["correo"]) && strlen($_SESSION["correo"])>0))
        //{
        //    header("Location: login.php");
        //}
        //var_dump($_SESSION);
    ?>

    <div class="container">
        <div class="izq">
            <form class="filtros">
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
                            <input type="number" class="input-min" value="1000" step="100">
                        </div>
                        <div class="campoPrecio">
                            <span>Max</span>
                            <input type="number" class="input-max" value="5000" step="100">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progreso">

                        </div>
                    </div>
                </div>

                <div class="filtro-ranking">
                    <span class="subtitulos">Ranking</span>
                    <div class="rank">
                        <button class="material-symbols-outlined star" value="1">star</b>
                            <button class="material-symbols-outlined star" value="2">star</button>
                            <button class="material-symbols-outlined star" value="3">star</but>
                                <button class="material-symbols-outlined star" value="4">star</button>
                                <button class="material-symbols-outlined star" value="5">star</but>
                    </div>
                </div>
            </form>

            <div class="botones">
                <a href="ubicaciones.html"><button type="button">
                    <span id="btn-text">Ver más ubicaciones</span>
                    <span id="btn-icon" class="material-symbols-outlined">search
                </button></a>
            </div>
        </div>

        <div class="der">
            <div class="item-alquiler">
                <div class="imagen">
                    <img src="img/photo.png" alt="Imagen de inmueble">
                </div>

                <div class="datos-generales">
                    <h2>Nombre de inmueble</h2>
                    <div class="mostrar-rank">
                        <span class="material-symbols-outlined star">star</span>
                        <span class="material-symbols-outlined star">star</span>
                        <span class="material-symbols-outlined star">star</span>
                        <span class="material-symbols-outlined star">star</span>
                        <span class="material-symbols-outlined star">star</span>
                    </div>
                    <div class="ubicacion">
                        <span class="material-symbols-outlined">location_on</span>
                        <span class="texto-inf">Uriangato, Guanajuato</span>
                    </div>
                    <div class="servicios">
                        <span class="material-symbols-outlined">Wifi</span>
                        <span class="material-symbols-outlined">directions_car</span>
                        <span class="material-symbols-outlined">Bolt</span>
                        <span class="material-symbols-outlined">water_drop</span>
                        <span class="material-symbols-outlined">shower</span>
                    </div>
                </div>

                <div class="mas-detalles">
                    <div class="precio-logo">
                        <span class="titulos">$</span>
                        <span class="titulos">1,600</span>
                    </div>
                    <div class="botones">
                        <a href="detalle_inmuebles.php" target="_blank"><button>
                                <span id="btn-text">Ver más</span>
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>