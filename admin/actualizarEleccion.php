<?php
require("../controller/conexion.php");

$anio1 = $_POST["anio1"];
$anio2 = $_POST["anio2"];
$anio3 = $_POST["anio3"];
$anio4 = $_POST["anio4"];
$anio5 = $_POST["anio5"];

$dia1 = $_POST['dia1'];
$dia2 = $_POST['dia2'];
$dia3 = $_POST['dia3'];
$dia4 = $_POST['dia4'];
$dia5 = $_POST['dia5'];

$mes1 = $_POST['mes1'];
$mes2 = $_POST['mes2'];
$mes3 = $_POST['mes3'];
$mes4 = $_POST['mes4'];
$mes5 = $_POST['mes5'];

$fecha1 = $mes1 . "-" . $dia1 . "-" . $anio1;
$fecha2 = $mes2 . "-" . $dia2 . "-" . $anio2;
$fecha3 = $mes3 . "-" . $dia3 . "-" . $anio3;
$fecha4 = $mes4 . "-" . $dia4 . "-" . $anio4;
$fecha5 = $mes5 . "-" . $dia5 . "-" . $anio5;

$updateFechaQuery1 = "UPDATE eleccion SET fecha='$fecha1' WHERE idEleccion=1";
$updateFecha1 = mysqli_query($conexion, $updateFechaQuery1);

$updateFechaQuery2 = "UPDATE eleccion SET fecha='$fecha2' WHERE idEleccion=2";
$updateFecha2 = mysqli_query($conexion, $updateFechaQuery2);

$updateFechaQuery3 = "UPDATE eleccion SET fecha='$fecha3' WHERE idEleccion=3";
$updateFecha3 = mysqli_query($conexion, $updateFechaQuery3);

$updateFechaQuery4 = "UPDATE eleccion SET fecha='$fecha4' WHERE idEleccion=4";
$updateFecha4 = mysqli_query($conexion, $updateFechaQuery4);

$updateFechaQuery5 = "UPDATE eleccion SET fecha='$fecha5' WHERE idEleccion=5";
$updateFecha5 = mysqli_query($conexion, $updateFechaQuery5);

$ubicacion = "Location: index.php?adm=" . md5(18);
header($ubicacion);
?>
