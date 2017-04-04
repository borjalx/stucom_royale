<?php
session_start();
require_once 'bbdd_royale.php';
$nombre_usuario = $_SESSION["user"];
if (isset($_SESSION['type'])) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            
            <h2> MI PERFIL </h2>
            <hr>
            <table>
                <tr>
                    <th> NOMBRE </th> <th> VICTORIAS </th> <th> NIVEL </th> <th> NOMBRE CARTA </th> <th> TIPO CARTA</th> <th> CALIDAD </th> <th> ELIXIR </th> <th> NIVEL CARTA </th> <th> VIDA ACTUAL</th> <th> DAÑO ACTUAL</th>
                </tr>
                
                <?php
                $info = verPerfil($nombre_usuario);
                
                while($fila = mysqli_fetch_array($info)){
                    extract($fila);
                    $va = ($hitpoints + $nivelcarta)*2;
                    $da = ($damage + $nivelcarta)*2;
                    echo "<tr>";
                    echo "<td> $nombre </td> <td> $victorias </td> <td> $nivel </td><td> $name </td> <td> $type </td> <td> $rarity </td> <td> $cost </td> <td> $nivelcarta </td> <td> $va </td> <td> $da </td>";
                    echo "</tr>";
                }
                ?>
                
            </table>
        </body>
    </html>

    <?php
} else {
    header('Location:index.php');
}
?>
