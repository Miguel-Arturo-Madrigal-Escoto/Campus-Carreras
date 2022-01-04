<!DOCTYPE html>
<html lang="es">
<head>
  <style type="text/css">
  .titulo{
    position: relative;
    top:75px;
  }
  .titulo h3{
    text-align: center;
    color: #f63;
  }
  .form{
    position: relative;
    left:5%;
    top:100px;
  }
  .form p{
    color: #000;
  }
  select{
    color: #000;
  }
  .icon-linux{
    color: #000;
  }
  .icon-school{
    color:#000;
  }
  .icon-cloud{
    color: #000;
  }
  .icon-list{
    color: #000;
  }
  input[value="Generar pdf"]{
    color: #000;
    border: none;
    transition: .2s all ease-in-out;
    padding: 8px;
    background-color: #f93;
    border-radius: 5px;
  }
  input[value="Generar pdf"]:hover{
    background-color: #f63;
  }
  </style>
</head>
<body>
  <div class="titulo">
    <h3><span class="icon-group"></span>Impresión por grupos</h3>
  </div>
  <div class="form">
    <form action="porGrupos.php" method="post">
      <p> <span class="icon-dot-circled"></span>Selecciona los parámentros de la impresión </p>
      <br><br>
      <!--select por grado-->
      <span class="icon-linux"></span>&nbsp;<font color="#000">Selecciona el grado:</font>&nbsp;&nbsp;<select name="grado">
        <option value="6">6°</option>
        <option value="8">8°</option>
      </select>
        <br><br>
      <!--select por grupo-->
      <span class="icon-school"></span>&nbsp;<font color="#000">Selecciona el grupo:</font>&nbsp;&nbsp;<select name="grupo">
        <option value="A">A</option>
        <option value="B">B</option>
      </select>
        <br><br>
      <!--select por carrera-->
      <span class="icon-list"></span>&nbsp;<font color="#000">Selecciona la carrera:</font>&nbsp;&nbsp;<select name="carrera">
        <option value="BTAD">Bachillerato Tecnologico en Administracion.</option>
        <option value="BTGO">Bachillerato Tecnologico en Gestion Aduanal y Operaciones.</option>
        <option value="TPIN">Tecnologo Profesional en Informatica.</option>
        <option value="BTPT">Tecnologo Profesional en Telecomunicaciones.</option>
        <option value="TPEA">Tecnologo Profesional en Energias Alternas.</option>
        <option value="TPEI">Tecnologo Profesional en Electricidad Industrial.</option>
        <option value="TPMI">Tecnologo Profesional en Mecanica Industrial.</option>
        <option value="TPMC">Tecnologo Profesional en Procesos de Manufactura Competitiva</option>
        <option value="TPBI">Tecnologo Profesional en Biotecnologia </option>
      </select>
        <br><br>
      <!--select por turno-->
      <span class="icon-cloud"></span>&nbsp;<font color="#000">Selecciona el turno:</font>&nbsp;&nbsp;<select name="turno">
        <option value="M">Matutino</option>
        <option value="V">Vespertino</option>
      </select>
      <br><br><br>
      <input type="submit" value="Generar pdf">
    </form>
  </div>
</body>
</html>
