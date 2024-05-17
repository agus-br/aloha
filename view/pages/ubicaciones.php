<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/ubicaciones.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Mapa de ubicaciones de inmuebles</title>
</head>

<body>

    <nav class="navbar">
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
    </nav>

    <div class="container">
        <div class="izq">
            <button type="button" class="short-list-inmuebles">
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
                    </div>

                </div>
            </button>

            <div class="botones">
                <button type="button">
                    <span id="btn-text">Ver más ubicaciones</span>
                    <span id="btn-icon" class="material-symbols-outlined">arrow_right_alt</span>
                </button>
            </div>
        </div>

        <div class="der">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d29968.07444296879!2d-101.1721243098702!3d20.133659392765768!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smx!4v1710824593940!5m2!1sen!2smx"
                width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</body>

</html>