<?php
session_start();
require_once 'bbdd_royale.php';
if (isset($_SESSION['type']) == 1) {
    if(isset($_POST['regalar'])){
       $nombre_usuario = $_POST['user'];
       $nombre_carta = $_POST['card'];
       
       darCarta($nombre_usuario,$nombre_carta);
    }else{
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            
            <h2> REGALAR CARTA </h2>
            <hr>
            <form action="" method="POST">
                Usuarios: <select name="user">
                <?php
                $usuarios = listadoUsuarios();
                while($fila = mysqli_fetch_array($usuarios)){
                    extract($fila);
                    echo "<option value='$username'>$username </option>";
                }
                ?>
                </select>
                <br>
                Cartas: <select name="card">
                <?php
                $cartas = listadoCartas();
                while($fila = mysqli_fetch_array($cartas)){
                    extract($fila);
                    echo "<option value='$name'>$name </option>";
                }
                ?>
                </select>
                <br>
                <input type="submit" name="regalar" value="Regalar">
                <?php
                
                ?>
            </form>
        </body>
    </html>

    <?php
    }
} else {
    header('Location:index.php');
}
?>
