<?php
include ("cn.php");

$id = $_GET["id"]; 


$eliminar = "DELETE FROM prestamos WHERE id ='$id'";

$resultadoEliminar = mysqli_query($conexion, $eliminar);

if ($resultadoEliminar) {
    header("Location: panel.php");
    echo "<script>alert('Los datos se han borrado correctamente');</script>";
}else{
    echo "<script>alert('ERROR: Los datos no se pudieron borrar');</script>";
}

?>