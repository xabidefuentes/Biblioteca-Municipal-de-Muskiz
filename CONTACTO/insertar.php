<?php
include ("cn.php");

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];


$insertar = "INSERT INTO contacto(nombre, email, mensaje) values ('$nombre','$email', '$mensaje')";

$resultado = mysqli_query($conexion, $insertar);

?>