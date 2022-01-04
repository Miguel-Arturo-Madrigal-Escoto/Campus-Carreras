<?php
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }
require("getHistorial.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Historial</title>
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <link rel="stylesheet" href="../css/bajas.css"/>
    <link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css"/>
</head>
<body><br><br><br><br><br>
<h3 align="center" style="font-size:32px; color:red;"><span class="icon-group"></span>Historial de bajas</h3>
<br><br><br>
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
  <script src="../js/buscadorBajas.js"></script>
<!--jquery-->
  <script src="../js/jquery.min.js"></script>
</body>
</html>
