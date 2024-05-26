<?php
    session_destroy();
    // session_start();
    // unset($_SERVER);
    // unset($_SESSION["correo"]);
    // unset($_SESSION["rol"]);
    // unset($_SESSION["nombre"]);
    header("Location: login.php");
?>