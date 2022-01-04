<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: index.php"); }

require("../controller/conexion.php");
$idEmpresa = $_POST['idEmpresa'];
$buscarCuposQuery = "SELECT * FROM cupos WHERE idEmpresa = '$idEmpresa'";
$buscarCupos = mysqli_query($conexion, $buscarCuposQuery);
$cupos = mysqli_fetch_assoc($buscarCupos);

$admin = $cupos['adminOriginal'];
$gestion = $cupos['gestionOriginal'];
$infor = $cupos['inforOriginal'];
$telec = $cupos['telecOriginal'];
$energ = $cupos['energOriginal'];
$electri = $cupos['electriOriginal'];
$meca = $cupos['mecaOriginal'];
$bio = $cupos['bioOriginal'];
$proce = $cupos['proceOriginal'];

$actualizarCuposQuery = "UPDATE cupos SET adminCont='$admin', gestionCont='$gestion', inforCont='$infor', telecCont='$telec', energCont='$energ', electriCont='$electri', mecaCont='$meca', bioCont='$bio', proceCont='$proce' WHERE idEmpresa='$idEmpresa'";
$actualizarCupos = mysqli_query($conexion, $actualizarCuposQuery);
$ubicacion = "Location: index.php?adm=" . md5(1);
header($ubicacion);
?>