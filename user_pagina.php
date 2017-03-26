<?php
session_start();
require_once 'bbdd_royale.php';
if (isset($_SESSION['type'])) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            <a href="modificarp.php"> Modificar password </a><hr>
            <a href="verPerfil.php"> Ver perfil </a><hr>
            <a href="batalla.php"> Batalla </a><hr>
        </body>
    </html>

    <?php
} else {
    /*header('Location:index.php');*/
}
?>
