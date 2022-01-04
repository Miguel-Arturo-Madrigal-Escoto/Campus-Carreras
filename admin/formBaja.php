<link rel="stylesheet" type="text/css" href="../css/formbajas.css"/>
<?php
$fila['nombre'] = $_POST['alumno'];
$fila['codigoAlumno'] = $_POST['codigo'];?> <br>
<h3 style="color:#F63"><span class="icon-tasks"></span>&nbsp;	Formulario de Baja	</h3><br /><br />
<font color="#000"><b>Alumno:&nbsp;</b><?php echo  $fila['nombre'];?><br /></font>
<font color="#000"><b>Codigo:&nbsp; </b><?php echo  $fila['codigoAlumno'];?>


                <h4>¡Para dar de baja llena el siguiente formulario!</h4></font>
<div class="formulario">
                <form action="formBaja.php" method="post" >
                    <label>Fecha:</label>
                    <input type="hidden" name="alumno" value="<?php echo $fila['nombre'] ?>">
                    <input type="hidden" name="codigo" value="<?php echo $fila['codigoAlumno'] ?>">
                        <input name="fecha" type="date" id="fecha" autofocus="" required><br /><br />
                    <label>Motivo:</label>
                        <input name="motivo" type="text" id="motivo" placeholder="Ingresa el Motivo" required><br /><br />
                    <label>Usuario:</label>
                        <input name="usuario" type="text" id="usuario" placeholder="¿Quien da de baja?" required><br /><br />
                    &nbsp;&nbsp;&nbsp;<input type="submit"  name="baja" value="Dar de Baja" class="boton" id="gc"><br /><br />
                </form>
</div>


 <?php $conexion = new mysqli('localhost','root','mysql','practicasmatute');
    if($conexion===false){
        die('ERROR : no se ha podido establecer la conexion con la base.' .mysqli_connect_error());
    }


    $codigoAlumno = $_POST['codigo'];


    require("../controller/conexion.php");
    $actualizarEgresadoQuery = "UPDATE alumnos SET egresado='0' WHERE codigoAlumno = '$codigoAlumno'";
    mysqli_query($conexion, $actualizarEgresadoQuery);


    if(isset($_POST['baja'])){
        $fecha = $_POST ['fecha'];
        $motivo = $_POST ['motivo'];
        $usuario = $_POST ['usuario'];
        $nombre = $_POST ['alumno'];
        $codigoAlumno = $_POST ['codigo'];

        $bajaAlumno = "INSERT INTO bajas(fecha,motivo,usuario,nombre,codigoAlumno)
        VALUES('$fecha','$motivo','$usuario','$nombre','$codigoAlumno')";



        $ubicacion = "Location: index.php?adm=" . md5(5);
        header($ubicacion);

        if($conexion->query($bajaAlumno)===true){
         echo'El alumno'.$conexion -> insert_id .'ha sido dado de baja';}else{echo "ERROR: No fue posible ejecutar $bajaAlumno".$conexion -> error;}}
    ?>
