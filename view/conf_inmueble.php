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
    require_once("../data/DAOInmueble.php");
    if ($_SESSION["rol"] != "Arrendador") {
        header("Location: home.php");
    }

    $inmueble = new Inmueble();
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        //var_dump($_GET["id"]);
        //Cuando se recibe el id entonces hay que obtener los datos del inmueble
        $inmueble = (new DAOInmueble())->getInmuebleArrendador((int) $_SESSION["id"], (int) $_GET["id"]);
    } elseif (count($_POST) > 0) {
        $id = $_POST["txtId"];
        if ($id == 0) {
            $inmueble->arrendador = $_SESSION["id"];
            $inmueble->nombre = $_POST["txtNombre"];
            $inmueble->telefono = $_POST["txtTelefono"];
            $inmueble->precioAlquiler = $_POST["txtPrecio"];
            $inmueble->descripcion = $_POST["txtaDescripcion"];
            $inmueble->estado = $_POST["txtEstado"];
            $inmueble->municipio = $_POST["txtMunicipio"];
            $inmueble->colonia = $_POST["txtColonia"];
            $inmueble->direccion = $_POST["txtDireccion"];
            $inmueble->latitud = $_POST["txtLatitud"];
            $inmueble->longitud = $_POST["txtLongitud"];
            $inmueble->internet = isset($_POST["internet"]);
            $inmueble->agua = isset($_POST["agua"]);
            $inmueble->luz = isset($_POST["luz"]);
            $inmueble->garage = isset($_POST["garage"]);
            $inmueble->estatus = $_POST["rbtnEstatus"];
            $res = (new DAOInmueble())->agregar($inmueble);
            if($res != 0){
                header("Location: lista_inmuebles.php");
            }
        } else {
            $inmueble->id = $_POST["txtId"];;
            $inmueble->arrendador = $_SESSION["id"];
            $inmueble->nombre = $_POST["txtNombre"];
            $inmueble->telefono = $_POST["txtTelefono"];
            $inmueble->precioAlquiler = $_POST["txtPrecio"];
            $inmueble->descripcion = $_POST["txtaDescripcion"];
            $inmueble->estado = $_POST["txtEstado"];
            $inmueble->municipio = $_POST["txtMunicipio"];
            $inmueble->colonia = $_POST["txtColonia"];
            $inmueble->direccion = $_POST["txtDireccion"];
            $inmueble->latitud = $_POST["txtLatitud"];
            $inmueble->longitud = $_POST["txtLongitud"];
            $inmueble->internet = isset($_POST["internet"]);
            $inmueble->agua = isset($_POST["agua"]);
            $inmueble->luz = isset($_POST["luz"]);
            $inmueble->garage = isset($_POST["garage"]);
            $inmueble->estatus = $_POST["rbtnEstatus"];
            $res = (new DAOInmueble())->editar($inmueble);
            if ($res) {
                header("Location: lista_inmuebles.php");
            }
        }
    } else {
    }
    ?>
    <div class="container">

        <form class="derecha" method="POST" action="conf_inmueble.php" enctype="multipart/form-data">
            <input type="hidden" id="txtId" name="txtId" value="<?= $inmueble->id ?>">
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
                        <input type="text" name="txtNombre" id="txtNombre" value="<?= $inmueble->nombre ?>">
                    </div>
                    <div id="group">
                        <fieldset id="estatus" class="input-group">
                            <legend class="subtitulos">Estatus del inmueble</legend>
                            <label><input type="radio" name="rbtnEstatus" value="Disponible" <?= ($inmueble->estatus == 'Disponible') ? 'checked' : '' ?>>Disponible</label>
                            <label><input type="radio" name="rbtnEstatus" value="Ocupado" <?= ($inmueble->estatus == 'Ocupado') ? 'checked' : '' ?>>Ocupado</label>
                            <label><input type="radio" name="rbtnEstatus" value="Fuera de servicio" <?= ($inmueble->estatus == 'Fuera de servicio') ? 'checked' : '' ?>>Fuera de servicio</label>
                        </fieldset>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Descripción</span>
                        <textarea name="txtaDescripcion" id="txtaDescripcion" cols="30" rows="5"><?= $inmueble->descripcion ?></textarea>
                    </div>
                </div>
                <div class="med">
                    <div class="med-row">
                        <div class="campo-texto">
                            <span class="subtitulos">Teléfono de contacto</span>
                            <input type="text" name="txtTelefono" value="<?= $inmueble->telefono ?>">
                        </div>
                        <div class="campo-texto">
                            <span class="subtitulos">Precio</span>
                            <input type="text" name="txtPrecio" value="<?= $inmueble->precioAlquiler ?>">
                        </div>
                    </div>
                    <div id="group">
                        <fieldset id="servicios" class="input-group">
                            <legend class="subtitulos">Servicios del inmueble</legend>
                            <label><input type="checkbox" name="internet" <?= $inmueble->internet ? 'checked' : '' ?>>Internet</label>
                            <label><input type="checkbox" name="agua" <?= $inmueble->agua ? 'checked' : '' ?>>Agua</label>
                            <label><input type="checkbox" name="luz" <?= $inmueble->luz ? 'checked' : '' ?>>Luz</label>
                            <label><input type="checkbox" name="garage" <?= $inmueble->garage ? 'checked' : '' ?>>Garage</label>
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
                        <input type="text" name="txtEstado" value="<?= $inmueble->estado ?>">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Colonia</span>
                        <input type="text" name="txtColonia" value="<?= $inmueble->colonia ?>">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Latitud</span>
                        <input type="text" name="txtLatitud" id="txtLatitud" value="<?= $inmueble->latitud ?>">
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
                        <input type="text" name="txtMunicipio" value="<?= $inmueble->municipio ?>">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Dirección</span>
                        <input type="text" name="txtDireccion" value="<?= $inmueble->direccion ?>">
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Longitud</span>
                        <input type="text" name="txtLongitud" id="txtLongitud" value="<?= $inmueble->longitud ?>">
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
                <button type="submit" class="action-btn-default">Guardar</button>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/map.js"></script>
</body>

</html>