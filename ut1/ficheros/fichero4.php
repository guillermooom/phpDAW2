<!doctype html>
<html lang="es">
	<head>
		<title>Fichero 4</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />		
	<style>
			h1{
				font-size:30px;
				text-align:center;
			}
			.error{color:red;}
		table,tr,td,th{
			border: 0.5px solid black;
			border-collapse:collapse;
			text-align:center;
			width:750px;
		}
	</style>
	</head>
	<body>
	<?php
	error_reporting(0);//quita los warning ya que salen SOLO WARNINS
	echo "<br><h3>RESULTADO</h3>";
	echo "<table>
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Fecha Nacimineto</th>
				<th>Localidad</th>
			</tr>";
		$fich=fopen("alumnos2.txt","r");
		$cad="hola";
		while(!feof($fich)){
		$cad=fgets($fich);
		echo "<tr>";
		$se1=strpos($cad,"##",0);
		$se2=strpos($cad,"##",($se1+2));
		$se3=strpos($cad,"##",($se2+2));
		$se4=strpos($cad,"##",($se3+2));
		$se5=strpos($cad,"##",($se4+2));
		echo "<td>". substr($cad,0,$se1)."</td>
				<td>". substr($cad,($se1+2),($se2-$se1-2))
				," ", substr($cad,($se2+2),($se3-$se2-2))."</td>
				<td>". substr($cad,($se3+2),($se3-$se4+2))."</td>
				<td>". substr($cad,($se4+2),($se4-$se5+2))."</td>";
		echo "</tr>";
		}
		echo "</table>";
			
	?>
	</body>
</html>