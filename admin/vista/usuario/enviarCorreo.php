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
		<title>Usuarios</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="../../controladores/ajax.js"></script>
        <link rel="stylesheet" href="../styles/styles.css" type="text/css">
	</head>
	<body>
        <header>
            <?php 
                include '../../../config/conexionBD.php';
                $codigo = $_SESSION['codigo'];
                $datos = "SELECT * FROM usuario WHERE usuario.usu_codigo = '$codigo'";
                $result = $conn->query($datos);
                $u = $result->fetch_assoc();
                $nombres = $u["usu_nombres"];
                $apellidos = $u["usu_apellidos"];
                $correo = $u["usu_correo"];
                $foto = $u["usu_imagen"];

                
    
            ?>
             <div class="col1">
                <a href="indexUsuario.php"><h2>Gestion de Usuarios</h2></a>
                <a href="correo2.php"><h2>Correos</h2></a>
                <a href="enviarCorreo.php"><h2>Enviar Correo</h2></a>
                
            </div>

            <div class="col2">
                <img width="50%" alt="<?php echo "$foto"?>" src='../../images/<?php echo "$foto"?>'>
            </div>
            <div class="col3">
                <h4><?php echo "$nombres" ?></h4>
                <h4><?php echo "$apellidos" ?></h4>
            </div>
        </header>
        <section style='clear: both;'>
            <form method="POST" action="../../controladores/enviar.php">
                <h2>Remitente</h2>
                <input type="text" name="remitente" value="<?php echo "$correo"?>" disabled>
                <h2>Destinatario</h2>
                <input type="text" name="destinatario" value="">
                <h2>Asunto</h2>
                <input type="text" name="asunto" value="">
                <h2>Mensaje</h2>
                <textarea type="text" name="mensaje" rows="10" cols="40"></textarea>
                <br>
                <input type="submit"  name="crear" value="Enviar">
            </form>
        </section>
    </body>
</html>
