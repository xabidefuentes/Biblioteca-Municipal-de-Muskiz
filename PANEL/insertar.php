<?php
include ("cn.php");

$dni = $_POST["dni"];	
$nombre = $_POST["nombre"];
$telefono = $_POST["tlf"];
$email = $_POST["email"];
$titulo_libro = $_POST["titulo_libro"];
$fecha_prestamo = $_POST["fecha_prestamo"];
$fecha_devolucion = $_POST["fecha_devolucion"];
$penalizacion = isset($_POST['penalizacion']) ? 1 : 0;
$apellidos = $_POST["apellidos"];

$insertar = "INSERT INTO prestamos(dni, nombre, apellidos, tlf, email, titulo_libro, fecha_prestamo, fecha_devolucion, penalizacion) values ('$dni', '$nombre','$apellidos', '$telefono', '$email', '$titulo_libro', '$fecha_prestamo', '$fecha_devolucion', '$penalizacion')";

$resultado = mysqli_query($conexion, $insertar);

?>