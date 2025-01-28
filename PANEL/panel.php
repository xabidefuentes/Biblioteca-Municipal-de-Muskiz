<?php
  include("cn.php");
  $prestamos = "SELECT * FROM prestamos";
?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EQUIPO 5">
    <meta name="fecha" content="20/10/2024">
    <meta name="PROYECTO/RETO" content="WEB-0"> 
    <meta name="keywords" content="libros, muskiz, biblioteca">
    <title>Biblioteca Municipal de Muskiz</title> <!--Titulo-->
    <link rel="stylesheet" href="panel.css">
    <link rel="icon" href="/Imagenes/Logo_Biblioteca-removebg-preview.png" type="image/x-icon">
    <div id="top"></div>
  </head>
  <header class="header">
    <!--Logos-->
    <img class="logo-biblioteca" src="../Imagenes/Logo_Biblioteca-removebg-preview.png" alt="logo-biblioteca" >
    <h1 class="titulo-principal">Biblioteca Municipal de Muskiz</h1>
    <img class="logo-ayuntamiento" src="../Imagenes/logo-ayuntamiento.jpg" alt="logo-ayuntamiento" ><br><br><br><br><br>
  </header>
  <body>
    <div class="topnav">
      <!--Este es el menú del encabezado, para acceder a las distintas pestañas.-->
        <div class="menu">
        <a href="../INICIO/index.html">INICIO</a>
        <a href="../LIBROS/libros.html">LIBROS</a>
        <a href="../CONDICIONES/condiciones.html">CONDICIONES</a>
        <a href="../SOBRE NOSOTROS/sobre_nosotros.html">SOBRE NOSOTROS</a>
        </div>
        <a href="../MI PERFIL/mi-perfil.html" class="perfil">
          <img src="../Imagenes/usuario-blanco.png" alt="usuario" class="logo-usuario">
        </a>
    </div>
    <div class="container">
        <h1 class="titulo-panel">PANEL DE CONTROL</h1>
        <div class="form-contacto">
            <form action="insertar.php" method="post" class="formulario">
                <div class="form1">
                    <label for="" class="textos">DNI</label>
                    <input type="text" name="dni" placeholder="Introduce el DNI"><br><br>

                    <label for="" class="textos">Nombre</label>
                    <input type="text" name="nombre" placeholder="Introduce el nombre"><br><br>

                    <label for="" class="textos">Apellidos</label>
                    <input type="text" name="apellidos" placeholder="Introduce los apellidos"><br><br>

                    <label for="" class="textos">Teléfono</label>
                    <input type="text" name="tlf" placeholder="Introduce un teléfono valido"><br><br>

                    <label for="" class="textos">Email</label>
                    <input type="email" name="email" placeholder="Introduce un email valido"><br><br>
                </div>
                <div class="form2">
                    <label for="" class="textos">Titulo del libro</label>
                    <input type="text" name="titulo_libro" placeholder="Introduce el titulo del libro"><br><br>

                    <label for="" class="textos">Fecha del prestamo</label>
                    <input type="date" name="fecha_prestamo" placeholder="Introduce la fecha de inicio del prestamo"><br><br>

                    <label for="" class="textos">Fecha devolución</label>
                    <input type="date" name="fecha_devolucion" placeholder="Introduce la fecha de devolución"><br><br>

                    <label for="" class="textos">Penalización</label>
                    <input type="checkbox" name="penalizacion"  value="true" placeholder="Marca la casilla si el usuario esta penalizado"><br><br>
                    <button type="submit">REGISTRAR</button>
                </div>
            </form>
        </div>
    </div>
          <table class="tabla">
          <tr>
            <th>DNI</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>TELÉFONO</th>
            <th>EMAIL</th>
            <th>TITULO LIBRO</th>
            <th>FECHA INICIO PRESTAMO</th>
            <th>FECHA DEVOLUCION</th>
            <th>PENALIZACION</th>
          </tr>
          <?php $resultado = mysqli_query($conexion, $prestamos);
            while($row=mysqli_fetch_assoc($resultado)) { ?>
              <tr>
                <td><?php echo $row['dni']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['tlf']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['titulo_libro']; ?></td>
                <td><?php echo $row['fecha_prestamo']; ?></td>
                <td><?php echo $row['fecha_devolucion']; ?></td>
                <td><?php echo $row['penalizacion'] ? 'SI' : 'NO'; ?></td>
                <td class="actualizar"><a href="actualizar.php?id=<?php echo $row['id']; ?>"><p>EDITAR</p></a></td>   
                <td class="eliminar"><a href="procesar_eliminar.php?id=<?php echo $row["id"]; ?>"><p>ELIMINAR</p></a></td>
              </tr>
              <?php } mysqli_free_result($resultado);?>
          </table>
      </section>
      <a class="flecha-arriba" href="#top">
        <svg class="svgIcon" viewBox="0 0 384 512">
          <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"></path>
        </svg>
      </a>
    </div>
    <footer>
      <!--El footer incluye estos tres links para redirigir al usuario a sus respectivas pestañas.-->
        <p><a href="avisoLegal.pdf">Aviso Legal</a> <a href="/CONTACTO/contacto.html">Contacto</a> <a href="PoliticaPrivacidad.pdf">Política de Privacidad</a></p>
    </footer>
  </body>
</html>
