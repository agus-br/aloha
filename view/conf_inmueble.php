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

    $showBackError = "";
    $errorMessage = "Preparado para arrojar errores";

    if (isset($_SESSION["msgError"]) && strlen($_SESSION["msgError"]) > 0) {
        $showBackError = "show";
        $errorMessage = $_SESSION["msgError"];
        unset($_SESSION["msgError"]);
    }
    $inmueble = new Inmueble();

    if (isset($_SESSION["nombreTemp"]) || isset($_POST["txtNombre"])) {
        $_SESSION["nombreTemp"] = $_POST["txtNombre"];
        $inmueble->nombre = $_SESSION["nombreTemp"];
    }

    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        //var_dump($_GET["id"]);
        //Cuando se recibe el id entonces hay que obtener los datos del inmueble
        $inmueble = (new DAOInmueble())->getInmuebleArrendador((int) $_SESSION["id"], (int) $_GET["id"]);
        $_SESSION["currentInmueble"] = $_GET["id"];
        $_SESSION["nombreTemp"] = $inmueble->nombre;
        
    } elseif (isset($_POST["txtId"])) {
        $_SESSION["nombreTemp"] = $_POST["txtNombre"];
        $_SESSION["currentInmueble"] = $_POST["txtId"];

        if (
            isset($_POST["txtNombre"]) && isset($_POST["txtTelefono"]) &&
            isset($_POST["txtPrecio"]) && isset($_POST["txtaDescripcion"]) && isset($_POST["txtEstado"]) &&
            isset($_POST["txtMunicipio"]) && isset($_POST["txtColonia"]) && isset($_POST["txtDireccion"]) &&
            isset($_POST["txtLatitud"]) && isset($_POST["txtLongitud"]) && isset($_POST["rbtnEstatus"])
        ) {
            if (
                is_numeric($_POST["txtId"]) && is_numeric($_POST["txtPrecio"]) && is_numeric($_POST["txtTelefono"])
                && is_numeric($_POST["txtLatitud"]) && is_numeric($_POST["txtLongitud"])
            ) {
                if (
                    $_POST["txtTelefono"] > 0 &&
                    $_POST["txtPrecio"] > 0 && $_POST["txtPrecio"] <= 50000 &&
                    strlen($_POST["txtNombre"]) > 0 && strlen($_POST["txtNombre"]) <= 50 &&
                    strlen($_POST["txtTelefono"]) > 0 && strlen($_POST["txtTelefono"]) <= 10 &&
                    strlen($_POST["txtaDescripcion"]) < 500 &&
                    strlen($_POST["txtEstado"]) > 0 && strlen($_POST["txtEstado"]) <= 50 &&
                    strlen($_POST["txtMunicipio"]) > 0 && strlen($_POST["txtMunicipio"]) <= 50 &&
                    strlen($_POST["txtColonia"]) > 0 && strlen($_POST["txtColonia"]) <= 50 &&
                    strlen($_POST["txtDireccion"]) > 0 && strlen($_POST["txtDireccion"]) <= 50 &&
                    strlen($_POST["txtLatitud"]) > 0 && strlen($_POST["txtLatitud"]) <= 50 &&
                    strlen($_POST["txtLongitud"]) > 0 && strlen($_POST["txtLongitud"]) <= 50
                ) {
                    $id = $_POST["txtId"];
                    $inmueble->id = $id;
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
                    if ($id == 0) {
                        //echo "GUARDAR";
                        //var_dump($inmueble);
                        $res = (new DAOInmueble())->agregar($inmueble);
                        if ($res != 0) {
                            header("Location: lista_inmuebles.php");
                            
                            unset($_SESSION["nombreTemp"]);
                            unset($_SESSION["currentInmueble"]);
                        } else {
                            $showBackError = "show";
                            $errorMessage = "Error al guardar los datos del inmueble.";
                        }
                    } else {
                        //echo "EDITAR";
                        //var_dump($inmueble);
                        $res = (new DAOInmueble())->editar($inmueble);
                        if ($res) {
                            header("Location: lista_inmuebles.php");
                            unset($_SESSION["nombreTemp"]);
                            unset($_SESSION["currentInmueble"]);
                        } else {
                            $showBackError = "show";
                            $errorMessage = "Error al editar el inmueble.";
                        }
                    }
                } else {
                    $showBackError = "show";
                    $errorMessage = "Error. Formáto de datos inválido longitudes excedentes.";
                }
            } else {
                $showBackError = "show";
                $errorMessage = "Error. Formato de datos inválido.";
            }
        } else {
            $showBackError = "show";
            $errorMessage = "Error. Conjunto de datos incompleto.";
        }
    }else{
        if (isset($_SESSION["nombreTemp"])) {
            $inmueble->nombre = $_SESSION["nombreTemp"];
        }
    }
    ?>
    <div class="container">
        <form class="derecha" method="POST" action="conf_inmueble.php" enctype="multipart/form-data">
            <div class="msg-warning <?= $showBackError ?>">
                <?= $errorMessage ?>
            </div>
            <input type="hidden" id="txtId" name="txtId" value="<?= isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0 ?>">
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
                        <input type="text" name="txtNombre" id="txtNombre" required maxlength="50" value="<?= $inmueble->nombre ?>">
                        <div class="msg-error" id="error-nombre">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div id="group">
                        <fieldset id="estatus" class="input-group">
                            <legend class="subtitulos">Estatus del inmueble</legend>
                            <label><input type="radio" required name="rbtnEstatus" value="Disponible" <?= ($inmueble->estatus == 'Disponible') ? 'checked' : '' ?>>Disponible</label>
                            <label><input type="radio" required name="rbtnEstatus" value="Ocupado" <?= ($inmueble->estatus == 'Ocupado') ? 'checked' : '' ?>>Ocupado</label>
                            <label><input type="radio" required name="rbtnEstatus" value="Fuera de servicio" <?= ($inmueble->estatus == 'Fuera de servicio') ? 'checked' : '' ?>>Fuera de servicio</label>
                            <div class="msg-error" id="error-estatus">
                                Este es un mensaje de error
                            </div>
                        </fieldset>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Descripción</span>
                        <textarea name="txtaDescripcion" maxlength="500" id="txtaDescripcion" cols="30" rows="5"><?= $inmueble->descripcion ?></textarea>
                        <div class="msg-error" id="error-descripcion">
                            Este es un mensaje de error
                        </div>
                    </div>
                </div>
                <div class="med">
                    <div class="med-row">
                        <div class="campo-texto">
                            <span class="subtitulos">Teléfono de contacto</span>
                            <input type="text" name="txtTelefono" id="txtTelefono" required maxlength="10" pattern="[0-9]+" value="<?= $inmueble->telefono ?>">
                            <div class="msg-error" id="error-telefono">
                                Este es un mensaje de error
                            </div>
                        </div>
                        <div class="campo-texto">
                            <span class="subtitulos">Precio</span>
                            <input type="text" id="txtPrecio" name="txtPrecio" required value="<?= $inmueble->precioAlquiler == 0 ? "" : $inmueble->precioAlquiler ?>">
                            <div class="msg-error" id="error-precio">
                                Este es un mensaje de error
                            </div>
                        </div>
                    </div>
                    <div id="group">
                        <fieldset id="servicios" class="input-group">
                            <legend class="subtitulos">Servicios del inmueble</legend>
                            <label><input type="checkbox" name="internet" <?= $inmueble->internet == 1 ? 'checked' : '' ?>>Internet</label>
                            <label><input type="checkbox" name="agua" <?= $inmueble->agua == 1 ? 'checked' : '' ?>>Agua</label>
                            <label><input type="checkbox" name="luz" <?= $inmueble->luz == 1 ? 'checked' : '' ?>>Luz</label>
                            <label><input type="checkbox" name="garage" <?= $inmueble->garage == 1 ? 'checked' : '' ?>>Garage</label>
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
                        <input type="text" id="txtEstado" name="txtEstado" required maxlength="50" value="<?= $inmueble->estado ?>">
                        <div class="msg-error" id="error-estado">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Colonia</span>
                        <input type="text" id="txtColonia" name="txtColonia" required maxlength="50" value="<?= $inmueble->colonia ?>">
                        <div class="msg-error" id="error-colonia">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Latitud</span>
                        <input type="text" id="txtLatitud" name="txtLatitud" required maxlength="50" id="txtLatitud" value="<?= $inmueble->latitud ?>">
                        <div class="msg-error" id="error-latitud">
                            Este es un mensaje de error
                        </div>
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
                        <input type="text" id="txtMunicipio" name="txtMunicipio" required maxlength="50" value="<?= $inmueble->municipio ?>">
                        <div class="msg-error" id="error-municipio">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Dirección</span>
                        <input type="text" id="txtDireccion" name="txtDireccion" required maxlength="50" value="<?= $inmueble->direccion ?>">
                        <div class="msg-error" id="error-direccion">
                            Este es un mensaje de error
                        </div>
                    </div>
                    <div class="campo-texto">
                        <span class="subtitulos">Longitud</span>
                        <input type="text" id="txtLongitud" name="txtLongitud" required maxlength="50" id="txtLongitud" value="<?= $inmueble->longitud ?>">
                        <div class="msg-error" id="error-longitud">
                            Este es un mensaje de error
                        </div>
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
                <a href="borrar_inmueble.php?id=<?= $inmueble->id ?>"><button type="button" class="action-btn-default-del">Eliminar</button></a>
                <button type="submit" id="btn-guardar" class="action-btn-default">Guardar</button>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/map.js"></script>
</body>

</html>