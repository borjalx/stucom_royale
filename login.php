<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form action="" method="POST">
            Nombre de usuario: <br><input type="text" name="user"><br>
            Contraseña: <br><input type="password" name="pass"><br>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
        require_once 'bbdd_royale.php';
        if (isset($_POST["login"])) {
            // Recogemos los datos del login
            $username = $_POST["user"];
            $pass = $_POST["pass"];
            if (verificarUsuario($username, $pass)) {                
                session_start();
                $_SESSION["user"] = $username;
                $tipo = getTU($username);
                $_SESSION["type"] = $tipo;
                if ($tipo == 0) {
                    header("Location: user_pagina.php");
                } else if ($tipo == 1) {
                    header("Location: admin_pagina.php");
                } else {
                    echo "Tipo de usuario incorrecto";
                }
            } else {
                echo "Nombre de usuario o contraseña incorrectos";
            }
        }
        ?>
    </body>
</html>