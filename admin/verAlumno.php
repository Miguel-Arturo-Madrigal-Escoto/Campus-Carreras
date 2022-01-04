<?php
if(!isset($_SESSION['admin'])){ header("Location: index.php"); }

require("../controller/conexion.php");
if(isset($_POST['alumno'])){
  $codigoAlumno = $_POST['codigoAlumno'];
  $getAlumnoQuery = "SELECT * FROM alumnos WHERE codigoAlumno = '$codigoAlumno'";
  $getAlumno = mysqli_query($conexion, $getAlumnoQuery);
  $alumno = mysqli_fetch_assoc($getAlumno);
}else{
  require("../controller/conexion.php");
  $codigoAlumno = $_SESSION['tempAlumno'];
  $getAlumnoQuery = "SELECT * FROM alumnos WHERE codigoAlumno = '$codigoAlumno'";
  $getAlumno = mysqli_query($conexion, $getAlumnoQuery);
  $alumno = mysqli_fetch_assoc($getAlumno);

  unset($_SESSION['tempAlumno']);

}
$codigoAlumno = $_POST['codigoAlumno'];
$buscarBajaQuery = "SELECT * FROM bajas WHERE codigoAlumno = '$codigoAlumno'";
$buscarBaja = mysqli_query($conexion, $buscarBajaQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumno</title>
      <link rel="stylesheet" href="../css/alumno.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    #icon-thumbs-down{
      color: black;
    }

    </style>
</head>
<body>
<div class="perfil">
	<center><h2 style="color:#f63;"><span class="feature-icon fa fa-user"></span> Perfil del Estudiante</h2></center>
    <br><br>

<div class="dEscolares">
<h3 id="1"><span class="feature-icon fa fa-pencil"></span>&nbsp;Datos Escolares</h3>
<b>Nombre: </b><?php echo $alumno['nombre']; ?><br />
<b>Genero: </b><?php
					if ($alumno['genero'] == 'M'){ echo "Masculino"; }
					else{ echo "Femenino"; } ?> <br />
<b>Edad: </b><?php echo $alumno['edad']; ?><br />
<b>Codigo: </b><?php echo $alumno['codigoAlumno']; ?><br />
<b>Contraseña: </b><?php echo $alumno['contrasena']; ?><br />
<b>Carrera: </b><?php echo $alumno['carrera']; ?><br />
<b>Grado: </b><?php echo $alumno['grado']; ?><br />
<b>Grupo: </b><?php echo $alumno['grupo']; ?><br />
<b>Turno: </b><?php echo $alumno['turno']; ?><br />
<b>Generacion: </b><?php echo $alumno['generacion']; ?><br />
<b>Promedio: </b><?php echo $alumno['promedio']; ?><br />
<br>
</div>

<h3><span class="feature-icon fa fa-cubes"></span>&nbsp;Datos Personales</h3>
<b>Nacionalidad: </b><?php echo $alumno['nacionalidad']; ?><br />
<b>CURP: </b><?php echo $alumno['curp']; ?><br />
<b>NSS: </b><?php echo $alumno['nss']; ?><br />
<b>Clinica: </b><?php echo $alumno['clinica']; ?><br />
<br>

<h3><span class="feature-icon fa fa-address-book"></span>&nbsp;Datos de Residencia</h3>
<b>Estado: </b><?php echo $alumno['estado']; ?><br />
<b>Municipio: </b><?php echo $alumno['ciudad']; ?><br />
<b>Colonia: </b><?php echo $alumno['colonia']; ?><br />
<b>Calle: </b><?php echo $alumno['calle']; ?><br />
<b>Codigo Postal: </b><?php echo $alumno['codigoPostal']; ?><br />
<b>Numero Exterior: </b><?php echo $alumno['numExt']; ?><br />
<b>Numero Interior: </b><?php echo $alumno['numInt']; ?><br />
<br>

<h3><span class="feature-icon fa fa-phone"></span>&nbsp;Datos de Contacto</h3>
<b>Numero Celular: </b><?php echo $alumno['numeroCelular']; ?><br />
<b>Correo: </b><?php echo $alumno['correo']; ?><br />
<br>

<h3><span class="feature-icon fa fa-warning"></span>&nbsp;Contacto Emergencia</h3>
<b>Contacto de Emergencia: </b><?php echo $alumno['padreEmergencia']; ?><br />
<b>Numero de Emergencia: </b><?php echo $alumno['numeroEmergencia']; ?><br />
<br>

<h3><span class="icon-pin"></span>&nbsp;Estatus</h3>
<b>Estado del Alumno: </b><?php if($alumno['egresado'] == 0){?>

                            <font style="color:#F00;">Dado de baja</font>
						<?php }elseif($alumno['egresado'] == 1){?>
                            <font style="color:#0C0">En Practicas...</font>
						<?php }else{?>
                            <font style="color:#03C;">¡Acreditado!</font>
                        <?php } ?> <br />
<b>Empresa: </b><?php
	$idEmpresa = $alumno['idEmpresa'];
	$buscarEmpresaQuery = "SELECT nombre FROM empresa WHERE idEmpresa='$idEmpresa'";
	$buscarEmpresa = mysqli_query($conexion, $buscarEmpresaQuery);
	$empresa = mysqli_fetch_assoc($buscarEmpresa);
	echo $empresa['nombre'];
	?>

  <?php
  $buscarCantidadBaja = "SELECT count(codigoAlumno) AS total FROM bajas WHERE codigoAlumno='$codigoAlumno'";
  $buscarCantidad = mysqli_query($conexion, $buscarCantidadBaja);
  $total = mysqli_fetch_assoc($buscarCantidad);
  $total = $total['total'];
  $counter = 4;
  if($total > 0){
  while($baja = mysqli_fetch_assoc($buscarBaja)){
  ?>
  <br><br>
  <div style="background-color: rgba(255, 0, 0, 0.<?php echo $counter; ?>); max-width:90%; padding:10px;">
  <h3><span id="icon-thumbs-down" class="icon-thumbs-down"></span>Baja</h3>

  <b>Fecha: </b><?php echo $baja['fecha'] . "<br />"; ?>
  <b>Motivo: </b><?php echo $baja['motivo'] . "<br />"; ?>
  <b>Usuario: </b><?php echo $baja['usuario'] . "<br />"; ?>

</div>
<?php ++$counter;}
} ?>
</div>

</body>
</html>
