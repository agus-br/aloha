<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="stylesheet" href="css/validaciones.css">
    <title>Iniciar sesión</title>
</head>

<body>
    <?php
            //require("menu_publico.php");
            require_once("../data/DAOUsuario.php");
            ?>
    <?php
        require("../model/usuario.php");
        $correo=$password=$validado=$error="";
        if(isset($_POST["txtCorreo"]) && isset($_POST["txtPassword"])){
            $correo=trim($_POST["txtCorreo"]);
            $password=trim($_POST["txtPassword"]);

            //Validar los datos
            if(filter_var($correo, FILTER_VALIDATE_EMAIL)!=false && 
                strlen($password)>0 && strlen($password)<=50){
                    
                    $dao=new DAOUsuario();
                    $gettedUser = new usuario();
                    $gettedUser = $dao.login($correo, $password);
                    var_dump($gettedUser);
                    //Verificar que el usuario sea admin@gmail.com y pass 12345678  
                    if($correo=== $gettedUser.correo && $password=== $gettedUser.password){
                    //header("Location: home.php?dato=$correo");
                    session_start();
                    $_SESSION["correo"]=$correo;
                    header("Location: home.php");
                    }//else{
                    // $error='<div class="alert alert-danger alert-dismissible fade show">
                    // Usuario y contraseña incorrectos <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    // </div>';
                    // }
            }else{
                $validado="validado";
            }
        }
        /*else{
            echo "viene de otra página sin datos";
        }*/
            
    ?>
    <form method="post" novalidate>
        <div class="form-navbar">
            <a id="login"><button type="button" class="btn-active">Iniciar sesión</button></a>
            <a href="signup.php" id="signup"><button type="button" class="def-btn">Registrarse</button></a>
        </div>
        <div class="controles">
            <div class="campo-texto">
                <label for="txtCorreo class="subtitulos">Correo</label>
                <input type="email" id="txtCorreo" name="txtCorreo" required maxlength="25">
                <div class="msg-error" id="error-correo">
                    Este es un mensaje de error
                </div>
            </div>
            <div class="campo-texto">
                <label for="txtPassword class="subtitulos">Contraseña</label>
                <input type="password" id="txtPassword" name="txtPassword" required maxlength="40">
                <div class="msg-error" id="error-password">
                    Este es un mensaje de error
                </div>
            </div>
        </div>
        
        <div class="btn-container">
            <div class="msg-warning show">
                Este es un mensaje de error
            </div>
            <a href="index.html"><button class="action-btn-default" id="btn-login">Iniciar sesión</button></a>
        </div>
    </form>
    <script src="validation/login.js"></script>
</body>

</html>