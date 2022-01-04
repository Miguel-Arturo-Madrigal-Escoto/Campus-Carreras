<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Parametros de Impresión</title>
<style>
	h3{
		text-align:center;
		margin-top:80px;
		color:#f63
		}
	.formulario{
		color:#000;
		position:relative;
		top:60px;
		left:5%;
		width:40%;
	}
	#gc{
		border:none;
		cursor:pointer;
		background-color:#F93;
		transition: .2s all ease-in-out;
		height:40px;
		width:100px;
		border-radius:8px;
	}
	#gc:hover{
		background-color:#F60;
	}
	h4{
		margin-left:3%;
		position:relative;
		top:40px;
		color:#0C0;
		font-size:20px;
	}
</style>
</head>

<body>
	<h3><span class="icon-puzzle-outline"></span>&nbsp;Impresion Personalizada</h3>
    <h4>Parametros de Impresion</h4>
    <div class="formulario">
    <form action="impPersonalizada.php" method="post">
    	<label>Codigo del Alumno:</label>
        <input type="text" name="codigoAlumno"  required/><br /><br />
        
        <label>Nombre de la Empresa:</label>
        <input type="text" name="nombreEmpresa" required/><br /><br />
        
        <label>A quien se dirige la Carta:</label>
        <input type="text" name="dirigido" required/><br /><br />
        
        <label>Cargo:</label>
        <input type="text" name="cargo" required/><br /><br />
        
        <label>Fecha de Inicio:</label>
        <input type="text" name="inicio" placeholder="EJ: 12 de Febrero" required/><br /><br />
        
        <label>Fecha de Término:</label>
        <input type="text" name="termino" placeholder="EJ: 01 de Abril" required/><br /><br />
        
        <label>Horas por Cubrir:</label>
        <input type="number" name="horas" placeholder="Cantidad de Horas" required/><br /><br />
        
        <label>Fecha de Emisión de la Carta:</label>
        <input type="text" name="emision" placeholder="EJ: 17 de Noviembre" required/><br /><br />
        <input type="submit" name="enviar" value="Imprimir" id="gc"/><br />
    </form>
    </div>
</body>
</html>