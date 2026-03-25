<?php
include("configdb.php");

session_start();

$conexion = conectar();

$idUsuario = $_SESSION['puesto'];

$sql = "SELECT A.mensaje, B.jesuita 
        FROM Agradecimientos A
        JOIN Alumnos B ON A.idEmisor = B.puesto
        WHERE A.idReceptor = '$idUsuario'";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Recibir</title>
<link rel="stylesheet" href="main.css">
</head>

<body class="content">

<div class="Agradece">
    <img src="agradece.png">
</div>

<nav>
    <a href="agradecer.html">Agradecer</a>
    <a href="recibir.php">Recibir</a>
    <a href="logout.php">Cerrar Sesión</a>
</nav>

<div class="form3">

<?php while($fila = $resultado->fetch_array()){ ?>

    <div class="caja2">
        <img class="jesuita" src="jesus.jpg">
        <p><?php echo $fila['jesuita']; ?></p>
    </div>

    <div class="caja1">
        <p><?php echo $fila['mensaje']; ?></p>
    </div>

<?php } ?>

</div>

</body>
</html>
