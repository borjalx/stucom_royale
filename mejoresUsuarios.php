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
            
            <h2> RANKING DE MEJORES JUGADORES</h2>
            <hr>
            <table>
                <tr>
                    <th> NOMBRE </th> <th> NIVEL </th> <th> VICTORIAS </th>
                </tr>
                
                <?php
                $usuarios = rankingUsuarios();
                
                while($fila = mysqli_fetch_array($usuarios)){
                    extract($fila);
                    echo "<tr>";
                    echo "<td> $username </td> <td> $level </td> <td> $wins </td>";
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
