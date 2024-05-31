<?php
    require_once("../data/DAOInmueble.php");
    session_start();
    //echo $_GET["id"];
    //echo $_SESSION["currentInmueble"];
    if (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_SESSION["currentInmueble"] == $_GET["id"]) {
        if($_GET["id"] > 0){
            $res = (new DAOInmueble())->eliminar($_GET["id"]);
            if($res != 0){
                unset($_SESSION["currentInmueble"]);
                header("Location: lista_inmuebles.php");
            }else{
                $_SESSION["msgError"] = "Error al eliminar el inmueble";
                header("Location: conf_inmueble.php?id=". $_SESSION["currentInmueble"]);
            }
        }else{
            $_SESSION["msgError"] = "El inmueble no existe";
            header("Location: conf_inmueble.php?id=" . $_SESSION["currentInmueble"]);
        }
    }else{
        $_SESSION["msgError"] = "Error al procesar solicitud";
        unset($_SESSION["currentInmueble"]);
        header("Location: conf_inmueble.php");
    }
    //echo $_SESSION["msgError"];
?>