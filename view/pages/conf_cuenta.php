<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuraciones.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Configuración cuenta</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.html">
                <img src="img/aloha.png" alt="Logo de Aloha">
            </a>
        </div>
        <div class="titulo">
            <h1>Configuración</h1>
        </div>
    </nav>

    <div class="container">
        <form class="izquierda">
            <div class="detalles-usuario">
                <span id="logo-usuario" class="material-symbols-outlined">account_circle</span>
                <span class="nombre-usuario">Nombre de usuario</span>
            </div>
            <button type="button" class="categoria">
                <a href="conf_perfil.html">
                    <span id="logo-perfil" class="material-symbols-outlined">person_edit</span>
                    <span>Perfil</span>
                </a>
            </button>
            <button type="button" class="categoria">
                <a href="conf_cuenta.html">
                    <span id="logo-settings" class="material-symbols-outlined">settings</span>
                    <span>Cuenta</span>
                </a>
            </button>
            <button type="button" class="categoria">
                <a href="lista_inmuebles.html">
                    <span id="logo-home" class="material-symbols-outlined">home</span>
                    <span>Inmuebles</span>
                </a>
            </button>
        </form>

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