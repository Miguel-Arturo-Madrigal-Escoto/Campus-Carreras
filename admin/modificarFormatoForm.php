<!DOCTYPE html>
<html lang="es">
<head>
  <style type="text/css">
  .titulo{
    position: relative;
    top:100px;
  }
  .form{
    position: relative;
    top:125px;
    left: 5%;
  }
  .titulo h3{
    text-align: center;
    color: #f63;
  }
  input[type="number"], input[type="text"]{
    color: #000;
    width: 40%;
    display: block;
    border: 1px solid rgba(0, 0, 0, 0.3);
  }
  #icon-calendar{
    color: #f00;
  }
  .icon-clock{
    color: blue;
  }
  .form p{
    color: #000;
  }
  input[value="Aceptar"]{
    color: #000;
    border: none;
    background-color: #f63;
    transition: .2s all ease-in-out;
    padding: 12px;
    border-radius: 5px;
    max-width: 8%;
  }
  input[value="Aceptar"]:hover{
    background-color: #f93;
  }
  </style>
</head>
<body>
<div class="titulo">
  <h3><span class="icon-doc"></span> Modificar carta oficio </h3>
</div>
<div class="form">
  <form action="modificarFormatoLogico.php" method="post">
    <p> <span class="icon-dot"></span> Introduce los nuevos parámetros de impresión: </p><br><br>
    <span class="icon-calendar" id="icon-calendar"></span> <font color="#000"> Fecha de emisión de la carta: </font> <br><br> 
    <input type="text" name="emision" placeholder="Ej: 21 de Diciembre de 2019" required/><br><br>
    <input type="submit" value="Aceptar" name=""/>

  </form>
</div>
</body>
</html>
