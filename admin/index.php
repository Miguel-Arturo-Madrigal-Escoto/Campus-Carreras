<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: ../index.php");
error_reporting(0); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Campus Carreras | Administrador</title>		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
		<!-- Font Awesome Iconos [usados en la pagina] -->
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<!--  estilos css -->
		<link type="text/css" rel="stylesheet" href="../css/style-ad.css"/>
        <!-- Logo del poli en la pestaña-->
        <link rel="icon" href="../img/administrador.jpg"/>
        <!-- iconos para el nav-->
        <link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css">
        <!-- estilos slider -->
        <link rel="stylesheet" type="text/css" href="../css/slider.css"/>
        <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    	<script type="text/javascript" src="../js/slider.js"></script>
        <style type="text/css">
				#nombre{
			display:inline;
		}
		#icono-editar{
			color: blue;
		}
			@media screen and (max-width:600px){
				#logo{
					position:relative;
					right:20%;
			}
			#nombre{
				position:relative;
				right:20%;
				font-size:14px;
			}}
			@media screen and (min-width:768px){
					#logo{
					position:relative;
					right:20%;
			}
			#nombre{
				position:relative;
				right:20%;
				font-size:16px;
			}
			}
		</style>
    </head>
<body>
<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index.php">
							<img src="../img/logo_poli.png" alt="logotipo del polimatute" id="logo">&nbsp;&nbsp;<?php $idAdmin = $_SESSION['admin'];
require("../controller/conexion.php");
$nombreAdminQuery = "SELECT * FROM admin WHERE codigo = '$idAdmin'";
$nombreAdmin = mysqli_query($conexion, $nombreAdminQuery);
$nombre = mysqli_fetch_assoc($nombreAdmin);
echo '<p id="nombre">' . $nombre['nombre'] . '</p>';

?>
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- menu de navegacion-->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
                        <!--submenu-->
                        <li class="submenu"><a class="a" href="index.php"><span class="icon-home"></span>&nbsp;Inicio</a></li>
                        <!--se le deja el # porque no te redireccionara, en el celular como no hay hover le puse un -> # -->
						<li><a class="a" href="#"><span class="icon-users"></span>&nbsp;Alumnos</a>
                        <ul class="generaciones">
                        <form action="index.php?adm=<?php echo md5(3); ?>" method="post">
                        <li class="li-generacion">
                        <a href="index.php?adm=<?php echo md5(5); ?>">
                        Todos los alumnos
                        </a>
						<ul class="asignaciones">
                            <a href="index.php?adm=<?php echo md5(8); ?>" class="a-sub"><li class="options"><span class="icon-school"></span>&nbsp;Agregar alumno</li></a>
                        </ul>
                        </li>
                        <li class="li-generacion"><input type="submit" value="2019A" class="submit" name="generacion"></li>
                        <li class="li-generacion"><input type="submit" value="2019B" class="submit" name="generacion"></li>
                        <li class="li-generacion"><input type="submit" value="2020A" class="submit" name="generacion"></li>
                        <li class="li-generacion"><input type="submit" value="2020B" class="submit" name="generacion"></li>
                        <li class="li-generacion"><input type="submit" value="2021A" class="submit" name="generacion"></li>
                        <li class="li-generacion"><input type="submit" value="2021B" class="submit" name="generacion"></li>
                        </form>
                        </ul>

						<li class="submenu2"><a class="a" href="#"><span class="icon-suitcase"></span>&nbsp;Empresas</a>
						<ul class="generaciones2">
							<a href="index.php?adm=<?php echo md5(1); ?>"><li class="li-generacion2"><span class="icon-eye"></span>&nbsp;Ver empresas</li></a>
							<a href="index.php?adm=<?php echo md5(12); ?>"><li class="li-generacion2"><span class="icon-plus-circle"></span>&nbsp;Agregar empresa</li></a>
							<a href="index.php?adm=<?php echo md5(18); ?>"><li class="li-generacion2"><span class="icon-briefcase" style="color:#f93;"></span>&nbsp;Fechas de elección</li></a>
						</ul>
						</li>


					  <li><a class="a" href="index.php?adm=<?php echo md5(2); ?>"><span class="icon-calendar"></span>&nbsp;Calendario</a>

						<li class="submenu2"><a class="a" href="#"><span class="icon-tasks"></span>&nbsp;Asignaciones</a>
							<ul class="generaciones2">
								<a href="index.php?adm=<?php echo md5(10); ?>"><li class="li-generacion2"><span class="icon-plus-circle"></span>&nbsp;Agregar asignación</li></a>
								<a href="index.php?adm=<?php echo md5(11); ?>"><li class="li-generacion2"><span class="icon-eye"></span>&nbsp;Ver asignaciones</li></a>
								<a href="index.php?adm=<?php echo md5(19); ?>"><li class="li-generacion2"><span class="icon-print"></span>&nbsp;Por grupos</li></a>
								<a href="index.php?adm=<?php echo md5(20); ?>"><li class="li-generacion2"><span class="icon-print"></span>&nbsp;Por promedios</li></a>
								<a href="index.php?adm=<?php echo md5(22); ?>"><li class="li-generacion2"><span class="icon-print"></span>&nbsp;Personalizada</li></a>
								<a href="index.php?adm=<?php echo md5(23); ?>"><li class="li-generacion2"><span class="icon-print"></span>&nbsp;Todas las asignaciones</li></a>
								<a href="index.php?adm=<?php echo md5(24); ?>"><li class="li-generacion2"><span class="icon-print"></span>&nbsp;Todas las cartas de término&nbsp;&nbsp;</li></a>
								<a href="index.php?adm=<?php echo md5(21); ?>"><li class="li-generacion2"><span class="icon-edit" id="icono-editar"></span>&nbsp;Modificar formato</li></a>
								<a href="index.php?adm=<?php echo md5(17); ?>"><li class="li-generacion2"><span class="icon-thumbs-down"></span>&nbsp;Dados de baja</li></a>
							</ul>
						</li>
                <li><a class="a" href="../controller/salir.php"><span class="icon-logout"></span>&nbsp;Salir</a></li>
					</ul>
				</li>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
<?php
		if(isset($_GET['adm'])){
			$adm = $_GET['adm'];
		}else{
			$adm = NULL;
			}

			switch($adm){
				case md5(1): include '../admin/empresas.php'; break;
				case md5(2): include '../admin/calendario.php'; break;
				case md5(3): include '../admin/generacion.php'; break;
				case md5(4): include '../admin/verAlumno.php';break;
				//carga historial de todos los alumnos que han existido
				case md5(5): include '../admin/historial.php'; break;
				case md5(6): include '../admin/editarAlumno.php';break;
				case md5(7): include '../admin/actualizarAlumno.php';break;
				//carga las opciones del submenu de Alumnos
				case md5(8): include '../admin/agregarAlumnoForm.php';break;
				case md5(9): include '../admin/agregarAlumno.php';break;
				//carga el apartado de asignacion
				case md5(10): include '../admin/asignarAlumnoForm.php';break;
				case md5(11): include '../admin/asignados.php';break;
				//agregar empresa//
				case md5(12): include '../admin/agregarEmpresa.php';break;
				//carga el php de modificar fecha dentro del calendario//
				case md5(13): include '../admin/modificarFecha.php';break;
				//Ver empresa
				case md5(14): include '../admin/verEmpresa.php';break;
				//Editar empresa
				case md5(15): include '../admin/editarEmpresa.php';break;
				case md5(16): include '../admin/formBaja.php';break;
				case md5(17): include '../admin/bajas.php';break;
				case md5(18): include '../admin/modificarEleccion.php';break;
        case md5(19): include '../admin/porGruposForm.php';break;
				case md5(20): include '../admin/porPromediosForm.php';break;
				case md5(21): include '../admin/modificarFormatoForm.php';break;
				case md5(22): include '../admin/impPersonalizadaForm.php';break;
				case md5(23): include '../admin/generacionActualAsignacionForm.php';break;
				case md5(24): include '../admin/generacionActualTerminoForm.php';break;
				//pdfs encripciónes
				case md5(25): include '../admin/pdfAsignacion.php';break;

				default: include 'inicio-ad.php';break;
			}

?>
		<footer>
            <div class="container-footer-all">
                <div class="container-body">
                    <div class="column1">
                        <h1>CONTACTO</h1>
                        <p><span class="icon-graduation-cap"></span>&nbsp;&nbsp;Dirección: Periférico Norte No. 640, Los Belenes, C.P. 45101, Zapopan, Jalisco, México</p><br>
                        <p><span class="icon-phone"></span>&nbsp;&nbsp;36-33-06-13, 33-64-58-02, 36-56-80-98</p><br>
                        <p><span class="icon-print" style="color:#FFF;"></span>&nbsp;&nbsp;Fax: 36330613</p><br>
                    </div>

                    <div class="column2">
                        <h1>Poli Matute Remus</h1>
                        <img src="../img/logo_udg_blanco.png" width="38%" class="logo" alt="Logotipo Politécnico Matute Remus" />
                    </div>

                    <div class="column3">
                        <h1>Desarrollado por:</h1>
                        <div class="row2">
                            <label> <span class="icon-dot"></span>Miguel Arturo Madrigal Escoto<br></label>
                            <label> <span class="icon-dot"></span>Cesar Leonel Muñoz Morfin <br></label>
                            <label> <span class="icon-dot"></span>Josafat Emmanuel Najera Padilla<br></label>
                            <label> <span class="icon-dot"></span>Jaime Chisai Barragán Plascencia<br></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-footer">
                   <div class="footer">
                        <div class="copyright">
                            © 2019 Todos los Derechos Reservados | Preparatoria Politécnica "Ing. Jorge Matute Remus"
                        </div>


                    </div>
                </div>
        </footer>
		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->


		<!-- jQuery Plugins usados localmente -->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>


</body>
</html>
