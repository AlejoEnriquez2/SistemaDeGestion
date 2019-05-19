<?php
    include '../../config/conexionBD.php';
    //UPDATE `usuario` SET `usu_eliminado` = 'Y', `usu_fecha_modificacion` = NULL WHERE `usuario`.`usu_codigo` = 6;
    $codigo = $_POST['codigo'];
    $cedula = isset($_POST["cedula"]) ? mb_strtoupper(trim($_POST["cedula"]), 'utf-8'): null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'utf-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'utf-8'): null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'utf-8'): null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["email"]) ? trim($_POST["email"]): null;
    $nacimiento = isset($_POST["nacimiento"]) ? trim($_POST["nacimiento"]): null;

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "UPDATE usuario SET usu_cedula = '$cedula', usu_nombres = '$nombres', usu_apellidos = '$apellidos',
    usu_direccion = '$direccion', usu_telefono = '$telefono', usu_fecha_nacimiento = '$nacimiento', 
    usu_fecha_modificacion = '$fecha' WHERE usuario.usu_codigo = '$codigo'";
    $result = $conn->query($sql);
    header("location: ../vista/usuario/index.php");
    echo "Usuario Modificado";
?>