<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
	    <title>Contraseña</title>
		<meta charset="utf-8">
    </head>
    <body>
        <?php 
            include '../../config/conexionBD.php';
            $codigo = $_SESSION['codigo'];
            $sql1 = "SELECT * FROM usuario WHERE usu_codigo = $codigo AND usu_eliminado = 'N'";
            $result1 = $conn->query($sql1);
            $u1 = $result1->fetch_assoc();
            $admin = $u1['usu_admin'];
            if($admin == 1){    
                $codigo = $_GET['codigo'];
                $sql = "SELECT usu_password FROM USUARIO WHERE usu_codigo = '$codigo'";
                $result = $conn->query($sql);
                $u = $result->fetch_assoc();
                $contrasena = $u["usu_password"];
            }else if($admin ==0){
                $codigo = $_SESSION['codigo'];
                $sql = "SELECT usu_password FROM USUARIO WHERE usu_codigo = '$codigo'";
                $result = $conn->query($sql);
                $u = $result->fetch_assoc();
                $contrasena = $u["usu_password"];
            }
        ?>
        
        <form action='contrasena.php' method='POST'>
            <input type="hidden" name='codigo' value = '<?php echo "$codigo" ?>'>
            
            <label for='comprobar'><h3>Contraseña Antigua</h3></label>
            <input type='password' name='antigua' required>
            
            <label for='contrasena'><h3>Contraseña Nueva</h3></label>
            <input type='password' name='contrasena' required>

            <input type='submit' name= "aceptar" value = "Aceptar">
        </form>
    </body>
</html>