<?php
   require("../controller/conexion.php");

   $codigoAlumno = $_POST['codigo'];

   require("../controller/conexion.php");
   $actualizarEgresadoQuery = "UPDATE alumnos SET egresado='0' WHERE codigoAlumno = '$codigoAlumno'";
   mysqli_query($conexion, $actualizarEgresadoQuery);


   if(isset($_POST['baja'])){
       $anio = $_POST['anio'];
       $mes = $_POST['mes'];
       $dia = $_POST['dia'];
       $fecha = $mes . "-" . $dia . "-" . $anio;
       $motivo = $_POST ['motivo'];
       $usuario = $_POST ['usuario'];
       $nombre = $_POST ['alumno'];
       $codigoAlumno = $_POST ['codigo'];

       $bajaAlumno = "INSERT INTO bajas(fecha,motivo,usuario,nombre,codigoAlumno)
       VALUES('$fecha','$motivo','$usuario','$nombre','$codigoAlumno')";



       $ubicacion = "Location: index.php?adm=" . md5(5);
       header($ubicacion);
}
   ?>
