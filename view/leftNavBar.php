<div class="izquierda">
    <div class="detalles-usuario">
        <span id="logo-usuario" class="material-symbols-outlined">account_circle</span>
        <span class="nombre-usuario"><?php echo $_SESSION["nombre"];?></span>
    </div>
    <button type="button" class="categoria">
        <a href="conf_perfil.php">
            <span id="logo-perfil" class="material-symbols-outlined">person_edit</span>
            <span>Perfil</span>
        </a>
    </button>
    <button type="button" class="categoria">
        <a href="conf_cuenta.php">
            <span id="logo-settings" class="material-symbols-outlined">settings</span>
            <span>Cuenta</span>
        </a>
    </button>
    <?php
        if($_SESSION["rol"] == "Usuario"){
            echo "<button type='button' class='categoria'>
                <a href='conf_arrendador.php'>
                    <span id='logo-home' class='material-symbols-outlined'>home</span>
                    <span>¿Arrendador?</span>
                </a>
            </button>";
        }else if($_SESSION["rol"] == "Arrendador"){
            echo "<button type='button' class='categoria'>
                <a href='conf_arrendador.php'>
                    <span id='logo-home' class='material-symbols-outlined'>home</span>
                    <span>Arrendador</span>
                </a>
            </button>";
        }
    ?>
</div>