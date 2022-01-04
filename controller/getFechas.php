<?php
require("conexion.php");
$getFechasQuery = "SELECT * FROM calendario";
$getFechas = mysqli_query($conexion, $getFechasQuery);
$getFechas2 = mysqli_query($conexion, $getFechasQuery);
?>