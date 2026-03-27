<?php
include("configdb.php");

$conexion = conectar();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM alumnos 
        WHERE usuario='$usuario' 
        AND password='$clave'";

$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){

    $fila = $resultado->fetch_array();

    session_start();
    $_SESSION['equipo'] = $fila['equipo'];

    header("Location: agradecer.php");
}else{
    header("Location: login.html");
}
?>
