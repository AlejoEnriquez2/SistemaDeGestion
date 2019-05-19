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
            include '../../../config/conexionBD.php';
            //UPDATE `usuario` SET `usu_eliminado` = 'Y', `usu_fecha_modificacion` = NULL WHERE `usuario`.`usu_codigo` = 6;
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            $codigo = $_GET['codigo'];
            $sql = "UPDATE usuario SET usu_eliminado = 'Y', usu_fecha_modificacion=$fecha WHERE usuario.usu_codigo = '$codigo'";
            $result = $conn->query($sql);
        ?>
    </body>
</html>