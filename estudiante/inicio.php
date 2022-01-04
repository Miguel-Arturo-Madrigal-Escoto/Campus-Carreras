<?php
if(isset($_POST['iniciarEstudiante'])){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Validacion para el estudiante [ Codigo ]
    if(is_numeric($usuario)){
        // La contraseña puede tener todas las letras (mayusculas y minusculas),
        // los numeros del 0 al 9, y los simbolos del ASCII
        if(preg_match('/[a-zA-Z0-9£$%^&*()}{@:#~?><>,;@|\-=-_+-¬]/', $contrasena)){
                
            // Conexion a la base de datos
            require("../controller/conexion.php");
            $buscarUsuarioQuery = "SELECT count(codigoAlumno) AS total FROM alumnos WHERE codigoAlumno = '$usuario' AND contrasena = '$contrasena'";
            $buscarUsuario = mysqli_query($conexion, $buscarUsuarioQuery);
            $resultado = mysqli_fetch_assoc($buscarUsuario);
            $conexion -> close();

            if($resultado['total'] == 1){
                session_start();
                $_SESSION['estudiante'] = $usuario;
                header("Location: index.php");

            }else{ header("Location: ../index.php"); }
        }else{ header("Location: ../index.php"); }
    }else{ header("Location: ../index.php"); }
}else{ header("Location: ../index.php"); }
?>