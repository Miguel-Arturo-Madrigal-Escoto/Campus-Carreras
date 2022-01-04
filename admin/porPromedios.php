<?php
error_reporting(0);
spl_autoload_register(function ($nombre_clase) {
include '../fpdf/' . $nombre_clase . '.php';
});

$promedio = $_POST['promedio'];
$datosAlumnoQuery = "";


if($promedio == "promedio1"){ $datosAlumnoQuery = "SELECT * FROM alumnos WHERE promedio >= '90' AND egresado = '1'";}
if($promedio == "promedio2"){ $datosAlumnoQuery = "SELECT * FROM alumnos WHERE promedio >= '80' AND promedio <= '89.99' AND egresado = '1'";}
if($promedio == "promedio3"){ $datosAlumnoQuery = "SELECT * FROM alumnos WHERE promedio >= '70' AND promedio <= '79.99' AND egresado = '1'";}
if($promedio == "promedio4"){ $datosAlumnoQuery = "SELECT * FROM alumnos WHERE promedio >= '60' AND promedio <= '69.99' AND egresado = '1'";}
if($promedio == "promedio5"){ $datosAlumnoQuery = "SELECT * FROM alumnos WHERE promedio >= '0' AND promedio <= '59.99' AND egresado = '1'";}

$codigoAlumno = $_POST['codigoAlumno'];
require("../controller/conexion.php");
$datosAlumno = mysqli_query($conexion, $datosAlumnoQuery);

class PDF extends WriteTag
{
// Page header -(OBJECTOS QUE IRAN EN LA CABECERA DE LA PÁGINA)
function Header()
{
    // Este es la imagen del logotipo de coordiancion de carrera de la
    //Escuela Politecnica Ing. "Jorge Matute Remus"
    $this->Image('../img/udgPdfLogo.png',20,6,100);
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

     $meses = array(NULL, "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
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
     //$this->Cell(0,10,'Los Belenes, Zapopan, Jalisco a ' . $GLOBALS['emision'] . ' del ' . date("Y"),0,0,'C');
     require("../controller/conexion.php");
     $buscarEmisionQuery = "SELECT fechaEmision FROM pdf WHERE idPdf = '1'";
     $buscarEmision = mysqli_query($conexion, $buscarEmisionQuery);
     $emision = mysqli_fetch_assoc($buscarEmision);
     $this->Cell(0,10,'Los Belenes, Zapopan, Jalisco a ' . $emision['fechaEmision'] . '.',0,0,'C');
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

// Instanciation of inherited class
$pdf = new PDF('P','mm','Letter');
while($datos = mysqli_fetch_assoc($datosAlumno)){
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(20,10,20);
$pdf->SetFont('Arial','B',10);
//datos de la cartas	$pdf->Cell(0,4,$dirigidoA,0,1);
$blank = ''; //deja un espacio al inicio)
require("../controller/conexion.php");
$buscarCodigoEmpresa = "SELECT idEmpresa FROM alumnos WHERE codigoAlumno='$codigoAlumno'";
$buscarCodigo = mysqli_query($conexion, $buscarCodigoEmpresa);
$codigo = mysqli_fetch_assoc($buscarCodigo);
$codigo = $codigo['idEmpresa'];

$buscarNombresQuery = "SELECT nombre, dirigido, cargoDir FROM empresa WHERE idEmpresa='$codigo'";
$buscarNombre = mysqli_query($conexion, $buscarNombresQuery);
$nombre = mysqli_fetch_assoc($buscarNombre);

$dirigidoA = utf8_decode(mb_strtoupper($nombre['dirigido'])); 
$cargoDirEmp = utf8_decode(mb_strtoupper($nombre['cargoDir']));
$nombreEmp = utf8_decode(mb_strtoupper($nombre['nombre']));

  $pdf->Cell(0,4,$blank,0,1);
  $pdf->Cell(0,4,$dirigidoA,0,1);
  $pdf->Cell(0,4,$cargoDirEmp,0,1);
  $pdf->Cell(0,4,$nombreEmp,0,1);
  $pdf->Cell(0,4,'PRESENTE:',0,1);
  $pdf->Ln(5);


  $pdf->Ln(4);
  //Stylesheet
  $pdf->SetStyleWT("p","Arial","N",10,"0,0,0",15);
  $pdf->SetStyleWT("b","","B",10,"");
  $pdf->SetStyleWT("st","Arial","N",8,"0,0,0");
  $pdf->SetStyleWT("sp","Arial","N",6,"0,0,0");
  $pdf->SetStyleWT("spt","Arial","N",10,"0,0,0");
  //debes cambiarle para que diga el genero, nombre, codigo, grado y carrera
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

  $txt="<p>Por este conducto me permito presentar a Usted " . $gender[0] . " <b>C. " . $datos['nombre'] . "</b> con " . $codigo . " <b>" . $datos['codigoAlumno'] . "</b>, " . $gender[1] . " de <b>" . $datos['grado'] . "</b> semestre de la carrera <b>" . $carrera . "</b>, " . $gender[2] . " cual " . $realizara . " las " . $practicas . " profesionales en su empresa a partir del dia " . $fechas['fechaInicio'] . ", concluyendo el " . $fechas['fechaTermino'] . " del " . $anno . " en curso, asistiendo de lunes a viernes 4 horas diarias cubriendo un total de " . $hrs . " horas durante el " . $periodo . ", con un horario que la empresa en acuerdo con " . $gender[2] . " " . $gender[1] . " asignen.</p>";
  $pdf->FWriteTag(0,4,$txt);
  $pdf->Ln(6);
  //se debe generar que si es femenino o masculino
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
  //curp y nss de la base de datos
  $pdf->Cell(87.9,5,$datos['curp'],"LTB",0,"C");
  $pdf->Cell(88,5,$datos['nss'],"TBR",0,"C");
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
  //nacionalidad, genero y edad
  $tempGenero = "";
  if($datos['genero'] == "M"){ $tempGenero = "Masculino"; }
  if($datos['genero'] == "F"){ $tempGenero = "Femenino"; }

  $pdf->Cell(88.3,5,$datos['nacionalidad'],"LTB",0,"C");
  $pdf->Cell(43.8,5,$tempGenero,"TB",0,"C");
  $pdf->Cell(43.8,5,$datos['edad'],"RTB",0,"C");
  $pdf->Ln(5);
  $pdf->SetFillColor(204,204,204);
  $txt="<sp>Celular                                                                                                                                      Email</sp>";
  $pdf->FWriteTag(0,3,$txt,1,"C",1);
  $pdf->Ln(0);
  $pdf->SetFont('Arial','',10);
  //celular y correo del alumno
  $pdf->Cell(87.9,5,$datos['numeroCelular'],"LTB",0,"C");
  $pdf->Cell(88,5,$datos['correo'],"RTB",0,"C");
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
  //estado y ciudad del alumno
  $pdf->Cell(87.9,5,$datos['estado'],"LTB",0,"C");
  $pdf->Cell(88,5,$datos['ciudad'],"RTB",0,"C");
  $pdf->Ln(5);
  $pdf->SetFillColor(204,204,204);
  $txt="<sp>Colonia                                                                                                                                            C.P.</sp>";
  $pdf->FWriteTag(0,3,$txt,1,"C",1);
  $pdf->Ln(0);
  $pdf->SetFont('Arial','',10);
  //colonia y codigo postal del alumno
  $pdf->Cell(87.9,5,$datos['colonia'],"LTB",0,"C");
  $pdf->Cell(88,5,$datos['codigoPostal'],"RTB",0,"C");
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
  //datos de domicilio
  $pdf->Cell(88.3,5,$datos['calle'],"LTB",0,"C");
  $pdf->Cell(43.8,5,$datos['numExt'],"TB",0,"C");
  $pdf->Cell(43.8,5,$datos['numInt'],"RTB",0,"C");
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
  //jalar datos de emergencia
  $pdf->Cell(88.3,5,$datos['padreEmergencia'],"LTB",0,"C");
  $pdf->Cell(43.8,5,$datos['numeroEmergencia'],"TB",0,"C");
  $pdf->Cell(43.8,5,$datos['parentesco'],"RTB",0,"C");
  $pdf->Ln(12);
  $txt="<p>Sin otro particular por el momento, me despido de usted, quedando a sus " . $ordenes . " para cualquier duda o " . $aclaracion . " al respecto.</p>";
  $pdf->FWriteTag(0,4,$txt);
}

  $pdf->Output();//fin del pdf

?>
