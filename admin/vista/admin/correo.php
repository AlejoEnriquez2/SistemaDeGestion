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
            <div style="float: left; width: 50%">
                <a href="indexAdmin.php?codigo=<?php echo "$codigo" ?>"><h2 style="float:left; width: 50%;background-color: rgb(209, 209, 226);">Gestion de Usuarios</h2></a>
                <a href="correo.php?codigo=<?php echo "$codigo" ?>"><h2 style="float:left; margin-left: 50px; width: 20%;background-color: rgb(209, 209, 226)">Correos</h2></a>
            </div>

            <div style="float:left; margin-right: 10px; width: 20%" >
                <img width="50%" alt="<?php echo "$foto"?>" src='../../images/<?php echo "$foto"?>'>
                <h4><?php echo "$nombres" ?></h4>
                <h4><?php echo "$apellidos" ?></h4>
            </div>

            <div style="float:left; margin-left: 10px; width: 15%; margin-top: 30px">
                <td><a href='../../controladores/eliminar.php?codigo=<?php echo "$codigo" ?>'>Eliminar</a></td><br>
                <td><a href='../../controladores/editar.php?codigo=<?php echo "$codigo" ?>'>Editar</a></td><br>
                <td><a href='../../controladores/password.php?codigo=<?php echo "$codigo" ?>'>Actualizar Contrasena</a></td><br>
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