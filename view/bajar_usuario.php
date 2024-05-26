<?php
    require_once("menu_privado.php");
    require_once("../data/DAOUsuario.php");
    $usuario = new Usuario();
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        //var_dump($_GET["id"]);
        //Cuando se recibe el id entonces hay que obtener los datos del usuario
        $usuario = (new DAOUsuario())->getUser((int) $_GET["id"]);
        if($usuario->rol == "Arrendador"){
            $eliminado = (new DAOUsuario())->eliminar((int) $_GET["id"]);
            if($eliminado){
                session_start();
                $_SESSION["msgSuccess"] = "Se ha eliminamdo al usuario: " + $usuario->nombre;
            }else{ 
                session_start();
                $_SESSION["msgError"] = "Error al eliminar el arrendador.";
            }
        }else{
            session_start();
            $_SESSION["msgError"] = "Error al eliminar el arrendador.";
        }
    }
    header("Location: lista_arrendadores.php");
?>