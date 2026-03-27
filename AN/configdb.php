<?php
define("SERVIDOR",'localhost');
define("USUARIO",'root');
define("PASSWORD",'');
define("BBDD",'agradece2026');

function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8");
    return $conexion;
}
?>
