<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 0){
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
                $foto = $u["usu_imagen"];
            ?>
            <div class="col1">
                <a href="indexAdmin.php"><h2>Gestion de Usuarios</h2></a>
                <a href="correo.php"><h2>Correos</h2></a>
            </div>

            <div class="col2">
                <img width="50%" alt="<?php echo "$foto"?>" src='../../images/<?php echo "$foto"?>'>
            </div>

            <div class="col3">
                <h4><?php echo "$nombres" ?></h4>
                <h4><?php echo "$apellidos" ?></h4>
            </div>
            
        </header>	
        <table class="tabla">
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
                
                $sql = "SELECT * FROM usuario WHERE usu_eliminado='N'";
                $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){  
                        echo "<tr>";
                        echo " <td>".$row["usu_cedula"]."</td>";
                        echo " <td>".$row["usu_nombres"]."</td>";
                        echo " <td>".$row["usu_apellidos"]."</td>";
                        echo " <td>".$row["usu_direccion"]."</td>";
                        echo " <td>".$row["usu_telefono"]."</td>";
                        echo " <td>".$row["usu_correo"]."</td>";
                        echo " <td>".$row["usu_fecha_nacimiento"]."</td>";
                        echo " <td><a href='../../controladores/eliminar.php?codigo=".$row["usu_codigo"]."'>Eliminar</a></td>";
                        echo " <td><a href='../../controladores/editar.php?codigo=".$row["usu_codigo"]."'>Editar</a></td>";
                        echo " <td><a href='../../controladores/password.php?codigo=".$row["usu_codigo"]."'>Actualizar Contrasena</a></td>";
                        echo "</tr>";
                }
            }else{
                echo "<tr>";
                echo " <td colspan='7'> No existen usuarios</td>";
                echo "</tr>";
            }
                $conn->close();
            ?>
        </table>
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