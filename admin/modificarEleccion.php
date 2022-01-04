<?php
if(!isset($_SESSION['admin'])){ header("Location: ../index.php"); }

require("../controller/conexion.php");
$buscarFechasQuery = "SELECT * FROM eleccion";
$buscarFechas = mysqli_query($conexion, $buscarFechasQuery);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modificar Eleccion</title>
    <link rel="stylesheet" type="text/css" href="../css/modificarEleccion.css"/>
 </head>
<body>
<div class="titulo">
  <h2><span class="icon-briefcase"></span>&nbsp;Fechas de Elección</h2>
</div>
<div class="form">
    <form action="actualizarEleccion.php" method="post">
      <?php $counter = 1;
      while($fechas = mysqli_fetch_assoc($buscarFechas)){
        $fechaActual = $fechas['fecha'];
        $dia = $fechaActual[3] . $fechaActual[4];
        $mes = $fechaActual[0] . $fechaActual[1];
        $anio = $fechaActual[6] . $fechaActual[7];
        ?>
        <b> <font color="#000"> Fecha actual:  </b><?php echo $fechaActual; ?></b><br />
        <b> Promedio: </b>[<?php echo $fechas['promedioMax'] . " - " . $fechas['promedioMin']; ?>]</font><br />
        <select name="anio<?php echo $counter; ?>" id="select" required >
                    <?php for($i = 2019; $i <= 2025; ++$i){ ?>
                        <option value="<?php echo $i - 2000; ?>"
                        <?php if($i == $anio){ ?> selected <?php } ?>
                        >
							<?php echo $i; ?>
                        </option>
                    <?php } ?>
                  </select><br />

        <select name="mes<?php echo $counter; ?>" id="select" required >
              <option value="00" <?php if($mes == '00'){ ?> selected <?php } ?> >Enero</option>
              <option value="01" <?php if($mes == '01'){ ?> selected <?php } ?> >Febrero</option>
              <option value="02" <?php if($mes == '02'){ ?> selected <?php } ?> >Marzo</option>
              <option value="03" <?php if($mes == '03'){ ?> selected <?php } ?> >Abril</option>
              <option value="04" <?php if($mes == '04'){ ?> selected <?php } ?> >Mayo</option>
              <option value="05" <?php if($mes == '05'){ ?> selected <?php } ?> >Junio</option>
              <option value="06" <?php if($mes == '06'){ ?> selected <?php } ?> >Julio</option>
              <option value="07" <?php if($mes == '07'){ ?> selected <?php } ?> >Agosto</option>
              <option value="08" <?php if($mes == '08'){ ?> selected <?php } ?> >Septiembre</option>
              <option value="09" <?php if($mes == '09'){ ?> selected <?php } ?> >Octubre</option>
              <option value="10" <?php if($mes == '10'){ ?> selected <?php } ?> >Noviembre</option>
              <option value="11" <?php if($mes == '11'){ ?> selected <?php } ?> >Diciembre</option>
          </select><br />

          <select name="dia<?php echo $counter; ?>" id="select" required />
              <?php for($i = 1; $i <= 31; ++$i){
              $tempFecha = $i;
              if($tempFecha < 10){ $tempFecha = '0' . $tempFecha; }
              ?>
              <option value="<?php echo $tempFecha; ?>" <?php if($tempFecha == $dia){ ?> selected <?php } ?> ><?php echo $i; ?> </option>
            <?php } ++$counter; ?>
          </select><br /><br /><hr>

      <?php } ?>
      <input type="submit" name="modificarEleccion" value="Actualizar" />
    </form>
  </div>
  </body>
</html>
