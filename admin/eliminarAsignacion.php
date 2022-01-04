<?php
session_start();
if(!isset($_POST['admin'])){ header("Location.index.php"); }

$codigoAlumno = $_POST['alumno'];
require("../controller/conexion.php");
$actualizarAlumnoQuery = "UPDATE alumnos SET idEmpresa = '' WHERE codigoAlumno='$codigoAlumno'";
$actualizarAlumno = mysqli_query($conexion, $actualizarAlumnoQuery);
$ubicacion = "Location: index.php?adm=" . md5(11);
header($ubicacion);
?>
