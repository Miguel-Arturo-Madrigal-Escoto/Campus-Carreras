<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }
if(isset($_POST['modificarFecha'])){

require("../controller/conexion.php");
$idFecha = $_POST['idFecha'];
$getDatosFechaQuery = "SELECT * FROM calendario WHERE idFecha='$idFecha'";
$getDatosFecha = mysqli_query($conexion, $getDatosFechaQuery);
$datosFecha = mysqli_fetch_assoc($getDatosFecha);

$fechaActual = $datosFecha['fecha'];
$anio = $fechaActual[0] . $fechaActual[1] . $fechaActual[2] . $fechaActual[3];
$mes = $fechaActual[6] . $fechaActual[7];
$dia = $fechaActual[10] . $fechaActual[11];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modificar Fecha</title>
    <link rel="stylesheet" type="text/css" href="../css/modificarFecha.css"/>
</head>
<body>
<div class="titulo">
  <h2><span class="icon-exchange"></span>&nbsp;Modificar fecha</h2>
  <br>
</div>
<div class="formulario">
    <form action="actualizarFecha.php" method="post">
        <input type="hidden" name="idFecha" value="<?php echo $idFecha; ?>" required />
        <span class="icon-dot-circled"></span>&nbsp;<b><font color="#000">Titulo:</font> </b><br><input type="text" name="titulo" value="<?php echo $datosFecha['titulo']; ?>" required /><br /><br>
        <span class="icon-link"></span>&nbsp;<b><font color="#000">Link:</font> </b><br><input type="text" name="link" value="<?php echo $datosFecha['link']; ?>" /><br /><br>

        <span class="icon-calendar"></span>&nbsp;<b><font color="#000">Año:</font> </b><select name="anio" id="select" required >
                    <?php for($i = 2019; $i <= 2025; ++$i){ ?>
                        <option value="<?php echo $i; ?>"
                        <?php if($i == $anio){ ?> selected <?php } ?>
                        >
							<?php echo $i; ?>
                        </option>
                    <?php } ?>
                  </select><br /><br>

        <span class="icon-calendar"></span>&nbsp;<b><font color="#000">Mes: </font></b><select name="mes" id="select" required >
                        <option value="00" <?php if($mes == '00'){ ?> selected <?php } ?> >Enero</option>
                        <option value="01" <?php if($mes == '01'){ ?> selected <?php } ?> >Febrero</option>
                        <option value="02" <?php if($mes == '02'){ ?> selected <?php } ?> >Marzo</option>
                        <option value="03" <?php if($mes == '03'){ ?> selected <?php } ?> >Abril</option>
                        <option value="04" <?php if($mes == '04'){ ?> selected <?php } ?> >Mayo</option>
                        <option value="05" <?php if($mes == '05'){ ?> selected <?php } ?> v>Junio</option>
                        <option value="06" <?php if($mes == '06'){ ?> selected <?php } ?> >Julio</option>
                        <option value="07" <?php if($mes == '07'){ ?> selected <?php } ?> >Agosto</option>
                        <option value="08" <?php if($mes == '08'){ ?> selected <?php } ?> >Septiembre</option>
                        <option value="09" <?php if($mes == '09'){ ?> selected <?php } ?> >Octubre</option>
                        <option value="10" <?php if($mes == '10'){ ?> selected <?php } ?> >Noviembre</option>
                        <option value="11" <?php if($mes == '11'){ ?> selected <?php } ?> >Diciembre</option>
                    </select><br /><br>

                    <span class="icon-calendar"></span>&nbsp;<b><font color="#000">Dia:</font> </b><select name="dia" id="select" required />
                        <?php for($i = 1; $i <= 31; ++$i){ 
						$tempFecha = $i;
						if($tempFecha < 10){ $tempFecha = '0' . $tempFecha; }
						?>
                        <option value="<?php echo $tempFecha; ?>" <?php if($tempFecha == $dia){ ?> selected <?php } ?> ><?php echo $i; ?> </option>
                        <?php } ?>
                    </select><br /><br>

        <input type="submit" name="modificarFecha" value="Modificar" />
    </form>
  </div>
</body>
<?php }else{ header("Location: index.php"); } ?>
</html>
