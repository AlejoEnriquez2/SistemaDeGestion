<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="hipermedial";

	//Conexión
	$conn=new mysqli($servername, $username,  $password, $dbname);

	//Check
	if($conn->connect_error){
		die("Conexión Fallida!".$conn->connect_error);
	}else{
		//echo "Conectado con PHP";
	}
?>