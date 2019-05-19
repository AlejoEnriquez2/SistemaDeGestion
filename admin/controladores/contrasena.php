<?php
    include "../../config/conexionBD.php";
    $codigo = $_POST["codigo"];
    $result = $conn->query("SELECT usu_password FROM usuario WHERE usu_codigo = '$codigo'");
    $u = $result->fetch_assoc();
    $a1 = $u['usu_password'];
    echo "$a1 <br>";
    $a2 = isset($_POST["antigua"]) ? trim ($_POST["antigua"]) : null;
    $a2 = md5($a2);
    echo "$a2 <br>";
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $contrasena = md5($contrasena);
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    if($a1 == $a2){
        $sql = "UPDATE usuario SET usu_password='$contrasena', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = '$codigo'";
        $result = $conn->query($sql);
        //header("location: ../vista/usuario/index.php");
    }else{
        echo "contraseña incorrecta";
    }
    

?>