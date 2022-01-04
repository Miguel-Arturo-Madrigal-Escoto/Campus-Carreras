<?php
require("../controller/conexion.php");
$buscarAlumnosQuery = "SELECT * FROM alumnos";
$buscarAlumnos = mysqli_query($conexion, $buscarAlumnosQuery);
?>