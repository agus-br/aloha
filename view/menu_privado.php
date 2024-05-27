<!-- <?php
        session_start();
        //$_SESSION["algo"]=1;
        //unset($_SESSION["correo"]);
        if (!(isset($_SESSION["correo"]) && strlen($_SESSION["correo"]) > 0)) {
            header("Location: login.php");
        }
        ?> -->
<nav class="navbar">
    <div class="icon">
        <a href="home.php">
            <img src="img/head-aloha.png" alt="Aloja">
        </a>
    </div>
    <div id="header-derecha">
        <div class="login-signup">
            <!-- <a>Usuario</a> -->
            <a href="conf_perfil.php">
                <?php
                echo $_SESSION["nombre"];
                ?>
            </a>
            <?php
            if ($_SESSION["rol"] == "Arrendador") {
                echo "<a href='lista_inmuebles.php'>Mis inmuebles</a>";
            }else if($_SESSION["rol"] == "Administrador"){
                echo "<a href='lista_arrendadores.php'>Arrendadores</a>";
            }
            ?>
        </div>
        <div class="menu-amburguesa">
            <label id="menu-logo" for="check">
                <span class="material-symbols-outlined">menu</span>
            </label>
            <input type="checkbox" id="check">
            <div class="menu">
                <ul>
                    <li><a href="conf_perfil.php">Configuración</a></li>
                    <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>