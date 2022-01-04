<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }

if(isset($_POST['agregarFecha'])){
    $titulo = $_POST['titulo'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $link = $_POST['link'];

    //mayusculas
    $titulo = mb_strtoupper($titulo);
    $mes = mb_strtoupper($mes);

    $fecha = $anio . ", " . $mes . ", " . $dia;
    require("../controller/conexion.php");
    $agregarFechaQuery = "INSERT INTO calendario(fecha, titulo, link) VALUES ('$fecha','$titulo','$link')";
    mysqli_query($conexion, $agregarFechaQuery);
    $ubicacion = "Location: index.php?adm=" . md5(2);
    header($ubicacion);
}

if(isset($_POST['modificarFecha'])){
    $idFecha = $_POST['idFecha'];
    $anio = $_POST['anio'];
    $mes = $_POST['mes'];
    $dia = $_POST['dia'];
    $titulo = $_POST['titulo'];
    $link = $_POST['link'];

    //mayusculas
    $titulo = mb_strtoupper($titulo);
    $mes = mb_strtoupper($mes);

    $anio = $anio[0] . $anio[1] . $anio[2] . $anio[3];
    $fecha = $anio . ", " . $mes . ", " . $dia;

    require("../controller/conexion.php");
    $actualizarFechaQuery = "UPDATE calendario SET fecha='$fecha', titulo='$titulo', link='$link' WHERE idFecha = '$idFecha'";
    mysqli_query($conexion, $actualizarFechaQuery);
    $ubicacion = "Location: index.php?adm=" . md5(2);
    header($ubicacion);
}
if(isset($_POST['eliminarFecha'])){
    $idFecha = $_POST['idFecha'];

    require("../controller/conexion.php");
    $eliminarFechaQuery = "DELETE FROM calendario WHERE idFecha='$idFecha'";
    mysqli_query($conexion, $eliminarFechaQuery);
    $ubicacion = "Location: index.php?adm=" . md5(2);
    header($ubicacion);
}
?>
