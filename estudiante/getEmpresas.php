<?php
if(!isset($_SESSION['estudiante'])){ header("Location: ../index.php"); }
require("../controller/conexion.php");
$codigoAlumno = $_SESSION['estudiante'];

$getInfoAlumnoQuery = "SELECT genero, carrera, turno FROM alumnos WHERE codigoAlumno = '$codigoAlumno'";
$getInfoAlumno = mysqli_query($conexion, $getInfoAlumnoQuery);
$infoAlumno = mysqli_fetch_assoc($getInfoAlumno);



// Asignar datos del alumno a variables
$generoAlumno = $infoAlumno['genero'];
$carreraAlumno = $infoAlumno['carrera'];
$turnoAlumno = $infoAlumno['turno'];

// Buscar tabla correspondiente de las empresas
$nombreTabla = "";
switch($carreraAlumno){
    case "BTAD": $nombreTabla = "adminCont"; break;
    case "BTGO": $nombreTabla = "gestionCont"; break;
    case "BTPT": $nombreTabla = "telecCont"; break;
    case "TPIN": $nombreTabla = "inforCont"; break;
    case "TPEA": $nombreTabla = "energCont"; break;
    case "TPMI": $nombreTabla = "electriCont"; break;
    case "TPEI": $nombreTabla = "mecaCont"; break;
    case "TPBI": $nombreTabla = "bioCont"; break;
    case "TPMC": $nombreTabla = "proceCont"; break;
}



// Concatenar genero y turno para buscar su posicion dentro del string en la tabla
$posicionString = $generoAlumno . $turnoAlumno;
switch($posicionString){
    case 'MM'; $posicionString = '0'; break;
    case 'MV'; $posicionString = '1'; break;
    case 'FM'; $posicionString = '3'; break;
    case 'FV'; $posicionString = '4'; break;
}

// Datos para encontrar empresas con datos "sin especificar" [MS,FS,SM,SF,SS]
$posicionGenero = $generoAlumno == 'M' ? 2 : 5;
$posicionTurno = $turnoAlumno == 'M' ? 6 : 7;



$buscarEmpresasQuery = "SELECT idEmpresa, $nombreTabla FROM cupos";

$buscarEmpresas = mysqli_query($conexion, $buscarEmpresasQuery);
?>
