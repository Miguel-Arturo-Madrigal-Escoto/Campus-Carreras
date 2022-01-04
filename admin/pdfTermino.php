<?php
error_reporting(0);
spl_autoload_register(function ($nombre_clase) {
include '../fpdf/' . $nombre_clase . '.php';
});

$codigoAlumno = $_POST['codigoAlumno'];
require("../controller/conexion.php");
$generacion=$_POST['gen'];
$datosAlumnoQuery = "SELECT * FROM alumnos WHERE generacion='$generacion' AND egresado='2'";
$datosAlumno = mysqli_query($conexion, $datosAlumnoQuery);

class PDF extends WriteTag
{
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
// Page header -(OBJECTOS QUE IRAN EN LA CABECERA DE LA PÁGINA)
function Header()
{
    // Este es la imagen del logotipo de coordiancion de carrera de la
    //Escuela Politecnica Ing. "Jorge Matute Remus"
    $this->Image('../img/udgPdfLogoT.png',20,6,100);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // mover a la derecha
    $this->Cell(80);
    // Title (titulo opcional del pdf)
    //se dejara en comentario, ya que no se ocupa, (no habra un titulo, sólo la imagen del poli)
    //$this->Cell(30,10,'Title',1,0,'C');//
    //Espaciado del salto de linea ---> Line break
    $this->Ln(30);
}

// Page footer (OBJETOS QUE IRAN EN EL PIE DE PAGINA)
function Footer()
{

  //for ($i=1; $i < 13; $i++)
  //{
  //	if (date("m")==$i)
  //		{
  //			$mes=$i;
  //		}
  //}
  //$meses = array(NULL, "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");



  // Nombre del coordinador
  $coord = utf8_decode("Mtra. María de la luz Quezada Ramírez");
  // Palabras con tildes o ñ
  $Coordinacion = utf8_decode("Coordinación");
  $peri = utf8_decode("Periférico");
  $mexico = utf8_decode("México");
  $Villasenor = utf8_decode("Villaseñor");
  // Position at 1.5 cm from bottom
  $this->SetY(-120);
  // "Atentamente"
  $this->Cell(0,11,'A  t  e  n  t  a  m  e  n  t  e',0,0,'C');
  $this->Ln(4);
  // Arial bold 10
  $this->SetFont('Arial','B',11);
  // "Piensa y Trabaja"
  $this->Cell(0,11,'"Piensa y Trabaja"',0,0,'C');
  $this->Ln(20);
    $this->SetFont('Arial','B',11);
  // Coordinador de carrera (nombre)
  $this->Cell(0,11,$coord,0,0,'C');
  $this->Ln(4);
    $this->SetFont('Arial','',11);
  // "Coordinador de carrera"
  $this->Cell(0,11,$Coordinacion . ' de Carrera',0,0,'C');
  $this->Ln(20);
  // "Director"
  $this->SetFont('Arial','',11);
  $this->Cell(0,11,'Vo. Bo.',0,0);
  $this->Ln(8);
  $this->SetFont('Arial','',11);
  $this->Cell(0,11,'Mtro. Luis Alberto Robles ' . $Villasenor,0,0);
  $this->Ln(4);
  $this->SetFont('Arial','',11);
  $this->Cell(0,11,'Director',0,0);
  $this->Ln(20);
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
$pdf = new PDF('P','mm','Letter');
while($datos = mysqli_fetch_assoc($datosAlumno)){
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(20,10,20);
$pdf->SetFont('Arial','B',10);
//Stylesheet
$pdf->SetStyleWT("p","Arial","N",11,"0,0,0",0);
$pdf->SetStyleWT("b","","B",11,"");
//Palabras con tildes o ñ
$politecnica = utf8_decode("Politécnica");
$codigo = utf8_decode("código");
$practicas = utf8_decode("PRÁCTICAS");
$coord = utf8_decode("MTRA. MARÍA DE LA LUZ QUEZADA RAMÍREZ");

$blank = ''; //deja un espacio al inicio)
$dirigidoA = 'LIC. SANDRA BERENICE SANCHEZ HERNANDEZ ';

if($datos['genero'] == 'M'){ $gender[0] = "a el"; }
  if($datos['genero'] == 'F'){ $gender[0] = "a la"; }

  if($datos['genero'] == 'M'){ $gender[1] = "alumno"; }
  if($datos['genero'] == 'F'){ $gender[1] = "alumna"; }

  if($datos['genero'] == 'M'){ $gender[2] = "el"; }
  if($datos['genero'] == 'F'){ $gender[2] = "la"; }

  $hrs = "";
  if($datos['grado'] == '6'){ $hrs="240"; }
  if($datos['grado'] == '8'){ $hrs="320"; }

  $carrera = "";
  if($datos['carrera'] == 'BTAD'){ $carrera = "Bachillerato Tecnologico en Administracion"; }
  if($datos['carrera'] == 'BTGO'){ $carrera = "Bachillerato Tecnologico en Gestion Adualan y Operaciones"; }
  if($datos['carrera'] == 'TPIN'){ $carrera = "Tecnologo Profesional en Informatica"; }
  if($datos['carrera'] == 'BTPT'){ $carrera = "Tecnologo Profesional en Telecomunicaciones"; }
  if($datos['carrera'] == 'TPEA'){ $carrera = "Tecnologo Profesional en Energias Alternas"; }
  if($datos['carrera'] == 'TPEI'){ $carrera = "Tecnologo Profesional en Electricidad Industrial"; }
  if($datos['carrera'] == 'TPMI'){ $carrera = "Tecnologo Profesional en Mecanica Industrial"; }
  if($datos['carrera'] == 'TPMC'){ $carrera = "Tecnologo Profesional en Procesos de Manufactura Competitiva"; }
  if($datos['carrera'] == 'TPBI'){ $carrera = "Tecnologo Profesional en Biotecnologia"; }

  $buscarFechasQuery = "SELECT * FROM pdf WHERE idPdf=1";
  $buscarFechas = mysqli_query($conexion, $buscarFechasQuery);
  $fechas = mysqli_fetch_assoc($buscarFechas);

$pdf->Cell(0,4,$blank,0,1);
$txt="<p>La C. <b>" . $coord . "</b></p>";
$pdf->FWriteTag(0,6,$txt);
$pdf->Ln(4);
$txt="<p>Coordinadora de Carrera de la Escuela " . $politecnica . " Ing. Jorge Matute Remus de la Universidad de Guadalajara</p>";
$pdf->FWriteTag(0,6,$txt);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,6,"HACE CONSTAR",0,1,'C');
$pdf->Ln(10);
$txt="<p>Que " . $gender[2] . " C. <b>" . $datos['nombre'] . "</b> de la carrera <b>" . $carrera . "</b> con " . $codigo . " <b>" . $datos['codigoAlumno'] . "</b>, ha concluido de forma satisfactoria sus <b>" . $practicas . " PROFESIONALES</b> con una estancia de " . $hrs . " horas en la empresa.</p>";
$pdf->FWriteTag(0,6,$txt);
$pdf->Ln(10);
$txt="<p>Los Belenes, Zapopan, Jalisco a los 7 " . utf8_decode("días") . " del mes de Mayo del" . utf8_decode(" año ") . "2019.</p>";
$pdf->FWriteTag(0,6,$txt);
}
$pdf->Output();//fin del pdf
?>
