<!DOCTYPE html>
<html>
    <head></head>
    <body>
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
                include '../../config/conexionBD.php';
                $cedula = $_GET['cedula'];
                
                $sql = "SELECT * FROM usuario WHERE usu_cedula = '$cedula'";
                $result = $conn->query($sql);
                $u = $result->fetch_assoc();
                $cedula = $u["usu_cedula"];
                $nombres = $u["usu_nombres"];
                $apellidos = $u["usu_apellidos"];
                $direccion = $u["usu_direccion"];
                $telefono = $u["usu_telefono"];
                $nacimiento = $u["usu_fecha_nacimiento"];
                $correo = $u["usu_correo"];

                if ($u["usu_eliminado"] == 'N'){    
                    echo "<tr>";
                    echo " <td>".$cedula."</td>";
                    echo " <td>".$nombres."</td>";
                    echo " <td>".$apellidos."</td>";
                    echo " <td>".$direccion."</td>";
                    echo " <td>".$telefono."</td>";
                    echo " <td>".$correo."</td>";
                    echo " <td>".$nacimiento."</td>";
                    echo " <td><a href='eliminar.php?codigo=".$u["usu_codigo"]."'>Eliminar</a></td>";
                    echo " <td><a href='editar.php?codigo=".$u["usu_codigo"]."'>Editar</a></td>";
                    echo " <td><a href='password.php?codigo=".$u["usu_codigo"]."'>Actualizar Contrasena</a></td>";
                    echo "<tr>";
                }    
                $conn->close();
            ?>
        </table>
    
    </body>
</html>

    