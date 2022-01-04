<?php
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }
if(isset($_POST['editarEmpresa'])){
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/editarEmpresa.css">
</head>
<body>
	<br><br><br>
    <h3 style="color:#F00;">"<?php echo $empresa['nombre']; ?>"</h3>
    <div class="perfil">
    <form action="actualizarEmpresa.php" method="post">
    <br>
        <input type="hidden" name="idEmpresa" value="<?php echo $empresa['idEmpresa']; ?>" />
        <input type="hidden" name="idEmpresa" value="<?php echo $empresa['idEmpresa']; ?>" />
        <span class="icon-dot"></span><b>Nombre: </b><input type="text" name="nombre" value="<?php echo $empresa['nombre']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Contraseña: </b><input type="text" name="contrasena" value="<?php echo $empresa['contrasena']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Calle: </b><input type="text" name="calle" value="<?php echo $empresa['calle']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Numero exterior: </b><input type="text" name="numExt" value="<?php echo $empresa['numExt']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Colonia: </b><input type="text" name="colonia" value="<?php echo $empresa['colonia']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Codigo Postal: </b><input type="text" name="cp" value="<?php echo $empresa['cp']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Municipio: </b><input type="text" name="municipio" value="<?php echo $empresa['municipio']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Estado: </b><input type="text" name="estado" value="<?php echo $empresa['estado']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Encargado: </b><input type="text" name="encargado" value="<?php echo $empresa['encargado']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Cargo del encargado: </b><input type="text" name="cargoDir" value="<?php echo $empresa['cargoDir']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Departamento: </b><input type="text" name="departamento" value="<?php echo $empresa['departamento']; ?>" /><br /><br />
        <span class="icon-dot"></span><b>Actividades: </b><input type="text" name="actividades" value="<?php echo $empresa['actividades']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Telefono: </b><input type="text" name="telefono" required value="<?php echo $empresa['telefono']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Correo: </b><input type="email" name="correo" value="<?php echo $empresa['correo']; ?>" required /><br /><br />
        <span class="icon-dot"></span><b>Sitio Web: </b><input type="text" name="sitioWeb" value="<?php echo $empresa['sitioWeb']; ?>"/><br /><br /><br />
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
                <td style="width:10%;"> <!--MM:--> <input type="number" name="BATDMM" value="<?php echo ord($admin[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="BTGOMM" value="<?php echo ord($gestion[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="TPTEMM" value="<?php echo ord($telec[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="TPINMM" value="<?php echo ord($infor[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="TPEAMM" value="<?php echo ord($energ[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="TPMIMM" value="<?php echo ord($meca[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="TPEIMM" value="<?php echo ord($electri[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="TPBIMM" value="<?php echo ord($bio[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MM:--> <input type="number" name="TPMCMM" value="<?php echo ord($proce[0]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Masculino Vespertino:</td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="BATDMV" value="<?php echo ord($admin[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            	  <td style="width:10%;"> <!--MV:--> <input type="number" name="BTGOMV" value="<?php echo ord($gestion[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="TPTEMV" value="<?php echo ord($telec[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="TPINMV" value="<?php echo ord($infor[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="TPEAMV" value="<?php echo ord($energ[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="TPMIMV" value="<?php echo ord($meca[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="TPEIMV" value="<?php echo ord($electri[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="TPBIMV" value="<?php echo ord($bio[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MV:--> <input type="number" name="TPMCMV" value="<?php echo ord($proce[1]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Masculino Sin Especificar Turno: </th>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="BATDMS" value="<?php echo ord($admin[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            	  <td style="width:10%;"> <!--MS:--> <input type="number" name="BTGOMS" value="<?php echo ord($gestion[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="TPTEMS" value="<?php echo ord($telec[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="TPINMS" value="<?php echo ord($infor[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="TPEAMS" value="<?php echo ord($energ[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="TPMIMS" value="<?php echo ord($meca[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="TPEIMS" value="<?php echo ord($electri[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="TPBIMS" value="<?php echo ord($bio[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--MS:--> <input type="number" name="TPMCMS" value="<?php echo ord($proce[2]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Femenino Matutino: </td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="BATDFM" value="<?php echo ord($admin[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            	  <td style="width:10%;"> <!--FM:--> <input type="number" name="BTGOFM" value="<?php echo ord($gestion[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="TPTEFM" value="<?php echo ord($telec[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="TPINFM" value="<?php echo ord($infor[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="TPEAFM" value="<?php echo ord($energ[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="TPMIFM" value="<?php echo ord($meca[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="TPEIFM" value="<?php echo ord($electri[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="TPBIFM" value="<?php echo ord($bio[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FM:--> <input type="number" name="TPMCFM" value="<?php echo ord($proce[3]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Femenino Vespertino: </th>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="BATDFV" value="<?php echo ord($admin[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            	  <td style="width:10%;"> <!--FV:--> <input type="number" name="BTGOFV" value="<?php echo ord($gestion[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="TPTEFV" value="<?php echo ord($telec[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="TPINFV" value="<?php echo ord($infor[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="TPEAFV" value="<?php echo ord($energ[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="TPMIFV" value="<?php echo ord($meca[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="TPEIFV" value="<?php echo ord($electri[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="TPBIFV" value="<?php echo ord($bio[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FV:--> <input type="number" name="TPMCFV" value="<?php echo ord($proce[4]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Femenino Sin Especificar Turno: </td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="BATDFS" value="<?php echo ord($admin[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
              	<td style="width:10%;"> <!--FS:--> <input type="number" name="BTGOFS" value="<?php echo ord($gestion[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="TPTEFS" value="<?php echo ord($telec[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="TPINFS" value="<?php echo ord($infor[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="TPEAFS" value="<?php echo ord($energ[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="TPMIFS" value="<?php echo ord($meca[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="TPEIFS" value="<?php echo ord($electri[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="TPBIFS" value="<?php echo ord($bio[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--FS:--> <input type="number" name="TPMCFS" value="<?php echo ord($proce[5]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Sin Especificar Genero Matutino: </th>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="BATDSM" value="<?php echo ord($admin[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            	  <td style="width:10%;"> <!--SM:--> <input type="number" name="BTGOSM" value="<?php echo ord($gestion[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="TPTESM" value="<?php echo ord($telec[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="TPINSM" value="<?php echo ord($infor[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="TPEASM" value="<?php echo ord($energ[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="TPMISM" value="<?php echo ord($meca[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="TPEISM" value="<?php echo ord($electri[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="TPBISM" value="<?php echo ord($bio[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SM:--> <input type="number" name="TPMCSM" value="<?php echo ord($proce[6]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr>
            	<td scope="row" style="text-align:left;"> Sin Especificar Genero Vespertino: </td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="BATDSV" value="<?php echo ord($admin[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
              	<td style="width:10%;"> <!--SV:--> <input type="number" name="BTGOSV" value="<?php echo ord($gestion[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="TPTESV" value="<?php echo ord($telec[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="TPINSV" value="<?php echo ord($infor[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="TPEASV" value="<?php echo ord($energ[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="TPMISV" value="<?php echo ord($meca[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="TPEISV" value="<?php echo ord($electri[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="TPBISV" value="<?php echo ord($bio[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"> <!--SV:--> <input type="number" name="TPMCSV" value="<?php echo ord($proce[7]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
            <tr style="background-color:#E3E3E3;">
            	<th scope="row" style="text-align:left;"> Sin Especificar Turno Y Genero: </th>
                <td style="width:10%;"><!--SS:--> <input type="number" name="BATDSS" value="<?php echo ord($admin[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="BTGOSS" value="<?php echo ord($gestion[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="TPTESS" value="<?php echo ord($telec[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="TPINSS" value="<?php echo ord($infor[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="TPEASS" value="<?php echo ord($energ[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="TPMISS" value="<?php echo ord($meca[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="TPEISS" value="<?php echo ord($electri[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="TPBISS" value="<?php echo ord($bio[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
                <td style="width:10%;"><!--SS:--> <input type="number" name="TPMCSS" value="<?php echo ord($proce[8]) - 48; ?>" min="0" max="50" id="gh"/><br /></td>
            </tr>
         </table><br>
        <input type="submit" name="actualizarEmpresa" value="Actualizar" id="gc"/>
    </form>
</body>
</html>
<?php
} // Cierra el Editar Empresa
if(isset($_POST['eliminarEmpresa'])){
    $idEmpresa = $_POST['idEmpresa'];
    require("../controller/conexion.php");
    $actualizarEmpresaQuery = "DELETE FROM empresa WHERE idEmpresa = '$idEmpresa'";
    mysqli_query($conexion, $actualizarEmpresaQuery);
    $actualizarEmpresaQuery2 = "DELETE FROM cupos WHERE idEmpresa = '$idEmpresa'";
    mysqli_query($conexion, $actualizarEmpresaQuery2);
    $ubicacion = "Location: index.php?adm=" . md5(1);
        header($ubicacion);
}
?>
