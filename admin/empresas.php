<?php
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }
require("../controller/conexion.php");
$buscarEmpresasQuery = "SELECT idEmpresa, nombre FROM empresa";
$buscarEmpresas = mysqli_query($conexion, $buscarEmpresasQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Historial</title>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <link rel="stylesheet" href="../css/empresas-adm.css"/>
    <link rel="stylesheet" href="../fontello/css/fontello.css"/>
</head>
<body><br><br /><br><br><br>
<h2 align="center" style="font-size:32px;"><span class="icon-briefcase"></span>&nbsp;Empresas</h2>
<br>
<div class="form-busqueda">
  <label for="caja_busqueda"><span class="icon-search"></span> </label>
  <input type="text" name="caja_busqueda" id="caja_busqueda"/>
</div>
<br>
<br>
<div id="datos">
</div>
<!--sera el archivo js para el buscador-->
      <script src="../js/buscadorEmpresa.js"></script>
    <!--jquery-->
      <script src="../js/jquery.min.js"></script>
</body>
</html>
