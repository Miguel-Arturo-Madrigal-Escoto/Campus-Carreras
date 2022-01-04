<?php
require("getAlumno.php");
if(!isset($_SESSION['estudiante'])){ header("Location: index.php"); }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/editarEscolares.css" />
    <style type="text/css">
	#select{
		width:20%;
	}
	@media screen and (max-width:1024px){
		#select{
			width:100%;
		}
		#name{
			width:205%;
		}
	}
  input[name="contrasena"]{
    text-transform: none;
  }

	</style>
</head>
<body>
<div class="titulo">
	    <h2 id="1"><span class="feature-icon fa fa-pencil"></span>&nbsp;Datos Escolares</h2>
</div>
<div class="escolares">
    <?php if(isset($_POST['editarEscolares'])){ ?>
    <br>
    <form action="index.php?es=<?php echo md5(11); ?>" method="post">
        <b>Nombre: </b><input id="name" type="text" name="nombre" value="<?php echo $info['nombre']; ?>" required /><br /><br>
        <b>Genero: </b> <br><span class="man icon-user"></span>&nbsp;MASCULINO&nbsp;<input type="radio" name="genero" value="M" id="Masculino" <?php if($info['genero'] == 'M'){ ?>checked="checked"<?php } ?> />

                        <br><span class="woman icon-user"></span>&nbsp;FEMENINO&nbsp;<input type="radio" name="genero" value="F" id="Femenino" <?php if($info['genero'] == 'F'){ ?>checked="checked"<?php } ?> />

        <br /><br>
        <b>Carrera: </b>
        <select name="carrera" id="select">
        	  <option value="BTAD" <?php if($info['carrera'] == 'BTAD'){ ?> selected <?php } ?> >BTAD</option>
            <option value="BTGO" <?php if($info['carrera'] == 'BTGO'){ ?> selected <?php } ?> >BTGO</option>
            <option value="TPIN" <?php if($info['carrera'] == 'TPIN'){ ?> selected <?php } ?> >TPIN</option>
            <option value="BTPT" <?php if($info['carrera'] == 'BTPT'){ ?> selected <?php } ?> >BTPT</option>
            <option value="TPEA" <?php if($info['carrera'] == 'TPEA'){ ?> selected <?php } ?> >TPEA</option>
            <option value="TPEI" <?php if($info['carrera'] == 'TPEI'){ ?> selected <?php } ?> >TPEI</option>
            <option value="TPMI" <?php if($info['carrera'] == 'TPMI'){ ?> selected <?php } ?> >TPMI</option>
            <option value="TPMC" <?php if($info['carrera'] == 'TPMC'){ ?> selected <?php } ?> >TPMC</option>
            <option value="TPBI" <?php if($info['carrera'] == 'TPBI'){ ?> selected <?php } ?> >TPBI </option>
        </select>
        <br /><br>
        <b>Turno: </b><br> <input type="radio" name="turno" value="M" <?php if($info['turno'] == 'M'){ ?>checked="checked"<?php } ?> />&nbsp;Matutino
                        <br><input type="radio" name="turno" value="V" <?php if($info['turno'] == 'V'){ ?>checked="checked"<?php } ?> />&nbsp;Vespertino<br /><br>
                        <b>Contraseña: </b><input type="text" name="contrasena" value="<?php echo $info['contrasena']; ?>" required /><br /><br>
        <input type="submit" name="actualizarEscolares" value="Guardar cambios" id="gc" /><br />
    </form>
    </div>
    </body>
    </html>
    <?php
    }
