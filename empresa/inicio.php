<?php
if(isset($_POST['iniciarEmpresa'])){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    if(preg_match('/[a-zA-Z0-9£$%^&*()}{@:#~?><>,;@|\-=-_+-¬]$/', $usuario)){
        if(preg_match('/[a-zA-Z0-9£$%^&*()}{@:#~?><>,;@|\-=-_+-¬]$/', $contrasena)){
            
            require("../controller/conexion.php");
            $buscarUsuarioQuery = "SELECT count(idEmpresa) AS total FROM empresa WHERE idEmpresa = '$usuario' AND contrasena = '$contrasena'";
            $buscarUsuario = mysqli_query($conexion, $buscarUsuarioQuery);
            $resultado = mysqli_fetch_assoc($buscarUsuario);

            if($resultado['total'] == 1){
                session_start();
                $_SESSION['empresa'] = $usuario;
                header("Location: index.php");

            }else{ header("Location: ../index.php"); }
        }else{ header("Location: ../index.php"); }
    }else{ header("Location: ../index.php"); }
}else{ header("Location: ../index.php"); }
?>