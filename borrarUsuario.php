<?php
session_start();
require_once 'bbdd_royale.php';
if (isset($_SESSION['type']) == 1) {
    if(isset($_POST['borrar'])){
       $nombre_usuario = $_POST['user'];
       
       borrarUsuario($nombre_usuario);
    }else{
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            
            <h2> BORRAR USUARIO</h2>
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
                <input type="submit" name="borrar" value="Borrar">
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