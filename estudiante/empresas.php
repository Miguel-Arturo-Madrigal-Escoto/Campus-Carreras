<?php
require("getEmpresas.php");
if(!isset($_SESSION['estudiante'])){ header("Location: ../index.php");
error_reporting(0);}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Plazas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/empresas.css">
</head>
<body>
<br>
</div>
    <div class="titulo">
	<h2><span class="icon-briefcase"></span>&nbsp;CATALOGO DE EMPRESAS</h2>
</div>
    <table style="border:none;" id="tabla" class="table">
	<tr>

        </tr>
        <tr>
            <th>Nombre</th>
            <th>Cupos disponibles</th>
            <th>Información</th>
        </tr>
        <tr>
        <?php 
        

        while($empresa = mysqli_fetch_assoc($buscarEmpresas)) {
            $stringCupos = $empresa["$nombreTabla"];
            $disponible = false;

            // Ver si uno de los campos tiene cupos disponibles
            if($stringCupos["$posicionString"] != '0'){ $disponible = true; }
            if($stringCupos["$posicionGenero"] != '0'){ $disponible = true; }
            if($stringCupos["$posicionTurno"] != '0'){ $disponible = true; }
            if($stringCupos["8"] != '0'){ $disponible = true; }

            
            if($disponible){
                $idEmpresa = $empresa['idEmpresa'];
                $datosEmpresaQuery = "SELECT nombre FROM empresa WHERE idEmpresa='$idEmpresa'";
                $datosEmpresa = mysqli_query($conexion, $datosEmpresaQuery);
                $datos = mysqli_fetch_assoc($datosEmpresa);

                $getCuposQuery = "SELECT $nombreTabla FROM cupos WHERE idEmpresa='$idEmpresa'";
                $getCupos = mysqli_query($conexion, $getCuposQuery);
                $cupos = mysqli_fetch_assoc($getCupos);
                $cupos = $cupos["$nombreTabla"];

                $cantidadCupos = 0;
                for($i = 0; $i < strlen($cupos); ++$i){
                    if(ord($cupos[$i]) > 47 && ord($cupos[$i]) < 58){
                        $cantidadCupos += ord($cupos[$i]) - 48;
                    }
                    if(ord($cupos[$i]) > 64 && ord($cupos[$i]) < 91){
                        $cantidadCupos += ord($cupos[$i]) - 55;
                    }
                    if(ord($cupos[$i]) > 95 && ord($cupos[$i]) < 123){
                        $cantidadCupos += ord($cupos[$i]) - 60;
                    }
                }
            ?>
                <th class="th"><?php echo $datos['nombre']; ?></th>
                <td class="td"><?php echo $cantidadCupos; ?></td>
                <td>
                    <form action="index.php?es=<?php echo md5(5); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $idEmpresa; ?>" />
                        <span class="icon-eye"><input type="submit" name="verEmpresa" value="Ver datos" class="ver-datos icon-home" /></span>
                    </form>
                </td>
            </tr>

            <?php }
        } ?>
        </tr>
    </table>
</body>
</html>
