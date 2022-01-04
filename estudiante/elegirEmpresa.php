<?php
/*
* Nota a quien le toque mantener este codigo:
* Lo que escribi es que se reciba la cadena de los cupos actualues que tiene una empresa
* Al momento de presionar el boton para elegir la empresa, se actualizara la cadena en la posicion
* que le corresponda. Esto se hace buscando en la cadena cual es el valor que tiene que decrementar.
*
* Despues de hacer eso, tambien actualiza el alumno que este dentro de la session. Solamente le da el
* idEmpresa que eligio
*/
session_start();
if(!isset($_SESSION['estudiante'])){ header("Location: index.php"); }

if(isset($_POST['elegirEmpresa'])){
    $idEmpresa = $_POST['idEmpresa'];
    $codigoAlumno = $_SESSION['estudiante'];

    require("../controller/conexion.php");
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
    // Ternary operator
    $posicionGenero = $generoAlumno == 'M' ? 2 : 5;
    $posicionTurno = $turnoAlumno == 'M' ? 6 : 7;

    // =================================================================================

    $buscarStringQuery = "SELECT $nombreTabla FROM cupos WHERE idEmpresa='$idEmpresa'";
    $buscarString = mysqli_query($conexion, $buscarStringQuery);
    $string = mysqli_fetch_assoc($buscarString);
    $string = $string["$nombreTabla"];

    // Buscar en que categoria pertenece el estudiante para saber donde actualizar la cadena
    if($string[$posicionString] != '0'){ $string[$posicionString] = chr(ord($string[$posicionString]) - 1); }
    elseif($string[$posicionGenero] != '0'){ $string[$posicionGenero] = chr(ord($string[$posicionString]) - 1); }
    elseif($string[$posicionTurno] != '0'){ $string[$posicionTurno] = chr(ord($string[$posicionString]) - 1); }
    elseif($string[8] != '0'){ $string[8] = chr(ord($string[8]) - 1); }

    require("../controller/conexion.php");
    $actualizarCuposQuery = "UPDATE cupos SET $nombreTabla='$string' WHERE idEmpresa='$idEmpresa'";
    $actualizarCupos = mysqli_query($conexion, $actualizarCuposQuery);

    $actualizarAlumnoQuery = "UPDATE alumnos SET idEmpresa='$idEmpresa', egresado = 1 WHERE codigoAlumno='$codigoAlumno'";
    $actualizarAlumno = mysqli_query($conexion, $actualizarAlumnoQuery);

    $ubicacion = "Location: index.php?adm=" . md5(11);
    header($ubicacion);
}
?>
