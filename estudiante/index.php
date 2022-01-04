<?php
session_start();
if(!isset($_SESSION['estudiante'])){ header("Location: ../index.php");
error_reporting(0);}
?>
<!DOCTYPE html>
<html lang="es">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Campus Carreras | Estudiante</title>		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
		<!-- Font Awesome Iconos [usados en la pagina] -->
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<!--  estilos css -->
		<link type="text/css" rel="stylesheet" href="../css/style.css"/>
        <!-- Logo del poli en la pestaña-->
        <link rel="icon" href="../img/estudiante.jpg"/>
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
			@media screen and (max-width:600px){
				#logo{
					position:relative;
					right:20%;
			}
			#nombre{
				position:relative;
				right:20%;
				font-size:12px;
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
						<a class="logo" href="index.php?es=<?php echo md5(1); ?>">
							<img src="../img/logo_poli.png" alt="logotipo del polimatute" id="logo">&nbsp;&nbsp;<?php $idAlumno = $_SESSION['estudiante'];
require("../controller/conexion.php");
$nombreAlumnoQuery = "SELECT * FROM alumnos WHERE codigoAlumno = '$idAlumno'";
$nombreAlumno = mysqli_query($conexion, $nombreAlumnoQuery);
$nombre = mysqli_fetch_assoc($nombreAlumno);
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
                    						<li><a href="index.php"><span class="icon-home"></span>&nbsp;Inicio</a></li>
						<li><a href="index.php?es=<?php echo md5(1); ?>"><span class="icon-user"></span>&nbsp;Perfil</a></li>
						<li><a href="index.php?es=<?php echo md5(2); ?>"><span class="icon-suitcase"></span>&nbsp;Empresas</a></li>
						<li><a href="index.php?es=<?php echo md5(3); ?>"><span class="icon-calendar"></span>&nbsp;Calendario</a></li>
                        <li><a href="index.php?es=<?php echo md5(4); ?>"><span class="icon-logout"></span>&nbsp;Salir</a></li>
					</ul>

				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->
<!--Switch de redireccion-->
<?php
		if(isset($_GET['es'])){
			$es = $_GET['es'];
		}else{
			$es = NULL;
			}

			switch($es){
				case md5(1): include '../estudiante/alumno.php'; break;
				case md5(2): include '../estudiante/empresas.php'; break;
				case md5(3): include '../estudiante/calendario.php'; break;
				case md5(4): include '../controller/salir.php'; break;
				//se cargan las empresas
				case md5(5): include '../estudiante/verEmpresa.php'; break;
				//se carga el editar al alumno [cargara editar escolares]
				case md5(6): include '../estudiante/editarEscolares.php';break;
				case md5(7): include '../estudiante/editarPersonales.php';break;
				case md5(8): include '../estudiante/editarResidencia.php';break;
				case md5(9): include '../estudiante/editarContacto.php';break;
				case md5(10): include '../estudiante/editarEmergencia.php';break;
				//case para que se guarden los cambios
				case md5(11): include '../estudiante/actualizar.php';break;
				//carga el calendario de eventos
				default: include 'inicio-es.php'; break;
			}

?>
		<footer>
            <div class="container-footer-all">
                <div class="container-body">
                    <div class="column1">
                        <h1>CONTACTO</h1>
                        <p><span class="icon-graduation-cap"></span>&nbsp;&nbsp;Dirección: Periférico Norte No. 640, Los Belenes, C.P. 45101, Zapopan, Jalisco, México</p><br>
                        <p><span class="icon-phone"></span>&nbsp;&nbsp;36-33-06-13, 33-64-58-02, 36-56-80-98</p><br>
                        <p><span class="icon-print"></span>&nbsp;&nbsp;Fax: 36330613</p><br>
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
