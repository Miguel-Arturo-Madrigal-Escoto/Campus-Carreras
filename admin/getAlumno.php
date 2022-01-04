<?php
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }
if(isset($_POST['editarAlumno'])){
    $alumno = $_POST['alumno'];
    
    if(is_numeric($alumno)){
        require("../controller/conexion.php");
        $infoAlumnoQuery = "SELECT * FROM alumnos WHERE codigoAlumno = '$alumno'";
        $infoAlumno = mysqli_query($conexion, $infoAlumnoQuery);
    }
}
?>