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
			<h2>Gestion de Usuarios</h2>
        </header>	
        <table style="width:100%">
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Nacimiento</th>
                <th>Eliminar</th>
                <th>Editar</th>
                <th>Cambiar Contraseña</th>
            </tr>

            <?php   
                include '../../../config/conexionBD.php';
                $codigo = $_GET['codigo'];
                $sql = "SELECT * FROM usuario WHERE usuario.usu_codigo = '$codigo'";
                $result = $conn->query($sql);
                $u = $result->fetch_assoc();
                echo "Ingresado '$codigo'";
                $cedula = $u["usu_cedula"];
                $nombres = $u["usu_nombres"];
                $apellidos = $u["usu_apellidos"];
                $direccion = $u["usu_direccion"];
                $telefono = $u["usu_telefono"];
                $correo = $u['usu_correo'];
                $nacimiento = $u["usu_fecha_nacimiento"];
                $foto = $u["usu_imagen"];
            ?>

            <td><?php echo "$cedula" ?></td>
            <td><?php echo "$nombres" ?></td>
            <td><?php echo "$apellidos" ?></td>
            <td><?php echo "$direccion" ?></td>
            <td><?php echo "$telefono" ?></td>
            <td><?php echo "$correo" ?></td>
            <td><?php echo "$nacimiento" ?></td>
            <td><a href='../../controladores/eliminar.php?codigo=<?php echo "$codigo" ?>'>Eliminar</a></td>
            <td><a href='../../controladores/editar.php?codigo=<?php echo "$codigo" ?>'>Editar</a></td>
            <td><a href='../../controladores/password.php?codigo=<?php echo "$codigo" ?>'>Actualizar Contrasena</a></td>
            <?php
                if($cedula=='null'){
                    echo "<tr>";
                    echo " <td colspan='7'> No existen usuarios</td>";
                    echo "</tr>";
                }        
                    $conn->close();
            ?>
        </table>
        
        <img width="25%" alt="<?php echo "$foto"?>" src='../../images/<?php echo "$foto"?>'>
        <br>
        <br>
        <input type="text" id="cedula" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()">
        <br>
        <br>
        <div id="informacion"><b>Datos de la persona</b></div>
        <br>
        <br>
    </body>
    <footer style='clear: both;'>
        <a href="../../controladores/salir.php">Salir</a>
    </footer>
</html>