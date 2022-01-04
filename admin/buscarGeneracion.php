<?php
  require("../controller/conexion.php");


  //datos de salida de la busqueda//
  $salida = "";
  $query = "SELECT * FROM alumnos ORDER BY codigoAlumno";

  if(isset($_POST['consulta'])){
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT codigoAlumno, promedio, nombre, genero, edad, carrera, grado, grupo, turno, generacion, egresado FROM alumnos WHERE codigoAlumno
    LIKE '%".$q."%' OR promedio LIKE '%".$q."%' OR nombre LIKE '%".$q."%' OR genero LIKE '%".$q."%' OR edad
    LIKE '%".$q."%' OR carrera LIKE '%".$q."%' OR grado LIKE '%".$q."%' OR grupo LIKE '%".$q."%' OR turno LIKE '%".$q."%'
    OR egresado LIKE '%".$q."%'";
  }
  //resultado de busqueda//
  $resultado = $conexion->query($query);

  //sin existe el resultado//
      if ($resultado->num_rows > 0) {
    	$salida.="<table border=1 class='table'>
    			<thead>
    				<tr>
    					<th>Codigo de alumno</th>
              <th>Promedio</th>
    					<th>Nombre</th>
              <th>Genero</th>
              <th>Edad</th>
              <th>Carrera</th>
    					<th>Grado</th>
              <th>Grupo</th>
              <th>Turno</th>
              <th>Generacion</th>
              <th>Egresado</th>

    				</tr>

    			</thead>


    	<tbody>";

 session_start();
  while($fila = $resultado->fetch_assoc()){
    if($fila['generacion'] == $_SESSION['generacion']){
  		$salida.="<tr>
    					<td>".$fila['codigoAlumno']."</td>
              <td>".$fila['promedio']."</td>
    					<td>".$fila['nombre']."</td>
              <td>".$fila['genero']."</td>
              <td>".$fila['edad']."</td>
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
<span class="icon-eye"><input type="submit" name="alumno" value="Ver Datos" style="background : inherit; border:none;" class="alumnoIn"/></span>
			</form>
            </td>
        </tr>';
      }
  }
$salida .= '</tbody></table>';
  }else{
      $salida.= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No se encontraron resultados.";
  }
  echo $salida;
  $conexion->close();
 ?>
