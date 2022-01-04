<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Iniciar sesión</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../css/login.css"/>
		<link type="text/css" rel="stylesheet" href="../css/style.css"/>
    </head>
	<body>

		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(img/student.jpg);"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.php">Inicio</a></li>
							<li>Estudiante</li>
						</ul>
						<h1 class="white-text">Iniciar sesión</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>Estudiante</h4>
							<form action="estudiante/inicio.php" method="post">
								<input class="input" type="text" name="usuario" placeholder="Codigo de estudiante" required>
								<input class="input" type="password" name="contrasena" placeholder="Contraseña" required>
								<input type="submit" value="Iniciar sesion" class="main-button icon-button pull-right" name="iniciarEstudiante"/>
                                <br>
                                <br><br>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>Información de contacto</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>delaluz.quezada@academicos.udg.mx</li>
							<li><i class="fa fa-phone"></i>36-33-06-13, 33-64-58-02, 36-56-80-98 Ext. 118

</li>
							<li><i class="fa fa-map-marker"></i>Periférico Norte No. 640, Los Belenes, C.P. 45101, Zapopan, Jalisco, México</li>
						</ul>



					</div>
					<!-- contact information -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->
		<!-- jQuery Plugins -->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>

	</body>
</html>
