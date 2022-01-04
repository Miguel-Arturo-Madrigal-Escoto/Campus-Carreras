<?php
error_reporting(0);
spl_autoload_register(function ($nombre_clase) {
include '../pm/fpdf/' . $nombre_clase . '.php';
});

//Conexión a la DB
session_start();
require_once("db/conexion.php");
$conexion = conexion();
$user = $_SESSION['usuario'];
$searchAdm="SELECT * FROM admon WHERE codigoAdm = '" . $user . "'";
$row=$conexion->query($searchAdm);
if ($row->num_rows>0) {
	//Búsqueda de los asignados
	if (isset($_POST['imprGP'])) {
		$imprGP = $_POST['imprGP'];
		if ($imprGP=="G") {
			$turno=$_POST['turno'];
			$carrera=$_POST['carrera'];
			$grado=$_POST['grado'];
			$grupo=$_POST['grupo'];
			$asignedSearch="SELECT * FROM alumnos WHERE asignado = 1 AND turnoAl = '$turno' AND carreraAl = '$carrera' AND gradoAl = '$grado' AND grupoAl = '$grupo' ORDER BY apPatAl ASC, apMatAl ASC, nombreAl ASC";
		}
		else{
			if ($_POST['promedios']==90) {
				$asignedSearch = "SELECT * FROM alumnos WHERE asignado = 1 AND promAl >=90 ORDER BY apPatAl ASC, apMatAl ASC, nombreAl ASC";
			}
			elseif ($_POST['promedios']==80) {
				$asignedSearch = "SELECT * FROM alumnos WHERE asignado = 1 AND promAl >=80 AND promAl < 90 ORDER BY apPatAl ASC, apMatAl ASC, nombreAl ASC";
			}
			elseif ($_POST['promedios']==70) {
				$asignedSearch = "SELECT * FROM alumnos WHERE asignado = 1 AND promAl >=70 AND promAl < 80 ORDER BY apPatAl ASC, apMatAl ASC, nombreAl ASC";
			}
			elseif ($_POST['promedios']==60) {
				$asignedSearch = "SELECT * FROM alumnos WHERE asignado = 1 AND promAl >=60 AND promAl < 70 ORDER BY apPatAl ASC, apMatAl ASC, nombreAl ASC";
			}
		}
	}
	else{
		$asignedSearch =  "SELECT * FROM alumnos WHERE asignado = 1 ORDER BY turnoAl ASC, carreraAl ASC, gradoAl DESC, grupoAl ASC, apPatAl ASC, apMatAl ASC, nombreAl ASC";
	}
	$asignedConn = $conexion->query($asignedSearch) or trigger_error($conexion->error."[$asignedSearch]");
	if($asignedConn->num_rows>0)
	{
	class PDF extends WriteTag
	{
	// Page header
		function Header()
		{
			// Logo
			$this->Image('../pm/img/udgPdfLogo.png',20,6,100);
			// Line break
			$this->Ln(30);
		}
		// Page footer
		function Footer()
		{
			for ($i=1; $i < 13; $i++)
			{
				if (date("m")==$i)
					{
						$mes=$i;
					}
			}
			$meses = array(NULL, "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			//Fecha de emisión de la carta
			require_once("db/conexion.php");
			$conexion = conexion();
			$emisionSearch = "SELECT * FROM fechas WHERE codigoFe = 11";
			$emisionConn = $conexion->query($emisionSearch);
			$emision = $emisionConn->fetch_array();

			// Nombre del coordinador
			$coord = utf8_decode("Mtra. María de la Luz Quezada Ramírez");
			// Palabras con tildes o ñ
			$peri = utf8_decode("Periférico");
			$mexico = utf8_decode("México");
			// Position at 1.5 cm from bottom
			$this->SetY(-80);
			// Arial 10
			$this->SetFont('Arial','',10);
			// "Atentamente"
			$this->Cell(0,10,'A  t  e  n  t  a  m  e  n  t  e',0,0,'C');
			$this->Ln(4);
			// Arial bold 10
			$this->SetFont('Arial','B',10);
			// "Piensa y Trabaja"
			$this->Cell(0,10,'"Piensa y Trabaja"',0,0,'C');
			$this->Ln(4);
			// Arial 10
			$this->SetFont('Arial','',10);
			// Lugar y fecha de expedición
			//$this->Cell(0,10,'Los Belenes, Zapopan, Jalisco a ' . $emision['nombreFe'] . ' del ' . date("Y"),0,0,'C');
			$this->Cell(0,10,utf8_decode('Los Belenes, Zapopan, Jalisco a los 20 días del mes de Diciembre del año 2018.'),0,0,'C');
			$this->Ln(25);
		    $this->SetFont('Arial','B',10);
			// Coordinador de carrera (nombre)
			$this->Cell(0,10,$coord,0,0,'C');
			$this->Ln(4);
		    $this->SetFont('Arial','',10);
			// "Coordinador de carrera"
			$this->Cell(0,10,'Coordinadora de Carrera',0,0,'C');
			$this->Ln(15);
		    // Arial 8
		    $this->SetFont('Arial','',8);
			// Domicilio
		    $this->Cell(0,10,$peri . ' No. 640, Colonia: Los Belenes, C.P. 45101',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,10,'Zapopan, Jalisco, ' . $mexico . '. Tel: (33) 36 56 57 53 Ext: 118',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,10,'delaluz.quezada@academicos.udg.mx',0,0,'C');
		}
	}
	//Función de conversión a UTF-8
	function ConvertToUTF8($text)
	{
		$encoding = mb_detect_encoding($text, mb_detect_order(), false);
		if($encoding == "UTF-8")
			{
				$text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
	    	}
	    $out = iconv(mb_detect_encoding($text, mb_detect_order(), false), "UTF-8//IGNORE", $text);
		return $out;
	}
	//Instanciation of inherited class
	$pdf = new PDF('P','mm','Letter');
	$pdf->SetMargins(20,10,20);

	while ($al = mysqli_fetch_array($asignedConn)) {
		$codigoAl = $al['codigoAl'];
		//Búsqueda de la asignación
		$asignSearch =  "SELECT * FROM asignaciones WHERE codigoAl = '$codigoAl'";
		$asignConn = $conexion->query($asignSearch);
		$as = $asignConn->fetch_array();
		$idEmp = $as['idEmp'];
		//Búsqueda de las empresas
		$empSearch = "SELECT * FROM empresas WHERE idEmp = '$idEmp'";
		$empConn = $conexion->query($empSearch);
		$emp = $empConn->fetch_array();
		//Búsqueda de la carrera
		$carrera = $al['carreraAl'];
		$carrSearch = "SELECT * FROM carreras WHERE clavCarrera = '$carrera'";
		$carrConn = $conexion->query($carrSearch);
		$carr = $carrConn->fetch_array();
		//Búsqueda de las fechas
			//Inicio de prácticas
			$startSearch = "SELECT * FROM fechas WHERE codigoFe = 2";
			$startConn = $conexion->query($startSearch);
			$start = $startConn->fetch_array();
			//Fin de prácticas
			$endSearch = "SELECT * FROM fechas WHERE codigoFe = 1";
			$endConn = $conexion->query($endSearch);
			$end = $endConn->fetch_array();
			//Total de horas
			$totalHoursSearch = "SELECT * FROM fechas WHERE codigoFe = 10";
			$totalHoursConn = $conexion->query($totalHoursSearch);
			$totalHours = $totalHoursConn->fetch_array();
		//Variables de la empresa
		if ($emp['directivoEmp'] != NULL) {
			ConvertToUTF8($directivoEmp = $emp['directivoEmp']);
			$dirigidoA = $directivoEmp;
		}
		else{
			ConvertToUTF8($responsableEmp = $emp['responsableEmp']);
			$dirigidoA = $responsableEmp;
		}
		ConvertToUTF8($cargoDirEmp = $emp['cargoDirEmp']);
		ConvertToUTF8($nombreEmp = $emp['nombreEmp']);
		//Variables del alumno
		ConvertToUTF8($nombre = $al['apPatAl'] . " " . $al['apMatAl'] . " " . $al['nombreAl']);
		$edadAl=$al['edadAl'];
		if ($generoAl=$al['generoAl']=="M")
		{
			$generoAlEsp="Masculino";
		}
		else
		{
			$generoAlEsp="Femenino";
		}
		if ($al['gradoAl']==6)
		{
			$grado = "SEXTO";
		}
		elseif ($al['gradoAl']==8)
		{
			$grado = "OCTAVO";
		}
		ConvertToUTF8($carreraAl = $carr['nomCarrera']);
		if ($al['generoAl']=="M")
		{
			$gender = array('al', 'alumno', 'el');
		}
		else
		{
			$gender = array('a la', 'alumna', 'la');
		}
		ConvertToUTF8($NacionAl = $al['NacionAl']);
		$NssAl = $al['NssAl'];
		$CurpAl = $al['CurpAl'];
		ConvertToUTF8($EstadoAl = $al['EstadoAl']);
		ConvertToUTF8($CiudadAl = $al['CiudadAl']);
		$CpAl = $al['CpAl'];
		ConvertToUTF8($ColAl = $al['ColAl']);
		ConvertToUTF8($CalleAl = $al['CalleAl']);
		$NumExtAl = $al['NumExtAl'];
		$NumIntAl = $al['NumIntAl'];
		ConvertToUTF8($correoAl = $al['correoAl']);
		$celularAl = $al['celularAl'];
		ConvertToUTF8($emergParentAl = $al['emergParentAl']);
		ConvertToUTF8($emergAl = $al['emergAl']);
		$emergNumAl = $al['emergNumAl'];
		//Palabras con tildes o ñ
		$codigo = utf8_decode("código");
		$realizara = utf8_decode("realizará");
		$practicas = utf8_decode("prácticas");
		$dia = utf8_decode("día");
		$anno = utf8_decode("año");
		$periodo = utf8_decode("período");
		$ordenes = utf8_decode("órdenes");
		$aclaracion = utf8_decode("aclaración");
		$informacion = utf8_decode("información");
		//Nueva Página
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0,4,$dirigidoA,0,1);
		$pdf->Cell(0,4,$cargoDirEmp,0,1);
		$pdf->Cell(0,4,$nombreEmp,0,1);
		$pdf->Cell(0,4,'PRESENTE:',0,1);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',10);
		//Stylesheet
		$pdf->SetStyleWT("p","Arial","N",10,"0,0,0",15);
		$pdf->SetStyleWT("b","","B",10,"");
		$pdf->SetStyleWT("st","Arial","N",8,"0,0,0");
		$pdf->SetStyleWT("sp","Arial","N",6,"0,0,0");
		$pdf->SetStyleWT("spt","Arial","N",10,"0,0,0");
		//Texto
		$txt="<p>Por este conducto me permito presentar a Usted " . $gender[0] . " <b>C. " . $nombre . "</b> con " . $codigo . " <b>" . $codigoAl . "</b>, " . $gender[1] . " de <b>" . $grado . "</b> semestre de la carrera <b>" . $carreraAl . "</b>, " . $gender[2] . " cual " . $realizara . " las " . $practicas . " profesionales en su empresa a partir del " . $dia . " " . $start['diaFe'] . " de " . $start['mesFe'] . ", concluyendo el " . $end['diaFe'] . " de " . $end['mesFe'] . " del " . $anno . " en curso, asistiendo de lunes a viernes 4 horas diarias cubriendo un total de " . $totalHours['annoFe'] . " horas durante el " . $periodo . ", con un horario que la empresa en acuerdo con " . $gender[2] . " " . $gender[1] . " asignen.</p>";
		$pdf->FWriteTag(0,4,$txt);
		$pdf->Ln(6);
		$txt="<p>Se anexa " . $informacion . " adicional sobre " . $gender[2] . " " . $gender[1] . ", con la finalidad de crear un expediente:</p>";
		$pdf->FWriteTag(0,4,$txt);
		$pdf->Ln(4);
		$txt="<st>Datos generales</st>";
		$pdf->SetFillColor(166,166,166);
		$pdf->FWriteTag(0,4,$txt,1,"C",1);
		$pdf->Ln(0);
		$txt="<sp></sp>";
		$pdf->SetFillColor(204,204,204);
		$pdf->FWriteTag(0,3,$txt,1,"C",1);
		$pdf->Ln(-3);
		$pdf->SetFont('Arial','',6);
		$pdf->Cell(87.9,3,"CURP","",0,"C");
		$pdf->Cell(88,3,"NSS","",0,"C");
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(87.9,5,$CurpAl,"LTB",0,"C");
		$pdf->Cell(88,5,$NssAl,"TBR",0,"C");
		$pdf->Ln(5);
		$txt="<sp></sp>";
		$pdf->SetFillColor(204,204,204);
		$pdf->FWriteTag(0,3,$txt,1,"C",1);
		$pdf->Ln(-3);
		$pdf->SetFont('Arial','',6);
		$pdf->Cell(88.3,3,"Nacionalidad","",0,"C");
		$pdf->Cell(43.8,3,utf8_decode("Género"),"",0,"C");
		$pdf->Cell(43.8,3,"Edad","",0,"C");
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(88.3,5,$NacionAl,"LTB",0,"C");
		$pdf->Cell(43.8,5,$generoAlEsp,"TB",0,"C");
		$pdf->Cell(43.8,5,$edadAl,"RTB",0,"C");
		$pdf->Ln(5);
		$pdf->SetFillColor(204,204,204);
		$txt="<sp>Celular                                                                                                                                      Email</sp>";
		$pdf->FWriteTag(0,3,$txt,1,"C",1);
		$pdf->Ln(0);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(87.9,5,$celularAl,"LTB",0,"C");
		$pdf->Cell(88,5,$correoAl,"RTB",0,"C");
		$pdf->Ln(5);
		$txt="<st>Datos de residencia</st>";
		$pdf->SetFillColor(166,166,166);
		$pdf->FWriteTag(0,4,$txt,1,"C",1);
		$pdf->Ln(0);
		$pdf->SetFillColor(204,204,204);
		$txt="<sp>Estado                                                                                                                                      Municipio</sp>";
		$pdf->FWriteTag(0,3,$txt,1,"C",1);
		$pdf->Ln(0);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(87.9,5,$EstadoAl,"LTB",0,"C");
		$pdf->Cell(88,5,$CiudadAl,"RTB",0,"C");
		$pdf->Ln(5);
		$pdf->SetFillColor(204,204,204);
		$txt="<sp>Colonia                                                                                                                                            C.P.</sp>";
		$pdf->FWriteTag(0,3,$txt,1,"C",1);
		$pdf->Ln(0);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(87.9,5,$ColAl,"LTB",0,"C");
		$pdf->Cell(88,5,$CpAl,"RTB",0,"C");
		$pdf->Ln(5);
		$txt="<sp></sp>";
		$pdf->SetFillColor(204,204,204);
		$pdf->FWriteTag(0,3,$txt,1,"C",1);
		$pdf->Ln(-3);
		$pdf->SetFont('Arial','',6);
		$pdf->Cell(88.3,3,"Domicilio","",0,"C");
		$pdf->Cell(43.8,3,"No. Ext.","",0,"C");
		$pdf->Cell(43.8,3,"No. Int.","",0,"C");
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(88.3,5,$CalleAl,"LTB",0,"C");
		$pdf->Cell(43.8,5,$NumExtAl,"TB",0,"C");
		$pdf->Cell(43.8,5,$NumIntAl,"RTB",0,"C");
		$pdf->Ln(5);
		$txt="<st>Contacto de emergencia</st>";
		$pdf->SetFillColor(166,166,166);
		$pdf->FWriteTag(0,4,$txt,1,"C",1);
		$pdf->Ln(0);
		$pdf->SetFillColor(204,204,204);
		$txt="<sp></sp>";
		$pdf->SetFillColor(204,204,204);
		$pdf->FWriteTag(0,3,$txt,1,"C",1);
		$pdf->Ln(-3);
		$pdf->SetFont('Arial','',6);
		$pdf->Cell(88.3,3,"Nombre","",0,"C");
		$pdf->Cell(43.8,3,utf8_decode("Teléfono")." o celular","",0,"C");
		$pdf->Cell(43.8,3,"Parentezco","",0,"C");
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(88.3,5,$emergAl,"LTB",0,"C");
		$pdf->Cell(43.8,5,$emergNumAl,"TB",0,"C");
		$pdf->Cell(43.8,5,$emergParentAl,"RTB",0,"C");
		$pdf->Ln(12);
		$txt="<p>Sin otro particular por el momento, me despido de usted, quedando a sus " . $ordenes . " para cualquier duda o " . $aclaracion . " al respecto.</p>";
		$pdf->FWriteTag(0,4,$txt);
	}
	$pdf->Output();
	}
	else
	{
		echo "Lo sentimos, esta página no está disponible debido a que no existen asignaciones a imprimir.";
	}
}
else{
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/pm/', true, 303);
	exit;
}
