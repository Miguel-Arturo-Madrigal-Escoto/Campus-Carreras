<?php
session_start();
if(!isset($_POST['admin'])){ header("Location.index.php"); }

$codigoAlumno = $_POST['codigoAlumno'];
$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];
$grado = $_POST['grado'];
$grupo = $_POST['grupo'];
$turno = $_POST['turno'];
$calendario = $_POST['calendario'];

//mayusculas
$nombre = mb_strtoupper($nombre);
$carrera = mb_strtoupper($carrera);
$grupo = mb_strtoupper($grupo);
$turno = mb_strtoupper($turno);
$calendario = mb_strtoupper($calendario);

require("../controller/conexion.php");
$insertarAlumnoQuery = "INSERT INTO alumnos(codigoAlumno, nombre, carrera, grado, grupo, turno, generacion)
                        VALUES ('$codigoAlumno','$nombre','$carrera','$grado','$grupo','$turno','$calendario')";
$insertarAlumno = mysqli_query($conexion, $insertarAlumnoQuery);
$ubicacion = "Location: index.php?adm=" . md5(5);
header($ubicacion);
?>
