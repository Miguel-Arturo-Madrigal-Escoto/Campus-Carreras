<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }
require("getAlumno.php");
?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="../css/alumno.css"/>
    <link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#gc{
	border:none;
	cursor:pointer;
	background-color:#F93;
	transition: .2s all ease-in-out;
	height:40px;
	border-radius:8px;
}
#gc:hover{
	background-color:#F60;
}

</style>
</head>
<body>
	<div class="perfil" style="width:40%;">
    <?php if(isset($_POST['editarAlumno'])){
    $alumno = mysqli_fetch_assoc($infoAlumno); ?>
    <form action="actualizarAlumno.php" method="post">
		<div class="titulo">
	    	<h3 id="1"><span class="feature-icon fa fa-pencil"></span>&nbsp;Datos Escolares</h3>
		</div>
		<b>Nombre: </b><input class="mayus" id="name" type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" required /><br /><br>
        <b>Genero: </b><br><span class="icon-user-male" style="color:#06C;"></span>&nbsp;Masculino&nbsp;<input type="radio" name="genero" value="M" id="Masculino" <?php if($alumno['genero'] == 'M'){ ?>checked="checked"<?php } ?> />

                        <br><span class="icon-user-female" style="color:#FF4DFF;"></span>&nbsp;Femenino&nbsp;<input type="radio" name="genero" value="F" id="Femenino" <?php if($alumno['genero'] == 'F'){ ?>checked="checked"<?php } ?> /> <br /> <br />

        <b>Edad: </b><input type="text" name="edad" value="<?php echo $alumno['edad']; ?>" required/><br />
        <input type="hidden" name="codigoAlumno" value="<?php echo $alumno['codigoAlumno']; ?>"/><br />
        <b> Contraseña: </b> <input id="contrasena" type="text" name="contrasena" value="<?php echo $alumno['contrasena']; ?>" required/><br />
        <br>
       <b>Carrera: </b>
        <select name="carrera" id="select" style="height:30px;"required>
        	<option value="BTAD" <?php if($alumno['carrera'] == 'BATD'){ ?> selected <?php } ?> >Bachillerato Tecnologico en Administracion.</option>
            <option value="BTGO" <?php if($alumno['carrera'] == 'BTGO'){ ?> selected <?php } ?> >Bachillerato Tecnologico en Gestion Adualan y Operaciones.</option>
            <option value="TPIN" <?php if($alumno['carrera'] == 'TPIN'){ ?> selected <?php } ?> >Tecnologo Profesional en Informatica.</option>
            <option value="BTPT" <?php if($alumno['carrera'] == 'BTPT'){ ?> selected <?php } ?> >Tecnologo Profesional en Telecomunicaciones.</option>
            <option value="TPEA" <?php if($alumno['carrera'] == 'TPEI'){ ?> selected <?php } ?> >Tecnologo Profesional en Energias Alternas.</option>
            <option value="TPEI" <?php if($alumno['carrera'] == 'TPEI'){ ?> selected <?php } ?> >Tecnologo Profesional en Electricidad Industrial.</option>
            <option value="TPMI" <?php if($alumno['carrera'] == 'TPMI'){ ?> selected <?php } ?> >Tecnologo Profesional en Mecanica Industrial.</option>
            <option value="TPMC" <?php if($alumno['carrera'] == 'TPMC'){ ?> selected <?php } ?> >Tecnologo Profesional en Procesos de Manufactura Competitiva</option>
            <option value="TPBI" <?php if($alumno['carrera'] == 'TPBI'){ ?> selected <?php } ?> >Tecnologo Profesional en Biotecnologia </option>
        </select>
        <br />
        <br>
        <b>Grado: </b><input type="text" name="grado" value="<?php echo $alumno['grado']; ?>" required/><br />
        <b>Grupo: </b><input class="mayus" type="text" name="grupo" value="<?php echo $alumno['grupo']; ?>" required/><br /><br />
        <b>Turno: </b><br><span class="icon-sun" style="color:#CC0;"></span>&nbsp;Matutino&nbsp;<input type="radio" name="turno" value="M" <?php if($alumno['turno'] == 'M'){ ?>checked="checked"<?php } ?>required />
                        <br><span class="icon-cloud-sun" style="color:#FF8000;"></span>&nbsp;Vespertino&nbsp;<input type="radio" name="turno" value="V" <?php if($alumno['turno'] == 'V'){ ?>checked="checked"<?php } ?>required /><br /><br>
        <b>Promedio: </b><input type="text" name="promedio" value="<?php echo $alumno['promedio']; ?>" required/><br />
		<br><br />

        <h3><span class="feature-icon fa fa-cubes"></span>&nbsp;Datos Personales</h3>
        <b>Nacionalidad: </b><input class="mayus" type="text" name="nacionalidad" value="<?php echo $alumno['nacionalidad']; ?>" required/><br /><br />
        <b>CURP: </b><input type="text" class="mayus" name="curp" value="<?php echo $alumno['curp']; ?>" required/><br /><br />
        <b>NSS: </b><input type="text" name="nss" value="<?php echo $alumno['nss']; ?>"required /><br /><br />
        <b>Clinica: </b><input type="text" class="mayus" name="clinica" value="<?php echo $alumno['clinica']; ?>"required /><br />
        <br><br />

		<h3><span class="feature-icon fa fa-address-book"></span>&nbsp;Datos de Residencia</h3>
        <b>Estado: </b><input class="mayus" type="text" name="estado" value="<?php echo $alumno['estado']; ?>"required /><br /><br />
        <b>Ciudad: </b><input class="mayus" type="text" name="ciudad" value="<?php echo $alumno['ciudad']; ?>"required /><br /><br />
        <b>Colonia: </b><input class="mayus" type="text" name="colonia" value="<?php echo $alumno['colonia']; ?>" required/><br /><br />
        <b>Calle: </b><input  class="mayus" type="text" name="calle" value="<?php echo $alumno['calle']; ?>" required/><br /><br />
        <b>Codigo Postal: </b><input type="text" name="codigoPostal" value="<?php echo $alumno['codigoPostal']; ?>"required /><br /><br />
        <b>Numero Exterior: </b><input type="text" name="numExt" value="<?php echo $alumno['numExt']; ?>" required/><br /><br />
        <b>Numero Interior: </b><input type="text" name="numInt" value="<?php echo $alumno['numInt']; ?>"required /><br />
        <br><br />

        <h3><span class="feature-icon fa fa-phone"></span>&nbsp;Datos de Contacto</h3>
        <b>Numero Celular: </b><input type="text" name="numeroCelular" value="<?php echo $alumno['numeroCelular']; ?>" required/><br /><br />
        <b>Correo: </b><input type="email" name="correo" value="<?php echo $alumno['correo']; ?>" required/><br /><br />
        <br>

        <h3><span class="feature-icon fa fa-warning"></span>&nbsp;Contacto Emergencia</h3>
        <b>Contacto de Emergencia: </b><input class="mayus" type="text" name="padreEmergencia" value="<?php echo $alumno['padreEmergencia']; ?>"required /><br /><br />
        <b>Numero de Emergencia: </b><input type="text" name="numeroEmergencia" value="<?php echo $alumno['numeroEmergencia']; ?>"required /><br /><br />

        <input type="submit" name="actualizarAlumno" value="Actualizar Alumno" id="gc" /><br />

    </form>
    </div>

    <?php } ?>
</body>
</html>
<?php
if(isset($_POST['acreditarAlumno'])){
    $codigoAlumno = $_POST['alumno'];

    require("../controller/conexion.php");
    $revisarEgresadoQuery = "SELECT egresado FROM alumnos WHERE codigoAlumno = '$codigoAlumno'";
    $revisarEgresado = mysqli_query($conexion, $revisarEgresadoQuery);
    $egresado = mysqli_fetch_assoc($revisarEgresado);

    $temp = $egresado['egresado'] == 1 ? 2 : 1;
    $actualizarEgresadoQuery = "UPDATE alumnos SET egresado='$temp' WHERE codigoAlumno = '$codigoAlumno'";
    mysqli_query($conexion, $actualizarEgresadoQuery);
    $ubicacion = "Location: index.php?adm=".md5(5);
    header($ubicacion);
}

if(isset($_POST['bajaAlumno'])){
    $codigoAlumno = $_POST['alumno'];

    require("../controller/conexion.php");
    $actualizarEgresadoQuery = "UPDATE alumnos SET egresado='0' WHERE codigoAlumno = '$codigoAlumno'";
    mysqli_query($conexion, $actualizarEgresadoQuery);
    $ubicacion = "Location: index.php?adm=".md5(5);
    header($ubicacion);
}

if(isset($_POST['eliminarAlumno'])){
    $codigoAlumno = $_POST['alumno'];

    require("../controller/conexion.php");
    $actualizarEgresadoQuery = "DELETE FROM alumnos WHERE codigoAlumno = '$codigoAlumno'";
    mysqli_query($conexion, $actualizarEgresadoQuery);
    $ubicacion = "Location: index.php?adm=".md5(5);
    header($ubicacion);
}
?>
