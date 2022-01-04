<?php
error_reporting(0);
spl_autoload_register(function ($nombre_clase) {
include '../fpdf/' . $nombre_clase . '.php';
});


$turno=$_POST['turno'];
$carrera=$_POST['carrera'];
$grado=$_POST['grado'];
$grupo=$_POST['grupo'];
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
     $this->Cell(0,10,'Los Belenes, Zapopan, Jalisco a 20 de Diciembre del 2018.',0,0,'C');
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
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(20,10,20);
$pdf->SetFont('Arial','B',10);
//datos de la cartas	$pdf->Cell(0,4,$dirigidoA,0,1);
$blank = ''; //deja un espacio al inicio)
$dirigidoA = 'LIC. SANDRA BERENICE SANCHEZ HERNANDEZ '; //variable $dirigidoA (dentro de empresas)
$cargoDirEmp = 'GERENTE DE GESTION DEL TALENTO HUMANO'; //variable $cargoDirEmp (dentro de empresas)
$nombreEmp = 'DIFARVET S.A. DE C.V. '; //variable $nombre (dentro de empresas)

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
  $txt="<p>Por este conducto me permito presentar a Usted " . $gender[0] . " <b>C. " . $nombre . "</b> con " . $codigo . " <b>" . $codigoAl . "</b>, " . $gender[1] . " de <b>" . $grado . "</b> semestre de la carrera <b>" . $carreraAl . "</b>, " . $gender[2] . " cual " . $realizara . " las " . $practicas . " profesionales en su empresa a partir del " . $dia . " " . $startDia . " de " . $startMes . ", concluyendo el " . $endDia . " de " . $endMes . " del " . $anno . " en curso, asistiendo de lunes a viernes 4 horas diarias cubriendo un total de " . $hrs . " horas durante el " . $periodo . ", con un horario que la empresa en acuerdo con " . $gender[2] . " " . $gender[1] . " asignen.</p>";
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
  //nacionalidad, genero y edad
  $pdf->Cell(88.3,5,$NacionAl,"LTB",0,"C");
  $pdf->Cell(43.8,5,$generoAlEsp,"TB",0,"C");
  $pdf->Cell(43.8,5,$edadAl,"RTB",0,"C");
  $pdf->Ln(5);
  $pdf->SetFillColor(204,204,204);
  $txt="<sp>Celular                                                                                                                                      Email</sp>";
  $pdf->FWriteTag(0,3,$txt,1,"C",1);
  $pdf->Ln(0);
  $pdf->SetFont('Arial','',10);
  //celular y correo del alumno
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
  //estado y ciudad del alumno
  $pdf->Cell(87.9,5,$EstadoAl,"LTB",0,"C");
  $pdf->Cell(88,5,$CiudadAl,"RTB",0,"C");
  $pdf->Ln(5);
  $pdf->SetFillColor(204,204,204);
  $txt="<sp>Colonia                                                                                                                                            C.P.</sp>";
  $pdf->FWriteTag(0,3,$txt,1,"C",1);
  $pdf->Ln(0);
  $pdf->SetFont('Arial','',10);
  //colonia y codigo postal del alumno
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
  //datos de domicilio
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
  //jalar datos de emergencia
  $pdf->Cell(88.3,5,$emergAl,"LTB",0,"C");
  $pdf->Cell(43.8,5,$emergNumAl,"TB",0,"C");
  $pdf->Cell(43.8,5,$emergParentAl,"RTB",0,"C");
  $pdf->Ln(12);
  $txt="<p>Sin otro particular por el momento, me despido de usted, quedando a sus " . $ordenes . " para cualquier duda o " . $aclaracion . " al respecto.</p>";
  $pdf->FWriteTag(0,4,$txt);

  $pdf->Output();//fin del pdf

?>
