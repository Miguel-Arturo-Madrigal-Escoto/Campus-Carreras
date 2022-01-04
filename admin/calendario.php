<?php

if(!isset($_SESSION['admin'])){ header("Location: index.php"); }
include("../controller/getFechas.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/calendario.css" />
</head>
<style type="text/css">
.cld-day{
	border:none;
}
#select{
	height:30px;
}
@media screen and (max-width: 600px){
	.cld-main{
    width: 140%;
	position:relative;
	right:20%;
	font-size:20px;

  }
  .cld-day.today .cld-number{
	  width:40px;
  }
}
@media screen and (min-width: 768px){
	.cld-main{
	width:150%;
	position:relative;
	right:20%;
	font-size:32px;
}
}
@media screen and (min-width: 768px){
	.cld-main{
	width:150%;
	position:relative;
	right:25%;
	font-size:32px;
}
h2{
	position:relative;
	font-size:48px;
	top:100px;}
.contenedor{
	position:relative;
	top:150px;
	}

}
</style>
<body>
    <script type="text/javascript" src="caleandar.js"></script>

    <h2 align="center"> CALENDARIO </h2>
    <div class="contenedor">
        <div id="caleandar"></div>
    </div>

    <script type='text/javascript'>

        var events = [
			<?php while($fecha = mysqli_fetch_assoc($getFechas)){ ?>
			{'Date': new Date(<?php echo $fecha['fecha']; ?>), 'Title': "<?php echo $fecha['titulo']; ?>", 'Link': "<?php echo $fecha['link']; ?>"},
			<?php } ?>
        ];

        var settings = {};
        var element = document.getElementById('caleandar');
        caleandar(element, events, settings);
    </script>
    <h3 class="agregarF">Agregar Fecha</h3>
    <br>
    <div class="agregarFech">
    <form action="actualizarFecha.php" method="post">
    	<b>Titulo: </b><input type="text" name="titulo" required /><br /><br>
    	<b>Link: </b><input type="text" name="link" /><br /><br>
    	<b>Dia: </b><select name="dia" id="select" required />
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>&nbsp;&nbsp;&nbsp;

    	<b>Mes: </b><select name="mes" id="select" required >
                        <option value="00">Enero</option>
                        <option value="01">Febrero</option>
                        <option value="02">Marzo</option>
                        <option value="03">Abril</option>
                        <option value="04">Mayo</option>
                        <option value="05">Junio</option>
                        <option value="06">Julio</option>
                        <option value="07">Agosto</option>
                        <option value="08">Septiembre</option>
                        <option value="09">Octubre</option>
                        <option value="10">Noviembre</option>
                        <option value="11">Diciembre</option>
                    </select>&nbsp;&nbsp;&nbsp;

    	<b>Año: </b><select name="anio" id="select" required >
                    <?php for($i = 2019; $i <= 2025; ++$i){ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    </select><br /><br><br />

    	<span class="icon-doc-add"><input type="submit" name="agregarFecha" value="Agregar Fecha" class="botones" /></span>
    </form>
    </div>
    <h3 class="modificarF">Modificar Fechas</h3>
    <br>
    <table class="table">
        <tr>
            <th class="columnaF">Fecha</th>
            <th class="columnaT">Titulo</th>
            <th class="columnaL">Link</th>
            <th class="nothing"></th>
            <th class="nothing"></th>
        </tr>
   <?php while($fecha2 = mysqli_fetch_assoc($getFechas2)){ ?>

        <tr>
        	<?php
            $fechaActual = $fecha2['fecha'];
			$anio = $fechaActual[0] . $fechaActual[1] . $fechaActual[2] . $fechaActual[3];
			$mes = $fechaActual[6] . $fechaActual[7];
			$dia = $fechaActual[10] . $fechaActual[11];
			?>
            <td><?php echo $anio . ', ' . ++$mes . ', ' . $dia; ?></td>
            <td><?php echo $fecha2['titulo']; ?></td>
            <td class="filaL"><?php echo $fecha2['link']; ?></td>
            <td>
                <form action="index.php?adm=<?php echo md5(13); ?>" method="post">
                    <input type="hidden" name="idFecha" value="<?php echo $fecha2['idFecha']; ?>" required />
                    <span class="icon-edit"><input type="submit" name="modificarFecha" value="Modificar" class="modificarFech" style="border:none; background:none;"/></span>
                </form>
            </td>

            <td>
                <form action="actualizarFecha.php" method="post">
                    <input type="hidden" name="idFecha" value="<?php echo $fecha2['idFecha']; ?>" required />
                    <span class="icon-trash"><input onclick="return confirm('¿Está seguro que desea borrar el evento?');" type="submit" name="eliminarFecha" value="Eliminar" class="eliminarFech" style="border:none; background:none;"/></span>
                </form>
            </td>
        </tr>
    <?php } ?>
    </table>

</body>
</html>
