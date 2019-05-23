<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<?php
    include '../../config/conexionBD.php';
    //UPDATE `usuario` SET `usu_eliminado` = 'Y', `usu_fecha_modificacion` = NULL WHERE `usuario`.`usu_codigo` = 6;
    $codigo = $_SESSION['codigo'];
    $cedula = isset($_POST["cedula"]) ? mb_strtoupper(trim($_POST["cedula"]), 'utf-8'): null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'utf-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'utf-8'): null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'utf-8'): null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["email"]) ? trim($_POST["email"]): null;
    $nacimiento = isset($_POST["nacimiento"]) ? trim($_POST["nacimiento"]): null;
    $nombre_imagen = $_FILES['imagen']['name'];		//Nombre de la imagen
	$tipo_imagen = $_FILES['imagen']['type'];		//Tipo de imagen
	$tamano_imagen = $_FILES['imagen']['size'];		//Tamaño
    $ruta_imagen = $_FILES['imagen']['tmp_name'];		//Ruta
    
    $carpeta_destino = "../../admin/images/".$nombre_imagen;
	copy($ruta_imagen, $carpeta_destino);

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    
    $sql = "UPDATE usuario SET usu_cedula = '$cedula', usu_nombres = '$nombres', usu_apellidos = '$apellidos',
    usu_direccion = '$direccion', usu_telefono = '$telefono', usu_fecha_nacimiento = '$nacimiento', 
    usu_fecha_modificacion = '$fecha', usu_imagen = '$nombre_imagen' WHERE usuario.usu_codigo = '$codigo'";
    $result = $conn->query($sql);
    header("location: ../vista/usuario/indexUsuario.php");
    echo "Usuario Modificado";
?>