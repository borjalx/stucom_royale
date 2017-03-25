<?php
session_start();
require_once 'bbdd_royale.php';
if (isset($_SESSION['type'])) {

    $tipo = $_SESSION['type'];
    echo $tipo;
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
        </body>
    </html>

    <?php
} else {
    /*header('Location:index.php');*/
}
?>
