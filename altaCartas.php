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
                <form action="" method="POST">
                    Nombre : <br><input type="text" name="name" maxlength="30" required><br>
                    Calidad : <br><select name="rarity" required>
                        <option value="com">Comunes</option>
                        <option value="esp">Especiales</option>
                        <option value="epi">Épicas</option>
                        <option value="leg">Legendarias</option>
                    </select><br>
                    Tipo : <br><select name="type" required>
                        <option value="tr">Tropa</option>
                        <option value="es">Estructura</option>
                        <option value="he">Hechizo</option>
                    </select><br>
                    Vida : <br><input type="number" name="life" max="20" min="1" required><br>
                    Daño : <br><input type="number" name="damage" max="20" min="1" required><br>
                    Elixir : <br><input type="number" name="cost" max="10" min="1" required><br>
                    <input type="submit" name="crear" value="Crear"/>
                </form>
            </body>
        </html>

        <?php
    if (isset($_POST['crear'])) {
        $nombre = $_POST['name'];
        $calidad = $_POST['rarity'];
        $tipo = $_POST['type'];
        $vida = $_POST['life'];
        $daño = $_POST['damage'];
        $elixir = $_POST['cost'];
        
        if(existeCarta($nombre)){
            echo "La carta ya existe";
        }else{
        altaCarta($nombre, $tipo, $calidad, $vida, $daño, $elixir);
        }
    }
} else {
    header('Location:index.php');
}
?>
