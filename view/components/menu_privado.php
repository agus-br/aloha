<nav class="navbar">
        <div class="icon">
            <a href="#">
                <img src="img/head-aloha.png" alt="Aloja">
            </a>
        </div>
        <div id="header-derecha">
            <div class="login-signup">
                <a><?php
                        session_start();
                        //$_SESSION["algo"]=1;
                        //unset($_SESSION["correo"]);
                        // if(!(isset($_SESSION["correo"]) && strlen($_SESSION["correo"])>0))
                        // {
                        //     header("Location: login.php");
                        // }
                        echo $_SESSION["nombre"];
                    ?>
                </a>
                <!-- <a href="signup.html">Registrarse</a> -->
                <!-- <a href=""><span class="material-symbols-outlined">person</span></a> -->
            </div>

            <div class="menu-amburguesa">
                <label id="menu-logo" for="check">
                    <span class="material-symbols-outlined">menu</span>
                </label>
                <input type="checkbox" id="check">
                <div class="menu">
                    <ul>
                        <li><a href="conf_perfil.html">Configuración</a></li>
                        <li><a href="conf_perfil.html">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>