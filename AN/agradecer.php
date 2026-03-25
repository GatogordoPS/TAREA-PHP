<?php
include("configdb.php");

$conexion = conectar();

$persona = $_POST['persona'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO agradecimientos (persona, mensaje) 
        VALUES ('$persona', '$mensaje')";

$conexion->query($sql);

header("Location: recibir.php");
?>