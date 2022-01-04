<!DOCTYPE html>
<html lang="es">
<head>
  <style type="text/css">
    #icon-print{
      color: #000;
      transition: .2s all ease-in-out;
    }
    #icon-print:hover{
      color: red;
    }
    .mod{
      border: none;
      background-color: transparent;
    }
    .icon-edit{
      color: #000;
      transition: .2s all ease-in-out;
    }
    .icon-edit:hover{
      color: blue;
    }
    #icon-trash{
      position: relative;
      right: 100px;
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
    $query = "SELECT codigoAlumno, nombre, idEmpresa FROM alumnos WHERE nombre
    LIKE '%".$q."%' OR codigoAlumno LIKE '%".$q."%' OR idEmpresa LIKE '%".$q."%' AND idEmpresa != '' AND idEmpresa != null";
  }

  $resultado = $conexion->query($query);

  //sin existe el resultado//
      if ($resultado->num_rows > 0) {
    	$salida.="<table border=1 class=table>
    			<thead>
    				<tr>
    					<th>Codigo de alumno</th>
    					<th>Nombre</th>
    					<th>Código de la empresa</th>
    					<th>Nombre de la empresa</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
    				</tr>

    			</thead>


    	<tbody>";

      while($fila = $resultado->fetch_assoc()){
          $idEmpresa = $fila['idEmpresa'];
          $buscarNombreQuery = "SELECT nombre FROM empresa WHERE idEmpresa = '$idEmpresa'";
          $buscarNombre = mysqli_query($conexion, $buscarNombreQuery);
          $nombre = mysqli_fetch_assoc($buscarNombre);

          $salida.="<tr>
                  <td>".$fila['codigoAlumno']."</td>
                  <td>".$fila['nombre']."</td>
                  <td>".$fila['idEmpresa']."</td>
                  <td>".$nombre['nombre'] ."</td>";

                  $salida.= '
                  <td><form action="pdfAsignacion.php"  method="post">
                          <input type="hidden" name="codigoAlumno" value="' . $fila['codigoAlumno'] . '" />
                          <span id="icon-print" class="icon-print"><input type="submit" name="imprimirAsignacion" value="Imprimir" class="mod" /></span>
                      </form>
                  </td>
                  <td><form action="eliminarAsignacion.php"  method="post">
                          <input type="hidden" name="alumno" value="' . $fila['codigoAlumno'] . '" />
                          <span id="icon-trash" class="icon-trash"><input type="submit" name="eliminarAsignacion" value="Eliminar" class="elim" onclick="return confirm(' . "'¿Está seguro de borrar ésta asignación?'" . ');"/></span>
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
