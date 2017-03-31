<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            Nombre : <br><input type="text" name="name" maxlength="20"><br>
            Contraseña : <br><input type="password" name="pass" maxlength="10"><br>
            Confirmar contraseña : <br><input type="password" name="pass2" maxlength="10"><br>
            <input type="submit" name="registrar" value="registrar">            
        </form>
        <?php
        require_once 'bbdd_royale.php';
        if (isset($_POST['registrar'])){
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $pass2 = $_POST['pass2'];
            
            if($pass == $pass2){
                if(existeUsuario($name) == false){
                    registrarUsu($name, $pass);
                    regalarCarta($name);
                    regalarCarta($name);
                    regalarCarta($name);
                }else {
                    echo "El usuario existe";
                }
            }else if($pass != $pass2){
                echo "Las contraseñas no son las mismas";
            }
        }
        ?>
        <a href="index.php">Volver al indice</a>
    </body>
</html>
