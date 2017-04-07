<?php
session_start();
require_once 'bbdd_royale.php';
$puntos = 0;
if (isset($_SESSION['type'])) {
    $nombre_usuario = $_SESSION["user"];
if(isset($_POST['escoger3'])){
    $numb = rand(0, 10);
    
    $info3 = cartasxu($nombre_usuario);
    
     while($fila = mysqli_fetch_array($info3)){
        extract($fila);
        $vida3 = $hitpoints;
        $categoria3 = $rarity;
        $elixir3 = $cost;
    }
    
    if($elixir3 > $numb){
        $puntos++;
        echo "Tercera fase ganada<br>";
    }else {
        echo "Tercera fase perdida<br>";
    }
    
    echo "Elixir usuario= $elixir3<br>";
    echo "Elixir aleatorio = $numb<br>";
    echo "Puntos totales = $puntos";
    
    
    if($puntos > 2){
        incrementarVictorias($nombre_usuario); 
        
        $info4 = verPerfil($nombre_usuario);
    
        while($fila = mysqli_fetch_array($info4)){
        extract($fila);
        $vic = $wins;
        }
        
        if($vic%5 == 0){
            regalarCarta($nombre_usuario);
            regalarCarta($nombre_usuario);
            regalarCarta($nombre_usuario);
        }
        if($vic%10 == 0){
            incrementarNivel($nombre_usuario);
        }
    }
}else if(isset($_POST['escoger2'])){
    $arrayc = array("com","esp","epi","leg");
    $num2 = rand(0,3);
    $info2 = cartasxu($nombre_usuario);
     while($fila = mysqli_fetch_array($info2)){
        extract($fila);
        $vida2 = $hitpoints;
        $categoria2 = $rarity;
        $elixir2 = $cost;
    }
    $opcion = $arrayc[$num2];;
    if($opcion == $categoria2){
        $puntos++;
        echo "Segunda fase ganada<br>";
    }else {
        echo "Segunda fase perdida<br>";
    }
    echo "Categoría = $categoria2<br>";
    echo "Categoria aleatoria = $opcion<br>";
    
    ?>
    <form action="" method="POST">
        Escoge una carta(nombre - nivel): 
        <select name="carta">
        <?php
             $cartas= cartasxu($nombre_usuario);
        while($fila = mysqli_fetch_array($cartas)){
            extract($fila);
            echo "<option value='$name'>$name - $level </option>";
            /*echo "<input type='hidden' name='vida' value='$hitpoints'>";
            echo "<input type='hidden' name='categoria' value='$rarity'>";
            echo "<input type='hidden' name='elixir' value='$cost'>";*/
        }
        ?>
        </select>
        <input type="submit" name="escoger3" value="escoger"/>
    </form>
    <?php
    
}
else if(isset($_POST['escoger'])){
    $num = rand(0, 50);
    $carta = $_POST['carta'];
    
    $info = cartasxu($nombre_usuario);
    
     while($fila = mysqli_fetch_array($info)){
        extract($fila);
        $vida = $hitpoints;
        $categoria = $rarity;
        $elixir = $cost;
    }
    
    if($vida > $num){
        $puntos++;
        echo "Primera fase ganada<br>";
    }else {
        echo "Primera fase perdida<br>";
    }
    echo "Vida = $vida<br>";
    echo "Número aleatorio = $num<br>";
    ?>
    <form action="" method="POST">
        Escoge una carta(nombre - nivel): 
        <select name="carta">
        <?php
             $cartas= cartasxu($nombre_usuario);
        while($fila = mysqli_fetch_array($cartas)){
            extract($fila);
            echo "<option value='$name'>$name - $level </option>";
            /*echo "<input type='hidden' name='vida' value='$hitpoints'>";
            echo "<input type='hidden' name='categoria' value='$rarity'>";
            echo "<input type='hidden' name='elixir' value='$cost'>";*/
        }
        ?>
        </select>
        <input type="submit" name="escoger2" value="escoger"/>
    </form>
    <?php

    
}else{


    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            
            <h2> BATALLA </h2>
            <hr>
            <form action="" method="POST">
                Escoge una carta(nombre - nivel): 
                <select name="carta">
                <?php
                     $cartas= cartasxu($nombre_usuario);
                while($fila = mysqli_fetch_array($cartas)){
                    extract($fila);
                    echo "<option value='$name'>$name - $level </option>";
                    /*echo "<input type='hidden' name='vida' value='$hitpoints'>";
                    echo "<input type='hidden' name='categoria' value='$rarity'>";
                    echo "<input type='hidden' name='elixir' value='$cost'>";*/
                }
                ?>
                </select>
                <input type="submit" name="escoger" value="escoger"/>
            </form>
            
        </body>
    </html>

    <?php

}
} else {
    header('Location:index.php');
}
?>
