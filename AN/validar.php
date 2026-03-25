<?php
include("configdb.php");

$conexion = conectar();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM Alumnos 
        WHERE usuario='$usuario' 
        AND password='$clave'";

$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){

    $fila = $resultado->fetch_assoc();

    session_start();
    $_SESSION['puesto'] = $fila['puesto'];
    $_SESSION['jesuita'] = $fila['jesuita'];

    header("Location: agradecer.html");
}else{
    header("Location: login.html");
}
?>