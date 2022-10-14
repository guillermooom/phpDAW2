<!doctype html>
<html lang="es">
	<head>
		<title>Conversor binario</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />
	</head>
	<style>
		.error{color:red;}
	</style>
	<body>
	<?php
	$num = "";
	$numerr = "";
	$res="";
	$cont="";
	
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["dec"])){
			$numerr = "Campo Obligatorio";
			$res="";
		}else{
			$num=limpia($_POST["dec"]);
			$res=ope($num);
			$cont="$num en BINARIO es $res";
		}
	}
	

	function ope($n){
		$resul=0;
		$resul=decbin($n);
		return $resul;
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
					<h1>CONVERSOR BINARIO</h1>
					<br>
					<p class="error">* Campos Obligatorios</p>
					<br>
						<form name="formu" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" >
							<label for="dec">Numero decimal</label>
							<input type="text" name="dec">
							<span class="error">* <?php echo $numerr;?></span>
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
							<br>
						</form>
						<?php
						
							echo "<br><h3>RESULTADO</h3>";
							echo $cont;
						
						?>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>

