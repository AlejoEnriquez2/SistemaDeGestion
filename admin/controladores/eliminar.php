<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Eliminar</title>
		<meta charset="utf-8">
    </head>
    <body>
        <?php
            include '../../config/conexionBD.php';
            $codigo = $_SESSION['codigo'];
            $sql1 = "SELECT * FROM usuario WHERE usu_codigo = $codigo AND usu_eliminado = 'N'";
            $result1 = $conn->query($sql1);
            $u1 = $result1->fetch_assoc();
            $admin = $u1['usu_admin'];
                if($admin == 1){
                    date_default_timezone_set("America/Guayaquil");
                    $fecha = date('Y-m-d H:i:s', time());
                    $codigo = $_GET['codigo'];
                    $sql = "UPDATE usuario SET usu_eliminado = 'Y', usu_fecha_modificacion='$fecha' WHERE usu_codigo = '$codigo'";
                    $result = $conn->query($sql);
                    if($result){
                        echo "Eliminado Correctamente";
                    }else {
                        echo "Error!";
                    }
                }else if($admin ==0){
                    date_default_timezone_set("America/Guayaquil");
                    $fecha = date('Y-m-d H:i:s', time());
                    $codigo = $_SESSION['codigo'];
                    $sql = "UPDATE usuario SET usu_eliminado = 'Y', usu_fecha_modificacion='$fecha' WHERE usu_codigo = '$codigo'";
                    $result = $conn->query($sql);
                    if($result){
                        echo "Eliminado Correctamente";
                        echo "<a href='salir.php'>Aceptar</a>";
                        
                    }else {
                        echo "Error!";
                    }
                }
        ?>
    </body>
</html>