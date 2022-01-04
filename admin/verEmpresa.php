8<?php
if(!isset($_SESSION['admin'])){ header("Location: index.php"); }
require("../controller/conexion.php");
$idEmpresa = $_POST['idEmpresa'];

$buscarDatosQuery = "SELECT * FROM empresa WHERE idEmpresa='$idEmpresa'";
$buscarDatos = mysqli_query($conexion, $buscarDatosQuery);
$empresa = mysqli_fetch_assoc($buscarDatos);

$buscarCuposQuery = "SELECT * FROM cupos WHERE idEmpresa='$idEmpresa'";
$buscarCupos = mysqli_query($conexion, $buscarCuposQuery);
$cupos = mysqli_fetch_assoc($buscarCupos);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/verEmpresas.css">
</head>
<body>
	<br><br><br>
	<h3 style="color:#F00;">"<?php echo $empresa['nombre']; ?>"</h3>
	<div class="perfil">

        <div class="direccion">
        <div class="advertencia" style="display: block;">
            <p style="color:#930;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   ¡La dirección aquí mostrada podría no ser exacta!</p>
        </div>
        <div id="map" style="width:50%;height:260px;background:#8e8e8e; position: absolute; right: 10%; top:10%;">
            <iframe style="width:100%;height:100%" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC3MOic-dxckfiywqT8SoYc8Hx0pqNy4sk&q=<?php echo str_replace(" ", "+", trim($empresa['nombre'])) ?>+<?php echo $empresa['numExt'] ?>,+<?php echo str_replace(" ", "+", trim($empresa['colonia'])) ?>,+<?php echo $empresa['cp'] ?>+<?php echo $empresa['municipio'] ?>,+<?php echo $empresa['estado'] ?>" allowfullscreen></iframe>
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
	<div class="datos">
        <b>Codigo: </b><?php echo $empresa['idEmpresa']; ?><br />
        <b>Contraseña: </b><?php echo $empresa['contrasena']; ?><br />

        <b>Calle: </b><?php echo $empresa['calle']; ?><br />
        <b>Numero: </b><?php echo $empresa['numExt']; ?><br />
        <b>Colonia: </b><?php echo $empresa['colonia']; ?><br />
        <b>Codigo Postal: </b><?php echo $empresa['cp']; ?><br />
        <b>Municipio: </b><?php echo $empresa['municipio']; ?><br />
        <b>Estado: </b><?php echo $empresa['estado']; ?><br />

        <b>Encargado: </b><?php echo $empresa['encargado']; ?><br />
        <b>Cargo del encargado: </b><?php echo $empresa['cargoDir']; ?><br />
        <b>Departamento: </b><?php echo $empresa['departamento']; ?><br />
        <b>Actividades: </b><?php echo $empresa['actividades']; ?><br />
        <b>Telefono: </b><?php echo $empresa['telefono']; ?><br />
        <b>Correo: </b><?php echo $empresa['correo']; ?><br />
        <b>Sitio Web: </b><?php echo $empresa['sitioWeb']; ?><br /><br />


    </div>
	</div><br><br><hr>




    <h3 style="color:#0C3;"><span class="icon-tags"></span>&nbsp;Cupos</h3>
	<table class="table" border="1px">
        	<tr>
            	<th>&nbsp;</th>
            	<th style="color:#8000FF;">
                	BTAD<?php $admin = $cupos['adminOriginal']; ?></th>
                <th style="color:#F60;">
                	BTGO<?php $gestion = $cupos['gestionOriginal']; ?></th>
                <th style="color:#06C;">
                	TPTE<?php $telec = $cupos['telecOriginal']; ?></th>
                <th style="color:#090;">
                	TPIN<?php $infor = $cupos['inforOriginal']; ?></th>
                <th style="color:#F6C;">
                	TPEA<?php $energ = $cupos['energOriginal']; ?></th>
                <th style="color:#C60005;">
                	TPMI<?php $meca = $cupos['mecaOriginal']; ?></th>
                <th style="color:#B3B300;">
                	TPEI<?php $electri = $cupos['electriOriginal']; ?></th>
                <th style="color:#804040;">
                	TPBI<?php $bio = $cupos['bioOriginal']; ?></th>
                <th style="color:#666;">
                	TPMC<?php $proce = $cupos['proceOriginal']; ?></th>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Masculino Matutino:</th>
                <td> <!--MM:--> <?php echo ord($admin[0]) 	 - 48; ?><br /></td>
            	<td> <!--MM:--> <?php echo ord($gestion[0]) - 48; ?><br /></td>
                <td> <!--MM:--> <?php echo ord($telec[0])   - 48; ?><br /></td>
                <td> <!--MM:--> <?php echo ord($infor[0])   - 48; ?><br /></td>
                <td> <!--MM:--> <?php echo ord($energ[0])   - 48; ?><br /></td>
                <td> <!--MM:--> <?php echo ord($meca[0])    - 48; ?><br /></td>
                <td> <!--MM:--> <?php echo ord($electri[0]) - 48; ?><br /></td>
                <td> <!--MM:--> <?php echo ord($bio[0])     - 48; ?><br /></td>
                <td> <!--MM:--> <?php echo ord($proce[0])   - 48; ?><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Masculino Vespertino:</td>
                <td> <!--MV:--> <?php echo ord($admin[1])   - 48; ?><br /></td>
            	<td> <!--MV:--> <?php echo ord($gestion[1]) - 48; ?><br /></td>
                <td> <!--MV:--> <?php echo ord($telec[1])   - 48; ?><br /></td>
                <td> <!--MV:--> <?php echo ord($infor[1])   - 48; ?><br /></td>
                <td> <!--MV:--> <?php echo ord($energ[1])   - 48; ?><br /></td>
                <td> <!--MV:--> <?php echo ord($meca[1])    - 48; ?><br /></td>
                <td> <!--MV:--> <?php echo ord($electri[1]) - 48; ?><br /></td>
                <td> <!--MV:--> <?php echo ord($bio[1])     - 48; ?><br /></td>
                <td> <!--MV:--> <?php echo ord($proce[1])   - 48; ?><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Masculino Sin Especificar Turno: </th>
                <td> <!--MS:--> <?php echo ord($admin[2])   - 48; ?><br /></td>
            	<td> <!--MS:--> <?php echo ord($gestion[2]) - 48; ?><br /></td>
                <td> <!--MS:--> <?php echo ord($telec[2])   - 48; ?><br /></td>
                <td> <!--MS:--> <?php echo ord($infor[2])   - 48; ?><br /></td>
                <td> <!--MS:--> <?php echo ord($energ[2])   - 48; ?><br /></td>
                <td> <!--MS:--> <?php echo ord($meca[2])    - 48; ?><br /></td>
                <td> <!--MS:--> <?php echo ord($electri[2]) - 48; ?><br /></td>
                <td> <!--MS:--> <?php echo ord($bio[2])     - 48; ?><br /></td>
                <td> <!--MS:--> <?php echo ord($proce[2])   - 48; ?><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Femenino Matutino: </td>
                <td> <!--FM:--> <?php echo ord($admin[3])   - 48; ?><br /></td>
            	<td> <!--FM:--> <?php echo ord($gestion[3]) - 48; ?><br /></td>
                <td> <!--FM:--> <?php echo ord($telec[3])   - 48; ?><br /></td>
                <td> <!--FM:--> <?php echo ord($infor[3])   - 48; ?><br /></td>
                <td> <!--FM:--> <?php echo ord($energ[3])   - 48; ?><br /></td>
                <td> <!--FM:--> <?php echo ord($meca[3])    - 48; ?><br /></td>
                <td> <!--FM:--> <?php echo ord($electri[3]) - 48; ?><br /></td>
                <td> <!--FM:--> <?php echo ord($bio[3])     - 48; ?><br /></td>
                <td> <!--FM:--> <?php echo ord($proce[3])   - 48; ?><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Femenino Vespertino: </th>
                <td> <!--FV:--> <?php echo ord($admin[4])   - 48; ?><br /></td>
            	<td> <!--FV:--> <?php echo ord($gestion[4]) - 48; ?><br /></td>
                <td> <!--FV:--> <?php echo ord($telec[4])   - 48; ?><br /></td>
                <td> <!--FV:--> <?php echo ord($infor[4])   - 48; ?><br /></td>
                <td> <!--FV:--> <?php echo ord($energ[4])   - 48; ?><br /></td>
                <td> <!--FV:--> <?php echo ord($meca[4])    - 48; ?><br /></td>
                <td> <!--FV:--> <?php echo ord($electri[4]) - 48; ?><br /></td>
                <td> <!--FV:--> <?php echo ord($bio[4])     - 48; ?><br /></td>
                <td> <!--FV:--> <?php echo ord($proce[4])   - 48; ?><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Femenino Sin Especificar Turno: </td>
                <td> <!--FS:--> <?php echo ord($admin[5])   - 48; ?><br /></td>
            	<td> <!--FS:--> <?php echo ord($gestion[5]) - 48; ?><br /></td>
                <td> <!--FS:--> <?php echo ord($telec[5])   - 48; ?><br /></td>
                <td> <!--FS:--> <?php echo ord($infor[5])   - 48; ?><br /></td>
                <td> <!--FS:--> <?php echo ord($energ[5])   - 48; ?><br /></td>
                <td> <!--FS:--> <?php echo ord($meca[5])    - 48; ?><br /></td>
                <td> <!--FS:--> <?php echo ord($electri[5]) - 48; ?><br /></td>
                <td> <!--FS:--> <?php echo ord($bio[5])     - 48; ?><br /></td>
                <td> <!--FS:--> <?php echo ord($proce[5])   - 48; ?><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Sin Especificar Genero Matutino: </th>
                <td> <!--SM:--> <?php echo ord($admin[6])   - 48; ?><br /></td>
            	<td> <!--SM:--> <?php echo ord($gestion[6]) - 48; ?><br /></td>
                <td> <!--SM:--> <?php echo ord($telec[6])   - 48; ?><br /></td>
                <td> <!--SM:--> <?php echo ord($infor[6])   - 48; ?><br /></td>
                <td> <!--SM:--> <?php echo ord($energ[6])   - 48; ?><br /></td>
                <td> <!--SM:--> <?php echo ord($meca[6])    - 48; ?><br /></td>
                <td> <!--SM:--> <?php echo ord($electri[6]) - 48; ?><br /></td>
                <td> <!--SM:--> <?php echo ord($bio[6])     - 48; ?><br /></td>
                <td> <!--SM:--> <?php echo ord($proce[6])   - 48; ?><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Sin Especificar Genero Vespertino: </td>
                <td> <!--SV:--> <?php echo ord($admin[7])   - 48; ?><br /></td>
            	<td> <!--SV:--> <?php echo ord($gestion[7]) - 48; ?><br /></td>
                <td> <!--SV:--> <?php echo ord($telec[7])   - 48; ?><br /></td>
                <td> <!--SV:--> <?php echo ord($infor[7])   - 48; ?><br /></td>
                <td> <!--SV:--> <?php echo ord($energ[7])   - 48; ?><br /></td>
                <td> <!--SV:--> <?php echo ord($meca[7])    - 48; ?><br /></td>
                <td> <!--SV:--> <?php echo ord($electri[7]) - 48; ?><br /></td>
                <td> <!--SV:--> <?php echo ord($bio[7])     - 48; ?><br /></td>
                <td> <!--SV:--> <?php echo ord($proce[7])   - 48; ?><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Sin Especificar Turno Y Genero: </th>
                <td> <!--SS:--> <?php echo ord($admin[8])   - 48; ?><br /></td>
            	<td> <!--SS:--> <?php echo ord($gestion[8]) - 48; ?><br /></td>
                <td> <!--SS:--> <?php echo ord($telec[8])   - 48; ?><br /></td>
                <td> <!--SS:--> <?php echo ord($infor[8])   - 48; ?><br /></td>
                <td> <!--SS:--> <?php echo ord($energ[8])   - 48; ?><br /></td>
                <td> <!--SS:--> <?php echo ord($meca[8])    - 48; ?><br /></td>
                <td> <!--SS:--> <?php echo ord($electri[8]) - 48; ?><br /></td>
                <td> <!--SS:--> <?php echo ord($bio[8])     - 48; ?><br /></td>
                <td> <!--SS:--> <?php echo ord($proce[8])   - 48; ?><br /></td>
            </tr>
        </table><br><hr>
        <?php
        $getEstudiantesQuery = "SELECT * FROM alumnos WHERE idEmpresa = '$idEmpresa'";
        $getEstudiantes = mysqli_query($conexion, $getEstudiantesQuery);
        ?>
		<h3 style="color:#09F;"><span class="icon-book-open-1">&nbsp;Alumnos Asignados</span></h3>
        <table class="table" >
            <tr>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Carrera</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>
            <?php while($estudiantes = mysqli_fetch_assoc($getEstudiantes)){ ?>
            <tr>
                <td><?php echo $estudiantes['nombre']; ?></td>
                <td><?php
						if ($estudiantes['genero'] == 'M'){ echo "Masculino"; }
						else{ echo "Femenino"; } ?></td>
                <td><?php echo $estudiantes['carrera']; ?></td>
                <td><?php echo $estudiantes['edad']; ?></td>
                <td><?php echo $estudiantes['correo']; ?></td>
                <td><?php echo $estudiantes['numeroCelular']; ?></td>
            </tr>
            <?php } ?>
        </table>

</body>
</html>
