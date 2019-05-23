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
                <th>Fecha</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Asunto</th>
                <th>Abrir</th>
                <th>Eliminar</th>
                
            </tr>
            <?php
            $correo = "SELECT * FROM correo WHERE cor_eliminado like'N'";
            $w = $conn->query($correo);
            
            if ($w->num_rows > 0){
                while ($row = $w->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["cor_fecha"]."</td>";
                    echo "<td>".$row["cor_remitente"]."</td>";
                    echo "<td>".$row["cor_destinatario"]."</td>";
                    echo "<td>".$row["cor_asunto"]."</td>";
                    echo "<td><a href='../../controladores/corAbrir.php?codigo=".$row["cor_codigo"]."'>Abrir</a></td>";
                    echo "<td><a href='../../controladores/corEliminar.php?codigo=".$row["cor_codigo"]."'>Eliminar</a></td>";
                    echo "</tr>";
                }
            }else{
                echo "<tr>";
                echo " <td colspan='7'>No Existen Correos</td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
        <br>
        <br>
        <input type="text" id="remitente" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorRemitente()">
        <br>
        <br>
        <div id="informacion"><b>Correos</b></div>
        <br>
        <br>
    </body>
</html>