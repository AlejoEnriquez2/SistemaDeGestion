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
                
                $sql = "SELECT * FROM usuario";
                $result = $conn->query($sql);

            if ($result->num_rows > 0){    
                
                while ($row = $result->fetch_assoc()){
                    if ($row["usu_eliminado"] === 'N'){    
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