<!doctype html>
<html lang="es">
	<head>
		<title>Fusion 2</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />		
	</head>
	<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		$nb=limpia($_POST["nb"]);
		$ap1=limpia($_POST["ap1"]);
		$ap2=limpia($_POST["ap2"]);
		$nacim=limpia($_POST["f_nac"]);
		$locali=limpia($_POST["loca"]);

		$myfile = fopen("alumnos2.txt","a"); //creamos el fihero
		//fwrite($myfile,""); //limpiamos el interior

		escribir($nb,$myfile);
		escribir($ap1,$myfile);
		escribir($ap2,$myfile);
		escribir($nacim,$myfile);
		escribir_u($locali,$myfile);
		fwrite($myfile,PHP_EOL);
	}
		function limpia($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		function escribir ($dato,$fiche){
			$long=strlen($dato)+2;
			$escri=str_pad($dato,$long,"#",STR_PAD_RIGHT);
			fwrite($fiche,$escri);
		}
		function escribir_u($dato,$fiche){
			fwrite($fiche,$dato);
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
					<h1>DATOS PPERSONA</h1>
					<br>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"">
							<label for="nb">Nombre</label>
							<input type="text" name="nb">
							<br>
							<br>
							<label for="ap1">Apellido 1</label>
							<input type="text" name="ap1">
							<br>
							<br>
							<label for="ap2">Apellido 2</label>
							<input type="text" name="ap2">
							<br>
							<br>
							<label for="f_nac">Fecha Nacimiento</label>
							<input type="date" name="f_nac">
							<br>
							<br>
							<label for="loca">Localidad</label>
							<input type="text" name="loca">
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>