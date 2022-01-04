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
    <link rel="stylesheet" type="text/css" href="../css/editarEmergencia.css" />
    <style type="text/css">
	@media screen and (max-width:1024px){
		.emergencia{
			width:90%;
	}
	}
	</style>
</head>
<body>
<div class="titulo">
	    <h2><span class="feature-icon fa fa-warning"></span>&nbsp;Datos de Emergencia</h2>
</div>
<?php if(isset($_POST['editarEmergencia'])){
    ?>
<div class="emergencia">
    <form action="index.php?es=<?php echo md5(11); ?>" method="post">
       <b>Nombre: </b><input type="text" name="padreEmergencia" value="<?php echo $info['padreEmergencia']; ?>" required /><br /><br>
        <b>Numero: </b><input type="tel" name="numeroEmergencia" value="<?php echo $info['numeroEmergencia']; ?>" required /><br /><br>
        <input type="submit" name="actualizarEmergencia" value="Guardar cambios" id="gc" /><br />

    </form>
    </div>

</body>
</html>
<?php } ?>
