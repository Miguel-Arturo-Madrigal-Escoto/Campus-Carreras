<?php
if(isset($_POST['iniciarAdmin'])){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    // El usuario y la contraseña solamente pueden ser numeros
    if(is_numeric($usuario)){
        if(is_numeric($contrasena)){
            
            // Conexion a la base de datos
            require("../controller/conexion.php");
            $buscarUsuarioQuery = "SELECT count(codigo) AS total FROM admin WHERE codigo = '$usuario' AND contrasena = '$contrasena'";
            $buscarUsuario = mysqli_query($conexion, $buscarUsuarioQuery);
            $resultado = mysqli_fetch_assoc($buscarUsuario);
            $conexion -> close();

            if($resultado['total'] == 1){
                session_start();
                $_SESSION['admin'] = $usuario;
                header("Location: index.php");

            }
			else{ header("Location: ../index.php"); }
        }else{ header("Location: ../index.php"); }
    }else{ header("Location: ../index.php"); }
}else{ header("Location: ../index.php"); }
?>