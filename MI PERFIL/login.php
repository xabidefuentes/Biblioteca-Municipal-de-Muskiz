<?php
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

$conexion = mysqli_connect("localhost", "root", "","web_reto");
$consulta= "SELECT * FROM empleados where email='$email' and contraseña='$contraseña'";
$insertar = "INSERT INTO empleados(email, contraseña) values ('pepe','123')";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if ($filas>0){
    echo "<script>alert('Inicio de sesión exitoso. Bienvenido!'); window.location.href='../panel/panel.php';</script>";
    
}else{
    echo "<script> alert('Correo o contraseña incorrectos.'); window.location.href='mi-perfil.html';</script>";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>