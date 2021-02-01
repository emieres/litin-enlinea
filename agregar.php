<?php
	session_start();	
	$dsn = "litin"; //debe ser de sistema no de usuario
	
	//realizamos la conexion mediante odbc
	$con = odbc_connect($dsn, "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
	
	$cedula = $_SESSION["cedula"];
	$fecnac = $_POST["fecnac"];
	
	// consulta SQL a nuestra tabla "inscri" que se encuentra en la base de datos "db.mdb"
	$sql = "UPDATE litin SET fecnac='$fecnac' WHERE cedula='$cedula'";
	
	$resultado = odbc_exec($con,$sql) or die ("<strong>No se conecto a la Base de Datos</strong>");
	
	$_SESSION["cedula"] = $cedula;
	header("location:perfil.php");
?>