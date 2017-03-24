<?php

function conexion($database) {
    $conxn = mysqli_connect("localhost", "root", "", $database)
            or die("NO se ha podido conectar con la BBDD. MUERE!");
    return $conxn;
}

function desconectar($conectar) {
    mysqli_close($conectar);
}

function existeUsuario($nombre_usuario){
    $conectar = conexion("royal");
    $consulta = "select * from user where username = '$nombre_usuario'";
    
    $resultado = mysqli_query($conectar, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($conectar);
    if($contador == 0){
        return false;
    }else {
        return true;
    }
}

function existeCarta($nombre_carta){
    $conectar = conexion("royal");
    $consulta = "select * from card where name = '$nombre_carta'";
    
    $resultado = mysqli_query($conectar, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($conectar);
    if($contador == 0){
        return false;
    }else {
        return true;
    }
}

function registrarUsu($nombre_usuario,$password){
    $conectar = conexion("royal");
    $consulta = "insert into user values ('$nombre_usuario','$password','0','0','0')";
    
    if(mysqli_query($conectar, $consulta)){
        echo "<p color='blue'> Usuario dado de alta correctamente</p><br>";
        echo "<a href='index.php'>Inicio</a>";
    }else{
        mysqli_error($conectar);
    }
    
    desconectar($conectar);
}

function verificarUsuario($nombre_usuario,$contraseña){
    
    $conectar = conexion("royal");
    $consulta = "select * from user where username = '$nombre_usuario' and password='$contraseña'";
    
    $resultado = mysqli_query($conectar, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($conectar);
    if($contador > 0){
        return true;
    }else {
        return false;
    }

}



function getTU($nombre_usuario){
    $con = conexion("royal");
    $query = "select type from user where username = '$nombre_usuario'";
    $resultado = mysqli_query($con, $query);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $type;
}

function altaCarta($nombre,$tipo,$calidad,$vida,$daño,$elixir){
    $conectar = conexion("royal");
    $consulta = "insert into card values ('$nombre','$tipo','$calidad','$vida','$daño','$elixir')";
    
    if(mysqli_query($conectar, $consulta)){
        echo "<p color='blue'> Carta dada de alta</p><br>";
        echo "<a href='index.php'>Inicio</a>";
    }else{
        mysqli_error($conectar);
    }
    
    desconectar($conectar);
}

?>
