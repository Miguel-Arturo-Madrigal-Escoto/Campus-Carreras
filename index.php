<?php
session_start();
if(isset($_SESSION["estudiante"])){ header("Location: estudiante/index.php"); }
if(isset($_SESSION["empresa"])){ header("Location: empresa/index.php"); }
if(isset($_SESSION["admin"])){ header("Location: admin/index.php");
error_reporting(0);}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Campus Carreras | Escuela Politecnica "Ing. Jorge Matute Remus"</title>
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<!-- Font Awesome Iconos [usados en la pagina] -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!--  estilos css -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
        <!-- Logo del poli en la pestaña-->
        <link rel="icon" href="img/logo_poli.png"/>
        <!-- iconos para el nav-->
     	<link rel="stylesheet" type="text/css" href="fontello/css/fontello.css">
    </head>
	<body>

		<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index.php">
							<img src="img/logo_poli.png" alt="logotipo del polimatute">&nbsp;&nbsp;<strong>Campus Carreras</strong>
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
						<li><a href="index.php?pl=<?php echo md5(1); ?>"><span class="icon-user"></span>&nbsp;Estudiante</a></li>
						<li><a href="index.php?pl=<?php echo md5(2); ?>"><span class="icon-user-3"></span>&nbsp;Administrador</a></li>
                        <li><a href="index.php?pl=<?php echo md5(3); ?>"><span class="icon-suitcase"></span>&nbsp;Empresa</a></li>
					</ul>

				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->
		<!--Switch de redireccion-->
<?php
		if(isset($_GET['pl'])){
			$pl = $_GET['pl'];
		}else{
			$pl = NULL;
			}

			switch($pl){
				case md5(1): include 'estudiante/login-es.php'; break;
				case md5(2): include 'admin/login-ad.php'; break;
				case md5(3): include 'empresa/login-em.php'; break;
				default: include 'inicio.php'; break;
			}

?>

		<footer>
            <div class="container-footer-all">
                <div class="container-body">
                    <div class="column1">
                        <h1>CONTACTO</h1>
                        <p><span class="icon-graduation-cap"></span>&nbsp;&nbsp;Dirección: Periférico Norte No. 640, Los Belenes, C.P. 45101, Zapopan, Jalisco, México</p><br>
                        <p><span class="icon-phone"></span>&nbsp;&nbsp;(33) 36330613, 33645802,  36568098</p><br>
                        <p><span class="icon-print"></span>&nbsp;&nbsp;Fax: 36330613</p><br>
                    </div>

                    <div class="column2">
                        <h1>Poli Matute Remus</h1>
                        <img src="img/logo_udg_blanco.png" width="38%" class="logo" alt="Logotipo Politécnico Matute Remus" />
                    </div>

                    <div class="column3">
                        <h1>Desarrollado por:</h1>
                        <div class="row2">
                            <label> <span class="icon-dot" ></span>Miguel Arturo Madrigal Escoto<br></label>
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
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

	</body>
</html>
