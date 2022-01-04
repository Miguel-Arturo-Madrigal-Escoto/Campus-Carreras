<!DOCTYPE html>
<html lang="es">
<head>
  <style type="text/css">
  .icon-thumbs-down{
    color: #000;
    transition: .2s all ease-in-out;
  }
  .icon-thumbs-down:hover{
    color: #f00;
  }
  .icon-eye-2{
    color: #000;
    transition: .2s all ease-in-out;
  }
  .icon-eye-2:hover{
    color: blue;
  }
  </style>
</head>
<body>
<?php
  require("../controller/conexion.php");
  //datos de salida de la busqueda//
  $salida = "";
  $query = "SELECT * FROM alumnos ORDER BY codigoAlumno";

  if(isset($_POST['consulta'])){
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT codigoAlumno, nombre, carrera, grado, grupo, turno, generacion, egresado FROM alumnos WHERE nombre
    LIKE '%".$q."%' OR codigoAlumno LIKE '%".$q."%' OR carrera LIKE '%".$q."%' OR grado LIKE '%".$q."%' OR grupo
    LIKE '%".$q."%' OR turno LIKE '%".$q."%' OR generacion LIKE '%".$q."%' OR egresado LIKE '%".$q."%' ";
  }
  //resultado de busqueda//
  $resultado = $conexion->query($query);

  //sin existe el resultado//
      if ($resultado->num_rows > 0) {
    	$salida.="<table border=1 class='table'>
    			<thead>
    				<tr>
    					<th>Codigo de alumno</th>
    					<th>Nombre</th>
    					<th>Carrera</th>
    					<th>Grado</th>
              <th>Grupo</th>
              <th>Turno</th>
              <th>Generacion</th>
              <th>Egresado</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
    				</tr>

    			</thead>


    	<tbody>";
  //muestra los datos con un ciclo//
  while($fila = $resultado->fetch_assoc()){
  		$salida.="<tr>
    					<td>".$fila['codigoAlumno']."</td>
    					<td>".$fila['nombre']."</td>
    					<td>".$fila['carrera']."</td>
    					<td>".$fila['grado']."</td>
    					<td>".$fila['grupo']."</td>
						<td>".$fila['turno']."</td>
						<td>".$fila['generacion']."</td>
            <td>";

            if($fila['egresado'] == 0){
            $salida .= "<span style='color:#F00;' class='icon-thumbs-down'></span>
                          <p style='font-size:12px; color:#F00;'>Dado de baja</p>";
            }elseif($fila['egresado'] == 1){
            $salida .= "<span style='color:#0C0;' class=' icon-thumbs-up'></span>
                          <p style='font-size:12px; color:#0C0'>En Practicas...</p>";
            }elseif($fila['egresado'] == 2){
            $salida .= "<span style='color:#03C;' class=' icon-thumbs-up'></span>
                          <p style='font-size:12px; color:#03C;'>¡Acreditado!</p>";
            }else{
            $salida .= "<span style='color:#F0F;' class='icon-exclamation'></span>
                          <p style='font-size:12px; color:#F0F;'>Sin Asignación</p>";
            }
    				$salida .= '
            <td class="datos"><form action="index.php?adm=' . md5(4) . '" method="post">
            <input type="hidden" name="codigoAlumno" value="' . $fila['codigoAlumno'] . '"/>
<span class="icon-eye-2"><input type="submit" name="alumno" value="Ver Datos" style="background : inherit; border:none;" class="alumnoIn"/></span>
      </form>
            </td>
            <td><form action="index.php?adm=' . md5(6) . '" method="post">
                    <input type="hidden" name="alumno" value="' . $fila['codigoAlumno'] . '" />
                    <span class="icon-edit"><input type="submit" name="editarAlumno" value="Editar" class="edit" /></span>
                </form>
            </td>
            <td><form action="editarAlumno.php" method="post">
                    <input type="hidden" name="alumno" value="' . $fila['codigoAlumno'] . '" />
                    <span class="icon-thumbs-up"><input type="submit" name="acreditarAlumno" value="Acreditar" class="acre" /></span>
                </form>
            </td>
            <td><form action="index.php?adm=' . md5(16) . '" method="post">
                    <input type="hidden" name="codigo" value="' . $fila['codigoAlumno'] . '" />
                    <input type="hidden" name="alumno" value="' . $fila['nombre'] . '" />
                    <span class="icon-thumbs-down" "><input type="submit" name="bajaAlumno" value="Baja" class="baja"/></span>
                </form>
            </td>
            <td><form action="editarAlumno.php"  method="post" onsubmit="return confirm(' . "'¿Está seguro de borrar al alumno?'" . ');">
                    <input type="hidden" name="alumno" value="' . $fila['codigoAlumno'] . '" />
                    <span class="icon-trash"><input type="submit" name="eliminarAlumno" value="Eliminar" class="elim" /></span>
                </form>
            </td>
        </tr>';
  }
$salida .= '</tbody></table>';
  }else{
      $salida.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No se encontraron resultados.";
  }

  echo $salida;
  $conexion->close();
 ?>
</body>
</html>
