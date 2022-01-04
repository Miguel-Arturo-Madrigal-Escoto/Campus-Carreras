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
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <?php if(isset($_POST['editarEscolares'])){ ?>
    <h2>Datos Escolares</h2>
    <form action="index.php?es=<?php echo md5(7); ?>" method="post">
        <b>Nombre: </b><input type="text" name="nombre" value="<?php echo $info['nombre']; ?>" required /><br />
        <b>Genero: </b> MASCULINO<input type="radio" name="genero" value="M" <?php if($info['genero'] == 'M'){ ?>checked="checked"<?php } ?> />
                        FEMENINO<input type="radio" name="genero" value="F" <?php if($info['genero'] == 'F'){ ?>checked="checked"<?php } ?> /><br />
        <b>Carrera: </b>
        <select name="carrera">
        	<option value="BTAD">Bachillerato Tecnologico en Administracion.</option>
            <option value="BTGO">Bachillerato Tecnologico en Gestion Adualan y Operaciones.</option>
            <option value="TPIN">Tecnologo Profesional en Informatica.</option>
            <option value="BTPT">Tecnologo Profesional en Telecomunicaciones.</option>
            <option value="TPEA">Tecnologo Profesional en Energias Alternas.</option>
            <option value="TPEI">Tecnologo Profesional en Electricidad Industrial.</option>
            <option value="TPMI">Tecnologo Profesional en Mecanica Industrial.</option>
            <option value="TPMC">Tecnologo Profesional en Procesos de Manufactura x</option>
            <option value="TPBI">Tecnologo Profesional en Biotecnologia</option>
        </select>
        <br />
        <b>Turno: </b> M<input type="radio" name="turno" value="M" <?php if($info['turno'] == 'M'){ ?>checked="checked"<?php } ?> />
                        V<input type="radio" name="turno" value="V" <?php if($info['turno'] == 'V'){ ?>checked="checked"<?php } ?> /><br />

        <input type="submit" name="actualizarEscolares" value="EDITAR" /><br />
    </form>
    <?php
    }
    if(isset($_POST['editarPersonales'])){
    ?>

    <h2>Datos Personales</h2>
    <form action="index.php?es=<?php echo md5(7); ?>" method="post">
        <b>Nacionalidad: </b><input type="text" name="nacionalidad" value="<?php echo $info['nacionalidad']; ?>" required /><br />
        <b>CURP: </b><input type="text" name="curp" value="<?php echo $info['curp']; ?>" required /><br />
        <b>NSS: </b><input type="text" name="nss" value="<?php echo $info['nss']; ?>" required /><br />
        <b>Clinica: </b><input type="text" name="clinica" value="<?php echo $info['clinica']; ?>" required /><br />
        <input type="submit" name="actualizarPersonales" value="EDITAR" /><br />
    </form>
    <?php
    }
    if(isset($_POST['editarResidencia'])){
    ?>

    <h2>Datos de Residencia</h2>
    <form action="index.php?es=<?php echo md5(7); ?>" method="post">
        <b>Estado: </b><input type="text" name="estado" value="<?php echo $info['estado']; ?>" required /><br />
        <b>Municipio: </b><input type="text" name="ciudad" value="<?php echo $info['ciudad']; ?>" required /><br />
        <b>Colonia: </b><input type="text" name="colonia" value="<?php echo $info['colonia']; ?>" required /><br />
        <b>Calle: </b><input type="text" name="calle" value="<?php echo $info['calle']; ?>" required /><br />
        <b>Numero de Residencia: </b><?php echo $info['numExt'] . " - " . $info['numInt']; ?><br />
        <input type="submit" name="actualizarResidencia" value="EDITAR" /><br />
    </form>
    <?php
    }
    if(isset($_POST['editarContacto'])){
    ?>

    <h2>Datos de Contacto</h2>
    <form action="index.php?es=<?php echo md5(7); ?>" method="post">
        <b>Numero telefonico: </b> <input type="tel" name="numeroCelular" value="<?php echo $info['numeroCelular']; ?>" required /><br />
        <b>Correo Electronico: </b><input type="text" name="correo" value="<?php echo $info['correo']; ?>" required /><br />
        <input type="submit" name="actualizarContactos" value="EDITAR" /><br />
    </form>
    <?php
    }
    if(isset($_POST['editarEmergencia'])){
    ?>

    <h2>Contacto Emergencia</h2>
    <form action="index.php?es=<?php echo md5(7); ?>" method="post">
        <b>Nombre: </b><input type="text" name="padreEmergencia" value="<?php echo $info['padreEmergencia']; ?>" required /><br />
        <b>Numero: </b><input type="tel" name="numeroEmergencia" value="<?php echo $info['numeroEmergencia']; ?>" required /><br />
        <input type="submit" name="actualizarEmergencia" value="EDITAR" /><br />
    </form>
    <?php } ?>
</body>
</html>
