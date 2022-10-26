<!doctype html>
<html lang="es">
	<head>
		<title>Bolsa 1</title>
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
			width:1500px;
		}
		.pri{
			text-align:left;
		}
	</style>
	</head>
	<body>
	<?php
	$cont=0;
	echo "<br><h3>RESULTADO</h3>";
	echo "<table>";
		$fich=fopen("C:\wamp64\www\ut1\bolsa\ibex35.txt","r");
		while(!feof($fich)){
		echo "<tr>";
		if($cont==0){
			echo "<th class='pri'>". fgets($fich,23)."</th>";
			echo "<th>". fgets($fich,9)."</th>";
			echo "<th>". fgets($fich,8)."</th>";
			echo "<th>". fgets($fich,12)."</th>";
			echo "<th>". fgets($fich,10)."</th>";
			echo "<th>". fgets($fich,10)."</th>";
			echo "<th>". fgets($fich,12)."</th>";
			echo "<th>". fgets($fich,9)."</th>";
			echo "<th>". fgets($fich,14)."</th>";
			echo "<th>". fgets($fich,11)."</th>";
		}else{
			echo "<td class='pri'>". fgets($fich,23)."</td>";
			echo "<td>". fgets($fich,9)."</td>";
			echo "<td>". fgets($fich,8)."</td>";
			echo "<td>". fgets($fich,12)."</td>";
			echo "<td>". fgets($fich,10)."</td>";
			echo "<td>". fgets($fich,10)."</td>";
			echo "<td>". fgets($fich,12)."</td>";
			echo "<td>". fgets($fich,9)."</td>";
			echo "<td>". fgets($fich,14)."</td>";
			echo "<td>". fgets($fich,11)."</td>";
		}
		echo "</tr>";
		$cont++;
		}
		echo "</table>";
						
	?>
	</body>
</html>