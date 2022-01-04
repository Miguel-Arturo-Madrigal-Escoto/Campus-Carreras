<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" type="text/css" href="../css/generacionActual.css"/>
</head>
<body>
  <div class="titulo">
    <h3><span class="icon-users"></span> Generación actual </h3>
  </div>
  <div class="form">
    <form action="pdfTermino.php" method="post">
    <p> <span class="icon-dot"></span> Selecciona la generación actual para
    poder generar las cartas de termino de los alumnos. </p> <br>
    <span class="icon-calendar"></span>
    <select name="gen" id="generacion">
      <option value="2019A"> 2019-A </option>
      <option value="2019B"> 2019-B </option>
      <option value="2020A"> 2020-A </option>
      <option value="2020B"> 2020-B </option>
      <option value="2021A"> 2021-A </option>
      <option value="2021B"> 2021-B </option>
    </select>
    <input type="submit" value="Generar pdf" name="generacion" class="generar">
    </form>
  </div>
</body>
</html>
