<?php
if(isset($_POST['actualizarAlumno'])){
    session_start();

    $codigoAlumno = $_POST['codigoAlumno'];
    $promedio = $_POST['promedio'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];


    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
    $carrera = $_POST['carrera'];
    $grado = $_POST['grado'];
    $grupo = $_POST['grupo'];

    $turno = $_POST['turno'];
    $curp = $_POST['curp'];
    $nss = $_POST['nss'];
    $clinica = $_POST['clinica'];
    $nacionalidad = $_POST['nacionalidad'];

    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $codigoPostal = $_POST['codigoPostal'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];

    $numExt = $_POST['numExt'];
    $numInt = $_POST['numInt'];
    $correo = $_POST['correo'];
    $numeroCelular = $_POST['numeroCelular'];
    $numeroEmergencia = $_POST['numeroEmergencia'];
    $padreEmergencia = $_POST['padreEmergencia'];

    //transformar a mayusculas
    $nombre = mb_strtoupper($nombre);
    $genero = mb_strtoupper($genero);
    $carrera = mb_strtoupper($carrera);
    $grupo = mb_strtoupper($grupo);
    $turno = mb_strtoupper($turno);
    $curp = mb_strtoupper($curp);
    $clinica = mb_strtoupper($clinica);
    $nacionalidad = mb_strtoupper($nacionalidad);
    $estado = mb_strtoupper($estado);
    $ciudad = mb_strtoupper($ciudad);
    $colonia = mb_strtoupper($colonia);
    $calle = mb_strtoupper($calle);

    require("../controller/conexion.php");
    $actualizarEstudianteQuery = "UPDATE alumnos SET codigoAlumno='$codigoAlumno', promedio='$promedio', contrasena='$contrasena', nombre='$nombre', genero='$genero', edad='$edad', carrera='$carrera', grado='$grado', grupo='$grupo', turno='$turno', curp='$curp', nss='$nss', clinica='$clinica', nacionalidad='$nacionalidad', estado='$estado', ciudad='$ciudad', codigoPostal='$codigoPostal', colonia='$colonia', calle='$calle',numExt='$numExt', numInt='$numInt', correo='$correo', numeroCelular='$numeroCelular', numeroEmergencia='$numeroEmergencia', padreEmergencia='$padreEmergencia' WHERE codigoAlumno='$codigoAlumno'";
    $actualizarEstudiante = mysqli_query($conexion, $actualizarEstudianteQuery);

    $_SESSION['tempAlumno'] = $codigoAlumno;

    $ubicacion = "Location: index.php?adm=" . md5(4);
    header($ubicacion);
}
?>
