<?php require('../controller/conexion.php');


	if(isset($_POST['agregarEmpresa'])){
		while (true) {
			$idEmpresa = substr(uniqid(rand(), true), 8, 8);
			$buscarEmpresaQuery = "SELECT count(idEmpresa) AS total FROM empresa WHERE idEmpresa='$idEmpresa'";
			$buscarEmpresa = mysqli_query($conexion, $buscarEmpresaQuery);
			$total = mysqli_fetch_array($buscarEmpresa);
			$total = $total['total'];

			if($total == 0){ break; }
		}
		$nombre = $_POST ['nombre'];
		$calle = $_POST ['calle'];
		$numExt = $_POST ['numExt'];
		$colonia = $_POST ['colonia'];
		$cp = $_POST ['cp'];
		$municipio = $_POST ['municipio'];
		$estado = $_POST ['estado'];
		$encargado = $_POST ['encargado'];
		$cargoDir = $_POST ['cargoDir'];
		$departamento = $_POST ['departamento'];
		$actividades = $_POST ['actividades'];
		$telefono = $_POST ['telefono'];
		$correo = $_POST ['correo'];
		$sitioWeb = $_POST ['sitioWeb'];

		//mayuscula
		$nombre = mb_strtoupper($nombre);
    $encargado = mb_strtoupper($encargado);
		$cargoDir = mb_strtoupper($cargoDir);
    $departamento = mb_strtoupper($departamento);
    $actividades = mb_strtoupper($actividades);

		$agregarEmpresaQuery = "INSERT INTO empresa(idEmpresa,nombre,calle,numExt,colonia,cp,municipio,estado,encargado,cargoDir,departamento,actividades,telefono,correo,sitioWeb)VALUES('$idEmpresa','$nombre','$calle','$numExt','$colonia','$cp','$municipio','$estado','$encargado','$cargoDir','$departamento','$actividades','$telefono','$correo','$sitioWeb')";
		echo $agregarEmpresaQuery;
		if($conexion->query($agregarEmpresaQuery)===true){
		 echo'Nueva empresa con id'.$conexion -> insert_id .'ha sido añadida';}else{echo "ERROR: No fue posible ejecutar $agregarEmpresaQuery".$conexion -> error;}

		$agregarCuposQuery = "INSERT INTO cupos (idEmpresa, adminOriginal, adminCont, gestionOriginal, gestionCont, inforOriginal, inforCont, telecOriginal, telecCont, energOriginal, energCont, electriOriginal, electriCont, mecaOriginal, mecaCont, bioOriginal, bioCont, proceOriginal, proceCont) VALUES ('$idEmpresa', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000', '000000000')";
		echo $agregarCuposQuery;
    $agregarCupos = mysqli_query($conexion, $agregarCuposQuery);
		$ubicacion = "Location: index.php?adm=" . md5(1);
		header($ubicacion);


	}
		 ?>
