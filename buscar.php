<?php  
	session_start();

	$dsn = "litin"; //debe ser de sistema no de usuario
	
	//realizamos la conexion mediante odbc
	$con = odbc_connect($dsn, "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
	
	$cedula = $_POST["cedula"];	
	
	// consulta SQL a nuestra tabla "inscri" que se encuentra en la base de datos "db.mdb"
	$sql = "SELECT * FROM Litin WHERE Cedula='$cedula'";

	// generamos la tabla mediante odbc_result_all(); utilizando borde 1
	$resultado = odbc_exec($con,$sql)or die ("<strong>No se conecto a la Base de Datos</strong>");

	/*print odbc_result_all($resultado,"border=1");*/
	
	$numreg = odbc_fetch_array($resultado);
	
	if (isset($numreg["cedula"])) {

		$_SESSION["cedula"] = $numreg["cedula"];
		$_SESSION["nombrer"] = $numreg["nombre"];
		$_SESSION["fecnac"] = $numreg["fecnac"];
		$_SESSION["estado"] = $numreg["estado"];
		$_SESSION["boletin"] = $numreg["boletin"];
		$_SESSION["a1"] = $numreg["a1"];
		$_SESSION["a2"] = $numreg["a2"];
		$_SESSION["a3"] = $numreg["a3"];
		$_SESSION["a4"] = $numreg["a4"];
		$_SESSION["a5"] = $numreg["a5"];
		$_SESSION["b1"] = $numreg["b1"];
		$_SESSION["b2"] = $numreg["b2"];
		$_SESSION["b3"] = $numreg["b3"];
		$_SESSION["b4"] = $numreg["b4"];
		$_SESSION["b5"] = $numreg["b5"];
		$_SESSION["saldor"] = $numreg["saldo"];
		$_SESSION["morar"] = $numreg["mora"];
		header("location:login.php");
		
	}else{

		echo '<script>';
		echo 'alert("Cédula no Registrada");';
		echo 'window.location="index.php";';
		echo '</script>';

	}

?>
<meta charset="utf-8">