<?php
    session_start();
    require_once("../data/DAOUsuario.php");
    if ($_SESSION["rol"] != "Administrador") {
        header("Location: cerrar_sesion.php");
    }

    $usuario = new Usuario();
    if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
        //var_dump($_GET["id"]);
        $usuario = (new DAOUsuario())->getUser((int) $_POST["id"]);
        if($usuario->estatus == "Verificado"){
            $usuario->estatus = "No verificado";
            
        }else{
            $usuario->estatus = "Verificado";
        }
        if((new DAOUsuario())->editarVerificacion($usuario)){
            $_SESSION["msg"] = "alert-success--Se cambió la verificación con éxito.";
        }else{
            $_SESSION["msg"] = "alert-danger--Error al cambiar la verificación del usuario: " . $usuario->nombre . ".";
        }
        header("Location: lista_arrendadores.php");
    }
    //var_dump($usuario);
?>