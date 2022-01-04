<?php


  require("../controller/conexion.php");
  $buscarEmpresasQuery = "SELECT idEmpresa, nombre FROM empresa";
  $buscarEmpresas = mysqli_query($conexion, $buscarEmpresasQuery);


  //datos de salida de la busqueda//
  $salida = "";
  $query = "SELECT * FROM empresa ORDER BY idEmpresa";

  if(isset($_POST['consulta'])){
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT idEmpresa, nombre FROM empresa WHERE nombre LIKE '%".$q."%' OR idEmpresa LIKE '%".$q."%'";

  }

  //resultado de busqueda//
  $resultado = $conexion->query($query);


  //sin existe el resultado//
      if ($resultado->num_rows > 0) {
    	$salida.="<table border=1 class='table'>
    			<thead>
    				<tr>
    					<th>Codigo de empresa</th>
    					<th>Nombre</th>
              <th>Cupos</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
			  <th>&nbsp;</th>
    				</tr>

    			</thead>


    	<tbody>";
      while($fila = $resultado->fetch_assoc()){
            $idEmpresa = $fila['idEmpresa'];
            $buscarCuposQuery = "SELECT * FROM cupos WHERE idEmpresa='$idEmpresa'";
            $buscarCupos = mysqli_query($conexion, $buscarCuposQuery);
            $cupos = mysqli_fetch_assoc($buscarCupos);

            $total = 0;

            $adminOriginal = $cupos['adminOriginal'];
            for($i = 0; $i < strlen($adminOriginal); ++$i){
                $total += ord($adminOriginal[$i]) - 48;
            }

            $gestionOriginal = $cupos['gestionOriginal'];
            for($i = 0; $i < strlen($gestionOriginal); ++$i){
                $total += ord($gestionOriginal[$i]) - 48;
            }

            $inforOriginal = $cupos['inforOriginal'];
            for($i = 0; $i < strlen($inforOriginal); ++$i){
                $total += ord($inforOriginal[$i]) - 48;
            }

            $telecOriginal = $cupos['telecOriginal'];
            for($i = 0; $i < strlen($telecOriginal); ++$i){
                $total += ord($telecOriginal[$i]) - 48;
            }

            $energOriginal = $cupos['energOriginal'];
            for($i = 0; $i < strlen($energOriginal); ++$i){
                $total += ord($energOriginal[$i]) - 48;
            }

            $electriOriginal = $cupos['electriOriginal'];
            for($i = 0; $i < strlen($electriOriginal); ++$i){
                $total += ord($electriOriginal[$i]) - 48;
            }

            $mecaOriginal = $cupos['mecaOriginal'];
            for($i = 0; $i < strlen($mecaOriginal); ++$i){
                $total += ord($mecaOriginal[$i]) - 48;
            }

            $bioOriginal = $cupos['bioOriginal'];
            for($i = 0; $i < strlen($bioOriginal); ++$i){
                $total += ord($bioOriginal[$i]) - 48;
            }

            $proceOriginal = $cupos['proceOriginal'];
            for($i = 0; $i < strlen($proceOriginal); ++$i){
                $total += ord($proceOriginal[$i]) - 48;
            }

  //muestra los datos con un ciclo//


  		$salida.='<tr>
    					<td>' .$fila["idEmpresa"] . '</td>
    					<td>' .$fila["nombre"] . '</td>
              <td>' . $total . '</td>
              <td><form action="index.php?adm=' . md5(14) . '" method="post">
                      <input type="hidden" name="idEmpresa" value="' . $fila['idEmpresa'] . '" />
                      <span class="icon-eye-1"><input type="submit" name="verEmpresa" value="Ver" class="btn-table"/></span>
                  </form></td>
              <td><form action="index.php?adm=' . md5(15) . '" method="post">
                      <input type="hidden" name="idEmpresa" value="' . $fila['idEmpresa'] . '" />
                      <span class="icon-edit"><input type="submit" name="editarEmpresa" value="Editar" class="btn-table" /></span>
                  </form></td>
              <td><form action="editarCupo.php" method="post">
                          <input type="hidden" name="idEmpresa" value="' . $fila['idEmpresa'] . '" />
                          <span class="icon-loop"><input type="submit" name="editarCupo" value="Actualizar cupos" class="btn-table" /></span>
              </form></td>
              <td><form action="editarEmpresa.php" method="post" onsubmit="return confirm(';

              $salida .= "'¿Está seguro de eliminar la empresa?');";
              $salida .= '">
                      <input type="hidden" name="idEmpresa" value="' . $fila['idEmpresa'] . '" />
                      <span class="icon-trash"><input type="submit" name="eliminarEmpresa" value="Eliminar" class="btn-table" /></span>
                  </form></td>
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
