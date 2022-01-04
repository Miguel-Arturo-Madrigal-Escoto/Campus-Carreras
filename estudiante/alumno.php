<?php
require("getAlumno.php");
if(!isset($_SESSION['estudiante'])){ header("Location: ../index.php"); }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/alumno.css"/>
    <style type="text/css">
	@media screen and (max-width:600px)
	{
		h2{
			font-size:24px;
	}
	}
	</style>
</head>
<body>
<div class="perfil">
	<center><h2><span class="feature-icon fa fa-user"></span> Perfil </h2></center>
    <br><br>
    <h2 id="1"><span class="feature-icon fa fa-pencil"></span>&nbsp;Datos Escolares</h2>
    <b>Nombre: </b><?php echo $info['nombre']; ?><br />
    <b>Genero: </b><?php
					if ($info['genero'] == 'M'){ echo "MASCULINO"; }
					else{ echo "FEMENINO"; } ?>
              <br />
    <b>Codigo: </b><?php echo $info['codigoAlumno']; ?><br />
    <b>Carrera: </b><?php echo $info['carrera']; ?><br />
    <b>Turno: </b><?php echo $info['turno']; ?><br />
    <b>Promedio: </b><?php echo $info['promedio']; ?><br />
    <b>Contraseña: </b><?php echo $info['contrasena']; ?><br />
    <form action="index.php?es=<?php echo md5(6); ?>" method="post"><input type="submit" name="editarEscolares" value="EDITAR" class="editar" required /></form><br><br>

    <h2><span class="feature-icon fa fa-cubes"></span>&nbsp;Datos Personales</h2>
    <b>Nacionalidad: </b><?php echo $info['nacionalidad']; ?><br />
    <b>CURP: </b><?php echo $info['curp']; ?><br />
    <b>NSS: </b><?php echo $info['nss']; ?><br />
    <b>Clinica: </b><?php echo $info['clinica']; ?><br />
    <form action="index.php?es=<?php echo md5(7); ?>" method="post"><input type="submit" name="editarPersonales" value="EDITAR" class="editar" required /></form><br><br>

    <h2><span class="feature-icon fa fa-address-book"></span>&nbsp;Datos de Residencia</h2>
    <b>Estado: </b><?php echo $info['estado']; ?><br />
    <b>Municipio: </b><?php echo $info['ciudad']; ?><br />
    <b>Colonia: </b><?php echo $info['colonia']; ?><br />
    <b>Calle: </b><?php echo $info['calle']; ?><br />
    <b>Código Postal: </b><?php echo $info['codigoPostal'];?><br>
    <b>Numero de Residencia: </b><?php echo $info['numExt'] . " - " . $info['numInt']; ?><br />
    <form action="index.php?es=<?php echo md5(8); ?>" method="post"><input type="submit" name="editarResidencia" value="EDITAR" class="editar" required /></form><br><br>

    <h2><span class="feature-icon fa fa-phone"></span>&nbsp;Datos de Contacto</h2>
    <b>Numero telefonico: </b><?php echo $info['numeroCelular']; ?><br />
    <b>Correo Electronico: </b><?php echo $info['correo']; ?><br />
    <form action="index.php?es=<?php echo md5(9); ?>" method="post"><input type="submit" name="editarContacto" value="EDITAR" class="editar" required /></form><br><br>

    <h2><span class="feature-icon fa fa-warning"></span>&nbsp;Contacto Emergencia</h2>
    <b>Nombre de Contacto: </b><?php echo $info['padreEmergencia']; ?><br />
    <b>Numero de Emergencia: </b><?php echo $info['numeroEmergencia']; ?><br />
    <form action="index.php?es=<?php echo md5(10); ?>" method="post"><input type="submit" name="editarEmergencia" value="EDITAR" class="editar" required /></form><br><br>

     <h2><span class="feature-icon fa fa-tasks"></span>&nbsp;Asignación</h2>
    <b>Practicas Profesionales: </b>
	<?php
		$idEmpresa = $info['idEmpresa'];
		$buscarEmpresaQuery = "SELECT nombre FROM empresa WHERE idEmpresa='$idEmpresa'";
		$buscarEmpresa = mysqli_query($conexion, $buscarEmpresaQuery);
		$empresa = mysqli_fetch_assoc($buscarEmpresa);

		if($empresa['nombre']){?>
			<b style="color:#0C0;">&nbsp;<?php echo $empresa['nombre'];?></b>
			<?php }else{?>
				<b style="color:#F00;">&nbsp;¡Sin Asignación!</b>
				<?php } ?>

	<br />
</div>
</body>

</html>
