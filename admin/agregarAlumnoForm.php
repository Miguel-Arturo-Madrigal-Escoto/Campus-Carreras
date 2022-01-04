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
    <link rel="stylesheet" type="text/css" href="../css/agregarAlumnoForm.css"/>
</head>
<body><br>
<div class="titulo">
  <h2><span class="icon-school"><span>&nbsp;Nuevo alumno </h2>
</div><br><br>
<div class="formulario">
    <form action="agregarAlumno.php" method="post">
        <p> <span class="icon-person"></span> Codigo: </p> <input type="text" name="codigoAlumno" required /><br /><br>
        <p> <span class="icon-sort-name-up"></span> Nombre: </p><input type="text" name="nombre" required /><br /><br>
        <d> <span class="icon-th-list-3"></span> Carrera: </d>
        <select name="carrera" id="select">
        	  <option value="BTAD">Bachillerato Tecnologico en Administracion.</option>
            <option value="BTGO">Bachillerato Tecnologico en Gestion Aduanal y Operaciones.</option>
            <option value="TPIN">Tecnologo Profesional en Informatica.</option>
            <option value="BTPT">Tecnologo Profesional en Telecomunicaciones.</option>
            <option value="TPEA">Tecnologo Profesional en Energias Alternas.</option>
            <option value="TPEI">Tecnologo Profesional en Electricidad Industrial.</option>
            <option value="TPMI">Tecnologo Profesional en Mecanica Industrial.</option>
            <option value="TPMC">Tecnologo Profesional en Procesos de Manufactura Competitiva</option>
            <option value="TPBI">Tecnologo Profesional en Biotecnologia </option>
        </select><br /><br>
        <p> <span class="icon-folder"></span> Grado: </p> <input type="text" name="grado" required /><br /><br>
        <p> <span class="icon-group"></span> Grupo: </p><input type="text" name="grupo" required /><br /><br>

        <p> <span class="icon-th-list-3"></span> Turno: </p>
        <span class="icon-sun" style="color:#CC0;"></span> &nbsp;<font color="#000">Matutino</font> <input type="radio" name="turno" value="M" /> <br>
        <span class="icon-cloud-sun" style="color:#FF8000;"></span>&nbsp; <font color="#000">Vespertino</font> &nbsp; <input type="radio" name="turno" value="V" /><br /> <br>
        <d> <span class="icon-calendar"></span> Calendario: </d>
        <select name="calendario" required >
            <?php for($i = 2019; $i <= 2021; ++$i){ ?>
            <option value="<?php echo $i . 'A'; ?>"><?php echo $i . 'A'; ?></option>
            <option value="<?php echo $i . 'B';  ?>"><?php echo $i . 'B'; ?></option>
            <?php } ?>
        </select><br /><br>
        <input type="submit" name="agregarAlumno" value="Agregar Alumno" id="agregar-btn"/>
    </form>
</div>
</body>
</html>
