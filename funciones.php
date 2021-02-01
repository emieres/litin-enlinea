<?php  
	//Funciones php
	function datosalumno($codigo){
		//realizamos la conexion mediante odbc
		$con = odbc_connect("litin", "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
		$sql = "SELECT * FROM alumno WHERE codalu='$codigo'";
		$resultado = odbc_exec($con,$sql) or die ("<strong>No se conecto a la Base de Datos</strong>");
		$numreg = odbc_fetch_array($resultado);
		$_SESSION["ts"] = $numreg["ts"];
		$_SESSION["moraa"] = $numreg["mora"];
		$_SESSION["vencea"] = $numreg["vence"];
		$_SESSION["p1"] = $numreg["p1"];
		$_SESSION["p2"] = $numreg["p2"];
		$_SESSION["p3"] = $numreg["p3"];
		$_SESSION["pd"] = $numreg["pd"];
		//mostramos el registro
		if ($codigo <> 0) {
			echo "<hr>";
			echo "<strong>ALUMNO:</strong> ".$numreg["nombre"]."<br><strong>CODIGO:</strong> ".$numreg["codalu"]."&nbsp;&nbsp;&nbsp;<strong>CEDULA:</strong> ".$numreg["cedula"]."&nbsp;&nbsp;&nbsp;<strong>CURSO:</strong> ".$numreg["seccion"];
			echo "<br>";
		}
	}

	function notasalumno($codigo){
		//realizamos la conexion mediante odbc
		$con = odbc_connect("litin", "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
		$sql = "SELECT * FROM alumno WHERE codalu='$codigo'";
		$resultado = odbc_exec($con,$sql) or die ("<strong>No se conecto a la Base de Datos</strong>");
		$numreg = odbc_fetch_array($resultado);
		//mostramos el registro
		if ($codigo <> 0) {
			echo datosalumno($codigo);
			echo "<br><table width='800' class='table'>";
			echo "<thead>";
			echo "<tr style='font-weight:bold'><td>ASIGNATURA</td><td>1er LAPSO</td><td>2do LAPSO</td><td>3er LAPSO</td><td>Definitiva</td></tr>";
			echo "</thead>";
			echo "<tbody>";
			echo notas($numreg["codalu"]);
			echo "</tbody>";
			echo "</table>";
		}
	}

	function materia($codigomateria){
        //realizamos la conexion mediante odbc
		$conexion = odbc_connect("litin", "", "") or die("<strong>ERROR DE CONEXION</strong>");
		$sql = "SELECT * FROM materia WHERE codmat='$codigomateria'";
		$resultado = odbc_exec($conexion, $sql);
		$numreg = odbc_fetch_array($resultado);
        
		if($numreg <> 0){
            
			echo '<td style="text-align:left;">'.$_SESSION["margen"].$numreg["nommat"].'</td>';
            
		}
        
	}

	function notas($codigo){
		//realizamos la conexion mediante odbc
		$con = odbc_connect("litin", "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
		$sql = "SELECT * FROM nota WHERE codalu='$codigo'";
		$resultado = odbc_exec($con,$sql) or die ("<strong>No se conecto a la Base de Datos</strong>");

		while ($numreg = odbc_fetch_array($resultado)) {
			$_SESSION["margen"] = $numreg["margen"];
			echo "<tr>";
			echo materia($numreg["codmat"])."<td>".$numreg["n1"]."</td><td>".$numreg["n2"]."</td><td>".$numreg["n3"]."</td><td>".$numreg["d"]."</td>";
			echo "</tr>";
		}
		echo "<tr>";
		echo "<td colspan='5'>&nbsp;</td>";
		echo "</tr>";
		echo "<tr style='font-weight:bold;'>";
		echo "<td>PROMEDIO</td><td>".$_SESSION["p1"]."</td><td>".$_SESSION["p2"]."</td><td>".$_SESSION["p3"]."</td><td>".$_SESSION["pd"]."</td>";
		echo "</tr>";
	}

	function edocuenta($codigo){
		//realizamos la conexion mediante odbc
		$con = odbc_connect("litin", "", "") or die ("<strong>No se conecto a la Base de Datos</strong>");
		$sql = "SELECT * FROM edocta WHERE codalu='$codigo'";
		$resultado = odbc_exec($con,$sql) or die ("<strong>No se conecto a la Base de Datos</strong>");
		if ($codigo <> 0) {	
			echo datosalumno($codigo);
			echo "<table width='800' class='table'>";
			echo "<thead>";
			echo "<tr>&nbsp;</tr>";
			echo "<tr style='text-align:center'><th colspan='5' style='text-align:center'>ESTADO DE CUENTA AL ".$_SESSION["ts"]."</th></tr>";
			echo "<tr>&nbsp;</tr>";
			echo "<tr style='font-weight:bold'><th>FECHA</th><th>REFERENCIA</th><th>DESCRIPCION</th><th style='text-align:right'>DEBITO</th><th style='text-align:right'>CREDITO</th></tr>";
			echo "</thead>";
			echo "<tbody>";
			while ($numreg = odbc_fetch_array($resultado)) {
				echo "<tr>";
				echo "<td>".$numreg["fecha"]."</td>"."<td>".$numreg["refer"]."</td><td>".$numreg["desc"]."</td>";
				if ($numreg["monto"] > 0) {
					echo "<td style='text-align:right;'>".number_format($numreg["monto"], 2, '.', ',')."</td><td></td>";
				}else{
					echo "<td></td><td style='text-align:right;'>".number_format($numreg["monto"], 2, '.', ',')."</td>";
				}
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table><br>";
			echo "<strong>Deuda vencida: </strong>".number_format($_SESSION["moraa"], 2, '.', ',')."<br><strong>Proximo vencimiento de cuota:</strong> ".$_SESSION["vencea"];
		}
	}
?>