<!doctype html>
<html lang="es">
	<head>
		<title>Fichero 6</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />
		<style>
			.error{color:red;}
	</style>		
	</head>
	<body>
	<?php
	$err="";
	$nb="";
	$dir="";
	$sie=0;
	$fec="";
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["fich"])){
			$err="Campo Requerido";
		}else{
			$datos=limpia($_POST["fich"]);
			$myfile = fopen($datos,"r");
			$nb=$datos;
			$dir=getcwd()."\\".$nb;
			$sie=filesize($datos);
			$fec=date ("d/m/Y H:i:s.",filemtime($datos));
		}
	}
		function limpia($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
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
					<h1>Operaciones Ficheros</h1>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"">
							<label for="nb">Fichero (Path/nombre)</label>
							<input type="text" name="fich">
							<span class="error">* <?php echo $err;?></span>
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
						<?php
							echo "<h2>Resultado</h2>";
							echo "<h3>NOMBRE FICHERO $nb</h3>";
							echo "<h3>RUTA FICHERO $dir</h3>";
							echo "<h3>TAMAÑO FICHERO $sie MB</h3>";
							echo "<h3>ULTIMA MODIFICACION $fec</h3>";
						?>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>