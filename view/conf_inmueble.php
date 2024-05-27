<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/conf_inmuebles.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/galeria.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Configuración de inmueble</title>
</head>

<body>
    <?php
    require("menu_privado.php");
    ?>

    <div class="container">
        <form class="derecha" method="POST" action="dataInmueble.php" enctype="multipart/form-data">
            <div class="titulos">
                <span>Configuración de inmueble</span>
            </div>
            <div class="encabezados">
                <span>Datos generales del inmueble</span>
            </div>
            <div class="galeria">
                <div class="item">
                    <img src="img/photo.png" alt="">
                    <div class="btn-iconos">
                        <span class="material-symbols-outlined">delete</span>
                        <span class="material-symbols-outlined">edit_square</span>
                    </div>
                </div>
                <div class="item">
                    <img src="img/photo.png" alt="">
                    <div class="btn-iconos">
                        <span class="material-symbols-outlined">delete</span>
                        <span class="material-symbols-outlined">edit_square</span>
                    </div>
                </div>
                <div class="item">
                    <img src="img/photo.png" alt="">
                    <div class="btn-iconos">
                        <span class="material-symbols-outlined">delete</span>
                        <span class="material-symbols-outlined">edit_square</span>
                    </div>
                </div>
                <div class="item">
                    <img src="img/photo.png" alt="">
                    <div class="btn-iconos">
                        <span class="material-symbols-outlined">delete</span>
                        <span class="material-symbols-outlined">edit_square</span>
                    </div>
                </div>
                <div class="item-vacio">
                    <div class="btn-iconos">
                        <span class="material-symbols-outlined">add</span>
                    </div>
                </div>
            </div>
            <div class="campos">
                <div class="med">
                    <div class="campo-texto">
                        <span class="subtitulos">Nombre público</span>
                        <input type="text" id="txtNombre">
                    </div>
                    <div id="group">
                        <fieldset id="estatus" class="input-group">
                            <legend class="subtitulos">Estatus del inmueble</legend>
                            <label><input type="radio" name="estus">Disponible</label>
                            <label><input type="radio" name="estus">Ocupado</label>
                            <label><input type="radio" name="estus">Fuera de servicio</label>
                        </fieldset>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Descripción</span>
                        <textarea name="txtaDescripcion" id="txtaDescripcion" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="med">
                    <div class="med-row">
                        <div class="campo-texto">
                            <span class="subtitulos">Teléfono de contacto</span>
                            <input type="text">
                        </div>
                        <div class="campo-texto">
                            <span class="subtitulos">Precio</span>
                            <input type="text">
                        </div>
                    </div>
                    <div id="group">
                        <fieldset id="servicios" class="input-group">
                            <legend class="subtitulos">Servicios del inmueble</legend>
                            <label><input type="checkbox" name="servicios">Internet</label>
                            <label><input type="checkbox" name="servicios">Agua</label>
                            <label><input type="checkbox" name="servicios">Lus</label>
                            <label><input type="checkbox" name="servicios">Garage</label>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="encabezados">
                <span>Datos generales del inmueble</span>
            </div>
            <div class="campos">
                <div class="med">
                    <div class="campo-texto">
                        <span class="subtitulos">Estado</span>
                        <input type="text">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Colonia</span>
                        <input type="text">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Latitud</span>
                        <input type="text" id="txtLatitud">
                    </div>
                    <!-- <div class="med-row">
                        <div class="campo-texto">
                            <span class="subtitulos">No. Ext. Numérico</span>
                            <input type="text">
                        </div>
                        <div class="campo-texto">
                            <span class="subtitulos">No. Ext. Alfaumérico</span>
                            <input type="text">
                        </div>
                    </div> -->
                </div>
                <div class="med">
                    <div class="campo-texto">
                        <span class="subtitulos">Municipio</span>
                        <input type="text">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Calle</span>
                        <input type="text">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Longitud</span>
                        <input type="text" id="txtLongitud">
                    </div>
                    <!-- <div class="med-row">
                        <div class="campo-texto">
                            <span class="subtitulos">No. Int. Numérico</span>
                            <input type="text">
                        </div>
                        <div class="campo-texto">
                            <span class="subtitulos">No. Int. Alfanumérico</span>
                            <input type="text">
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="encabezados">
                <span>Vista previa de la ubicación</span>
            </div>
            <div class="campos">
                <div class="map" id="previewMap">

                </div>
            </div>

            <div class="btn-container">
                <button class="action-btn-default-del">Eliminar</button>
                <button class="action-btn-default">Guardar</button>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/map.js"></script>
</body>

</html>