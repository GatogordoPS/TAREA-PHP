<?php
include("configdb.php");
session_start();

$conexion = conectar();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $idEmisor = $_SESSION['equipo'];
    $idReceptor = $_POST['persona'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO agradecimientos (mensaje, idEmisor, idReceptor)
            VALUES ('$mensaje', '$idEmisor', '$idReceptor')";

    $conexion->query($sql);

    header("Location: recibir.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agradecer</title>
<link rel="stylesheet" href="main.css">
</head>

<body class="content">

<div class="Agradece">
    <img src="agradece.png">
</div>

<nav>
<a href="agradecer.php">Agradecer</a>
<a href="recibir.php">Recibir</a>
<a href="logout.php">Cerrar Sesión</a>
</nav>

<form class="form2" method="POST">

<p>Para</p>
<select name="persona">
<?php
$sql = "SELECT equipo, nombre FROM alumnos";
$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_array()){
    echo "<option value='".$fila['equipo']."'>".$fila['nombre']."</option>";
}
?>
</select>

<p>Mensaje</p>
<textarea name="mensaje" class="texto"></textarea>

<button class="Enviar">ENVIAR</button>

</form>

</body>
</html>
