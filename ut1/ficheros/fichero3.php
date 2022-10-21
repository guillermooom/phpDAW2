<!doctype html>
<html lang="es">
	<head>
		<title>Fichero 3</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />		
	</head>
	<body>
	<?php
	$res="";
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		$fichero=($_POST["fich"]);
		$fich=fopen($fichero,"a");
		fread($fich,filesize($fichero));
		
		/*
		$nb=substr($fich,0,39);
		$ap1=substr($fich,40,80);
		$ap2=substr($fich,81,122);
		$fec=substr($fich,123,132);
		$loc=substr($fich,133,159);
		$ape="$ap1 $ap2";*/
	}
	
	?>
		<header>
		</header>
		<nav>
		
		</nav>
		<main>
			<section>
				<article>
					<div>
					<h1>Lectura Datos</h1>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label for="fich">Fichero</label>
							<input type="file" name="fich" accept=".txt">
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
						<?php
						if ($_SERVER["REQUEST_METHOD"]== "POST"){
							echo "<br><h3>RESULTADO</h3>";
							echo "<table>
									<tr>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Fecha Nacimineto</th>
										<th>Localidad</th>
									</tr>";
								/*while($i<=$long){
									for()
									if($num%2!=0){
										$arr[$i]=$num;
										$sumai=$sumai+$arr[$i];
										echo "<tr>";
										echo "<td>$i</td>";
										echo "<td>$arr[$i]</td>";
										echo "<td>$sumai</td>";
										echo "</tr>";
										$i++;
									}else{
										$sumap=$sumap+$num;
									}
									$num++;
								}*/
								echo "</table>";
						}
						?>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>