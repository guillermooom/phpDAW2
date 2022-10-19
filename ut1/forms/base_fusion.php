<!doctype html>
<html lang="es">
	<head>
		<title>Conversor binario</title>
		<meta charset="utf-8" />
		<meta name="author" content="Guille" />		
		<style>
			h1{
				margin-top:30px;
				font-size:30px;
				text-align:center;
				margin-bottom:102px;
			}
			p{
				text-align:center;
			}
			.error{color:red;}
		</style>
	</head>
	<body>
	<?php
	$decerr="";
	$num=1;
	$bas=1;
	$baserr="";
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		if(empty($_POST["dec"])){
			$decerr = "Numero Requerido";
			$res="";
		}else{
			$num=limpia($_POST["dec"]);
		}
		
		if(empty($_POST["base"])){
			$baserr = "Base Requerido";
			$res="";
		}else{
			$bas=limpia($_POST["base"]);
		}
		
	}
		
		

		function limpia($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		function resultado ($n,$base){
			$res="";
			do{ 
				$div=($n%$base); 
				$n=(int)($n/$base);
				$res="$div$res"; 
			}while($n>$div);

			if($n!=0)$res="$n$res";
			return $res;
		}

		$bar=strpos($num,"/",0);
		$dec=substr($num,0,$bar);
		$basnum=substr($num,($bar+1));


		$final=resultado($dec,$bas);

		$res="$dec en base $basnum = $final en base $bas";
								
	?>
		<header>
		
		</header>
		<nav>
		
		</nav>
		<main>
			<section>
				<article>
					<div>
					<h1>CAMBIO BASE</h1>
						<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<label for="dec">Numero</label>
							<input type="text" name="dec">
							<span class="error">* <?php echo $decerr;?></span>
							<br>
							<br>
							<label for="base">Nueva Base</label>
							<input type="text" name="base">
							<span class="error">* <?php echo $baserr;?></span>
							<br>
							<br>
							<input type="submit" value="enviar" name="enviar" />
							<input type="reset" value="borrar" name="enviar" />
						</form>
						<?php
						
							echo "<br><h3>RESULTADO</h3>";
							echo $res;
						
						?>
					</div>
				</article>
			</section>
		</main>
		<footer>
		
		</footer>
		
	</body>
</html>