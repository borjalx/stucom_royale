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
/*
function comprobarPassword($username,$password){
    $conectar = conexion("royal");
    $consulta = "select password from user where username = '$nombre_usuario' and";
    
    $resultado = mysqli_query($conectar, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($conectar);
    if($contador == 0){
        return false;
    }else {
        return true;
    }
}
*/
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
    $consulta = "insert into user values ('$nombre_usuario','$password','0','0','1')";
    
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

function rankingUsuarios(){
    $con = conexion("royal");
    $query = "select username,wins,level from user order by level desc, wins desc";
    
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function listadoUsuarios(){
    $con = conexion("royal");
    $query = "select username from user where username != 'admin' ";
    
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function borrarUsuario($nombre_usuario){
    $con = conexion("royal");
    $delete = "delete from user where username='$nombre_usuario'";
    if (mysqli_query($con, $delete)) {
        echo "Usuario borrado";
        echo "<a href='admin_pagina.php'>Volver al menú<a>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function listadoCartas(){
    $con = conexion("royal");
    $query = "select name from card";
    
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function cartaRepe($nombre_usuario,$nombre_carta){
    $conectar = conexion("royal");
    $consulta = "select * from deck where user = '$nombre_usuario' and card='$nombre_carta'";
    
    $resultado = mysqli_query($conectar, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($conectar);
    if($contador > 0){
        return true;
    }else {
        return false;
    }
}

function darCarta($nombre_usuario,$nombre_carta){
    $conectar = conexion("royal");
    
    if(cartaRepe($nombre_usuario, $nombre_carta) != true){
        $consulta = "insert into deck values ('$nombre_usuario','$nombre_carta','1')";
        if(mysqli_query($conectar, $consulta)){
        echo "<p color='blue'> Carta dada</p><br>";
        echo "<a href='admin_pagina.php'>Volver al menú<a>";
    }else{
        mysqli_error($conectar);
    }
    }else{
        $consulta = "update deck set level = level+1 where user = '$nombre_usuario' and card='$nombre_carta';";
        if(mysqli_query($conectar, $consulta)){
        echo "<p color='blue'> Carta modificada</p><br>";
        echo "<a href='admin_pagina.php'>Volver al menú<a>";
    }else{
        echo mysqli_error($conectar);
    }
    }

    desconectar($conectar);
    }

function cartasxn(){
    $con = conexion("royal");
    $query = "select @numero:=@numero+1 as n,name from card";
    
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function regalarCarta($nombre_usuario){
    $arrayc = array();
    $usuarios = listadoCartas();
               
    while($fila = mysqli_fetch_array($usuarios)){
            extract($fila);
            $arrayc[] = $name;               
        }
    $numr = rand(0, count($arrayc)-1);
    $nombre_carta = $arrayc($numr);
    darCarta($nombre_usuario, $nombre_carta);
}

function cambiarPass($nombre_usuario,$contraseña){
    $con = conexion("royal");
    $consulta = "UPDATE user SET password='$contraseña' WHERE username='$nombre_usuario'";
    
    if (mysqli_query($con, $consulta)) {
        echo "Contraseña modificada";
        echo "<a href='user_pagina.php'>Volver al menú<a>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

?>