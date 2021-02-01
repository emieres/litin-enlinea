<?php  
	session_start();

	$dsn = "litin"; //debe ser de sistema no de usuario
	
	//realizamos la conexion mediante odbc
	$con = odbc_connect($dsn, "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
	
	$cedula = $_SESSION["cedula"];
	$fecnac = $_POST["fecnac"];
		
	// consulta SQL a nuestra tabla "inscri" que se encuentra en la base de datos "db.mdb"
	$sql = "SELECT * FROM Litin WHERE Cedula='$cedula' and Fecnac='$fecnac'"; 
	
	// generamos la tabla mediante odbc_result_all(); utilizando borde 1
	$resultado = odbc_exec($con,$sql)or die ("<strong>No se conecto a la Base de Datos</strong>");

	/*print odbc_result_all($resultado,"border=1");*/
	
	$numreg = odbc_fetch_array($resultado);
	
	if ($numreg <> 0) {
		header("location:perfil.php");
	}else{
		echo '<script>';
		echo 'alert("Datos incorrectos vuelva a intentar");';
		echo 'window.location="login.php";';
		echo '</script>';
	}
	
?>