<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Eliminar</title>
		<meta charset="utf-8">
    </head>
    <body>
        <?php
            include '../../config/conexionBD.php';
            //UPDATE `usuario` SET `usu_eliminado` = 'Y', `usu_fecha_modificacion` = NULL WHERE `usuario`.`usu_codigo` = 6;
            $codigo = $_GET['codigo'];
            if($codigo===FALSE){
                $codigo = $_SESSION['codigo'];    
            }
            $sql = "SELECT * FROM usuario WHERE usuario.usu_codigo = '$codigo'";
            $result = $conn->query($sql);
            $u = $result->fetch_assoc();
            $cedula = $u["usu_cedula"];
            $nombres = $u["usu_nombres"];
            $apellidos = $u["usu_apellidos"];
            $direccion = $u["usu_direccion"];
            $telefono = $u["usu_telefono"];
            $nacimiento = $u["usu_fecha_nacimiento"];
        ?>
        <form action='edit.php?' method='POST' enctype="multipart/form-data">
            <input type = 'hidden' name = 'codigo' value='<?php echo "$codigo" ?>'>

            <label for='cedula'><h3>Cedula</h3></label>
            <input type='text' name='cedula' value='<?php echo "$cedula" ?>' required>

            <label for='nombre'><h3>Nombres</h3></label>
            <input type='text' name='nombres' value='<?php echo "$nombres" ?>' required>

            <label for='apellido'><h3>Apellidos</h3></label>
            <input type='text' name='apellidos' value='<?php echo "$apellidos" ?>' required>

            <label for='direccion'><h3>Dirección</h3></label>
            <input type='text' name='direccion' value='<?php echo "$direccion" ?>' required>

            <label for='telefono'><h3>Telefono</h3></label>
            <input type='text' name='telefono' value='<?php echo "$telefono" ?>' required>

            <label for='nacimiento'><h3>Nacimiento</h3></label>
            <input type='date' name='nacimiento' value='<?php echo "$nacimiento" ?>' required><br><br>

            <label for="imagen">Agregar Imagen</label>
            <input type="file" name="imagen" multiple>
    
            <input type='submit' name='crear' value='Aceptar'>
        </form>            
            <!--//$sql = "UPDATE usuario SET usu_eliminado = 'Y' WHERE usuario.usu_codigo = '$codigo'";
            //$result = $conn->query($sql);-->
    </body>
</html>