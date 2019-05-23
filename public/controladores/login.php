<?php
	session_start();
	include '../../config/conexionBD.php';
	
	$usuario = isset($_POST["email"]) ? trim($_POST["email"]) : null;
	$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
	$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";
	

	$result = $conn->query($sql);
	$u = $result->fetch_assoc();
 	if ($result->num_rows > 0) {
		 $_SESSION['isLogged'] = TRUE;
		 $_SESSION['codigo'] = $u["usu_codigo"];
		 $_SESSION['rol'] = $u["usu_admin"];
		 $admin = $u["usu_admin"];
		 if($admin == 1){
			header("Location: ../../admin/vista/admin/indexAdmin.php");
		 }else{
			header("Location: ../../admin/vista/usuario/indexUsuario.php");
		 }
 		
 	} else {
		 echo "Error";
 		header("Location: ../vista/login.html");
 	}
 	$conn->close();
?>