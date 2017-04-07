<?php
session_start();
require_once 'bbdd_royale.php';
if (isset($_SESSION['type']) == 1) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            <a href="altaCartas.php"> Alta de cartas </a><hr>
            <a href="mejoresUsuarios.php"> Ranking de mejores usuarios </a><hr>
            <a href="borrarUsuario.php"> Borrar un usuario </a><hr>
            <a href="regalarCarta.php"> Incorporar carta a un usuario </a><hr>
            <hr><hr>
            <a href="modificarp.php"> Modificar password </a><hr>
            <a href="verPerfil.php"> Ver perfil </a><hr>
            <a href="batalla.php"> Batalla </a><hr>
        </body>
    </html>

    <?php
} else {
    header('Location:index.php');
}
?>
