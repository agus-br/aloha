<?php
    session_start();
    unset($_SESSION["correo"]);
    unset($_SESSION["rol"]);
    unset($_SESSION["nombre"]);
    header("Location: login.php");
?>