<!doctype html>
<html lang="es">
	<head>
		<title>Fichero 7</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />
		<style>
			.error{color:red;}
	</style>		
	</head>
	<body>
	<?php
	$err="";
	$err1="";
	$err2="";
	$opc="";
	$c= true;
	$p="";
	$dir="";
	$dire="";
	$res="";
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["fich_o"])){
			$err="Campo Requerido";
			$datos="";
			$c=false;
		}else{
			$datos=limpia($_POST["fich_o"]);
		}
		
		if(empty($_POST["fich_d"])){
			$err1="Campo Requerido";
			$datos2="";
			$c=false;
		}else{
			$datos2=limpia($_POST["fich_d"]);
			if(!file_exists($datos2)){
				$dir=basename($datos2);
				$dire=strpos($datos2,$dir,0);
				$p=substr($datos2,0,$dire);
				mkdir($p);
				$res="Direcctorio $p no encontrado<br>Se ha creado el directorio $p";
			}
			
		}
		if(empty($_POST["ope"])){
			$err2="Campo Requerido";
			$c=false;
		}else{
			$opc=($_POST["ope"]);
		}
		
		if($c==true){
			if($opc=="copia"){
				copy($datos,$datos2);
			}
		
			if($opc=="reno"){
				rename($datos,$datos2);
			}
		
			if($opc=="borr"){
				unlink($datos);
			}
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
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label for="nb">Fichero Origen(Path/nombre)</label>
							<input type="text" name="fich_o">
							<span class="error">* <?php echo $err;?></span>
							<br>
							<br>
							<label for="nb">Fichero Destino(Path/nombre)</label>
							<input type="text" name="fich_d">
							<span class="error">* <?php echo $err1;?></span>
							<br>
							<br>
							Operaciones :  <span class="error">* <?php echo $err2;?></span>
							<br>
							<input type="radio" name="ope" value="copia">Copiar Fichero
							<br>
							<input type="radio" name="ope" value="reno">Renombrar Fichero
							<br>
							<input type="radio" name="ope" value="borr">Borrar Fichero
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
						<?php
							echo "<p>$res</p>";
						?>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>