<?php
if(!isset($_SESSION['estudiante'])){ header("Location: ../index.php"); }
include("../controller/getFechas.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/calendario.css" />
</head>
<style type="text/css">
.cld-day{
	border:none;
}
@media screen and (max-width: 600px){
	.cld-main{
    width: 140%;
	position:relative;
	right:20%;
	font-size:20px;
	
  }
  .cld-day.today .cld-number{
	  width:40px;
  }
}
@media screen and (max-width: 600px){
	h2{
		font-size:24px;
	}
}
@media screen and (min-width: 768px){
	.cld-main{
	width:150%;
	position:relative;
	right:20%;
	font-size:32px;
}
}
h2{
	position:relative;
	font-size:48px;
	top:100px;}
.contenedor{
	position:relative;
	top:150px;
	right:3%;
}
</style>
<body>
    <script type="text/javascript" src="caleandar.js"></script>
    <h2 align="center"> CALENDARIO </h2>
    <div class="contenedor">
        <div id="caleandar"></div>
    </div>

    <script type='text/javascript'>
        
        var events = [
			<?php while($fecha = mysqli_fetch_assoc($getFechas)){ ?>
			{'Date': new Date(<?php echo $fecha['fecha']; ?>), 'Title': "<?php echo $fecha['titulo']; ?>", 'Link': "<?php echo $fecha['link']; ?>"},
			<?php } ?>
        ];
        
        var settings = {};
        var element = document.getElementById('caleandar');
        caleandar(element, events, settings);
    </script>

</body>
</html>