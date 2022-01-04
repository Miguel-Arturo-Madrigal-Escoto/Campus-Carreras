<?php
if(isset($_POST['actualizarEmpresa'])){

  $idEmpresa = $_POST['idEmpresa'];
  $contrasena = $_POST['contrasena'];
  $nombre = $_POST['nombre'];
  $calle = $_POST['calle'];
  $numExt = $_POST['numExt'];
  $colonia = $_POST['colonia'];
  $cp = $_POST['cp'];
  $municipio = $_POST['municipio'];
  $estado = $_POST['estado'];
  $encargado = $_POST['encargado'];
  $cargoDir = $_POST['cargoDir'];
  $departamento = $_POST['departamento'];
  $actividades = $_POST['actividades'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $sitioWeb = $_POST['sitioWeb'];


    //mayusculas
    $nombre = mb_strtoupper($nombre);
    $encargado = mb_strtoupper($encargado);
    $cargoDir = mb_strtoupper($cargoDir);
    $departamento = mb_strtoupper($departamento);
    $actividades = mb_strtoupper($actividades);

    require("../controller/conexion.php");
    $actualizarEmpresaQuery = "UPDATE empresa SET idEmpresa='$idEmpresa', contrasena='$contrasena', nombre='$nombre', calle='$calle',
    numExt='$numExt', colonia='$colonia', cp='$cp', municipio='$municipio', estado='$estado',
    encargado='$encargado', cargoDir='$cargoDir', departamento='$departamento', actividades='$actividades', telefono='$telefono', correo='$correo', sitioWeb='$sitioWeb' WHERE idEmpresa='$idEmpresa'";

    $actualizarEmpresa = mysqli_query($conexion, $actualizarEmpresaQuery);

    // Valores para concatenar en los cupos
    $cupoAdmin = "";
    $cupoAdmin .= chr(strval($_POST['BATDMM']) + 48) . chr(strval($_POST['BATDMV']) + 48) . chr(strval($_POST['BATDMS']) + 48);
    $cupoAdmin .= chr(strval($_POST['BATDFM']) + 48) . chr(strval($_POST['BATDFV']) + 48) . chr(strval($_POST['BATDFS']) + 48);
    $cupoAdmin .= chr(strval($_POST['BATDSM']) + 48) . chr(strval($_POST['BATDSV']) + 48) . chr(strval($_POST['BATDSS']) + 48);

    echo $cupoAdmin;

    $cupoGestion = "";
    $cupoGestion .= chr(strval($_POST['BTGOMM']) + 48) . chr(strval($_POST['BTGOMV']) + 48) . chr(strval($_POST['BTGOMS']) + 48);
    $cupoGestion .= chr(strval($_POST['BTGOFM']) + 48) . chr(strval($_POST['BTGOFV']) + 48) . chr(strval($_POST['BTGOFS']) + 48);
    $cupoGestion .= chr(strval($_POST['BTGOSM']) + 48) . chr(strval($_POST['BTGOSV']) + 48) . chr(strval($_POST['BTGOSS']) + 48);

    $cupoTelec = "";
    $cupoTelec .= chr(strval($_POST['TPTEMM']) + 48) . chr(strval($_POST['TPTEMV']) + 48) . chr(strval($_POST['TPTEMS']) + 48);
    $cupoTelec .= chr(strval($_POST['TPTEFM']) + 48) . chr(strval($_POST['TPTEFV']) + 48) . chr(strval($_POST['TPTEFS']) + 48);
    $cupoTelec .= chr(strval($_POST['TPTESM']) + 48) . chr(strval($_POST['TPTESV']) + 48) . chr(strval($_POST['TPTESS']) + 48);

    $cupoInfor = "";
    $cupoInfor .= chr(strval($_POST['TPINMM']) + 48) . chr(strval($_POST['TPINMV']) + 48) . chr(strval($_POST['TPINMS']) + 48);
    $cupoInfor .= chr(strval($_POST['TPINFM']) + 48) . chr(strval($_POST['TPINFV']) + 48) . chr(strval($_POST['TPINFS']) + 48);
    $cupoInfor .= chr(strval($_POST['TPINSM']) + 48) . chr(strval($_POST['TPINSV']) + 48) . chr(strval($_POST['TPINSS']) + 48);

    $cupoEnerg = "";
    $cupoEnerg .= chr(strval($_POST['TPEAMM']) + 48) . chr(strval($_POST['TPEAMV']) + 48) . chr(strval($_POST['TPEAMS']) + 48);
    $cupoEnerg .= chr(strval($_POST['TPEAFM']) + 48) . chr(strval($_POST['TPEAFV']) + 48) . chr(strval($_POST['TPEAFS']) + 48);
    $cupoEnerg .= chr(strval($_POST['TPEASM']) + 48) . chr(strval($_POST['TPEASV']) + 48) . chr(strval($_POST['TPEASS']) + 48);

    $cupoMeca = "";
    $cupoMeca .= chr(strval($_POST['TPMIMM']) + 48) . chr(strval($_POST['TPMIMV']) + 48) . chr(strval($_POST['TPMIMS']) + 48);
    $cupoMeca .= chr(strval($_POST['TPMIFM']) + 48) . chr(strval($_POST['TPMIFV']) + 48) . chr(strval($_POST['TPMIFS']) + 48);
    $cupoMeca .= chr(strval($_POST['TPMISM']) + 48) . chr(strval($_POST['TPMISV']) + 48) . chr(strval($_POST['TPMISS']) + 48);

    $cupoElectri = "";
    $cupoElectri .= chr(strval($_POST['TPEIMM']) + 48) . chr(strval($_POST['TPEIMV']) + 48) . chr(strval($_POST['TPEIMS']) + 48);
    $cupoElectri .= chr(strval($_POST['TPEIFM']) + 48) . chr(strval($_POST['TPEIFV']) + 48) . chr(strval($_POST['TPEIFS']) + 48);
    $cupoElectri .= chr(strval($_POST['TPEISM']) + 48) . chr(strval($_POST['TPEISV']) + 48) . chr(strval($_POST['TPEISS']) + 48);

    $cupoBio = "";
    $cupoBio .= chr(strval($_POST['TPBIMM']) + 48) . chr(strval($_POST['TPBIMV']) + 48) . chr(strval($_POST['TPBIMS']) + 48);
    $cupoBio .= chr(strval($_POST['TPBIFM']) + 48) . chr(strval($_POST['TPBIFV']) + 48) . chr(strval($_POST['TPBIFS']) + 48);
    $cupoBio .= chr(strval($_POST['TPBISM']) + 48) . chr(strval($_POST['TPBISV']) + 48) . chr(strval($_POST['TPBISS']) + 48);

    $cupoProce = "";
    $cupoProce .= chr(strval($_POST['TPMCMM']) + 48) . chr(strval($_POST['TPMCMV']) + 48) . chr(strval($_POST['TPMCMS']) + 48);
    $cupoProce .= chr(strval($_POST['TPMCFM']) + 48) . chr(strval($_POST['TPMCFV']) + 48) . chr(strval($_POST['TPMCFS']) + 48);
    $cupoProce .= chr(strval($_POST['TPMCSM']) + 48) . chr(strval($_POST['TPMCSV']) + 48) . chr(strval($_POST['TPMCSS']) + 48);

    $actualizarCuposQuery = "UPDATE cupos SET adminOriginal='$cupoAdmin', gestionOriginal='$cupoGestion', inforOriginal='$cupoInfor', telecOriginal='$cupoTelec', energOriginal='$cupoEnerg',electriOriginal='$cupoElectri',mecaOriginal='$cupoMeca', bioOriginal='$cupoBio', proceOriginal='$cupoProce' WHERE idEmpresa='$idEmpresa'";
    $actualizarCupos = mysqli_query($conexion, $actualizarCuposQuery);
    $ubicacion = "Location: index.php?adm=" . md5(1);
    header($ubicacion);
}
?>
