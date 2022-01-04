<?php
if(!isset($_SESSION['admin'])){ header("Location.index.php"); }

require("../controller/conexion.php");
$buscarAlumnoQuery = "SELECT codigoAlumno, nombre, idEmpresa FROM alumnos WHERE egresado=1 AND idEmpresa > 0";
$buscarAlumno = mysqli_query($conexion, $buscarAlumnoQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/asignados.css"/>
</head>
<body>
<div class="titulo">
  <h2><span class="icon-briefcase"></span> Asignaciones </h2>
</div>
<div class="form-busqueda">
  <label for="caja_busqueda"><span class="icon-search"></span> </label>
  <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Introduce el nombre del alumno"/>
</div>
<br>
<br>
<div id="datos">
</div>
<div class="tabla">

</div>
<!--sera el archivo js para el buscador-->
  <script src="../js/buscarAlumno.js"></script>
<!--jquery-->
  <script src="../js/jquery.min.js"></script>
</body>
</html>
