<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" type="text/css" href="../css/bajas.css"/>
</head>
<body>
<?php
  require("../controller/conexion.php");


  //datos de salida de la busqueda//
  $salida = "";
  $query = "SELECT * FROM bajas ORDER BY codigoAlumno";

  if(isset($_POST['consulta'])){
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT codigoAlumno, usuario, nombre, motivo, fecha FROM bajas WHERE codigoAlumno
    LIKE '%".$q."%' OR usuario LIKE '%".$q."%' OR nombre LIKE '%".$q."%' OR motivo LIKE '%".$q."%' OR fecha
    LIKE '%".$q."%'";
  }
  $resultado = $conexion->query($query);

  //sin existe el resultado//
      if ($resultado->num_rows > 0) {
    	$salida.="<table border=1 class='table'>
    			<thead>
    				<tr>
    					<td class='td'>Fecha</td>
              <td class='td'>Motivo</td>
    					<td class='td'>Usuario</td>
              <td class='td'>Codigo</td>
              <td class='td'>Nombre</td>
	          </tr>

    			</thead>


    	<tbody>";
      while($fila = $resultado->fetch_assoc()){
      		$salida.="<tr>
        					<td>".$fila['fecha']."</td>
        					<td>".$fila['motivo']."</td>
        					<td>".$fila['usuario']."</td>
        					<td>".$fila['codigoAlumno']."</td>
        					<td>".$fila['nombre']."</td>
                  </tr>";
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
