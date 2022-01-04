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
    <link rel="stylesheet" type="text/css" href="../css/editarPersonales.css" />
    <style type="text/css">
	@media screen and (max-width:1024px){
		.personales{
			width:90%;
	}
	}
	</style>
</head>
<body>
<div class="titulo">
	    <h2 id="1"><span class="feature-icon fa fa-cubes"></span>&nbsp;Datos Personales</h2>
</div>
    <?php if(isset($_POST['editarPersonales'])){
    ?>
    <div class="personales">
    <form action="index.php?es=<?php echo md5(11); ?>" method="post">
    <br>
        <b>Nacionalidad: </b><input type="text" name="nacionalidad" value="<?php echo $info['nacionalidad']; ?>" required /><br /><br>
        <b>CURP: </b><input type="text" name="curp" value="<?php echo $info['curp']; ?>" required /><br /><br>
        <b>NSS: </b><input type="text" name="nss" value="<?php echo $info['nss']; ?>" required /><br /><br>
        <b>Clinica: </b><input type="text" name="clinica" value="<?php echo $info['clinica']; ?>" required /><br /><br>
        <input type="submit" name="actualizarPersonales" value="Guardar cambios" id="gc" /><br />
    </form>
    </div>
    </body>
    </html>
    <?php
    }?>
