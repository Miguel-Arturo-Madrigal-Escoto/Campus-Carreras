<?php
if(!isset($_SESSION['estudiante'])){ header("Location: index.php"); }

$codigoAlumno = $_SESSION['estudiante'];

if(isset($_POST['actualizarEscolares'])){
    require("../controller/conexion.php");

    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $carrera = $_POST['carrera'];
	  $turno = $_POST['turno'];
    $contrasena = $_POST['contrasena'];

    $nombre = mb_strtoupper($nombre);
    $genero = mb_strtoupper($genero);
    $carrera = mb_strtoupper($carrera);
    $turno = mb_strtoupper($turno);

    $actualizarDatosQuery = "UPDATE alumnos SET turno='$turno', nombre='$nombre', genero='$genero', carrera='$carrera', contrasena='$contrasena' WHERE codigoAlumno='$codigoAlumno'";
    $actualizarDatos = mysqli_query($conexion, $actualizarDatosQuery);
    $ubicacion = "Location: index.php?es=" . md5(1);
    header($ubicacion);
}

if(isset($_POST['actualizarPersonales'])){
    require("../controller/conexion.php");

    $nacionalidad = $_POST['nacionalidad'];
    $curp = $_POST['curp'];
    $nss = $_POST['nss'];
    $clinica = $_POST['clinica'];


    $curp = mb_strtoupper($curp);
    $clinica = mb_strtoupper($clinica);
    $nacionalidad = mb_strtoupper($nacionalidad);


    $actualizarDatosQuery = "UPDATE alumnos SET nacionalidad='$nacionalidad', curp='$curp', nss='$nss', clinica='$clinica' WHERE codigoAlumno='$codigoAlumno'";
    $actualizarDatos = mysqli_query($conexion, $actualizarDatosQuery);
    $ubicacion = "Location: index.php?es=" . md5(1);
    header($ubicacion);
}

if(isset($_POST['actualizarResidencia'])){
    require("../controller/conexion.php");

    $estado = $_POST['estado'];
    $municipio = $_POST['ciudad'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
	  $codigopostal = $_POST['codigoPostal'];
    $numExt = $_POST['numExt'];
    $numInt = $_POST['numInt'];

    $estado = mb_strtoupper($estado);
    $ciudad = mb_strtoupper($ciudad);
    $colonia = mb_strtoupper($colonia);
    $calle = mb_strtoupper($calle);

    $actualizarDatosQuery = "UPDATE alumnos SET estado='$estado', ciudad='$municipio', colonia='$colonia', calle='$calle', codigoPostal='$codigopostal', numExt='$numExt', numInt='$numInt' WHERE codigoAlumno='$codigoAlumno'";
	$actualizarDatos = mysqli_query($conexion, $actualizarDatosQuery);
  $ubicacion = "Location: index.php?es=" . md5(1);
  header($ubicacion);
}

if(isset($_POST['actualizarContactos'])){
    require("../controller/conexion.php");

    $numeroCelular = $_POST['numeroCelular'];
    $correo = $_POST['correo'];

    $actualizarDatosQuery = "UPDATE alumnos SET numeroCelular='$numeroCelular', correo='$correo' WHERE codigoAlumno='$codigoAlumno'";
    $actualizarDatos = mysqli_query($conexion, $actualizarDatosQuery);
    $ubicacion = "Location: index.php?es=" . md5(1);
    header($ubicacion);
}

if(isset($_POST['actualizarEmergencia'])){
    require("../controller/conexion.php");

    $padreEmergencia = $_POST['padreEmergencia'];
    $numeroEmergencia = $_POST['numeroEmergencia'];

    $actualizarDatosQuery = "UPDATE alumnos SET padreEmergencia='$padreEmergencia', numeroEmergencia='$numeroEmergencia' WHERE codigoAlumno='$codigoAlumno'";
    $actualizarDatos = mysqli_query($conexion, $actualizarDatosQuery);
    $ubicacion = "Location: index.php?es=" . md5(1);
    header($ubicacion);
}
?>
