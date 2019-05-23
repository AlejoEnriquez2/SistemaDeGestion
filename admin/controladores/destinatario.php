<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <table style="width:100%">
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Destinatario</th>
            <th>Asunto</th>
            <th>Abrir</th>
            <th>Eliminar</th>        
        </tr>

            <?php   
                include '../../config/conexionBD.php';
                $destinatario = $_GET['destinatario'];
                $sql = "SELECT * FROM correo WHERE cor_destinatario = '$destinatario' AND cor_eliminado = 'N'";
                $result = $conn->query($sql);
                $u = $result->fetch_assoc();
                $fecha = $u["cor_fecha"];
                $remitente = $u["cor_remitente"];
                $destinatario = $u["cor_destinatario"];
                $mensaje = $u['cor_mensaje'];
                $asunto = $u['cor_asunto'];
   
                echo "<tr>";
                echo " <td>".$fecha."</td>";
                echo " <td>".$remitente."</td>";
                echo " <td>".$destinatario."</td>";
                echo " <td>".$asunto."</td>";
                echo "<td><a href='../../controladores/corAbrir.php?codigo=".$u["cor_codigo"]."'>Abrir</a></td>";
                echo "<td><a href='../../controladores/corEliminar.php?codigo=".$u["cor_codigo"]."'>Eliminar</a></td>";
                echo "<tr>";
                
                $conn->close();
            ?>
        </table>
    
    </body>
</html>