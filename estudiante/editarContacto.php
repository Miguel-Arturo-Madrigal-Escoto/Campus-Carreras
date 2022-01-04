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
    <link rel="stylesheet" type="text/css" href="../css/editarContacto.css" />
    <style type="text/css">
	@media screen and (max-width:1024px){
		.contacto{
			width:90%;
	}
	}
	</style>
</head>
<body>
<div class="titulo">
	    <h2><span class="feature-icon fa fa-phone"></span>&nbsp;Datos de Contacto</h2>
</div>
<?php  if(isset($_POST['editarContacto'])){
    ?>
<div class="contacto">
    <form action="index.php?es=<?php echo md5(11); ?>" method="post">
    <br>
        <b>Numero telefonico: </b> <input type="tel" name="numeroCelular" value="<?php echo $info['numeroCelular']; ?>" required /><br /><br>
        <b>Correo Electronico: </b><input type="text" name="correo" value="<?php echo $info['correo']; ?>" required /><br /><br>
        <input type="submit" name="actualizarContactos" value="Guardar cambios" id="gc" /><br />

    </form>
    </div>

</body>
</html>
<?php }  ?>
