<?php
include("configdb.php");
session_start();

$conexion = conectar();

$idUsuario = $_SESSION['equipo'];

$sql = "SELECT a.idAgradecimiento, a.mensaje, b.web
        FROM agradecimientos a
        JOIN alumnos b ON a.idEmisor = b.equipo
        WHERE a.idReceptor = '$idUsuario'";

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
<a href="agradecer.php">Agradecer</a>
<a href="recibir.php">Recibir</a>
<a href="logout.php">Cerrar Sesión</a>
</nav>

<div class="form3">

<?php while($fila = $resultado->fetch_array()){ ?>

<div class="caja1">
<a href="<?php echo $fila['web']; ?>/index.php?id=<?php echo $fila['idAgradecimiento']; ?>">
<?php echo $fila['mensaje']; ?>
</a>
</div>

<?php } ?>

</div>

</body>
</html>
