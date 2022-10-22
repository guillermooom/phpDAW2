<!doctype html>
<html lang="es">
	<head>
		<title>Fichero 3</title>
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
			width:500px;
		}
	</style>
	</head>
	<body>
	<?php
	
	echo "<br><h3>RESULTADO</h3>";
	echo "<table>
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Fecha Nacimineto</th>
				<th>Localidad</th>
			</tr>";
		$fich=fopen("alumnos1.txt","r");
		while(!feof($fich)){
		echo "<tr>";
		echo "<td>". fgets($fich,40)."</td>";
		echo "<td>". fgets($fich,83)."</td>";
		echo "<td>". fgets($fich,11)."</td>";
		echo "<td>". fgets($fich,160)."</td>";
		echo "</tr>";
		}
		echo "</table>";
						
	?>
	</body>
</html>