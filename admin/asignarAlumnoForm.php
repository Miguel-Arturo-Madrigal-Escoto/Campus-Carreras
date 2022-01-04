<?php
if(!isset($_SESSION['admin'])){ header("Location.index.php"); }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/asignarAlumnoForm.css"/>
</head>
<body>
<div class="titulo">
  <h2><span class="icon-person"></span>&nbsp;Nueva asignación</h2>
</div>
<div class="formulario">
    <form action="asignarAlumno.php" method="POST">
        <p> <span class="icon-person"></span> Codigo Alumno: </p> <input type="text" name="codigoAlumno" class="codigo-input"  /><br><br>
        <p> <span class="icon-briefcase"></span> Codigo Empresa: </p> <input type="text" name="idEmpresa" class="codigo-input"  /><br><br>
        <input type="submit" name="asignarAlumno" value="Asignar Alumno" id="asignar-btn" />
    </form>
</div>
</body>
</html>
