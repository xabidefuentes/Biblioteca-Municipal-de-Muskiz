<?php
include ("cn.php");

$id = $_POST["id"];
$dni = $_POST["dni"];	
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$titulo_libro = $_POST["titulo_libro"];
$fecha_prestamo = $_POST["fecha_prestamo"];
$fecha_devolucion = $_POST["fecha_devolucion"];
$penalizacion = isset($_POST['penalizacion']) ? 1 : 0;
$apellidos = $_POST["apellidos"];

$actualizar = "UPDATE prestamos SET dni='$dni', nombre='$nombre', apellidos='$apellidos', tlf='$telefono', email='$email', titulo_libro='$titulo_libro', fecha_prestamo='$fecha_prestamo', fecha_devolucion='$fecha_devolucion', penalizacion='$penalizacion'  WHERE id='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if ($resultado) {
    echo "<script>alert('Los datos se han actualizado correctamente');</script>";
}else{
    echo "<script>alert('ERROR: Los datos no se pudieron actualizar');</script>";
}


?>