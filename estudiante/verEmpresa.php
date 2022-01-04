<?php
if(!isset($_SESSION['estudiante'])){ header("Location: ../index.php");
error_reporting(0);}

require("../controller/conexion.php");
$idEmpresa = $_POST['id'];
$getEmpresaQuery = "SELECT * FROM empresa WHERE idEmpresa='$idEmpresa'";
$getEmpresa = mysqli_query($conexion, $getEmpresaQuery);
$datos = mysqli_fetch_assoc($getEmpresa);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/verEmpresas-es.css">
</head>
<body>
	<br><br><br><br>
	<h3 style="color:#F00;">"<?php echo $datos['nombre']; ?>"</h3>
	<div class="perfil">
    <div class="advertencia" style="display: block;">
        <p style="float:right; margin-right:10%; color:#930;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   ¡La dirección aquí mostrada podría no ser exacta!</p>
    </div>
	<div class="direccion">
        <div id="map" style="width:50%;height:300px;background:#8e8e8e; position: absolute; right: 10%; top:10%;">
            <iframe style="width:100%;height:100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC3MOic-dxckfiywqT8SoYc8Hx0pqNy4sk&q=<?php echo str_replace(" ", "+", trim($datos['nombre'])) ?>+<?php echo $datos['numExt'] ?>,+<?php echo str_replace(" ", "+", trim($datos['colonia'])) ?>,+<?php echo $datos['cp'] ?>+<?php echo $datos['municipio'] ?>,+<?php echo $datos['estado'] ?>" allowfullscreen></iframe>
        </div>
        <script>
//            function initMap() {
//                var uluru = {lat: 38.952285, lng: -77.144910};
//                var map = new google.maps.Map(document.getElementById('map'), {
//                    zoom: 10,
//                    center: uluru
//                });
//                var marker = new google.maps.Marker({
//                    position: uluru,
//                    map: map
//                });
//            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARCwVEWpaxUH8KJO6fORZXZRgoryq3ZU0&callback=initMap">
        </script>
    </div>

<br><br>
<div class="datos-em">
        <p><b>Calle: </b><?php echo $datos['calle']; ?></p>
        <p><b>Numero Exterior: </b><?php echo $datos['numExt']; ?></p>
        <p><b>Colonia: </b><?php echo $datos['colonia']; ?></p>
        <p><b>Codigo Postal: </b><?php echo $datos['cp']; ?></p>
        <p><b>Municipio: </b><?php echo $datos['municipio']; ?></p>
        <p><b>Estado: </b><?php echo $datos['estado']; ?></p>

        <p><b>Encargado: </b><?php echo $datos['encargado']; ?></p>
        <p><b>Departamento: </b><?php echo $datos['departamento']; ?></p>
        <p><b>Actividades: </b><?php echo $datos['actividades']; ?></p>
        <p><b>Telefono: </b><?php echo $datos['telefono']; ?></p>
        <p><b>Correo: </b><?php echo $datos['correo']; ?></p>
        <p><b>Sitio Web: </b><?php echo $datos['sitioWeb']; ?></p><br><br>
</div>
	<div class="direccionR">
     <div class="advertenciaR" style="display: block;">
         <p style="color:#930;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   ¡La dirección aquí mostrada podría no ser exacta!</p>
        </div>
        <div id="map" style="width:50%;height:300px;background:#8e8e8e; width:95%;">
            <iframe style="width:100%;height:100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC3MOic-dxckfiywqT8SoYc8Hx0pqNy4sk&q=<?php echo str_replace(" ", "+", trim($datos['nombre'])) ?>+<?php echo $datos['numExt'] ?>,+<?php echo str_replace(" ", "+", trim($datos['colonia'])) ?>,+<?php echo $datos['cp'] ?>+<?php echo $datos['municipio'] ?>,+<?php echo $datos['estado'] ?>" allowfullscreen></iframe>
        </div>
        <script>
//            function initMap() {
//                var uluru = {lat: 38.952285, lng: -77.144910};
//                var map = new google.maps.Map(document.getElementById('map'), {
//                    zoom: 10,
//                    center: uluru
//                });
//                var marker = new google.maps.Marker({
//                    position: uluru,
//                    map: map
//                });
//            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARCwVEWpaxUH8KJO6fORZXZRgoryq3ZU0&callback=initMap">
        </script>
    </div>

</div>
    <?php
    $codigoAlumno = $_SESSION['estudiante'];
    $getPromedioQuery = "SELECT promedio AS prom FROM alumnos WHERE codigoAlumno='$codigoAlumno'";
    $getPromedio = mysqli_query($conexion, $getPromedioQuery);
    $promedio = mysqli_fetch_assoc($getPromedio);
    $promedio = $promedio['prom'];

    $verFechaQuery1 = "SELECT * FROM eleccion WHERE idEleccion='1'";
    $verFecha1 = mysqli_query($conexion, $verFechaQuery1);
    $fecha1 = mysqli_fetch_assoc($verFecha1);

    $verFechaQuery2 = "SELECT * FROM eleccion WHERE idEleccion='2'";
    $verFecha2 = mysqli_query($conexion, $verFechaQuery2);
    $fecha2 = mysqli_fetch_assoc($verFecha2);

    $verFechaQuery3 = "SELECT * FROM eleccion WHERE idEleccion='3'";
    $verFecha3 = mysqli_query($conexion, $verFechaQuery3);
    $fecha3 = mysqli_fetch_assoc($verFecha3);

    $verFechaQuery4 = "SELECT * FROM eleccion WHERE idEleccion='4'";
    $verFecha4 = mysqli_query($conexion, $verFechaQuery4);
    $fecha4 = mysqli_fetch_assoc($verFecha4);

    $verFechaQuery5 = "SELECT * FROM eleccion WHERE idEleccion='5'";
    $verFecha5 = mysqli_query($conexion, $verFechaQuery5);
    $fecha5 = mysqli_fetch_assoc($verFecha5);

    $promedioCorrecto = false;
    if(date('m-d-y', time()) == $fecha1['fecha'] && $promedio <= 100 && $promedio >= 90){ $promedioCorrecto = true; }
    if(date('m-d-y', time()) == $fecha2['fecha'] && $promedio < 90 && $promedio >= 80){ $promedioCorrecto = true; }
    if(date('m-d-y', time()) == $fecha3['fecha'] && $promedio < 80 && $promedio >= 70){ $promedioCorrecto = true; }
    if(date('m-d-y', time()) == $fecha4['fecha'] && $promedio < 70 && $promedio >= 60){ $promedioCorrecto = true; }
    if(date('m-d-y', time()) == $fecha5['fecha'] && $promedio < 60 && $promedio >= 0){ $promedioCorrecto = true; }

    // Esto busca la idEmpresa del estudiante, si es que ya tiene uno, el boton no se ve
    $codigoAlumno = $_SESSION['estudiante'];
    $buscarEmpresaQuery = "SELECT idEmpresa FROM alumnos WHERE codigoAlumno = '$codigoAlumno'";
    $buscarEmpresa = mysqli_query($conexion, $buscarEmpresaQuery);
    $empresa = mysqli_fetch_assoc($buscarEmpresa);
    if(!$empresa['idEmpresa'] && $promedioCorrecto){
    ?>
    <form action="elegirEmpresa.php" method="post" onsubmit="return confirm('¿Estás seguro de elegir esta empresa?');">
        <input type="hidden" name="idEmpresa" value="<?php echo $datos['idEmpresa']; ?>" />
        <input type="submit" name="elegirEmpresa" value="Elegir" id="gc"/>
    </form>
    <?php } ?>
</body>
</html>
