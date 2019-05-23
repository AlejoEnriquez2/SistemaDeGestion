<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Usuarios</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="../../controladores/ajax.js"></script>
        <link rel="stylesheet" href="../vista/styles/styles.css" type="text/css">
	</head>
	<body>
        <header>
            <?php 
                include "../../config/conexionBD.php";
                $codigo = $_GET['codigo'];
                $datos = "UPDATE correo SET cor_eliminado = 'Y' WHERE cor_codigo = '$codigo'";
                $result = $conn->query($datos);
                if($result){
                    echo "Eliminado Correctamente";
                }else {
                    echo "Error!";
                }
            ?>
            <div class="col1">
                <a href="../vista/admin/indexAdmin.php"><h2>Gestion de Usuarios</h2></a>
                <a href="../vista/admin/correo.php"><h2>Correos</h2></a>
            </div>
        </header>
        <section>
            <br><br><br>
            <h3>Fecha</h3>
            <?php echo "$fecha"?><br>
            <h3>Remitente: </h3>
            <?php echo "$remitente"?>
            <h3>Destinatario</h3>
            <?php echo "$destinatario"?><br>
            <h3>Mensaje</h3>
            <?php echo "$mensaje"?>
            <h1>ELIMINADO</h1>
        </section>

    </body>
</html>
