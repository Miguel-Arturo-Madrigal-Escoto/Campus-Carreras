<!DOCTYPE html>
<html lang="es">
<head>
  <!--estilos css-->
  <style type="text/css">
  #titulo{
    position: relative;
    top:100px;
  }
  #titulo h3{
    text-align: center;
    color: #f63;
  }
  #form p{
    color: #000;
  }
  #form{
    position: relative;
    left: 5%;
    top: 135px;
  }
  select[name="promedio"]{
    color: #000;
  }
  .icon-linux{
    color: #000;
  }
  input[name="generar"]{
    color: #000;
    transition: .2s all ease-in-out;
    background-color: #f63;
    border: none;
    padding: 8px;
    border-radius: 5px;
  }
  input[name="generar"]:hover{
    background-color: #f93;
  }
  </style>
</head>
<body>
  <div id="titulo">
    <h3><span class="icon-tasks" id="icon-tasks"></span>Impresión por promedios</h3>
  </div>
  <div id="form">
    <form action="porPromedios.php" method="POST">
    <p> <span class="icon-dot-circled"></span>Selecciona los parámetros de la impresión </p>
    <br><br>
    <span class="icon-linux"></span>&nbsp;<font color="#000">Selecciona el promedio:</font>&nbsp;&nbsp;<select name="promedio">
      <option value="promedio1">100 - 90 </option>
      <option value="promedio2">89.99 - 80 </option>
      <option value="promedio3">79.99 - 70 </option>
      <option value="promedio4">69.99 - 60 </option>
      <option value="promedio5">59.99 - 0</option>
    </select>
    <br><br><br>
    <input type="submit" name="generar" value="Generar pdf"/>
   </form>
  </div>
</body>
</html>
