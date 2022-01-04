<?php
if(!isset($_SESSION['estudiante'])){ header("Location: ../index.php"); }

$alumno = $_SESSION['estudiante'];
require("../controller/conexion.php");
$infoAlumnoQuery = "SELECT * FROM alumnos WHERE codigoAlumno = '$alumno'";
$infoAlumno = mysqli_query($conexion, $infoAlumnoQuery);
$info = mysqli_fetch_assoc($infoAlumno);
?>