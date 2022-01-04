<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Agregar Empresa </title>
	<link rel="stylesheet" type="text/css" href="../css/agregarEmpresa.css"/>
</head>
<div class="titulo">
  <h2><span class="icon-briefcase"><span>&nbsp;Nueva empresa </h2>
</div>
<div class="formulario">
		 <form action="agregarEmpresaLogico.php" method="POST" >

												<br>
                    <p><label><span class="icon-dot"></span>Nombre:</label></p>
                        <input name="nombre" type="text" id="nombre"  autofocus=""  required></p>
												<br>

                    <p><label><span class="icon-dot"></span>Calle:</label></p>
                        <input name="calle" type="text" id="calle" required></p>

                    <p><label><span class="icon-dot"></span>Numero Exterior:</label></p>
                        <input name="numExt" type="text" id="numExt" required></p>

                    <p><label><span class="icon-dot"></span>Colonia:</label></p>
                        <input name="colonia" type="text" id="colonia" required></p>

                    <p><label><span class="icon-dot"></span>Codigo Postal:</label></p>
                        <input name="cp" type="text" id="cp" required></p>

                    <p><label><span class="icon-dot"></span>Municipio:</label></p>
                        <input name="municipio" type="text" id="municipio" required></p>

                    <p><label><span class="icon-dot"></span>Estado:</label></p>
                        <input name="estado" type="text" id="estado" required></p>
												<br>
                    <p><label ><span class="icon-dot"></span>Encargado:</label></p>
                        <input name="encargado" type="text" id="encargado" required></p>
												<br>
										<p><label ><span class="icon-dot"></span>Cargo del encargado:</label></p>
		                    <input name="cargoDir" type="text" id="cargoDir" placeholder="Ejemplo: Gerente general" required></p>
												<br>
                    <p><label><span class="icon-dot"></span>Departamento:</label></p>
                        <input name="departamento" type="text" id="departamento"  required></p>
												<br>
                    <p><label><span class="icon-dot"></span>Actividades:</label></p>
                        <input name="actividades" type="text" id="actividades"  required></p>
												<br>
                    <p><label><span class="icon-dot"></span>Telefono:</label></p>
                        <input name="telefono" type="text" id="telefono" required></p>
												<br>
                    <p><label ><span class="icon-dot"></span>Correo:</label></p>
                        <input name="correo" type="email" id="correo"  autofocus="" required></p>
												<br>
                    <p><label><span class="icon-dot"></span>Sitio Web:</label></p>
                        <input name="sitioWeb" type="text" id="sitioWeb" ></p>
												<br>


                    <input type="submit"  name="agregarEmpresa" value="Agregar" class="boton">
                </form>
							</div>
						</body>
</html>
