<?php

function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    return $conexion;
}

function mostrar_alumnos(){ 

    $conexion = conectar();  
    
    $sql = "SELECT * FROM alumnos";
    $resultado = $conexion->query($sql);    
    
    echo "<h3>Con while</h3>";

    $contador = 0;

    while ($fila = $resultado->fetch_array()) {

        echo '<p>Nombre alumno: '.$fila["nombre"].'</p>';

        $contador++;

        if ($contador == 3) {
            break;
        }
    }

}
?>
