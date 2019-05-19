<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<title>Crear Nuevo Usuario</title>
		<link rel="stylesheet" type="text/css" href="../vista/style.css">
    </head>
    <body>
    	<?php
    		include '../../config/conexionBD.php';
    		$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
    		$nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'utf-8'): null;
    		$apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'utf-8'): null;
    		$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'utf-8'): null;
    		$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    		$correo = isset($_POST["email"]) ? trim($_POST["email"]): null;
    		$nacimiento = isset($_POST["nacimiento"]) ? trim($_POST["nacimiento"]): null;
			$contrasena = isset($_POST["contrasena"]) ? trim($_POST['contrasena']): null;
			$admin = isset($_POST["admin"]) ? trim($_POST["admin"]): null;
			$nombre_imagen = $_FILES['imagen']['name'];		//Nombre de la imagen
			$tipo_imagen = $_FILES['imagen']['type'];		//Tipo de imagen
			$tamano_imagen = $_FILES['imagen']['size'];		//Tamaño
			$ruta_imagen = $_FILES['imagen']['tmp_name'];		//Ruta

			$carpeta_destino = "../../admin/images/".$nombre_imagen;
			copy($ruta_imagen, $carpeta_destino);

			if ($admin == 1234){
				echo "<h2>Bienvenido Admin</h2>";
				$sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', md5('$contrasena'), '$nacimiento', 'N', null, null, 1, '$nombre_imagen')";	
			}else{
				echo "Codigo Admin incorrecto";
				$sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', md5('$contrasena'), '$nacimiento', 'N', null, null, 0, '$nombre_imagen')";
			}
			

    		if($conn->query($sql)===TRUE){
    			echo "<p>Se ha insertado correctamente</p>";
    		}else{
    			echo "<p>ERROR</p>";
    		}

    		$conn->close();
    		echo "<a href='../vista/login.html'>Regresar</a>";
    	?>
    </body>
</html>