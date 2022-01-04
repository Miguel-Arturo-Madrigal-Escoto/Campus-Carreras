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
    <link rel="stylesheet" type="text/css" href="../css/editarResidencia.css" />
    <style type="text/css">
	@media screen and (max-width:1024px){
		.residencia{
			width:90%;
	}
	}
	</style>
</head>
<body>
<div class="titulo">
	    <h2><span class="feature-icon fa fa-address-book"></span>&nbsp;Datos de Residencia</h2>
</div>
<?php if(isset($_POST['editarResidencia'])){?>
<div class="residencia">
    <form action="index.php?es=<?php echo md5(11); ?>" method="post">
        <b>Estado: </b><input type="text" name="estado" value="<?php echo $info['estado']; ?>" required /><br /><br>
        <b>Municipio: </b><input type="text" name="ciudad" value="<?php echo $info['ciudad']; ?>" required /><br /><br>
        <b>Colonia: </b><input type="text" name="colonia" value="<?php echo $info['colonia']; ?>" required /><br /><br>
        <b>Calle: </b><input type="text" name="calle" value="<?php echo $info['calle']; ?>" required /><br /><br>
        <b> Codigo Postal: </b><br><input type="text" name="codigoPostal" value="<?php echo $info['codigoPostal'];?>" required /><br><br>
        <b>Numero de Residencia: </b><br><p>Numero Exterior: </p><input type="text" name="numExt" value="<?php echo $info['numExt'];?>" required
              <p>Numero Interior:</p><input type="text" name="numInt" value="<?php echo $info['numInt']; ?>"/> <br /><br><br>
        <input type="submit" name="actualizarResidencia" value="Guardar cambios" id="gc" /><br />

    </form>
    </div>

</body>
</html>
<?php
    }?>
