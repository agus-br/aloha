<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <title>Lista de arrendadores</title>
</head>

<body>
    <?php
    require("menu_privado.php");
    if ($_SESSION["rol"] != "Administrador") {
        header("Location: home.php");
    } 
    if (isset($_SESSION["msgError"])) {
        $msgInfo = $_SESSION["msgError"];
        echo "<div class='alert'>$msgInfo</div>";
        unset($_SESSION["msgError"]);
    }
    if (isset($_SESSION["msgSuccess"])) {
        $msgInfo = $_SESSION["msgSuccess"];
        echo "<div class='alert'>$msgInfo</div>";
        unset($_SESSION["msgSuccess"]);
    }
    ?>
    <main>
        <div class="container">
            <?php
                require_once("../data/DAOUsuario.php");
                $usuario = new Usuario();
                if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
                    //var_dump($_GET["id"]);
                    //Cuando se recibe el id entonces hay que obtener los datos del usuario
                    $usuario = (new DAOUsuario())->getUser((int) $_POST["id"]);
                    if ($usuario->rol == "Arrendador") {
                        $eliminado = (new DAOUsuario())->eliminar((int) $_POST["id"]);
                        if ($eliminado > 0) {
                            $_SESSION["msg"] = "alert-success--Usuario eliminado exitósamente";
                        } else {
                            $_SESSION["msg"] = "alert-danger--No se ha podido eliminar al usuario seleccionado debido a que tiene procesos relacionados";
                        }
                    } else {
                        $_SESSION["msg"] = "alert-danger--Error inesperado";
                    }
                }

                if (isset($_SESSION["msg"])) {
                    $msgInfo = explode("--", $_SESSION["msg"]);
                    echo "<div class='alert $msgInfo[0]'>$msgInfo[1]</div>";
                    unset($_SESSION["msg"]);
                }
            ?>
            <table id="tblUsuarios" class="table table-striped">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Telefono</th>
                        <th>Estatus de verificación</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../data/DAOUsuario.php");
                    $lista = (new DAOUsuario())->obtenerArrendadores();
                    foreach ($lista as $usuario) {
                        echo "<tr>
                        <td>$usuario->apellidoPaterno $usuario->apellidoMaterno $usuario->nombre</td>
                        <td>" . $usuario->correo . "</td>
                        <td>$usuario->rol</td>
                        <td>$usuario->telefono</td>
                        <td>$usuario->estatus</td>
                        <td>
                        <a href='editar_arrendador.php?id=$usuario->id' class='btn btn-success'>Editar</a>
                        </td>
                        <td>
                        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#mdlEliminar' value='$usuario->id' nombre='$usuario->apellidoPaterno $usuario->apellidoMaterno $usuario->nombre'>Eliminar</button>
                        </td>
                    </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <div class="modal" tabindex="-1" id="mdlEliminar" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Está a punto de eliminar al usuario <b id="UsuarioEliminar">Luis Perez</b>, ¿Desea continuar?
                </div>
                <div class="modal-footer">
                    <form action="lista_arrendadores.php" method="post">
                        <button type="submit" class="btn btn-danger" id="btnEliminar" name="id">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="validation/lista_arrendadores.js"></script>
</body>

</html>