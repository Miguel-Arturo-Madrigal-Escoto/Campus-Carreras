<?php
session_start();
if(!isset($_SESSION['empresa'])){ header("Location: ../index.php");
error_reporting(0);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Campus Carrera | Empresa</title>		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
		<!-- Font Awesome Iconos [usados en la pagina] -->
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<!--  estilos css -->
		<link type="text/css" rel="stylesheet" href="../css/style.css"/>
        <!-- Logo del poli en la pestaña-->
        <link rel="icon" href="../img/empresa.png"/>
        <!-- iconos para el nav-->
        <link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css"/>
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
				font-size:16px;
			}}

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
							<img src="../img/logo_poli.png" alt="logotipo del polimatute" id="logo">&nbsp;&nbsp;<?php $idEmpresa = $_SESSION['empresa'];
require("../controller/conexion.php");
$nombreEmpresaQuery = "SELECT * FROM empresa WHERE idEmpresa = '$idEmpresa'";
$nombreEmpresa = mysqli_query($conexion, $nombreEmpresaQuery);
$nombre = mysqli_fetch_assoc($nombreEmpresa);
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
            <li><a href="index.php"><span class="icon-home"></span>&nbsp;&nbsp;Inicio</a></li>
						<li><a href="index.php?em=<?php echo md5(1); ?>"><span class="icon-user"></span>&nbsp;Perfil</a></li>
						<li><a href="index.php?em=<?php echo md5(2); ?>"><span class="icon-users"></span>&nbsp;Practicantes</a></li>
						<li><a href="index.php?em=<?php echo md5(3); ?>"><span class="icon-calendar"></span>&nbsp;Calendario</a></li>
            <li><a href="index.php?em=<?php echo md5(4); ?>"><span class="icon-logout"></span>&nbsp;Salir</a></li>
					</ul>

				</nav>
				<!-- /Navigation -->

			</div>
		</header>
        <!--Switch de redireccion-->
<?php
		if(isset($_GET['em'])){
			$em = $_GET['em'];
		}else{
			$em = NULL;
			}

			switch($em){
				case md5(1): include '../empresa/verEmpresa.php'; break;
				case md5(2): include '../empresa/practicantes.php'; break;
				case md5(3): include '../empresa/calendario.php'; break;
				case md5(4): include '../controller/salir.php'; break;
				//carga editar sus cupos dentro de empresa//
				case md5(5): include '../empresa/editarEmpresa.php'; break;
				default: include 'inicio-em.php'; break;
			}

?>
		<footer>
            <div class="container-footer-all">
                <div class="container-body">
                    <div class="column1">
                        <h1>CONTACTO</h1>
                        <p><span class="icon-graduation-cap"></span>&nbsp;&nbsp;Dirección: Periférico Norte No. 640, Los Belenes, C.P. 45101, Zapopan, Jalisco, México</p><br>
                        <p><span class="icon-phone"></span>&nbsp;&nbsp;36-33-06-13, 33-64-58-02, 36-56-80-98 </p><br>
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
