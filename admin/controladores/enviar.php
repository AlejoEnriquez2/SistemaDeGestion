<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 1){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<title>Crear Nuevo Usuario</title>
		<link rel="stylesheet" type="text/css" href="../vista/style.css">
    </head>
    <body>
    	<?php
    		include '../../config/conexionBD.php';
            $codigo = $_SESSION['codigo'];
            $sql1 = "SELECT usu_correo FROM usuario WHERE usu_codigo ='$codigo'";
            $result1 = $conn->query($sql1);
            $u1 = $result1->fetch_assoc();
            $remitente = $u1['usu_correo'];
    		
    		$destinatario = isset($_POST["destinatario"]) ? trim($_POST["destinatario"], 'utf-8'): null;
    		$asunto = isset($_POST["asunto"]) ? trim($_POST["asunto"], 'utf-8'): null;
    		$mensaje = isset($_POST["mensaje"]) ? trim($_POST["mensaje"]) : null;
            
            echo $remitente;
            echo $destinatario;
            echo $asunto;
            echo $mensaje;

            $sql = "INSERT INTO correo(cor_codigo, cor_remitente, cor_destinatario, cor_asunto, cor_eliminado, cor_fecha, cor_mensaje) VALUES (0, '$remitente', '$destinatario', '$asunto', 'N', null , '$mensaje')";
            if($conn->query($sql)===TRUE){
    			echo "<p>Se ha enviado correctamente</p>";
    		}else{
    			echo "<p>ERROR</p>";
    		}

    		$conn->close();
    		echo "<a href='../vista/usuario/indexUsuario.php'>Volver</a>";
        ?>
    </body>
</html>