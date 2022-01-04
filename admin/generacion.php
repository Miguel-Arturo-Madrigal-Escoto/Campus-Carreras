<?php

if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }

  //datos de salida de la busqueda//
  $salida = "";
  $query = "SELECT * FROM alumnos ORDER BY codigoAlumno";

    $generacion = $_POST['generacion'];
    require("../controller/conexion.php");

    $_SESSION['generacion'] = $generacion;

    $buscarAlumnosQuery = "SELECT * FROM alumnos WHERE generacion = '$generacion'";
    $buscarAlumnos = mysqli_query($conexion, $buscarAlumnosQuery);



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Historial</title>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <link rel="stylesheet" href="../css/generacionAdm.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <style type="text/css">
	.contenedor-tabla{
		 color:#000;
		 position:relative;
		 left:5%;
		 }
	.table{
		max-width:90%;
    text-align: center;
	}
	.fa-tasks{
		font-size:48px;
		color:#F63;
	}
	h2{
		color:#F63;
	}
	.alumnoIn{
		transition: .2s all ease-in-out;
    color: #000;
		}
	.alumnoIn:hover{
		color:#03F;
	}
	.icon-eye:hover{
		color:#03F;
	}
	@media screen and (max-width: 600px){
		.no{
			display:none;
		}
		}
    </style>
</head>
<body><br><br><br><br>
<center><h2><span class="feature-icon fa fa-users"></span> <?php echo $_POST['generacion']; ?></h2></center><br>
<div class="form-busqueda">
  <label for="caja_busqueda"><span class="icon-search"></span> </label>
  <input type="text" name="caja_busqueda" id="caja_busqueda"/>
</div>
<br>
<br>
<div id="datos">
</div>
<div class="tabla">

</div>

    <!--sera el archivo js para el buscador-->
      <script src="../js/buscadorGeneracion.js"></script>
    <!--jquery-->
      <script src="../js/jquery.min.js"></script>
</body>
</html>
