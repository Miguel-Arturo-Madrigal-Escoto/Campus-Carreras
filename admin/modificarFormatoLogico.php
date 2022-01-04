<?php
require("../controller/conexion.php");

$emision = $_POST['emision'];
$actualizarFechaQuery = "UPDATE `pdf` SET `fechaEmision`='$emision' WHERE idPdf='1'";
$actualizarFecha = mysqli_query($conexion, $actualizarFechaQuery);

$ubicacion = "Location: index.php?adm=" . md5(0);
header($ubicacion);
?>