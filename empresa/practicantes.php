<?php
session_start();
if(!isset($_SESSION['empresa'])){ header("Location: index.php"); }

require("../controller/conexion.php");
$idEmpresa = $_SESSION['empresa'];
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
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/verEmpresas.css">
</head>
<body>

        <?php
        $getEstudiantesQuery = "SELECT * FROM alumnos WHERE idEmpresa = '$idEmpresa'";
        $getEstudiantes = mysqli_query($conexion, $getEstudiantesQuery);
        ?>
		<br>
        <h3 style="color:#09F;"><span class="icon-graduation-cap-1">&nbsp;Alumnos Asignados</span></h3>
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
