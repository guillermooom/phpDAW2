<!doctype html>
<html lang="es">
	<head>
		<title>Fichero 1</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />		
	</head>
	<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		$myfile = fopen("alumnos1.txt","a");
		$nb=limpia($_POST["nb"]);
		$ap1=limpia($_POST["ap1"]);
		$ap2=limpia($_POST["ap2"]);
		$f_nac=limpia($_POST["f_nac"]);
		$locali=limpia($_POST["loca"]);

		escribir($nb,20,$myfile);
		escribir($ap1,20,$myfile);
		escribir($ap2,21,$myfile);
		escribir($f_nac,9,$myfile);
		escribir($locali,26,$myfile);
		fwrite($myfile,PHP_EOL);
		
	}
		function limpia($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		function escribir ($dato,$long,$fiche){
			$escri=str_pad($dato,$long," ",STR_PAD_RIGHT);
			fwrite($fiche,$escri);
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