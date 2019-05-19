<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Usuarios</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="../../controladores/ajax.js"></script>
	</head>
	<body>
        <header>
        <?php 
                include '../../../config/conexionBD.php';
                $codigo = $_GET['codigo'];
                $datos = "SELECT * FROM usuario WHERE usuario.usu_codigo = '$codigo'";
                $result = $conn->query($datos);
                $u = $result->fetch_assoc();
                $nombres = $u["usu_nombres"];
                $apellidos = $u["usu_apellidos"];
                $foto = $u["usu_imagen"];
            ?>
            <div style="float: left; width: 60%">
                <a href="indexAdmin.php?codigo=<?php echo "$codigo" ?>"><h2 style="float:left; width: 30%;background-color: rgb(209, 209, 226);">Gestion de Usuarios</h2></a>
                <a href="correo.php?codigo=<?php echo "$codigo" ?>"><h2 style="float:left; margin-left: 100px; width: 20%;background-color: rgb(209, 209, 226)">Correos</h2></a>
            </div>
            
            <div style="float:left; margin-right: 30px; width: 30%" >
                <img width="30%" alt="<?php echo "$foto"?>" src='../../images/<?php echo "$foto"?>'>
                <h2><?php echo "$nombres" ?>
                <h2><?php echo "$apellidos" ?></h2>
            </div>
        </header>
        <table style="width:100%">
            <tr>
                <th>Fecha</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Asunto</th>
                <th>Eliminar</th>
            </tr>
    </body>
</html>